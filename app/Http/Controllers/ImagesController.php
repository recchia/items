<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ImageFormRequest;
use App\Image;
use App\Item;
use Illuminate\Support\Facades\File;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $images = Image::all();

        return view('images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $items = Item::lists('name', 'id');

        return view('images.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ImageFormRequest $request)
    {
        $imageName = uniqid('img') . '.' . $request->file('image')->getClientOriginalExtension();

        $image = new Image([
            'item_id' => $request->get('item'),
            'image' => $imageName
        ]);

        $image->save();

        $request->file('image')->move(base_path() . '/public/img/catalog/', $imageName);

        return redirect()->route('images.create')->with('status', 'Your image has been uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $image = Image::whereId($id)->firstOrFail();

        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $image = Image::whereId($id)->firstOrFail();

        $items = Item::lists('name', 'id');

        return view('images.edit', compact('image', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $image = Image::whereId($id)->firstOrFail();
        $name = $image->image;
        $image->delete();

        File::delete(base_path() . '/public/img/catalog/' . $name);

        return redirect()->route('images.index')->with('status', 'The image '.$name.' has been deleted!');
    }
}
