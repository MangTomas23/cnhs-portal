@extends('master')

@section('content')

<h2>Section</h2>

<table class="table table-default">
	<thead>
		<th>#</th>
		<th>Section</th>
		<th>No. of Students</th>
	</thead>
	<tbody>
		@if(count($sections))		
			@foreach($sections as $i => $section) 
				<tr>
					<td>{{ $i + 1}}</td>
					<td>{{ $section->section->name }}</td>
					<td>{{ count($section->section->students) }}</td>
				</tr>
			@endforeach
		@else
			<tr>
				<td colspan="3">No Sections</td>
			</tr>
		@endif
	</tbody>
	
</table>

@endsection