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
            @if (Auth::user()->role==1)
            <td>
                <a href="{{ route('followup',$stu->id)}}"><span class="material-icons text-danger">domain</span></a>
            </td>
            @endif
        </tr>
    </tbody>
        @endif
    
    @endforeach
</table>