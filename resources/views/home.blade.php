@extends('layouts.app')

@section('content')
<div class="container mt-3">
    
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#followup">Follow Up</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#outFolloup">Out Of Followup</a>
        </li>
    </ul>
        {{-- button search --}}
        <input class="form-control mt-3" id="myInput" type="text" placeholder="Search..">
        <!-- Tab panes -->
        <div class="tab-content">
            @if (Auth::user()->role==1) 
            <!-- Add student -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addStudent">
                Add Student
            </button>
            @endif
            @include('addstudent')
            @include('followuplist')
            @include('outfollowup')
        </div>
    </div>
    <script>
        // search students
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        // link to URL
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    
</div>
@endsection