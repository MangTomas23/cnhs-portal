@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<h2>Subjects</h2>
	<hr>
	<div class="panel panel-primary">
		<div class="panel-heading">Subjects</div>
		<div class="panel-body">
			<table class="table table-default">
				<thead>
					<th>#</th>
					<th>Subject Code</th>
					<th>Description</th>
					<th></th>
				</thead>
				<tbody>
					@if(count($subjects))
						@foreach($subjects as $index => $subject)
							<tr>
								<td>{{ $index + 1 }}</td>
								<td>{{ $subject->subject->subject_code }}</td>
								<td>{{ $subject->subject->description }}</td>
								<td>
									<a href="/admin/user/{{ $user->id }}/subject/delete/
									{{ $subject->id }}" style="color:red" title="Remove">
										<span class="glyphicon glyphicon-remove"></span>
									</a>
								</td>
							</tr>
						@endforeach
					@else
						<tr>
							<td colspan="4">No subjects.</td>
						</tr>
					@endif
				</tbody>
			</table>
		</div>
		<div class="panel-footer text-right">
			<a href="/admin/user/{{ $user->id }}/subject/add" class="btn btn-info">Add</a>
			<a href="/admin/user/{{ $user->id }}/subject/delete/all" 
			class="btn btn-danger">Remove All</a>
		</div>
	</div>
</div>

@if($user->type != 'student')

	<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
		<h2>Sections</h2>		
		<hr>
		<div class="panel panel-primary">
			<div class="panel-heading">Sections</div>
			<div class="panel-body">
				<table class="table table-default">
					<thead>
						<th>#</th>
						<th>Section</th>
						<th>No of Students</th>
						<th></th>
					</thead>
					<tbody>
						@if(count($user->sections))
							@foreach($user->sections as $i => $section)
								<tr>
									<td>{{ $i + 1 }}</td>
									<td>{{ $section->section->name }}</td>
									<td>{{ count($section->section->students) }}</td>
									<td>
										<a href="/admin/user/{{$user->id}}/section/delete/{{$section->id}}" 
										style="color:#F00;">
											<span class="glyphicon glyphicon-remove"></span>
										</a>
									</td>
								</tr>
							@endforeach
						@else 
							<tr>
								<td colspan="4">No sections.</td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<div class="panel-footer text-right">
				<a href="/admin/user/{{$user->id}}/section/add" class="btn btn-info">Add</a>
				<a href="/admin/user/{{$user->id}}/section/delete/all" class="btn btn-danger">Remove All</a>
			</div>
		</div>
	</div>

@endif

<div class="row col-sm-8 col-sm-offset-2" style="margin-top: 28px;">
	<h2>Account Info</h2>
	<hr>
	<div class="panel panel-info">
			<div class="panel-heading">
				{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}
			</div>
			<div class="panel-body">
				<form action="/admin/user/{{ $user->id }}" method="POST">
					{!! csrf_field() !!}
					<input type="hidden" name="_method" value="PUT">

					<strong>{{ $user->username }}</strong>
					<p>{{ ucfirst($user->type) }}</p>
					<hr>

					<div class="row">
						<div class="form-group col-sm-4 
						{{ $errors->has('firstname') ? 'has-error':'' }}">
							<label for="firstname">Firstname</label>
							<input name="firstname" type="text" class="form-control" 
							value="{{ $user->firstname }}">
							@if($errors->has('firstname'))
								<span class="help-block">
									<strong>{{ $errors->first('firstname') }}</strong>
								</span>
							@endif
						</div>

						<div class="form-group col-sm-4">
							<label for="middlename">Middlename</label>
							<input name="middlename" type="text" class="form-control" 
							value="{{ $user->middlename }}">
						</div>

						<div class="form-group col-sm-4 
						{{ $errors->has('lastname') ? 'has-error':'' }}">
							<label for="lastname">Lastname</label>
							<input name="lastname" type="text" class="form-control" 
							value="{{ $user->lastname }}">
							@if($errors->has('lastname'))
								<span class="help-block">
									<strong>{{ $errors->first('lastname') }}</strong>		
								</span>
							@endif
						</div>
					</div>
					
					@if($user->type == 'student')
						<div class="row">
							<div class="form-group col-sm-8">
								<label for="section">Section</label>
								<?php $section_id = count($user->section) ? $user->section->section_id:''; ?>
								{!! 
									Form::select('section', $sections, $section_id, [
									'class' => 'form-control']);
								!!}
							</div>

							<div class="form-group col-sm-4">
								<label for="year_level">Grade Level</label>
								{!! Form::select('year_level', [
											7 => 'Grade 7',
											8 => 'Grade 8',
											9 => 'Grade 9',
											10 => 'Grade 10',
										], $user->year_level,[
											'class' => 'form-control'
										]) !!}
							</div>
						</div>
					@else
						<div class="row">
							<div class="form-group col-sm-6">
								<label for="position">Position</label>
								<input type="text" class="form-control" name="position"
								value="{{ $user->position }}">
							</div>
							
							<div class="form-group col-sm-6">
								<label for="department">Department</label>
								{!! 
									Form::select('department', $departments, $user->department_id,[
										'class' => 'form-control'
									]);
								!!}
							</div>
						</div>

					@endif

					<div class="row">
						<div class="form-group col-sm-6">
							<label for="gender">Gender</label>
							{!! 
								Form::select('gender', [
									'm' => 'Male',
									'f' => 'Female',
								], $user->gender, ['class' => 'form-control']);
							!!}
						</div>

						<div class="form-group col-sm-6" >
							<label for="birthdate">Birthdate</label>
							<input name="birthdate" type="date" class="form-control"
							value="{{ $user->birthdate }}">
						</div>
					</div>

					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" name="address" class="form-control"
						value="{{ $user->address }}">
					</div>

					<div class="form-group">
						<label for="contact">Contact</label>
						<input type="text" name="contact" class="form-control"
						value="{{ $user->contact }}">
					</div>

			</div>
			<div class="panel-footer text-right">
				<button class="btn btn-success">Update</button>
				</form>
			</div>
	</div>
</div>

@endsection