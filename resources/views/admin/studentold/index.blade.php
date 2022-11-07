<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Welcome</b> : {{Auth::user()->name}}
        </h2>
    </x-slot>
    
    <div class="py-12">
            <center>
                
                <a class="btn btn-info" href="" data-bs-toggle="modal" data-bs-target="#myModal">รายวิชาทั้งหมด</a>
                
            </center><br>
        <div class="container">
            <div class="row">
                
                <div class="col-md-8">
                
                        @if(session("success"))
                                <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <div class="card">
                                <div class="card-header">ตารางข้อมูลนักศึกษา</div>
                            </div>
                            <div class="row">
                                    <table class="table">
                                    <thead>
                                        </a>
                                        <tr>
                                            <th scope="col">Number</th>
                                            <th scope="col">Student ID</th>
                                            <th scope="col">Student name</th>
                                            <th scope="col">Subject</th>
                                            @role('admin')
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            @endrole
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($student as $row)
                                        <tr>
                                        <th>{{$student->firstItem()+$loop->index}}</th>
                                        <td>{{$row->student_id}}</td>
                                        <td>{{$row->student_name}}</td>
                                        <td>{{$row->student_subject_id}}</td>
                                        @role('admin')
                                        <td>
                                            <a href="{{url('/student/edit/'.$row->id)}}" class="btn btn-primary">แก้ไข</a>
                                        </td>
                                        <td>
                                            <a href="{{url('/student/delete/'.$row->id)}}" class="btn btn-danger">ลบข้อมูล</a>
                                        </td>
                                        @endrole
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    {{$student->links()}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">แบบฟอร์ม</div>
                                <div class="card-body">
                                    <form action="{{route('addStudent')}}" method="post">
                                        @csrf
                                        <div class="form-groub">
                                            <label for="student_name">ชื่อนักเรียน</label>
                                            <input type="text"class="form-control" name=student_name >
                                        </div>
                                        @error('student_name')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror
                                        <div class="form-groub">
                                            <label for="student_id">รหัสนักเรียน</label>
                                            <input type="text"class="form-control" name=student_id >
                                        </div>
                                        @error('student_id')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror

                                        <div class="form-groub">
                                            <label for="student_subject_id">วิชาที่ลงทะเบียน</label>
                                            <input type="text"class="form-control" name=student_subject_id >
                                        </div>
                                        </div>
                                        @error('student_subject_id')
                                            <div>
                                            <span class="text-danger my-2">{{$message}}</span>
                                            </div>
                                        @enderror
                                        <input type="submit" value="บันทึก" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">รายวิชาทั้งหมด</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="student_name">ชื่อวิชา</label>
                            @foreach($student as $row)
                            <label class=""></label>
                            @endforeach
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</x-app-layout>
