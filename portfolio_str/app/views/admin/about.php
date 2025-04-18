<?php $this->load_view("admin/header",$data);?>
     <!-- table section start  -->
      <section class="table">
            <div class="table-header">
                <h1 class="heading">quick options</h1>
                <div class="box-container">
                    <div class="box">
                        <h3 class="heading">portfolio projects</h3>
                        <div class="flex-btn">
                            <a href="<?=ROOT?>home_admin/portfolio" class="btn">View list project (admin)</a>
                            <a href="<?=ROOT?>home/portfolio" class="btn">View list project (user)</a>
                        </div>
                    </div>
                    <div class="box">
                        <h3 class="heading">blog technologies</h3>
                        <div class="flex-btn">
                            <a href="<?=ROOT?>home_admin/blog" class="btn">View list project (admin)</a>
                            <a href="<?=ROOT?>home/blog" class="btn">View list project (user)</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <!-- about -->
                <div class="table-header2">
                    <h1>About</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>
                                
                                <th>Description</th>
                               
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($about_me) && is_array($about_me)):?>
                                <?php $i=0; foreach($about_me as $row): $i++;?>

                                        <?php
                                            $info = array();
                                            $info['id'] = $row->id;
                                            $info['texts'] = $row->texts;
                                           
                                           
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>

                                    <tr>
                                        <td><?=$i?></td>
                                        
                                        <td><p><?=$row->texts?></p></td>
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_me(<?=$row->id?>,event)" info_about_me = "<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_about_me(<?=$row->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- educations -->
                <div class="table-header2">
                    <h1>educations</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_ed_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>Diploma</th>
                                <th>School</th>
                                <th>Years</th>                               
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($education) && is_array($education)):?>
                                <?php $i=0; foreach($education as $row): $i++;?>

                                        <?php
                                            $info = array();
                                            $info['id'] = $row->id;
                                            $info['diploma'] = $row->diploma;
                                            $info['school'] = $row->school;
                                            $info['year'] = $row->year;
                                           
                                           
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>

                                    <tr>
                                        <td><?=$i?></td>                                        
                                        <td><p><?=$row->diploma?></p></td>
                                        <td><p><?=$row->school?></p></td>
                                        <td><p><?=$row->year?></p></td>
                                       
                                        <td class="flex-btn">
                                            <button onclick = "edit_about_ed(<?=$row->id?>,event)" info_about_ed = "<?= $info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_educ(<?=$row->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- experiences -->
                <div class="table-header2">
                    <h1>experiences</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_exp_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>expriences</th>
                                <th>society</th>
                                <th>Years</th>                               
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($experience) && is_array($experience)):?>
                                <?php $i=0; foreach($experience as $row): $i++;?>

                                    <?php
                                        $info = array();
                                        $info['id'] = $row->id;
                                        $info['experiences'] = $row->experiences;
                                        $info['society'] = $row->society;
                                        $info['years'] = $row->years;

                                        $info = str_replace('"',"'",json_encode($info));
                                    ?>

                                    <tr>
                                        <td><?=$i?></td>                                        
                                        <td><p><?=$row->experiences?></p></td>
                                        <td><p><?=$row->society?></p></td>
                                        <td><p><?=$row->years?></p></td>
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_exp(<?=$row->id?>,event)" info_about_exp = "<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_exp(<?=$row->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- skills -->
                <div class="table-header2">
                    <h1>skills</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_ski_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>test1</th>
                                <th>test2</th>
                                <th>date</th>                               
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($skills) && is_array($skills)):?>
                                <?php $i=0; foreach($skills as $skill): $i++;?>

                                    
                                        <?php
                                            $info = array();
                                            $info['id'] = $skill->id;
                                            $info['ski1'] = $skill->ski1;
                                            $info['ski2'] = $skill->ski2;
                                            $info['skidate'] = $skill->skidate;
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        
                                        <td><p><?=$skill->ski1?></p></td>
                                        <td><p><?=$skill->ski2?></p></td>
                                        <td><p><?=$skill->skidate?></p></td>
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_skil(<?=$skill->id?>,event)" info_about_skil= "<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_skill(<?=$skill->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- languages -->
                <div class="table-header2">
                    <h1>Languages</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_lng_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>Title</th>                                                              
                                <th>Languages</th>                                                              
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($languages) && is_array($languages)):?>
                                <?php $i=0; foreach($languages as $language): $i++;?>

                                        <?php
                                            $info = array();
                                            $info['id'] = $language->id;
                                            $info['titre'] = $language->titre;
                                            $info['langs'] = $language->langs;
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>

                                    <tr>
                                        <td><?=$i?></td>                                        
                                        <td><p><?=$language->titre?></p></td>                                       
                                        <td><p><?=$language->langs?></p></td>                                       
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_lng(<?=$language->id?>,event)" info_about_lng = "<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_lang(<?=$language->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- interests -->
                <div class="table-header2">
                    <h1>Interests</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_int_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>Title</th>                                                              
                                <th>texts</th>                                                              
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($interests) && is_array($interests)):?>
                                <?php $i=0; foreach($interests as $interest): $i++;?>

                                        <?php
                                            $info = array();
                                            $info['id'] = $interest->id;
                                            $info['titre1'] = $interest->titre1;
                                            $info['titre2'] = $interest->titre2;
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>

                                    <tr>
                                        <td><?=$i?></td>                                        
                                        <td><p><?=$interest->titre1?></p></td>                                       
                                        <td><p><?=$interest->titre2?></p></td>                                       
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_int(<?=$interest->id?>,event)" info_about_int="<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_int(<?=$interest->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- interventions -->
                <div class="table-header2">
                    <h1>Interventions</h1>
                    <form action="">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                        <button onclick="show_interv_popup()" type="button" class="btn add-new"><i class="fa-solid fa-plus-circle"></i> <span>Add new</span></button>
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>                                
                                <th>Title</th>                                                              
                                <th>texts</th>                                                              
                                <th >operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($interventions) && is_array($interventions)):?>
                                <?php $i=0; foreach($interventions as $intervention): $i++;?>

                                        <?php
                                            $info = array();
                                            $info['id'] = $intervention->id;
                                            $info['head'] = $intervention->head;
                                            $info['body'] = $intervention->body;
                                           

                                            $info = str_replace('"',"'",json_encode($info));
                                        ?>

                                    <tr>
                                        <td><?=$i?></td>                                        
                                        <td><p><?=$intervention->head?></p></td>                                       
                                        <td><p><?=$intervention->body?></p></td>                                       
                                       
                                        <td class="flex-btn">
                                            <button onclick="edit_about_interv(<?=$intervention->id?>,event)" info_about_interv="<?=$info?>" class="btn"><i class="fa-solid fa-pen-to-square"></i></button>
                                            <!-- <button class="btn"><i class="fa-solid fa-power-off"></i></button> -->
                                            <button onclick="delete_interv(<?=$intervention->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                           
                                <?php endforeach;?>
                            <?php endif;?>
                           
                        </tbody>
                    </table>
                </div>

                <!-- <?=Page::show_pagination()?> -->
            </div>
      </section>
     <!-- table section end -->

     <!-- create about -->
    <div class="modal" id="create-about">
        <div class="modal-body">
            <h1 class="heading">Creating about me</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="texts">Texts</label>
                    <textarea style="height: 400px;" name="texts" id="texts" class="form-control texts"></textarea>
                </div>         
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit about -->
    <div class="modal" id="edit-about">
        <div class="modal-body">
            <h1 class="heading">Editing about_me</h1>
            <form method="post">
               
                <div class="form-group">
                    <label for="edit-texts">texts</label>
                    <textarea name="edit-texts" id="edit-texts" class="form-control texts"></textarea>
                </div>              
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- create educations -->
    <div class="modal" id="create-educations">
        <div class="modal-body">
            <h1 class="heading">Creating educations</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="diploma">Diploma</label>
                    <input type="text" name="diploma" id="diploma" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="school">School</label>
                    <input type="text" name="school" id="school" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="date" name="year" id="year" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_ed_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- edit educations -->
    <div class="modal" id="edit-educations">
        <div class="modal-body">
            <h1 class="heading">Editing educations</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="edit-diploma">Edit Diploma</label>
                    <input type="text" name="edit-diploma" id="edit-diploma" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-school">Edit School</label>
                    <input type="text" name="edit-school" id="edit-school" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-year">Edit Year</label>
                    <input type="date" name="edit-year" id="edit-year" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_ed_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

     <!-- create experiences -->
     <div class="modal" id="create-experiences">
        <div class="modal-body">
            <h1 class="heading">Creating experiences</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="experiences">Experiences</label>
                    <input type="text" name="experiences" id="experiences" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="society">society</label>
                    <input type="text" name="society" id="society" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="years">Years</label>
                    <input type="date" name="years" id="years" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_exp_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

      <!-- create edit experiences -->
      <div class="modal" id="editt-experiences">
        <div class="modal-body">
            <h1 class="heading">editing experiences</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="edit-experiences">Edit Experiences</label>
                    <input type="text" name="edit-experiences" id="edit-experiences" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-society">Edit society</label>
                    <input type="text" name="edit-society" id="edit-society" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-years">Edit Years</label>
                    <input type="date" name="edit-years" id="edit-years" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_exp_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>
   
    <!-- create skills -->
    <div class="modal" id="create-skills">
        <div class="modal-body">
            <h1 class="heading">Creating skills</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="ski1">text1</label>
                    <input type="text" name="ski1" id="ski1" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="ski2">Text2</label>
                    <input type="text" name="ski2" id="ski2" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="skidate">Date</label>
                    <input type="date" name="skidate" id="skidate" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_ski_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

      <!-- edit skills -->
      <div class="modal" id="edit-skills">
        <div class="modal-body">
            <h1 class="heading">Edit skills</h1>
            <form method="post" >
               
                <div class="form-group">
                    <label for="edit-ski1">Edit Text</label>
                    <input type="text" name="edit-ski1" id="edit-ski1" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-ski2">Edit Text</label>
                    <input type="text" name="edit-ski2" id="edit-ski2" class="form-control">
                </div>      
                <div class="form-group">
                    <label for="edit-skidate">Edit Date</label>
                    <input type="date" name="edit-skidate" id="edit-skidate" class="form-control">
                </div>      
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_ski_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>


    <!-- create languages -->
    <div class="modal" id="create-languages">
        <div class="modal-body">
            <h1 class="heading">Creating Languages</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="titre">Title</label>
                        <input type="text" name="titre" id="titre" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="langs">Languages</label>
                    <textarea style="width:200px;" type="text" name="langs" id="langs" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_lng_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

    <!-- edit languages -->
    <div class="modal" id="edit-languages">
        <div class="modal-body">
            <h1 class="heading">Editing Languages</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="edit-titre">Edit Title</label>
                        <input type="text" name="edit-titre" id="edit-titre" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="edit-langs">Edit Languages</label>
                    <textarea style="width:200px;" type="text" name="edit-langs" id="edit-langs" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_lng_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

     <!-- create interests -->
     <div class="modal" id="create-interests">
        <div class="modal-body">
            <h1 class="heading">Creating interests</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="titre1">Title</label>
                        <input type="text" name="titre1" id="titre1" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="titre2">Texts</label>
                    <textarea style="width:200px;" type="text" name="titre2" id="titre2" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_int_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

     <!-- edit interests -->
     <div class="modal" id="edit-interests">
        <div class="modal-body">
            <h1 class="heading">Edit interests</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="edit-titre1">Edit Title</label>
                        <input type="text" name="edit-titre1" id="edit-titre1" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="edit-titre2">Edit Texts</label>
                    <textarea style="width:200px;" type="text" name="edit-titre2" id="edit-titre2" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_int_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>
     
     <!-- create interventions -->
     <div class="modal" id="create-interventions">
        <div class="modal-body">
            <h1 class="heading">Creating interventions</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="head">Title</label>
                        <input type="text" name="head" id="head" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="body">Texts</label>
                    <textarea style="width:200px;" type="text" name="body" id="body" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_interv_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>

      <!-- edit interventions -->
      <div class="modal" id="edit-interventions">
        <div class="modal-body">
            <h1 class="heading">Editing interventions</h1>
            <form method="post" >
                <div class="form-group">
                        <label for="edit-head">Edit Title</label>
                        <input type="text" name="edit-head" id="edit-head" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="edit-body">Edit Texts</label>
                    <textarea style="width:200px;" type="text" name="edit-body" id="edit-body" class="form-control"></textarea>
                </div>      
                
               
                <div class="form-group flex-btn">
                    <button type="button" class="btn" onclick="collect_edit_interv_data(event)">Save</button>
                    <button type="button" class="btn option-btn" onclick="exit_popup()">Exit</button>
                </div>
            </form>
        </div>
    </div>



    <?php $this->load_view("admin/footer",$data);?>

