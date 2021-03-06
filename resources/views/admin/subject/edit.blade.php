@extends('master')

@section('content')

<div class="row col-sm-10 col-sm-offset-1">
	<div class="panel panel-success" style="margin-top: 28px;">
		<div class="panel-heading">Edit Subject</div>
		<div class="panel-body">
			<form action="/admin/subject/{{ $subject->id }}" method="POST">
				{!! csrf_field() !!}
				<input type="hidden" name="_method" value="PUT">
				
				@if(session('status'))
					<div class="alert alert-info">
						<p>{{ session('status') }}</p>
					</div>
				@endif
								
				<div class="row">
					<div class="form-group col-sm-8 {{ $errors->has('subject_code') ? 
					'has-error':'' }}">
						<label for="subject_code">Subject Code</label>
						<input type="text" class="form-control" name="subject_code" 
						value="{{ $subject->subject_code }}">
						@if($errors->has('subject_code'))
							<span class="help-block">
								<strong>{{ $errors->first('subject_code') }}</strong>
							</span>
						@endif
					</div>

					<div class="form-group col-sm-4">
						<label for="year_level">Grade Level</label>
						{!! Form::select('year_level',[
							7 => 'Grade 7',
							8 => 'Grade 9',
							9 => 'Grade 9',
							10 => 'Grade 10',
						],$subject->year_level, ['class' => 'form-control']) !!}
					</div>
				</div>

				<div class="form-group {{ $errors->has('description') ? 
				'has-error':''}}">
					<label for="description">Description</label>
					<input type="text" name="description" class="form-control" 
					value="{{ $subject->description }}">

					@if($errors->has('description'))
						<span class="help-block">
							<strong>{{ $errors->first('description') }}</strong>
						</span>
					@endif
				</div>

				<div class="form-group">
					<label for="department">Department</label>
					{!! Form::select('department', $departments, $subject->department_id,[
						'class' => 'form-control'
					]) !!}
				</div>

		</div>
		<div class="panel-footer">
			<button class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>


@endsection