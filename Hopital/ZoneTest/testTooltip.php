<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Creating Custom Template for Bootstrap 4 Tooltips</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






</head>
<body>


<!-- <section class="text-center">
<div class="container">
<div class="row" >
<div class="col-md-6 col-lg-3 ftco-animate">
<div class="block-2">
<div class="front" style="background-image: url('../../Design/images/doctor-1.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Neurologue</p>
	                </div>
	              </div>              
</div>
</div>
<div class="col-sm-2" class="mycard">
            <div class="card-deck">
                <div class="card"  style="width: 5rem;">
                    <img class="card-img-top" src="../Design/images/doctor-1.jpg" alt="Card image cap">
                    <div class="card-header bg-primary text-light">  <h3 class="card-title">Cardiologue</h5></div>
                    <div class="card-body">
                        <h3 class="card-title">JARVES Paul</h5>
                    </div>
                </div>
            </div>
</div>
<div class="col-sm-2" class="mycard">
            <div class="card-deck">
                <div class="card"  style="width: 5rem;">
                    <img class="card-img-top" src="../Design/images/doctor-1.jpg" alt="Card image cap">
                    <div class="card-header bg-primary text-light">  <h3 class="card-title">Cardiologue</h5></div>
                    <div class="card-body">
                        <h3 class="card-title">JARVES Paul</h5>
                    </div>
                </div>
            </div>
</div>
</div>
</div>
</div> -->



<section class="ftco-section">
    	<div class="container">
        <div class="row">


				



        	<div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../Design/images/doctor-1.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Neurologue</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-1.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Neurologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-2.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pediatrician</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-2.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pediatrician</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-3.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Ophthalmologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-3.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Ophthalmologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-4.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pulmonologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-4.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pulmonologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>

	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-1.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Neurologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-1.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Neurologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-2.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pediatrician</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-2.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pediatrician</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-3.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Ophthalmologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-3.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Ophthalmologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
	        <div class="col-md-6 col-lg-3 ftco-animate">
	          <div class="block-2">
	            <div class="flipper">
	              <div class="front" style="background-image: url('../../Design/images/doctor-4.jpg');">
	                <div class="box">
	                  <h2>Aldin Powell</h2>
	                  <p>Pulmonologist</p>
	                </div>
	              </div>
	              <div class="back">
	                <!-- back content -->
	                <blockquote>
	                  <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem&rdquo;</p>
	                </blockquote>
	                <div class="author d-flex">
	                  <div class="image mr-3 align-self-center">
	                    <div class="img" style="background-image: url('../../Design/images/doctor-4.jpg');"></div>
	                  </div>
	                  <div class="name align-self-center">Aldin Powell <span class="position">Pulmonologist</span></div>
	                </div>
	              </div>
	            </div>
	          </div> <!-- .flip-container -->
	        </div>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>


</body>   
</html>