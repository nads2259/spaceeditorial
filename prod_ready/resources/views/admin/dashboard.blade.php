<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="grid gap-4 md:grid-cols-3 xl:grid-cols-6">
                <x-dashboard.stat-card
                    title="{{ __('Total Posts') }}"
                    :value="$summary['posts']"
                    color="indigo"
                />
                <x-dashboard.stat-card
                    title="{{ __('Categories') }}"
                    :value="$summary['categories']"
                    color="emerald"
                />
                <x-dashboard.stat-card
                    title="{{ __('Subcategories') }}"
                    :value="$summary['subcategories']"
                    color="sky"
                />
                <x-dashboard.stat-card
                    title="{{ __('Sources') }}"
                    :value="$summary['sources']"
                    color="amber"
                />
                <x-dashboard.stat-card
                    title="{{ __('Total Visits') }}"
                    :value="$summary['visits']"
                    color="rose"
                />
                <x-dashboard.stat-card
                    title="{{ __('Subscribers') }}"
                    :value="$summary['subscribers']"
                    color="purple"
                />
                <x-dashboard.stat-card
                    title="{{ __('Frontend Users') }}"
                    :value="$summary['frontend_users']"
                    color="cyan"
                />
                <x-dashboard.stat-card
                    title="{{ __('Contact Messages') }}"
                    :value="$summary['contacts']"
                    color="lime"
                />
                <x-dashboard.stat-card
                    title="{{ __('Click Events') }}"
                    :value="$summary['clicks']"
                    color="slate"
                />
                <x-dashboard.stat-card
                    title="{{ __('Comments') }}"
                    :value="$summary['comments']"
                    color="fuchsia"
                />
            </div>

            <div class="space-y-6">
                <div class="grid gap-6 lg:grid-cols-2">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Visits (last 14 days)') }}</h3>
                                <span class="text-xs uppercase tracking-wider text-slate-400">{{ __('Realtime snapshot') }}</span>
                            </div>
                            <div
                                class="h-72 w-full"
                                data-chart-series='@json($visitsByDay)'
                                data-chart-title="{{ __('Visits (last 14 days)') }}"
                                data-chart-empty="{{ __('No visit data yet.') }}"
                                data-chart-unit-singular="{{ __('visit') }}"
                                data-chart-unit-plural="{{ __('visits') }}"
                                data-visits-chart
                                data-visits='@json($visitsByDay)'
                            ></div>
                        </div>
                    </div>
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex flex-wrap items-center justify-between gap-3">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Comments (last 14 days)') }}</h3>
                                <div class="text-xs text-slate-500 space-x-2">
                                    <span>{{ __('Pending:') }} {{ number_format($commentStatusSummary['pending']) }}</span>
                                    <span>{{ __('Published:') }} {{ number_format($commentStatusSummary['published']) }}</span>
                                    <span>{{ __('Rejected:') }} {{ number_format($commentStatusSummary['rejected']) }}</span>
                                </div>
                            </div>
                            <div
                                class="h-64 w-full"
                                data-chart-series='@json($commentsByDay)'
                                data-chart-title="{{ __('Comments (last 14 days)') }}"
                                data-chart-empty="{{ __('No comments yet.') }}"
                                data-chart-unit-singular="{{ __('comment') }}"
                                data-chart-unit-plural="{{ __('comments') }}"
                                data-visits-chart
                                data-visits='@json($commentsByDay)'
                            ></div>
                        </div>
                    </div>
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('New Readers (last 14 days)') }}</h3>
                            </div>
                            <div
                                class="h-64 w-full"
                                data-chart-series='@json($frontendUsersByDay)'
                                data-chart-title="{{ __('New Readers (last 14 days)') }}"
                                data-chart-empty="{{ __('No reader sign-ups yet.') }}"
                                data-chart-unit-singular="{{ __('registration') }}"
                                data-chart-unit-plural="{{ __('registrations') }}"
                                data-visits-chart
                                data-visits='@json($frontendUsersByDay)'
                            ></div>
                        </div>
                    </div>
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Subscribers (last 14 days)') }}</h3>
                            </div>
                            <div
                                class="h-64 w-full"
                                data-chart-series='@json($subscribersByDay)'
                                data-chart-title="{{ __('Subscribers (last 14 days)') }}"
                                data-chart-empty="{{ __('No subscriber activity yet.') }}"
                                data-chart-unit-singular="{{ __('subscriber') }}"
                                data-chart-unit-plural="{{ __('subscribers') }}"
                                data-visits-chart
                                data-visits='@json($subscribersByDay)'
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
                <div class="grid gap-6 lg:grid-cols-2">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <h3 class="text-lg font-semibold text-slate-900">{{ __('Top Pages') }}</h3>
                            <div class="space-y-3">
                                @forelse ($topPages as $page)
                                    <div class="rounded-lg border border-slate-100 bg-slate-50/70 px-3 py-2">
                                        <p class="truncate text-sm font-medium text-slate-700" title="{{ $page->url }}">{{ $page->url }}</p>
                                        <p class="text-xs text-slate-500">{{ trans_choice(':count visit|:count visits', $page->total, ['count' => $page->total]) }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-slate-500">{{ __('No visit data yet.') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <h3 class="text-lg font-semibold text-slate-900">{{ __('Quick Actions') }}</h3>
                            <div class="grid gap-3">
                                <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center rounded-lg border border-indigo-200 bg-indigo-50 px-4 py-3 text-sm font-semibold text-indigo-700 shadow-sm hover:bg-indigo-100">
                                    {{ __('Add Post') }}
                                </a>
                                <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 text-sm font-semibold text-teal-700 shadow-sm hover:bg-teal-100">
                                    {{ __('Add Category') }}
                                </a>
                                <a href="{{ route('admin.external-sources.index') }}" class="inline-flex items-center justify-center rounded-lg border border-purple-200 bg-purple-50 px-4 py-3 text-sm font-semibold text-purple-700 shadow-sm hover:bg-purple-100">
                                    {{ __('Manage Sources') }}
                                </a>
                                @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-700 shadow-sm hover:bg-rose-100">
                                        {{ __('Manage Users') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
