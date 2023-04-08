<?php

namespace App\Http\Controllers\Front;

use App\Models\Quote;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
    	$quotes = Quote::orderBy('id', 'DESC')->get();
    	return view('front.quote.index', compact('quotes'));
    }

    public function show($slug)
    {
    	$quote = Quote::where('slug', $slug)->firstOrFail();
    	$quotes = Quote::where('category_id', $quote->category_id)->orderBy('id', 'DESC')->get();
    	return view('front.quote.show', compact('quote', 'quotes'));
    }
}
