@extends('layouts.app')

@section('content')
    <div class="m-auto w-3/4 bg-white p-6 rounded-lg">
        <div class="shadow overflow-hidden border border-blue-200 rounded-lg m-6">
            @if ($fridge->count_products())
                <table class="w-full divide-y divide-blue-200">
                    <thead  class="bg-blue-50">
                        <tr>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Name</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Expiration date</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Location</th>
                            <th class="px-2 py-3 text-left text-lg font-medium text-blue-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-xs divide-y divide-blue-200">
                    @foreach ($fridge->products->sortBy('expired_at') as $product)
                        <tr>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->name}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{Carbon\Carbon::parse($product->expired_at)->format('d m Y')}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">{{ $product->location}}</td>
                            <td class="px-2 py-4 text-base whitespace-nowrap">
                                <form action="{{ route('products.destroy', ['fridge' => $fridge, 'product' => $product]) }}" method="post" class="flex items-center">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="border border-red-500 shadow-md p-2 flex items-center justify-center 
                                        bg-red-500 rounded-lg focus:outline-none hover:bg-red-600">
                                        <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={3} d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                    </button>
                                </form>
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