<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;

class PageArchiveController extends Controller
{
    public function __invoke(): View
    {
        $archivedProducts = Product::query()
            ->where('archived', true)
            ->get();

        return view('archive', compact('archivedProducts'));
    }
}
