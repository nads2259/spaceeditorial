<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $category->name }}
            </h2>
            <a href="{{ route('admin.categories.edit', $category) }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Edit') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Slug') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->slug }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Sort Order') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->sort_order }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Active') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->is_active ? __('Yes') : __('No') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Image URL') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->image_path ?? '—' }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">{{ __('Description') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $category->description ?? '—' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Subcategories') }}</h3>
                    <ul class="space-y-3">
                        @forelse ($category->subcategories as $subcategory)
                            <li class="flex items-center justify-between rounded-lg border border-gray-200 p-4">
                                <div>
                                    <div class="font-medium text-gray-900">{{ $subcategory->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $subcategory->slug }}</div>
                                </div>
                                <a href="{{ route('admin.subcategories.edit', $subcategory) }}" class="text-indigo-600 hover:text-indigo-500">{{ __('Manage') }}</a>
                            </li>
                        @empty
                            <li class="text-sm text-gray-500">{{ __('No subcategories yet.') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">{{ __('Recent Posts') }}</h3>
                    <ul class="space-y-3">
                        @forelse ($category->posts->take(10) as $post)
                            <li class="flex items-center justify-between rounded-lg border border-gray-200 p-4">
                                <div>
                                    <div class="font-medium text-gray-900">{{ $post->title }}</div>
                                    <div class="text-sm text-gray-500">{{ optional($post->published_at)->toFormattedDateString() }}</div>
                                </div>
                                <a href="{{ route('admin.posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-500">{{ __('Manage') }}</a>
                            </li>
                        @empty
                            <li class="text-sm text-gray-500">{{ __('No posts yet.') }}</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
