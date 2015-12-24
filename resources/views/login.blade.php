@extends('master')

@section('content')

<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
	<div class="panel panel-info" >
    <div class="panel-heading">
      <div class="panel-title">Sign In</div>
    </div>     

	  <div style="padding-top:30px" class="panel-body" >
	    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
      <form id="loginform" class="form-horizontal" role="form" method="POST" action="/login">
				{!! csrf_field() !!}
        <div style="margin-bottom: 25px" class="input-group">
					<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
        </div>
            
        <div style="margin-bottom: 25px" class="input-group">
        	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
        </div>
				
				<div style="margin-top:10px" class="form-group">
					<div class="col-sm-12 controls">
          	<button action="submit" id="btn-login" class="btn btn-success">Login</button>
        	</div>
        </div>
				</form>   

      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
        			<li>{{ $error }}</li>
            @endforeach
					</ul>
        </div> 
      @endif
		</div>    
	</div>
</div>

@endsection