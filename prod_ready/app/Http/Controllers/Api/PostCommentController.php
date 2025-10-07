<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FrontendUser;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCommentController extends Controller
{
    public function index(string $slug): JsonResponse
    {
        try {
            $post = Post::query()->where('slug', $slug)->firstOrFail();

            $comments = PostComment::query()
                ->where('post_id', $post->id)
                ->where('status', PostComment::STATUS_PUBLISHED)
                ->with(['frontendUser:id,name'])
                ->orderByDesc('created_at')
                ->get()
                ->map(fn (PostComment $comment) => [
                    'id' => $comment->id,
                    'body' => $comment->body,
                    'created_at' => $comment->created_at?->toIso8601String(),
                    'author' => [
                        'id' => $comment->frontend_user_id,
                        'name' => $comment->frontendUser?->name,
                    ],
                ]);

            return response()->json(['data' => $comments]);
        } catch (QueryException $exception) {
            if ($this->isMissingCommentsTable($exception)) {
                return response()->json(['data' => []]);
            }

            throw $exception;
        }
    }

    public function store(Request $request, string $slug): JsonResponse
    {
        $user = $request->user();
        if (! $user instanceof FrontendUser) {
            return response()->json(['message' => __('Only authenticated readers can comment.')], 403);
        }

        $data = $request->validate([
            'body' => ['required', 'string', 'min:3', 'max:2000'],
        ]);

        $body = trim($data['body']);
        if (Str::length($body) === 0) {
            return response()->json(['message' => __('Comment cannot be empty.')], 422);
        }

        $status = PostComment::shouldAutoApprove($body) ? PostComment::STATUS_PUBLISHED : PostComment::STATUS_PENDING;

        try {
            $post = Post::query()->where('slug', $slug)->firstOrFail();

            PostComment::query()->create([
                'post_id' => $post->id,
                'frontend_user_id' => $user->id,
                'body' => $body,
                'status' => $status,
            ]);
        } catch (QueryException $exception) {
            if ($this->isMissingCommentsTable($exception)) {
                return response()->json(['message' => __('Comments are not available right now.')], 503);
            }

            throw $exception;
        }

        $message = $status === PostComment::STATUS_PUBLISHED
            ? __('Your comment is now live.')
            : __('Thanks! Your comment was submitted for review.');

        return response()->json([
            'message' => $message,
            'status' => $status,
        ], 201);
    }

    protected function isMissingCommentsTable(QueryException $exception): bool
    {
        $code = $exception->getCode();
        if ($code === '42S02') {
            return true;
        }

        $message = $exception->getMessage();

        $message = strtolower($exception->getMessage());

        if (str_contains($message, '42s02')) {
            return true;
        }

        if (! str_contains($message, 'post_comments')) {
            return false;
        }

        return str_contains($message, "doesn't exist") || str_contains($message, 'no such table') || str_contains($message, 'base table or view not found');
    }
}
