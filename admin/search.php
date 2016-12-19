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
	include("../connect.php");
	session_start();
	if(!isset($_SESSION['user'])) header('Location: ../index.php');
	$sql = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video ORDER BY RAND() LIMIT 2";
	$sql1 = "SELECT Indexes,Judul, Uploader, Times, Views, Thumbnail, Format FROM Video  ORDER BY Indexes DESC LIMIT 4";
	$result = $conn->query($sql);
	$result1 = $conn->query($sql1);
?>
<?php include("header.php");?>
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
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Search Result</h3>
					</div>
					<?php 
						include("../connect.php");
						//if(isset($_POST['submit'])){ 
							$name=$_POST['name']; 
							//-query  the database table 
							$sql="SELECT  * FROM video WHERE Judul LIKE '%" . $name .  "%'"; 
							//-run  the query against the mysql query function 
							$result=mysqli_query($conn,$sql); 
							//-create  while loop and loop through result set 
							while($row=mysqli_fetch_array($result)){ 
							    $judul  =$row['Judul']; 
							    $index=$row['Indexes']; 
							  //-display the result of the array 
								echo"	
								  	<div class='col-md-4 resent-grid recommended-grid slider-top-grids'>
										<div class='resent-grid-img recommended-grid-img'>
											<a href='insert_views.php?ID=". $row["Indexes"]."&t=0'><img src='../Thumbnail/". $row["Thumbnail"].".jpg' alt='' /></a>
											<div class='time'>
												<p>". $row["Times"]."</p>
											</div>
											<div class='clck'>
												<span class='glyphicon glyphicon-time' aria-hidden='true'></span>
											</div>
										</div>
										<div class='resent-grid-info recommended-grid-info'>
											<h3><a href='insert_views.php?ID=". $row["Indexes"]."&t=0' class='title title-info'>". $row["Judul"]."</a></h3>
											<ul>
												<li><p class='author author-info'><a href='#'' class='author'>". $row["Uploader"]."</a></p></li>
												<li class='right-list'><p class='views views-info'>". $row["Views"]." views</p></li>
											</ul>
										</div>
									</div> "; 
							};
						//} else{ 
						//	echo  "<p>Please enter a search query</p>"; 	 
					  	//} 
					?> 
					<div class="clearfix"> </div>
				</div>
				<div class="recommended" id="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
						</div>					
					</div>
				<div class="recommended">
					<div class="recommended-grids">
						
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="recommended-grids">
						
						
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<?php include("footer.php"); ?>
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
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
  </body>
</html>

