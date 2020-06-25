@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
@section('content')
<div class="container mt-3">
    <div class="card">
        <div class="card-header bg-light mx-auto">
            <img src="{{asset('img_student/'.$student->picture)}}" width="80" style="border-radius: 25px;" height="80" alt="User" />
        </div>
        <hr>
        <!-- Modal body -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <b>{{$student->firstname}}</b> _{{$student->class}}
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5>Description</h5>
                    <p>{{$student->description}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    Tutor By: {{ Auth::user()->firstname }}
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <div class="col-md-12">
                    <form action="{{route('comment.store', $student->id)}}" method="POST">
                        @csrf
                        @method('POST')
                        <textarea name="comment" id="comment" cols="30" rows="3" placeholder="Write a comment..." class="form-control"></textarea>
                        <button type="submit" class="btn btn-primary mt-2">Post</button>
                    </form>  
                </div>
            </div>
            <div class="row">
                <div class="col-md-1">
                    <img src="{{asset('img_student/admin.jpg')}}" width="50" style="border-radius: 25px;" height="50" alt="User" />
                </div>
                <div class="col-md-11">
                    {{Auth::user()->created_at}}
                    <div class="card alert alert-secondary">
                        {{-- {{$student->pivot->comment}}? --}}
                    </div>
                    <a href="#">Edit</span></a> |
                    <a href="#" class="text text-danger">Delete</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection