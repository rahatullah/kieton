<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Helpmiii - Feel the help...</title>
      <link rel="icon" type="image/png" href="images/helpmiiilogo.png">
      <!-- Bootstrap Core CSS -->
      <link href="boot/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Theme CSS -->
      <link href="boot/css/freelancer.min.css" rel="stylesheet">
      <!-- Custom Fonts -->
      <link href="boot/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body id="page-top" class="index">
      <!-- Navigation -->
      <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
         <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
               <img class="logo" src="images/helpmiiilogo.png" alt="Helpmiii Logo" align="left">
               <a class="navbar-brand" href="#page-top"> Helpmiii </a>
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
               </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav navbar-right">
                  <li class="hidden">
                     <a href="#page-top"></a>
                  </li>
                  <li class="page-scroll">
                     <a href="#login_signup">Login & Signup</a>
                  </li>
                  <li class="page-scroll">
                     <a href="#services">Services</a>
                  </li>
                  <li class="page-scroll">
                     <a href="#about">About</a>
                  </li>
                  <li class="page-scroll">
                     <a href="#team">Team</a>
                  </li>
                  <li class="page-scroll">
                     <a href="#contact">Contact</a>
                  </li>
               </ul>
            </div>
            <!-- /.navbar-collapse -->
         </div>
         <!-- /.container-fluid -->
      </nav>
      <!-- Header -->
      <header style="background-image:url(boot/img/background.jpg); background-repeat:no-repeat; background-position:center; background-attachment:fixed;">
         <div class="container">
            <div id="login_signup" class="row">
               <div class="col-lg-12 text-center">
                  <h3>Welcome to the world of help</h3>
                  <br>
                  <?php
                     require_once('connectvars.php');
                     
                     session_start();
                     
                     $error_msg = "";
                     
                     
                     
                     
                     if (empty($_SESSION['hm_id'])) {
						 if(!empty($error_msg)){
						 echo '<div class="alert alert-danger" align="center"><strong>' . $error_msg . '</strong></div>';
						  $error_msg = "";
						 }
					 }
                     elseif(isset($_SESSION['hm_id'])) {
                     echo('<p class="login" align= "center"><br><br>You are logged in as <strong> ' . $_SESSION['id_proof'] . '</strong>.<br>Go to your home page: <a href="hm_index.php" style="cursor:pointer">Home</a><br><br>You can also logout here: <a href="logout.php" style="cursor:pointer">LogOut</a></p>');
                     }
					 
					 
					 //for signup
					 require_once('appvars.php');
                      
                      $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                      
                      if(isset($_POST['signup'])){
                     	$_SESSION['first_name'] = $first_name = mysqli_real_escape_string($dbc,trim($_POST['firstname']));
                     	$_SESSION['last_name'] = $last_name = mysqli_real_escape_string($dbc,trim($_POST['lastname']));
                     	$_SESSION['id_proof'] = $id_proof = mysqli_real_escape_string($dbc,trim($_POST['idproof']));
                     	$_SESSION['password'] = $password1 = mysqli_real_escape_string($dbc,trim($_POST['password1']));
                     	$password2 = mysqli_real_escape_string($dbc,trim($_POST['password2']));
                     	
                     	
                     	if(!empty($first_name) && !empty($last_name) && !empty($id_proof) && !empty($password1) && !empty($password2)){
                     		if($password1 == $password2){
                     			$query = "SELECT * FROM hm_profile WHERE id_proof = '$id_proof'";
                     			
                     			$data = mysqli_query($dbc, $query);
                     						   
                     			
                     			if(mysqli_num_rows($data) == 0){
                     								  
                     				$query = "INSERT INTO hm_profile(hm_id, first_name, last_name, id_proof, password, date_of_join) VALUES" .
                     						 "( 0, '$first_name', '$last_name', '$id_proof', SHA('$password1'), NOW())";
                     				mysqli_query($dbc, $query);
                     	
                     				$home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/hm_profile.php';
                     				   header('Location: ' . $home_url);
                     				   mysqli_close($dbc);
                     				   exit();
                     			}
                     				else{
                     				echo'<div class="alert alert-danger" align="center"><strong>An <b>account already exits</b> for this E-mail address. Please use a different address.</strong></div>';
                     				$id_proof="";
                     				}
                     				   if(mysqli_num_rows($data) == 1){
                     							$row = mysqli_fetch_array($data);
                     						   	$_SESSION['signup_hm_id'] = $row['hm_id'];
                     							setcookie('pro_id', $row['hm_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                     							setcookie('id_proof', $row['id_proof'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                     							setcookie('pro_firstname', $row['first_name'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                     							setcookie('pro_lastname', $row['last_name'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                     							setcookie('pro_password', $row['password'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                     				   }
                     		}
                     		else{
                     			echo'<div class="alert alert-danger" align="center">You must enter the <b>same password</b> twice.</div>';
                     		}
                     	}
                     	else{
                     		echo'<div class="alert alert-danger" align="center">You must enter <b>all</b> of the signup data.</div>';
                     	}
                      }
                      mysqli_close($dbc);
                     
					 //for login
					 if (!isset($_SESSION['hm_id'])) {
                     if (isset($_POST['login'])) {
                     
                      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
                     
                     
                      $user_id_proof = mysqli_real_escape_string($dbc, trim($_POST['idproof']));
                      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
                     
                      if (!empty($user_id_proof) && !empty($user_password)) {
                     $query = "SELECT hm_id, id_proof FROM hm_profile WHERE id_proof = '$user_id_proof' AND password = SHA('$user_password')";
                     $data = mysqli_query($dbc, $query);
                     
                     if (mysqli_num_rows($data) == 1) {
                       $row = mysqli_fetch_array($data);
                       $_SESSION['hm_id'] = $row['hm_id'];
                       $_SESSION['id_proof'] = $row['id_proof'];
                       setcookie('id', $row['hm_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
                       setcookie('id_proof', $row['id_proof'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
                       $home_url = 'http://' . $_SERVER['HTTP_HOST'] . '/hm_index.php';
                       header('Location: ' . $home_url);
                       mysqli_close($dbc);
                       exit();
                       }
                     else {
                       // The username/password are incorrect so set an error message
                       $error_msg = ' "Sorry, you must enter a valid username and password to log in." ';
                     }
                      }
                      else {
                     // The username/password weren't entered so set an error message
                     $error_msg = ' "Sorry, you must enter your username and password to log in." ';
                      }
                      
                     }
                     }
					 
					 if (empty($_SESSION['hm_id'])) {
					  	if(!empty($error_msg)){
							echo '<div class="alert alert-danger" align="center"><strong>' . $error_msg . '</strong></div>';
							 $error_msg = "";
						 }
                     ?>
                  <div class="col-lg-6">
                     <div class="row">
                        <div class="col-lg-10 text-center">
                           <h2>Login</h2>
                           <br><br>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-10">
							<form action="wel.php" name="login_form" method="post">
                              <div class="row control-group">
                                 <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" name="idproof" value="<?php if (!empty($user_username)) echo $user_username; ?>" maxlength="40" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address." title="Your Email Address" autofocus required="required" />
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="row control-group">
                                 <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" maxlength="16" placeholder="Password" id="password" required data-validation-required-message="Please enter your password." minlength="8" maxlength="15" title="It should be of 8 to 15  characters" required="required" />
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <br><br>
                              <div id="success"></div>
                              <div class="row">
                                 <div class="form-group col-xs-12">
                                    <button name="login" type="submit" class="btn btn-success btn-lg" title="Click me, to login into your home page">Go !</button>
                                 </div>
                              </div>
                           </form>
                           <br>
                           <br>
                           <br>
                           <br>
                        </div>
                     </div>
                  </div>
				  <?php
					  }
					  elseif(isset($_SESSION['hm_id'])) {
						echo('<p class="login" align= "center"><br><br>You are logged in as <strong> ' . $_SESSION['id_proof'] . '</strong>.<br>Go to your home page: <a href="hm_index.php" style="cursor:pointer">Home</a><br><br>You can also logout here: <a href="logout.php" style="cursor:pointer">LogOut</a></p>');
					  }
					  
					  if(!isset($_SESSION['signup_hm_id'])) {
					?>
                  
                  <div class="col-lg-6">
                     <div class="row">
                        <div class="col-lg-10 text-center">
                           <h2>Signup</h2>
                           <br><br>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-10">
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" name="signup_form" method="post">
                              <div class="row control-group">
                                 <div class="form-group col-xs-6 floating-label-form-group controls">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="firstname" name='firstname' maxlength="20" placeholder="First Name" title="Enter your first name, like :- 'Rahatullah'"  required data-validation-required-message="Please enter your firstname." required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                                 <div class="form-group col-xs-6 floating-label-form-group controls">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name='lastname' maxlength="20" placeholder="Last Name" title="Enter your last name, like :- 'Ansari'" required data-validation-required-message="Please enter your lastname." required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="row control-group">
                                 <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control" id="idproof" name='idproof' size="20" maxlength="40" placeholder="Email Address" title="Like :- 'abcd@efgh.ijk'" required data-validation-required-message="Please enter your email address."  required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <div class="row control-group">
                                 <div class="form-group col-xs-6 floating-label-form-group controls">
                                    <label>Password</label>
                                    <input type="password" class="form-control" id="password1" name='password1' minlength="8" maxlength="15" placeholder="Password" required data-validation-required-message="Please enter your password." required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                                 <div class="form-group col-xs-6 floating-label-form-group controls">
                                    <label>Conform Password</label>
                                    <input type="password" class="form-control" name='password2' minlength="8" maxlength="15" placeholder="Conform Password" required data-validation-required-message="Please enter your password." required/>
                                    <p class="help-block text-danger"></p>
                                 </div>
                              </div>
                              <br><br>
                              <div id="success"></div>
                              <div class="row">
                                 <div class="form-group col-xs-12">
                                    <button name="signup" type="submit" class="btn btn-success btn-lg">Get in !</button>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <?php
				  }
				  ?>
               </div>
            </div>
         </div>
      </header>
      <!-- Services Section -->
      <section id="services"  class="bg-light-gray">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading">Services</h2>
                  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
               </div>
            </div>
            <div class="row text-center">
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">E-Commerce</h4>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
               </div>
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Responsive Design</h4>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
               </div>
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Web Security</h4>
                  <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
               </div>
            </div>
         </div>
      </section>
      <!-- About Section -->
      <section id="about">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading">About</h2>
                  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <ul class="timeline">
                     <li>
                        <div class="timeline-image">
                           <img class="img-circle img-responsive" src="boot/img/about/1.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                           <div class="timeline-heading">
                              <h4>2009-2011</h4>
                              <h4 class="subheading">Our Humble Beginnings</h4>
                           </div>
                           <div class="timeline-body">
                              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                           </div>
                        </div>
                     </li>
                     <li class="timeline-inverted">
                        <div class="timeline-image">
                           <img class="img-circle img-responsive" src="boot/img/about/2.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                           <div class="timeline-heading">
                              <h4>March 2011</h4>
                              <h4 class="subheading">An Agency is Born</h4>
                           </div>
                           <div class="timeline-body">
                              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="timeline-image">
                           <img class="img-circle img-responsive" src="boot/img/about/3.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                           <div class="timeline-heading">
                              <h4>December 2012</h4>
                              <h4 class="subheading">Transition to Full Service</h4>
                           </div>
                           <div class="timeline-body">
                              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                           </div>
                        </div>
                     </li>
                     <li class="timeline-inverted">
                        <div class="timeline-image">
                           <img class="img-circle img-responsive" src="boot/img/about/4.jpg" alt="">
                        </div>
                        <div class="timeline-panel">
                           <div class="timeline-heading">
                              <h4>July 2014</h4>
                              <h4 class="subheading">Phase Two Expansion</h4>
                           </div>
                           <div class="timeline-body">
                              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                           </div>
                        </div>
                     </li>
                     <li class="timeline-inverted">
                        <div class="timeline-image">
                           <h4>Be Part
                              <br>Of Our
                              <br>Story!
                           </h4>
                        </div>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <!-- Team Section -->
      <section id="team" class="bg-light-gray">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading">Our Amazing Team</h2>
                  <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
               </div>
            </div>
            <div class="row">
               <div class="col-sm-4">
                  <div class="team-member">
                     <img src="boot/img/team/1.jpg" class="img-responsive img-circle" alt="">
                     <h4>Kay Garland</h4>
                     <p class="text-muted">Lead Designer</p>
                     <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="team-member">
                     <img src="boot/img/team/2.jpg" class="img-responsive img-circle" alt="">
                     <h4>Rahatullah Ansari</h4>
                     <p class="text-muted">Founder & C.E.O.</p>
                     <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="col-sm-4">
                  <div class="team-member">
                     <img src="boot/img/team/3.jpg" class="img-responsive img-circle" alt="">
                     <h4>Diana Pertersen</h4>
                     <p class="text-muted">Lead Developer</p>
                     <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-lg-offset-2 text-center">
                  <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
               </div>
            </div>
         </div>
      </section>
      <!-- Contact Section -->
      <section id="contact" style="background-image:url(img/bg.jpg)">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2>Contact Us</h2>
                  <br>
                  <br>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-8 col-lg-offset-2">
                  <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                  <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                  <form name="sentMessage" id="contactForm" novalidate>
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                           <label>Name</label>
                           <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                           <p class="help-block text-danger"></p>
                        </div>
                     </div>
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                           <label>Email Address</label>
                           <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                           <p class="help-block text-danger"></p>
                        </div>
                     </div>
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                           <label>Phone Number</label>
                           <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                           <p class="help-block text-danger"></p>
                        </div>
                     </div>
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                           <label>Message</label>
                           <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                           <p class="help-block text-danger"></p>
                        </div>
                     </div>
                     <br>
                     <div id="success"></div>
                     <div class="row">
                        <div class="form-group col-xs-12">
                           <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer -->
      <footer class="text-center">
         <div class="footer-above">
            <div class="container">
               <div class="row">
                  <div class="footer-col col-md-4">
                     <h3>Location</h3>
                     <p>H.No-183, Near KIET, Muradnagar
                        <br>Ghaziabad, U.P., INDIA
                     </p>
                  </div>
                  <div class="footer-col col-md-4">
                     <h3>Around the Web</h3>
                     <ul class="list-inline">
                        <li>
                           <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                           <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                        </li>
                        <li>
                           <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                        </li>
                        <li>
                           <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                        </li>
                        <li>
                           <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                        </li>
                     </ul>
                  </div>
                  <div class="footer-col col-md-4">
                     <h3>About HELPMIII</h3>
                     <p>Helpmiii is a free to use, open source of help for all.</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="footer-below">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12">
                     Helpmiii © 2016
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
      <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
         <a class="btn btn-primary" href="#page-top">
         <i class="fa fa-chevron-up"></i>
         </a>
      </div>
      <!-- jQuery -->
      <script src="boot/vendor/jquery/jquery.min.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="boot/vendor/bootstrap/js/bootstrap.min.js"></script>
      <!-- Plugin JavaScript -->
      <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <!-- Contact Form JavaScript -->
      <script src="boot/js/jqBootstrapValidation.js"></script>
      <!-- Theme JavaScript -->
      <script src="boot/js/freelancer.min.js"></script>
   </body>
</html>