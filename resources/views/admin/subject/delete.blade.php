@extends('master')

@section('content')

<div class="row col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel panel-danger">
		<div class="panel-heading">Delete</div>
		<div class="panel-body">
			<p>Are you sure you want to delete {{ $subject->subject_code }}?</p>
		</div>
		<div class="panel-footer" style="text-align:right">
			<a href="/admin/subject/register" class="btn btn-default">No</a>
			<form action="/admin/subject/{{ $subject->id }}" method="POST"
			style="display:inline">
				{!! csrf_field() !!}

				<input type="hidden" name="_method" value="DELETE">

				<button class="btn btn-danger">Yes</button>
			</form>
		</div>
	</div>
</div>

@endsection