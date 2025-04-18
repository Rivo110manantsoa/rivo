<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
    <link rel="stylesheet" href="<?=ASSETS?>front/css/style.css">
    <link rel="stylesheet" href="<?=ASSETS?>front/icons/css/all.min.css">
    <link rel="stylesheet" href="<?=ASSETS?>front/js/sweetalert.min.js">
</head>
<body>
    
    <!-- header section start-->
    <header class="header">
        <section class="flex">
            <a href="#" class="logo"><img src="<?=ASSETS?>front/images/imgs/logo.jpg" alt=""></a>
            <form  class="form-search">
                <input type="text" name="search" id="search" class="input-search" placeholder="search project..........">
                <button disabled class="fa-solid fa-search"></button>
            </form>
            <div class="icons">
                <div id="menu-btn" class="fa-solid fa-bars"></div>
                <div id="search-btn" class="fa-solid fa-search"></div>
                <div id="user-btn" class="fa-solid fa-user"></div>
                <div id="switch-mode-btn" class="fa-solid fa-sun"></div>
            </div>
            <div class="profile">
                <img src="<?=ASSETS?>front/images/project/client.jpg" alt="">
                <h3>RIVO</h3>
                <span>Full-Stack Developer</span>
                <a href="<?=ROOT?>home/contact" class="btn">Hire me</a>
                <div class="flex-btn">
                    <?php if(isset($_SESSION['user'])):?>
                        <a href="<?=ROOT?>login" class="option-btn">login</a>
                        <a href="<?=ROOT?>logout" class="option-btn">logout</a>
                    <?php endif;?>
                </div>
            </div>
        </section>
    </header>
    <!-- header section end -->

    <!-- sidebar section start -->
    <section class="sidebar">
        <div class="close-sidebar"><i class="fa-solid fa-times"></i></div>
        <div class="profile">
            <img src="<?=ASSETS?>front/images/project/client.jpg" alt="">
            <h3>RIVO</h3>
            <span>Full Stack Developer</span>
            <a href="<?=ROOT?>home/contact" class="btn">hire me</a>
        </div>
        <nav class="navbar">
        <a class="<?=(isset($page) && $page == 'home' || $page == 'portfolio_details') ? 'active' : '';?>" href="<?=ROOT?>index"><i class="fa-solid fa-home"></i> <span>home</span></a>
            <a class="<?=(isset($page) && $page == 'about') ? 'active' : '';?>" href="<?=ROOT?>home/about"><i class="fa-solid fa-question"></i><span>about me</span></a>
            <a class="<?=(isset($page) && $page == 'contact') ? 'active' : '';?>" href="<?=ROOT?>home/contact"><i class="fa-solid fa-headset"></i><span>contact me</span></a>
            <a class="<?=(isset($page) && $page == 'portfolio') ? 'active' : '';?>" href="<?=ROOT?>home/portfolio"><i class="fa-solid fa-briefcase"></i><span>portfolio</span></a>
            <a class="<?=(isset($page) && $page == 'blog') ? 'active' : '';?>" href="<?=ROOT?>home/blog"><i class="fa-solid fa-chalkboard-user"></i><span>blog</span></a>
        </nav>
    </section>
    <!-- sidebar section end -->

     <!-- quick option section start -->
     <section class="quick-select">
        <h1 class="heading">quick options</h1>
        <div class="box-container">
            <div class="box">
                <h3 class="title">popular projects</h3>
                <div class="flex">
                    <div class="slide-0">
                        <a href="#"><i class="fa-solid fa-laptop-code"></i><span>web development</span></a>
                        <a href="#"><i class="fa-solid fa-cogs"></i><span>software development</span></a>
                        <a href="#"><i class="fa-solid fa-gamepad"></i><span>game development</span></a>
                        <a href="#"><i class="fa-solid fa-layer-group"></i><span>templating development</span></a>
                        <a href="#"><i class="fa-solid fa-paint-brush"></i><span>ui/ux development</span></a>
                        <a href="#"><i class="fa-solid fa-briefcase"></i><span>freelancing development</span></a>
                        <a href="#"><i class="fa-solid fa-bullhorn"></i><span>Digital development</span></a>
                        <a href="#"><i class="fa-solid fa-chalkboard-teacher"></i><span>Tutorials development</span></a>
                        <a href="#"><i class="fa-solid fa-atom"></i><span>AI development</span></a>
                    </div>
                </div>
            </div>
            <div class="box">
                <h3 class="title">popular technologies</h3>
                <div class="flex">
                    <div class="slide-1">
                        <a href="#"><i class="fab fa-html5"></i><span>HTML5</span></a>
                        <a href="#"><i class="fab fa-css3"></i><span>CSS3</span></a>
                        <a href="#"><i class="fab fa-js"></i><span>JavaScript</span></a>
                        <a href="#"><i class="fab fa-lpython"></i><span>Python</span></a>
                        <a href="#"><i class="fab fa-php"></i><span>PHP</span></a>
                        <a href="#"><i class="fab fa-bootstrap"></i><span>Bootstrap CSS</span></a>
                        <a href="#"><i class="fab fa-java"></i><span>Java</span></a>
                        <a href="#"><i class="fa-solid fa-database"></i><span>SQL</span></a>
                        <a href="#"><i class="fa-solid fa-laptop-code"></i><span>C/C++</span></a>
                        <a href="#"><i class="fab fa-node-js"></i><span>Node.js</span></a>
                        <a href="#"><i class="fab fa-react"></i><span>React.js</span></a>
                        <a href="#"><i class="fab fa-angular"></i><span>Angular.js</span></a>
                        <a href="#"><i class="fab fa-vuejs"></i><span>Vue.js</span></a>
                        <a href="#"><i class="fa-solid fa-layer-group"></i><span>Laravel</span></a>
                        <a href="#"><i class="fa-solid fa-puzzle-piece"></i><span>Symfony</span></a>
                        <a href="#"><i class="fa-solid fa-fire"></i><span>Codeigniter</span></a>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- quick option section end -->
     <!-- contact section start -->
      <section class="contact">
        <div class="row">
            <div class="image">
                <img src="<?=ASSETS?>front/images/project/client.jpg" alt="">
            </div>

            <?php if(isset($_SESSION['error'])):?>
                <p id="error"><script>swal('Sending...','<?= $_SESSION['error']?>','error')</script></p>
                
            <?php endif;?>    
            <?php if(isset($_SESSION['success'])):?>
                <p id="error"><script>swal('Sending...','<?= $_SESSION['success']?>','success')</script></p>
                
            <?php endif;?> 

            <form action="" method="post">
                <h3 class="heading">get in touch</h3>
                <input type="text" name="name" maxlength="100" placeholder="Enter your name here" class="box">
                <input type="text" name="subject" maxlength="100" placeholder="Enter your subject here" class="box">
                <input type="email" name="email" maxlength="100" placeholder="Enter your email here" class="box">
                <input type="text" name="phone"  maxlength="100" placeholder="Enter your phone number here" class="box">
                <textarea name="message" name="message" placeholder="Please enter your message here" class="box"></textarea>
                <button type="submit" class="inline-btn">Send message</button>
            </form>
        </div>
        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-phone"></i>
                <h3>phone number</h3>
                <a href="tel:+261 33 16 034 25">+261 33 16 034 25</a> 
                  
                <a href="tel:+261 38 93 640 08">+261 38 93 64 008</a>
            </div>
            
            <div class="box">
                <i class="fa-solid fa-envelope"></i>
                <h3>E-mail</h3>
                <a href="mailto:asdonsoter@gmail.com">herimandimbyrivo@gmail.com</a>
            </div>
            <div class="box">
                <i class="fa-solid fa-map-marker-alt"></i>
                <h3>location</h3>
                <a href="#">lot 1118 E 300 Mahazoarivo, Antsirabe, Vakinankaratra</a>
            </div>

        </div>
      </section>
     <!-- contact section end -->

      <!-- footer section start -->
  <footer class="footer">
        &copy;copyright @2025 by <span>RIVO</span> | All rights reserved
      </footer>
  <!-- footer section end -->

  <script src="<?=ASSETS?>front/js/script.js"></script>
  <script src="<?=ASSETS?>front/js/project.js"></script>
  <script src="<?=ASSETS?>front/js/sliders.js"></script>
  <script src="<?=ASSETS?>front/js/sweetalert.min.js"></script>
</body>
</html>