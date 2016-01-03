@extends('master')

@section('content')
<form action="/programhead/approve" method="POST">
	{!! csrf_field() !!}
	<table class="table table-default" style="min-height: 280px">
		<thead>
			<th><input type="checkbox"></th>
			<th>Subject Code</th>
			<th>Student Name</th>
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
						<td><input name="g_id[]" value="{{ $grade->id }}" type="checkbox"></td>
						<td>{{ $grade->subject->subject_code }}</td>
						<td>{{ join(' ', [$grade->user->firstname,
						$grade->user->middlename, $grade->user->lastname]) }}</td>
						<td>{{ $grade->q1 }}</td>
						<td>{{ $grade->q2 }}</td>
						<td>{{ $grade->q3 }}</td>
						<td>{{ $grade->q4 }}</td>
						<td>{{ $grade->average }}</td>
					</tr>
				@endforeach
			@else
				<tr>
					<td colspan="8">No grades posted yet.</td>
				</tr>
			@endif
		</tbody>
	</table>

	<div class="row text-center">
		<button class="btn btn-primary">Approve</button>
	</div>
</form>
@endsection