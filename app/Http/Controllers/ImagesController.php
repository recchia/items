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
     * @param integer $item_id
     *
     * @return Response
     */
    public function index($item_id)
    {
        $images = Image::where('item_id', $item_id)->get();

        return view('images.index', compact('images', 'item_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $item_id
     *
     * @return Response
     */
    public function create($item_id)
    {
        return view('images.create', compact('item_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param integer $item_id
     * @param ImageFormRequest $request
     *
     * @return Response
     */
    public function store($item_id, ImageFormRequest $request)
    {
        $imageName = uniqid('img') . '.' . $request->file('image')->getClientOriginalExtension();

        $image = new Image([
            'item_id' => $item_id,
            'image' => $imageName
        ]);

        $image->save();

        $request->file('image')->move(base_path() . '/public/img/catalog/', $imageName);

        return redirect()->route('items.images.create', ['items' => $item_id])->with('status', 'Your image has been uploaded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $item_id
     * @param  int  $image_id
     * @return Response
     */
    public function show($item_id, $image_id)
    {
        $image = Image::whereId($image_id)->firstOrFail();

        return view('images.show', compact('image', 'item_id'));
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
