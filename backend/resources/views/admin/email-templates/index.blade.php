<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Email Templates') }}
            </h2>
            <a href="{{ route('admin.email-templates.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Create template') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-3 py-2">{{ __('Name') }}</th>
                                    <th class="px-3 py-2">{{ __('Audience') }}</th>
                                    <th class="px-3 py-2">{{ __('Slug') }}</th>
                                    <th class="px-3 py-2">{{ __('Status') }}</th>
                                    <th class="px-3 py-2">{{ __('Updated') }}</th>
                                    <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse ($templates as $template)
                                    <tr>
                                        <td class="px-3 py-3 font-semibold text-slate-800">{{ $template->name }}</td>
                                        <td class="px-3 py-3 text-slate-600">{{ ucfirst(str_replace('-', ' ', $template->audience)) }}</td>
                                        <td class="px-3 py-3 text-xs text-slate-500">{{ $template->slug }}</td>
                                        <td class="px-3 py-3">
                                            @if ($template->is_active)
                                                <span class="inline-flex rounded-full bg-emerald-100 px-2 text-xs font-semibold uppercase tracking-wide text-emerald-700">{{ __('Active') }}</span>
                                            @else
                                                <span class="inline-flex rounded-full bg-slate-100 px-2 text-xs font-semibold uppercase tracking-wide text-slate-600">{{ __('Inactive') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-3 py-3 text-slate-500">{{ $template->updated_at->format('Y-m-d H:i') }}</td>
                                        <td class="px-3 py-3 text-right">
                                            <div class="flex flex-wrap items-center justify-end gap-2">
                                                <a href="{{ route('admin.email-templates.preview', $template) }}" class="inline-flex items-center rounded-md border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:bg-slate-100">{{ __('Preview') }}</a>
                                                <a href="{{ route('admin.email-templates.edit', $template) }}" class="inline-flex items-center rounded-md border border-indigo-200 bg-indigo-50 px-3 py-1.5 text-xs font-semibold text-indigo-600 hover:bg-indigo-100">{{ __('Edit / Send') }}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-3 py-6 text-center text-slate-500">{{ __('No email templates yet.') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $templates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
