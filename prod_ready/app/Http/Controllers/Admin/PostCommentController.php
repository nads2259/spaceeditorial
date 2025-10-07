<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostComment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostCommentController extends Controller
{
    public function index(Request $request): View
    {
        $status = $request->query('status');
        $search = trim((string) $request->query('q'));

        $comments = PostComment::query()
            ->with(['post:id,title,slug', 'frontendUser:id,name,email'])
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($search, function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner
                        ->whereHas('post', fn ($postQuery) => $postQuery->where('title', 'like', "%{$search}%"))
                        ->orWhereHas('frontendUser', function ($userQuery) use ($search) {
                            $userQuery
                                ->where('name', 'like', "%{$search}%")
                                ->orWhere('email', 'like', "%{$search}%");
                        })
                        ->orWhere('body', 'like', "%{$search}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(20)
            ->withQueryString();

        return view('admin.post-comments.index', [
            'comments' => $comments,
            'status' => $status,
            'search' => $search,
            'statuses' => $this->statuses(),
            'commentStatusSummary' => $this->statusSummary(),
        ]);
    }

    public function update(Request $request, PostComment $postComment): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:'.implode(',', array_keys($this->statuses()))],
        ]);

        $postComment->update([
            'status' => $data['status'],
        ]);

        return redirect()
            ->route('admin.post-comments.index')
            ->with('status', __('Comment status updated.'));
    }

    public function destroy(PostComment $postComment): RedirectResponse
    {
        $postComment->delete();

        return redirect()
            ->route('admin.post-comments.index')
            ->with('status', __('Comment removed.'));
    }

    protected function statuses(): array
    {
        return [
            PostComment::STATUS_PENDING => __('Pending'),
            PostComment::STATUS_PUBLISHED => __('Published'),
            PostComment::STATUS_REJECTED => __('Rejected'),
        ];
    }

    protected function statusSummary(): array
    {
        return [
            PostComment::STATUS_PENDING => PostComment::where('status', PostComment::STATUS_PENDING)->count(),
            PostComment::STATUS_PUBLISHED => PostComment::where('status', PostComment::STATUS_PUBLISHED)->count(),
            PostComment::STATUS_REJECTED => PostComment::where('status', PostComment::STATUS_REJECTED)->count(),
        ];
    }
}
