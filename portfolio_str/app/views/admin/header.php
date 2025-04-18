<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Portfolio</title>
    <link rel="stylesheet" href="<?=ASSETS?>back/css/style.css">
    <link rel="stylesheet" href="<?=ASSETS?>front/icons/css/all.min.css">
</head>
<body>
    
    <!-- header section start -->
    
<header class="header">
        <section class="flex">
            <a href="<?=ROOT?>home_admin" class="logo"><img src="<?=ASSETS?>front/images/imgs/logo.jpg" alt=""></a>
            <form class="form-search">
                <input type="text" class="input-search" placeholder="search project.........." disabled>
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
                <a href="<?=ROOT?>home_admin/contact" class="btn">Hire me</a>
                <div class="flex-btn">
                    <a href="<?=ROOT?>login" class="option-btn">login</a>
                    <a href="<?=ROOT?>logout" class="option-btn">logout</a>
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
            <a href="contact.php" class="btn">hire me</a>
        </div>
        <nav class="navbar">
        <a class="<?=isset($page) && $page == 'home_admin' ? 'active' : '';?>" href="<?=ROOT?>home_admin/index"><i class="fa-solid fa-home"></i> <span>home</span></a>
            <a class="<?=isset($page) && $page == 'admin_about' ? 'active' : '';?>" href="<?=ROOT?>home_admin/about"><i class="fa-solid fa-question"></i><span>about me</span></a>
            <a class="<?=isset($page) && $page == 'admin_contact' ? 'active' : '';?>" href="<?=ROOT?>home_admin/contact"><i class="fa-solid fa-headset"></i><span>contact me</span></a>
            <a class="<?=isset($page) && $page == 'admin_portfolio' ? 'active' : '';?>" href="<?=ROOT?>home_admin/portfolio"><i class="fa-solid fa-briefcase"></i><span>portfolio</span></a>
            <a class="<?=isset($page) && $page == 'admin_blog' ? 'active' : '';?>" href="<?=ROOT?>home_admin/blog"><i class="fa-solid fa-chalkboard-user"></i><span>blog</span></a>
        </nav>
    </section>
    <!-- sidebar section end -->