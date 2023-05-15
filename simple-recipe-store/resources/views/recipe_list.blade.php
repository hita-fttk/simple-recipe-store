<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('recipe.list') }}">レシピ一覧</a>
        </h2>
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            <a href="{{ route('recipe_resister') }}">レシピ登録</a>
        </h2>
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            <a href="/">個人レシピ一覧</a>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <ul>
                        @foreach ($recipes as $recipe)
                            <li>{{ $recipe->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
