@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel panel-danger">
		<div class="panel-heading">Delete</div>
		<div class="panel-body">
			<p>Are you sure you want to delete these grades?</p>
		</div>
		<div class="panel-footer text-right">
			<a class="btn btn-default" href="/programhead/approve">No</a>
			<form action="/programhead/delete" method="POST"
			style="display:inline">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="grades" value="{{ json_encode($grades) }}">

				<button class="btn btn-danger">Yes</button>
			</form>
		</div>
	</div>
</div>

@endsection