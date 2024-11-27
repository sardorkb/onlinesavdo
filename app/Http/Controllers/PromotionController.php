<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promotions = Promotion::orderBy('created_at', 'desc')->paginate(10);

        return view('backend.promotion.index')->with('promotions',$promotions);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.promotion.create');
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
            'title'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'start_date'=>'date|required',
            'end_date'=>'date|required|after:start_date',
        ]);

        $data = $request->all();

    // Generate slug
    $slug = Str::slug($request->title);
    $count = Promotion::where('slug', $slug)->count();
    if ($count > 0) {
        $slug .= '-' . date('ymdis') . '-' . rand(0, 999);
    }
    $data['slug'] = $slug;

    // Store promotion
    $promotion = Promotion::create($data);

    if ($promotion) {
        session()->flash('success', 'Aksiya muvaffaqqiyatli qo\'shildi.');
    } else {
        session()->flash('error', 'Iltimos yana urinib ko\'ring!!');
    }

    return redirect()->route('promotion.index');
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
        $promotion=Promotion::findOrFail($id);
        
        return view('backend.promotion.edit')->with('promotion', $promotion);
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
        $promotion=Promotion::findOrFail($id);

        $this->validate($request, [
            'title'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|nullable',
            'start_date'=>'date|required',
            'end_date'=>'date|required|after:start_date',
        ]);

        $data=$request->all();

        $status=$promotion->fill($data)-save();

        if($status){
            request()->session()->flash('success','Aksiya yangilandi');
        }
        else{
            request()->session()->flash('error','Iltimos yana urinib ko\'ring!!');
        }

        return redirect()->route('promotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $promotion=Promotion::findOrFail($id);

        $status=$promotion->delete();

        if($status){
            request()->session()->flash('success','ksiya o\'chirildi');
        }
        else{
            request()->session()->flash('error','Xatolik');
        }

        return redirect()->route('promotion.index');
    }
}
