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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePasswordBtns = document.querySelectorAll('.toggle-pwd');

            togglePasswordBtns.forEach((btn) => {
                btn.addEventListener('click', function () {
                    const input = this.previousElementSibling;
                    const icon = this.querySelector('img');

                    if (input.type === 'password') {
                        input.type = 'text';  // Show password
                        icon.src = './assets/eyeclosed.svg';  // Change to eye closed icon
                        icon.alt = 'Hide password';
                    } else {
                        input.type = 'password';  // Hide password
                        icon.src = './assets/eyeopen.svg';  // Change back to eye open icon
                        icon.alt = 'Show password';
                    }
                });
            });
        });
    </script>
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
                            placeholder="Username.."
                            required
                        />
                    </td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td>
                        <div class="pass-wrapper">
                            <input
                                type="password"
                                name="Password"
                                id="password1"
                                placeholder="Password"
                                required
                            />
                            <button type="button" class="toggle-pwd">
                                <img src="./assets/eyeopen.svg" alt="Show password">
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td>
                        <div class="pass-wrapper">
                            <input
                                type="password"
                                name="Cpassword"
                                id="password2"
                                placeholder="Repeat password"
                                required
                            />
                            <button type="button" class="toggle-pwd">
                                <img src="./assets/eyeopen.svg" alt="Show password">
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="checkbox" name="terms" required /> I agree to the Terms of Use
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="Submit" value="Register" />
                    </td>
                    <td>
                        <a href="login.php">
                            <input type="button" value="Login" />
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </form>
</body>
</html>
