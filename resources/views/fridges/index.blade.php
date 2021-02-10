@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-3/4 bg-white p-6 rounded-lg">
            @if ($fridges->count())
                <div class="flex flex-row flex-wrap justify-center items-center">
                    @foreach ($fridges as $fridge)
                        <div class="m-2 w-64 h-64 bg-yellow-200 flex justify-center items-center rounded-lg">
                            <div class="block">{{ $fridge->brand }}</div>
                        </div>
                    @endforeach
                </div>
            @else
                <span> There is no fridge</span>
            @endif
        </div>
    </div> 
@endsection