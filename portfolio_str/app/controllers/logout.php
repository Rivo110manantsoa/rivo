<?php
class logout extends controller{
    public function index(){
        $user = $this->load_model("user_model");
        $user->logout();
    }
}