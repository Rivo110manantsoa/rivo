<?php 
    class Home_admin extends Controller{
        public function index() {

            $data['page'] = "home_admin";

            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

           
            $this->load_view("admin/index",$data);
        }

        public function portfolio(){

            $data['page'] = "admin_portfolio";

            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

            $portf = $this->load_model("info_data");
            $data['rows'] = $portf->get_portfolios();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // show($_POST);
                $data['rows'] = $portf->search_portfolio_back($_POST);
            }

            $this->load_view('admin/portfolio',$data);
        }

        public function about(){

            $data['page'] = "admin_about";

            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

            $about = $this->load_model("info_data");
            $data['about_me'] = $about->show_about_me();

            $education = $this->load_model("info_data");
            $data['education'] = $education->show_about_educations();

            $experience = $this->load_model("info_data");
            $data['experience'] = $experience->show_about_experiences();

            $skill = $this->load_model("info_data");
            $data['skills'] = $skill->show_about_skills();

            $language = $this->load_model("info_data");
            $data['languages'] = $language->show_about_languages();

            $interest = $this->load_model("info_data");
            $data['interests'] = $interest->show_about_interests();

            $intervention = $this->load_model("info_data");
            $data['interventions'] = $intervention->show_about_interventions();
            
            $this->load_view('admin/about',$data);
        }

        public function blog(){

            $data['page'] = "admin_blog";

            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

            $blog = $this->load_model("info_data");
            $data['rows'] = $blog->get_blogs();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // show($_POST);
                $data['rows'] = $blog->search_blog_back($_POST);
            }

            $this->load_view('admin/blog',$data);
        }       

        public function contact(){

            $data['page'] = "admin_contact";

            $user = $this->load_model("user_model");
            $user->check_user(true,['admin']);

            $contact = $this->load_model('info_data');
            $data['conts'] = $contact->get_contacts();

            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                // show($_POST);
                $data['conts'] = $contact->search_contact_back($_POST);
            }

            $this->load_view('admin/contact',$data);
        }
    }