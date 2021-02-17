@extends('layouts.app')

@section('content')
    <div class="flex flex-row flex-wrap justify-center items-center">
        <div class="m-2 w-64 h-64 bg-yellow-200 rounded-lg grid grid-rows-4 grid-cols-4">
            <div class="block row-start-1 row-span-2 col-span-4 place-self-center">{{ $fridge->brand }}</div>
            <div class="row-start-3 col-span-4 self-center">Number product inside</div>
            <div class="p-3 row-start-4 col-span-4 flex flex-col place-self-end">
                <section class="flex content-start">
                    <form action="{{ route('products.create', $fridge->id)}}" method="post" class="mr-2">
                        @method('get')
                        @csrf
                        <input type="hidden" id="fridge_id" name="fridge_id" value="{{ $fridge->id }}">
                        <button type="submit" class="text-blue-700">Add product</button>
                    </form>
                    <form action="" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-700">See product(s)</button>
                    </form>
                </section>
                <section class="flex self-end">
                    <form action="" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-700">Edit</button>
                    </form>
                    <form action="" method="post" class="mr-2">
                        @csrf
                        <button type="submit" class="text-blue-700">Delete</button>
                    </form>
                    <form action="{{ url()->previous() }}" method="post" class="mr-2">
                        @csrf
                        @method('get')
                        <button type="submit" class="btn-blue">return</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

