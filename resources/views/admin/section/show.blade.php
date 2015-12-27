@extends('master')

@section('content')


<div class="row col-sm-8 col-sm-offset-2">
	<h2>{{ $section->name }}</h2>
	<hr>
	<table class="table table-default">
		<thead>
			<th>#</th>
			<th>Name</th>
		</thead>
			@foreach($section->students as $index =>  $student)
				<?php $student = $student->user; ?>
				<tr>
					<td>{{ $index + 1 }}</td>
					<td>{{ join(' ', [$student->firstname, $student->middlename, $student->lastname]) }}</td>
				</tr>
			@endforeach
		<tbody>
			
		</tbody>
	</table>
</div>


@endsection