<table class="table table-hover">
    <thead>
        <tr>
            <th>Picture</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Class</th>
            @if (Auth::user()->role==1) 
            <th>Action</th>
            @endif
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
            @if (Auth::user()->role==1)
            <td>
                <a href="{{ route('active',$active_stu->id)}}"><span class="material-icons text-success">person_add_disabled</span></a>
                <a href="{{ route('student.edit',$active_stu->id)}}" data-toggle="modal" data-target="#updateStudent{{$active_stu->id}}">
                    <span class="material-icons text-primary">edit</span>
                </a>
                @include('student/editstudent')
            </td>
            @endif
        @endif
        </tr>
    </tbody>
    @endforeach
</table>