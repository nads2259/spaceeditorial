<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('q'));
        $status = $request->query('status');

        $messages = ContactMessage::query()
            ->with('frontendUser')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($inner) use ($search) {
                    $inner
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('subject', 'like', "%{$search}%");
                });
            })
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.contact-messages.index', [
            'messages' => $messages,
            'search' => $search,
            'status' => $status,
        ]);
    }

    public function show(ContactMessage $contactMessage): View
    {
        $contactMessage->load('frontendUser');

        return view('admin.contact-messages.show', [
            'messageRecord' => $contactMessage,
        ]);
    }

    public function update(Request $request, ContactMessage $contactMessage): RedirectResponse
    {
        $data = $request->validate([
            'status' => ['required', 'in:new,in_progress,resolved'],
        ]);

        $contactMessage->update($data);

        return redirect()
            ->route('admin.contact-messages.show', $contactMessage)
            ->with('status', __('Message status updated.'));
    }
}
