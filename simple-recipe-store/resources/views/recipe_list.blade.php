<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('recipe.list') }}">レシピ一覧</a>
        </h2>
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            <a href="{{ route('recipe.store_view') }}">レシピ登録</a>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        @foreach ($recipes as $recipe)
                            <li>
                                <a href="{{ route('recipe.show',['id' => $recipe->id]) }} ">{{ $recipe->name }}</a>
                                <form action="{{ route('recipe.show',['id' => $recipe->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit">このレシピを編集する</button>
                                </form>
                                <form action="{{ route('recipe.delete',['id' => $recipe->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">このレシピを削除する</button>
                                </form>
                            </li>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
