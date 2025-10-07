<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Contact Messages') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-4">
                    <form method="GET" action="{{ route('admin.contact-messages.index') }}" class="grid gap-4 md:grid-cols-[1fr_200px_auto]">
                        <div>
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search') }}</label>
                            <input
                                id="q"
                                name="q"
                                type="search"
                                value="{{ $search }}"
                                placeholder="{{ __('Name, email or subject') }}"
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
                                <option value="new" @selected($status === 'new')>{{ __('New') }}</option>
                                <option value="in_progress" @selected($status === 'in_progress')>{{ __('In progress') }}</option>
                                <option value="resolved" @selected($status === 'resolved')>{{ __('Resolved') }}</option>
                            </select>
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>

                    <div>
                        <p class="text-sm font-semibold text-gray-700">{{ trans_choice('Showing :count message|Showing :count messages', $messages->total(), ['count' => $messages->total()]) }}</p>
                        <p class="text-xs text-gray-500">{{ __('Page :current of :last', ['current' => $messages->currentPage(), 'last' => $messages->lastPage()]) }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Sender') }}</th>
                                    <th class="px-3 py-2">{{ __('Subject') }}</th>
                                    <th class="px-3 py-2">{{ __('Status') }}</th>
                                    <th class="px-3 py-2">{{ __('Created') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($messages as $message)
                                    <tr>
                                        <td class="px-3 py-3">
                                            <p class="font-semibold text-slate-800">{{ $message->name }}</p>
                                            <p class="text-xs text-slate-500">{{ $message->email }}</p>
                                            @if ($message->frontendUser)
                                                <p class="text-xs text-emerald-600">{{ __('Frontend user') }}</p>
                                            @else
                                                <p class="text-xs text-slate-400">{{ __('Guest') }}</p>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 text-slate-600">{{ $message->subject ?? __('(No subject)') }}</td>
                                        <td class="px-3 py-3">
                                            @switch($message->status)
                                                @case('in_progress')
                                                    <span class="inline-flex rounded-full bg-amber-100 px-2 text-xs font-semibold uppercase tracking-wide text-amber-700">{{ __('In progress') }}</span>
                                                    @break
                                                @case('resolved')
                                                    <span class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Resolved') }}</span>
                                                    @break
                                                @default
                                                    <span class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ __('New') }}</span>
                                            @endswitch
                                        </td>
                                        <td class="px-3 py-3 text-slate-500">{{ $message->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-3 py-3 text-right">
                                            <a href="{{ route('admin.contact-messages.show', $message) }}" class="inline-flex items-center rounded-md border border-indigo-200 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600 hover:bg-indigo-100">{{ __('View') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-3 py-6 text-center text-slate-500">{{ __('No messages found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
