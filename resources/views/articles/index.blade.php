<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles Management') }}
            </h2>
            @can('create', \App\Models\Article::class)
                <a class="bg-slate-100 rounded px-2 py-4 hover:bg-blue-300 hover:text-blue-700"
                    href="{{ route('articles.create') }}">Create New Article</a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end w-full pb-4">
                {{ $articles->links() }}
            </div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <ol class="px-4 py-4">
                    @foreach ($articles as $article)
                        <li class="py-2">
                            <a href="{{ route('articles.show', $article) }}" class="hover:text-blue-700">
                                {{ $article->title }}<br>
                                <div class="text-sm text-gray-500">{{ $article->user->name }}</div>
                            </a>
                            <div class="inline-flex">
                                @can('isOwner', $article)
                                    <a href="{{ route('articles.edit', $article) }}"
                                        class="mt-1 text-sm text-gray-500 hover:text-blue-700">
                                        edit
                                    </a>
                                    <span class="mx-1">|</span>
                                @endcan
                                @can('delete', $article)
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <a href="#"
                                            onclick="event.preventDefault();if(confirm('Are you sure want to delete this record?')) {
                                            this.closest('form').submit();
                                        }"
                                            class="text-sm text-gray-500 hover:text-red-700">
                                            delete
                                        </a>
                                    </form>
                                @endcan
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>

            <div class="flex justify-end w-full pt-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