<script>

let ID = 0;

let popup = document.querySelector("#create-about");
let popup_ed = document.querySelector("#create-educations");
let popup_exp = document.querySelector("#create-experiences");
let popup_ski = document.querySelector("#create-skills");
let popup_lng = document.querySelector("#create-languages");
let popup_int = document.querySelector("#create-interests");
let popup_interv = document.querySelector("#create-interventions");

let popup_edit = document.querySelector("#edit-about");
let popup_edit_ed = document.querySelector("#edit-educations");
let popup_edit_exp = document.querySelector("#editt-experiences");
let popup_edit_ski = document.querySelector("#edit-skills");
let popup_edit_lng = document.querySelector("#edit-languages");
let popup_edit_int = document.querySelector("#edit-interests");
let popup_edit_interv = document.querySelector("#edit-interventions");

function show_popup(){
    popup.style.display = "flex";      
}

function show_ed_popup(){   
    popup_ed.style.display = "flex"; 
}

function show_exp_popup(){    
    popup_exp.style.display = "flex";
}

function show_ski_popup(){    
    popup_ski.style.display = "flex";
}

function show_lng_popup(){    
    popup_lng.style.display = "flex";
}

function show_int_popup(){    
    popup_int.style.display = "flex";
}
function show_interv_popup(){    
    popup_interv.style.display = "flex";
}


