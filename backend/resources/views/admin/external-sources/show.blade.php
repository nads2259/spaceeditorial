<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $source->name }}
            </h2>
            <a href="{{ route('admin.external-sources.edit', $source) }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Edit') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Slug') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $source->slug }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Driver') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $source->driver }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Base URL') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $source->base_url ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Active') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $source->is_active ? __('Yes') : __('No') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Last Synced At') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ optional($source->last_synced_at)->toDayDateTimeString() ?? '—' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Config') }}</h3>
                    <pre class="mt-3 overflow-x-auto rounded-lg bg-gray-100 p-4 text-xs">{{ json_encode($source->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
