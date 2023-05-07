<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('具材一覧') }}
        </h2>
        <h2>
        <form action="{{ route('ingredient_resister') }}" method="GET">
            <input type="hidden" name="id" value="{{ Auth::id() }}">
            <input type="submit" value="具材登録へ">
        </form>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("4*4でブロックを分けて自分が保有している具材を記載") }}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
