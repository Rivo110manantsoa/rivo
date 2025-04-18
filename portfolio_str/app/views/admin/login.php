<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?=ASSETS?>back/css/style.css">
    <link rel="stylesheet" href="../icons/css/all.min.css">
</head>
<body>    

    <!-- login section start-->
     <section class="form-container">
        <form action="" method="post">
            <h3>Sign in</h3>
            <p>your email <span>*</span></p>
            <input type="email" name="email" id="email" class="form-input">
            <p>your password <span>*</span></p>
            <input type="password" name="password" id="password" class="form-input"><br>
            <input type="submit" value="Sign in" class="btn"><br>
            <p>No account yet? click <a href="<?=ROOT?>register">here</a></p>
            <p>NB: <span>*</span> is required</p>
        </form>
     </section>
    <!-- login section end-->

     <!-- footer section start -->
     <!-- <footer class="footer">
        &copy;copyright @2025 by <span>Asdon Soter</span> | All rights reserved
      </footer> -->
     <!-- footer section end -->
    <script src="back/js/script.js"></script>
</body>
</html>