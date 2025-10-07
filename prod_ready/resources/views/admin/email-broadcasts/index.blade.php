<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Email Broadcasts') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="flex flex-wrap gap-4">
                <x-dashboard.stat-card class="flex-1 min-w-[200px]" title="{{ __('Total Broadcasts') }}" :value="$metrics['total_broadcasts']" />
                <x-dashboard.stat-card class="flex-1 min-w-[200px]" title="{{ __('Recipients Addressed') }}" color="emerald" :value="$metrics['total_recipients']" />
                <x-dashboard.stat-card class="flex-1 min-w-[200px]" title="{{ __('Delivered Emails') }}" color="sky" :value="$metrics['delivered_recipients']" />
            </div>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                <div class="space-y-4 p-6">
                    <form method="GET" action="{{ route('admin.email-broadcasts.index') }}" class="grid gap-4 md:grid-cols-[1fr_200px_auto]">
                        <div>
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                            <input
                                id="q"
                                name="q"
                                type="search"
                                value="{{ $search }}"
                                placeholder="{{ __('Subject or template name') }}"
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
                                <option value="queued" @selected($status === 'queued')>{{ __('Queued') }}</option>
                                <option value="sent" @selected($status === 'sent')>{{ __('Sent') }}</option>
                                <option value="failed" @selected($status === 'failed')>{{ __('Failed') }}</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.email-broadcasts.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div class="text-sm text-gray-600">
                        <p class="font-semibold">{{ trans_choice('Showing :count broadcast|Showing :count broadcasts', $broadcasts->total(), ['count' => $broadcasts->total()]) }}</p>
                        <p class="text-xs text-gray-500">{{ __('Page :current of :last', ['current' => $broadcasts->currentPage(), 'last' => max($broadcasts->lastPage(), 1)]) }}</p>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Subject') }}</th>
                                    <th class="px-3 py-2">{{ __('Template') }}</th>
                                    <th class="px-3 py-2">{{ __('Audience') }}</th>
                                    <th class="px-3 py-2">{{ __('Status') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Recipients') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Delivered') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Failed') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Clicks') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Sent at') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($broadcasts as $broadcast)
                                    <tr>
                                        <td class="px-3 py-3">
                                            <p class="font-semibold text-gray-800">{{ $broadcast->subject }}</p>
                                            <p class="text-xs text-gray-500">{{ $broadcast->created_at->format('Y-m-d H:i') }}</p>
                                        </td>
                                        <td class="px-3 py-3">
                                            @if ($broadcast->template)
                                                <p class="font-medium text-gray-700">{{ $broadcast->template->name }}</p>
                                            @else
                                                <p class="text-xs italic text-gray-400">{{ __('Template removed') }}</p>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 text-gray-600">{{ ucfirst(str_replace('-', ' ', $broadcast->audience)) }}</td>
                                        <td class="px-3 py-3">
                                            @switch($broadcast->status)
                                                @case('sent')
                                                    <span class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Sent') }}</span>
                                                    @break
                                                @case('queued')
                                                    <span class="inline-flex rounded-full bg-amber-100 px-2 text-xs font-semibold uppercase tracking-wide text-amber-700">{{ __('Queued') }}</span>
                                                    @break
                                                @case('failed')
                                                    <span class="inline-flex rounded-full bg-rose-100 px-2 text-xs font-semibold uppercase tracking-wide text-rose-700">{{ __('Failed') }}</span>
                                                    @break
                                                @default
                                                    <span class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ ucfirst($broadcast->status) }}</span>
                                            @endswitch
                                        </td>
                                        <td class="px-3 py-3 text-right text-gray-600">{{ number_format($broadcast->recipients_count) }}</td>
                                        <td class="px-3 py-3 text-right text-emerald-600">{{ number_format($broadcast->sent_recipients_count) }}</td>
                                        <td class="px-3 py-3 text-right text-rose-600">{{ number_format($broadcast->failed_recipients_count) }}</td>
                                        <td class="px-3 py-3 text-right text-sky-600">{{ number_format($broadcast->clicks_count) }}</td>
                                        <td class="px-3 py-3 text-right text-gray-500">
                                            {{ optional($broadcast->sent_at)->format('Y-m-d H:i') ?? __('—') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-3 py-6 text-center text-gray-500">{{ __('No broadcasts found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $broadcasts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
