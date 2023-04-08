<?php

namespace App\Http\Controllers\Front;

use App\Models\Category;
use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name', 'ASC')->take(8)->get();
    	$quotes = Quote::orderBy('id', 'DESC')->get();
    	return view('front.home.index', compact('categories', 'quotes'));
    }
}
