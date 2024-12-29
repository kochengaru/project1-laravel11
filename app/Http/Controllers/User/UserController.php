<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;



class UserController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('pages.user.index', compact('products'));
    }

    public function detail_product($id)
    {
        $product = Product::findOrFail($id);
        return view('pages.user.detail', compact('product'));
    } 

public function purchase($productId, $userId)
    {
        $product = Product::findOrFail($productId);
        $user = User::findOrFail($userId);

        // Check if the user has enough points
        if ($user->point >= $product->price) {
            // Deduct product price from user's points
            $totalPoints = $user->point - $product->price;
            
            // Update user points
            $user->update([
                'point' => $totalPoints,
            ]);

            // Show success alert and redirect
            Alert::success('Berhasil!', 'Produk berhasil dibeli!');
            return redirect()->back();
        } else {
            // Show error alert if points are insufficient
            Alert::error('Gagal!', 'Point anda tidak cukup!');
            return redirect()->back();
        }
    }

}
