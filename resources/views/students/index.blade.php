<style>
    .small-column {
      width: 10%;
    }
    .medium-column {
      width: 20%;
    }
    .large-column {
      width: 40%;
    }
  </style>

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-5 mx-4">
    <h2 class="fs-1 text-center mb-0 mx-auto fw-bold">Students</h2>
    
    <a href="{{route('students.create')}}"><button class="btn btn-success fs-5 px-4">New</button></a>
</div>
<table class="table">
    <thead>
      <tr>
        <th scope="col" class="small-column">#</th>
        <th scope="col" class="medium-column">IDno</th>
        <th scope="col" class="medium-column">Name</th>
        <th scope="col" class="medium-column">Age</th>
        <th scope="col" class="medium-column">Registrar</th>
        <th scope="col" class="medium-column">Update</th>
        <th scope="col" class="medium-column">Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            {{-- @dd($student); --}}
            {{-- <th scope="row">{{$student->id}}</th> --}}
            <th scope="row">{{$loop->iteration}}</th>
            <td>{{$student->IDno}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->age}}</td>
            {{-- <td>{{$student->user_id}}</td> --}}
            <td>{{$student->user->name}}</td>
            {{-- <td><a href="{{url("students/$student->id/edit")}}" class="btn btn-primary"> Update</a></td> --}}
            <td><a href="{{route('students.edit',$student->id)}}" class="btn btn-primary"> Update</a></td>
            {{-- <td><a href="{{url("students/$student->id/edit")}}" class="btn btn-danger"> Delete</a></td> --}}
            <td><a href="{{route('students.destroy',$student->id)}}" class="btn btn-danger" 
              onclick="return confirm('Are you sure ?')"
              > Delete</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection