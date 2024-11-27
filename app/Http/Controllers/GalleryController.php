<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'desc')->paginate(10);

        return view('backend.gallery.index')->with('galleries', $galleries);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'string|required',
            'photo' => 'string|nullable',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        // Store gallery
        $gallery = Gallery::create($data);

        if ($gallery) {
            session()->flash('success', 'Rasm muvaffaqqiyatli qo\'shildi.');
        } else {
            session()->flash('error', 'Iltimos yana urinib ko\'ring!!');
        }

        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
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
        $gallery = Gallery::findOrFail($id);

        return view('backend.gallery.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->validate($request, [
            'title' => 'string|required',
            'photo' => 'string|nullable',
            'status' => 'required|in:active,inactive'
        ]);

        $data = $request->all();

        $status = $gallery->fill($data)->save();

        if ($status) {
            request()->session()->flash('success', 'Rasm yangilandi');
        } else {
            request()->session()->flash('error', 'Iltimos yana urinib ko\'ring!!');
        }

        return redirect()->route('gallery.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $gallery = Gallery::findOrFail($id);

        $status = $gallery->delete();

        if ($status) {
            request()->session()->flash('success', 'Rasm o\'chirildi');
        } else {
            request()->session()->flash('error', 'Xatolik');
        }

        return redirect()->route('gallery.index');
    }

}
