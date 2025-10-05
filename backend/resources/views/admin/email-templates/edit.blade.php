<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Email Template') }}
            </h2>
            <span class="text-sm text-slate-500">{{ $template->name }}</span>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto grid max-w-6xl gap-6 sm:px-6 lg:grid-cols-[2fr_1fr] lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.email-templates.update', $template) }}">
                        @method('PUT')
                        @include('admin.email-templates._form')
                    </form>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900">{{ __('Send Broadcast') }}</h3>
                        <p class="text-sm text-slate-500">{{ __('Choose who should receive this template. Links will be tracked automatically.') }}</p>
                        <form method="POST" action="{{ route('admin.email-templates.send', $template) }}" class="space-y-4">
                            @csrf
                            <div>
                                <label for="audience" class="block text-sm font-medium text-slate-700">{{ __('Audience') }}</label>
                                <select
                                    id="audience"
                                    name="audience"
                                    class="mt-1 block w-full rounded-lg border border-slate-200 px-3 py-2 text-sm text-slate-700 focus:border-indigo-500 focus:ring-indigo-500"
                                    required
                                >
                                    @foreach ($audiences as $audience)
                                        <option value="{{ $audience }}">{{ ucfirst(str_replace('-', ' ', $audience)) }}</option>
                                    @endforeach
                                </select>
                                @error('audience')
                                    <p class="mt-2 text-sm text-rose-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between gap-3">
                                <a href="{{ route('admin.email-templates.preview', $template) }}" target="_blank" class="inline-flex items-center rounded-md border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100">{{ __('Preview template') }}</a>
                                <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Send now') }}</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 space-y-4">
                        <h3 class="text-lg font-semibold text-slate-900">{{ __('Recent Broadcasts') }}</h3>
                        <div class="space-y-3">
                            @forelse ($broadcasts as $broadcast)
                                <div class="rounded-lg border border-slate-100 bg-slate-50/70 px-3 py-2">
                                    <p class="text-sm font-semibold text-slate-800">{{ $broadcast->subject }}</p>
                                    <p class="text-xs text-slate-500">{{ __('Audience:') }} {{ ucfirst(str_replace('-', ' ', $broadcast->audience)) }}</p>
                                    <p class="text-xs text-slate-500">{{ __('Sent:') }} {{ optional($broadcast->sent_at)->format('Y-m-d H:i') ?? __('Queued') }}</p>
                                    <p class="text-xs text-slate-500">{{ __('Recipients:') }} {{ number_format($broadcast->total_recipients) }} • {{ __('Delivered:') }} {{ number_format($broadcast->sent_count) }}</p>
                                </div>
                            @empty
                                <p class="text-sm text-slate-500">{{ __('No broadcasts yet.') }}</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
