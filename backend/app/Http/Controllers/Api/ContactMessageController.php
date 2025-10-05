<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\FrontendUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string'],
        ]);

        $user = $request->user('sanctum');
        $frontendUserId = $user instanceof FrontendUser ? $user->id : null;

        $contact = ContactMessage::query()->create([
            'frontend_user_id' => $frontendUserId,
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'] ?? null,
            'message' => $data['message'],
            'status' => 'new',
            'is_guest' => $frontendUserId === null,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json([
            'message' => __('Thank you. We will contact you soon.'),
            'id' => $contact->id,
        ], 201);
    }
}
