@extends('layouts.app')

@section('content')
    <div class="flex flex-col m-auto w-3/4 bg-white p-6 rounded-lg">
        <a href="{{ route('fridges.index') }}" class="btn-blue w-32 mr-6 self-end text-center">Go back</a>
        <div class="shadow overflow-hidden border border-blue-200 rounded-lg m-6">
            @if ($fridge->count_products())
                <table class="w-full divide-y divide-blue-200">
                    <thead  class="bg-blue-50">
                        <tr>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Product</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Expiration date</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Location</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-xs divide-y divide-blue-200">
                    @foreach ($fridge->products->sortBy('expired_at') as $product)
                        <tr>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->name}}</td>
                            @php
                                $expiration_date = Carbon\Carbon::parse($product->expired_at);
                            @endphp
                            <td class="px-2 py-4 text-base whitespace-nowrap @if($expiration_date->isPast()) text-red-500 font-extrabold @endif">{{$expiration_date->format('d m Y')}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->location}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">
                                <div class="flex flex-row space-x-2">
                                    <form action="{{ route('products.destroy', ['fridge' => $fridge, 'product' => $product]) }}" method="post" class="flex items-center">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="border border-red-500 shadow-md p-2 flex items-center justify-center
                                                bg-red-500 rounded-lg focus:outline-none hover:bg-red-600">
                                                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                    </form>
                                    <form action="{{ route('products.edit', ['fridge' => $fridge, 'product' => $product]) }}" method="post" class="flex items-center">
                                        @csrf
                                        @method('get')
                                            <button type="submit" class="border border-yellow-500 shadow-md p-2 flex items-center justify-center
                                                bg-yellow-500 rounded-lg focus:outline-none hover:bg-yellow-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <span> There is no product to display</span>
            @endif
        </div>
@endsection