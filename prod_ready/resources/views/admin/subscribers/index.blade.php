<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Newsletter Subscribers') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    <form method="GET" action="{{ route('admin.subscribers.index') }}" class="grid gap-4 md:grid-cols-[1fr_auto_auto]">
                        <div>
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search by email') }}</label>
                            <input
                                id="q"
                                name="q"
                                type="search"
                                value="{{ $search }}"
                                placeholder="john@example.com"
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
                                <option value="subscribed" @selected($status === 'subscribed')>{{ __('Subscribed') }}</option>
                                <option value="unsubscribed" @selected($status === 'unsubscribed')>{{ __('Unsubscribed') }}</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.subscribers.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold text-gray-700">{{ trans_choice('Showing :count subscriber|Showing :count subscribers', $subscribers->total(), ['count' => $subscribers->total()]) }}</p>
                            <p class="text-xs text-gray-500">{{ __('Page :current of :last', ['current' => $subscribers->currentPage(), 'last' => $subscribers->lastPage()]) }}</p>
                        </div>
                        {{ $subscribers->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Email') }}</th>
                                    <th class="px-3 py-2">{{ __('Status') }}</th>
                                    <th class="px-3 py-2">{{ __('Subscribed') }}</th>
                                    <th class="px-3 py-2">{{ __('Last Updated') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($subscribers as $subscriber)
                                    <tr>
                                        <td class="px-3 py-3 font-medium text-slate-800">{{ $subscriber->email }}</td>
                                        <td class="px-3 py-3">
                                            @if ($subscriber->status === 'subscribed')
                                                <span class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Subscribed') }}</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold uppercase tracking-wide text-slate-500">{{ __('Unsubscribed') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 text-slate-600">
                                            {{ optional($subscriber->subscribed_at)->format('Y-m-d H:i') ?? '—' }}
                                        </td>
                                        <td class="px-3 py-3 text-slate-600">
                                            {{ $subscriber->updated_at->format('Y-m-d H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-3 py-6 text-center text-slate-500">{{ __('No subscribers yet.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $subscribers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
