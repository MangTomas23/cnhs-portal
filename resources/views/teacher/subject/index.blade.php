@extends('master')

@section('content')

<h2>My Subjects</h2>

<table class="table table-default">
	<tbody>
		<th>#</th>
		<th>Subject Code</th>
		<th>Description</th>
	</tbody>
	<tbody>
		@if(count($subjects)) 
			@foreach($subjects as $i => $subject)
				<tr>
					<td>{{ $i + 1 }}</td>
					<td>{{ $subject->subject->subject_code }}</td>
					<td>{{ $subject->subject->description }}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="3">No Subjects</td>
			</tr>
		@endif

	</tbody>
</table>

@endsection