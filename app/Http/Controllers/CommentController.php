<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
use App\User;
use App\Comment;
class CommentController extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find(auth::id());
        $comment = Comment::find($id);
        if(auth()->user()->id==$comment->user_id){  
            $comment->comment = $request->get('comment');
            $comment->save();
            return back();
        }
        return "Unauthorize!!!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        if(auth()->user()->id==$comment->user_id){
            $comment->delete();
            return back();
        }
        return "Unauthorize!!!";
    }

    public function addComment(Request $request, $id )
    {
        $students = Student::find($id);
        $user = User::find(auth::id());
        $comments = new Comment;
        $comments->comment = $request->get('comment');
        $comments->user_id = $user->id;
        $comments->student_id=$students->id;
        $comments->save();
        return back();
    }
}
