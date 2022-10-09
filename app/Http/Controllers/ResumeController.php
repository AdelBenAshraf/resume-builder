<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resumes = Resume::all();
        return response()->json([
            'status' => 200,
            'resumes' => $resumes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required',
            'age' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'worktitle' => 'required',
            'workcompany' => 'required',
            'educationdiscipline' => 'required',
            'educationplace' => 'required',
            'image' => 'required|image|max:800'
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages() 
            ]);
        }
        else
        {
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
            return response()->json([
                'status' => 201,
                'message' => 'Resume created successfully'
            ]);
        }
        
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
        if ($resume)
        {
            return response()->json([
                'status' => 200,
                'resume' => $resume
            ]);
        }
        else
        {
            return response()->json([
                'status' => 404,
                'message' => 'This resume not found'
            ]);
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
        $validator = Validator::make($request->all(),[
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

        if ($validator->fails())
        {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ]);
        }

       $resume = Resume::find($id);
       if ($resume)
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

            if ($request->hasFile('image'))
            {
                if (File::exists(public_path('images/'.$resume->image)))
                {
                    File::delete(public_path('images/'.$resume->image));
                    $path = $request->file('image');
                    $filename = $path->getClientOriginalName();
                    $destinationPath = public_path().'/images';
                    $path->move($destinationPath,$filename);
                    $resume->image = $filename;
                }
            }
            
            
            $resume->save();
            return response()->json([
                'status' => 200,
                'message' => 'Resume updated successfully'
            ]);
       }
       else
       {
            return response()->json([
                'status' => 404,
                'message' => 'Resume Not Found'
            ]);
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
        if ($resume)
       {
            $resume->destroy($id);
            return response()->json([
            'status' => 200,
            'message' => 'Resume Deleted Successfully',
           ]);
       }
       else
       {
           
           return response()->json([
            'status' => 404,
            'message' => 'This Resume was not found'
           ]);
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
