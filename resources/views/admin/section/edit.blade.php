@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top: 28px">
	<div class="panel panel-info">
		<div class="panel-heading">Edit</div>
		<div class="panel-body">
			<form action="/admin/section/{{ $section->id }}" method="POST">
			{!! csrf_field() !!}
			<input type="hidden" name="_method" value="PUT">
			<div class="form-group {{ $errors->has('name') ? 'has-error':''}}">
				<label for="name">Section</label>
				<input type="text" name="name" class="form-control"
				value="{{ $section->name }}">
				@if($errors->has('name'))
					<span class="help-block">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
		</div>
		<div class="panel-footer text-right">
			<button class="btn btn-success">Update</button>
			</form>
		</div>
	</div>
</div>

@endsection