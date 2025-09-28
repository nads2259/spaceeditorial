@csrf
@if(isset($mapping) && $mapping->exists)
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
    <div>
        <label for="external_source_id" class="block text-sm font-medium text-gray-700">{{ __('External Source') }}</label>
        <select id="external_source_id" name="external_source_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('Select Source') }} —</option>
            @foreach ($sources as $source)
                <option value="{{ $source->id }}" @selected(old('external_source_id', $mapping->external_source_id) == $source->id)>{{ $source->name }}</option>
            @endforeach
        </select>
        @error('external_source_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="provider_category" class="block text-sm font-medium text-gray-700">{{ __('Provider Category') }}</label>
        <input id="provider_category" name="provider_category" type="text" value="{{ old('provider_category', $mapping->provider_category) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="e.g. business">
        @error('provider_category')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="category_id" class="block text-sm font-medium text-gray-700">{{ __('Category') }}</label>
        <select id="category_id" name="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('Select Category') }} —</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('category_id', $mapping->category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="subcategory_id" class="block text-sm font-medium text-gray-700">{{ __('Subcategory') }}</label>
        <select id="subcategory_id" name="subcategory_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            <option value="">— {{ __('None') }} —</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" data-category="{{ $subcategory->category_id }}" @selected(old('subcategory_id', $mapping->subcategory_id) == $subcategory->id)>{{ $subcategory->name }}</option>
            @endforeach
        </select>
        @error('subcategory_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.category-mappings.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
</div>

@push('scripts')
    <script>
        const categorySelect = document.getElementById('category_id');
        const subcategorySelect = document.getElementById('subcategory_id');
        if (categorySelect && subcategorySelect) {
            const options = Array.from(subcategorySelect.options);
            const filterOptions = () => {
                const categoryId = categorySelect.value;
                subcategorySelect.innerHTML = '';
                const blank = document.createElement('option');
                blank.value = '';
                blank.textContent = '— {{ __('None') }} —';
                subcategorySelect.appendChild(blank);
                options.forEach(option => {
                    if (!option.dataset.category || !categoryId || option.dataset.category === categoryId) {
                        subcategorySelect.appendChild(option);
                    }
                });
            };
            categorySelect.addEventListener('change', filterOptions);
            filterOptions();
        }
    </script>
@endpush
