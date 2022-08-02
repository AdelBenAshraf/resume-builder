<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Resume::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'worktitle' => 'required',
            'workcompany' => 'required',
            'educationdiscipline' => 'required',
            'educationplace' => 'required',
            'image' => 'required'
        ]);
        return Resume::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resume = Resume::find($id);
        if (is_null($resume) || empty($resume))
        {
            return ['Response' => 'The resume you want to show not found!'];
        }
        else
        {
            return $resume;
        }
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
       $resume = Resume::find($id);
       if (is_null($resume) || empty($resume))
       {
           return ['Response' => 'The resume you want to update not found!'];
       }
       else
       {
           $resume->update($request->all());
           return $resume;
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resume = Resume::find($id);
        if (is_null($resume) || empty($resume))
       {
           return ['Response' => 'The resume you want to delete not found!'];
       }
       else
       {
           $resume->destroy($id);
           return ['Response' => 'The resume has been deleted!'];
       }
    }

    /**
     * Search for a name
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        $resume = Resume::where('name', 'like', '%'.$name.'%')->get();
        if (is_null($resume) || empty($resume))
       {
           return ['Response' => 'The resume you want to show not found!'];
       }
       else
       {
           return $resume;
       }
    }
}
