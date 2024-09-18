@extends('header')
@section('content')
    <h2 class="font-bold text-3xl text-center my-5"><i class="ri-shopping-cart-2-fill"></i> My Cart</h2>

    <div class="px-24 mt-10">
        <table class="w-full">
            @if(count($carts) >0 )
            <tr>
                <th class="border px-4 py-2">Package Name</th>
                <th class="border px-4 py-2">Booking Date For</th>
                <th class="border px-4 py-2">No of People</th>
                <th class="border px-4 py-2">Items</th>
                <th class="border px-4 py-2">Package Price</th>
                <th class="border px-4 py-2">Items Price</th>
                <th class="border px-4 py-2">Total Price</th>
                <th class="border px-4 py-2">Action</th>
            </tr>
            @endif
            @forelse($carts as $cart)
            <tr>
                <td class="border px-4 py-2">{{$cart->package->name}}</td>
                <td class="border px-4 py-2">{{$cart->booking_date}}</td>
                <td class="border px-4 py-2">{{$cart->no_of_people}}</td>
                <td class="border px-4 py-2">
                    @foreach($cart->items as $item)
                    <p><i class="ri-restaurant-2-fill"></i> {{$item}}</p>
                    @endforeach
                </td>
                <td class="border px-4 py-2">Rs.{{$cart->package->price}}</td>
                <td class="border px-4 py-2">Rs.{{$cart->itemprice}}/plate</td>
                <td class="border px-4 py-2">Rs.{{$cart->package->price + $cart->itemprice*$cart->no_of_people}}</td>
                <td class="border px-4 py-2 grid gap-2 justify-center">
                    <a href="{{route('checkout',$cart->id)}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Checkout</a>
                    <a href="{{route('cart.destroy',$cart->id)}}" onclick="return confirm('Are you sure to delete Cart ?')" class="bg-red-600 text-white px-4 py-2 rounded-lg">Remove</a>

                </td>





            </tr>
            @empty
                <p>no items</p>
            @endforelse
        </table>
    </div>
@endsection
