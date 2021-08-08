<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use function Symfony\Component\Translation\t;


class CartController extends Controller
{
    public function showHome()
    {
        return view('shop.home');
    }

    public function index()
    {

        $products = Product::all();
        $categories = Category::all();
        $brands = Brand::all();
        return view('shop.product.list', compact('products','brands','categories'));
    }

    public function cart()
    {
        $carts = session()->get('cart');
        if (empty($carts)){
            $carts = [];
            session()->put('cart',$carts);
        }
        $totalCart = [];
        foreach ($carts as $cart){
            $sum = $cart['price']*$cart['quantity'];
            array_push($totalCart,$sum);
        }
        $totalCart = array_sum($totalCart);
        return view('shop.cart.cart', compact('carts','totalCart'));
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
//            session()->flush();
        } else {
            $carts[$id] = [
                'id' => $product->id,
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }

        return $this->getTotalCart($carts);

    }

    public function deleteCart($id)
    {
        $carts = session()->get('cart');
        unset($carts[$id]);
        session()->put('cart', $carts);
        $totalCart = [];
        foreach ($carts as $cart) {
            $sum = $cart['price'] * $cart['quantity'];
            array_push($totalCart, $sum);
        }
        $totalCart = array_sum($totalCart);
        $data = [
            'numbers' => count((array)session('cart')),
            'totalCart' => $totalCart
        ];
        return response()->json($data);
//        return $this->getTotalCart($carts);
    }

    public function quantity($id, Request $request)
    {
        $carts = session()->get('cart');
        $carts[$id]['quantity'] = $request->totalQuantity;
        session()->put('cart', $carts);
        $totalCart = [];
        foreach ($carts as $cart){
            $sum = $cart['price']*$cart['quantity'];
            array_push($totalCart,$sum);
        }
        $totalCart = array_sum($totalCart);
        $data = [
            'carts'=>$carts[$id],
            'totalCart'=> $totalCart
        ];
        return response()->json($data);
    }

    public function getTotalCart($carts)
    {
        session()->put('cart', $carts);
        $totalCart = [];
        foreach ($carts as $cart) {
            $sum = $cart['price'] * $cart['quantity'];
            array_push($totalCart, $sum);
        }
        $totalCart = array_sum($totalCart);
        $data = [
            'numbers' => count((array)session('cart')),
            'totalCart' => $totalCart
        ];
        return response()->json($data);
    }



}
