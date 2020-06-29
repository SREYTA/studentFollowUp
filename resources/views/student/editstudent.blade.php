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
                            <select name="tutor" class="custom-select">
                            <option value="">Tutor</option>
                            @foreach ($tutors as $tutor)
                            <option value="{{$tutor->id}}">{{$tutor->firstname}}</option>
                            @if ($active_stu->user_id == $tutor->id)
                            <option value="{{$tutor->id}}" selected>{{$tutor->firstname}}</option>
                            @endif
                            @endforeach
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