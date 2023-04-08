<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('back.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        ));

        $category = new Category;
        $category->name = $request->name;
        $category->slug = $this->generateSlug($request->name);
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'New category is added successfully');
    }

    public function generateSlug($name)
    {
        $category = Category::where('name', $name)->get();

        $count = $category->count();
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
        $category = Category::findOrFail(intval($id));
        return view('back.category.edit', compact('category'));
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
        ));

        $category = Category::findOrFail(intval($id));
        $category->name = $request->name;

        if($category->name != $request->name){
            $category->slug = $this->generateSlug($request->name); 
        }
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Category has been updated successfully');
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