function exit_popup(){
    popup.style.display = "none";
    popup_ed.style.display = "none";
    popup_exp.style.display = "none";
    popup_ski.style.display = "none";
    popup_lng.style.display = "none";
    popup_int.style.display = "none";
    popup_interv.style.display = "none";

    popup_edit.style.display = "none";
    popup_edit_ed.style.display = "none";
    popup_edit_exp.style.display = "none";
    popup_edit_ski.style.display = "none";
    popup_edit_lng.style.display = "none";
    popup_edit_int.style.display = "none";
    popup_edit_interv.style.display = "none";
}

window.onscroll = ()=>{
    popup.style.display = "none";   
    popup_ed.style.display = "none";
    popup_exp.style.display = "none";
    popup_ski.style.display = "none";
    popup_lng.style.display = "none";
    popup_int.style.display = "none";
    popup_interv.style.display = "none";

    popup_edit.style.display = "none";
    popup_edit_ed.style.display = "none";
    popup_edit_exp.style.display = "none";
    popup_edit_ski.style.display = "none";
    popup_edit_lng.style.display = "none";
    popup_edit_int.style.display = "none";
    popup_edit_interv.style.display = "none";
}

function  clear_fields(){    

let texts = document.querySelector("#texts").value = "";
let diploma = document.querySelector("#diploma").value = "";
let school = document.querySelector("#school").value = "";
let year = document.querySelector("#year").value = "";
let experiences = document.querySelector("#experiences").value = "";
let society = document.querySelector("#society").value = "";
let years = document.querySelector("#years").value = "";

}


