<?php

namespace App\Http\Controllers\Front;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index()
    {
    	$authors = Author::orderBy('name', 'ASC')->get();
    	return view('front.writer.index', compact('authors'));
    }
}
