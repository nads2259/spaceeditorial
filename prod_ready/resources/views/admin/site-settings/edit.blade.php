<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Setting') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    @if (session('status'))
                        <div class="rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
                    @endif
                    <form method="POST" action="{{ route('admin.site-settings.update', $setting) }}" class="space-y-6">
                        @include('admin.site-settings._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
