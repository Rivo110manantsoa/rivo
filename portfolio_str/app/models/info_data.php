<?php

class info_data extends database{
    // insert portfolio
    public function insert($POST,$FILES,){
        $_SESSION['error'] = "";

        $arr['title'] = ucwords($POST->title);
        $arr['description'] = ucwords($POST->description);
        $arr['link'] = ucwords($POST->link);
        $arr['date'] = date('d-m-Y');
        
        

        if (empty($arr['title'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }
        if (empty($arr['description'])) {
            $_SESSION['error'] = "Please inter a valid description";
        }
        if (empty($arr['link'])) {
            $_SESSION['error'] = "Please inter a valid link";
        }
        if (empty($arr['date'])) {
            $_SESSION['error'] = "Please inter a valid date";
        }

        $arr['image1'] = "";
        $arr['image2'] = "";
        $arr['image3'] = "";
        $arr['image4'] = "";
        $arr['image5'] = "";

        $size = 10;
        $sizemax =($size * 1024 * 1024);
        $allowed = ["image/jpeg","image/jpg","image/png"];
        $folder = "portfolio_uploads/";

        if (!file_exists($folder)) {
            mkdir($folder,0777,true);
        }

        // check files
        foreach ($FILES as $key => $img_row) {
            if ($img_row['error'] == 0 && in_array($img_row['type'],$allowed)) {
                if ($img_row['size'] < $sizemax) {
                    // Generate once name image
                    $ext = pathinfo($img_row['name'], PATHINFO_EXTENSION);
                    $uniqueName = uniqid("portf_",true) . "." . $ext;

                   $dest = $folder .$uniqueName;
                   move_uploaded_file($img_row['tmp_name'],$dest);
                   $arr[$key] = $dest;
                }
                else {
                    $_SESSION['error'] .= $key . "is so bigger";
                    
                }
            }
        }


        if (empty($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "INSERT INTO portfolioos(title,description,image1,image2,image3,image4,image5,link,date)
                 VALUES(:title,:description,:image1,:image2,:image3,:image4,:image5,:link,:date)";
            $result = $this->runQuery($sql,$arr);
            if ($result) {               
                return true;
            }
        }

        return false;
        // show($POST);show($FILES);
    }
  
// update portfolio
    public function update($POST, $FILES) {
        $_SESSION['error'] = "";
        $arr['id'] = (int)$POST->id;
        $arr['title'] = ucwords($POST->title);
        $arr['description'] = ucwords($POST->description);
        $arr['link'] = ucwords($POST->link);
        $arr['date'] = $POST->date;
        // show($POST->title);die;
        // Validation
        if (empty($arr['title'])) {
            $_SESSION['error'] .= "Please enter a valid title. <br>";
        }
        if (empty($arr['description'])) {
            $_SESSION['error'] .= "Please enter a valid description. <br>";
        }
        if (empty($arr['link'])) {
            $_SESSION['error'] .= "Please enter a valid link. <br>";
        }
        if (empty($arr['date'])) {
            $_SESSION['error'] .= "Please enter a valid date. <br>";
        }
    
        $imgs = "";
    
        $sizeMax = 20 * 1024 * 1024; // Limite en bytes (20 Mo)
        $allowed = ["image/jpeg", "image/jpg", "image/png"];
        $folder = "portfolio_uploads/";
    
        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        $cportf = $this->runQuery("SELECT * FROM portfolioos WHERE id=:id",['id'=>$POST->id]);
    
       foreach ($_FILES as $key => $value) {
            if ($value['error'] == 0 && in_array($value['type'],$allowed)) {
               if ($value['size'] < $sizeMax) {
                    $ext = pathinfo($value['name'],PATHINFO_EXTENSION);
                    $uniqueName = uniqid('img_',true) . '.' .$ext;
                    $dest = $folder .$uniqueName;

                    if (move_uploaded_file($value['tmp_name'],$dest)) {
                        $current_img = $cportf[0]->$key;
                        $img_root = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']) . $current_img;
                        if (!empty($current_img) && file_exists($img_root)) {
                            remove_image($img_root);
                        }
                        $arr[$key] = $dest;
                        $imgs .= "," . $key . "=:" . $key; 
                    } else {
                        $_SESSION['error'] .= "failled to upload image" . $key;
                    }
               } else {
                    $_SESSION['error'] .= $key . "is to large";
               }
            }
       }
    
        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE portfolioos SET title=:title, description=:description, link=:link, date=:date $imgs WHERE id=:id"; 
            // show($sql);die;
            return $this->runQuery($sql, $arr);
        } else {
            return false;
        }
    }

    // view back portfolio
    public function get_portfolios(){

        $limit = 20;
        $offset = Page::get_offset($limit);
        $sql = "SELECT * FROM portfolioos ORDER BY id DESC LIMIT $limit OFFSET $offset";
        return $this->runQuery($sql);
    }

    // view front portfolio
    public function get_portfolios_front(){        
        
        $sql = "SELECT * FROM portfolioos ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // view back contact
    public function get_contacts(){   
        
        $limit = 20;
        $offset = Page::get_offset($limit);
        $sql = "SELECT * FROM contacts ORDER BY id DESC LIMIT $limit OFFSET $offset";
        return $this->runQuery($sql);
    }


    // view back blog
    public function get_blogs(){

        $limit = 20;
        $offset = Page::get_offset($limit);
        $sql = "SELECT * FROM blogs ORDER BY id DESC LIMIT $limit OFFSET $offset";
        return $this->runQuery($sql);
    }   

    // view blog
    public function get_blogs_front(){       
        $sql = "SELECT * FROM blogs ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // view details portfolio
    public function get_details($id){
        $id = (int)$id;
        $sql = "SELECT * FROM portfolioos WHERE id=:id LIMIT 1";
        return $this->runQuery($sql, ['id' => $id]);
    }

     // view details blog
     public function get_details_blog($id){
        $id = (int)$id;
        $sql = "SELECT * FROM blogs WHERE id=:id LIMIT 1";
        return $this->runQuery($sql, ['id' => $id]);
    }

    // delete base portfolio
    public function delete_portfolio($id) {
        $id = (int)$id;
    
        $curSql = "SELECT * FROM portfolioos WHERE id=:id";
        $cportf = $this->runQuery($curSql, ['id' => $id]);
    
        if ($cportf) {
            $images = ['image1','image2','image3','image3','image4','image5'];
            $old_path = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']);

            foreach ($images as $key) {
                $current_img = $cportf[0]->$key;
                $img_root = $old_path . $current_img;
                // Supprimez l'image si elle existe et n'est pas un répertoire
                remove_image($img_root);
            }

            $sql = "DELETE FROM portfolioos WHERE id=:id";
            return $this->runQuery($sql, ['id' => $id]);
        }

        return false;
    }

    // comment request
    public function insert_comment($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";
        $data['portfolioId'] = (int)$POST['portfolioId'];
        $data['name'] = ucfirst(trim($POST['name']));
        $data['message'] = ucfirst(trim($POST['message']));
            // show($data);
        // validation
        if (empty($data['name'])) {
            $_SESSION['error'] .= "Please inter your name first";
        }
        if (empty($data['message'])) {
            $_SESSION['error'] .= "Please inter your comment first";
        }
        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "INSERT INTO portfolio_comments(name,message,portfolioId) VALUES (:name,:message,:portfolioId)";
            $result = $this->runQuery($sql,$data);
            if ($result) {
                $_SESSION['success'] .= "message sent successfully";
            }
        } else{
            $_SESSION['error'] .= "message blocked";
        }
    }

    // view comment  
    public function get_comments($id){       
            // $sql = "SELECT * FROM portfolio_comments ORDER BY id desc";
            $id = (int)$id;
            $sql = "SELECT portfolioos.*, portfolio_comments.name,portfolio_comments.message FROM portfolioos
            JOIN portfolio_comments ON portfolio_comments.portfolioId = portfolioos.id
            WHERE portfolioos.id=:id
            ORDER BY portfolio_comments.id DESC";
            return $this->runQuery($sql,['id'=>$id]);           
        
    }
    // view comment  
    public function get_reviews(){       
            // $sql = "SELECT * FROM portfolio_comments ORDER BY id desc";
            
            $sql = "SELECT portfolioos.*, portfolio_comments.name,portfolio_comments.message FROM portfolioos
            JOIN portfolio_comments ON portfolio_comments.portfolioId = portfolioos.id           
            ORDER BY portfolio_comments.id DESC";
            return $this->runQuery($sql);           
        
    }
    public function get_reviews_blog(){       
        // $sql = "SELECT * FROM portfolio_comments ORDER BY id desc";
        
        $sql = "SELECT blogs.*, blog_comments.firstname,blog_comments.comment FROM blogs
        JOIN blog_comments ON blog_comments.blogId = blogs.id           
        ORDER BY blog_comments.id DESC";
        return $this->runQuery($sql);           
    
}

    // view comment blog
    public function insert_comment_blog($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";
        $data['blogId'] = (int)$POST['blogId'];
        $data['firstname'] = ucfirst(trim($POST['firstname']));
        $data['comment'] = ucfirst(trim($POST['comment']));
            // show($data);
        // validation
        if (empty($data['firstname'])) {
            $_SESSION['error'] .= "Please inter your firstname first";
        }
        if (empty($data['comment'])) {
            $_SESSION['error'] .= "Please inter your comment first";
        }
        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "INSERT INTO blog_comments(firstname,comment,blogId) VALUES (:firstname,:comment,:blogId)";
            $result = $this->runQuery($sql,$data);
            if ($result) {
                $_SESSION['success'] .= "comment sent successfully";
            }
        } else{
            $_SESSION['error'] .= "comment blocked";
        }
    }   

     // view comment blog 
     public function get_comments_blog($id){    
        $id = (int)$id;     
        // $sql = "SELECT * FROM blog_comments ORDER BY id DESC";           

        $sql = "SELECT blogs.*, blog_comments.firstname,blog_comments.comment FROM blogs
        JOIN blog_comments ON blog_comments.blogId = blogs.id
        WHERE blogs.id=:id
        ORDER BY blog_comments.id DESC";
        
        return $this->runQuery($sql,['id'=>$id]);           
    
    }

    // insert blog
    public function insert_blog($POST,$FILES){

        $_SESSION['error'] = "";

        $arr['title'] = ucwords($POST->title);
        $arr['description'] = ucwords($POST->description);
        $arr['date'] = date('d-M-Y');
        
        

        if (empty($arr['title'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }
        if (empty($arr['description'])) {
            $_SESSION['error'] = "Please inter a valid description";
        }

        $arr['image'] = "";
        $arr['image2'] = "";
       

        $size = 10;
        $sizemax =($size * 1024 * 1024);
        $allowed = ["image/jpeg","image/jpg","image/png"];
        $folder = "blog_uploads/";

        if (!file_exists($folder)) {
            mkdir($folder,0777,true);
        }

        // check files
        foreach ($FILES as $key => $img_row) {
            if ($img_row['error'] == 0 && in_array($img_row['type'],$allowed)) {
                if ($img_row['size'] < $sizemax) {
                    // Generate once name image
                    $ext = pathinfo($img_row['name'], PATHINFO_EXTENSION);
                    $uniqueName = uniqid("blog_",true) . "." . $ext;

                   $dest = $folder .$uniqueName;
                   move_uploaded_file($img_row['tmp_name'],$dest);
                   $arr[$key] = $dest;
                }
                else {
                    $_SESSION['error'] .= $key . "is so bigger";
                    
                }
            }
        }


        if (empty($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "INSERT INTO blogs(title,description,image,image2,date)
                 VALUES(:title,:description,:image,:image2,:date)";
            $result = $this->runQuery($sql,$arr);
            // show($POST);show($FILES);
            if ($result) {               
                return true;
            }
        }

        return false;
       
    }

    // update blog
    public function update_blog($POST,$FILES){

        $_SESSION['error'] = "";
        $arr['id'] = (int)$POST->id;
        $arr['title'] = ucwords($POST->title);
        $arr['description'] = ucwords($POST->description);
        $arr['date'] = date('d-M-Y H:i:s');      
        
        if (empty($arr['title'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }
        if (empty($arr['description'])) {
            $_SESSION['error'] = "Please inter a valid description";
        }

        $imgs = "";       

        $size = 10;
        $sizemax =($size * 1024 * 1024);
        $allowed = ["image/jpeg","image/jpg","image/png"];
        $folder = "blog_uploads/";

        if (!file_exists($folder)) {
            mkdir($folder,0777,true);
        }

        $blog = $this->runQuery("SELECT * FROM blogs WHERE id=:id",['id'=>$POST->id]);

        // check files
        foreach ($FILES as $key => $img_row) {
            if ($img_row['error'] == 0 && in_array($img_row['type'],$allowed)) {
                if ($img_row['size'] < $sizemax) {
                    // Generate once name image
                    $ext = pathinfo($img_row['name'], PATHINFO_EXTENSION);
                    $uniqueName = uniqid("blog_",true) . "." . $ext;

                    $dest = $folder .$uniqueName;
                    
                    if ( move_uploaded_file($img_row['tmp_name'],$dest)) {
                        $current_img = $blog[0]->$key;
                        $img_root = str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']) . $current_img;
                        if (!empty($current_img) && file_exists($img_root)) {
                            remove_image($img_root);
                        }
                        $arr[$key] = $dest;
                        $imgs .= "," .$key . "=:" . $key;
                    } else {
                        $_SESSION['error'] .= "failled to upload image" . $key;
                    }
                    
                } else {
                    $_SESSION['error'] .= $key . "is so bigger";                  
                    
                }
            }
        }

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE blogs SET title=:title, description=:description,date=:date $imgs WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    }

    // delete base blog
    public function delete_blog($id) {
        $id = (int)$id;
    
        $curSql = "SELECT * FROM blogs WHERE id=:id";
        $blog = $this->runQuery($curSql, ['id' => $id]);
    
        if ($blog) {
            $images = ['image','image2'];
            $old_path = str_replace("index.php", "", $_SERVER['SCRIPT_FILENAME']);

            foreach ($images as $key) {
                $current_img = $blog[0]->$key;
                $img_root = $old_path . $current_img;
                // Supprimez l'image si elle existe et n'est pas un répertoire
                remove_image($img_root);
            }

            $sql = "DELETE FROM blogs WHERE id=:id";
            return $this->runQuery($sql, ['id' => $id]);
        }

        return false;
    }

     // delete base contact
    public function delete_contacts($id) {
        $id = (int)$id;    

        $sql = "DELETE FROM contacts WHERE id=:id";
        return $this->runQuery($sql, ['id' => $id]);       
        
    }

    // admin
    public function add_about_me($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['texts'] = htmlspecialchars($POST->texts);

        if (empty($arr['texts'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO abouts( texts) VALUES (:texts)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }

    public function update_about_me($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['texts'] = htmlspecialchars($POST->texts);
           
        
        if (empty($arr['texts'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE abouts SET texts=:texts WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

    // delete base abouts
    public function delete_about_me($id){
        $id = (int)$id;
        $sql = "DELETE FROM abouts WHERE id=:id";
        return $this->runQuery($sql,['id'=>$id]);

    }


    // admin
    public function show_about_me(){

       
        $sql = "SELECT * FROM abouts ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about(){
        $sql = "SELECT * FROM abouts ORDER BY id DESC LIMIT 1";
        return $this->runQuery($sql);
    }
   
      // admin
    public function add_about_educations($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['diploma'] = htmlspecialchars($POST->diploma);
        $arr['school'] = htmlspecialchars($POST->school);
        $arr['year'] = htmlspecialchars($POST->year);

        if (empty($arr['diploma'])) {
            $_SESSION['error'] = "Please inter a valid diploma";
        }
        if (empty($arr['school'])) {
            $_SESSION['error'] = "Please inter a valid school";
        }
        if (empty($arr['year'])) {
            $_SESSION['error'] = "Please inter a valid year";
        }
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO educations(diploma,school,year) VALUES (:diploma,:school,:year)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }

    public function update_about_ed($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['diploma'] = htmlspecialchars($POST->diploma);
        $arr['school'] = htmlspecialchars($POST->school);
        $arr['year'] = htmlspecialchars($POST->year);
           
        
        if (empty($arr['diploma'])) {
            $_SESSION['error'] = "Please inter a valid diploma";
        }    
        if (empty($arr['school'])) {
            $_SESSION['error'] = "Please inter a valid school";
        }    
        if (empty($arr['year'])) {
            $_SESSION['error'] = "Please inter a valid year";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE educations SET diploma=:diploma,school=:school,year=:year WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

     // admin
    public function show_about_educations(){
        $sql = "SELECT * FROM educations ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_educations(){
        $sql = "SELECT * FROM educations ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }

    // delete base about_educations
    public function delete_about_educations($id){
        $id = (int)$id;

        $sql = "DELETE FROM educations WHERE id=:id";
        return $this->runQuery($sql,['id'=>$id]);

    }

    // admin
    public function add_about_experiences($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['experiences'] = htmlspecialchars($POST->experiences);
        $arr['society'] = htmlspecialchars($POST->society);
        $arr['years'] = htmlspecialchars($POST->years);

        if (empty($arr['experiences'])) {
            $_SESSION['error'] = "Please inter a valid experiences";
        }
        if (empty($arr['society'])) {
            $_SESSION['error'] = "Please inter a valid society";
        }
        if (empty($arr['years'])) {
            $_SESSION['error'] = "Please inter a valid years";
        }
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO experiences(experiences,society,years) VALUES (:experiences,:society,:years)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }

    public function update_about_exp($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['experiences'] = htmlspecialchars($POST->experiences);
        $arr['society'] = htmlspecialchars($POST->society);
        $arr['years'] = htmlspecialchars($POST->years);
           
        
        if (empty($arr['experiences'])) {
            $_SESSION['error'] = "Please inter a valid experience";
        }    
        if (empty($arr['society'])) {
            $_SESSION['error'] = "Please inter a valid society";
        }    
        if (empty($arr['years'])) {
            $_SESSION['error'] = "Please inter a valid years";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE experiences SET experiences=:experiences,society=:society,years=:years WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

    // delete base about_experiences
    public function delete_about_experiences($id) {
        $id = (int)$id;    

            $sql = "DELETE FROM experiences WHERE id=:id";
            return $this->runQuery($sql, ['id' => $id]);
       
    }

     // admin
     public function show_about_experiences(){
        $sql = "SELECT * FROM  experiences ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_experiences(){
        $sql = "SELECT * FROM experiences ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }

    // admin
    public function add_about_skills($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['ski1'] = htmlspecialchars($POST->ski1);
        $arr['ski2'] = htmlspecialchars($POST->ski2);
        $arr['skidate'] = htmlspecialchars($POST->skidate);

        if (empty($arr['ski1'])) {
            $_SESSION['error'] = "Please inter a valid text";
        }
        if (empty($arr['ski2'])) {
            $_SESSION['error'] = "Please inter a valid text2";
        }
        if (empty($arr['skidate'])) {
            $_SESSION['error'] = "Please inter a valid skidate";
        }
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO skills (ski1,ski2,skidate) VALUES (:ski1,:ski2,:skidate)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }

    public function update_about_ski($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['ski1'] = htmlspecialchars($POST->ski1);
        $arr['ski2'] = htmlspecialchars($POST->ski2);
        $arr['skidate'] = htmlspecialchars($POST->skidate);
           
        
        if (empty($arr['ski1'])) {
            $_SESSION['error'] = "Please inter a valid text";
        }    
        if (empty($arr['ski2'])) {
            $_SESSION['error'] = "Please inter a valid text2";
        }    
        if (empty($arr['skidate'])) {
            $_SESSION['error'] = "Please inter a valid date";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE skills SET ski1=:ski1,ski2=:ski2,skidate=:skidate WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }


     // delete base about_skills
     public function delete_about_skills($id){
       $id = (int)$id;
       $sql = "DELETE FROM skills WHERE id=:id";
       return $this->runQuery($sql,['id'=>$id]);

    }

    // admin
    public function show_about_skills(){
        $sql = "SELECT * FROM  skills ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_skills(){
        $sql = "SELECT * FROM skills ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }

    // admin
      public function add_about_languages($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['titre'] = htmlspecialchars($POST->titre);
        $arr['langs'] = htmlspecialchars($POST->langs);
        

        if (empty($arr['titre'])) {
            $_SESSION['error'] = "Please inter a valid titre";
        }        
        if (empty($arr['langs'])) {
            $_SESSION['error'] = "Please inter a valid language";
        }        
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO languages (titre,langs) VALUES (:titre,:langs)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }

    public function update_about_lng($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['titre'] = htmlspecialchars($POST->titre);
        $arr['langs'] = htmlspecialchars($POST->langs);
        
           
        
        if (empty($arr['titre'])) {
            $_SESSION['error'] = "Please inter a valid titre";
        }    
        if (empty($arr['langs'])) {
            $_SESSION['error'] = "Please inter a valid languages";
        }    
       

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE languages SET titre=:titre,langs=:langs WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

     // delete base about_languages
     public function delete_about_languages($id){
        $id = (int)$id;
        $sql = "DELETE FROM languages WHERE id=:id";
        return $this->runQuery($sql,['id'=>$id]);
 
     }

    // admin
    public function show_about_languages(){
        $sql = "SELECT * FROM  languages ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_languages(){
        $sql = "SELECT * FROM languages ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }

    // admin
    public function add_about_interests($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['titre1'] = htmlspecialchars($POST->titre1);
        $arr['titre2'] = htmlspecialchars($POST->titre2);
        

        if (empty($arr['titre1'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }        
        if (empty($arr['titre2'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }        
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO interests (titre1,titre2) VALUES (:titre1,:titre2)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
                return true;
            }
        } 
        return false;
    }

    public function update_about_int($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['titre1'] = htmlspecialchars($POST->titre1);
        $arr['titre2'] = htmlspecialchars($POST->titre2);
           
        
        if (empty($arr['titre1'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }    
        if (empty($arr['titre2'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE interests SET titre1=:titre1, titre2=:titre2 WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

     // delete base about_interests
     public function delete_about_interests($id){
        $id = (int)$id;
        $sql = "DELETE FROM interests WHERE id=:id";
        return $this->runQuery($sql,['id'=>$id]);
 
     }

    // admin
    public function show_about_interests(){
        $sql = "SELECT * FROM  interests ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_interests(){
        $sql = "SELECT * FROM interests ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }

      // admin
      public function add_about_interventions($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        $arr['head'] = htmlspecialchars($POST->head);
        $arr['body'] = htmlspecialchars($POST->body);
        

        if (empty($arr['head'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }        
        if (empty($arr['body'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }        
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO interventions (head,body) VALUES (:head,:body)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
                return true;
            }
        } 
        return false;
    }

    public function update_about_interv($POST){
        $_SESSION['error'] = "";
        
        $arr['id'] = (int)$POST->id;
        $arr['head'] = htmlspecialchars($POST->head);
        $arr['body'] = htmlspecialchars($POST->body);
           
        
        if (empty($arr['head'])) {
            $_SESSION['error'] = "Please inter a valid title";
        }    
        if (empty($arr['body'])) {
            $_SESSION['error'] = "Please inter a valid texts";
        }    

    //    show($arr);

        if (!isset($_SESSION['error']) || $_SESSION['error'] == "") {
            $sql = "UPDATE interventions SET head=:head,body=:body WHERE id=:id";               
            return $this->runQuery($sql,$arr);
           
        } else {
            return false;
        }       
    
    }

     // delete base about_interventions
     public function delete_about_interventions($id){
        $id = (int)$id;
        $sql = "DELETE FROM interventions WHERE id=:id";
        return $this->runQuery($sql,['id'=>$id]);
 
     }

    // admin
    public function show_about_interventions(){
        $sql = "SELECT * FROM  interventions ORDER BY id DESC";
        return $this->runQuery($sql);
    }

    // front
    public function about_interventions(){
        $sql = "SELECT * FROM interventions ORDER BY id DESC LIMIT 3";
        return $this->runQuery($sql);
    }


    // contact
     // admin
     public function insert_contact($POST){
        $_SESSION['error'] = "";
        $_SESSION['success'] = "";

        // $POST = (string)$POST;

        $arr['name'] = ucfirst($POST['name']);
        $arr['subject'] = ucfirst($POST['subject']);
        $arr['email'] = ucfirst($POST['email']);
        $arr['phone'] = ucfirst($POST['phone']);
        $arr['message'] = ucfirst($POST['message']);

        if (empty($arr['name'])) {
            $_SESSION['error'] = "Please inter a valid name";
        }
        if (empty($arr['subject'])) {
            $_SESSION['error'] = "Please inter a valid subject";
        }
        if (empty($arr['email'])) {
            $_SESSION['error'] = "Please inter a valid email";
        }
        if (empty($arr['phone'])) {
            $_SESSION['error'] = "Please inter a valid telephone";
        }
        if (empty($arr['message'])) {
            $_SESSION['error'] = "Please inter a valid message";
        }
        // show($arr);
        if ($_SESSION['error'] == "" || !isset($_SESSION['error'])) {
            $sql = "INSERT INTO contacts(name,subject,email,phone,message) VALUES (:name,:subject,:email,:phone,:message)";
            $ok = $this->runQuery($sql, $arr);
            if ($ok) {
               return true;
            }
        } 
        return false;
    }





    // public function send_mail($POST){

    //     $_SESSION['error'] = "";
    //     $_SESSION['success'] = "";
    //     $name = htmlspecialchars($POST['name']);
    //     $subject = htmlspecialchars($POST['subject']);
    //     $email = htmlspecialchars($POST['email']);
    //     $phone = htmlspecialchars($POST['phone']);
    //     $message = htmlspecialchars($POST['message']);

    //     $to = "herimandibyrivo@gmail.com";
    //     $email_message = "
    //         sender_name:<b>$name</b><br>
    //         sender_email:<em>$email</em><br>
    //         object:<strong>$subject</strong><br>
    //         message:$message<br>
    //     ";
    //     $headers = "From:$email\r\n";
    //     $headers .= "Reply-To:$email\r\n";
    //     $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    //     if (mail($to,$subject,$email_message,$headers)) {
    //         $_SESSION['success'] .= "email sent successfully";
    //     } else {
    //         $_SESSION['error'] .= "email not sent";
    //     }
        
    // }

    // search views
    public function search_portfolio($SEARCH){
        $find = htmlspecialchars(htmlentities(trim($SEARCH['search'])));
        // show($find);
        $sql = "SELECT * FROM portfolioos WHERE title LIKE '%".$find."%'";
        return $this->runQuery($sql);
    }

    public function search_blog($TEST){
        $find = htmlspecialchars(htmlentities(trim($TEST['search'])));
        // show($find);
        $sql = "SELECT * FROM blogs WHERE title LIKE '%".$find."%'";
        return $this->runQuery($sql);
    }

    // search back
    public function search_portfolio_back($BACKS){
        $find = htmlspecialchars(htmlentities(trim($BACKS['search'])));
        $sql = "SELECT * FROM portfolioos WHERE title LIKE '%".$find."%'";
        return $this->runQuery($sql);
    }

    public function search_blog_back($BACKS){
        $find = htmlspecialchars(htmlentities(trim($BACKS['search'])));
        $sql = "SELECT * FROM blogs WHERE title LIKE '%".$find."%'";
        return $this->runQuery($sql);
    }
    public function search_contact_back($BACKS){
        $find = htmlspecialchars(htmlentities(trim($BACKS['search'])));
        $sql = "SELECT * FROM contacts WHERE subject LIKE '%".$find."%'";
        return $this->runQuery($sql);
    }


   
}