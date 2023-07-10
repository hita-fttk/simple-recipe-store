<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            本サイトの使用方法
        </h2>
    </x-slot>


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Recipeは複数のブロックで構成されている。<br>
                    ブロックは「具材」、「調理器具」、「時間」、「調理工程」から構成されている。<br>
                    各要素を登録するには上記のタグで行う。<br>
                </div>
            </div>
        </div>
    </div>
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <label for="sampleingredient">Recipeの1ブロックを登録:</label>
                    <select id="sampleingredient">
                        <option value="">具材を入力</option>
                        <option value="sample1">お肉</option>
                        <option value="sample2">野菜</option>
                        <option value="sample3">お魚</option>
                    </select>を
                    <select id="samplekitchentool">
                        <option value="">調理器具を入力</option>
                        <option value="sample1">フライパン</option>
                        <option value="sample2">包丁</option>
                        <option value="sample3">まな板</option>
                    </select>で
                    <input type="number" min="0" max="600" step="10" value="0">秒
                    <select id="samplecooking">
                        <option value="">調理工程を入力</option>
                        <option value="sample1">みじん切り</option>
                        <option value="sample2">炒める</option>
                        <option value="sample3">煮る</option>
                    </select>をする。
                </div>
            </div>
        </div>
    </div>
</x-app-layout>