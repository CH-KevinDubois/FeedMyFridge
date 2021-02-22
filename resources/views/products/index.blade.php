@extends('layouts.app')

@section('content')
    <div class="m-auto w-3/4 bg-white p-6 rounded-lg">
        <div class="shadow overflow-hidden border border-blue-200 rounded-lg m-6">
            @if ($fridge->count_products())
                <table class="w-full divide-y divide-blue-200">
                    <thead  class="bg-blue-50">
                        <tr>
                            <th class="px-2 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Name</th>
                            <th class="px-2 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Expiration date</th>
                            <th class="px-2 py-3 text-left text-xs font-medium text-blue-500 uppercase tracking-wider">Location</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-xs divide-y divide-blue-200">
                    @foreach ($fridge->products->sortBy('expired_at') as $product)
                        <tr>
                            <td class="px-2 py-4 whitespace-nowrap">{{ $product->name}}</td>
                            <td class="px-2 py-4 whitespace-nowrap">{{Carbon\Carbon::parse($product->expired_at)->format('d m Y')}}</td>
                            <td class="px-2 py-4 whitespace-nowrap">{{ $product->location}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <span> There is no product to display</span>
            @endif
        </div>
@endsection