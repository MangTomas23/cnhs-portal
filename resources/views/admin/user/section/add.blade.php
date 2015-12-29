@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<form action="/admin/user/{{ $id }}/section" method="POST">
		{!! csrf_field() !!}
		<table class="table table-default">
			<thead>
				<th></th>
				<th>Section</th>
				<th>No of Students</th>
			</thead>
			<tbody>
				@if(count($sections))
					@foreach($sections as $section)
						<tr>
							<td><input type="checkbox" name="s_ids[]" 
							value="{{ $section->id }}"></td>
							<td>{{ $section->name }}</td>
							<td>{{ count($section->students) }}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3">No sections.</td>
					</tr>
				@endif
			</tbody>
		</table>

		<button class="btn btn-success">Add</button>
	</form>
</div>


@endsection