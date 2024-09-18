@extends('header')
@section('content')
    <h2 class="font-bold text-3xl text-center my-5"><i class="ri-shopping-cart-2-fill"></i> Checkout <i class="ri-shopping-bag-4-fill"></i> </h2>


        <div class="grid gap-4 sm:grid-cols-3 mt-8 m-2">

          <div class="flex items-center justify-center bg-gray-100 rounded-lg px-4 py-8">
            <input type="radio" class="w-6 h-6 cursor-pointer" id="khalti" name="payment"/>
            <label for="card" class="ml-4 flex gap-2 cursor-pointer">
              <img src="https://upload.wikimedia.org/wikipedia/commons/e/ee/Khalti_Digital_Wallet_Logo.png.jpg" class="w-12" alt="card1" />

            </label>
          </div>

          <div class="flex items-center justify-center bg-gray-100 rounded-lg px-4 py-8">
            <input type="radio" class="w-6 h-6 cursor-pointer" id="esewa" name="payment" />
            <label for="paypal" class="ml-4 flex gap-2 cursor-pointer">
              <img src="https://esewa.com.np/common/images/esewa_logo.png" class="w-24" alt="paypalCard" />
            </label>
          </div>

          <div class="flex items-center justify-center bg-gray-100 rounded-lg px-4 py-8">
            <input type="radio" class="w-6 h-6 cursor-pointer" id="cash" name="payment" />
            <label for="cash" class="ml-4 flex gap-2 cursor-pointer ">
            <img src="{{asset('logo/cash.png')}}" alt="cash" class="w-24">
            </label>
          </div>


        </div>

        <div class="flex items-center justify-center bg-gray-100 rounded-lg px-4 py-6 m-2">
            <div class="flex flex-col justify-center">
                <h2 class="text-2xl font-semibold text-center">Summary</h2>
                <p class="text-1xl text-center">Package name : {{$cart->package->name}}</p>
                <p class="text-1xl text-center">Booking date : {{$cart->booking_date}}</p>
                <p class="text-1xl text-center">No of people : {{$cart->no_of_people}} </p>

                <p class="text-1xl font-semibold text-center"> Total Price : Rs.{{$totalprice}}</p>

                <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
                    <input type="hidden" id="amount" name="amount" value="{{$totalprice}}" required>
                    <input type="hidden" id="tax_amount" name="tax_amount" value ="0" required>
                    <input type="hidden" id="total_amount" name="total_amount" value="{{$totalprice}}" required>
                    <input type="hidden" id="transaction_uuid" name="transaction_uuid"required>
                    <input type="hidden" id="product_code" name="product_code" value ="EPAYTEST" required>
                    <input type="hidden" id="product_service_charge" name="product_service_charge" value="0" required>
                    <input type="hidden" id="product_delivery_charge" name="product_delivery_charge" value="0" required>
                    <input type="hidden" id="success_url" name="success_url" value="{{route('orders.store',[$cart->id,$totalprice])}}" required>
                    <input type="hidden" id="failure_url" name="failure_url" value="{{route('cart.index')}}" required>
                    <input type="hidden" id="signed_field_names" name="signed_field_names" value="total_amount,transaction_uuid,product_code" required>
                    <input type="hidden" id="signature" name="signature" required>
                    <input value="Pay Now" type="submit" class="bg-green-600 text-white py-2 px-5 rounded-lg mt-5">
                    </form>
                <a href="{{route('cart.index')}}" class="bg-red-600 w-52 text-center text-white px-4 py-2 rounded-lg mt-5 ml-5">Cancel</a>
            </div>
        </div>

    @php
        $transaction_uuid = uniqid();
        $product_code = "EPAYTEST";
        $data = "total_amount=".$totalprice.",transaction_uuid=".$transaction_uuid.",product_code=".$product_code;
        $secret = "8gBm/:&EnhH.1/q";
        $s = hash_hmac('sha256', $data, $secret, true);
        $signature = base64_encode($s);
    @endphp

    <script>
        document.getElementById('transaction_uuid').value = "{{ $transaction_uuid }}";
        document.getElementById('signature').value = "{{ $signature }}";
    </script>
@endsection