// about
function collect_data(e){
// alert("ok");
    let data = new FormData();

    let texts = document.querySelector("#texts");
// alert(texts.value);

    // validation
    if (texts.value.trim() == "" || !isNaN(texts.value.trim())) {
        alert("Please inter a valid texts");
        // return;
    }
    data.append('texts',texts.value.trim());
    data.append('data_type','add_about_me');
    send_data_files(data);
}

function edit_about_me(id,e){
    popup_edit.style.display = "flex";

    let edit_texts = document.querySelector("#edit-texts");

    if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_me");
            let info = JSON.parse(a.replaceAll("'",'"'));
             
            ID = info.id;
            edit_texts.value = info.texts;
    }   
}

function collect_edit_data(e) {
e.preventDefault();
let edit_texts = document.querySelector("#edit-texts");

// validation
if (edit_texts.value.trim() == "" || !isNaN(edit_texts.value.trim())) {
    alert("Please enter a valid texts!");
    return;
}
let data = new FormData();
data.append('id',ID);
data.append('texts',edit_texts.value.trim());
data.append('data_type','edit_about_me');

send_data_files(data);
}

// education
function collect_ed_data(e){
    // alert("ok");
    let data = new FormData();

    let diploma = document.querySelector("#diploma");
    let school = document.querySelector("#school");
    let year = document.querySelector("#year");
    // alert(texts.value);

    // validation
    if (diploma.value.trim() == "" || !isNaN(diploma.value.trim())) {
        alert("Please inter a valid diploma");
        // return;
    }
    if (school.value.trim() == "" || !isNaN(school.value.trim())) {
        alert("Please inter a valid school");
        // return;
    }
    if (year.value.trim() == "" || !isNaN(year.value.trim())) {
        alert("Please inter a valid year");
        // return;
    }
    data.append('diploma',diploma.value.trim());
    data.append('school',school.value.trim());
    data.append('year',year.value.trim());
    data.append('data_type','add_about_educations');
    send_data_files(data);
}

