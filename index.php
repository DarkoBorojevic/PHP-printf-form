<!--home page-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			PHP PrintF contact form
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

			input[type=submit], input[type=reset]{
				background-color: #000f2f;
				margin: 12px;
				color: #fff;
				font-weight: 600;
				border: 0;
				cursor: pointer;
			}

			#printF{
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

			.err{
				color: red;
				padding: 6px;
				width: 400px;
				font-weight: bold;
			}

			.dot{
				color: red;
			}
		</style>
	</head>
	<body>
		<?php
		/*
		note that if you would put these inputs in a database
		*you would have to use mysqli_real_escape_string for
		*securing the input fields. 
		*Here htmlspecialchars function will do fine.
		*/
			if (isset($_POST['sbmt'])) {
				//we are setting ok var to true which is a default value
				//later on if something is wrong with inputs this var is set to false
				$ok = true;
				//we are putting required inputs in array so we can check them all in a foreach loop
				$requiredFields = ['name','password','gender','car','terms'];
				//errors array is set as a session var which will be filled with errors later on
				$_SESSION['errors'] = [];
				//foreach loop that is checking if required inputs are empty values
				foreach ($requiredFields as $requiredField) {
					if (!isset($_POST[$requiredField]) || $_POST[$requiredField] === "") {
						$ok = false;
						$_SESSION['errors'][] = '<div class="err">'.$requiredField.' is empty!</div>';

						die(header("Location:index.php"));
					}
				}
				//we check language input separately from others because language input is an array
				if (!isset($_POST['language']) || !is_array($_POST['language']) || $_POST['language'] === "") {
					$ok = false;
					$_SESSION['errors'][] = '<div class="err">language field is empty!</div>';

					die(header("Location:index.php"));
				}
				//if all ok we procede with the printf
				if ($ok = true) {

					unset($_SESSION['errors']);
					
					printf('
					<div id="printF">Username: %s
					<br><br>Password: %s
					<br><br>Gender: %s
					<br><br>Car: %s
					<br><br>Languages: %s
					<br><br>Message: %s</div><br>', 
					htmlspecialchars($_POST['name']),
					htmlspecialchars($_POST['password']),
					htmlspecialchars($_POST['gender']),
					htmlspecialchars($_POST['car']),
					htmlspecialchars(implode(" ", $_POST['language'])),
					htmlspecialchars($_POST['msgs']),
					htmlspecialchars($_POST['terms']));

				}

			}
		?>
		<div id="formDiv">
			<form method="post" action="">
				<?php
				if (isset($_SESSION['errors']) && $_SESSION['errors'] != "") {
					foreach ($_SESSION['errors'] as $error) {
						echo $error."<br>";
					}
				}
				?>
				<p>fields marked with <span class="dot">*</span> are obligatory</p>
				<p>USER NAME:<span class="dot">*</span></p> <input type="text" name="name">
				<p>PASSWORD:<span class="dot">*</span></p> <input type="password" name="password">
				<p>GENDER:<span class="dot">*</span></p>
				<input type="radio" name="gender" value="m">male<br>
				<input type="radio" name="gender" value="f">female	
				<p>FAVORITE CAR TYPE:<span class="dot">*</span></p>
				<select name="car">
					<option value="bmw">bmw</option>
					<option value="mercedes">mercedes</option>
					<option value="toyota">toyota</option>
					<option value="audi">audi</option>
					<option value="ford">ford</option>					
				</select><br>
				<p>LANGUAGES YOU SPEAK:<span class="dot">*</span></p>
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
				<span class="dot">*</span>
				<input type="checkbox" name="terms" value="ok">I accept Terms &amp; Conditions<br>
				<input type="submit" name="sbmt" value="Send Data">
				<input type="reset" name="rst" value="Clear">							
			</form>
		</div>
		<!--end formDiv-->
	</body>
</html>
