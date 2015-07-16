<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemFormRequest;
use App\Item;
use App\Category;

class ItemsController extends Controller
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
        $items = Item::all();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::lists('name', 'id');

        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ItemFormRequest $request)
    {
        $item = new Item([
            'name' => $request->get('name'),
            'description' => $request->get('description')
        ]);

        $item->save();

        $item->categories()->attach($request->input('categories'));

        return redirect()->route('items.create')->with('status', 'The item ' . $item->name . 'has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $item = Item::whereId($id)->firstOrFail();

        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $item = Item::whereId($id)->firstOrFail();

        $categories = Category::lists('name', 'id');

        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id, ItemFormRequest $request)
    {
        $item = Item::whereId($id)->firstOrFail();
        $item->name = $request->get('name');
        $item->description = $request->get('description');
        $item->save();

        $item->categories()->sync($request->input('category_list'));

        return redirect()->route('items.edit', ['id' => $item->id])->with('status', 'The item '.$item->name.' has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Item::whereId($id)->firstOrFail();
        $name = $item->name;
        $item->delete();

        return redirect()->route('items.index')->with('status', 'The item '.$name.' has been deleted!');
    }
}
