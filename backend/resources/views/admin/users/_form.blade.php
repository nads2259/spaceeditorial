@csrf
@if(isset($user) && $user->exists)
    @method('PUT')
@endif

<div class="space-y-6">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
        <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
        <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('email')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
        <select id="role" name="role" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
            @foreach ($roles as $value => $label)
                <option value="{{ $value }}" @selected(old('role', $user->role ?? 'editor') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('role')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700">{{ $user->exists ? __('New Password (optional)') : __('Password') }}</label>
        <input id="password" name="password" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" {{ $user->exists ? '' : 'required' }}>
        @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" {{ $user->exists ? '' : 'required' }}>
    </div>
    @if($user->exists)
        <div class="flex items-center">
            <input id="regenerate_api_token" name="regenerate_api_token" type="checkbox" value="1" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
            <label for="regenerate_api_token" class="ml-2 block text-sm text-gray-700">{{ __('Regenerate API token') }}</label>
        </div>
    @endif
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.users.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save') }}</button>
</div>
