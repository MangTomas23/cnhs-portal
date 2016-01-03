@extends('master')

@section('content')

<div style="padding: 28px">
	
</div>
<a href="/developer/run-seed" class="btn btn-primary">Run Seeder</a>
<a href="/developer/run-migrate" class="btn btn-primary">Run Migrate</a>
<a href="/developer/run-rollback" class="btn btn-primary">Run Rollback</a>
<br>
<br>
<a href="/developer/table/?table=subjects" class="btn btn-success">View Tables</a>
<span class="clearfix"></span>
<div class="row col-md-6" style="margin: 28px 0px">
	<h2>Seed Database</h2>
	<form action="/developer/seed" method="POST" enctype="multipart/form-data">
		{!! csrf_field() !!}

		<div class="form-group">
			<label for="table_name">Table Name</label>
			<input type="text" name="table_name" class="form-control">
		</div>

		<div class="form-group">
			<label for="json">JSON File</label>
			<input type="file" class="form-control" name="json">
		</div>

		<button class="btn btn-primary">Submit</button>
	</form>
</div>

@endsection