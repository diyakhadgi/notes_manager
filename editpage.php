<?php
include "dbconnect.php";
$id=$_GET['update'];
$sql= "Select * from `note` where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$title = $row['title'];
$description = $row['description'];
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $sql ="update `note` set title='$title', description='$description' where id='$id'" ;
    $result= mysqli_query($conn, $sql);
    if($result)
    {
        header("location: http://localhost/notes/welcome.php");
    }
    else{
        echo "Update failed";
    }
}
?>

<html>
    <head>
    <link rel="stylesheet" href="stylesheets/edit.css?v=<?php echo time();?>">
    </head>
    <body>
        <div class="container">
            <h4>Edit Note</h4>
            <hr>
            <form action="" method="POST">
                <div class="container1">
                    <label for="title" class="title">Title</label> <br>
                    <input type="text" class="text" name="title" id="title" value=<?php echo $title; ?> >
                </div> 
                <div class="container2">
                    <label for="desc" class="desc">Description</label> <br>
                    <input type="text" class="textarea" name="description" id="description" autocomplete="off" value=<?php echo $description; ?> >
                </div> <br>
                <button type="submit" class="btn" name="submit">Update Note</button>
                <a href="welcome.php" class="btn2">Close</a>
            </form>
        </div>
    </body>
</html>
