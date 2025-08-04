<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Paket;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $food = Food::all(); // Ambil semua data food
        $pakets = Paket::all();     // Ambil semua data paket
        return view('home', compact('food', 'pakets'));
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