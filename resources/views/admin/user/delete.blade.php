@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top: 28px">
	<div class="panel panel-danger">
		<div class="panel-heading">Delete</div>
		<div class="panel-body">
			<p>Are you you want to delete {{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}?</p>
		</div>
		<div class="panel-footer text-right">
			<a class="btn btn-default" href="/admin/user/{{ $user->id }}">No</a>
			<form action="/admin/user" method="POST" style="display:inline">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="id" value="{{ $user->id }}">

				<button class="btn btn-danger">Yes</button>

			</form>
		</div>
	</div>
</div>

@endsection