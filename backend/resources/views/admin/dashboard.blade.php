<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6 text-gray-900">
                    <p>{{ __("Welcome back! Manage content using the quick actions below or the navigation links above.") }}</p>

                    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                        <a href="{{ route('admin.posts.create') }}" class="inline-flex items-center justify-center rounded-lg border border-indigo-200 bg-indigo-50 px-4 py-3 text-sm font-semibold text-indigo-700 shadow-sm hover:bg-indigo-100">
                            {{ __("Add Post") }}
                        </a>
                        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 text-sm font-semibold text-teal-700 shadow-sm hover:bg-teal-100">
                            {{ __("Add Category") }}
                        </a>
                        <a href="{{ route('admin.subcategories.create') }}" class="inline-flex items-center justify-center rounded-lg border border-blue-200 bg-blue-50 px-4 py-3 text-sm font-semibold text-blue-700 shadow-sm hover:bg-blue-100">
                            {{ __("Add Subcategory") }}
                        </a>
                        <a href="{{ route('admin.external-sources.create') }}" class="inline-flex items-center justify-center rounded-lg border border-purple-200 bg-purple-50 px-4 py-3 text-sm font-semibold text-purple-700 shadow-sm hover:bg-purple-100">
                            {{ __("Add Source") }}
                        </a>
                        <a href="{{ route('admin.category-mappings.create') }}" class="inline-flex items-center justify-center rounded-lg border border-amber-200 bg-amber-50 px-4 py-3 text-sm font-semibold text-amber-700 shadow-sm hover:bg-amber-100">
                            {{ __("Add Mapping") }}
                        </a>
                        @if (Auth::user()->role === 'admin')
                            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center justify-center rounded-lg border border-rose-200 bg-rose-50 px-4 py-3 text-sm font-semibold text-rose-700 shadow-sm hover:bg-rose-100">
                                {{ __("Add User") }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
