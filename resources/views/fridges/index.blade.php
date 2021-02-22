@extends('layouts.app')

@section('content')
    <div class="flex flex-col justify-center m-auto w-3/4 bg-white p-6 rounded-lg">
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
                                <div class="text-xl font-extrabold text-white">0%</div>
                                <!-- description -->
                                <p class="leading-snug text-gray-800 text-xl">{{ $fridge->brand }} - {{ $fridge->location }}</p>
                                <!-- show fridge -->
                                <form action="{{ route('fridges.show', $fridge)}}" method="post" class="flex items-center">
                                    @csrf
                                    @method('get')
                                    <button type="submit" class="text-blue-500 font-bold tracking-wide focus:ring-none">Show fridge</button>
                                    <svg class="w-4 h-4 ml-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </form>
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
        <div>
            <form action="{{ route('fridges.create') }}" method="get" class="mr-2">
                <button type="submit" class="btn-blue">Create a new fridge</button>
            </form>
        </div>
    </div> 
@endsection