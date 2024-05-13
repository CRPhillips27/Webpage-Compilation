<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if POST data is received from buyagrade.html
	
		if (isset($_REQUEST["name"]) && !empty($_REQUEST["name"]) &&
    isset($_REQUEST["section"]) && !empty($_REQUEST["section"]) &&
    isset($_REQUEST["ccnumber"]) && !empty($_REQUEST["ccnumber"])&&
    isset($_REQUEST["cctype"]) && !empty($_REQUEST["cctype"])) {
        $name = $_POST["name"];
        $section = $_POST["section"];
		$ccnumber = $_POST["ccnumber"];
	$cctype = $_POST["cctype"];
	echo "Form submitted successfully!";
	 ?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd><?=$name?></dd>

			<dt>Section</dt>
			<dd><?=$section?></dd>

			<dt>Credit Card</dt>
			<dd><?=$ccnumber?>(<?=$cctype?>)</dd>
		</dl>
		<?php   $dataToSave = "$name;$section;$ccnumber;$cctype\n";
        
        // Append the data to the suckers.txt file
       file_put_contents("suckers.txt", $dataToSave, FILE_APPEND | LOCK_EX);
 // Display the contents of suckers.txt within a <pre> element
    echo"<pre>";
    $fileContents = file_get_contents("suckers.txt");
    echo htmlspecialchars($fileContents);
    echo"</pre>";}
		else{?>
 
<h1>Sorry</h1>
<br/>
     You didn't provide enough information.<a href="buyagrade.html"> GO BACK</a>
	<?php
	}	
	}
	else{
		?>
		nothing was posted
		<?php
	}
	
	?>
	
      
	</body>
</html>  