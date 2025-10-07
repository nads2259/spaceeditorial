@csrf

<div class="grid gap-4 sm:grid-cols-2">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">{{ __('Name') }}</label>
        <input
            id="name"
            name="name"
            type="text"
            value="{{ old('name', $template->name) }}"
            required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
        <label for="slug" class="block text-sm font-medium text-gray-700">{{ __('Slug') }}</label>
        <input
            id="slug"
            name="slug"
            type="text"
            value="{{ old('slug', $template->slug) }}"
            required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        />
        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
    </div>
    <div>
        <label for="audience" class="block text-sm font-medium text-gray-700">{{ __('Audience') }}</label>
        <select
            id="audience"
            name="audience"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            required
        >
            @foreach ($audiences as $audience)
                <option value="{{ $audience }}" @selected(old('audience', $template->audience) === $audience)>{{ ucfirst(str_replace('-', ' ', $audience)) }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('audience')" class="mt-2" />
    </div>
    <div>
        <label for="subject" class="block text-sm font-medium text-gray-700">{{ __('Subject') }}</label>
        <input
            id="subject"
            name="subject"
            type="text"
            value="{{ old('subject', $template->subject) }}"
            required
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        />
        <x-input-error :messages="$errors->get('subject')" class="mt-2" />
    </div>
    <div class="sm:col-span-2">
        <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
        <textarea
            id="description"
            name="description"
            rows="2"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >{{ old('description', $template->description) }}</textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div class="sm:col-span-2">
        <label for="html_body" class="block text-sm font-medium text-gray-700">{{ __('HTML Body') }}</label>
        <textarea
            id="html_body"
            name="html_body"
            rows="8"
            required
            class="mt-1 block w-full rounded-md border-gray-300 font-mono text-xs shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >{{ old('html_body', $template->html_body) }}</textarea>
        <x-input-error :messages="$errors->get('html_body')" class="mt-2" />
    </div>
    <div class="sm:col-span-2">
        <label for="text_body" class="block text-sm font-medium text-gray-700">{{ __('Text Body (optional)') }}</label>
        <textarea
            id="text_body"
            name="text_body"
            rows="4"
            class="mt-1 block w-full rounded-md border-gray-300 font-mono text-xs shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >{{ old('text_body', $template->text_body) }}</textarea>
        <x-input-error :messages="$errors->get('text_body')" class="mt-2" />
    </div>
    <div>
        <label class="inline-flex items-center gap-2 text-sm text-gray-700" for="is_active">
            <input
                id="is_active"
                name="is_active"
                type="checkbox"
                value="1"
                @checked(old('is_active', $template->exists ? $template->is_active : true))
                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            />
            {{ __('Active template') }}
        </label>
        <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
    </div>
</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('admin.email-templates.index') }}" class="inline-flex items-center rounded-md border border-gray-300 px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50">{{ __('Cancel') }}</a>
    <button type="submit" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('Save template') }}</button>
</div>
