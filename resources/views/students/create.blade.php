@extends('layouts.app');

@section('content')

{{-- errors loop  --}}
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- laravel collection form  --}}
{!! Form::open(['url' => 'students','method'=>'post']) !!}
    <div class="form-group mb-3 w-50">
      <label for="IDno" class="form-label">IDno</label>
      {!! Form::text('IDno', null, ['class'=>'form-control','placeholder' =>'Student id']) !!}
      </div>
      <div class="form-group mb-3 w-50">
      <label for="name" class="form-label">Full name</label>
      {!! Form::text('name', null, ['class'=>'form-control','placeholder' =>'Student name']) !!}
    </div>
    <div class="form-group mb-3 w-50">
      <label for="Age" class="form-label">Age</label>
      {!! Form::number('age', null, ['class'=>'form-control', 'placeholder' =>'Age', 'min' => 0, 'step' => 1]) !!}
    </div>
    <button type="submit" class="btn btn-primary">Add student</button>
{!! Form::close() !!}

@endsection