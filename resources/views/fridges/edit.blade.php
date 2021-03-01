@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
            <form action="{{ route('fridges.update', $fridge)}}" method="POST">
                @csrf
                @method('patch')
                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="brand" class="sr-only">Brand</label>
                        <input type="text" name="brand" id="brand" value="{{ $fridge->brand }}" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
                        focus:ring-blue-600 focus:border-transparent @error('brand')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('brand')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="location" class="sr-only">Location</label>
                        <input type="text" name="location" id="location" value="{{ $fridge->location }}"
                        placeholder="Fridge's location" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="p-1">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="freezer" class="rounded border-gray-300 
                            text-blue-500 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 
                            focus:ring-opacity-50" 
                            @if ($fridge->freezer) checked @endif>
                            <span class="ml-2">has a freezer</span>
                        </label>
                    </div>
                </div>

                <div class="block mb-3">
                    <span>Door's position</span>
                    <div class="mt-2 flex flex-row space-x-6">
                        <div class="mr-2">
                            <label class="inline-flex items-center">
                                <input type="radio" name="side" class="text-blue-500" value="0" @if ($fridge->side) checked @endif/>
                                <span class="ml-2">Left</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex items-center">
                                <input type="radio" name="side" class="text-blue-500" value="1" @if (!$fridge->side) checked @endif/>
                                <span class="ml-2">Right</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="shelf" class="sr-only">Shelf number</label>
                        <input type="text" name="shelf" id="shelf" value="{{ $fridge->number_racks_bulk }}"
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('shelf')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('shelf')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="max_capacity" class="sr-only">Maximum capacity</label>
                        <input type="text" name="max_capacity" id="max_capacity" value="{{ $fridge->max_capacity }}" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('shelf')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('shelf')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="flex flex-row w-full space-x-2">
                    <div class="flex flex-row space-x-2">
                        <button type="submit" class="btn-blue px-6">Update</button>
                        <a href="{{ route('fridges.show', $fridge) }}" class="btn-blue text-center px-6">Cancel</a>
                    </div>
                </div>
            </form>

            
        </div>
    </div> 
@endsection