<?php 
    class register extends Controller{
        public function index() {
           
            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $user->signup($_POST);
            }
            
            $this->load_view("admin/register");
        }
    }