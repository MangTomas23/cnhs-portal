@extends('master')

@section('content')

<h2>Departments</h2>

<table class="table table-default">
	<thead>
		<th>#</th>
		<th>Department</th>
		<th>Program Head</th>
	</thead>
	<tbody>
		@if(count($departments))
			@foreach($departments as $i => $department)
				<tr>
					<td>{{ $i + 1 }}</td>
					<td>{{ $department->name }}</td>
					<td>{{ $department->program_head }}</td>
					<td>
						<a href="/admin/department/edit/{{ $department->id }}">Edit</a>
						<a href="/admin/department/delete/{{ $department->id }}">Delete</a>
					</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="4">No departments.</td>
			</tr>
		@endif
		
	</tbody>
</table>

<div class="panel panel-primary" style="margin-top: 80px">
	<div class="panel-heading">Add</div>
	<div class="panel-body">
		<form action="/admin/department" method="POST">
			{!! csrf_field() !!}
			<div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
				<label for="name">Department Name</label>
				<input name="name" type="text" class="form-control" value="{{ old('name') }}" 
				placeholder="e.g. English">
				@if($errors->has('name'))
					<span class="help-block">
						<strong>{{$errors->first('name')}}</strong>
					</span>
				@endif
			</div>

			<div class="form-group">
				<label for="program_head">Program Head</label>
				<select name="program_head" class="form-control">
					
				</select>
			</div>
	</div>
	<div class="panel-footer text-right">
		<button class="btn btn-success">Add</button>
		</form>
	</div>
</div>
@endsection