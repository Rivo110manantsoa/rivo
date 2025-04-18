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
                <div class="table-header2">
                    <h1>Contacts</h1>
                    <form action="" method="post">
                        <input type="text" name="search" id="search" placeholder="Search a portfolio......">
                    </form>
                </div>
                <div class="table-section">
                    <table>
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Message</th>                               
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($conts) && is_array($conts)):?>
                                <?php $i=0; foreach($conts as $row): $i++;?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><?=$row->name?></td>
                                        <td><?=$row->subject?></td>
                                        <td><?=$row->email?></td>
                                        <td><?=$row->phone?></td>
                                        <td><?=$row->message?></td>
                                       
                                        <td class="flex-btn">
                                            <button onclick="delete_contact(<?=$row->id?>)" class="btn"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <div class="portf">
                                    <h1 style="color:red;margin-top:2rem;margin-bottom:2rem;text-align:center;justify-items:center;"> Data not found</h1>
                                </div>
                            <?php endif;?>
                            
                        </tbody>
                    </table>
                </div>
                <?=Page::show_pagination();?>
            </div>
      </section>
     <!-- table section end -->

     <?php $this->load_view("admin/footer",$data);?>

<script>


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
            
            if( obj.data_type == "delete_contact"){
               alert(obj.message);
               window.location.reload();

            }
        }
    }
}

function delete_contact(id){
    // alert("ok");
    if (!confirm("Are you sure you want to delete this contact?")) {
            return;
        }

        send_data({
            data_type:"delete_contact",
            id:id
        });
}

</script>