<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use App\User;
use App\Comment;
class StudentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::all();
        $student =new Student;
        if($request->picture == null){
            $student -> picture = "student.png";
        }else {
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->picture->getClientOriginalExtension();
            request()->picture->move(public_path('/img_student/'), $imageName);
            $student -> picture = $imageName;
        }
        
        $student -> firstname = $request -> get('firstname');
        $student -> lastname = $request -> get('lastname');
        $student -> class = $request -> get('class');
        $student -> description = $request -> get('description');
        $student -> user_id = auth::id();
        $student -> save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $tutors = User::all();
        $comments = Comment::all();            
        return view('followupdetail', compact('student', 'comments','tutors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('home',compact('student'));
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
        $student = Student::find($id);
        if($request->picture == null){
            $student -> picture = "student.png";
        }else {
            request()->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.request()->picture->getClientOriginalExtension();
            request()->picture->move(public_path('/img_student/'), $imageName);
            $student -> picture = $imageName;
        }
        
        $student -> firstname = $request -> get('firstname');
        $student -> lastname = $request -> get('lastname');
        $student -> class = $request -> get('class');
        $student -> description = $request -> get('description');
        $student -> user_id = $request -> tutor;
        $student -> save();
        return redirect('/home');
    }

    // change stutus student(student followup), activefollowup = 1 
    public function followup($id){
        $students = Student::find($id);
        $students -> activeFollowup= true;
        $students -> save();
        return back();
    }
    // change stutus student(student out of followup), activefollowup = 0
    public function active($id){
        $students = Student::find($id);
        $students -> activeFollowup= false;
        $students -> save();
        return back();
    }

}