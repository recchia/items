<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Category;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CategoryFormRequest $request)
    {
        $category = new Category();
        $category->name = $request->get('name');
        if (!empty($request->get('parent'))) {
            $category->parent_id = $request->get('parent');
        }

        $category->save();

        return redirect()->route('categories.create')->with('status', 'Your category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $category = Category::whereId($id)->firstOrFail();

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $category = Category::whereId($id)->firstOrFail();

        $categories = Category::lists('name', 'id');

        return view('categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, CategoryFormRequest $request)
    {
        $category = Category::whereId($id)->firstOrFail();
        $category->name = $request->get('name');
        if (!empty($request->get('parent'))) {
            $category->parent_id = $request->get('parent');
        }
        $category->save();

        return redirect()->route('categories.edit', ['id' => $category->id])->with('status', 'The category '.$category->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::whereId($id)->firstOrFail();
        $name = $category->name;
        $category->delete();

        return redirect()->route('categories.index')->with('status', 'The category '.$name.' has been deleted!');
    }
}
