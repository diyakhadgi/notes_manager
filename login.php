<?php
include "dbconnect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="stylesheets/login.css?v=<?php echo time();?>">
  </head>
  <body>
    <h3>Welcome</h3>
    <form action="" method="post">
      <div class="container">
        <br />
        <table cellpadding="20%">
          <tr>
            <td>Username:</td>
            <td>
              <input type="text" name="Username" id="" placeholder="Username" required />
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
            <td colspan="2">
              <center>
                <input type="submit" name="Submit" id="" value="Login" autocomplete="off" />
              </center></a>
            </td>
          </tr>
          <tr>
            <td colspan="2"><hr /></td>
          </tr>
          <tr>
            <td colspan="2"><center>Don't have an Accoount?</center></td>
          </tr>
          <tr>
            <td colspan="2">
              <a href="registration.php">
              <center>
                <input 
                  type="button"
                  name="Submit"
                  id=""
                  value="Create an Accoount" 
                /></a>
              </center>
            </td>
          </tr>
        </table>
      </div>

    <?php
    if(isset($_POST['Submit'])){
        $Username=$_POST['Username'];
        $Password=md5($_POST['Password']);
        $sql = "select * from users where Username='$Username' and Password = '$Password'";
        $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
              if($num> 0){
                  $_SESSION['Username'] = $Username;
                  header("Location: http://localhost/notes_manager/welcome.php"); 
                  exit();  
                  } else{
                        echo "login fail";
}
}
?>
    </form>
  </body>
</html>
