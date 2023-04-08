<?php

namespace App\Http\Controllers\Front;

use App\Models\Quote;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index()
    {
    	$categories = Category::orderBy('name', 'ASC')->get();
    	return view('front.topics.index', compact('categories'));
    }

    public function show($slug)
    {
    	$category = Category::where('slug', $slug)->firstOrFail();
    	$quotes = Quote::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
    	return view('front.topics.show', compact('category', 'quotes'));
    }
}