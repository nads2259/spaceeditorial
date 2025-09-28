@csrf
@if(isset($post) && $post->exists)
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">{{ __('Title') }}</label>
        <input id="title" name="title" type="text" value="{{ old('title', $post->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('title')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">{{ __('Slug') }}</label>
        <input id="slug" name="slug" type="text" value="{{ old('slug', $post->slug) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
        <select id="category_id" name="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('Select Category') }} —</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="subcategory_id" class="block text-sm font-medium text-gray-700">{{ __('Subcategory') }}</label>
        <select id="subcategory_id" name="subcategory_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('None') }} —</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" data-category="{{ $subcategory->category_id }}" @selected(old('subcategory_id', $post->subcategory_id) == $subcategory->id)>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        </select>
        <p class="mt-1 text-xs text-gray-500">{{ __('Filtered automatically after saving; ensure it belongs to the category.') }}</p>
        @error('subcategory_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="external_source_id" class="block text-sm font-medium text-gray-700">{{ __('External Source') }}</label>
        <select id="external_source_id" name="external_source_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('None') }} —</option>
            @foreach ($sources as $source)
                <option value="{{ $source->id }}" @selected(old('external_source_id', $post->external_source_id) == $source->id)>{{ $source->name }}</option>
            @endforeach
        </select>
        @error('external_source_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="external_id" class="block text-sm font-medium text-gray-700">{{ __('External ID') }}</label>
        <input id="external_id" name="external_id" type="text" value="{{ old('external_id', $post->external_id) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('external_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="published_at" class="block text-sm font-medium text-gray-700">{{ __('Published At') }}</label>
        <input id="published_at" name="published_at" type="datetime-local" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('published_at')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="flex items-center">
        <input id="is_published" name="is_published" type="checkbox" value="1" {{ old('is_published', $post->is_published ?? true) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        <label for="is_published" class="ml-2 block text-sm text-gray-700">{{ __('Published') }}</label>
    </div>
    <div class="lg:col-span-2">
        <label for="excerpt" class="block text-sm font-medium text-gray-700">{{ __('Excerpt') }}</label>
        <textarea id="excerpt" name="excerpt" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('excerpt', $post->excerpt) }}</textarea>
        @error('excerpt')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="lg:col-span-2">
        <label for="body" class="block text-sm font-medium text-gray-700">{{ __('Body HTML') }}</label>
        <textarea id="body" name="body" rows="10" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('body', $post->body) }}</textarea>
        @error('body')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="image_path" class="block text-sm font-medium text-gray-700">{{ __('Image URL') }}</label>
        <input id="image_path" name="image_path" type="text" value="{{ old('image_path', $post->image_path) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('image_path')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="original_url" class="block text-sm font-medium text-gray-700">{{ __('Original URL') }}</label>
        <input id="original_url" name="original_url" type="url" value="{{ old('original_url', $post->original_url) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('original_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="lg:col-span-2">
        <label for="meta" class="block text-sm font-medium text-gray-700">{{ __('Meta JSON') }}</label>
        <textarea id="meta" name="meta" rows="4" class="font-mono mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('meta', $post->meta ? json_encode($post->meta, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : '') }}</textarea>
        @error('meta')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
</div>
