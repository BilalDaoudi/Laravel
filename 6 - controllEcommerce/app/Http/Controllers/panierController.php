<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function add(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        // Retrieve the product from the database
        $product = Produit::find($productId);
        
        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }
        
        if (isset($cart[$productId])) {
            $currentQuantity = $cart[$productId]['quantity'];
        
            if ($currentQuantity >= $product->quantity) {
                return response()->json(['success' => false, 'message' => 'Maximum quantity reached']);
            }
        
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'quantity' => 1,
            ];
        }
        $request->session()->put('cart', $cart);
        $cartCount = count($cart);
        return response()->json(['success' => true, 'message' => 'Product added to cart', 'cartCount' => $cartCount]);
        
    }
    
    public function show(Request $request)
    {

        $cart = $request->session()->get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $productId => $item) {
            $product = Produit::find($productId);
            $subtotal = $product->price * $item['quantity'];
            $totalPrice += $subtotal;
        }
        return view('paniers.show', [
            'cart' => $cart,
            'totalPrice' => $totalPrice,
        ]);
    }
    public function decrease(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);
    
        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]);
            }
        }
    
        $request->session()->put('cart', $cart);
    
        return redirect("/panier");
    }
    

}