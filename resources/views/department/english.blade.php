@extends('master')

@section('content')

@include('department.menu')

@if(Auth::guest())
	'nakaguset'
@else
	'dai guest'
@endif

					<p>
						
						<h2> English Department </h2><br><br>

						<b>PABLO A. VALENCIA</b>
					<pre>Position: HEAD TEACHER II 
	Degree: BSE, DLSE </pre>
					<br> <br>
					<b>BELINDA T. NELLASCA</b>
					<pre>Position: MASTER TEACHER I
	Degree:  AB, BSE, MAED</pre>
					<br> <br>
					<b>MARITA T. RODRIGUEZ</b>
					<pre>Position: TEACHER III
	Degree:  BSE, MAED</pre>
					<br> <br>
					<b>MARLYN S BUENAVENTE</b>
					<pre>Position: TEACHER I
	Degree:  AB, BSE, MAED</pre>
					<br> <br>
					<b>AIZA E. BAGUIO</b>
					<pre>Position: TEACHER I
	Degree:  BSED, LANGUAGE TEACHING</pre>
					<br> <br>
					<b>ERIK JAN P. SANTOS</b>
					<pre>Position: TEACHER II
	Degree:  BSED</pre>
					<br> <br>
					<b>MARIFE M. MENDOZA</b>
					<pre>Position: TEACHER I
	Degree:  BSED, MAED</pre>
					<br> <br>
					<b>DAN ALBERT L. CARINO</b>
					<pre>Position: TEACHER I
	Degree:  AB, BSED</pre>
					<br> <br>
					<b>MARLENE M. RAMOS</b>
					<pre>Position: TEACHER I
	Degree:  AB BSEENGLISH, MAED</pre>
					<br> <br>
					<b>ROGELIO G. FALCON</b>
					<pre>Position: TEACHER I
	Degree:  BSED</pre>
					<br> <br>
					<b>MIRAFE C. ABAD</b>
					<pre>Position: TEACHER II
	Degree:  BSED</pre>
					<br> <br>
					<b>MARY ROSE DURAN</b>
					<pre>Position: TEACHER I
	Degree:  BSED</pre>
					<br> <br>
					<b>REZALY R. CEDRON</b>
					<pre>Position: TEACHER I
	Degree:  BSED</pre>
			</p>




@endsection