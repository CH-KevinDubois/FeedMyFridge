@extends('layouts.app')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-96">
            <!-- yellow background -->
            <div class="bg-gray-300 text-gray-50 rounded-xl p-8 space-y-5 shadow-md">
            <!-- blue line -->
                <div class="h-2 w-20 bg-blue-500"></div>
                <!-- completion -->
                <div class="text-2xl font-extrabold text-gray-800">{{ ($fridge->count_products()/$fridge->max_capacity)*100 }}%</div>
                <!-- description -->
                <p class="leading-snug text-gray-800 text-xl">{{ $fridge->brand }} - {{ $fridge->location }}</p>
                <!-- racks in bulk -->
                <p class="leading-snug text-gray-800 text-xl">Main racks : {{ $fridge->number_racks_bulk }}</p>
                <!-- racks in door -->
                <p class="leading-snug text-gray-800 text-xl">Door racks : {{ $fridge->number_racks_door }}</p>
                <!-- freezer -->
                @if ($fridge->freezer)
                <p class="leading-snug text-gray-800 text-xl">Freezer</p>
                @endif
                <!-- add product -->
                <form action="{{ route('products.create', $fridge) }}" method="post" class="flex items-center">
                    @csrf
                    @method('get')
                    <button type="submit" class="text-blue-500 font-bold tracking-wide focus:ring-none">Add product</button>
                    <svg class="w-4 h-4 ml-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </form>
                <!-- see product -->
                <form action="{{ route('products.create', $fridge) }}" method="post" class="flex items-center">
                    @csrf
                    @method('get')
                    <button type="submit" class="text-blue-500 font-bold tracking-wide focus:ring-none">See product(s)</button>
                    <svg class="w-4 h-4 ml-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </form>
                <!-- edit/remove buttons -->
                <div class="flex flex-row justify-between space-x-3">
                    <form action="" method="post">
                        @csrf
                        <button type="submit" class="btn-blue">Edit</button>
                    </form>
                    <form action="" method="post">
                        @csrf
                        <button type="submit" class="btn-blue">Remove</button>
                    </form>
                    <form action="{{ url()->previous() }}" method="post">
                        @csrf
                        @method('get')
                        <button type="submit" class="btn-blue">Go back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

