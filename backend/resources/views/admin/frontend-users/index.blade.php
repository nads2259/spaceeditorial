<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Frontend Users') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="GET" action="{{ route('admin.frontend-users.index') }}" class="grid gap-4 md:grid-cols-[1fr_auto]">
                        <div>
                            <label for="q" class="block text-sm font-medium text-gray-700">{{ __('Search by name or email') }}</label>
                            <input
                                id="q"
                                name="q"
                                type="search"
                                value="{{ $search }}"
                                placeholder="jane@example.com"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            />
                        </div>
                        <div class="flex items-end gap-3">
                            <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Filter') }}</button>
                            <a href="{{ route('admin.frontend-users.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Reset') }}</a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Name') }}</th>
                                    <th class="px-3 py-2">{{ __('Email') }}</th>
                                    <th class="px-3 py-2">{{ __('Status') }}</th>
                                    <th class="px-3 py-2">{{ __('Registered') }}</th>
                                    <th class="px-3 py-2">{{ __('Last Visit') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Visits') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Clicks') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($users as $user)
                                    <tr>
                                        <td class="px-3 py-3 font-medium text-slate-800">{{ $user->name }}</td>
                                        <td class="px-3 py-3 text-slate-600">{{ $user->email }}</td>
                                        <td class="px-3 py-3">
                                            @switch($user->status)
                                                @case('active')
                                                    <span class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Active') }}</span>
                                                    @break
                                                @case('suspended')
                                                    <span class="inline-flex rounded-full bg-rose-100 px-2 text-xs font-semibold uppercase tracking-wide text-rose-700">{{ __('Suspended') }}</span>
                                                    @break
                                                @default
                                                    <span class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ __('Inactive') }}</span>
                                            @endswitch
                                        </td>
                                        <td class="px-3 py-3 text-slate-500">{{ $user->created_at?->format('Y-m-d H:i') }}</td>
                                        <td class="px-3 py-3 text-slate-500">{{ optional($user->last_visit_at)->format('Y-m-d H:i') ?? '—' }}</td>
                                        <td class="px-3 py-3 text-right font-semibold text-slate-700">{{ number_format($user->visit_logs_count) }}</td>
                                        <td class="px-3 py-3 text-right font-semibold text-slate-700">{{ number_format($user->click_logs_count) }}</td>
                                        <td class="px-3 py-3 text-right">
                                            <a href="{{ route('admin.frontend-users.show', $user) }}" class="inline-flex items-center rounded-md border border-indigo-200 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600 hover:bg-indigo-100">{{ __('View') }}</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-3 py-6 text-center text-slate-500">{{ __('No frontend users found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
