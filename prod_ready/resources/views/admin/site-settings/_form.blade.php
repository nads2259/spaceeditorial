@csrf
@if(isset($setting) && $setting->exists)
    @method('PUT')
@endif

<div class="space-y-6">
    <div>
        <label for="key" class="block text-sm font-medium text-gray-700">{{ __('Key') }}</label>
        <input id="key" name="key" type="text" value="{{ old('key', $setting->key) }}" {{ $setting->exists ? 'readonly' : '' }} required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('key')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="value" class="block text-sm font-medium text-gray-700">{{ __('JSON Value') }}</label>
        <textarea id="value" name="value" rows="8" class="font-mono mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('value', $setting->value ? json_encode($setting->value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : '') }}</textarea>
        @error('value')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.site-settings.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
</div>
