<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Site Settings') }}
            </h2>
            <a href="{{ route('admin.site-settings.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('New Setting') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">{{ __('Key') }}</th>
                                <th class="px-3 py-2">{{ __('Value Preview') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($settings as $setting)
                                <tr>
                                    <td class="px-3 py-3 font-medium text-gray-900">{{ $setting->key }}</td>
                                    <td class="px-3 py-3 text-gray-700">
                                        <code class="text-xs">{{ \Illuminate\Support\Str::limit(json_encode($setting->value), 80) }}</code>
                                    </td>
                                    <td class="px-3 py-3 text-right">
                                        <div class="flex justify-end gap-2">
                                            <form method="GET" action="{{ route('admin.site-settings.edit', $setting) }}">
                                                <button type="submit" class="btn-edit">{{ __('Edit') }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.site-settings.destroy', $setting) }}" onsubmit="return confirm('{{ __('Delete this setting?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-3 py-6 text-center text-gray-500">{{ __('No settings defined.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $settings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
