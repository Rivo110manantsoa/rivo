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
            <form method="post" action="" class="form-search">
                <input type="text" name="search" id="search" class="input-search" placeholder="search project..........">
                <button class="fa-solid fa-search"></button>
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