<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 space-y-6">
                    @if (session('status'))
                        <div class="rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
                    @endif
                    @if (session('api_token'))
                        <div class="rounded-md bg-yellow-50 p-4 text-sm text-yellow-800">
                            <p class="font-semibold">{{ __('Copy this API token now – it will not be shown again:') }}</p>
                            <code class="mt-2 block truncate text-xs text-yellow-900">{{ session('api_token') }}</code>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                        @include('admin.users._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
