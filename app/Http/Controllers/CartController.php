<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    public function showHome()
    {
        return view('shop.home');
    }

    public function index()
    {

        $products = Product::all();
        return view('shop.product.list', compact('products'));
    }

    public function cart()
    {
        $carts = session()->get('cart');
        return view('shop.cart.cart', compact('carts'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);
        $carts = session()->get('cart');
        if (!$carts) {
            $carts = [
                $id => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->image,
                    'price' => $product->price,
                    'quantity' => 1,
                ]
            ];
        }
        if (isset($carts[$id])) {
            $carts[$id]['quantity'] += 1;
            session()->put('cart', $carts);
        } else {
            $carts[$id] = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $carts);
        $data = [
            'numbers' => count((array)session('cart')),
        ];
        return response()->json($data);
    }

    public function deleteCart($id)
    {
        $carts = session()->get('cart');
        unset($carts[$id]);
        session()->put('cart', $carts);
        $data = [
            'numbers' => count((array)session('cart')),
        ];
        return response()->json($data);
    }

    public function quantity($id, Request $request)
    {
        $carts = session()->get('cart');
        if ($request->totalQuantity < 0) {
            unset($carts[$id]);
            session()->put('cart', $carts);
        } else {
            $carts[$id]['quantity'] = $request->totalQuantity;
            session()->put('cart', $carts);
        }


        return response()->json($carts[$id]);


    }
}
