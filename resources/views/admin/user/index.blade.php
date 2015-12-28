@extends('master')

@section('content')

<ul class="nav nav-tabs">
  <li class="{{ $type=='student' ? 'active':'' }}">
  	<a href="/admin/user">Students</a></li>
  <li class="{{ $type=='teacher' ? 'active':'' }}">
  	<a href="/admin/user?type=teacher">Teachers</a></li>
  <li class="{{ $type=='program_head' ? 'active':'' }}">
  	<a href="/admin/user?type=program_head">Program Head</a></li>
</ul>

<table class="table table-default">
	<thead>
		<th>Username</th>
		<th>Name</th>
		<th>Address</th>
		@if($type=='student')
			<th>Subjects</th>
		@else
			<th>Position</th>
		@endif
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td><a href="/admin/user/{{ $user->id }}">{{ $user->username }}</a></td>
				<td>{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</td>
				<td>{{ $user->address }}</td>
				@if($type=='student')
					<td>
						@if(count($user->subjects))
							<?php
								$subs = array();
								foreach($user->subjects as $sub){
								 array_push($subs, $sub->subject->subject_code);
								}
							?>

							{{ join(', ', $subs) }}
						@else
							No subjects
						@endif
					</td>
				@else
					<td>{{$user->position}}</td>
				@endif
			</tr>
		@endforeach
	</tbody>
</table>

@endsection