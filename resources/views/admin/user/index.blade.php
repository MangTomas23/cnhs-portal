@extends('master')

@section('content')

<form action="/admin/user/search" class="form-inline text-right" 
method="GET" style="margin-top: 28px"> 
	<div class="form-group">
		<input name="query" type="text" class="form-control" placeholder="Search">
	</div>
	<button class="btn btn-default" title="Search">
	<span class="glyphicon glyphicon-search"></span></button>
</form>

@if($type != 'search')
	<ul class="nav nav-tabs">
	  <li class="{{ $type=='student' ? 'active':'' }}">
	  	<a href="/admin/user">Students</a></li>
	  <li class="{{ $type=='teacher' ? 'active':'' }}">
	  	<a href="/admin/user?type=teacher">Teachers</a></li>
	  <li class="{{ $type=='programhead' ? 'active':'' }}">
	  	<a href="/admin/user?type=programhead">Program Head</a></li>
	</ul>
@else
	<h3>Search result</h3>
@endif

<table class="table table-default" style="min-height: 200px">
	<thead>
		<th>Username</th>
		<th>Name</th>
		<th>Address</th>
		@if($type!='search')
			@if($type=='student')
				<th>Subjects</th>
			@else
				<th>Department</th>
				<th>Position</th>
			@endif
		@endif
		<th>Password</th>
	</thead>
	<tbody>
		@if($type == 'search' && !count($users))
			<tr>
				<td colspan="4">No result found</td>
			</tr>
		@else
			@foreach($users as $user)
				<tr>
					<td><a href="/admin/user/{{ $user->id }}">{{ $user->username }}</a></td>
					<td>{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</td>
					<td>{{ $user->address }}</td>
					@if($type!='search')
						@if($type=='student')
							<td>
								@if(count($user->studentSubjects))
									<?php
										$subs = array();
										foreach($user->studentSubjects as $sub){
										 array_push($subs, $sub->subject->subject_code);
										}
									?>

									{{ join(', ', $subs) }}
								@else
									No subjects
								@endif
							</td>
						@else
							@if(count($user->department))
								<td>{{$user->department->name}}</td>
							@endif
							<td>{{$user->position}}</td>
						@endif
					@endif
					<td>{{count($user->tpassword) ? $user->tpassword->password:''}}</td>
				</tr>
			@endforeach
		@endif
	</tbody>
</table>

@if($type=='search')
	<div class="row text-center">
		<a href="/admin/user" class="btn btn-default">Back</a>
	</div>
@endif
@endsection