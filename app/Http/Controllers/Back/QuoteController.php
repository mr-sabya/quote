<?php

namespace App\Http\Controllers\Back;

use App\Models\Quote;
use App\Models\Author;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotes = Quote::orderBy('id', 'DESC')->get();
        return view('back.quote.index', compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $authors = Author::orderBy('id', 'DESC')->get();
        return view('back.quote.create', compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|min:5|max:255',
            'author_id' => 'required',
            'category_id' => 'required',
            'quote' => 'required',
        ));

        $quote = new Quote;

        $quote->title = $request->title;
        $quote->slug = $this->generateSlug($request->title);
        $quote->author_id = $request->author_id;
        $quote->category_id = $request->category_id;
        $quote->quote = $request->quote;
        $quote->date = $request->date;
        $quote->tags = $request->tags;

        if($request->is_popular == 1){
            $quote->is_popular = 1;
        }else{
            $quote->is_popular = 0;
        }

        $quote->save();

        return redirect()->route('admin.quote.index')->with('success', 'New quote is added successfully');
    }

    public function generateSlug($title)
    {
        $quote = Quote::where('title', $title)->get();

        $count = $quote->count();
        if($count > 0){
            $new_count = $count + 1;
            $slug = Str::slug($title).'-'.$new_count ;
        }else{
            $slug = Str::slug($title);
        }

        return $slug;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
