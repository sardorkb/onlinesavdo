<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Job;
class JobController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(10);

        return view('backend.job.index')->with('jobs',$jobs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.job.create');
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
            'requirements'=>'string|required',
            'conditions'=>'string|required',
            'skills'=>'string|required',
            'location'=>'string|required',
            'phone_number'=>'string|required',
            'close_date'=>'date|required',
        ]);

        $data = $request->all();

    // Generate slug
    $slug = Str::slug($request->title);
    $count = Job::where('slug', $slug)->count();
    if ($count > 0) {
        $slug .= '-' . date('ymdis') . '-' . rand(0, 999);
    }
    $data['slug'] = $slug;

    // Store job
    $job = Job::create($data);

    if ($job) {
        session()->flash('success', 'Vakansiya muvaffaqqiyatli qo\'shildi.');
    } else {
        session()->flash('error', 'Iltimos yana urinib ko\'ring!!');
    }

    return redirect()->route('job.index');
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
        $job=Job::findOrFail($id);
        
        return view('backend.job.edit')->with('job', $job);
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
        $job=Job::findOrFail($id);

        $this->validate($request, [
            'title'=>'string|required',
            'description'=>'string|nullable',
            'requirements'=>'string|required',
            'conditions'=>'string|required',
            'skills'=>'string|required',
            'location'=>'string|required',
            'phone_number'=>'string|required',
            'close_date'=>'date|required',
        ]);

        $data=$request->all();

        $status=$job->fill($data)->save();

        if($status){
            request()->session()->flash('success','Vakansiya yangilandi');
        }
        else{
            request()->session()->flash('error','Iltimos yana urinib ko\'ring!!');
        }

        return redirect()->route('job.index');
    }



     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $job=Job::findOrFail($id);

        $status=$job->delete();

        if($status){
            request()->session()->flash('success','Vakansiya o\'chirildi');
        }
        else{
            request()->session()->flash('error','Xatolik');
        }

        return redirect()->route('job.index');
    }
}
