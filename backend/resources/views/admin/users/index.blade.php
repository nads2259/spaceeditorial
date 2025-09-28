<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
            </h2>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500">{{ __('New User') }}</a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="mb-4 rounded-md bg-green-50 p-4 text-sm text-green-600">{{ session('status') }}</div>
            @endif
            @if (session('api_token'))
                <div class="mb-4 rounded-md bg-yellow-50 p-4 text-sm text-yellow-800">
                    <p class="font-semibold">{{ __('Copy this API token now – it will not be shown again:') }}</p>
                    <code class="mt-2 block truncate text-xs text-yellow-900">{{ session('api_token') }}</code>
                </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                            <tr>
                                <th class="px-3 py-2">{{ __('Name') }}</th>
                                <th class="px-3 py-2">{{ __('Email') }}</th>
                                <th class="px-3 py-2">{{ __('Role') }}</th>
                                <th class="px-3 py-2 text-right">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($users as $user)
                                <tr>
                                    <td class="px-3 py-3 text-gray-900">{{ $user->name }}</td>
                                    <td class="px-3 py-3 text-gray-700">{{ $user->email }}</td>
                                    <td class="px-3 py-3 text-gray-700">{{ $roles[$user->role] ?? ucfirst($user->role) }}</td>
                                    <td class="px-3 py-3 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-500">{{ __('Edit') }}</a>
                                            @if (auth()->id() !== $user->id)
                                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('{{ __('Delete this user?') }}')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-500">{{ __('Delete') }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-3 py-6 text-center text-gray-500">{{ __('No users found.') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-6">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
