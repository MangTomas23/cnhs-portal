@extends('master')

@section('content')

<h2>Register</h2>

<div class="panel panel-default col-sm-8">
	<div class="panel-body">
		<form action="/admin/create" method="post">
			<h3>Account</h3>
			<hr>
			<div class="row">
				<div class="form-group col-md-8">
					<label for="username">Username/Student ID</label>
					<input name="username" type="text" class="form-control" 
					placeholder="Username" value="{{ old('username') }}">
				</div>

				<div class="form-group col-md-4">
					<label for="type">Type</label>
					<select name="type" id="" class="form-control" value="{{ old('type') }}">
						<option value="student">Student</option>		
						<option value="teacher">Teacher</option>		
						<option value="programhead">Program Head</option>		
					</select>
				</div>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" 
				placeholder="Enter Password">
			</div>

			<div class="form-group">
				<label for="password_confirmation">Confirm Password</label>
				<input type="password" name="password_confirmation" class="form-control"
				placeholder="Re-enter Password">
			</div>


			<h3>Basic Information</h3>
			<hr>
			
			<div class="row">
				<div class="form-group col-sm-4">
					<label for="firstname">Firstname</label>
					<input type="text" name="firstname" class="form-control">
				</div>

				<div class="form-group col-sm-4">
					<label for="firstname">Middlename</label>
					<input type="text" name="firstname" class="form-control">
				</div>

				<div class="form-group col-sm-4">
					<label for="firstname">Lastname</label>
					<input type="text" name="firstname" class="form-control">
				</div>
			</div>

			<div class="row">
				<div class="form-group col-sm-8">
					<label for="section">Section</label>
					<input type="text" name="section" class="form-control">
				</div>

				<div class="form-group col-sm-4">
					<label for="yearlevel">Year Level</label>
					<select name="yearlevel" id="" class="form-control">
						<option value="1">1st Year</option>
						<option value="2">2nd Year</option>
						<option value="3">3rd Year</option>
						<option value="4">4th Year</option>
					</select>
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

				<div class="form-group col-sm-6">
					<label for="birthdate">Birthdate</label>
					<input name="birthdate" type="date" class="form-control">
				</div>
			</div>

			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" name="address" class="form-control">
			</div>

			<div class="form-group">
				<label for="contact">Contact</label>
				<input type="text" name="contact" class="form-control">
			</div>

			<button class="btn btn-success">Submit</button>
		</form>
	</div>
</div>

	
@endsection