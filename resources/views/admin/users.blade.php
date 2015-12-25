@extends('master')

@section('content')

<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">Students</a></li>
  <li role="presentation"><a href="#">Teachers</a></li>
  <li role="presentation"><a href="#">Program Head</a></li>
</ul>

<table class="table table-default">
	<thead>
		<th>Username</th>
		<th>Name</th>
		<th>Address</th>
		<th>Subjects</th>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</td>
				<td>{{ $user->address }}</td>
				<td>
					MAPEH, ENGL02
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection