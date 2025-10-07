@php use Illuminate\Support\Str; @endphp

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Visitor Analytics') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <form method="GET" action="{{ route('admin.visit-logs.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div class="flex-1">
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                            <input id="q" name="q" type="search" value="{{ $search }}" placeholder="{{ __('Visitor id, url, ip, user agent…') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                        <div class="flex gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.visit-logs.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">{{ __('Showing :count visits', ['count' => $logs->total()]) }}</p>
                            <p class="text-xs text-gray-500">{{ __('Page :current of :last', ['current' => $logs->currentPage(), 'last' => $logs->lastPage()]) }}</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <button
                                type="button"
                                onclick="window.location='{{ $logs->previousPageUrl() ?: '#' }}'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 shadow-sm disabled:opacity-40"
                                @if(!$logs->previousPageUrl()) disabled @endif
                            >
                                {{ __('Previous') }}
                            </button>
                            <button
                                type="button"
                                onclick="window.location='{{ $logs->nextPageUrl() ?: '#' }}'"
                                class="inline-flex items-center rounded-full border border-slate-200 px-4 py-2 text-sm font-medium text-slate-600 shadow-sm disabled:opacity-40"
                                @if(!$logs->nextPageUrl()) disabled @endif
                            >
                                {{ __('Next') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table id="visit-log-table" class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Visited At') }}</th>
                                    <th class="px-3 py-2">{{ __('Visitor ID') }}</th>
                                    <th class="px-3 py-2">{{ __('URL') }}</th>
                                    <th class="px-3 py-2">{{ __('IP') }}</th>
                                    <th class="px-3 py-2">{{ __('Locale') }}</th>
                                    <th class="px-3 py-2">{{ __('Referrer') }}</th>
                                    <th class="px-3 py-2">{{ __('Context') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($logs as $log)
                                    <tr>
                                        <td class="px-3 py-2 text-gray-700 whitespace-nowrap">{{ $log->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-3 py-2 font-mono text-xs text-gray-600">{{ $log->visitor_id }}</td>
                                        <td class="px-3 py-2 text-indigo-600 break-all">
                                            <a href="{{ $log->url }}" target="_blank" rel="noopener" class="hover:underline">{{ Str::limit($log->url, 60) }}</a>
                                        </td>
                                        <td class="px-3 py-2 text-gray-600">{{ $log->ip_address }}</td>
                                        <td class="px-3 py-2 text-gray-600">{{ $log->locale }}</td>
                                        <td class="px-3 py-2 text-gray-600 break-all">{{ Str::limit($log->referrer, 60) ?: '—' }}</td>
                                        <td class="px-3 py-2 text-gray-600">
                                            @if ($log->context)
                                                <button type="button" x-data="{ open: false }" @click="open = !open" class="inline-flex items-center rounded-md border border-gray-300 px-3 py-1 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50">
                                                    {{ __('Details') }}
                                                </button>
                                                <div x-show="open" x-transition class="mt-2 max-w-md rounded-md border border-gray-200 bg-gray-50 p-3 text-xs text-gray-700" @click.away="open = false">
                                                    <pre class="whitespace-pre-wrap">{{ json_encode($log->context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                                                </div>
                                            @else
                                                <span class="text-xs text-gray-400">{{ __('None') }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-3 py-6 text-center text-gray-500">{{ __('No visits recorded yet.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3" defer></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const table = document.getElementById('visit-log-table');
                if (table && window.simpleDatatables) {
                    new window.simpleDatatables.DataTable(table, {
                        searchable: false,
                        perPageSelect: false,
                        paging: false,
                    });
                }
            });
        </script>
    @endpush
</x-app-layout>
