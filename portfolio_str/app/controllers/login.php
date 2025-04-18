<?php 
    class login extends Controller{
        public function index() {
            $User = $this->load_model("User_model");
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $User->sign_in($_POST);
            }
            
            $this->load_view("admin/login");
        }
    }