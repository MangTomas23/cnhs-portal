@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<form action="/admin/user/{{ $id }}/subject" method="POST">
		{!! csrf_field() !!}
		<table class="table table-default">
			<thead>
				<th></th>
				<th>Subject Code</th>
				<th>Description</th>
			</thead>
			<tbody>
				@if(count($subjects))
					@foreach($subjects as $subject)
						<tr>
							<td><input type="checkbox" name="s_ids[]" 
							value="{{ $subject->id }}"></td>
							<td>{{ $subject->subject_code }}</td>
							<td>{{ $subject->description }}</td>
						</tr>
					@endforeach
				@else
					<tr>
						<td colspan="3">No subjects.</td>
					</tr>
				@endif
			</tbody>
		</table>

		<button class="btn btn-success">Add</button>
	</form>
</div>

@endsection