function edit_about_ed(id,e){
    popup_edit_ed.style.display = "flex";

    let edit_diploma = document.querySelector("#edit-diploma");
    let edit_school = document.querySelector("#edit-school");
    let edit_year = document.querySelector("#edit-year");

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_ed");
            let info = JSON.parse(a.replaceAll("'",'"'));
             
            ID = info.id;
            edit_diploma.value = info.diploma;
            edit_school.value = info.school;
            edit_year.value = info.year;
    }   
}

function collect_edit_ed_data(e) {
e.preventDefault();
let edit_diploma = document.querySelector("#edit-diploma");

// validation
if (edit_diploma.value.trim() == "" || !isNaN(edit_diploma.value.trim())) {
    alert("Please enter a valid diploma!");
    return;
}
let edit_school = document.querySelector("#edit-school");
if (edit_school.value.trim() == "" || !isNaN(edit_school.value.trim())) {
    alert("Please enter a valid school!");
    return;
}
let edit_year = document.querySelector("#edit-year");
if (edit_year.value.trim() == "" || !isNaN(edit_year.value.trim())) {
    alert("Please enter a valid year!");
    return;
}
let data = new FormData();
data.append('id',ID);
data.append('diploma',edit_diploma.value.trim());
data.append('school',edit_school.value.trim());
data.append('year',edit_year.value.trim());
data.append('data_type','edit_about_ed');

send_data_files(data);
}

// experience
function collect_exp_data(e){
    // alert("ok");
    let data = new FormData();

    let experiences = document.querySelector("#experiences");
    let society = document.querySelector("#society");
    let years = document.querySelector("#years");
    // alert(texts.value);

    // validation
    if (experiences.value.trim() == "" || !isNaN(experiences.value.trim())) {
        alert("Please inter a valid experiences");
        // return;
    }
    if (society.value.trim() == "" || !isNaN(society.value.trim())) {
        alert("Please inter a valid society");
        // return;
    }
    if (years.value.trim() == "" || !isNaN(years.value.trim())) {
        alert("Please inter a valid years");
        // return;
    }
    data.append('experiences',experiences.value.trim());
    data.append('society',society.value.trim());
    data.append('years',years.value.trim());
    data.append('data_type','add_about_experiences');
    send_data_files(data);
}

function edit_about_exp(id,e){
    popup_edit_exp.style.display = "flex";

    let edit_experiences = document.querySelector("#edit-experiences");
    let edit_society = document.querySelector("#edit-society");
    let edit_years = document.querySelector("#edit-years");

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_exp");
            let info = JSON.parse(a.replaceAll("'",'"'));
             
            ID = info.id;
            edit_experiences.value = info.experiences;
            edit_society.value = info.society;
            edit_years.value = info.years;
    }   
}

