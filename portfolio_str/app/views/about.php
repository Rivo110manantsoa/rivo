<?php $this->load_view("header",$data)?>

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

    <!-- about section start -->
     <section class="about">
        <div class="row">
            <div class="image">
                <img src="<?=ASSETS?>front/images/project/client.jpg" alt="">
            </div>
            <div class="content">
                <h3 class="heading">Why choose me?</h3>
                <?php if(isset($rows) && is_array($rows)):?>
                    <?php foreach($rows as $row):?>

                        <p> <?=$row->texts?></p>          
                       
                     <?php endforeach;?>
                <?php endif;?>
                <a href="<?=ROOT?>home/contact" class="inline-option-btn">Contact me</a>
            </div>
        </div>
        <h1 class="heading">Educations</h1>
        <div class="box-container">

            <?php if(isset($educs) && is_array($educs)):?>
                <?php foreach($educs as $educ):?>

                    <div class="box">
                        <i class="fa-solid fa-user-graduate"></i>
                        <div>
                            <h3><?=$educ->diploma?></h3>
                            <span><?=$educ->school?></span>
                            <small><?=$educ->year?></small>
                        </div>
                    </div>       
                    
                <?php endforeach;?>
            <?php endif;?>   
        </div>
        
        <h1 class="heading">Experiences</h1>
        <div class="box-container">

            <?php if(isset($expers) && is_array($expers)):?>
                <?php foreach($expers as $exper):?>
                    <div class="box">
                        <i class="fa-solid fa-briefcase"></i>
                        <div>
                            <h3><?=$exper->experiences?></h3>
                            <span><?=$exper->society?></span>
                            <small><?=$exper->years?></small>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        

            
        </div>

        <h1 class="heading">Skills</h1>
        <div class="box-container">

            <?php if(isset($skills) && is_array($skills)):?>
                <?php foreach($skills as $skill):?>
                    <div class="box">
                        <i class="fa-solid fa-code"></i>
                        <div>
                            <h3><?=$skill->ski1?></h3>
                            <span><?=$skill->ski2?></span>
                            <small><?=$skill->skidate?></small>
                        </div>
                    </div>            
                <?php endforeach;?>
            <?php endif;?>
           
            </div>            
        </div>
        <h1 class="heading">Languages</h1>
        <div class="box-container">
           
            <?php if(isset($languages) && is_array($languages)):?>
                <?php foreach($languages as $language):?>
                    <div class="box">
                        <i class="fa-solid fa-language"></i>
                        <div>
                            <h3><?=$language->titre?></h3>
                            <span><?=$language->langs?></span>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            
        </div>
        <h1 class="heading">Interests</h1>
        <div class="box-container">

            <?php if($interests):?>
                <?php foreach($interests as $interest):?>
                    <div class="box">
                        <i class="fa-solid fa-gamepad"></i>
                        <div>
                            <h3><?=$interest->titre1?></h3>
                            <span><?=$interest->titre2?></span>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
                
           
        </div>

        <h1 class="heading">Interventions</h1>
        <div class="box-container">
            <?php if(isset($interventions) && is_array($interventions)):?>
                <?php foreach($interventions as $intervention):?>
                    <div class="box">
                        <i class="fas fa-globe"></i>
                        <div>
                            <h3><?=$intervention->head?></h3>
                            <span><?=$intervention->body?></span>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            
        </div>
                  
     </section>
     
    <!-- about section end -->
     
    <!-- reviews section start -->
     <section class="reviews">
        <h1 class="heading">client's reviews</h1>
        <div class="box-container">

            <?php if(isset($reviews) && is_array($reviews)):?>
                <?php foreach($reviews as $row):?>
                   
                    <div class="box">
                        <p><?=$row->message?></p>
                        <div class="user">
                            <img src="<?=ROOT?><?=$row->image1?>" alt="">
                            <div>
                                <h3><?=$row->name?></h3>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-alt"></i>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>          

            <?php if(isset($reviews_blog) && is_array($reviews_blog)):?>
                <?php foreach($reviews_blog as $row_blog):?>
                   
                    <div class="box">
                        <p class="blog"><?=$row_blog->comment?></p>
                        <div class="user">
                            <img src="<?=ROOT?><?=$row_blog->image?>" alt="">
                            <div>
                                <h3><?=$row_blog->firstname?></h3>
                                <div class="stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star-half-alt"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>          
           
        </div>
     </section>
    <!-- reviews section end -->

     <!-- footer section start -->
     <?php $this->load_view("footer",$data)?>