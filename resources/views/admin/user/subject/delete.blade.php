@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel panel-danger">
		<div class="panel-heading">Remove Subject</div>
		<div class="panel-body">
			<p>Are you sure you want to remove {{ $subject->subject->subject_code }}?</p>
		</div>
		<div class="panel-footer text-right">
			<a href="/admin/user/{{$id}}" class="btn btn-default">No</a>
			<form action="/admin/user/{{$id}}/subject" method="POST"
			style="display:inline">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="DELETE">
				<input type="hidden" name="s_id" value="{{ $subject->id }}">
				<button class="btn btn-danger">Yes</button>				
			</form>
		</div>
	</div>
</div>

@endsection