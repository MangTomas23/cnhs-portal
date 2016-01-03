@extends('master')

@section('content')

<table class="table table-default">
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

		@else
			<tr>
				<td colspan="8">No grades posted yet.</td>
			</tr>
		@endif
	</tbody>
</table>

@endsection