@extends('master')

@section('content')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol>

	<div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/carousel/1.png" width="1366px" height="auto">
    </div>

    <div class="item">
      <img src="img/carousel/2.png" width="1366px" height="auto">
    </div>

    <div class="item">
      <img src="img/carousel/3.png" width="1366px" height="auto">
    </div>

    <div class="item">
      <img src="img/carousel/4.png" width="1366px" height="auto">
    </div>

    <div class="item">
      <img src="img/carousel/5.png" width="1366px" height="auto">
    </div>
	</div>

			  <!-- Left and right controls -->
  <a class="left carousel-control" href="#my" role="button" data-slide="prev" onclick="$('#myCarousel').carousel('prev')">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#my" role="button" data-slide="next" onclick="$('#myCarousel').carousel('next')">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="row" style="padding: 48px 0;">
	<div class= "col-sm-4" style="text-align: center">
		<img src="img/welcometeacher.png" style="width: 250px;margin-top: 35px;">
	</div>
	<div class= "col-sm-8" style="color:#000041;">
			<h2>Welcome</h2>
			<p>The Calabanga National High school is committed to the pursuit of excellence in Secondary Education.
			The school is open to all elementary school graduates regardless of their academic achievements and socio-economic status because it believes that everyone deserves a chance to pursue or finish secondary education and to prove their worth as good students and useful citizens.
			The school offers the ALS (Alternative Learning School) for the out of school youth and drop-outs, incumbent students who are 15 years old and above who prefer to take this course, and to the working students to provide them equal opportunity for the education.
			In addition, CNHS offers evening classes for the working students, a complete five-year level curriculum has been existing to assist the said students and parents as well.
			It also believes that noble task of educating the youth is not only the responsibility of the school but also of the stakeholders such as the parents, local government and non-government organizations.</p>
	</div>
</div>

<div class="row" style="background: #EEE; padding: 48px 0;">
	<div class="col-sm-2" style="color:#000041; text-align: center">
		<img src="img/missionpicture.jpg" style="width:180px">
	</div>

	<div class="col-sm-4"  style="color:#000041; padding-left:50px;padding-right:50px;" >
		  <p>Onto protect the right of every filipino to quality, 
		  equitable culture-based; and complete basic education where: </p>
			
			<p>Student learn in a child friendly, gender-sensitive,safe and 
				motivating environment</p>
			
			<p>Teachers facilitate learning and constantly nurture every learner</p>

			<p>Administrator and staff, as stewards of the institution, ensure 
			environment for effective learning to happen</p>
	</div>

	<div class="col-sm-2" style="color:#000041; text-align:center">
		<img src="img/visionpicture.jpg" width="180px">
	</div>

	<div class="col-sm-4" style="color:#000041; padding-left:50px;padding-right:50px;">
		<p>
			We dream of filipinos
			Who passionately love their country
			And those values and competencies
			Enable them to realize their full potential
			And contribute meaningfully to building the nation
		</p>
		<p>
			As a learner-centered public institution,
			The department of education
			Continously improved itself
			To better serve it stake holders
		</p>
	</div>
</div>

@endsection