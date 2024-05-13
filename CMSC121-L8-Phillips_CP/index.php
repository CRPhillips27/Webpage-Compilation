<?php include("top.html"); ?>
		<div id="main">
			<p>
				The best way to manage your tasks. <br />
				Never forget the cow (or anything else) again!
			</p>

			<p>
				Log in now to manage your to-do list:
			</p>
			
			<form id="loginform" action="login.php" method="post">
				<div><input id="name" name="name" type="text" size="12" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input id="password" name="password" type="password" size="12" /> <strong>Password</strong></div>
				<div><input id="submitbutton" type="submit" value="Log in" /></div>
			</form>
		</div>
		 <?php
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color: red; font-weight: bold;">Incorrect user name / password. Please try again.</p>';
    }
 include("bottom.html"); ?>	
