@extends('master')

@section('content')

<h2>My Grades</h2>

<table class="table table-default">
	<thead>
		<th>Subject</th>
		<th>1st Quarter</th>
		<th>2nd Quarter</th>
		<th>3rd Quarter</th>
		<th>4th Quarter</th>
		<th>Average</th>
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