function collect_edit_exp_data(e) {
e.preventDefault();
let edit_experiences = document.querySelector("#edit-experiences");

// validation
if (edit_experiences.value.trim() == "" || !isNaN(edit_experiences.value.trim())) {
    alert("Please enter a valid experiences!");
    return;
}
let edit_society = document.querySelector("#edit-society");
if (edit_society.value.trim() == "" || !isNaN(edit_society.value.trim())) {
    alert("Please enter a valid society!");
    return;
}
let edit_years = document.querySelector("#edit-years");
if (edit_years.value.trim() == "" || !isNaN(edit_years.value.trim())) {
    alert("Please enter a valid years!");
    return;
}
let data = new FormData();
data.append('id',ID);
data.append('experiences',edit_experiences.value.trim());
data.append('society',edit_society.value.trim());
data.append('years',edit_years.value.trim());
data.append('data_type','edit_about_exp');

send_data_files(data);
}


// skills
function collect_ski_data(e){
    // alert("ok");
    let data = new FormData();

    let ski1 = document.querySelector("#ski1");
    let ski2 = document.querySelector("#ski2");
    let skidate = document.querySelector("#skidate");
    // alert(texts.value);

    // validation
    if (ski1.value.trim() == "" || !isNaN(ski1.value.trim())) {
        alert("Please inter a valid text");
        // return;
    }
    if (ski2.value.trim() == "" || !isNaN(ski2.value.trim())) {
        alert("Please inter a valid text2");
        // return;
    }
    if (skidate.value.trim() == "" || !isNaN(skidate.value.trim())) {
        alert("Please inter a valid date");
        // return;
    }
    data.append('ski1',ski1.value.trim());
    data.append('ski2',ski2.value.trim());
    data.append('skidate',skidate.value.trim());
    data.append('data_type','add_about_skills');
    send_data_files(data);
}

function edit_about_skil(id,e) {
        popup_edit_ski.style.display="flex";        
        let edit_ski1 = document.querySelector("#edit-ski1");
        let edit_ski2 = document.querySelector("#edit-ski2");
        let edit_skidate = document.querySelector("#edit-skidate");
       

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_skil");
            let info = JSON.parse(a.replaceAll("'",'"'));
            ID = info.id;
            edit_ski1.value = info.ski1;
            edit_ski2.value = info.ski2;
            edit_skidate.value = info.skidate;

           
        }
        
}

function collect_edit_ski_data(e) {
e.preventDefault();
let edit_ski1 = document.querySelector("#edit-ski1");

// validation
if (edit_ski1.value.trim() == "" || !isNaN(edit_ski1.value.trim())) {
    alert("Please enter a valid text!");
    return;
}
let edit_ski2 = document.querySelector("#edit-ski2");
if (edit_ski2.value.trim() == "" || !isNaN(edit_ski2.value.trim())) {
    alert("Please enter a valid text!");
    return;
}
let edit_skidate = document.querySelector("#edit-skidate");
if (edit_skidate.value.trim() == "" || !isNaN(edit_skidate.value.trim())) {
    alert("Please enter a valid date!");
    return;
}
let data = new FormData();
data.append('id',ID);
data.append('ski1',edit_ski1.value.trim());
data.append('ski2',edit_ski2.value.trim());
data.append('skidate',edit_skidate.value.trim());
data.append('data_type','edit_about_skills');

send_data_files(data);
}


// languages
function collect_lng_data(e){
    // alert("ok");
    let data = new FormData();

    let titre = document.querySelector("#titre");    
    let langs = document.querySelector("#langs");    
    // alert(texts.value);

    // validation
    if (titre.value.trim() == "" || !isNaN(titre.value.trim())) {
        alert("Please inter a valid titre");
        // return;
    }
    if (langs.value.trim() == "" || !isNaN(langs.value.trim())) {
        alert("Please inter a valid languages");
        // return;
    }
    
    data.append('titre',titre.value.trim());
    data.append('langs',langs.value.trim());
   
    data.append('data_type','add_about_languages');
    send_data_files(data);
}

