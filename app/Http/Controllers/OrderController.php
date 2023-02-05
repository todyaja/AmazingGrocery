<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cart = DB::table('orders')->where('account_id',auth()->user()->id)
        ->join('items', 'items.id', '=', 'orders.item_id')
        ->select('orders.id','items.item_name','item_picture','price')
        ->get();

        $totalPrice = 0;

        foreach($cart as $c)
        {
            $totalPrice += $c->price;
        }

        return view('cart', compact(['cart','totalPrice']));
    }

    public function store(Request $request)
    {
        //
        DB::table('orders')->insert([
            'item_id' => $request->itemId,
            'account_id' => auth()->user()->id,
        ]);

        $request->session()->flash('alert', 'added to cart succesfully !');

        return redirect('/');
    }

    public function checkOut()
    {
        DB::table('orders')->where('account_id',auth()->user()->id)->delete();

        return view('post_checkout');
    }

    public function destroy(Request $request, $id)
    {
        //
        DB::table('orders')->delete($id);

        $request->session()->flash('alert', 'remove from cart succesfully !');

        return redirect('/cart');
    }
}
