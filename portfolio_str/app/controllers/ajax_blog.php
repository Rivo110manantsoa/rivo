<?php
class ajax_blog extends Controller{
    public function index(){
        $blog = $this->load_model("info_data");

        if (count($_POST) > 0) {
            $data = (object)$_POST;
        } else {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            
        }
        if (is_object($data) && isset($data->data_type)) {
            if ($data->data_type == "add_blog") {

                // $blogs = $blog->get_blogs();

                $blog->insert_blog($data,$_FILES);
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_blog";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "blog added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_blog";
                    echo json_encode($arr);
                }                
            }  else if($data->data_type == "edit_blog") {
                // show($_FILES);die;
                $blog->update_blog($data,$_FILES);
                $arr['message'] = "blog updated successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "edit_blog";
                echo json_encode($arr);
                
            } else            
            if ($data->data_type == "delete_blog") {
                   $blog->delete_blog($data->id);
                   $arr['message'] = "Blog deleted successfully";
                   $_SESSION['error'] = "";
                   $arr['message_type'] = "info";
                   $arr['data_type'] = "delete_blog";
                   echo json_encode($arr);
                
            }
        }
        // show($data->data_type);
    }
   
}