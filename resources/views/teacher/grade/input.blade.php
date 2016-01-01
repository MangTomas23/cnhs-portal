@extends('master')

@section('content')

<h2>Input Grades</h2>

<div class="col-sm-8 col-sm-offset-2">
	<form action="" id="in-g-form">
		<div class="form-group">
			<label for="section">Section</label>
			<select id="in-sec" name="section" class="form-control">
				@if(count($sections))
					@foreach($sections as $section)
						<option value="{{$section->section->id}}">{{$section->section->name}}</option>
					@endforeach
				@else
					<option>No sections</option>
				@endif
			</select>
		</div>
		<div class="form-group">
			<label for="subject">Subject</label>
			<select id="in-sub" name="subject" class="form-control">
				@if(count($subjects))
					@foreach($subjects as $subject)
						<option value="{{$subject->subject->id}}">{{ $subject->subject->subject_code }}</option>
					@endforeach
				@else
					<option>No subjects</option>
				@endif
			</select>
		</div>

		<div class="form-group">
			<label for="school_year">School Year</label>
			<select name="school_year" class="form-control">
				<option>2015-2016</option>
				<option>2016-2017</option>
				<option>2017-2018</option>
			</select>
		</div>

		<strong>Students</strong>

		<table class="table table-default">
			<thead>
				<th>#</th>
				<th>Student Name</th>
				<th>1st Quarter</th>
				<th>2nd Quarter</th>
				<th>3rd Quarter</th>
				<th>4th Quarter</th>
				<th>Average</th>
			</thead>
			<tbody id="s-list">
				
			</tbody>
		</table>

		<div class="alert alert-success">
			<h1>Happy New Year!</h1>
		</div>
	</form>
</div>

@endsection