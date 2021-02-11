@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
            <form action="{{ route('products.store')}}" method="POST">
                @csrf
                <input type="hidden" name="fridge_id" value=" {{$fridge->fridge_id }}">

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="name" class="sr-only">Product name</label>
                        <input type="text" name="name" id="name" placeholder="Product name" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
                        focus:ring-blue-600 focus:border-transparent @error('name')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex flex-col items-start align-middle">
                        <label class="mb-2" for="expiration_date">Expire at</label>
                        <input type="text" name="expiration_date" id="expiration_date" 
                        placeholder="Expiration date" onfocus="(this.type='date')"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
                        focus:ring-blue-600 focus:border-transparent @error('brand')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('expiration_date')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="location" class="sr-only">Location</label>
                        <input type="text" name="location" id="location" placeholder="Fridge's location" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="p-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="freezer" class="rounded border-gray-300 
                            text-blue-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 
                            focus:ring-opacity-50" checked>
                            <span class="ml-2">has a freezer</span>
                        </label>
                    </div>
                </div>

                <div class="block mb-3">
                    <span>Door's position</span>
                    <div class="mt-2 flex flex-row space-x-6">
                        <div class="mr-2">
                            <label class="inline-flex items-center">
                                <input type="radio" checked name="side" class="text-blue-500" value="0" />
                                <span class="ml-2">Left</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" name="side" class="text-blue-500" value="1" />
                                <span class="ml-2">Right</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full hover:bg-blue-700 focus:outline-none focus:ring-2 
                    focus:ring-blue-600 focus:ring-opacity-50 ">Create</button>
                </div>
            </form>

            
        </div>
    </div> 
@endsection