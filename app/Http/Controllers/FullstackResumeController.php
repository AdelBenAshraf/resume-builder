<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
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
        return view('createresume');
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
        //return redirect()->route('resumes/', ['id' => $id]);
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
        $data = Resume::find($id);
        return view('editresume', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
        $resume = Resume::find($request->id);
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
        return redirect('resumes');

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
           return redirect('resumes');
       }
    }
}
