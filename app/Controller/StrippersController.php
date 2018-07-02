<?php

App::uses('AppController', 'Controller');

/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class StrippersController extends AppController {

    /**
     * Components
     *
     * @var array
     */

    
    public $components = array('Paginator','Session');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('classifiedads','stripperdashboard','mypphoto','deletephoto','myvideo','deletevideo','editstripperprofile','editStripperAbout','emailmessage','rateandservice','mybookingrequests','mycomments','myreviews','myfollowing','myfollowerupdates','adonservices','mypurchasedlists','credittransactions','accountsettings','jobs','job_add','happy_hours_escorts','addescort','set_happy_hours','deletehappyhours');
    }     
    
    
    
    /**
     * index method
     *
     * @return void
     */
    /* public function admin_index() {
      $this->Category->recursive = 0;
      $this->set('rules', $this->Paginator->paginate());
      } */

      
    public function admin_index() {

        $this->loadModel("User");
        $this->User->recursive = 0;


        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {

            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if ($value) {
                    $filter_url[$name] = urlencode($value);
                }
            }
            return $this->redirect($filter_url);
        } else {


            $limit = 20;
            //$conditions['User.is_admin']=1;
            $conditions['User.id !='] = '';
            $conditions['User.is_admin !='] = 1;
            $conditions['User.user_type'] = 'E';
            $conditions['User.is_active'] = 1;
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'name') {
                        $conditions['User.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['User.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "User.join_date asc";
                    } else if ($direction == 'New') {
                        $order_by = "User.join_date desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "User.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "User.id desc";
                    } else {
                        $order_by = "User.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "User.id desc";
        }
        //$condition1=array('User.is_admin !=' => 1,'User.user_type' => 'E','User.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_user = $this->User->find('count', array('conditions' => array('User.is_admin !=' => 1, 'User.user_type' => 'E', 'User.is_active' => 1)));

        $users = $this->Paginator->paginate('User');
        $this->set(compact('users', 'total_user'));
    }

    public function admin_add() {
        $this->loadModel('Stripper');

        if ($this->request->is('post')) {
            //echo "hello";exit;
            //echo "hello";exit;
            $options = array('conditions' => array('Stripper.username' => $this->request->data['Stripper']['username']));
            $bodytypeexists = $this->Stripper->find('first', $options);
            if (!$bodytypeexists) {

                $this->request->data['Stripper']['datetime'] = date('Y-m-d');
                //pr($this->request->data);exit;
                $this->Stripper->create();
                if ($this->Stripper->save($this->request->data)) {
                    $this->Session->setFlash('The Stripper has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The Stripper could not be saved. Please, try again.', 'default', array('class' => 'error')));
                }
            } else {

                $this->Session->setFlash(__('Stripper already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }
    }

    // /* public function countrywisecity($countryId=null) {
    //   $this->loadModel('City');
    //   if(!empty($countryId)){
    //   //$city = $this->City->find('list',array('fields'=>array('id','name'),'conditions'=>array('City.country_id'=>$countryId)));
    //   $city = $this->City->find('all','conditions'=>array('City.country_id' => $countryId));

    //   }
    //   else{
    //   $city = '';
    //   }
    //   pr($city);
    //   return $city;

    //   exit;
    //   } */

    public function admin_view($id = null) {
        /* $userid = $this->Session->read('userid');
          if(!isset($userid) && $userid==''){
          $this->redirect('/admin');
          }
          $title_for_layout = 'User View';
          $this->set(compact('title_for_layout'));
          if (!$this->User->exists($id)) {
          throw new NotFoundException(__('Invalid user'));
          } */
        $this->loadModel('User');
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $user = $this->User->find('first', $options);
        //pr($user);exit;
        if ($user['User']['profile_status'] == '0') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        if ($user['User']['is_email_verified'] == '1') {
            $emailVerify = 'Verified';
        } else {
            $emailVerify = 'Not verified';
        }
        if ($user['User']['subscribe_newsletter'] == '0') {
            $subs_newsletter = 'Not subscribed';
        } else {
            $subs_newsletter = 'Subscribed';
        }

        //  $this->loadModel('Multimageupload');
        //  $multimg = $this->Multimageupload->find('all',array('conditions'=>array('Multimageupload.user_id'=>$userid)));
        $data = '<tr><td style="width:55%;">Id</td><td>' . $user['User']['id'] . '</td></tr>'
                . '<tr><td>Name</td><td>' . $user['User']['name'] . '</td></tr>'
                . '<tr><td>Username</td><td>' . $user['User']['username'] . '</td></tr>'
                . '<tr><td>Email</td><td>' . $user['User']['email'] . '</td></tr>'
                . '<tr><td>Phone</td><td>' . $user['User']['phone_no'] . '</td></tr>'
                . '<tr><td>Zip Code</td><td>' . $user['User']['zipcode'] . '</td></tr>'
                . '<tr><td>Country</td><td>' . $user['Country']['name'] . '</td></tr>'
                . '<tr><td>City</td><td>' . $user['City']['name'] . '</td></tr>'
                . '<tr><td>Newsletter Subscription</td><td>' . $subs_newsletter . '</td></tr>'
                . '<tr><td>Is Mail Verified</td><td>' . $emailVerify . '</td></tr>'
                . '<tr><td>Profile Status</td><td>' . $status . '</td></tr>';
        //pr($user);exit;
        echo $data;
        exit;
        //$this->set(compact('multimg'));
    }

    

    public function admin_edit($id = null) {
        if (!$this->Stripper->exists($id)) {
            throw new NotFoundException(__('Invalid Stripper'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Stripper->save($this->request->data)) {
                $this->Session->setFlash(__('The Stripper has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The Stripper could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Stripper.' . $this->Stripper->primaryKey => $id));
            $this->request->data = $this->Stripper->find('first', $options);
        }
    }

    public function admin_delete($id = null) {
        $this->loadModel('User');
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash('The Stripper type has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The Stripper type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    //      ##################################################################    ////
    //      ##################################################################    //// 

    public function stripperdashboard() {
        
        if(!$this->Session->read('Auth.Stripper')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }  
        
        
        
        $this->loadModel("User");
        if ($this->Session->read('futype') != 'S') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        $title_for_layout = "Stripper Dashboard";
        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            //pr($this->request->data); pr($_FILES); exit;
            if ($this->request->data['formtype'] == "imgProfile") {
                $valid_exts = array('jpeg', 'jpg', 'png', 'gif');
                $max_file_size = 1024 * 1024 * 10; #200kb
                $nw = $nh = 400; # image with # height
                //echo "<pre>"; print_r($_POST); echo "<pre>"; print_r($_FILES); exit;
                $this->User->recursive = -1;
                $options = array('conditions' => array('User.id' => $this->request->data['id']));
                $getUser = $this->User->find('first', $options);
                //pr($getUser);
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_FILES['image'])) {
                        if (!$_FILES['image']['error'] && $_FILES['image']['size'] < $max_file_size) {
                            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
                            if (in_array($ext, $valid_exts)) {
                                $uploadFolder = "user_images";
                                $uploadPath = WWW_ROOT . $uploadFolder;
                                $imgname = "profile_img_" . $this->request->data['id'] . "." . $ext;
                                if ($getUser['User']['profile_image'] != "" &&
                                        $getUser['User']['profile_image'] != $imgname) {
                                    if (file_exists($uploadPath . DS . $getUser['User']['profile_image'])) {
                                        unlink($uploadPath . DS . '/' . $getUser['User']['profile_image']);
                                    }
                                }
                                $path = $uploadPath . '/' . $imgname;
                                //$path = 'uploads/' . uniqid() . '.' . $ext;
                                $size = getimagesize($_FILES['image']['tmp_name']);
                                $x = (int) $_POST['x'];
                                $y = (int) $_POST['y'];
                                $w = (int) $_POST['w'] ? $_POST['w'] : $size[0];
                                $h = (int) $_POST['h'] ? $_POST['h'] : $size[1];
                                $data = file_get_contents($_FILES['image']['tmp_name']);
                                $vImg = imagecreatefromstring($data);
                                $dstImg = imagecreatetruecolor($nw, $nh);
                                imagecopyresampled($dstImg, $vImg, 0, 0, $x, $y, $nw, $nh, $w, $h);
                                imagejpeg($dstImg, $path);
                                imagedestroy($dstImg);
                                // echo "<img src='$path' />";  Show Image in Browser
                                $this->User->id = $this->request->data['id'];
                                $this->User->saveField('profile_image', $imgname);
                                $this->Session->setFlash('Profile Image updated Successfully.', 'success');
                                $this->redirect(array('action' => 'Stripperdashboard'));
                            } else {
                                $this->Session->setFlash('Invalid Image Type. Please Upload jpeg,jpg,png,gif image.', 'info');
                                return $this->redirect(array('action' => 'Stripperdashboard'));
                            }
                        } else {
                            $this->Session->setFlash('Invalid Image Size. Please Upload Image sized below 1MB.', 'info');
                            return $this->redirect(array('action' => 'Stripperdashboard'));
                        }
                    } else {
                        $this->Session->setFlash('Invalid Image.', 'info');
                        return $this->redirect(array('action' => 'Stripperdashboard'));
                    }
                } else {
                    $this->Session->setFlash('Invalid Image Type.', 'info');
                    return $this->redirect(array('action' => 'Stripperdashboard'));
                }
            }
        }

        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; 
        //echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $user = $this->User->find('first', $option);
        //pr($user); exit;

        $this->set(compact('title_for_layout', 'user'));
    }

    public function editstripperprofile() {
        
        if(!$this->Session->read('Auth.Stripper')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }          
        
        
        $this->loadModel("User");
        //if(empty($this->Session->read('futype'))){ $this->Session->setFlash('You are not authorised for that page. Please logged in as User'); 
        //$this->redirect(array('action' => 'index')); }
        if ($this->Session->read('futype') != 'S') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        $title_for_layout = "Edit Profile";
        if ($this->request->is('post')) {
            if ($this->request->data['ftype'] == "contactinfo") {
               //pr($this->request->data); exit;
                $flag = true;
                /*
                  if($this->request->data['password'] != ""){
                  if($this->request->data['cpassword'] == ""){
                  $this->Session->setFlash('Enter Confirm Password.','info');
                  $flag = false;
                  }

                  if($this->request->data['password'] != $this->request->data['cpassword']){
                  $this->Session->setFlash('Confirm Password not matched.','info');
                  $flag = false;
                  }
                  $this->request->data['User']['txt_password'] = $this->request->data['password'];
                  }
                 */
                if ($flag) {
                    $this->request->data['User']['phone_no'] = $this->request->data['phone_no'];
                    $this->request->data['User']['website_url'] = $this->request->data['website_url'];
                    $this->request->data['User']['skypeid'] = $this->request->data['skypeid'];
                    $this->request->data['User']['facebook_url'] = $this->request->data['facebook_url'];
                    //pr($this->request->data); exit;
                    $this->User->id = $this->Session->read('fuid');
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Contact Information Updated Successfully.', 'success');
                        $this->redirect(array('action' => 'editstripperprofile'));
                    }
                }
            } else if ($this->request->data['ftype'] == "persionalinfo") {
              // pr($this->request->data); exit;
                $flag = true;
                if ($flag) {
                    $this->request->data['User']['name'] = $this->request->data['first_name'] . " " . $this->request->data['last_name'];
                    $this->request->data['User']['first_name'] = $this->request->data['first_name'];
                    $this->request->data['User']['last_name'] = $this->request->data['last_name'];
                    $this->request->data['User']['gender'] = $this->request->data['gender'];
                    $this->request->data['User']['country_id'] = $this->request->data['country_id'];
                    $this->request->data['User']['state_id'] = $this->request->data['state_id'];
                    $this->request->data['User']['city_id'] = $this->request->data['city_id'];
                    $this->request->data['User']['about'] = $this->request->data['about'];
                    $this->request->data['User']['srtipper_type'] = $this->request->data['srtipper_type'];
                    $this->request->data['User']['birthday'] = $this->request->data['birthday'];
                    //pr($this->request->data); exit;
                    $this->User->id = $this->Session->read('fuid');
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Personal Information Updated Successfully.', 'success');
                        $this->redirect(array('action' => 'editstripperprofile'));
                    }
                }
            }
        }

        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; 
        //echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $this->request->data = $this->User->find('first', $option);
        $user = $this->User->find('first', $option);
        //pr($this->request->data); exit;

        $this->loadModel('Country');
        $countries = $this->Country->find('list', array('conditions' => array('Country.is_active' => 1), 'order' => array('Country.name' => 'ASC')));

        $this->loadModel('State');
        $state = $this->State->find('list', array('conditions' => array('State.is_active' => 1), 'order' => array('State.name' => 'ASC')));

        $this->loadModel('UserType');
        $utype = $this->UserType->find('all', array('conditions' => array('UserType.is_active' => 1), 'order' => array('UserType.name' => 'ASC')));

        $this->loadModel('City');
        //$option = array('conditions' => array('City.state_id' => $this->request->data['cid']));
        $city = $this->City->find('list', array('conditions' => array('City.state_id' => $user['State']['id']), 'order' => array('City.name' => 'ASC')));

        $this->set(compact('title_for_layout', 'countries', 'state', 'utype', 'city', 'user'));
    }

    // public function editStripperAbout() {
    //     //pr($_POST); exit;
    //     $this->layout = false;
    //     $this->loadModel('User');
    //     $this->User->id = $_POST['id'];
    //     $this->User->saveField('about', $_POST['about']);
    //     $this->autoRender = false;
    // }


    public function mypphoto() {
        if(!$this->Session->read('Auth.Stripper')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        
        
        $this->loadModel("Stripper");
        $this->loadModel("Photo");
        if ($this->request->is('post')) {
            
            
            
            /*
            pr($this->Session->read('Auth.Stripper'));
            echo $this->Session->read('flogin'); echo "<br>";
            echo $this->Session->read('fuid'); echo "<br>";
            echo $this->Session->read('futype'); echo "<br>";
            echo $this->Session->read('fdashboard'); echo "<br>";
            echo $this->Session->read('username'); echo "<br>";
            pr($this->request->data);
            pr($_FILES); exit;
            */
                if(isset($_FILES['img']['name']) && $_FILES['img']['name']!=''){
                    $ext = explode('.',$_FILES['img']['name']);
                    if($ext){
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $extensionValid = array('jpg','jpeg','png','gif');
                        if(in_array($ext[1],$extensionValid)){
                            $imageName = "Stripper_".uniqid() . '.' . $ext[1];
                            $full_image_path = $uploadPath . '/' . $imageName;
                            move_uploaded_file($_FILES['img']['tmp_name'],$full_image_path);
                            $catDt['Photo']['uid'] = $this->request->data['uid'];
                            $catDt['Photo']['img'] = $imageName;
                            $this->Photo->create();
                            $this->Photo->save($catDt);                            
                        } else{
                            $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                        }
                    }
                } else {
                    $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
                }            
            
            
        }        
        
        
        $this->Stripper->recursive = 2;
        $option = array('conditions' => array('Stripper.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Stripper->find('first', $option);  
        //pr($user); exit;
        $this->set(compact('user'));         

    }
    
    public function deletephoto(){
        $this->layout = null;
        $this->loadModel("Photo"); 
        //pr($_POST); exit;
        if ($this->Photo->delete($_POST['id'])) { echo 1; } else { echo 0; } exit;
        $this->autoRender = false;
    }    
    
    
    
    
    public function myvideo() {
        
        if(!$this->Session->read('Auth.Stripper')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }        
        
        
        
        //$this->loadModel("Stripper");
        $this->loadModel("Stripper");
        $this->loadModel("Category");
        $this->loadModel("Service");
        $this->loadModel("StripperService");
        $this->loadModel("StripperCategory");
        $this->loadModel("Rate");        
        $this->loadModel("UserVideo"); 
        
        if ($this->request->is('post')) {
            $vidData = explode("watch?v=", $this->request->data['video']);
            // pr($vidData); pr($this->request->data); exit;
            $catDt['UserVideo']['uid'] = $this->request->data['uid'];
            $catDt['UserVideo']['link'] = $vidData[1];
            $catDt['UserVideo']['video'] = $this->request->data['video'];
            $this->UserVideo->create();
            $this->UserVideo->save($catDt);
            $this->Session->setFlash('Your request completed successfully', 'success');            
        }
        
        $this->Stripper->recursive = 2;
        $option = array('conditions' => array('Stripper.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Stripper->find('first', $option);  
        //pr($user); exit;
        $this->set(compact('user'));        
        
    }    
    
    public function deletevideo(){
        $this->layout = null;
        $this->loadModel("UserVideo"); 
        //pr($_POST); exit;
        if ($this->UserVideo->delete($_POST['id'])) { echo 1; } else { echo 0; } exit;
        $this->autoRender = false;
    }
    
    /* public function addescort(){
          //pr($this->Session->read('Auth.fuid'));
        
//         if(!$this->Session->read('Auth.Age')){
//             $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
//         }

        if(!$this->Session->read('fuid')){
             if(!$this->Session->read('futype') || $this->Session->read('futype') == "S"){
                 $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
             }

            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        } 

        $this->loadModel("User");


        if ($this->request->is('post','put')) {

           

            $flag = true;
            $email = $this->request->data['email'];
            $count_email = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($count_email > 0) {
                $this->Session->setFlash(__('Duplicate email not allowed.'));
                $flag = false;
            }

           
                $this->request->data['User']['name'] = $this->request->data['name'];  
                $this->request->data['User']['email'] =$this->request->data['email'];
                $this->request->data['User']['user_type'] = 'E';
                $this->request->data['User']['about'] = $this->request->data['introduction'];
                $this->request->data['User']['birthday'] = $this->request->data['dob'];
                $this->request->data['User']['ethnicity_id'] = $this->request->data['ethnicity_id'];
                $this->request->data['User']['notes'] = $this->request->data['experience'];
                $this->request->data['User']['stripper_id'] = $this->Session->read('fuid');
                $this->request->data['User']['height'] = $this->request->data['height'];
                $this->request->data['User']['bodytype_id'] = $this->request->data['body_type'];
                $this->request->data['User']['weight'] = $this->request->data['weight'];
                $this->request->data['User']['eyecolor_id'] = $this->request->data['eye_color_id'];
                $this->request->data['User']['haircolor_id'] = $this->request->data['hair_color_id'];
                $this->request->data['User']['cup_size'] = $this->request->data['cup_size'];
                //$this->request->data['User']['srtipper_type'] = $this->request->data['srtipper_type'];
                if (isset($this->request->data['gender'])) {
                    $this->request->data['User']['gender'] = $this->request->data['gender'];
                }
                $this->request->data['User']['is_active'] = 1;
                $this->request->data['User']['is_admin'] = 0;
                $this->request->data['User']['join_date'] = date('Y-m-d');


              if (isset($_FILES['profile_img']['name']) && $_FILES['profile_img']['name'] != '') {
                //echo$_FILES['profile_img']['name']; exit;

                $ext = explode('.', $_FILES['profile_img']['name']);
                if ($ext) {
                    $uploadFolder = "user_images";
                  $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "escort_" . uniqid() . '.' . $ext[1];
                        
                       $full_image_path = $uploadPath . '/' . $imageName;
                        
                        move_uploaded_file($_FILES['profile_img']['tmp_name'], $full_image_path);
                        
                        $this->request->data['User']['profile_image'] = $imageName;
                        
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

               // pr($this->request->data); exit;
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                   $this->Session->setFlash('Escort Model have been Added to the Agency  Directory', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'addescort'));
                }
          
        }
        
        
        $option2 = array('conditions' => array('User.stripper_id' => $this->Session->read('fuid')));
        $membershipall = $this->User->find('all', $option2);

    $this->set(compact('title_for_layout', 'membershipall'));

        }*/
        
    public function addescort(){
        
        // if(!$this->Session->read('Auth.Age')){
        //     $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        // }

        if(!$this->Session->read('userid')){
            // if(!$this->Session->read('futype') || $this->Session->read('futype') != "C"){
            //     $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            // }

            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        } 

        $this->loadModel("User");


        if ($this->request->is('post','put')) {

           

            $flag = true;
            $email = $this->request->data['email'];
            $count_email = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($count_email > 0) {
                $this->Session->setFlash(__('Duplicate email not allowed.'));
                $flag = false;
            }

           
                $this->request->data['User']['name'] = $this->request->data['name'];  
                $this->request->data['User']['email'] =$this->request->data['email'];
                $this->request->data['User']['user_type'] = 'E';
                $this->request->data['User']['about'] = $this->request->data['introduction'];
                $this->request->data['User']['birthday'] = $this->request->data['dob'];
                $this->request->data['User']['ethnicity_id'] = $this->request->data['ethnicity_id'];
                $this->request->data['User']['notes'] = $this->request->data['experience'];
                $this->request->data['User']['stripper_id'] = $this->request->data['user_id'];
                $this->request->data['User']['height'] = $this->request->data['height'];
                $this->request->data['User']['bodytype_id'] = $this->request->data['body_type'];
                $this->request->data['User']['weight'] = $this->request->data['weight'];
                $this->request->data['User']['eyecolor_id'] = $this->request->data['eye_color_id'];
                $this->request->data['User']['haircolor_id'] = $this->request->data['hair_color_id'];
                $this->request->data['User']['cup_size'] = $this->request->data['cup_size'];
                //$this->request->data['User']['srtipper_type'] = $this->request->data['srtipper_type'];
                if (isset($this->request->data['gender'])) {
                    $this->request->data['User']['gender'] = $this->request->data['gender'];
                }
                $this->request->data['User']['is_active'] = 1;
                $this->request->data['User']['is_admin'] = 0;
                $this->request->data['User']['join_date'] = date('Y-m-d');


              if (isset($_FILES['profile_img']['name']) && $_FILES['profile_img']['name'] != '') {
                //echo$_FILES['profile_img']['name']; exit;

                $ext = explode('.', $_FILES['profile_img']['name']);
                if ($ext) {
                    $uploadFolder = "user_images";
                  $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "escort_" . uniqid() . '.' . $ext[1];
                        
                       $full_image_path = $uploadPath . '/' . $imageName;
                        
                        move_uploaded_file($_FILES['profile_img']['tmp_name'], $full_image_path);
                        
                        $this->request->data['User']['profile_image'] = $imageName;
                        
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

                //pr($this->request->data); exit;
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                   $this->Session->setFlash('Escort Model have been Added to the Agency  Directory', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'addescort'));
                }
          
        }
        
        
        $option2 = array('conditions' => array('User.stripper_id' => $this->Session->read('fuid')));
        $membershipall = $this->User->find('all', $option2);

    $this->set(compact('title_for_layout', 'membershipall'));

        }
    
    public function jobs() {
        // if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
        //     if(!$this->Session->read('futype') || $this->Session->read('futype') != "C"){
        //         $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        //     } 
        //    }
        //    if ($this->Session->read('fuid') == '') {
        //     $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
        //     return $this->redirect('/');
        // }
        // $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');

        $this->loadModel("Job");

        $options2 = array('conditions' => array('Job.user_id' => $this->Session->read('fuid')));
        $joblist = $this->Job->find('all', $options2);
        //pr($joblist); exit;
        $this->set(compact('joblist'));
    }
    
    public function job_add() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        //pr($this->request->data); exit;
        $catDt = array();

        $this->loadModel('Job');
        //pr($this->request->data); exit;

        if ($this->request->is('post')) {



            $catDt['Job']['user_id'] = $this->request->data['user_id'];
            $catDt['Job']['name'] = $this->request->data['title'];
            $catDt['Job']['job_description'] = $this->request->data['message'];
            $catDt['Job']['status'] = 1;
            $catDt['Job']['posted_date'] = date('Y-m-d');

            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                $ext = explode('.', $_FILES['img']['name']);
                if ($ext) {
                    $uploadFolder = "job_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "job_" . uniqid() . '.' . $ext[1];
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($_FILES['img']['tmp_name'], $full_image_path);
                        $catDt['Job']['job_image'] = $imageName;
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

            $this->Job->create();
            $this->Job->save($catDt);
            $this->Session->setFlash('Job have been posted successfully', 'success');
            $this->redirect(array('action' => 'jobs'));
        }
    }
    
    public function deletejobs($id = null) {
        $this->loadModel("Job");

        $this->Job->id = $id;
        if (!$this->Job->exists()) {
            throw new NotFoundException(__(''));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Job->delete()) {
            $this->Session->setFlash(__('The Job has been deleted.'));
            return $this->redirect(array('action' => 'jobs'));
        } else {
            $this->Session->setFlash(__('The Job could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'jobs'));
    }
    
    
    
    
    public function happy_hours_escorts() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') == "S") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        //$this->loadModel('ClubFee');

//        $options = array('conditions' => array('ClubFee.club_id' => $this->Session->read('fuid')));
//        $clubrate = $this->ClubFee->find('all', $options);
        $this->loadModel('User');
        $option2 = array('conditions' => array('User.stripper_id' => $this->Session->read('fuid')));
        $membershipall = $this->User->find('all', $option2);
        $this->set(compact('clubrate','membershipall'));
    }
    
    
    public function set_happy_hours($user_id1){
      //$this->request->data

      //pr($this->Session->read()); exit;
      $stored_det = $this->Session->read();
      $logged_in_user_id = $stored_det['fdet']['id']; 

        if (!$this->Session->read('flogin') ) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


        $user_id= base64_decode($user_id1);
       //Start the Happy Hour insert 
       $this->loadModel("Happyhour"); 
       $this->loadModel("Rate"); 
       
       if($this->request->is('post'))
       {        
                $this->request->data['Happyhour']['escort_id'] = $user_id;  
                $this->request->data['Happyhour']['service_id'] = $this->request->data['service_id'];  
                $this->request->data['Happyhour']['happy_hour_type'] = !empty($this->request->data['happy_hour_type'])?implode(",",$this->request->data['happy_hour_type']):'';
                $this->request->data['Happyhour']['happy_hour_rate'] = $this->request->data['happy_hour_rate'];
                $this->request->data['Happyhour']['availibilty'] = $this->request->data['availibilty'];
                $this->request->data['Happyhour']['phone_number'] = $this->request->data['phone_number'];
                $this->request->data['Happyhour']['description'] = $this->request->data['description'];
                $this->request->data['Happyhour']['start_time'] = date("H:i:s",strtotime($this->request->data['start_time']));
                $this->request->data['Happyhour']['end_time'] = date("H:i:s",strtotime($this->request->data['end_time']));
               // pr($this->request->data); exit;
                $this->Happyhour->create();


                if ($this->Happyhour->save($this->request->data)) {
                   $this->Session->setFlash('Happy hours have been Added', 'default', array('class' => 'success'));
                    //return $this->redirect(array('action' => 'set_happy_hours'));
                }
       }
       $days=array("Mon","Tues","Wed","Thurs","Fri","Sat","Sun");
       $optionshappyhours = array('conditions' => array('Happyhour.escort_id' => $user_id));
       $allahppyhoursdata = $this->Happyhour->find('all', $optionshappyhours);
       //pr($allahppyhoursdata); exit;

       $this->set(compact('allahppyhoursdata','days','user_id'));
        
    }
    
     public function deletehappyhours($id = null){
        //$this->layout = null;
        $this->loadModel("Happyhour"); 
        pr($_POST); exit;
        if ($this->Happyhour->delete($_POST['id'])) { echo 1; } else { echo 0; } exit;
        $this->autoRender = false;
        $this->redirect(array('action' => 'set_happy_hours'));
     }
    
    
    
    
    
    public function rateandservice() {
        
        if(!$this->Session->read('Auth.Stripper')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }        
        
        
        $this->loadModel("Stripper");
        $this->loadModel("Category");
        $this->loadModel("Service");
        $this->loadModel("StripperService");
        $this->loadModel("StripperCategory");
        $this->loadModel("Rate");
        
        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            if($this->request->data['formtype'] == "service"){
                if(isset($this->request->data['services'])){
                    $this->StripperService->deleteAll(array('StripperService.uid' => $this->request->data['uid']));
                    $servDt['StripperService']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['services'] as $servValk => $servValv){
                        $servDt['StripperService']['service_id'] = $servValv;
                        $this->StripperService->create();
                        $this->StripperService->save($servDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }
            } else if($this->request->data['formtype'] == "category"){
                
                if(isset($this->request->data['category'])){
                    $this->StripperCategory->deleteAll(array('StripperCategory.uid' => $this->request->data['uid']));
                    $catDt['StripperCategory']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['category'] as $catValk => $catValv){
                        $catDt['StripperCategory']['category_id'] = $catValv;
                        $this->StripperCategory->create();
                        $this->StripperCategory->save($catDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }   
                
            } else if($this->request->data['formtype'] == "rateadd"){
                
                
                $options = array('conditions' => array('Rate.uid' => $this->request->data['uid']));
                $rateExist = $this->Rate->find('first', $options);
                //pr($rateExist); exit;                
                
                if($rateExist){
                    
                    //$rateDt['Rate']['uid'] = $this->request->data['uid'];
                    
                    if( isset($this->request->data['30min_incall']) ){ $rateDt['Rate']['30min_incall'] = $this->request->data['30min_incall']; } 
                    if( isset($this->request->data['30min_outcall']) ){ $rateDt['Rate']['30min_outcall'] = $this->request->data['30min_outcall']; }
                    
                    if( isset($this->request->data['1hr_incall']) ){ $rateDt['Rate']['1hr_incall'] = $this->request->data['1hr_incall']; }
                    if( isset($this->request->data['1hr_outcall']) ){ $rateDt['Rate']['1hr_outcall'] = $this->request->data['1hr_outcall']; }
                    
                    if( isset($this->request->data['2hr_incall']) ){ $rateDt['Rate']['2hr_incall'] = $this->request->data['2hr_incall']; }
                    if( isset($this->request->data['2hr_outcall']) ){ $rateDt['Rate']['2hr_outcall'] = $this->request->data['2hr_outcall']; }
                    
                    if( isset($this->request->data['3hr_incall']) ){ $rateDt['Rate']['3hr_incall'] = $this->request->data['3hr_incall']; }
                    if( isset($this->request->data['3hr_outcall']) ){ $rateDt['Rate']['3hr_outcall'] = $this->request->data['3hr_outcall']; }
                    
                    if( isset($this->request->data['addhr_incall']) ){ $rateDt['Rate']['addhr_incall'] = $this->request->data['addhr_incall']; }
                    if( isset($this->request->data['addhr_outcall']) ){ $rateDt['Rate']['addhr_outcall'] = $this->request->data['addhr_outcall']; }
                    
                    if( isset($this->request->data['night_incall']) ){ $rateDt['Rate']['night_incall'] = $this->request->data['night_incall']; }
                    if( isset($this->request->data['night_outcall']) ){ $rateDt['Rate']['night_outcall'] = $this->request->data['night_outcall']; }
                                        
                    if( isset($this->request->data['1day_incall']) ){ $rateDt['Rate']['1day_incall'] = $this->request->data['1day_incall']; }
                    if( isset($this->request->data['1day_outcall']) ){ $rateDt['Rate']['1day_outcall'] = $this->request->data['1day_outcall']; }
                    
                    if( isset($this->request->data['2day_incall']) ){ $rateDt['Rate']['2day_incall'] = $this->request->data['2day_incall']; }
                    if( isset($this->request->data['2day_outcall']) ){ $rateDt['Rate']['2day_outcall'] = $this->request->data['2day_outcall']; }
                    
                    if( isset($this->request->data['weekend_incall']) ){ 
                        $rateDt['Rate']['weekend_incall'] = $this->request->data['weekend_incall']; 
                    }
                    if( isset($this->request->data['weekend_outcall']) ){ 
                        $rateDt['Rate']['weekend_outcall'] = $this->request->data['weekend_outcall']; 
                    }
                    
                    $this->Rate->id = $rateExist['Rate']['id'] ;
                    $this->Rate->save($rateDt);                     
                } else {
                    $rateDt['Rate']['uid'] = $this->request->data['uid'];
                    
                    if( isset($this->request->data['30min_incall']) ){ $rateDt['Rate']['30min_incall'] = $this->request->data['30min_incall']; } 
                    if( isset($this->request->data['30min_outcall']) ){ $rateDt['Rate']['30min_outcall'] = $this->request->data['30min_outcall']; }
                    
                    if( isset($this->request->data['1hr_incall']) ){ $rateDt['Rate']['1hr_incall'] = $this->request->data['1hr_incall']; }
                    if( isset($this->request->data['1hr_outcall']) ){ $rateDt['Rate']['1hr_outcall'] = $this->request->data['1hr_outcall']; }
                    
                    if( isset($this->request->data['2hr_incall']) ){ $rateDt['Rate']['2hr_incall'] = $this->request->data['2hr_incall']; }
                    if( isset($this->request->data['2hr_outcall']) ){ $rateDt['Rate']['2hr_outcall'] = $this->request->data['2hr_outcall']; }
                    
                    if( isset($this->request->data['3hr_incall']) ){ $rateDt['Rate']['3hr_incall'] = $this->request->data['3hr_incall']; }
                    if( isset($this->request->data['3hr_outcall']) ){ $rateDt['Rate']['3hr_outcall'] = $this->request->data['3hr_outcall']; }
                    
                    if( isset($this->request->data['addhr_incall']) ){ $rateDt['Rate']['addhr_incall'] = $this->request->data['addhr_incall']; }
                    if( isset($this->request->data['addhr_outcall']) ){ $rateDt['Rate']['addhr_outcall'] = $this->request->data['addhr_outcall']; }

                    if( isset($this->request->data['night_incall']) ){ $rateDt['Rate']['night_incall'] = $this->request->data['night_incall']; }
                    if( isset($this->request->data['night_outcall']) ){ $rateDt['Rate']['night_outcall'] = $this->request->data['night_outcall']; }
                                        
                    if( isset($this->request->data['1day_incall']) ){ $rateDt['Rate']['1day_incall'] = $this->request->data['1day_incall']; }
                    if( isset($this->request->data['1day_outcall']) ){ $rateDt['Rate']['1day_outcall'] = $this->request->data['1day_outcall']; }
                    
                    if( isset($this->request->data['2day_incall']) ){ $rateDt['Rate']['2day_incall'] = $this->request->data['2day_incall']; }
                    if( isset($this->request->data['2day_outcall']) ){ $rateDt['Rate']['2day_outcall'] = $this->request->data['2day_outcall']; }
                    
                    if( isset($this->request->data['weekend_incall']) ){ 
                        $rateDt['Rate']['weekend_incall'] = $this->request->data['weekend_incall']; 
                    }
                    if( isset($this->request->data['weekend_outcall']) ){ 
                        $rateDt['Rate']['weekend_outcall'] = $this->request->data['weekend_outcall']; 
                    }
                    
                    $this->Rate->create();
                    $this->Rate->save($rateDt);                    
                }
                
                if(isset($this->request->data['category'])){
                    $this->StripperCategory->deleteAll(array('StripperCategory.uid' => $this->request->data['uid']));
                    $catDt['StripperCategory']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['category'] as $catValk => $catValv){
                        $catDt['StripperCategory']['category_id'] = $catValv;
                        $this->StripperCategory->create();
                        $this->StripperCategory->save($catDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }   
                
            }
        }        
        $this->Stripper->recursive = 2;
        $option = array('conditions' => array('Stripper.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Stripper->find('first', $option);  
        
        $myServList = array();
        if(!empty($user['StripperService'])){
            foreach($user['StripperService'] as $sdt){
                $myServList[$sdt['Service']['id']] = $sdt['Service']['name'];
            }
        }
        
        $myCatList = array();
        if(!empty($user['StripperCategory'])){
            foreach($user['StripperCategory'] as $sdtc){
                $myCatList[$sdtc['Category']['id']] = $sdtc['Category']['name'];
            }
        }        
        
        $option1 = array('conditions' => array('Category.active' => 1));
        $cat = $this->Category->find('list', $option1);
        
        $option2 = array('conditions' => array('Service.is_active' => 1));
        $serv = $this->Service->find('list', $option2);        
        
        //pr($cat); pr($serv); pr($user); pr($myServList); pr($myCatList); exit;

        $this->set(compact('user','cat','serv','myServList','myCatList'));
    }  


    // public function Stripperdetails(){
    // }

    public function emailmessage(){
    } 

    public function mybookingrequests(){
    } 
    public function mycomments(){
    } 
    public function myreviews(){
    } 
    public function myfollowing(){
    } 
    public function myfollowerupdates(){
    } 
    public function adonservices(){
    } 
    public function mypurchasedlists(){
    } 

    public function credittransactions(){
    }
    public function accountsettings(){
    }
    
     public function classifiedads(){
    $this->loadModel("Classified");
    $options = array('conditions' => array('Classified.user_id' => $this->Session->read('fuid')));
    $classifieds = $this->Classified->find('all', $options);
    $this->set(compact('classifieds'));    

    }
    
}