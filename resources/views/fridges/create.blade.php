@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-1/2 bg-white p-6 rounded-lg">
            <form action="{{ route('fridges.store')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="name" class="sr-only">Name</label>
                        <input type="text" name="name" id="name" placeholder="Its name" 
                        class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                        focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                    </div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="brand" class="sr-only">Brand</label>
                        <input type="text" name="brand" id="brand" placeholder="Its brand" class="bg-gray-100 
                        border-2 w-full p-4 rounded-lg focus:outline-none focus:ring-2 
                        focus:ring-blue-600 focus:border-transparent"></div>
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <label for="freezer" class="sr-only">freezer</label>
                        <input class="form-tick h-6 w-6 border 
                        border-gray-300 rounded-md checked:bg-blue-600 checked:border-transparent focus:outline-none"
                        type="checkbox" name="freezer" id="freezer"  value="1">
                        <span class="text-gray-900 font-medium">Option 1</span>
                    </div>
                </div>
            </form>
        </div>
    </div> 
@endsection