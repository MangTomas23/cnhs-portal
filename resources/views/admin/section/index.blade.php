@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel panel-info">
		<div class="panel-heading">Add Section</div>
		<div class="panel-body">
			<form action="/admin/section" method="post">
			{!! csrf_field() !!}

			<div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
				<label for="name">Section Name</label>
				<input type="text" name="name" class="form-control">
				@if($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>

<div class="row col-sm-8 col-sm-offset-2">
	<table class="table table-default">
		<thead>
			<th>#</th>
			<th>Section</th>
			<th></th>
		</thead>
		<tbody>
			@if(!count($sections))
				<tr>
					<td colspan="3">No sections</td>
				</tr>
			@else
				@foreach($sections as $index => $section)
					<tr>
						<td>{{ $index + 1 }}</td>
						<td>{{ $section->name }}</td>
						<td class="text-right">
							<a href="/admin/section/edit/{{ $section->id }}">Edit</a> 
							<a href="/admin/section/delete/{{ $section->id }}">Delete</a> 
						</td>
					</tr>
				@endforeach
			@endif
		</tbody>
	</table>
</div>

@endsection