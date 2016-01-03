@extends('master')

@section('content')


<div class="panel panel-default col-sm-8 col-sm-offset-2" style="margin-top:28px">
	<div class="panel-body">
		@if(session('status'))
			<div class="alert alert-success">
				<p>{{session('status')}}</p>	
			</div>
		@endif

		<form action="/admin/create" method="post">
			{!! csrf_field() !!}
			<h3>Create Account</h3>
			<hr>
			<div class="row">
				<div class="form-group col-md-8 {{ $errors->has('username') ? 'has-error':'' }}">
					<label for="username">Username/Student ID</label>
					<input name="username" type="text" class="form-control" 
					placeholder="Username" value="{{ old('username') }}">
					@if ($errors->has('username'))
              <span class="help-block">
                  <strong>{{ $errors->first('username') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group col-md-4">
					<label for="type">Type</label>
					<select id="acType" name="type" id="" class="form-control">
						<option value="student">Student</option>		
						<option value="teacher">Teacher</option>		
						<option value="programhead">Program Head</option>		
					</select>
				</div>
			</div>

			<div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" 
				placeholder="Enter Password">
				@if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
			</div>

			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" class="form-control"
				placeholder="Re-enter Password">
			</div>


			<h3>Basic Information</h3>
			<hr>
			
			<div class="row">
				<div class="form-group col-sm-4 {{ $errors->has('firstname') ? 'has-error':'' }}">
					<label for="firstname">Firstname</label>
					<input type="text" name="firstname" class="form-control"
					value="{{ old('firstname') }}">
					@if ($errors->has('firstname'))
              <span class="help-block">
                  <strong>{{ $errors->first('firstname') }}</strong>
              </span>
          @endif
				</div>

				<div class="form-group col-sm-4">
					<label for="middlename">Middlename</label>
					<input type="text" name="middlename" class="form-control"
					value="{{ old('middlename') }}">
				</div>

				<div class="form-group col-sm-4 {{ $errors->has('lastname') ? 'has-error':'' }}">
					<label for="lastname">Lastname</label>
					<input type="text" name="lastname" class="form-control"
					value="{{ old('lastname') }}">
					@if ($errors->has('lastname'))
              <span class="help-block">
                  <strong>{{ $errors->first('lastname') }}</strong>
              </span>
          @endif
				</div>
			</div>

			<div id="sYl" class="row">
				<div class="form-group col-sm-8">
					<label for="section">Section</label>
					{!!  
						Form::select('section', $sections, old('section'), 
						['class' => 'form-control'])
					!!}
				</div>

				<div class="form-group col-sm-4">
					<label for="yearlevel">Grade Level</label>
					<select name="yearlevel" id="" class="form-control">
						<option value="7">Grade 7</option>
						<option value="8">Grade 8</option>
						<option value="9">Grade 9</option>
						<option value="10">Grade 10</option>
					</select>
				</div>
			</div>
			<div  id="pos" class="row">
				<div class="form-group col-sm-6">
					<label for="position">Position</label>
					<input name="position" type="text" class="form-control">
				</div>

				<div class="form-group col-sm-6">
					<label for="department">Department</label>					
					{!! 
						Form::select('department', $departments, old('department'),[
							'class'=>'form-control'
						] ); 
					!!}
				</div>
				
			</div>	

			<div class="row">
				<div class="form-group col-sm-6">
					<label for="gender">Gender</label>
					<select name="gender" class="form-control">
						<option value="m">Male</option>
						<option value="f">Female</option>
					</select>
				</div>

				<div class="form-group col-sm-6" >
					<label for="birthdate">Birthdate</label>
					<input name="birthdate" type="date" class="form-control"
					value="{{ old('birthdate') }}">
				</div>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" class="form-control"
				value="{{ old('address') }}">
			</div>

			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" name="contact" class="form-control"
				value="{{ old('contact') }}">
			</div>

			<button class="btn btn-success">Submit</button>
		</form>
	</div>
</div>



@endsection