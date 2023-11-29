<?php
    include "dbconnect.php";
    if(isset($_POST['Submit'])){
        $Username=$_POST['Username'];
        $Password=md5($_POST['Password']);
        $Cpassword=md5($_POST['Cpassword']);
        if($Password == $Cpassword){ 
            $sql ="INSERT INTO `users` (`Username`, `Password`) VALUES ('$Username', '$Password')";
            $result=mysqli_query($conn,$sql);
            if($result){
                 echo"Account created successfully";
            }else{
                echo "Something went wrong";
        }
    }
    else{
        echo "Password doesn't match";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="stylesheets/registration.css?v=<?php echo time();?>">
  </head>
  <body>
    <center><h3>Sign Up</h3></center>
    <form action="" method="post">
      <div class="container">
        <table cellpadding="20%">
          <tr>
            <td>Username:</td>
            <td>
              <input
                type="text"
                name="Username"
                id=""
                placeholder="Username.."
                required
              />
            </td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input
                type="password"
                name="Password"
                id=""
                placeholder="Password"
              />
            </td>
          </tr>
          <tr>
            <td>Confirm Password:</td>
            <td>
              <input
                type="password"
                name="Cpassword"
                id=""
                placeholder="Repeat password"
              />
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="checkbox" name="" id="" />I agree to the Terms of
              User
            </td>
          </tr>
          <tr>
            <td>
              <input type="submit" name="Submit" id="" value="Register" />
            </td>
            <td>
              <a href="login.php">
                <input type="button" name="button" id="" value="Login" />
              </a>
            </td>
          </tr>
        </table>
      </div>
    </form>
  </body>
</html>
