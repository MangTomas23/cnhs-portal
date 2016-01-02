@extends('master')

@section('content')

<div class="row col-sm-10 col-sm-offset-1">
	<div class="panel panel-success" style="margin-top: 28px;">
		<div class="panel-heading">Subject Registration</div>
		<div class="panel-body">
			<form action="/admin/subject" method="post">
				{!! csrf_field() !!}
				
				@if(session('status'))
					<div class="alert alert-info">
						<p>{{ session('status') }}</p>
					</div>
				@endif
								
				<div class="row">
					<div class="form-group col-sm-8 {{ $errors->has('subject_code') ? 
					'has-error':'' }}">
						<label for="subject_code">Subject Code</label>
						<input type="text" class="form-control" name="subject_code" 
						value="{{ old('subject_code') }}">
						@if($errors->has('subject_code'))
							<span class="help-block">
								<strong>{{ $errors->first('subject_code') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group col-sm-4">
						<label for="year_level">Grade Level</label>
						<select name="year_level" class="form-control">
							<option value="7">Grade 7</option>
							<option value="8">Grade 8</option>
							<option value="9">Grade 9</option>
							<option value="10">Grade 10</option>
						</select>
					</div>
				</div>

				<div class="form-group {{ $errors->has('description') ? 
				'has-error':''}}">
					<label for="description">Description</label>
					<input type="text" name="description" class="form-control" 
					value="{{ old('description') }}">

					@if($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="department">Department</label>
					{!! Form::select('department', $departments, null,[
						'class' => 'form-control'
					]) !!}
				</div>

		</div>
		<div class="panel-footer">
			<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	
<div class="row col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">Subject List</div>
		<table class="table table-default">
			<thead>
				<th>Subject Code</th>
				<th>Description</th>
				<th>Department</th>
				<th>Grade Level</th>
				<th></th>
			</thead>			
			<tbody>
				@foreach($subjects as $subject)
					<tr>
						<td>{{ $subject->subject_code }}</td>
						<td>{{ $subject->description }}</td>
						<td>{{ count($subject->department) ? $subject->department->name:'' }}</td>
						<td>{{ $subject->year_level }}</td>
						<td>
							<a href="/admin/subject/edit/{{ $subject->id }}">Edit</a> 
							<a href="/admin/subject/delete/{{ $subject->id }}">Delete</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection