@csrf
@if(isset($subcategory) && $subcategory->exists)
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
        <select id="category_id" name="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('Select Category') }} —</option>
            @foreach ($categories as $categoryOption)
                <option value="{{ $categoryOption->id }}" @selected(old('category_id', $subcategory->category_id) == $categoryOption->id)>
                    {{ $categoryOption->name }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $subcategory->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">{{ __('Slug') }}</label>
        <input id="slug" name="slug" type="text" value="{{ old('slug', $subcategory->slug) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="{{ __('Auto-generated if empty') }}">
        @error('slug')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="sort_order" class="block text-sm font-medium text-gray-700">{{ __('Sort Order') }}</label>
        <input id="sort_order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $subcategory->sort_order ?? 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('sort_order')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="image_path" class="block text-sm font-medium text-gray-700">{{ __('Image URL') }}</label>
        <input id="image_path" name="image_path" type="text" value="{{ old('image_path', $subcategory->image_path) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('image_path')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="sm:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
        <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $subcategory->description) }}</textarea>
        @error('description')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center">
        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $subcategory->is_active ?? true) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        <label for="is_active" class="ml-2 block text-sm text-gray-700">{{ __('Active') }}</label>
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.subcategories.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">
        {{ __('Save') }}
    </button>
</div>
