
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			PHP SprintF contact form
		</title>
		<style type="text/css">
			html{
				height: 100%;
				width: 100%;
				font-family: tahoma, sans-serif;
			}

			#formDiv{
				margin: 0px auto;
				padding: 12px;
				position: relative;
				border: 2px #000 dotted;
				width: 400px;
				height: auto;
				border-radius: 4px;
				-webkit-border-radius: 4px;
			}

			input[type=submit]{
				background-color: #000f2f;
				margin: 12px;
				color: #fff;
				font-weight: 600;
				border: 0;
				cursor: pointer;
			}

			#sprintF{
				margin: 0px auto;
				padding: 12px;
				position: relative;
				border: 2px #000 dotted;
				width: 400px;
				height: auto;
				border-radius: 4px;
				-webkit-border-radius: 4px;
				color: #a4a;
				font-weight: 400;
			}
		</style>
	</head>
	<body>
		<?php
			if (isset($_POST['sbmt'])) {

					$name 	= $_POST['name'];
					$pswd 	= $_POST['pswd'];
					$gend 	= $_POST['gender'];
					$car 	= $_POST['car'];
					$lang 	= implode(' ', $_POST['language']);
					$msgs 	= $_POST['msgs'];
					$term   = $_POST['terms'];
					
					printf('<div id="sprintF">Username: %s
					<br><br>Password: %s
					<br><br>Gender: %s
					<br><br>Car: %s
					<br><br>Languages: %s
					<br><br>Message: %s</div><br>', 
					$name,$pswd,$gend,$car,$lang,$msgs);

			}
		?>
		<div id="formDiv">
			<form method="post" action="">
				<p>USER NAME:</p> <input type="text" name="name">
				<p>PASSWORD:</p> <input type="password" name="pswd">
				<p>GENDER:</p>
				<input type="radio" name="gender" value="m">male<br>
				<input type="radio" name="gender" value="f">female	
				<p>FAVORITE CAR TYPE:</p>
				<select name="car">
					<option value="bmw">bmw</option>
					<option value="mercedes">mercedes</option>
					<option value="toyota">toyota</option>
					<option value="audi">audi</option>
					<option value="ford">ford</option>					
				</select><br>
				<p>LANGUAGES YOU SPEAK:</p>
				<select multiple name="language[]" size="5">
					<option value="en">english</option>
					<option value="de">german</option>
					<option value="jp">japanese</option>
					<option value="fr">french</option>
					<option value="ru">russian</option>					
				</select><br>
				<p>MESSAGES:</p>
				<textarea name="msgs">
				</textarea><br>
				<input type="checkbox" name="terms" value="ok">I accept Terms &amp; Conditions<br>
				<input type="submit" name="sbmt" value="Send Data">							
			</form>
		</div>
		<!--end formDiv-->
	</body>
</html>
