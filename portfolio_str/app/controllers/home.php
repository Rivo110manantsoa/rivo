<?php

class Home extends Controller {

    public function index() {

        $data['page'] = "home";
       
        $portf = $this->load_model("info_data");
        $data['portfolios'] = $portf->get_portfolios();   
        
         // search
         if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // show($_POST);
        $data['portfolios'] = $portf->search_portfolio($_POST);
        }


        $this->load_view("index",$data);
    }

  
    public function details($id) {
        if (isset($_SESSION['error'])) {
             $_SESSION['error'] = $_GET[$_SESSION['error']] ?? null;
        }
        if (isset($_SESSION['success'])) {
             $_SESSION['success'] = $_GET[$_SESSION['success']] ?? null;
        }
         $data['page'] = "Portfolio_details";
 
         $portf = $this->load_model("info_data");
         $row = $portf->get_details($id);
       
    // show($row);
         if ($row) {
             $data['row'] = $row[0];
         }
 
 
         if ($_SERVER['REQUEST_METHOD'] == "POST") {
             $portf->insert_comment($_POST);
            //  redirect("home/details/" . $id);
         } else {
             unset($_SESSION['error']);
             unset($_SESSION['success']);
         }
         $data['comments'] = $portf->get_comments($id);
         
         $this->load_view("details",$data);
    }
        
    public function details_blog($id) {
        if (isset($_SESSION['error'])) {
             $_SESSION['error'] = $_GET[$_SESSION['error']] ?? null;
        }
        if (isset($_SESSION['success'])) {
             $_SESSION['success'] = $_GET[$_SESSION['success']] ?? null;
        }
         $data['page'] = "blog_details";
 
         $blog = $this->load_model("info_data");
         $row = $blog->get_details_blog($id);
    // show($row);
         if ($row) {
             $data['row'] = $row[0];
         }
 
 
         if ($_SERVER['REQUEST_METHOD'] == "POST") {
             $blog->insert_comment_blog($_POST);
            //  redirect("home/details/" . $id);
         } else {
             unset($_SESSION['error']);
             unset($_SESSION['success']);
         }
         $data['commblgs'] = $blog->get_comments_blog($id);
         
         $this->load_view("details_blog",$data);
    }    

    public function about(){
        $about = $this->load_model("info_data");
        $education = $this->load_model("info_data");
        $experience = $this->load_model("info_data");
        $skill = $this->load_model("info_data");
        $language = $this->load_model("info_data");
        $interest = $this->load_model("info_data");
        $intervention = $this->load_model("info_data");

        // $portf = $this->load_model("info_data");

        $data['page'] = "about";
        $data['rows'] = $about->about();
        $data['educs'] = $education->about_educations();
        $data['expers'] = $experience->about_experiences();
        $data['skills'] = $skill->about_skills();
        $data['languages'] = $language->about_languages();
        $data['interests'] = $interest->about_interests();
        $data['interventions'] = $intervention->about_interventions();
        $data['reviews'] = $about->get_reviews();
        $data['reviews_blog'] = $about->get_reviews_blog();
        // show($data['reviews']);

        // $data['comments'] = $portf->get_comments($id);
        // show($data['rows']);
        $this->load_view('about',$data);
    }

    public function contact(){

        if (isset($_SESSION['error'])) {
            $_SESSION['error'] = $_GET[$_SESSION['error']] ?? null;
       }
       if (isset($_SESSION['success'])) {
            $_SESSION['success'] = $_GET[$_SESSION['success']] ?? null;
       }

        $data['page'] = "contact";

        $contact = $this->load_model("info_data");
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contact->insert_contact($_POST);
        } else {
            unset($_SESSION['error']);
            unset($_SESSION['success']);
        }       

        $this->load_view('contact',$data);
    }
       
    public function portfolio(){

        $data['page'] = "portfolio";

        $portfolio = $this->load_model("info_data");
        $data['portfolios'] = $portfolio->get_portfolios_front();

        // search
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // show($_POST);
        $data['portfolios'] = $portfolio->search_portfolio($_POST);
        }

        $this->load_view('portfolio',$data);
    }

    public function blog(){

        $data['page'] = "blog";   
        
        $blog = $this->load_model("info_data");
        $data['blogs'] = $blog->get_blogs_front();

        // search
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            // show($_POST);
            $data['blogs'] = $blog->search_blog($_POST);
        }

        $this->load_view('blog',$data);
    }
}
    

