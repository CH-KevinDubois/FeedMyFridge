@extends('layouts.app')

@section('content')
    <div class="flex flex-col m-auto w-3/4 h-full bg-white p-6 rounded-lg">
        <div class="grid sm:grid-cols-2 md:grid-cols-4 col-span-1 gap-6 mx-6 bg-white">
            <form action="{{ route('fridges.allproducts') }}" method="get" class="mr-2 flex flex-row">
                <input
                type="text" name="search" 
                placeholder="Search ..."
                class="px-6 py-2 border border-gray-300 placeholder-gray-500 rounded-r-none
                text-gray-800 shadow-sm rounded-md focus:outline-none focus:ring-gray-500 focus:border-gray-50"/>
                <button type="submit" class="btn-blue rounded-l-none">
                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="absolute left-3 bottom-3 h-4 w-4 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </form>
        </div>
        <div class="shadow rounded-lg m-6 overflow-y-scroll" style="height: 65vh">
            @if ($products->count())
                <table class="w-full divide-y divide-gray-100">
                    <thead  class="bg-blue-400 sticky">
                        <tr>
                            <th class="px-2 py-3 text-left text-lg rounded-tl-lg font-medium text-white">Name</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-white">Expiration date</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-white">Location</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-xs divide-y divide-gray-100">
                    @foreach ($products as $product)
                        <tr>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->name}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{Carbon\Carbon::parse($product->expired_at)->format('d m Y')}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->fridge_name }} - {{ $product->location}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <span> There is no product to display</span>
            @endif
        </div>
@endsection