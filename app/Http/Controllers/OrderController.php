<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }

    public function store(Request $request, $cartid, $totalprice)
    {
        $data = $request->data;
        $data = json_decode(base64_decode($data));
        if($data == null)
        {
            abort(500);
        }
        if($data->status == 'COMPLETE')
        {
            $cart = Cart::find($cartid);
            $order = [
                'user_id' => auth()->id(),
                'package_id' => $cart->package_id,
                'no_of_people' => $cart->no_of_people,
                'items' => $cart->items,
                'booking_date' => $cart->booking_date,
                'total_price' => $totalprice,
                'status' => 'Approved',
            ];
            Order::create($order);
            $cart->delete();
            return redirect()->route('cart.index')->with('success', 'Order placed successfully');
        }
        else
        {
            abort(500);
        }
    }

    public function status($id,$status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        $data = [
            'name' =>$order->user->name,
            'package' =>$order->package->name,
            'status' => $status,
        ];
        //send mail
        //Mail function
        Mail::send('emails.orderemail', $data, function ($message) use($order) {
            $message->to($order->user->email,$order->user->name);
            $message->subject('Order Status Notification');
        });
        return redirect()->back()->with('success', 'Order status updated successfully');
    }
}

