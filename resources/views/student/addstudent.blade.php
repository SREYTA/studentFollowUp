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
                            <select id="class" name="class" class="custom-select">
                                <option value="" selected>Class</option>
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
                            <select id="tutor" name="tutor" class="custom-select">
                            <option value="" selected>Tutor</option>
                            @foreach ($tutors as $tutor) 
                                <option value="{{ $tutor->id }}">{{ $tutor->firstname }}</option>
                            @endforeach
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