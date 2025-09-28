<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('External Sources') }}
            </h2>
            <a href="{{ route('admin.external-sources.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('New Source') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
            @endif
            @if (session('error'))
                <div class="mb-4 rounded-md bg-red-50 p-4 text-sm text-red-600">{{ session('error') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">{{ __('Name') }}</th>
                                <th class="px-3 py-2">{{ __('Slug') }}</th>
                                <th class="px-3 py-2">{{ __('Driver') }}</th>
                                <th class="px-3 py-2">{{ __('Base URL') }}</th>
                                <th class="px-3 py-2 text-center">{{ __('Active') }}</th>
                                <th class="px-3 py-2">{{ __('Last Synced') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($sources as $source)
                                <tr>
                                    <td class="px-3 py-3 font-medium text-gray-900">
                                        <a href="{{ route('admin.external-sources.show', $source) }}" class="hover:underline">{{ $source->name }}</a>
                                    </td>
                                    <td class="px-3 py-3 text-gray-500">{{ $source->slug }}</td>
                                    <td class="px-3 py-3 text-gray-500">{{ $source->driver }}</td>
                                    <td class="px-3 py-3 text-gray-500">{{ $source->base_url ?? '—' }}</td>
                                    <td class="px-3 py-3 text-center">
                                        @if ($source->is_active)
                                            <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold text-green-800">{{ __('Yes') }}</span>
                                        @else
                                            <span class="inline-flex rounded-full bg-gray-100 px-2 text-xs font-semibold text-gray-600">{{ __('No') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-3 py-3 text-gray-500">{{ optional($source->last_synced_at)->diffForHumans() ?? '—' }}</td>
                                    <td class="px-3 py-3 text-right">
                                        <div class="flex justify-end gap-2">
                                            <form method="POST" action="{{ route('admin.external-sources.sync', $source) }}">
                                                @csrf
                                                <button type="submit" class="inline-flex items-center rounded-md bg-slate-200 px-3 py-2 text-sm font-semibold text-slate-700 shadow-sm transition hover:bg-slate-300">{{ __('Sync') }}</button>
                                            </form>
                                            <form method="GET" action="{{ route('admin.external-sources.edit', $source) }}">
                                                <button type="submit" class="btn-edit">{{ __('Edit') }}</button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.external-sources.destroy', $source) }}" onsubmit="return confirm('{{ __('Delete this source?') }}')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500">{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="px-3 py-6 text-center text-gray-500">{{ __('No external sources found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $sources->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
