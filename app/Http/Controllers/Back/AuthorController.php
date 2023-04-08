<?php

namespace App\Http\Controllers\Back;

use App\Models\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthorController extends Controller
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
        $authors = Author::orderBy('id', 'DESC')->get();
        return view('back.author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.author.create');
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
            'name' => 'required|min:5|max:255',
            'year' => 'required',
            'short_description' => 'required|min:5|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,gif,png|max:2048',
        ));

        $author = new Author;
        $author->name = $request->name;
        $author->slug = $this->generateSlug($request->name);
        $author->year = $request->year;
        $author->short_description = $request->short_description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $author->image = $filename;
        }

        if($request->is_popular == 1){
            $author->is_popular = $request->is_popular;
        }else{
            $author->is_popular = 0;
        }

        $author->save();

        return redirect()->route('admin.author.index')->with('success', 'New author is added successfully');
    }


    public function generateSlug($name)
    {
        $author = Author::where('name', $name)->get();

        $count = $author->count();
        if($count > 0){
            $new_count = $count + 1;
            $slug = Str::slug($name).'-'.$new_count ;
        }else{
            $slug = Str::slug($name);
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
        $author = Author::FindOrFail(intval($id));
        return view('back.author.edit', compact('author'));
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
        $this->validate($request, array(
            'name' => 'required|min:5|max:255',
            'year' => 'required',
            'short_description' => 'required|min:5|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,gif,png|max:2048',
        ));

        $author = Author::FindOrFail(intval($id));
        $author->name = $request->name;

        if($request->name != $author->name){
            $author->slug = $this->generateSlug($request->name);
        }

        $author->year = $request->year;
        $author->short_description = $request->short_description;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time().'-image-'.$extension;
            $file->move('upload/images/', $filename);
            $author->image = $filename;
        }
        if($request->is_popular == 1){
            $author->is_popular = $request->is_popular;
        }else{
            $author->is_popular = 0;
        }

        $author->save();

        return redirect()->route('admin.author.index')->with('success', 'Author has been updated successfully');
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
