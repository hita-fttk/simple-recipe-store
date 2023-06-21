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
                            <input type="text" list="ingredient" id="ingredientInput" class="ingredientInput" name="ingredient[]">
                            <datalist id="ingredient" class="ingredient">
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
                        var counter =0;
                        
                        const addButton = document.querySelector('#addtion');
                        manuClonedDiv = addButton.addEventListener('click', addDiv);
                        function addDiv() {
                            const originalDiv = document.getElementById('addDiv');
                            const clonedDiv = originalDiv.cloneNode(true);
                            counter++;

                            clonedDiv.id = 'addDiv' + counter.toString();
                            // console.log(clonedDiv.id);
                            // var parentDiv = originalDiv.parentNode;
                            // parentDiv.appendChild(clonedDiv);
                            manuClonedDiv = originalDiv.parentNode.insertBefore(clonedDiv, originalDiv.nextElementSibling);
                            manuIngredientInputTag = manuClonedDiv.querySelector('#ingredientInput');
                            var ingredientInput = 'ingredientInput' + counter.toString();
                            manuIngredientInputTag.id = ingredientInput; 

                            manuIngredientInputTag = manuClonedDiv.querySelector('#ingredient');
                            var ingredient = 'ingredient' + counter.toString();
                            manuIngredientInputTag.id = ingredient;
                            
                            manuIngredientInputTag = manuClonedDiv.querySelector('#ingredientId');
                            var ingredientId = 'ingredientId' + counter.toString();
                            manuIngredientInputTag.id = ingredientId;

                            manuIngredientInputTag = manuClonedDiv.querySelector('#kitchentoolInput');
                            var kitchentoolInput = 'kitchentoolInput' + counter.toString();
                            manuIngredientInputTag.id = kitchentoolInput; 

                            manuIngredientInputTag = manuClonedDiv.querySelector('#kitchentool');
                            var kitchentool = 'kitchentool' + counter.toString();
                            manuIngredientInputTag.id = kitchentool;
                            
                            manuIngredientInputTag = manuClonedDiv.querySelector('#kitchentoolId');
                            var kitchentoolId = 'kitchentoolId' + counter.toString();
                            manuIngredientInputTag.id = kitchentoolId;

                            manuIngredientInputTag = manuClonedDiv.querySelector('#cookingInput');
                            var cookingInput = 'cookingInput' + counter.toString();
                            manuIngredientInputTag.id = cookingInput;

                            manuIngredientInputTag = manuClonedDiv.querySelector('#cooking');
                            var cooking = 'cooking' + counter.toString();
                            manuIngredientInputTag.id = cooking;

                            manuIngredientInputTag = manuClonedDiv.querySelector('#cookingId');
                            var cookingId = 'cookingId' + counter.toString();
                            manuIngredientInputTag.id = cookingId;
                            
                            document.getElementById(ingredientInput).addEventListener('input', function() {
                                console.log(ingredientInput);
                                var selectedValue = this.value; // 選択された表示値（Name）
                                var ingredientNumber = ''; // 実際の値（id）を格納する変数
                                console.log(selectedValue);

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById(ingredient).options;
                                console.log(options);
                                for (var j = 0; j < options.length; j++) {
                                    if (options[j].value === selectedValue) {
                                        ingredientNumber = options[j].dataset.id;
                                        console.log(ingredientNumber);
                                        break;
                                    }
                                }

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById(ingredientId).value = ingredientNumber;
                            });

                            document.getElementById(kitchentoolInput).addEventListener('input', function() {
                                console.log(kitchentoolInput);
                                var selectedValue = this.value; // 選択された表示値（Name）
                                var kitchentoolNumber = ''; // 実際の値（id）を格納する変数
                                console.log(selectedValue);

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById(kitchentool).options;
                                console.log(options);
                                for (var j = 0; j < options.length; j++) {
                                    if (options[j].value === selectedValue) {
                                        kitchentoolNumber = options[j].dataset.id;
                                        console.log(kitchentoolNumber);
                                        break;
                                    }
                                }

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById(kitchentoolId).value = kitchentoolNumber;
                            });

                            document.getElementById(cookingInput).addEventListener('input', function() {
                                console.log(cookingInput);
                                var selectedValue = this.value; // 選択された表示値（Name）
                                var cookingNumber = ''; // 実際の値（id）を格納する変数
                                console.log(selectedValue);

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById(cooking).options;
                                console.log(options);
                                for (var j = 0; j < options.length; j++) {
                                    if (options[j].value === selectedValue) {
                                        cookingNumber = options[j].dataset.id;
                                        console.log(cookingNumber);
                                        break;
                                    }
                                }

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById(cookingId).value = cookingNumber;
                            });
                            // console.log(counter);
                        }

                            // var parentsElements = document.querySelectorAll('#addDiv .ingredientInput');
                            // var datalistElements = document.querySelectorall('#addDiv .ingredient');
                           // 選択リストの選択が行われたときに起動するイベント
                        //    for (var i=0; i <parentsElements.length; i++){
                        //        parentsElements.item(i).addEventListener('input',function(){
                            
                        //         var selectedValue = this.value; // 選択された表示値（Name）
                        //         var ingredientId = ''; // 実際の値（id）を格納する変数


                        //         // var datalist = this.parentNode.querySelector('.ingredient');
                        //         var options = datalistElements.item(i).options;
                        //         for(var k=0; k<options.length; k++){
                        //             if(options[k].value === selectedValue){
                        //                 ingredientId = options[k].dataset.id;
                        //                 break;
                        //             }
                        //         }
                        //         this.parentNode.querySelector('.ingredientId').value = ingredientId;
                        //     });
                        // }
                            

                                // // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                // var options = 
                                // for (var i = 0; i < options.length; i++) {
                                //     if (options[i].value === selectedValue) {
                                //         ingredientId = options[i].dataset.id;
                                //         break;
                                        
                                //     }
                                // }
                                // console.log(ingredientId);

                                // // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                // // document.getElementById('ingredientId').value = ingredientId;
                                // // console.log(document.getElementById('ingredientId').value);
                                // var ingredientIdInputs = document.querySelectorAll('input[name="ingredientId[]"]');
                                // console.log(ingredientIdInputs);
                                // for (var h = 0; h < ingredientIdInputs.length; h++) {
                                //     ingredientIdInputs[h].value = ingredientId;
                                // }
                                // });
                                
                            

                        
                            // document.getElementById('ingredientInput').addEventListener('input', clickInput);
                            // document.getElementById('ingredientInput1').addEventListener('input', clickInput1);

                            // function clickInput(manuClonedDiv){
                            //     console.log(manuClonedDiv);
                            //     for (var j = 0; j < options.length; j++) {
                            //     var selectedValue = this.value; // 選択された表示値（Name）
                            //     var ingredientId = ''; // 実際の値（id）を格納する変数

                            //     // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                            //     var options = document.getElementById('ingredient').options;
                            //         if (options[j].value === selectedValue) {
                            //             ingredientId = options[j].dataset.id;
                            //             break;
                            //         }
                            //     }
                            

                            //     // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                            //     document.getElementById('ingredientId').value = ingredientId;
                            // }
                            

                            


                            document.getElementById('ingredientInput').addEventListener('input', function() {
                                var selectedValue = this.value; // 選択された表示値（Name）
                                var ingredientId = ''; // 実際の値（id）を格納する変数

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById('ingredient').options;
                                for (var t = 0; t < options.length; t++) {
                                    if (options[t].value === selectedValue) {
                                        ingredientId = options[t].dataset.id;
                                        break;
                                    }
                                }

                                // 実際の値（id）をhiddenで隠した別のフィールドに設定→$request->ingredientIdで取得できる。
                                document.getElementById('ingredientId').value = ingredientId;
                            });
                            document.getElementById('kitchentoolInput').addEventListener('input', function() {
                                var selectedValue = this.value; // 選択された表示値（Name）
                                var kitchentoolId = ''; // 実際の値（id）を格納する変数

                                // 選択リストの全てのオプションの中から、対応する実際の値（id）を取得 ByID('ingredient')はoptionsから選んだオブジェクト。
                                var options = document.getElementById('kitchentool').options;
                                for (var t = 0; t < options.length; t++) {
                                    if (options[t].value === selectedValue) {
                                        kitchentoolId = options[t].dataset.id;
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