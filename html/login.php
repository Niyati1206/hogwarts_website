<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @font-face {font-family: "Harry Potter";
    src: url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.eot");
    src: url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.eot?#iefix") format("embedded-opentype"),
    url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.woff2") format("woff2"),
    url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.woff") format("woff"),
    url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.ttf") format("truetype"),
    url("//db.onlinewebfonts.com/t/0421d4186d6efbfc5331fe180895e780.svg#Harry Potter") format("svg");}

    
        /* Bordered form */
        form {
            /* background-image: url('images/this.jpg'); */
            font-family: Harry Potter, Arial;
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text],
        input[type=password] {
            font-family: "Oswald", Helvetica Neue;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type=text],
        input[type=email] {
            font-family: "Oswald", Helvetica Neue;
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            font-family: Harry Potter, Arial;
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            
            
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text
        span.psw {

            float: right;
            padding-top: 16px;
        } */

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='POST' class="row g-3">
    <div class="pooraform">
        <div>
           <h1><center>LOGIN</center> </h1>
        </div>
       
        <div class="container">
            <label for="uname"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="uname" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <button type="submit" name="submit">login</button>
           
            <!-- <button onclick="pop()" type="submit">Login</button> -->
            



        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn" onclick="myFunc()">Cancel</button>
            <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
        </div>

        <script>
         function myFunc(){
            window.location.href="index.html";
         }
    </script>
    </div>
    </form>

  
</body>

</html>
<?php
session_start();
if (isset($_POST) && $_POST) {
    $conn = mysqli_connect("localhost", "root", "", "harrypotter", "3306");

    if (!$conn) {
        echo "Cannot Connect To Database" . mysqli_connect_error($conn);
        exit;
    }
    $username = $_POST['uname'];
    $password = $_POST['psw'];




    $query = "SELECT username, password FROM register WHERE username='$username';";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);



     if ($username != $row['username'] or $password!= $row['password']) {
        echo "<script>alert('Enter correct data!');
                window.location.replace('index.html');
                </script>;";
    } 
    else if ($username == $row['username'] and $password == $row['password']) {
        $_SESSION['username'] = $username;  
        echo "<script>alert('Loggedin Successfully!');
                    window.location.replace('index.html');
                    </script>;";
    }
}
?>