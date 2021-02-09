@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-2/5 bg-white p-6 rounded-lg">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('email')
                    ring-2 ring-red-500 @enderror" value=" {{ old('email') }} ">

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Choose a password" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('password')
                    ring-2 ring-red-500 @enderror " value="">

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full hover:bg-blue-700 focus:outline-none focus:ring-2 
                    focus:ring-blue-600 focus:ring-opacity-50 ">Login</button>
                </div>
            </form>
        </div>
    </div> 
@endsection