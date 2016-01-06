@extends('master')

@section('content')

<ul class="nav nav-tabs">
  <li class="{{ $type=='student' ? 'active':'' }}">
  	<a href="/admin/user">Students</a></li>
  <li class="{{ $type=='teacher' ? 'active':'' }}">
  	<a href="/admin/user?type=teacher">Teachers</a></li>
  <li class="{{ $type=='programhead' ? 'active':'' }}">
  	<a href="/admin/user?type=programhead">Program Head</a></li>
</ul>

<table class="table table-default">
	<thead>
		<th>Username</th>
		<th>Name</th>
		<th>Address</th>
		@if($type=='student')
			<th>Subjects</th>
		@else
			<th>Department</th>
			<th>Position</th>
		@endif
		<th>Password</th>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td><a href="/admin/user/{{ $user->id }}">{{ $user->username }}</a></td>
				<td>{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</td>
				<td>{{ $user->address }}</td>
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
				<td>{{count($user->tpassword) ? $user->tpassword->password:''}}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection