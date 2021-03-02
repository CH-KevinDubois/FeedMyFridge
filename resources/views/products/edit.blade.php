@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
            <form action="{{ route('products.update', ['fridge' => $fridge, 'product' => $product]) }}" method="POST">
                @csrf
                @method('patch')
                <input type="hidden" name="fridge_id" value=" {{$fridge->fridge_id }}">

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="name" class="sr-only">Product</label>
                        <input type="text" name="name" id="name" placeholder="Product" value={{ $product->name}}
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
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
                        <label class="sr-only" for="expired_at">Expire at</label>
                        <input type="date" name="expired_at" id="expired_at" 
                        placeholder="Expiration date" value={{ $product->expired_at}}
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
                        focus:ring-blue-600 focus:border-transparent @error('brand')
                        ring-2 ring-red-500 border-transparent @enderror"></div>

                    @error('expired_at')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="description" class="sr-only">Optional description</label>
                        <input type="text" name="description" id="description" placeholder="Optional description" 
                        value="{{ $product->description }}" class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <select name="location" class="bg-gray-100 border-2 w-full p-4 rounded-lg invalid:text-blue-400 focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        @php
                            $options = [];
                            for ($i = 1; $i <= $fridge->number_racks_bulk; $i++) { 
                                array_push($options, "Shelf - " . $i);
                            }
                            array_push($options, $fridge->side?"Right door":"Left door");
                            if($fridge->freezer) array_push($options, "Freezer");
                        @endphp
                        @for ($i = 0; $i < count($options); $i++)
                            <option @if ($product->location===$options[$i]) selected @endif>{{ $options[$i] }}</option>
                        @endfor
                    </select>
                </div>

                <div class="flex flex-row space-x-2">
                    <button type="submit" class="btn-blue bg-blue-800 hover:bg-blue-900">Update</button>
                    <a href="{{ route('products.index', $fridge) }}" class="btn-blue text-center">Cancel</a>
                </div>
            </form>

            
        </div>
    </div> 
@endsection