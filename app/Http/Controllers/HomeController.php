<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            // Jika ada pencarian
            $food = Food::where('nama', 'like', "%{$search}%")->get();
            $pakets = Paket::where('nama', 'like', "%{$search}%")->get();
        } else {
            // Jika tidak ada pencarian, tampilkan semua
            $food = Food::all();
            $pakets = Paket::all();
        }

        return view('home', compact('food', 'pakets', 'search'));
    }

    public function showfoodDetail(Food $food)
    {
        return view('food_detail', compact('food'));
    }

    public function showPaketDetail(Paket $paket)
    {
        return view('paket_detail', compact('paket'));
    }
}
