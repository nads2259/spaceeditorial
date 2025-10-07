<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl font-semibold text-gray-800 leading-tight">{{ __('Posts') }}</h2>
            <form method="GET" action="{{ route('admin.posts.index') }}" class="flex flex-wrap items-center gap-2">
                <label for="post-search" class="sr-only">{{ __('Search posts') }}</label>
                <input
                    id="post-search"
                    name="q"
                    type="search"
                    value="{{ $search }}"
                    placeholder="{{ __('Search by title, slug, category…') }}"
                    class="w-64 rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                />
                @if ($search)
                    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100">{{ __('Reset') }}</a>
                @endif
                <button type="submit" class="inline-flex items-center rounded-md border border-indigo-200 bg-indigo-600 px-3 py-2 text-xs font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Search') }}</button>
            </form>
            <div class="flex items-center gap-3">
                <form method="POST" action="{{ route('admin.posts.bulk-destroy') }}" id="bulk-delete-form" class="hidden">
                    @csrf
                    @method('DELETE')
                    <div id="bulk-delete-container"></div>
                </form>
                <button type="button" class="inline-flex items-center rounded-md border border-red-200 px-4 py-2 text-sm font-semibold text-red-600 shadow-sm hover:bg-red-50" onclick="submitBulkDelete()">
                    {{ __('Delete Selected') }}
                </button>
                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                    {{ __('New Post') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="flex items-center justify-between px-6 pt-6 text-xs text-slate-500">
                    <span>{{ trans_choice(':count post total|:count posts total', $posts->total(), ['count' => $posts->total()]) }}</span>
                    @if ($search)
                        <span>{{ __('Filtered by: ":search"', ['search' => $search]) }}</span>
                    @endif
                </div>
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">
                                    <input type="checkbox" onclick="toggleSelectAll(this)" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                </th>
                                <th class="px-3 py-2">{{ __('Title') }}</th>
                                <th class="px-3 py-2">{{ __('Category') }}</th>
                                <th class="px-3 py-2">{{ __('Subcategory') }}</th>
                                <th class="px-3 py-2 text-center">{{ __('Published') }}</th>
                                <th class="px-3 py-2">{{ __('Published At') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($posts as $post)
                                <tr>
                                    <td class="px-3 py-3">
                                        <input type="checkbox" value="{{ $post->id }}" class="post-checkbox h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                    </td>
                                    <td class="px-3 py-3 font-medium text-gray-900">
                                        <a href="{{ route('admin.posts.show', $post) }}" class="hover:underline">{{ $post->title }}</a>
                                    </td>
                                    <td class="px-3 py-3 text-gray-500">{{ $post->category->name ?? '—' }}</td>
                                    <td class="px-3 py-3 text-gray-500">{{ $post->subcategory->name ?? '—' }}</td>
                                    <td class="px-3 py-3 text-center">
                                        @if ($post->is_published)
                                            <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">{{ __('Yes') }}</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold text-gray-600">{{ __('No') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-3 text-gray-500">{{ optional($post->published_at)->toDayDateTimeString() }}</td>
                                    <td class="px-3 py-3 text-right">
                                        <div class="flex justify-end gap-2">
                                            <form method="GET" action="{{ route('admin.posts.edit', $post) }}">
                                                <button type="submit" class="btn-edit">{{ __('Edit') }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.posts.destroy', $post) }}" onsubmit="return confirm('{{ __('Delete this post?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-3 py-6 text-center text-gray-500">{{ __('No posts found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $posts->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@push('scripts')
    <script>
        function toggleSelectAll(source) {
            document.querySelectorAll('.post-checkbox').forEach(cb => cb.checked = source.checked);
        }
        function submitBulkDelete() {
            const ids = Array.from(document.querySelectorAll('.post-checkbox:checked')).map(cb => cb.value);
            if (!ids.length) {
                alert('{{ __('Select at least one post to delete.') }}');
                return;
            }
            if (!confirm('{{ __('Delete selected posts?') }}')) {
                return;
            }
            const form = document.getElementById('bulk-delete-form');
            const container = document.getElementById('bulk-delete-container');
            container.innerHTML = '';
            ids.forEach(id => {
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'ids[]';
                hidden.value = id;
                container.appendChild(hidden);
            });
            form.submit();
        }
    </script>
@endpush