function edit_about_lng(id,e) {
        popup_edit_lng.style.display="flex";        
        let edit_titre = document.querySelector("#edit-titre");
        let edit_langs = document.querySelector("#edit-langs");
       

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_lng");
            let info = JSON.parse(a.replaceAll("'",'"'));
            ID = info.id;
            edit_titre.value = info.titre;
            edit_langs.value = info.langs;           
        }        
}


function collect_edit_lng_data(e) {
    e.preventDefault();
    let edit_titre = document.querySelector("#edit-titre");

    // validation
    if (edit_titre.value.trim() == "" || !isNaN(edit_titre.value.trim())) {
        alert("Please enter a valid titre!");
        return;
    }
    let edit_langs = document.querySelector("#edit-langs");
    if (edit_langs.value.trim() == "" || !isNaN(edit_langs.value.trim())) {
        alert("Please enter a valid languages!");
        return;
    }

    let data = new FormData();
    data.append('id',ID);
    data.append('titre',edit_titre.value.trim());
    data.append('langs',edit_langs.value.trim());
    data.append('data_type','edit_about_lng');

    send_data_files(data);
}


// interests
function collect_int_data(e){
    // alert("ok");
    let data = new FormData();

    let titre1 = document.querySelector("#titre1");    
    let titre2 = document.querySelector("#titre2");    
    // alert(texts.value);

    // validation
    if (titre1.value.trim() == "" || !isNaN(titre1.value.trim())) {
        alert("Please inter a valid title");
        // return;
    }
    if (titre2.value.trim() == "" || !isNaN(titre2.value.trim())) {
        alert("Please inter a valid texts");
        // return;
    }
    
    data.append('titre1',titre1.value.trim());
    data.append('titre2',titre2.value.trim());
   
    data.append('data_type','add_about_interests');
    send_data_files(data);
}

function edit_about_int(id,e) {
        popup_edit_int.style.display="flex";        
        let edit_titre1 = document.querySelector("#edit-titre1");
        let edit_titre2 = document.querySelector("#edit-titre2");
       

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_int");
            let info = JSON.parse(a.replaceAll("'",'"'));
            ID = info.id;
            edit_titre1.value = info.titre1;
            edit_titre2.value = info.titre2;           
        }        
}

function collect_edit_int_data(e) {
e.preventDefault();
let edit_titre1 = document.querySelector("#edit-titre1");

// validation
if (edit_titre1.value.trim() == "" || !isNaN(edit_titre1.value.trim())) {
    alert("Please enter a valid titre!");
    return;
}
let edit_titre2 = document.querySelector("#edit-titre2");
if (edit_titre2.value.trim() == "" || !isNaN(edit_titre2.value.trim())) {
    alert("Please enter a valid texts!");
    return;
}

let data = new FormData();
data.append('id',ID);
data.append('titre1',edit_titre1.value.trim());
data.append('titre2',edit_titre2.value.trim());
data.append('data_type','edit_about_int');

send_data_files(data);
}

// interventions
function collect_interv_data(e){
    // alert("ok");
    let data = new FormData();

    let head = document.querySelector("#head");    
    let body = document.querySelector("#body");    
    // alert(texts.value);

    // validation
    if (head.value.trim() == "" || !isNaN(head.value.trim())) {
        alert("Please inter a valid title");
        // return;
    }
    if (body.value.trim() == "" || !isNaN(body.value.trim())) {
        alert("Please inter a valid texts");
        // return;
    }
    
    data.append('head',head.value.trim());
    data.append('body',body.value.trim());
   
    data.append('data_type','add_about_interventions');
    send_data_files(data);
}

function edit_about_interv(id,e){
    popup_edit_interv.style.display = "flex";

    let edit_head = document.querySelector("#edit-head");
    let edit_body = document.querySelector("#edit-body");

        if (e) {
            e.preventDefault();
            let a = e.currentTarget.getAttribute("info_about_interv");
            let info = JSON.parse(a.replaceAll("'",'"'));
             
            ID = info.id;
            edit_head.value = info.head;
            edit_body.value = info.body;
    }   
}

