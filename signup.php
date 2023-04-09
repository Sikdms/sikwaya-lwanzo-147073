<!DOCTYPE html>
<html>
<head>
	<title>signup</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="proCSS.css"/>
</head>
<body>
	<div class="wrap" style="border-style: solid;border-width: 1px;">
   <h1 class="regiTitle" style="text-align: center;">Signup</h1>

   
   <form action= "process/user_process.php" method= "POST" autocomplete="off", class="register" style="line-height: 30px;">
      <div class="logins">
      
      <div class="header">
   
   </div>
    
   <label>First name: <br/>
   <input type = "text" class="register-input" name = "firstname" placeholder = "Enter your firstname" autofocus  /><br/></label>
   <label>Last name: <br/>
   <input type = "text" class="register-input" name = "lastname" placeholder = "Enter your last name" /><br/></label>
   <label>Other name: <br/>
   <input type = "text" class="register-input" name = "othername" placeholder = "Enter your othername" /><br/><br/></label>
   <select name = "gender" required>
         <option value = "">--Select your gender--</option>
         <option value = "Masculine">M</option>
         <option value = "Feminine">F</option>
         </select><br/>
   <label>Date of birth: <br/>
   <input type = "date"class="register-input" name = "dob" placeholder = "Enter your dob" required><br/></label>     
   <label>User name:<br/>
   <input type = "text" class="register-input" name = "username" placeholder = "Enter your user name"  required><br/></label>
   <label>Email address:<br/>
   <input type = "email" class="register-input" name = "email" placeholder = "Enter your email"  required><br/></label>
   <label>Password:<br/>
   <input type = "password" class="register-input" name = "password" placeholder = "Enter your password"  required><br/></label>
   <label>Confirm password:<br/>
   <input type = "password"  class="register-input" name = "passwordconf" placeholder = "Confirm password" required><br/></label>
   
   <select name = "userType"  required>
   <option value = "">--Select User Type--</option>
   <option value = "farmer">Farmer</option>
   <option value = "Client">Client</option>
   
   <!--<option value = "admin">admin</option>-->
   
   </select><br/><br/>
   
   <input type = "submit" name = "signup" value="Sign Up"><br/><br/>
   
   </form>

   
       <p class="form__text">
                <a class="form__link" href="Login.php" id="LOGIN">Already have an account? Sign in</a>
            </p>
             <p class="form__text">
                <a class="form__link" href="index.php" id="HOME" >Go back HOME.</a>
            </p>
   </form>
</div>
</body>
</html>