@extends('layouts.app')

@section('content')
<div class="container mt-3">
    {{-- {{dd($student)}} --}}
    <div class="card">
        <div class="card-header bg-light mx-auto">
            <img src="{{asset('img_student/'.$student->picture)}}" width="80" style="border-radius: 25px;" height="80" alt="User" />
        </div>
        <hr>
        <!-- show information detail about student -->
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-12">
                    <b>{{$student->firstname}}</b> _{{$student->class}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <b>Description</b>
                    <p class="mt-2">{{$student->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach ($tutors as $tutor)
                        @if ($student->user_id == $tutor->id)
                        <b>Tutor By:</b> {{$tutor->firstname}}
                        @endif
                    @endforeach
                </div>
            </div>
            <hr>

            {{-- tutor comment on the student --}}
            <div class="form-group row">
                <div class="col-md-12">
                    <form action="{{route('addComment', $student->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment..." class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Post</button>
                    </form>  
                </div>
            </div>
            <div class="row">
                @foreach ($comments as $comment_stu)
                {{-- {{dd($comment_stu->id)}} --}}
                <div class="col-md-1">
                    <img src="{{asset('img_student/admin.jpg')}}" width="50" style="border-radius: 25px;" height="50" alt="User"/>
                </div>
                <div class="col-md-11">
                    <b>{{Auth::user()->firstname}}</b> {{$comment_stu->created_at}}
                    <div class="card alert alert-secondary mt-2">
                        {{$comment_stu->comment}}  
                    </div>
                    <a href="{{'comment.edit', $comment_stu->id}}" class="btn btn-primary mt-3" data-toggle="modal" data-target="#editComment{{$comment_stu->id}}">Edit</a>
                    @include('comment/editComment')
                    <a href="{{route('comment.destroy', $comment_stu->id)}}" class="btn btn-danger mt-3" data-toggle="modal" data-target="#deleteComment{{$comment_stu->id}}">Delete</a>
                    @include('comment/deleteComment')
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection