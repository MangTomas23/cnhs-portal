@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel panel-success">
		<div class="panel-heading">Edit</div>
		<div class="panel-body">
			<form action="/admin/department" method="POST">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="department_id" value="{{ $department->id }}">
			<div class="form-group">
				<label for="name">Department Name</label>
				<input class="form-control" type="text" value="{{ $department->name }}"
				name="name">
			</div>			
		</div>
		<div class="panel-footer text-right">
			<a href="/admin/department" class="btn btn-default">Cancel</a>
			<button class="btn btn-success">Submit</button>
			</form>
		</div>
	</div>
</div>

@endsection