<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end w-full pb-4">
                {{ $users->links() }}
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <ol class="px-4 py-4">
                    @foreach ($users as $user)
                        <li class="py-2">{{ $user->name }}</li>
                    @endforeach
                </ol>  
            </div>

            <div class="flex justify-end w-full pt-4">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
