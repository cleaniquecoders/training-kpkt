<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p class="pt-4 px-4 uppercase font-bold">{{ $article->title }}</p>
                <p class="px-4 text-sm">Article by {{ $article->user->name }}, created on {{ $article->created_at->diffForHumans() }}</p>

                <div class="p-4">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
