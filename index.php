
<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../php_projects/css/style.css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap');

*
{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #344955;
}
.box
{
    width: 50%;
    min-height: 200px;
    border: 8px solid #000;
    margin: 80px auto;
    background-color: #fff;
    border-top-right-radius: 30%;
    border-bottom-left-radius: 20%;
    border-left: 0;
    border-right: 0;
    border-top-color: orange;
    border-bottom-color: green;
}
.heading{

    width: 100%;
    min-height: 60px;
}
.heading h2{

    text-align: center;
    font-family: "Merriweather", serif;
    font-weight: 600;
    margin: 20px 0;
}
.form-data
{
    width: 100%;
    min-height: 100px;
    margin-bottom: 20px;
    
}
table
{
    margin-left: 50px;
}
table tr td{
    padding: 5px;
    
}
label{

    font-family: "Merriweather", serif;
    font-weight: 200;

}
input[type=text]{
    padding: 5px 10px;
    width: 100%;
    margin-bottom: 10px;
    outline: none;
}
input[type=email]
{
    padding: 5px 10px;
    width: 100%;
    margin-bottom: 10px;
    outline: none;
}
input[type=password]
{
    padding: 5px 10px;
    width: 100%;
    margin-bottom: 10px;
    outline: none;
}
input[type=submit]{
    padding: 10px;
    width: 300px;
    font-family: "Merriweather", serif;
    font-weight: 800;
    background-color: #344955;
    color: white;
    border: none;
    border-radius: 10px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}
input[type=submit]:hover{

    background-color: #50727B;
    color: white;
}
</style>
</head>
<body>
    
    <div class="box">
    <div class="menu" style="background-color: blueviolet; width: 60%; min-height: 30px; padding:10px">
        <a href="" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Register Form</a> 
        <a href="display.php" style="color: white; padding:10px; font-family: Arial, Helvetica, sans-serif; text-decoration: none;">Display Data</a>
    </div>
        <div class="heading">
            <h2>Registration Form</h2>
        </div>

        <div class="form-data">
           <form action="index.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td> <label for="fname">First Name</label></td>
                    <td><input type="text" name="fname" id="fname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="lname">Last Name</label></td>
                    <td><input type="text" name="lname" id="lname" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="email">Enter Email</label></td>
                    <td><input type="email" name="email" id="email" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="mob">Enter Mobile</label></td>
                    <td><input type="text" name="mob" id="mob" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="pass">Enter Password</label></td>
                    <td><input type="password" name="pass" id="pass" autocomplete="off" required></td>
                </tr>
                <tr>
                    <td> <label for="cpass">Enter Confirm Password</label></td>
                    <td><input type="password" name="cpass" id="cpass" autocomplete="off" required></td>
                </tr>

                <tr>
                    <td> <label for="photo">Upload photo</label></td>
                    <td><input type="file" name="uploadfile" required></td>
                </tr>

                <tr>
                    <td></td>
                    <td><input type="submit" value="Register" name="register"></td>
                </tr>
            </table>

           </form>
        </div>
    </div>
</body>
</html>

<?php

if($_POST['register'])
{

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "photos/".$filename;
    move_uploaded_file($tempname,$folder);

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mob = $_POST['mob'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];
    
    $query = "insert into emp(emp_image,fname, lname, email, mob, pass, cpass) values('$folder','$fname','$lname','$email','$mob','$pass','$cpass')";
    $data = mysqli_query($conn,$query);

    if($data)
    {
        echo "<script>alert('Data inserted')</script>";
    }
    else
    {
        echo "<script>alert('Data not inserted')</script>".mysqli_connect_error();
    }
}

?>
