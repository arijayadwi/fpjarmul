<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<?php
	include("connect.php");
	$index = $_GET['ID'];
	$quality = $_GET['quality'];
	$sql = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video Where Indexes = $index";
	$sql_next = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video WHERE NOT Indexes = $index ORDER BY RAND() Limit 4";
	$sql_comment = "SELECT Id, Id_User, Message, Insert_Time FROM Comment Where Id_Video = $index";	
	$result = $conn->query($sql);
	$result_next = $conn->query($sql_next);
	$result_comment = $conn->query($sql_comment);
	function curPageURL() {
	 $pageURL = 'http';
	 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	 $pageURL .= "://";
	 if ($_SERVER["SERVER_PORT"] != "80") {
	  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	 } else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	 }
	 return $pageURL;
	}
?>
<title>Sportify</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><h1><img src="images/sportify.png" width="153px" height="49px" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="search.php" method="POST">
					<input type="text" class="form-control" placeholder="Search..." name="name">
					<input type="submit" value=" ">
				</form>
			</div>
			<div class="header-top-right">
				<div class="signin">
					<a href="#small-dialog3" class="play-icon popup-with-zoom-anim">Sign Up</a>
					<!-- pop-up-box -->
									<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
									<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
									<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
									<!--//pop-up-box -->
									<!--div id="small-dialog2" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="button-bottom">
												
											</div>
										</div>
										<div class="signup">
											<form>
												<input type="text" class="email" placeholder="Email" maxlength="100" title="Enter a valid email address" />
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</form>
											<div class="continue-button">
												<a href="#small-dialog3" class="hvr-shutter-out-horizontal play-icon popup-with-zoom-anim">CONTINUE</a>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div-->	
									<div id="small-dialog3" class="mfp-hide">
										<h3>Create Account</h3>
										<div class="signup">
											<form action="signup.php">
												<input type="text" class="email" name ="Name" placeholder="Nama" required="required" title="Enter a valid email"/>
												<input type="password" placeholder="Password" name="Password" required="required" title="Minimum 6 characters required" autocomplete="off" />
												<input type="text" class="email" placeholder="Email" name="Email" maxlength="100" title="Enter a valid mobile number" />
												<div class="button-bottom">
													<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
												</div>
												<input type="submit"  value="Sign Up"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>	
									<div id="small-dialog7" class="mfp-hide">
										<h3>Create Account</h3> 
										<div class="social-sits">
											<div class="button-bottom">
												<p>Already have an account? <a href="#small-dialog" class="play-icon popup-with-zoom-anim">Login</a></p>
											</div>
										</div>
										<div class="signup">
											<form action="upload.html">
												<input type="text" class="email" placeholder="Email" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" title="Enter a valid email"/>
												<input type="password" placeholder="Password" required="required" pattern=".{6,}" title="Minimum 6 characters required" autocomplete="off" />
												<input type="submit"  value="Sign In"/>
											</form>
										</div>
										<div class="clearfix"> </div>
									</div>		
									<div id="small-dialog4" class="mfp-hide">
										<h3>Feedback</h3> 
										<div class="feedback-grids">
											<div class="feedback-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="button-bottom">
												<p><a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign in</a> to get started.</p>
											</div>
										</div>
									</div>
									<div id="small-dialog5" class="mfp-hide">
										<h3>Help</h3> 
											<div class="help-grid">
												<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											</div>
											<div class="help-grids">
												<div class="help-button-bottom">
													<p><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Feedback</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Lorem ipsum dolor sit amet</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Nunc vitae rutrum enim</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris at volutpat leo</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Mauris vehicula rutrum velit</a></p>
												</div>
												<div class="help-button-bottom">
													<p><a href="#small-dialog6" class="play-icon popup-with-zoom-anim">Aliquam eget ante non orci fac</a></p>
												</div>
											</div>
									</div>
									<div id="small-dialog6" class="mfp-hide">
										<div class="video-information-text">
											<h4>Video information & settings</h4>
											<p>Suspendisse tristique magna ut urna pellentesque, ut egestas velit faucibus. Nullam mattis lectus ullamcorper dui dignissim, sit amet egestas orci ullamcorper.</p>
											<ol>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
												<li>Nunc vitae rutrum enim. Mauris at volutpat leo. Vivamus dapibus mi ut elit fermentum tincidunt.</li>
											</ol>
										</div>
									</div>
									<script>
											$(document).ready(function() {
											$('.popup-with-zoom-anim').magnificPopup({
												type: 'inline',
												fixedContentPos: false,
												fixedBgPos: true,
												overflowY: 'auto',
												closeBtnInside: true,
												preloader: false,
												midClick: true,
												removalDelay: 300,
												mainClass: 'my-mfp-zoom-in'
											});
																											
											});
									</script>	
				</div>
				<div class="signin">
					<a href="#small-dialog" class="play-icon popup-with-zoom-anim">Sign In</a>
					<div id="small-dialog" class="mfp-hide">
						<h3>Login</h3>
						<div class="signup">
							<form action="login.php">
								<input type="text" class="email" name="username" placeholder="Username" required="required"/>
								<input type="password" name="password" placeholder="Password" required="required" />
								<input type="submit" value="LOGIN"/>
							</form>
							<div class="forgot">
								<a href="#">Forgot password ?</a>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="#" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>Coming Soon</a></li>
					
					
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="show-top-grids">
				<div class="col-sm-8 single-left">
					<?php while($row = $result->fetch_assoc()) {
					echo "
					<div class='song'>
						<div class='song-info'>
							<h3>".$row["Judul"]."</h3>	
					</div>
					";
					if($_GET["t"] == 0 ){
						echo"	
			         			<div class='video-grid'>		         			
			         			<video id='myVideo' width='720' controls>
								  <source src='video/".$row["Judul"]."_".$quality.".".$row['Format']."' type='video/".$row['Format']."'>	  
								</video>									
								</div>  																							
							";
					} else {						
			         	echo"	
			         			<div class='video-grid'>		         			
			         			<video id='myVideo' width='720' controls>
								  <source src='video/".$row["Judul"]."_".$quality.".".$row['Format']."#t=".$_GET["t"]."' type='video/".$row['Format']."'>	  
								</video>									
								</div>  																							
							";
						}
			     	} ?>						
					</div>
					<div class="song-grid-right">	
					</div>
					<div class="clearfix"> </div>
					<div class="published">						
						<div class="share">
							<button type="button" class="btn btn-success" id="myButton1">Share</button>
							<script>
								$(document).ready(function(){
								$('#myButton1').click(function(){
									$('#sharing').toggle();
									$('#sharing1').toggle();
									var x = document.URL;
									var x = x.replace("://","%3A%2F%2F");
									var x = x.replace("/Sportify/views.php","%2FSportify%2Fviews.php");
									var x = x.replace("?","%3F");
									var x = x.replace("ID=","ID%3D");
									var x = x.replace("&quality=","%26quality%3D");
									var x = x.replace("&t=","%26t%3D");
									var sharer = "http://www.facebook.com/sharer/sharer.php?u=";
									var link = sharer.concat(x)								
									document.getElementById("shareit").value = x;
									document.getElementById("sharelink").href = link;
								});
								});
							</script>
						</div>				
						<div class="share" id="sharing1" style="display: none;">
							<a id="sharelink" target="_blank">
								<img src="images/fb.png" />
							</a>
						</div>						
						<div class="share" id="sharing" style="display: none;">								
							<h5>Link:</h5>								
							<input type="text" id="shareit">							
							<button onclick="getStartTime()" type="button" class="btn btn-success btn-sm">Start Time</button>
							<input type="text" id="startTime">
							<button onclick="getEndTime()" type="button" class="btn btn-success btn-sm">End Time</button>
							<input type="text" id="endTime">
							
							<script>
								var vid = document.getElementById("myVideo");

								function myFunction() {
									var elem = document.getElementById("myButton1");
								    var x = document.URL;
								    var str3 = "&";
								    var str1 = "t=";
								    var str2 = ",";
								    var start = document.getElementById("startTime").value;
								    var end = document.getElementById("endTime").value;
								    var url = x.concat(str3.concat(str1.concat(start.concat(str2).concat(end))));
								    var url = url.replace("://","%3A%2F%2F");
									var url = url.replace("/Sportify/views.php","%2FSportify%2Fviews.php");
									var url = url.replace("?","%3F");
									var url = url.replace("ID=","ID%3D");
									var url = url.replace("&quality=","%26quality%3D");
									var url = url.replace("&t=","%26t%3D");
								    var sharer = "http://www.facebook.com/sharer/sharer.php?u=";
									var link = sharer.concat(url)
								    if (elem.value=="Share It"){
								    	document.getElementById("shareit").value = url;    
										document.getElementById("sharelink").href = link;
								    	elem.value = "Copy";
								    }
								    
								}							
								
								function getStartTime() { 
								    document.getElementById("startTime").value = parseInt(vid.currentTime);
								    var x = document.URL;
								    x = x.slice(0, -4);
								    var str3 = "&";
								    var str1 = "t=";
								    var url = x.concat(str3.concat(str1.concat(parseInt(vid.currentTime))));
								    var url = url.replace("://","%3A%2F%2F");
									var url = url.replace("/Sportify/views.php","%2FSportify%2Fviews.php");
									var url = url.replace("?","%3F");
									var url = url.replace("ID=","ID%3D");
									var url = url.replace("&quality=","%26quality%3D");
									var url = url.replace("&t=","%26t%3D");
								    var sharer = "http://www.facebook.com/sharer/sharer.php?u=";
									var link = sharer.concat(url)
								    document.getElementById("shareit").value = url;
									document.getElementById("sharelink").href = link;
								} 

								function getEndTime() { 
								    document.getElementById("endTime").value = parseInt(vid.currentTime);
								    var x = document.URL;
								    x = x.slice(0, -4);
								    var str3 = "&";
								    var str1 = "t=";
								    var str2 = ",";
								    var start = document.getElementById("startTime").value;    
								    var url = x.concat(str3.concat(str1.concat(start.concat(str2).concat(parseInt(vid.currentTime)))));
								    var url = url.replace("://","%3A%2F%2F");
									var url = url.replace("/Sportify/views.php","%2FSportify%2Fviews.php");
									var url = url.replace("?","%3F");
									var url = url.replace("ID=","ID%3D");
									var url = url.replace("&quality=","%26quality%3D");
									var url = url.replace("&t=","%26t%3D");
									var url = url.replace(",","%2C");
								    var sharer = "http://www.facebook.com/sharer/sharer.php?u=";
									var link = sharer.concat(url)
								    document.getElementById("shareit").value = url;    
									document.getElementById("sharelink").href = link;
								} 
							</script> 
						</div>						
					</div>					
					<div class="all-comments">
						<div class="all-comments-info">
							<a>Comments <?php echo mysqli_num_rows($result_comment) ?></a>
							<div class="box">
								<form>
									Sign In To Comment
								</form>
							</div>							
						</div>
						<?php while($row_comment = $result_comment->fetch_assoc()) {
							echo "
								<div class='media-grids'>
									<div class='media'>
										<h5>".$row_comment['Id_User']."</h5>
										<div class='media-body'>
											<p>".$row_comment['Message']."</p>
											<span>Posted on : ".$row_comment['Insert_Time']."</span>
										</div>
									</div>							
								</div>
							";
						}
						?>
					</div>
				</div>
				<div class="col-md-4 single-right">
					<h3>Up Next</h3>
					<div class="single-grid-right">						
						<div class="single-right-grids">
							<?php
								while($row_next = $result_next->fetch_assoc()){									
									echo "
										<div class='single-right-grids'>
											<div class='col-md-4 single-right-grid-left'>
												<a href='insert_views.php?ID=". $row_next["Indexes"]."&t=0'><img src='Thumbnail/". $row_next["Thumbnail"].".jpg' alt='' /></a>
											</div>
											<div class='col-md-8 single-right-grid-right'>
												<a href='insert_views.php?ID=". $row_next["Indexes"]."&t=0' class='title'>".$row_next['Judul']."</a>
												<p class='author'><a class='author'>".$row_next['Uploader']."</a></p>
												<p class='views'>".$row_next['Views']." views</p>
											</div>
											<div class='clearfix'> </div>
										</div>
									";
								}
							?>							
						</div>						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a>CREATED BY KELOMPOK FP03</a></li>
								<li><a>I GUSTI NGURAH ARYA BAWANTA 5113100007</a></li>
								<li><a>I PUTU GEDE INDRA GUNAWAN 5113100073</a></li>
								<li><a>I PUTU DWI PRATAMA ARIJAYA 5113100102</a></li>
								<li><a>BAGUS PUTRA MAYANI 5113100125</a></li>
							</ul>
						</div>
					</div>					
				</div>
			</div>
			<!-- //footer -->
		</div>
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>