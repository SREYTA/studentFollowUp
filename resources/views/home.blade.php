@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
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
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#myModal">
                Add Student
            </button>
            
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Add Student</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control" name="firstName" required autocomplete="firstName" placeholder="First Name">
                                </div>
                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control" name="lastName" required autocomplete="lastName" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <form action="#">
                                        <select id="class" name="class" class="form-control">
                                        <option disabled selected>Class</option>
                                        <option value="a">Class A</option>
                                        <option value="b">Class B</option>
                                        <option value="c">Class C</option>
                                        <option value="weba">WEP2020 A</option>
                                        <option value="webb">WEP2020 B</option>
                                        <option value="sna">SNA2020</option>
                                        </select>
                                    </form>
                                </div>
                                <div class="col-md-4 form-control">
                                    <form>
                                        <input type="file" id="myfile" name="myfile">
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <form action="#">
                                        <select id="tutor" name="tutor" class="form-control">
                                        <option disabled selected>Tutor</option>
                                        <option value="channak">Channak</option>
                                        <option value="ronan">Ronan</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea name="description" id="text" cols="30" rows="3" class="form-control" placeholder="Description"></textarea>
                                </div>
                            </div>
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    @foreach ($students as $student)
                    <tbody>
                        <tr>
                            <td>{{$student->picture}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>
                            <td><span class="material-icons">domain</span></td>
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
                    {{-- @foreach ($students as $student)
                    <tbody>
                        <tr>
                            <td>{{$student->picture}}</td>
                            <td>{{$student->firstname}}</td>
                            <td>{{$student->lastname}}</td>
                            <td>{{$student->class}}</td>
                            <td><span class="material-icons">domain</span></td>
                        </tr>
                    </tbody>
                    @endforeach --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
