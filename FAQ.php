<?php 
session_start();

# Database Connection File
include "db_conn.php";

# Book helper function
include "php/func-book.php";
$books = get_all_books($conn);

# author helper function
include "php/func-author.php";
$authors = get_all_author($conn);

# Category helper function
include "php/func-category.php";
$categories = get_all_categories($conn);

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FAQ</title>

    <!-- bootstrap 5 CDN-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- bootstrap 5 Js bundle CDN-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">

</head>
<body>
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="index.php">Online Notes & Book Provider </a>
		    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		      <span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse" 
		         id="navbarSupportedContent">
		      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
		        <li class="nav-item">
		          <a class="nav-link" 
		             aria-current="page" 
		             href="index.php">Store</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="contact.php">Contact</a>
		        </li>
		        <li class="nav-item">
		          <a class="nav-link" 
		             href="about.php">About</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link active" 
		             href="FAQ.php">FAQ</a>
		        </li>
				<li class="nav-item">
		          <a class="nav-link" 
		             href="UserLogin.php">User Login</a>
				</li>
		        <li class="nav-item">
		          <?php if (isset($_SESSION['user_id'])) {?>
		          	<a class="nav-link" 
		             href="admin.php">Admin</a>
		          <?php }else{ ?>
		          <a class="nav-link" 
		             href="login.php">Login</a>
		          <?php } ?>

		        </li>
		      </ul>
		    </div>
		  </div>
		</nav>
    
    <div style="margin: 20px;">
        <h1>Copyright Disclaimer for Online Notes & Books Provider</h1>
        <p>© Akash Sahani 2024, Online Notes & Books Provider. All rights reserved.</p>
        <p>All content provided on this website, including text, graphics, logos, images, as well as the compilation thereof, and any software used on the site, is the property of Online Notes & Books Provider or its suppliers and protected by copyright and international copyright laws.</p>

        <h2>License and Site Access</h2>
        <p>Online Notes & Books Provider grants you a limited license to access and make personal use of this site and not to download (other than page caching) or modify it, or any portion of it, except with express written consent of Online Notes & Books Provider. This license does not include any resale or commercial use of this site or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of this site or its contents; any downloading or copying of account information for the benefit of another merchant; or any use of data mining, robots, or similar data gathering and extraction tools.</p>
        <p>The site or any portion of the site may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of Online Notes & Books Provider. You may not frame or utilize framing techniques to enclose any trademark, logo, or other proprietary information (including images, text, page layout, or form) of Online Notes & Books Provider without express written consent. You may not use any meta tags or any other "hidden text" utilizing Online Notes & Books Provider's name or trademarks without the express written consent of Online Notes & Books Provider. Any unauthorized use terminates the permission or license granted by Online Notes & Books Provider.</p>

        <h2>Copyright Complaints</h2>
        <p>Online Notes & Books Provider respects the intellectual property of others. If you believe that your work has been copied in a way that constitutes copyright infringement, please contact us via email at <a href="mailto:Arsahani4@gmail.com">Arsahani4@gmail.com</a> or call us at <a href="tel:+919175493085">+919175493085</a>.</p>

        <h2>Account Termination</h2>
        <p>Online Notes & Books Provider reserves the right to terminate accounts, remove or edit content, or cancel orders at their sole discretion.</p>

        <h2>Updates and Amendments</h2>
        <p>The contents of this disclaimer can change and may be updated at any time. Please revisit the policy periodically to stay informed of any changes.</p>
    </div>
    </body>
</html>
