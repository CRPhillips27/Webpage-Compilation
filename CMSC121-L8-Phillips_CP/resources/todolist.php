<!DOCTYPE html>
<html>
	<head>
		<title>Remember the Cow</title>
		
		<link href="cow.css" type="text/css" rel="stylesheet" />
		<link href="favicon.ico" type="image/ico" rel="shortcut icon" />
		
		<script src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.0.0/prototype.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/scriptaculous/1.9.0/scriptaculous.js" type="text/javascript"></script>
		<script src="provided.js" type="text/javascript"></script>
		<script src="todolist.js" type="text/javascript"></script>
	</head>

	<body>
		<div class="headfoot">
		<div id = "top">
			<h1>
				<img src="logo.gif" alt="logo" />
				Remember<br />the Cow
			</h1>
			</div>
		</div>
		
		<div id="main">
			<h2>stepp's To-Do List</h2>

			<ul id="todolist"></ul>

			<div id="buttons">
				<input id="itemtext" type="text" size="30" autofocus="autofocus" />
				<button id="add">Add to Bottom</button>
				<button id="delete">Delete Top Item</button>
			</div>

			<ul>
				<li><a href="logout.php">Log Out</a></li>
			</ul>
		</div>
		
		<div class="headfoot">
			<p>
				"Remember The Cow is nice, but it's a total copy of another site." - PCWorld <br />
				All pages and content &copy; Copyright CowPie Inc.
			</p>

			<div id="w3c">
				<a href="https://webster.cs.washington.edu/validate-html.php">
					<img src="https://webster.cs.washington.edu/w3c-html.png" alt="Valid HTML" /></a>
				<a href="https://webster.cs.washington.edu/validate-css.php">
					<img src="https://webster.cs.washington.edu/w3c-css.png" alt="Valid CSS" /></a>
				<a href="https://webster.cs.washington.edu/jslint/?referer">
					<img src="https://webster.cs.washington.edu/w3c-js.png" alt="Valid JS" /></a>
			</div>
		</div>
	</body>
</html>
