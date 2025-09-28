@csrf
@if(isset($source) && $source->exists)
    @method('PUT')
@endif

<div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $source->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">{{ __('Slug') }}</label>
        <input id="slug" name="slug" type="text" value="{{ old('slug', $source->slug) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('slug')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="driver" class="block text-sm font-medium text-gray-700">{{ __('Driver') }}</label>
        <input id="driver" name="driver" type="text" value="{{ old('driver', $source->driver) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('driver')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="base_url" class="block text-sm font-medium text-gray-700">{{ __('Base URL') }}</label>
        <input id="base_url" name="base_url" type="url" value="{{ old('base_url', $source->base_url) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('base_url')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="sm:col-span-2">
        <label for="api_key" class="block text-sm font-medium text-gray-700">{{ __('API Key') }}</label>
        <input id="api_key" name="api_key" type="text" value="{{ old('api_key', $source->api_key) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('api_key')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="sm:col-span-2">
        <label for="config" class="block text-sm font-medium text-gray-700">{{ __('Config JSON') }}</label>
        <textarea id="config" name="config" rows="5" class="font-mono mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('config', $source->config ? json_encode($source->config, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : '') }}</textarea>
        @error('config')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div class="flex items-center">
        <input id="is_active" name="is_active" type="checkbox" value="1" {{ old('is_active', $source->is_active ?? true) ? 'checked' : '' }} class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
        <label for="is_active" class="ml-2 block text-sm text-gray-700">{{ __('Active') }}</label>
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.external-sources.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
</div>
