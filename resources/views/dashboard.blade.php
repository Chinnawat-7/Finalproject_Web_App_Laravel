<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <b>Welcome</b> : {{Auth::user()->name}} 
            <b class="float-end">จำนวนผู้ใช้งานระบบ {{count($users)}} คน</b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
            <table class="table ">
                <thead>
                    <tr>
                        <th scope="col">Number</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Registered</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=1)
                    @foreach($users as $row)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                
            </div>
        </div>
    </div>
</x-app-layout>
