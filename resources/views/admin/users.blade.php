@extends('master')

@section('content')

<table class="table table-default">
	<thead>
		<th>Username</th>
		<th>Name</th>
		<th>Address</th>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{ $user->username }}</td>
				<td>{{ join(' ', [$user->firstname, $user->middlename, $user->lastname]) }}</td>
				<td>{{ $user->address }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection