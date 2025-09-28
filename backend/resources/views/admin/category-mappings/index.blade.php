<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('External Category Mappings') }}
            </h2>
            <a href="{{ route('admin.category-mappings.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('New Mapping') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">{{ __('Source') }}</th>
                                <th class="px-3 py-2">{{ __('Provider Category') }}</th>
                                <th class="px-3 py-2">{{ __('Category') }}</th>
                                <th class="px-3 py-2">{{ __('Subcategory') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($mappings as $mapping)
                                <tr>
                                    <td class="px-3 py-3 text-gray-900">{{ $mapping->externalSource->name ?? '—' }}</td>
                                    <td class="px-3 py-3 font-mono text-gray-700 lowercase">{{ $mapping->provider_category }}</td>
                                    <td class="px-3 py-3 text-gray-700">{{ $mapping->category->name ?? '—' }}</td>
                                    <td class="px-3 py-3 text-gray-700">{{ $mapping->subcategory->name ?? '—' }}</td>
                                    <td class="px-3 py-3 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.category-mappings.edit', $mapping) }}" class="inline-flex items-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Edit') }}</a>
                                            <form method="POST" action="{{ route('admin.category-mappings.destroy', $mapping) }}" onsubmit="return confirm('{{ __('Delete this mapping?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-3 py-6 text-center text-gray-500">{{ __('No mappings configured.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $mappings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
