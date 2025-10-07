<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Post Comments') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex flex-wrap items-center gap-4 px-6 py-4 text-sm text-slate-600">
                    <span class="font-semibold text-slate-800">{{ trans_choice(':count comment total|:count comments total', $comments->total(), ['count' => $comments->total()]) }}</span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-amber-700">{{ __('Pending:') }} {{ number_format($commentStatusSummary['pending'] ?? 0) }}</span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Published:') }} {{ number_format($commentStatusSummary['published'] ?? 0) }}</span>
                    <span class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-3 py-1 text-xs font-semibold uppercase tracking-wide text-rose-700">{{ __('Rejected:') }} {{ number_format($commentStatusSummary['rejected'] ?? 0) }}</span>
                </div>
            </div>
            @if (session('status'))
                <div class="rounded-md bg-emerald-50 px-4 py-3 text-sm text-emerald-700">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.post-comments.index') }}" class="grid gap-4 md:grid-cols-[1fr_200px_auto]">
                        <div>
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                            <input
                                id="q"
                                name="q"
                                type="search"
                                value="{{ $search }}"
                                placeholder="{{ __('Author, email, or keywords…') }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                        </div>
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Status') }}</label>
                            <select
                                id="status"
                                name="status"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            >
                                <option value="">{{ __('All statuses') }}</option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}" @selected($status === $value)>{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.post-comments.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-4 overflow-x-auto">
                    <div class="flex items-center justify-end">
                        {{ $comments->onEachSide(1)->links() }}
                    </div>
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">{{ __('Comment') }}</th>
                                <th class="px-3 py-2">{{ __('Post') }}</th>
                                <th class="px-3 py-2">{{ __('Author') }}</th>
                                <th class="px-3 py-2">{{ __('Status') }}</th>
                                <th class="px-3 py-2">{{ __('Submitted') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($comments as $comment)
                                <tr>
                                    <td class="px-3 py-3 align-top text-slate-700">
                                        <p class="line-clamp-4">{{ $comment->body }}</p>
                                    </td>
                                    <td class="px-3 py-3 align-top">
                                        <a href="{{ route('admin.posts.edit', $comment->post?->id) }}" class="text-sm font-semibold text-indigo-600 hover:underline">
                                            {{ $comment->post?->title ?? __('Unknown post') }}
                                        </a>
                                        @if ($comment->post)
                                            <p class="text-xs text-slate-400">{{ $comment->post->slug }}</p>
                                        @endif
                                    </td>
                                    <td class="px-3 py-3 align-top text-sm text-slate-600">
                                        <div class="font-semibold text-slate-800">{{ $comment->frontendUser?->name ?? __('Deleted user') }}</div>
                                        <div class="text-xs text-slate-400">{{ $comment->frontendUser?->email }}</div>
                                    </td>
                                    <td class="px-3 py-3 align-top">
                                        @php($label = $statuses[$comment->status] ?? ucfirst($comment->status))
                                        <span @class([
                                            'inline-flex rounded-full px-2 text-xs font-semibold uppercase tracking-wide',
                                            'bg-amber-100 text-amber-700' => $comment->status === \App\Models\PostComment::STATUS_PENDING,
                        'bg-emerald-100 text-emerald-700' => $comment->status === \App\Models\PostComment::STATUS_PUBLISHED,
                        'bg-rose-100 text-rose-700' => $comment->status === \App\Models\PostComment::STATUS_REJECTED,
                    ])>{{ $label }}</span>
                                    </td>
                                    <td class="px-3 py-3 align-top text-xs text-slate-500">{{ optional($comment->created_at)->format('Y-m-d H:i') }}</td>
                                    <td class="px-3 py-3 align-top text-right">
                                        <div class="flex flex-col items-end gap-2">
                                            <form method="POST" action="{{ route('admin.post-comments.update', $comment) }}" class="flex items-center gap-2">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" class="rounded-md border-gray-300 text-xs shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                                    @foreach ($statuses as $value => $label)
                                                        <option value="{{ $value }}" @selected($comment->status === $value)>{{ $label }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.post-comments.destroy', $comment) }}" onsubmit="return confirm('{{ __('Delete this comment?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center rounded-md bg-rose-600 px-3 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-rose-500">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-3 py-6 text-center text-slate-500">{{ __('No comments yet.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
