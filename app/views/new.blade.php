@extends('layouts.main')

@section('content')

	<h1>Create New Task</h1>

	@foreach($errors->all() as $error)
		{{ $error }}
	@endforeach

	{{ Form::open() }}
			<div class="form-group">
				{{ Form::text('name', null, array('placeholder' => 'Task name')) }}
			</div>

			<div class="form-group">
				{{ Form::submit('Create', array('class' => 'btn btn-success')) }}
			</div>

	{{ Form::close() }}
@stop