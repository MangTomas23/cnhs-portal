@extends('master')

@section('content')

<h2>Input Grades</h2>

<div class="col-sm-8 col-sm-offset-2">
	<form action="">
		<div class="form-group">
			<label for="section">Section</label>
			<select name="section" class="form-control">
				@if(count($sections))
					@foreach($sections as $section)
						<option value="{{$section->section->id}}">{{$section->section->name}}</option>
					@endforeach
				@else
					<option>No sections</option>
				@endif
			</select>
		</div>		
	</form>
</div>

@endsection