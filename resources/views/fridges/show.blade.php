@extends('layouts.app')

@section('content')
    <div class="w-full h-full flex justify-center items-center">
        <div class="w-96">
            <!-- yellow background -->
            <div class="bg-gray-300 text-gray-50 rounded-xl p-8 space-y-5 shadow-md">
            <!-- blue line -->
                <div class="h-2 w-20 bg-blue-500"></div>
                @php
                    $count = $fridge->count_products();
                @endphp
                <!-- completion -->
                <div class="text-2xl font-extrabold text-gray-800">{{ ($count/$fridge->max_capacity)*100 }}% - ({{ $count }} {{ Str::plural('product', $count) }})</div>
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
                <div class="flex flex-row space-x-3">
                    <!-- delete fridge -->
                    <form action="{{ route('fridges.destroy', $fridge) }}" method="post" class="flex items-center">
                        @csrf
                        @method('delete')
                        <button type="submit" class="border border-red-500 p-2 flex items-center justify-center bg-red-500 rounded-lg
                                focus:outline-none hover:bg-red-600">
                            <svg class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </form>
                    <!-- update fridge -->
                    <form action="{{ route('fridges.edit', $fridge) }}" method="post" class="flex items-center">
                        @csrf
                        @method('get')
                        <button type="submit" class="btn-blue">Edit</button>
                    </form>
                </div>
                <!-- update fridge -->
                <form action="{{ route('fridges.index') }}" method="post" class="flex items-center">
                    @csrf
                        @method('get')
                        <button type="submit" class="btn-blue">Go back</button>
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection

