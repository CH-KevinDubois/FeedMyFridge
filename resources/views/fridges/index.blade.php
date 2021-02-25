@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center m-auto w-3/5 bg-white p-6 rounded-lg">
        <div class="mb-4">
            @if ($fridges->count())
                <div class="flex flex-row flex-wrap justify-center items-center">
                    @foreach ($fridges as $fridge)
                    <div class="pb-6 mr-7">
                        <div class="w-64">
                            <!-- yellow background -->
                            <div class="bg-gray-300 text-gray-50 rounded-xl p-8 space-y-5">
                            <!-- blue line -->
                                <div class="h-2 w-20 bg-blue-500"></div>
                                <!-- completion -->
                                <div class="text-xl font-extrabold text-gray-800">{{ ($fridge->count_products()/$fridge->max_capacity)*100 }}%</div>
                                <!-- description -->
                                <p class="leading-snug text-gray-800 font-bold text-2xl">{{ $fridge->brand }} </p>
                                <!-- description -->
                                <div class="flex items-center pb-5 space-x-2">
                                    <svg class="w-6 h-6 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <p class="leading-snug text-gray-800 text-xl">{{ $fridge->location }}</p>
                                </div>
                                <div class="flex flex-row justify-evenly space-x-3">
                                    <!-- add product -->
                                    <form action="{{ route('products.create', $fridge) }}" method="post" class="flex items-center">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="border border-blue-800 shadow-md p-2 flex items-center justify-center bg-blue-800 rounded-lg
                                        focus:outline-none hover:bg-blue-900">
                                            <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- see products -->
                                    <form action="{{ route('products.index', $fridge) }}" method="post" class="flex items-center">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="border border-blue-500 shadow-md p-2 flex items-center justify-center bg-blue-500 rounded-lg
                                        focus:outline-none hover:bg-blue-600">
                                            <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </button>
                                    </form>
                                    <!-- show fridge info -->
                                    <form action="{{ route('fridges.show', $fridge)}}" method="post" class="flex items-center">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="border border-blue-500 shadow-md p-2 flex items-center justify-center bg-blue-500 rounded-lg
                                        focus:outline-none hover:bg-blue-600">
                                            <svg class="w-12 h-12 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <span> There is no fridge to display</span>
            @endif
        </div>

        <!-- create fridge -->
        <div class="w-full flex flex-row flex-1">
            <form action="{{ route('fridges.create') }}" method="get" class="mr-2">
                <button type="submit" class="btn-blue">New fridge</button>
            </form>
            <form action="{{ route('fridges.searchproduct') }}" method="get" class="mr-2">
                <button type="submit" class="btn-blue">Search product</button>
            </form>
            <form action="{{ route('home') }}" method="get">
                <button type="submit" class="btn-blue">Go back</button>
            </form>
        </div>
    </div> 
@endsection