@extends('master')

@section('content')

<div class="row col-sm-10 col-sm-offset-1">
	<div class="panel panel-success" style="margin-top: 28px;">
		<div class="panel-heading">Subject Registration</div>
		<div class="panel-body">
			<form action="/admin/subject" method="post">
				{!! csrf_field() !!}
				
				<div class="row">
					<div class="form-group col-sm-8">
						<label for="subject_code">Subject Code</label>
						<input type="text" class="form-control" 
						value="{{ old('subject_code') }}">
					</div>

					<div class="form-group col-sm-4">
						<label for="year_level">Year Level</label>
						<select name="year_level" class="form-control">
							<option value="1">1st Year</option>
							<option value="2">2nd Year</option>
							<option value="3">3rd Year</option>
							<option value="4">4th Year</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" class="form-control" 
					value="{{ old('description') }}">
				</div>

		</div>
		<div class="panel-footer">
			<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>
	
@endsection