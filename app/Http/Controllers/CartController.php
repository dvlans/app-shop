<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;

class CartController extends Controller
{
    public function update(Request $request){
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); //UPDATE 
    	$notificationHead = 'Pedido registrado:';
    	$notification = 'Tu pedido se ha registrado exitosamente. Te contactaremos pronto vía mail.';
    	return back()->with(compact('notification', 'notificationHead'));
    }
}
