<?php
include 'dbconnect.php';
session_start();
$profile = $_SESSION['Username'];
if($profile==true)
{
}
else
{
    header('location:http://localhost/notes_manager/login.php');
}
$sql= "select * from users where Username= '$profile'";
$result = mysqli_query($conn, $sql);
$row= mysqli_fetch_assoc($result);
?>
<html>
    <body>
    <?php
        $sql = "SELECT user_id from users where username = '$profile'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>0){ 
            while($row= mysqli_fetch_assoc($result)){
                $num1 = $row['user_id'];
            }
        }
        ?>
        <?php
        include "dbconnect.php";
        if(isset($_POST["submit"])) {
            $title= $_POST["title"];
            $description= $_POST["description"];
            $sql ="INSERT INTO `note`( `user_id`, `title`, `description`) VALUES ('$num1','$title','$description')";
            $result=mysqli_query($conn,$sql);
            if($result){
               
            } else{
                echo "data not inserted";
            }
        }
        ?>
    <head>
    <link rel="stylesheet" href="stylesheets/welcome.css?v=<?php echo time();?>">
    </head>   
       <div class="navbar">
       <div class="logo-text">eNotes</div>
            <a href="#">Home</a>
            <a href="#">About</a>
            <div class="search-container">
                 <input type="text" class="search-box" placeholder="Search...">
            </div>
            <a href="logout.php">Logout</a>
        </div>
    <form class="form" action="" method="POST">
        <div class="container1">
            <label for="title" class="title">Title</label> <br>
            <input type="text" class="text" name="title" id="title" required>
        </div> 
        <div class="container2">
            <label for="desc" class="desc">Description</label> <br>
            <input type="text" class="textarea" name="description" id="description" placeholder="Enter Description" autocomplete="off" required>
        </div> <br>
        <button type="submit" class="btn" name="submit">Add Note
        </button>
        </div>
    </form>
    <div class="notice">
        <div class="row">
            <div class="col">
                <h1>Your Notes</h1>
    <?php
    $sql = "SELECT * FROM `note` INNER JOIN users on users.user_id= note.user_id where note.user_id = '$num1' ";
    $result2 = mysqli_query($conn, $sql);
    $num2 = mysqli_num_rows($result2);
    if($num2>0){
         while ($row1 = mysqli_fetch_assoc($result2)) {
            echo '<div class="card">
            <h5 class="card-title">' . $row1["title"] . '</h5>
            <p class="card-text">' . $row1["description"] . '</p>
            <a href="editpage.php?update='.$row1["id"].'" class="edit">Edit</a>
            <a href="delete.php?id='.$row1["id"].'" class="delete">Delete</a>
    </div>';
    }
    }
    ?>
                </div>
            </div>
        </div>
    </body>
</html>
