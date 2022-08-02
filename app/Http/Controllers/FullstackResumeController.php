<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;

class FullstackResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = Resume::paginate(10);
        return view('listresumes', ['resumes' => $resumes]);
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
        //
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
            $data = array(
                'name' => $resume->name,
                'email' => $resume->email,
                'age' => $resume->age,
                'phone' => $resume->phone,
                'address' => $resume->address,
                'worktitle' => $resume->worktitle,
                'workcompany' => $resume->workcompany,
                'educationdiscipline' => $resume->educationdiscipline,
                'educationplace' => $resume->educationplace,
                'image' => $resume->image
            );
            return view('registeredresume')->with($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
           return view('listresumes');
       }
    }
}
