<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('recipe.store') }}" method="post">
                        @csrf
                        <label for="">名前</label>
                        <input type="text" name="name"><br><br>
                        <label for="">カテゴリー</label>
                        <input type="text" name="category"><br><br>

                        <label for="cookingprocess">具材と調理器具と調理工程を選択してください</label>
                        <input type="text" list="ingredient" id="ingredientInput" name="ingredient">
                        <datalist id="ingredient">
                            @foreach ($recipeList['ingredients'] as $ingredient)
                            <option value="{{ $ingredient->name }}"data-id="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                            @endforeach
                        </datalist>
                        <input type="text" list="kitchentool" id="kitchentoolInput" name="kitchentool">
                        <datalist id="kitchentool">
                            @foreach ($recipeList['kitchentools'] as $kitchentool)
                            <option value="{{ $kitchentool->name }}"data-id="{{ $kitchentool->id }}">{{ $kitchentool->name }}</option>
                            @endforeach
                        </datalist>
                        <input type="text" list="cooking" id="cookingInput" name="cooking">
                        <datalist id="cooking">
                            @foreach ($recipeList['cookings'] as $cooking)
                            <option value="{{ $cooking->name }}" data-id="{{ $cooking->id }}">{{ $cooking->name }}</option>
                            @endforeach
                        </datalist><br><br>
                        <input type="submit" value="登録">

                        <input type="hidden" id="ingredientId" name="ingredientId">
                        <input type="hidden" id="kitchentoolId" name="kitchentoolId">
                        <input type="hidden" id="cookingId" name="cookingId">
                    </form>

                        <script>
                            // 選択リストの選択が行われたときに起動するイベント
                            document.getElementById('ingredientInput').addEventListener('input', function() {
                                var selectedValue = this.value;  // 選択された表示値（Name）
                                var ingredientId = '';  // 実際の値（id）を格納する変数

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById('ingredient').options;
                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].value === selectedValue) {
                                        ingredientId = options[i].dataset.id;
                                        break;
                                    }
                                }   

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById('ingredientId').value = ingredientId;
                            });

                            document.getElementById('kitchentoolInput').addEventListener('input', function() {
                                var selectedValue = this.value;  // 選択された表示値（Name）
                                var kitchentoolId = '';  // 実際の値（id）を格納する変数

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById('kitchentool').options;
                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].value === selectedValue) {
                                        kitchentoolId = options[i].dataset.id;
                                        break;
                                    }
                                }   

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById('kitchentoolId').value = kitchentoolId;
                            });
                            document.getElementById('cookingInput').addEventListener('input', function() {
                                var selectedValue = this.value;  // 選択された表示値（Name）
                                var cookingId = '';  // 実際の値（id）を格納する変数

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById('cooking').options;
                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].value === selectedValue) {
                                        cookingId = options[i].dataset.id;
                                        break;
                                    }
                                }   

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById('cookingId').value = cookingId;
                            });
                        </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
