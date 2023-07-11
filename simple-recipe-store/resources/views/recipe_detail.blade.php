<meta charset="UTF-8">
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('recipe.list') }}">レシピ一覧</a>
        </h2>
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            <a href="{{ route('recipe.store_view') }}">レシピ登録</a>
        </h2>
    </x-slot>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <ul>
                        {{ $recipes->name }}<br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @foreach ($recipeDetails as $recipeDetail)
                <div class="p-6 text-gray-900">
                    <ul>
                        <li>
                        <form action="{{ route('recipe.update',['id' => $recipes->id]) }}" method="post">
                        @csrf
                        @method('PUT')
                        <select name="updateIngredient[]">
                            @foreach ($ingredients as $ingredient)
                            <option value="{{$ingredient->id}}" @if ($ingredient->id == $recipeDetail->ingredient->id) selected @endif >{{ $ingredient->name }}</option>を
                            @endforeach
                        </select>を
                        <select name="updateKitchenTool[]">
                            @foreach ($kitchentools as $kitchentool)
                            <option value="{{$kitchentool->id}}" @if ($kitchentool->id == $recipeDetail->cookingProcess[0]->kitchentool->id) selected @endif >{{ $kitchentool->name }}</option>で
                            @endforeach
                        </select>で
                        <input type="number" min="0" max="600" step="10" name="updateTime[]" value="{{ $recipeDetail->cookingProcess[0]->time}}">秒
                        <select name="updateCooking[]">
                            @foreach ($cookings as $cooking)
                            <option value="{{$cooking->id}}" @if ($cooking->id == $recipeDetail->cookingProcess[0]->cooking->id) selected @endif >{{ $cooking->name }}</option>をする。
                            @endforeach
                        </select>をする。
                        </li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-blue-900">
                    <ul>
                        <div class="mb-2 text-red-300">

                                <button type="submit">このレシピを更新する</button>
                            </form>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>