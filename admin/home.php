<?php
include('session.php');
include('header.php');
include('dbcon.php');
?>
</head>
<body>
<?php include('nav_top.php'); ?>
<div class="wrapper">
<div class="home_body">
<div class="navbar">
	<div class="navbar-inner">
	<div class="container">
	<ul class="nav nav-pills">
	  <li>....</li>
	  <li class="active"><a href="home.php"><i class="icon-home icon-large"></i>Home</a></li>
	  <li><a  href="candidate_list.php"><i class="icon-align-justify icon-large"></i>Candidates List</a></li>

	  <li class=""><a  href="voter_list.php"><i class="icon-align-justify icon-large"></i>Voters List</a></li>
		 <li><a  href="canvassing_report.php"><i class="icon-book icon-large"></i>Canvassing Report</a></li>
		    <li><a  href="History.php"><i class="icon-table icon-large"></i>History Log</a>
		   <li><a data-toggle="modal" href="#about"><i class="icon-exclamation-sign icon-large"></i>About</a></li>
		   <div class="modal hide fade" id="about">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	  <?php include('about.php') ?>
	  <div class="modal-footer_about">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>
		</div>
		</div>
		   <li>....</li>
	 </ul>
	<form class="navbar-form pull-right">
		<?php $result=mysqli_query($conn,"select * from users where User_id='$id_session'");
	$row=mysqli_fetch_array($result);
	?>
	<font color="white">Welcome:<i class="icon-user-md"></i><?php echo $row['User_Type']; ?></font>
	<a class="btn btn-danger" id="logout" data-toggle="modal" href="#myModal"><i class="icon-off"></i>&nbsp;Logout</a>
	<div class="modal hide fade" id="myModal">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	    <p><font color="gray">Are You Sure you Want to LogOut?</font></p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">No</a>
	    <a href="logout.php" class="btn btn-primary">Yes</a>
		</div>
		</div>

	</form>
	</div>
	</div>
	</div>
	<div id="element" class="hero-body">
	  <div class="thumbnail_gallery">
                <h2>Online voting Gallery</h2>
				<p><font color="black">Click the image to view more...</font></p>
				<div id="myGallery" class="spacegallery">
					<img src="./gallery/vote-1.jpeg" alt="" />
					<img src="./gallery/vote-2.jpeg" alt="" />
					<img src="./gallery/vote-3.jpeg" alt="" />
					<img src="./gallery/vote-4.jpeg" alt="" />
					<img src="./gallery/vote-5.jpeg" alt="" />
					<img src="./gallery/vote-6.jpeg" alt="" />
					<img src="./gallery/vote-7.jpeg" alt="" />
					<img src="./gallery/vote-8.jpeg" alt="" />
					<img src="./gallery/vote-3.jpeg" alt="" />
					<img src="./gallery/vote-1.jpeg" alt="" />
          </div>
			</div>
			  <div class="thumbnail_mission">
			  <h2>Mission</h2>
			  <p> Our online voting platform is committed to promoting transparency, accessibility, and fairness in the electoral process. 
    We aim to empower citizens to cast their votes securely and conveniently from anywhere, ensuring that every voice is heard and 
    every vote counts.
			  </p>
			   <a class="btn btn-info" data-toggle="modal" href="#mission"><i class="icon-list-alt icon-large"></i>&nbsp;Read More</a>
			   	<div class="modal hide fade" id="mission">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	   <h2>College Of Education Mission</h2>
<p><font color="black">
Our mission is to provide a secure, transparent, and accessible online voting system that empowers all eligible users to participate in democratic processes anytime, anywhere, with confidence and ease.
</p>

	   <h2>College Of Education Vission</h2>
<p><font color="black">
To become a trusted and innovative platform that revolutionizes the way voting is conducted—ensuring integrity, increasing voter turnout, and strengthening democratic values through the power of technology.
</p>
	  </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>

		</div>
		</div>

			  </div>

			   <div class="thumbnail_vission">
			   <h2>Objectives</h2><p>High School Level</p>
			  <p>*develop an Enlightened commitment to the national ideals by cherishing,
			  preserving and developing the desirable aspects of Filipino heritage, spiritually,
			  morally and socialy.
			  </p>
			  <a class="btn btn-info" data-toggle="modal" href="#read_objectives"><i class="icon-list-alt icon-large"></i>&nbsp;Read More</a>

			  	<div class="modal hide fade" id="read_objectives">
	<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">�</button>
	    <h3> </h3>
	  </div>
	  <div class="modal-body">
	  <p><font color="black">* Provide knowledge and desirable attitudes for understanding the nature and purpose of man-one�s self, one�s own people, the races, places and times.
	  </font>
	  </p>
	  <p><font color="black">* Develop higher intellectual skills of students as well as their work skills and ethics for the wish choice of career and vocation or, specialized training in specific occupation.
	  </font>
	  </p><p><font color="black">* Provide avenues for the maximum utilization of ones potentials and abilities in science and technology and arts for self-fulfilment and promoting the welfare of others.
	  </font>
	  </p>
	  <h2>Objectives</h2>
	  <p>Elementary Level</p>
	 <p><font color="black">* Provide the basic knowledge and develop the foundation skills, attitude and values essential to the child�s personal development necessary for living in contributing and developing and changing milieu.]
	 </p>
	 <p>
	 * Provide learning experiences which increase the child�s awareness of the responsiveness to the change and just demands of society and to prepare him/her for constructive and effective environment.
	 </p>
	 <p>
	 * Promotes and intensify the child�s knowledge and identification with and love for the people and nation to which he/she belongs.
	 </p>
	 <p>* Promote work experiences which develop and enhance the child�s orientation to the world of work and creativity to prepare him to engage and honest and spiritual work
	 </p>
	 </div>
	  <div class="modal-footer">
	    <a href="#" class="btn" data-dismiss="modal">Close</a>

		</div>
		</div>
			  </div>

	</div>
	<?php include('footer.php')?>
</div>
</div>
</body>
</html>
