@extends('master')

@section('content')

<h2>Departments</h2>

<table class="table table-default">
	<thead>
		<th>#</th>
		<th>Department</th>
	</thead>
	<tbody>
		
	</tbody>
</table>

<div class="panel panel-primary" style="margin-top: 80px">
	<div class="panel-heading">Add</div>
	<div class="panel-body">
		<form action="" method="POST">
			<div class="form-group">
				<label for="name">Department Name</label>
				<input name="name" type="text" class="form-control" 
				placeholder="e.g. English">
			</div>

			<div class="form-group">
				<label for="program_head">Program Head</label>
				<select name="program_head" class="form-control">
					
				</select>
			</div>
	</div>
	<div class="panel-footer text-right">
		<button class="btn btn-success">Add</button>
		</form>
	</div>
</div>
@endsection