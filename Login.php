<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="proCSS.css"/>
</head>
<body>
	<div class="reg" style="border-style: solid;border-width: 1px;">
   <h1 class="regiTitle" style="text-align: center">Login</h1>
   <form action="process/user_process.php" method="POST" autocomplete="off" class="register" style="line-height: 30px;">
      <div class="logins">
        
    <div class="header" id="">
    </div>
    
        
<form action = "process/user_process.php" method = "POST" autocomplete = "off">
    <label>Username: <br/>
    <input type = "text" name = "username" placeholder = "username" autofocus  required><br/></label>
     
    <label>Password:<br/>
    <input type = "password" name = "password" placeholder = "Enter your password"  required><br/></label>
    
    <input type = "submit" name="Login" value = "Login"/><br/><br/>
    <a href="signup.php">Sign up</a>
    
    </form>
            <p class="form__text">
                <a class="form__link" href="index.php" id="HOME" >Go back HOME.</a>
            </p>
  	</div>
   </form>
</div>
</body>
</html>