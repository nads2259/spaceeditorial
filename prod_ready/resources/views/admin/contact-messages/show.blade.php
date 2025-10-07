<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Message from :name', ['name' => $messageRecord->name]) }}
                </h2>
                <p class="text-sm text-gray-500">{{ $messageRecord->email }}</p>
            </div>
            <a href="{{ route('admin.contact-messages.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Back') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto space-y-6 sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-md bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-4">
                    <dl class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Submitted at') }}</dt>
                            <dd class="mt-1 text-sm text-slate-700">{{ $messageRecord->created_at->format('Y-m-d H:i') }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Status') }}</dt>
                            <dd class="mt-1 text-sm font-semibold text-slate-700">{{ ucfirst(str_replace('_', ' ', $messageRecord->status)) }}</dd>
                        </div>
                        <div>
                            <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('Origin') }}</dt>
                            <dd class="mt-1 text-sm text-slate-700">{{ $messageRecord->is_guest ? __('Guest') : __('Frontend user') }}</dd>
                        </div>
                        @if ($messageRecord->frontendUser)
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('User profile') }}</dt>
                                <dd class="mt-1 text-sm text-indigo-600">
                                    <a href="{{ route('admin.frontend-users.show', $messageRecord->frontendUser) }}" class="hover:underline">{{ $messageRecord->frontendUser->name }}</a>
                                </dd>
                            </div>
                        @endif
                        @if ($messageRecord->ip_address)
                            <div>
                                <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('IP Address') }}</dt>
                                <dd class="mt-1 text-sm text-slate-700">{{ $messageRecord->ip_address }}</dd>
                            </div>
                        @endif
                        @if ($messageRecord->user_agent)
                            <div class="sm:col-span-2">
                                <dt class="text-xs uppercase tracking-wide text-slate-400">{{ __('User agent') }}</dt>
                                <dd class="mt-1 text-sm text-slate-600">{{ $messageRecord->user_agent }}</dd>
                            </div>
                        @endif
                    </dl>

                    <div class="rounded-lg border border-slate-200 bg-slate-50/70 px-4 py-3">
                        <h3 class="text-sm font-semibold text-slate-700">{{ __('Subject') }}</h3>
                        <p class="mt-1 text-sm text-slate-600">{{ $messageRecord->subject ?? __('(No subject provided)') }}</p>
                    </div>

                    <div class="rounded-lg border border-slate-200 bg-white px-4 py-4">
                        <h3 class="text-sm font-semibold text-slate-700">{{ __('Message') }}</h3>
                        <p class="mt-2 whitespace-pre-line text-slate-700">{{ $messageRecord->message }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.contact-messages.update', $messageRecord) }}" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">{{ __('Update status') }}</label>
                            <select id="status" name="status" class="mt-2 block w-48 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="new" @selected($messageRecord->status === 'new')>{{ __('New') }}</option>
                                <option value="in_progress" @selected($messageRecord->status === 'in_progress')>{{ __('In progress') }}</option>
                                <option value="resolved" @selected($messageRecord->status === 'resolved')>{{ __('Resolved') }}</option>
                            </select>
                        </div>
                        <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save changes') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
