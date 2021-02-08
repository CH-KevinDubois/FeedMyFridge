@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-2/5 bg-white p-6 rounded-lg">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('name')
                    ring-2 ring-red-500 @enderror" value="{{ old('name') }}">

                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Username" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('username')
                    ring-2 ring-red-500 @enderror" value="{{ old('username') }}">

                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

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
                    <label for="password_confirmation" class="sr-only">Password again</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat your password" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg focus:outline-none 
                    focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('password_confirmation')
                    ring-2 ring-red-500 @enderror" value="">

                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded
                    font-medium w-full hover:bg-blue-700 focus:outline-none focus:ring-2 
                    focus:ring-blue-600 focus:ring-opacity-50 ">Register</button>
                </div>
            </form>
        </div>
    </div> 
@endsection