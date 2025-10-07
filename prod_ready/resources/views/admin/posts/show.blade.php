<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $post->title }}
            </h2>
            <form method="GET" action="{{ route('admin.posts.edit', $post) }}">
                <button type="submit" class="btn-edit px-4">{{ __('Edit') }}</button>
            </form>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <dl class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Slug') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->slug }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Category') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->category->name ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Subcategory') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->subcategory->name ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Published') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->is_published ? __('Yes') : __('No') }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Published At') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ optional($post->published_at)->toDayDateTimeString() }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Image') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->image_path ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('Original URL') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->original_url ?? '—' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">{{ __('External Source') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $post->externalSource->name ?? '—' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-4">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Excerpt') }}</h3>
                    <p class="text-sm text-gray-700">{{ $post->excerpt ?? '—' }}</p>
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Body') }}</h3>
                    <article class="prose max-w-none">
                        {!! $post->body !!}
                    </article>
                </div>
            </div>

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900">{{ __('Meta') }}</h3>
                    <pre class="mt-3 overflow-x-auto rounded-lg bg-gray-100 p-4 text-xs">{{ json_encode($post->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) }}</pre>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
