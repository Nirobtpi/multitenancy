<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex justify-between text-gray-900">
                    {{ __("You're logged in!") }}
                    <a href="{{ route('admin.tenant.create') }}" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black" target="_self" rel="noopener noreferrer">{{ __('Add Tenant') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
