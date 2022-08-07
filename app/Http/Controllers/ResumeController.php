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
        $resume = new Resume();
        $resume->name = $request->name;
        $resume->email = $request->email;
        $resume->age = $request->age;
        $resume->phone = $request->phone;
        $resume->address = $request->address;
        $resume->worktitle = $request->worktitle;
        $resume->workcompany = $request->workcompany;
        $resume->educationdiscipline = $request->educationdiscipline;
        $resume->educationplace = $request->educationplace;

        $path = $request->file('image');
        $filename = $path->getClientOriginalName();
        $destinationPath = public_path().'/images';
        $path->move($destinationPath,$filename);
        $resume->image = $filename;
        $resume->save();
        return $resume;
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
        ]);
       $resume = Resume::find($id);
       if (is_null($resume) || empty($resume))
       {
           return ['Response' => 'The resume you want to update not found!'];
       }
       else
       {
        $resume->name = $request->name;
        $resume->email = $request->email;
        $resume->age = $request->age;
        $resume->phone = $request->phone;
        $resume->address = $request->address;
        $resume->worktitle = $request->worktitle;
        $resume->workcompany = $request->workcompany;
        $resume->educationdiscipline = $request->educationdiscipline;
        $resume->educationplace = $request->educationplace;

        if (is_null($request->file('image')))
        {
            $resume->image = $resume->image;
        }
        else
        {
            $path = $request->file('image');
            $filename = $path->getClientOriginalName();
            $destinationPath = public_path().'/images';
            $path->move($destinationPath,$filename);
            $resume->image = $filename;
        }
        
        $resume->save();
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
