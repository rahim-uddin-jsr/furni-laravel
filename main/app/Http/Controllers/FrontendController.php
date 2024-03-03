<?php

namespace App\Http\Controllers;

use App\Portfolio;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function portfolioDetails($id) {
        $portfolio=Portfolio::with('images')->find($id);
        return view('portfoliodetails',compact('portfolio'));
     }
}
