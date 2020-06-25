@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#addStudent">
                Add Student
            </button>
        
            <!-- The Modal of add student-->
            <div class="modal" id="addStudent">
                <div class="modal-dialog">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Add Student</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="{{route('student.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input id="fname" type="text" class="form-control" name="firstname" required autocomplete="firstName" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input id="lname" type="text" class="form-control" name="lastname" required autocomplete="lastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4">
                                        <select id="class" name="class" class="form-control">
                                            <option disabled selected>Class</option>
                                            <option value="Class A">Class A</option>
                                            <option value="Class B">Class B</option>
                                            <option value="Class C">Class C</option>
                                            <option value="WEP2020 A">WEP2020 A</option>
                                            <option value="WEP2020 B">WEP2020 B</option>
                                            <option value="SNA2020">SNA2020</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-control">
                                        <input type="file" id="picture" name="picture">
                                    </div>
                                    <div class="col-md-4">
                                        <select id="tutor" name="tutor" class="form-control">
                                        <option disabled selected>Tutor</option>
                                        <option value="{{ Auth::user()->firstname }}">{{ Auth::user()->firstname }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <textarea name="description" id="text" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                                    </div>
                                </div>
                                <!-- Modal footer -->
                                
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="followup" class="container tab-pane active"><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($students as $active_stu)
                    <tbody id="myTable">
                        <tr>
                             {{-- In Followup List --}}
                            @if ($active_stu->activeFollowup == 1) 
                            <td class='clickable-row' data-href='{{route('student.show',$active_stu->id)}}'><img src="{{asset('img_student/'.$active_stu->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                            <td class='clickable-row' data-href='{{route('student.show',$active_stu->id)}}'>{{$active_stu->firstname}}</td>
                            <td class='clickable-row' data-href='{{route('student.show',$active_stu->id)}}'>{{$active_stu->lastname}}</td>
                            <td class='clickable-row' data-href='{{route('student.show',$active_stu->id)}}'>{{$active_stu->class}}</td>
                            <td>
                                <a href="{{ route('active',$active_stu->id)}}"><span class="material-icons text-success">person_add_disabled</span></a>
                                <a href="{{ route('student.edit',$active_stu->id)}}" data-toggle="modal" data-target="#updateStudent{{$active_stu->id}}">
                                    <span class="material-icons text-primary">edit</span>
                                </a>
                                <!-- The Modal of update student-->
                                <div class="modal" id="updateStudent{{$active_stu->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                    
                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                            <h4 class="modal-title">Update Student</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                    
                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form action="{{route('student.update', $active_stu->id)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group row">
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="firstname" value="{{$active_stu->firstname}}">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="text" class="form-control" name="lastname" value="{{$active_stu->lastname}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-4">
                                                            <select id="class" name="class" class="form-control">
                                                            <option disabled selected>Class</option>
                                                            @if ($active_stu->class == 'Class A') 
                                                                <option value="Class A" selected>Class A</option>
                                                                <option value="Class B">Class B</option>
                                                                <option value="Class C">Class C</option>
                                                                <option value="WEP2020 A">WEP2020 A</option>
                                                                <option value="WEP2020 B">WEP2020 B</option>
                                                                <option value="SNA2020">SNA2020</option>
                                                            @endif
                                                            @if ($active_stu->class == 'Class B') 
                                                                <option value="Class A">Class A</option>
                                                                <option value="Class B" selected>Class B</option>
                                                                <option value="Class C">Class C</option>
                                                                <option value="WEP2020 A">WEP2020 A</option>
                                                                <option value="WEP2020 B">WEP2020 B</option>
                                                                <option value="SNA2020">SNA2020</option>
                                                            @endif
                                                            @if ($active_stu->class == 'Class C') 
                                                                <option value="Class A">Class A</option>
                                                                <option value="Class B">Class B</option>
                                                                <option value="Class C" selected>Class C</option>
                                                                <option value="WEP2020 A">WEP2020 A</option>
                                                                <option value="WEP2020 B">WEP2020 B</option>
                                                                <option value="SNA2020">SNA2020</option>
                                                            @endif
                                                            @if ($active_stu->class == 'WEP2020 A') 
                                                                <option value="Class A">Class A</option>
                                                                <option value="Class B">Class B</option>
                                                                <option value="Class C">Class C</option>
                                                                <option value="WEP2020 A" selected>WEP2020 A</option>
                                                                <option value="WEP2020 B">WEP2020 B</option>
                                                                <option value="SNA2020">SNA2020</option>
                                                            @endif
                                                            @if ($active_stu->class == 'WEP2020 B') 
                                                                <option value="Class A">Class A</option>
                                                                <option value="Class B">Class B</option>
                                                                <option value="Class C">Class C</option>
                                                                <option value="WEP2020 A">WEP2020 A</option>
                                                                <option value="WEP2020 B" selected>WEP2020 B</option>
                                                                <option value="SNA2020">SNA2020</option>
                                                            @endif
                                                            @if ($active_stu->class == 'SNA2020') 
                                                                <option value="Class A">Class A</option>
                                                                <option value="Class B">Class B</option>
                                                                <option value="Class C">Class C</option>
                                                                <option value="WEP2020 A">WEP2020 A</option>
                                                                <option value="WEP2020 B">WEP2020 B</option>
                                                                <option value="SNA2020" selected>SNA2020</option>
                                                            @endif
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4 form-control">
                                                            <input type="file" id="picture" name="picture">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <select id="tutor" name="tutor" class="form-control">
                                                                <option value="{{ Auth::user()->firstname }}" selected>{{ Auth::user()->firstname }}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <textarea name="description" cols="30" rows="3" class="form-control" placeholder="{{$active_stu->description}}"></textarea>
                                                        </div>
                                                    </div>
                                                    <!-- Modal footer -->
                                                    
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        
                    </tbody>
                    @endforeach
                </table>
            </div>
            <div id="outFolloup" class="container tab-pane fade"><br>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Picture</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Class</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    @foreach ($students as $stu)
                    {{-- Not in Followup List --}}
                        @if ($stu->activeFollowup == 0) 
                            <a href="{{ route('active',$stu->id)}}"></a>
                    <tbody id="myTable">
                        <tr>
                            <td><img src="{{asset('img_student/'.$stu->picture)}}" width="40" style="border-radius: 25px;" height="40" alt="User" /></td>
                            <td>{{$stu->firstname}}</td>
                            <td>{{$stu->lastname}}</td>
                            <td>{{$stu->class}}</td>
                            <td>
                                <a href="{{ route('followup',$stu->id)}}"><span class="material-icons text-danger">domain</span></a>
                            </td>
                        </tr>
                    </tbody>
                        @endif
                    
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    
</div>
@endsection