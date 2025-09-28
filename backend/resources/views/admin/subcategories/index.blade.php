<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Subcategories') }}
            </h2>
            <a href="{{ route('admin.subcategories.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
                {{ __('New Subcategory') }}
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Name') }}</th>
                                    <th class="px-3 py-2">{{ __('Category') }}</th>
                                    <th class="px-3 py-2">{{ __('Slug') }}</th>
                                    <th class="px-3 py-2 text-center">{{ __('Active') }}</th>
                                    <th class="px-3 py-2">{{ __('Updated') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($subcategories as $subcategory)
                                    <tr>
                                        <td class="px-3 py-3 font-medium text-gray-900">
                                            <a href="{{ route('admin.subcategories.show', $subcategory) }}" class="hover:underline">
                                                {{ $subcategory->name }}
                                            </a>
                                        </td>
                                        <td class="px-3 py-3 text-gray-500">{{ $subcategory->category->name ?? '—' }}</td>
                                        <td class="px-3 py-3 text-gray-500">{{ $subcategory->slug }}</td>
                                        <td class="px-3 py-3 text-center">
                                            @if ($subcategory->is_active)
                                                <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">{{ __('Yes') }}</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold text-gray-600">{{ __('No') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 text-gray-500">{{ optional($subcategory->updated_at)->diffForHumans() }}</td>
                                        <td class="px-3 py-3 text-right">
                                            <div class="flex justify-end gap-2">
                                                <form method="GET" action="{{ route('admin.subcategories.edit', $subcategory) }}">
                                                    <button type="submit" class="btn-edit">{{ __('Edit') }}</button>
                                                </form>
                                                <form method="POST" action="{{ route('admin.subcategories.destroy', $subcategory) }}" onsubmit="return confirm('{{ __('Delete this subcategory?') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">{{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-3 py-6 text-center text-gray-500">{{ __('No subcategories found.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $subcategories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
