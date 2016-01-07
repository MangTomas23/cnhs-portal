@extends('master')

@section('content')

<h2 class="page-header">Profile</h2>
<p>Name: {{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</p>
<p>Student ID: {{ $user->username }}</p>
<p>Section: {{ $user->section->section->name }}</p>
<p>Address: {{ $user->address }}</p>
<p>Contact: {{ $user->contact }}</p>

<h2 class="page-header">My Grades</h2>

<table class="table table-default" style="min-height: 240px">
	<thead>
		<th>Subject</th>
		<th>1st Quarter</th>
		<th>2nd Quarter</th>
		<th>3rd Quarter</th>
		<th>4th Quarter</th>
		<th>Average</th>
		<th>School Year</th>
	</thead>
	<tbody>
		@if(count($grades))
			@foreach($grades as $grade)
				<tr>
					<td>{{ $grade->subject->subject_code }}</td>
					<td>{{ $grade->q1 }}</td>
					<td>{{ $grade->q2 }}</td>
					<td>{{ $grade->q3 }}</td>
					<td>{{ $grade->q4 }}</td>
					<td>{{ $grade->average }}</td>
					<td>{{ $grade->school_year }}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="6">No grades posted yet.</td>
			</tr>
		@endif
	</tbody>
</table>
@endsection