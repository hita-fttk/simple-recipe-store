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

                        <div id="addDiv" class="plusDiv">
                            <label for="cookingprocess">具材と調理器具と調理工程を選択してください</label>
                            <input type="text" list="ingredient" id="ingredientInput" name="ingredient[]">
                            <datalist id="ingredient">
                                @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->name }}" data-id="{{ $ingredient->id }}">{{ $ingredient->name }}</option>
                                @endforeach
                            </datalist>
                            <input type="text" list="kitchentool" id="kitchentoolInput" name="kitchentool[]">
                            <datalist id="kitchentool">
                                @foreach ($kitchentools as $kitchentool)
                                <option value="{{ $kitchentool->name }}" data-id="{{ $kitchentool->id }}">{{ $kitchentool->name }}</option>
                                @endforeach
                            </datalist>
                            <input type="text" list="cooking" id="cookingInput" name="cooking[]">
                            <datalist id="cooking">
                                @foreach ($cookings as $cooking)
                                <option value="{{ $cooking->name }}" data-id="{{ $cooking->id }}">{{ $cooking->name }}</option>
                                @endforeach
                            </datalist>
                            <label for="time">秒数：</label>
                            <input type="number" id="timeInput" name="time[]" min="0" max="600" step="10">秒<br><br>

                            <input type="hidden" id="ingredientId" name="ingredientId[]">
                            <input type="hidden" id="kitchentoolId" name="kitchentoolId[]">
                            <input type="hidden" id="cookingId" name="cookingId[]">
                        </div>
                        <input type="submit" value="登録">
                    </form>
                    <div>
                        <input type="button" value="add" id="addtion">
                        <input type="button" value="delete" id="delete">
                    </div>

                    <script>
                        const addButton = document.querySelector('#addtion');
                        addButton.addEventListener('click', clickAddButtonHandler);

                        function clickAddButtonHandler() {
                            //調理工程ブロックを追加する。
                            addDiv();
                            //ingredient_idにvalueを追加する。
                            
                            //kitchentool_idにvalueを追加する。
                            //cooking_idにvalueを追加する。

                        }

                        function addDiv() {
                            const originalDiv = document.getElementById('addDiv');
                            const clonedDiv = originalDiv.cloneNode(true);
                            console.log('addDiv');

                            originalDiv.parentNode.insertBefore(clonedDiv, originalDiv.nextElementSibling);
                        }

                        function fetchElements() {
                            var divTags = document.getElementsByClassName("plusDiv");
                            console.log(divTags);

                            for (var k = 0; k < divTags.length; k++) {
                                var divTag = divTags[k];
                                console.log(divTag);
                            }
                        }

                        function inputId() {
                            // 選択リストの選択が行われたときに起動するイベント
                            divTag.querySelector('#ingredientInput').addEventListener('input', function() {
                                    var selectedValue = this.value; // 選択された表示値（Name）
                                    var ingredientId = ''; // 実際の値（id）を格納する変数

                                    // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                    var options = divTag.querySelector('#ingredient').options;
                                    for (var i = 0; i < options.length; i++) {
                                        if (options[i].value === selectedValue) {
                                            ingredientId = options[i].dataset.id;
                                            break;
                                        }
                                    }
                                    console.log(ingredientId);

                                    // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                    divTag.querySelector('#ingredientId').value = ingredientId;
                                    console.log(divTag.querySelector('#ingredientId').value);
                                }

                            )
                        };

                        document.getElementById('kitchentoolInput').addEventListener('input', function() {
                            var selectedValue = this.value; // 選択された表示値（Name）
                            var kitchentoolId = ''; // 実際の値（id）を格納する変数

                            // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                            var options = document.getElementById('kitchentool').options;
                            for (var j = 0; j < options.length; j++) {
                                if (options[j].value === selectedValue) {
                                    kitchentoolId = options[j].dataset.id;
                                    break;
                                }
                            }

                            // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                            document.getElementById('kitchentoolId').value = kitchentoolId;
                        });
                        document.getElementById('cookingInput').addEventListener('input', function() {
                            var selectedValue = this.value; // 選択された表示値（Name）
                            var cookingId = ''; // 実際の値（id）を格納する変数

                            // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                            var options = document.getElementById('cooking').options;
                            for (var t = 0; t < options.length; t++) {
                                if (options[t].value === selectedValue) {
                                    cookingId = options[t].dataset.id;
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
</x-app-layout>