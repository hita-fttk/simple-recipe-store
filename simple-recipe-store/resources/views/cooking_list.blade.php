<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('調理工程一覧') }}
        </h2>
        <h2>
        <form action="{{ route('cooking.store_view') }}" method="GET">
            <input type="hidden" name="user" value="{{ Auth::id() }}">
            <input type="submit" value="調理工程登録へ">
        </form>
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($cookings as $cooking)
                        <li>{{ $cooking->name }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>