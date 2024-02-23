@extends('layouts.app')

@section('content')
{{-- loops array  --}}
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
{{-- laravel collection form  --}}
{{-- {!! Form::open(['url' => 'students/{$student->id}/update','method'=>'put']) !!} --}}
{!! Form::model($student,['route'=>['students.update',$student->id],'method'=>'put']) !!}
    <div class="form-group mb-3 w-50">
      <label for="IDno" class="form-label">IDno</label>
      {!! Form::text('IDno', null, ['class'=>'form-control','placeholder' =>'Student id']) !!}
      </div>
      <div class="form-group mb-3 w-50">
      <label for="name" class="form-label">Name</label>
      {!! Form::text('name', null, ['class'=>'form-control','placeholder' =>'Student name']) !!}
    </div>
    <div class="form-group mb-3 w-50">
      <label for="Age" class="form-label">Age</label>
      {!! Form::number('age', null, ['class'=>'form-control', 'placeholder' =>'Age', 'min' => 0, 'step' => 1]) !!}
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
{!! Form::close() !!}

@endsection