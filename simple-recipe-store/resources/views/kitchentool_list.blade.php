<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('調理器具一覧') }}
        </h2>
        <h2>
        <form action="{{ route('kitchentool.store_view') }}" method="GET">
            <input type="hidden" name="user" value="{{ Auth::id() }}">
            <input type="submit" value="調理器具登録へ">
        </form>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        @foreach ($kitchentools as $kitchentool)
                            <li>{{ $kitchentool->name }}</li>
                            <form action="{{ route('kitchentool.delete',['id' => $kitchentool->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">このレシピを削除する</button>
                            </form>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
