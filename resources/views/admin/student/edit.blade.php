<x-app-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Welcome</b> : {{Auth::user()->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <div class="card">
                        <div class="card-header">แบบฟอร์มแก้ไขข้อมูล</div>
                        <div class="card-body">
                            <form action="{{url('/student/update/'.$student->id)}}" method="post">
                                @csrf
                                <div class="form-groub">
                                    <label for="student_name">ชื่อนักศึกษา</label>
                                    <input type="text"class="form-control" name=student_name value="{{$student->student_name}}">
                                </div>
                                @error('student_name')
                                    <div>
                                    <span class="text-danger my-2">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-groub">
                                    <label for="student_id">รหัสนักศึกษา</label>
                                    <input type="text"class="form-control" name=student_id value="{{$student->student_id}}">
                                </div>
                                @error('student_id')
                                    <div>
                                    <span class="text-danger my-2">{{$message}}</span>
                                    </div>
                                @enderror
                                <div class="form-groub">
                                    <label for="student_subject">วิชา</label>
                                    <input type="text"class="form-control" name=student_subject value="{{$student->student_subject}}">
                                </div>
                                @error('student_id')
                                    <div>
                                    <span class="text-danger my-2">{{$message}}</span>
                                    </div>
                                @enderror
                                <br>
                                <input type="submit" value="อัพเดท" class="btn btn-primary">
                                <a href="{{ route('student') }}" class="btn btn-secondary"> ยกเลิก </a>
                            </form>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</x-app-layout>
