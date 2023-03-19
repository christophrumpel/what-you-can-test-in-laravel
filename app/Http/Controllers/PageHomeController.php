<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class PageHomeController extends Controller
{
    public function __invoke(): View
    {
        return view('home', ['products' => Product::released()->get()]);
    }
}
