<?php
class ajax_portfolio extends Controller{
    public function index(){
        $portfolio = $this->load_model("info_data");

        if (count($_POST) > 0) {
            $data = (object)$_POST;
        } else {
            $data = file_get_contents("php://input");
            $data = json_decode($data);
            
        }
        if (is_object($data) && isset($data->data_type)) {
            if ($data->data_type == "add_portfolio") {

                $portfolios = $portfolio->get_portfolios();

                $portfolio->insert($data,$_FILES);
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_portfolio";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "portfolio added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_portfolio";
                    echo json_encode($arr);
                }                
            } else 
            if($data->data_type == "edit_portfolio") {
                $portfolio->update($data,$_FILES);
                $arr['message'] = "Portfolio updated successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "edit_portfolio";
                echo json_encode($arr);
                
            } else            
            if ($data->data_type == "delete_portfolio") {
                   $portfolio->delete_portfolio($data->id);
                   $arr['message'] = "portfolio deleted successfully";
                   $_SESSION['error'] = "";
                   $arr['message_type'] = "info";
                   $arr['data_type'] = "delete_portfolio";
                   echo json_encode($arr);
                
            }  else 
            if ($data->data_type == "add_about_me") {               
                // show($data->data_type);
                $portfolio->add_about_me($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_me";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "about added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_me";
                    echo json_encode($arr);
                }  
                  
            } else
            if ($data->data_type == "edit_about_me") {               
                // show($data->data_type);
                $portfolio->update_about_me($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_me";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "about updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_me";
                    echo json_encode($arr);
                }  
            }else
            if ($data->data_type == "delete_about_me") {
                $portfolio->delete_about_me($data->id);
                $_SESSION['error'] = "";
                $arr['message'] = "about_me deleted successfully";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_me";
                echo json_encode($arr);
                
            }  else 
            if ($data->data_type == "add_about_educations") {               
                // show($data->data_type);
                $portfolio->add_about_educations($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_educations";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "educations added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_educations";
                    echo json_encode($arr);
                }               
            } else 
            if ($data->data_type == "edit_about_ed") {               
                // show($data->data_type);
                $portfolio->update_about_ed($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_ed";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "educations updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_ed";
                    echo json_encode($arr);
                }
            } else  
            if ($data->data_type == "delete_about_educations") {
                $portfolio->delete_about_educations($data->id);
                // show($data->id);
                $_SESSION['error'] = "";
                $arr['message'] = "education deleted successfully!";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_educations";
                echo json_encode($arr);

            }  else           
            if ($data->data_type == "add_about_experiences") {               
                // show($data->data_type);
                $portfolio->add_about_experiences($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_experiences";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "experiences added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_experiences";
                    echo json_encode($arr);
                }                
            }  else  
            if ($data->data_type == "edit_about_exp") {               
                // show($data->data_type);
                $portfolio->update_about_exp($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_exp";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "experience updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_exp";
                    echo json_encode($arr);
                }
            } else            
            if ($data->data_type == "delete_about_experiences") {
                   $portfolio->delete_about_experiences($data->id);
                   $arr['message'] = "experience deleted successfully";
                   $_SESSION['error'] = "";
                   $arr['message_type'] = "info";
                   $arr['data_type'] = "delete_about_experiences";
                   echo json_encode($arr);
                
            }  else            
            if ($data->data_type == "add_about_skills") {               
                // show($data->data_type);
                $portfolio->add_about_skills($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_skills";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "skills added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_skills";
                    echo json_encode($arr);
                }        
                
            }  else
            if ($data->data_type == "edit_about_skills") {               
                // show($data->data_type);
                $portfolio->update_about_ski($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_skills";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "skills updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_skills";
                    echo json_encode($arr);
                }
            } else            
            if ($data->data_type == "delete_about_skills") {
                $portfolio->delete_about_skills($data->id);
                $arr['message'] = "skill deleted successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_skills";
                echo json_encode($arr);
             
         }  else            
            if ($data->data_type == "add_about_languages") {               
                // show($data->data_type);
                $portfolio->add_about_languages($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_languages";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "languages added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_languages";
                    echo json_encode($arr);
                }      
                
            }  else 
            if ($data->data_type == "edit_about_lng") {               
                // show($data->data_type);
                $portfolio->update_about_lng($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_lng";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "language updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_lng";
                    echo json_encode($arr);
                }
            } else            
            if ($data->data_type == "delete_about_languages") {
                $portfolio->delete_about_languages($data->id);
                $arr['message'] = "language deleted successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_languages";
                echo json_encode($arr);
             
         }  else            
            if ($data->data_type == "add_about_interests") {               
                // show($data->data_type);
                $portfolio->add_about_interests($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_interests";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "interests added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_interests";
                    echo json_encode($arr);
                }               
            } else 
            if($data->data_type == "edit_about_int") {
                $portfolio->update_about_int($data,$_FILES);
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "edit_about_int";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "interests updated successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "edit_about_int";
                    echo json_encode($arr);
                }
            } else            
            if ($data->data_type == "delete_about_interests") {
                $portfolio->delete_about_interests($data->id);
                $arr['message'] = "interest deleted successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_interests";
                echo json_encode($arr);
             
         }  else          
            if ($data->data_type == "add_about_interventions") {               
                // show($data->data_type);
                $portfolio->add_about_interventions($data);
                
                if ($_SESSION["error"] != "") {
                    $arr["message"] = $_SESSION["error"];
                    $_SESSION["error"] = "";
                    $arr["message_type"] = "error";
                    $arr["data_type"] = "add_about_interventions";
                    echo json_encode($arr);
                } else {
                    $arr["message"] = "interventions added successfully";
                    $arr["message_type"] = "info";
                    $arr["data_type"] = "add_about_interventions";
                    echo json_encode($arr);
                }               
            } else
            if($data->data_type == "edit_about_interv") {
                $portfolio->update_about_interv($data,$_FILES);
                $arr['message'] = "interventions updated successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "edit_about_interv";
                echo json_encode($arr);
                
            } else            
            if ($data->data_type == "delete_about_interventions") {
                $portfolio->delete_about_interventions($data->id);
                $arr['message'] = "intervention deleted successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_about_interventions";
                echo json_encode($arr);             
            } else 
            if ($data->data_type == "delete_contact") {
                $portfolio->delete_contacts($data->id);
                $arr['message'] = "contact deleted successfully";
                $_SESSION['error'] = "";
                $arr['message_type'] = "info";
                $arr['data_type'] = "delete_contact";
                echo json_encode($arr);             
            }        
        }
        // show($data->data_type);
    }
   
}