function collect_edit_interv_data(e) {
e.preventDefault();
let edit_head = document.querySelector("#edit-head");

// validation
if (edit_head.value.trim() == "" || !isNaN(edit_head.value.trim())) {
    alert("Please enter a valid titre!");
    return;
}
let edit_body = document.querySelector("#edit-body");
if (edit_body.value.trim() == "" || !isNaN(edit_body.value.trim())) {
    alert("Please enter a valid texts!");
    return;
}

let data = new FormData();
data.append('id',ID);
data.append('head',edit_head.value.trim());
data.append('body',edit_body.value.trim());
data.append('data_type','edit_about_interv');

send_data_files(data);
}


function send_data_files(formdata){
    let ajax = new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
        if (ajax.readyState == 4 && ajax.status == 200) {
            handle_result(ajax.responseText);
        }
    });
    
    ajax.open("POST",'<?=ROOT?>ajax_portfolio',true);
    ajax.send(formdata);
}

function send_data(data={}){
    let ajax = new XMLHttpRequest();
    ajax.addEventListener("readystatechange",function(){
        if (ajax.readyState == 4 && ajax.status == 200) {
            handle_result(ajax.responseText);
        }
    });
    
    ajax.open("POST",'<?=ROOT?>ajax_portfolio',true);
    ajax.send(JSON.stringify(data));
}

function handle_result(result){
    console.log(result);
    if (result != "") {
        let obj = JSON.parse(result);
        if (typeof obj.message != "undefined" ) {
            if (obj.data_type == "add_about_me") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                    
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else
            if( obj.data_type == "edit_about_me"){
               alert(obj.message);
            //    clear_fields()
               window.location.reload();            
            } else
            if( obj.data_type == "delete_about_me"){
               alert(obj.message);
               window.location.reload();

            } else 
            if (obj.data_type == "add_about_educations") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();                                     
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "edit_about_ed") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                    
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_educations"){
                alert(obj.message);
                window.location.reload();
            } else 
            if (obj.data_type == "add_about_experiences") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();   
                                  
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            }  else 
            if (obj.data_type == "edit_about_exp") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                   
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_experiences") {                
                    alert(obj.message);                                      
                    window.location.reload();               
                
            
            } else 
            if (obj.data_type == "add_about_skills") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup(); 
                                     
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            }  else 
            if (obj.data_type == "edit_about_skills") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                   
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_skills") {               
                    alert(obj.message);                                     
                    window.location.reload();
              
            }  else 
            if (obj.data_type == "add_about_languages") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup(); 
                                     
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            }  else 
            if (obj.data_type == "edit_about_lng") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                    
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_languages") {               
                    alert(obj.message);                                     
                    window.location.reload();
              
            }  else 
            if (obj.data_type == "add_about_interests") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();    
                                  
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            }  else 
            if (obj.data_type == "edit_about_int") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                    
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_interests") {               
                    alert(obj.message);                                     
                    window.location.reload();
              
            }  else 
            if (obj.data_type == "add_about_interventions") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();   
                                   
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            }  else 
            if (obj.data_type == "edit_about_interv") {
                if (obj.message_type == "info") {
                    alert(obj.message);
                    exit_popup();  
                                    
                    window.location.reload();
                } else {
                    alert(obj.message);
                }
            } else 
            if (obj.data_type == "delete_about_interventions") {               
                    alert(obj.message);                                     
                    window.location.reload();
              
            } 
        }
    }
}



function delete_about_me(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this about_me?")) {
        return;
    }
    send_data({
        data_type:"delete_about_me",
        id:id
    });
}

function delete_exp(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this experience?")) {
        return;
    }
    send_data({
        data_type:"delete_about_experiences",
        id:id
    });
}

function delete_educ(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this education?")) {
        return;
    }
    send_data({
        data_type:"delete_about_educations",
        id:id
    });
}
function delete_skill(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this skill?")) {
        return;
    }
    send_data({
        data_type:"delete_about_skills",
        id:id
    });
}
function delete_lang(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this language?")) {
        return;
    }
    send_data({
        data_type:"delete_about_languages",
        id:id
    });
}
function delete_int(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this interest?")) {
        return;
    }
    send_data({
        data_type:"delete_about_interests",
        id:id
    });
}
function delete_interv(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this intervention?")) {
        return;
    }
    send_data({
        data_type:"delete_about_interventions",
        id:id
    });
}



</script>