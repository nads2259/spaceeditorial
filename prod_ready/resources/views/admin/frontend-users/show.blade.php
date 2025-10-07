<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $user->name }}
                </h2>
                <p class="text-sm text-gray-500">{{ $user->email }}</p>
            </div>
            <div class="flex items-center gap-3">
                <form method="POST" action="{{ route('admin.frontend-users.destroy', $user) }}" onsubmit="return confirm('{{ __('Delete this user? This cannot be undone.') }}')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center rounded-md border border-rose-300 bg-rose-50 px-4 py-2 text-sm font-semibold text-rose-700 shadow-sm hover:bg-rose-100">
                        {{ __('Delete') }}
                    </button>
                </form>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-md bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            <div class="grid gap-6 lg:grid-cols-[1fr_320px]">
                <div class="space-y-6">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <h3 class="text-lg font-semibold text-slate-900">{{ __('Account Overview') }}</h3>
                            <dl class="grid gap-3 sm:grid-cols-2">
                                <div>
                                    <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Status') }}</dt>
                                    <dd class="mt-1 text-sm font-semibold text-slate-700">{{ ucfirst($user->status) }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Registered') }}</dt>
                                    <dd class="mt-1 text-sm text-slate-600">{{ $user->created_at?->format('Y-m-d H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Last Login') }}</dt>
                                    <dd class="mt-1 text-sm text-slate-600">{{ $user->last_login_at?->format('Y-m-d H:i') ?? '—' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Last Visit') }}</dt>
                                    <dd class="mt-1 text-sm text-slate-600">{{ $recentVisits->first()?->created_at?->format('Y-m-d H:i') ?? '—' }}</dd>
                                </div>
                            </dl>
                            <form method="POST" action="{{ route('admin.frontend-users.update', $user) }}" class="mt-4">
                                @csrf
                                @method('PUT')
                                <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Update status') }}</label>
                                <div class="mt-2 flex items-center gap-3">
                                    <select id="status" name="status" class="block w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <option value="active" @selected($user->status === 'active')>{{ __('Active') }}</option>
                                        <option value="inactive" @selected($user->status === 'inactive')>{{ __('Inactive') }}</option>
                                        <option value="suspended" @selected($user->status === 'suspended')>{{ __('Suspended') }}</option>
                                    </select>
                                    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Recent Visits') }}</h3>
                                <span class="text-xs uppercase tracking-wider text-slate-400">{{ trans_choice(':count visit|:count visits', $user->visit_logs_count, ['count' => $user->visit_logs_count]) }}</span>
                            </div>
                            <div class="space-y-3">
                                @forelse ($recentVisits as $visit)
                                    <div class="rounded-lg border border-slate-100 bg-slate-50/60 px-4 py-3 text-sm">
                                        <p class="font-semibold text-slate-700">{{ $visit->url }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $visit->created_at->format('Y-m-d H:i') }}</p>
                                        @if ($visit->referrer)
                                            <p class="mt-1 text-xs text-slate-400">{{ __('From:') }} {{ $visit->referrer }}</p>
                                        @endif
                                    </div>
                                @empty
                                    <p class="text-sm text-slate-500">{{ __('No visits recorded yet.') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Recent Clicks') }}</h3>
                                <span class="text-xs uppercase tracking-wider text-slate-400">{{ trans_choice(':count click|:count clicks', $user->click_logs_count, ['count' => $user->click_logs_count]) }}</span>
                            </div>
                            <div class="space-y-3">
                                @forelse ($recentClicks as $click)
                                    <div class="rounded-lg border border-slate-100 bg-white px-4 py-3 text-sm">
                                        <p class="font-semibold text-slate-700">{{ $click->label ?? __('Unnamed click') }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $click->created_at->format('Y-m-d H:i') }}</p>
                                        <p class="mt-1 text-xs text-slate-400">{{ $click->url }}</p>
                                    </div>
                                @empty
                                    <p class="text-sm text-slate-500">{{ __('No click activity recorded yet.') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-4">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold text-slate-900">{{ __('Recent Contact Messages') }}</h3>
                                <span class="text-xs uppercase tracking-wider text-slate-400">{{ trans_choice(':count message|:count messages', $user->contact_messages_count, ['count' => $user->contact_messages_count]) }}</span>
                            </div>
                            <div class="space-y-3">
                                @forelse ($recentContacts as $message)
                                    <div class="rounded-lg border border-slate-100 bg-white px-4 py-3 text-sm">
                                        <p class="font-semibold text-slate-700">{{ $message->subject ?? __('(No subject)') }}</p>
                                        <p class="mt-1 text-xs text-slate-500">{{ $message->created_at->format('Y-m-d H:i') }} • {{ ucfirst($message->status) }}</p>
                                        <p class="mt-2 text-slate-600 line-clamp-3">{{ $message->message }}</p>
                                        <a href="{{ route('admin.contact-messages.show', $message) }}" class="mt-3 inline-flex items-center text-xs font-semibold text-indigo-600 hover:underline">{{ __('View message') }}</a>
                                    </div>
                                @empty
                                    <p class="text-sm text-slate-500">{{ __('No contact messages yet.') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-3">
                            <h3 class="text-lg font-semibold text-slate-900">{{ __('Visitor Identifiers') }}</h3>
                            <p class="text-sm text-slate-500">{{ __('Mapped visitor IDs linked to this account.') }}</p>
                            <div class="space-y-2">
                                @forelse ($visitorIds as $visitorId)
                                    <code class="block rounded bg-slate-800 px-2 py-1 text-xs text-slate-100">{{ $visitorId }}</code>
                                @empty
                                    <p class="text-sm text-slate-500">{{ __('No visitor IDs captured yet.') }}</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="bg-white shadow-sm sm:rounded-lg">
                        <div class="p-6 space-y-3">
                            <h3 class="text-lg font-semibold text-slate-900">{{ __('At a Glance') }}</h3>
                            <dl class="space-y-3 text-sm">
                                <div class="flex items-center justify-between">
                                    <dt class="text-slate-500">{{ __('Total visits') }}</dt>
                                    <dd class="font-semibold text-slate-700">{{ number_format($user->visit_logs_count) }}</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-slate-500">{{ __('Total clicks logged') }}</dt>
                                    <dd class="font-semibold text-slate-700">{{ number_format($user->click_logs_count) }}</dd>
                                </div>
                                <div class="flex items-center justify-between">
                                    <dt class="text-slate-500">{{ __('Messages sent') }}</dt>
                                    <dd class="font-semibold text-slate-700">{{ number_format($user->contact_messages_count) }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
