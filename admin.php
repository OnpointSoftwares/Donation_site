<?php
//include("sessionAdmin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/sidenav.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

    </style>
</head>
<body>

    <div class="wrapper">
        <!--Top menu -->
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="content">
                <?php
       if(isset($_GET['page']))
       {
        include $_GET['page'].".php";
       }
       else{

       }
       ?>
</div>
        </div>
        <div class="sidebar">
           <!--profile image & text-->
           <div class="profile">
                <img src="images/logo.png" alt="profile_picture">
                <h3><? echo $_SESSION['login']; ?></h3>
                <p>System Admin</p>
            </div>
            <!--menu item-->
            <ul>
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php?page=users">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">Users</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php?page=donations">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Donations</span>
                    </a>
                </li>
                <li>
                    <a href="admin.php?page=settings">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
            
        </div>
        </div>
    
    </div>
    
  <script>
var hamburger = document.querySelector(".hamburger");
    hamburger.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
    })
  </script>
</body>
</html>