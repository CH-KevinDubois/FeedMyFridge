@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/3 bg-white p-6 rounded-lg">
            <form action="{{ route('products.store', $fridge) }}" method="POST">
                @csrf
                <input type="hidden" name="fridge_id" value=" {{$fridge->fridge_id }}">

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="name" class="sr-only">Product</label>
                        <input type="text" name="name" id="name" placeholder="Product" class="bg-gray-100 
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
                        <label class="sr-only" for="expired_at">Expire at</label>
                        <input type="text" name="expired_at" id="expired_at" 
                        placeholder="Expiration date" onfocus="(this.type='date')"
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
                        <label for="description" class="sr-only">Additional description</label>
                        <input type="text" name="description" id="description" placeholder="Additional description" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="quantity" class="sr-only">Quantity</label>
                        <input type="text" name="quantity" id="quantity" placeholder="Quantity" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <select name="location" class="bg-gray-100 border-2 w-full p-4 rounded-lg invalid:text-blue-400 focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                        <option disabled selected value class="invalid:text-blue-500"> -- select a storage location -- </option>
                        @for ($i = 1; $i <= $fridge->number_racks_bulk; $i++)
                            <option>Rack level {{ $i }}</option>
                        @endfor
                        @for ($i = 1; $i <= $fridge->number_racks_door; $i++)
                            @if ($fridge->side)
                                <option>Right door rack level {{ $i }}</option>
                            @else
                                <option>Left door rack level {{ $i }}</option>
                            @endif
                        @endfor
                        @if ($fridge->freezer)
                            <option>Freezer</option>
                        @endif
                    </select>
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