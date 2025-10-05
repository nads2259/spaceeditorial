<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold text-gray-800">{{ __('Preview Template') }}</h2>
            <a href="{{ route('admin.email-templates.edit', $template) }}" class="inline-flex items-center rounded-md border border-slate-200 px-4 py-2 text-sm font-semibold text-slate-600 shadow-sm hover:bg-slate-100">{{ __('Back to template') }}</a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto flex max-w-5xl flex-col gap-6">
            <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-200 px-6 py-4">
                    <h3 class="text-lg font-semibold text-slate-900">{{ $template->subject }}</h3>
                    <p class="text-sm text-slate-500">{{ $template->description }}</p>
                </div>
                <div class="max-h-[70vh] overflow-auto px-6 py-6">
                    <div class="prose max-w-none">
                        {!! $template->html_body !!}
                    </div>
                </div>
            </div>

            @if($template->text_body)
                <div class="rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <div class="border-b border-slate-200 px-6 py-4">
                        <h3 class="text-lg font-semibold text-slate-900">{{ __('Plain Text Version') }}</h3>
                    </div>
                    <pre class="overflow-auto px-6 py-6 text-sm text-slate-700">{{ $template->text_body }}</pre>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
