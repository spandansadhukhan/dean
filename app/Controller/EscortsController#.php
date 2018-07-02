<?php

App::uses('AppController', 'Controller');

/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class EscortsController extends AppController {

    /**
     * Components
     *
     * @var array
     */

    
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
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
        $this->loadModel('Escort');

        if ($this->request->is('post')) {
            //echo "hello";exit;
            //echo "hello";exit;
            $options = array('conditions' => array('Escort.username' => $this->request->data['Escort']['username']));
            $bodytypeexists = $this->Escort->find('first', $options);
            if (!$bodytypeexists) {

                $this->request->data['Escort']['datetime'] = date('Y-m-d');
                //pr($this->request->data);exit;
                $this->Escort->create();
                if ($this->Escort->save($this->request->data)) {
                    $this->Session->setFlash('The escort has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The escort could not be saved. Please, try again.', 'default', array('class' => 'error')));
                }
            } else {

                $this->Session->setFlash(__('Escort already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }
    }

    /* public function countrywisecity($countryId=null) {
      $this->loadModel('City');
      if(!empty($countryId)){
      //$city = $this->City->find('list',array('fields'=>array('id','name'),'conditions'=>array('City.country_id'=>$countryId)));
      $city = $this->City->find('all','conditions'=>array('City.country_id' => $countryId));

      }
      else{
      $city = '';
      }
      pr($city);
      return $city;

      exit;
      } */

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

    /* public function admin_edit($id = null) {
      $userid = $this->Session->read('userid');
      if(!isset($userid) && $userid==''){
      $this->redirect('/admin');
      }
      $title_for_layout = 'User Edit';
      $this->set(compact('title_for_layout'));
      if (!$this->Escort->exists($id)) {
      throw new NotFoundException(__('Invalid escort'));
      }
      if ($this->request->is(array('post', 'put'))) {

      if(isset($this->request->data['Escort']['password']) && $this->request->data['Escort']['password']!=''){
      $this->request->data['Escort']['txt_password'] = $this->request->data['Escort']['password'];
      $this->request->data['Escort']['password'] = md5($this->request->data['Escort']['password']);
      }else{
      $this->request->data['Escort']['password'] = $this->request->data['Escort']['hidpw'];
      }

      if(isset($this->request->data['Escort']['profile_image']) && $this->request->data['Escort']['profile_image']['name']!=''){
      $ext = explode('.',$this->request->data['Escort']['profile_image']['name']);
      if($ext){
      $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');

      $extensionValid = array('jpg','jpeg','png','gif');
      if(in_array($ext[1],$extensionValid)){
      $imageName = rand().'_'.(strtolower(trim($this->request->data['Escort']['profile_image']['name'])));
      $full_image_path = $uploadPath . '/' . $imageName;
      move_uploaded_file($this->request->data['Escort']['profile_image']['tmp_name'],$full_image_path);
      $this->request->data['Escort']['profile_image'] = $imageName;


      } else{
      $this->Session->setFlash(__('Invalid Image Type'));
      return $this->redirect(array('action' => 'user_edit',$id));
      }
      }
      }else{
      $this->request->data['Escort']['profile_image'] = $this->request->data['Escort']['hid_img'];
      }

      //pr($this->request->data);exit;
      if ($this->Escort->save($this->request->data)) {
      $this->Session->setFlash(__('The escort has been saved.', 'default', array('class' => 'success')));
      //return $this->redirect(array('action' => 'admin_edit/'.$id));
      } else {
      $this->Session->setFlash(__('The escort could not be saved. Please, try again.'));
      }
      } else {
      $options = array('conditions' => array('Escort.' . $this->User->primaryKey => $id));
      $this->request->data = $this->Escort->find('first', $options);

      }


      } */

    public function admin_edit($id = null) {
        if (!$this->Escort->exists($id)) {
            throw new NotFoundException(__('Invalid escort'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Escort->save($this->request->data)) {
                $this->Session->setFlash(__('The escort has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The escort could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Escort.' . $this->Escort->primaryKey => $id));
            $this->request->data = $this->Escort->find('first', $options);
        }
    }

    public function admin_delete($id = null) {
        $this->loadModel('User');
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid type'));
        }
        if ($this->User->delete($id)) {
            $this->Session->setFlash('The escort type has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The escort type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    //      ##################################################################    ////
    //      ##################################################################    //// 

    public function escortdashboard() {
        
        if(!$this->Session->read('Auth.Escort')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }  
        
        
        
        $this->loadModel("User");
        if ($this->Session->read('futype') != 'E') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        $title_for_layout = "Escort Dashboard";
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
                                $this->redirect(array('action' => 'escortdashboard'));
                            } else {
                                $this->Session->setFlash('Invalid Image Type. Please Upload jpeg,jpg,png,gif image.', 'info');
                                return $this->redirect(array('action' => 'escortdashboard'));
                            }
                        } else {
                            $this->Session->setFlash('Invalid Image Size. Please Upload Image sized below 1MB.', 'info');
                            return $this->redirect(array('action' => 'escortdashboard'));
                        }
                    } else {
                        $this->Session->setFlash('Invalid Image.', 'info');
                        return $this->redirect(array('action' => 'escortdashboard'));
                    }
                } else {
                    $this->Session->setFlash('Invalid Image Type.', 'info');
                    return $this->redirect(array('action' => 'escortdashboard'));
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

    public function editescortprofile() {
        
        if(!$this->Session->read('Auth.Escort')){
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
        if ($this->Session->read('futype') != 'E') {
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
                        $this->redirect(array('action' => 'editescortprofile'));
                    }
                }
            } else if ($this->request->data['ftype'] == "persionalinfo") {
                //pr($this->request->data); exit;
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
                    $this->request->data['User']['birthday'] = $this->request->data['birthday'];
                    $this->request->data['User']['height'] = $this->request->data['height'];
                    $this->request->data['User']['weight'] = $this->request->data['weight'];
                    $this->request->data['User']['bust_size'] = $this->request->data['bust_size'];
                    $this->request->data['User']['origin_id'] = $this->request->data['origin_id'];
                    //pr($this->request->data); exit;
                    $this->User->id = $this->Session->read('fuid');
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Personal Information Updated Successfully.', 'success');
                        $this->redirect(array('action' => 'editescortprofile'));
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

        $this->loadModel('Origin');
        $origin = $this->Origin->find('all', array('conditions' => array('Origin.is_active' => 1), 'order' => array('Origin.name' => 'ASC')));

        $this->loadModel('City');
        //$option = array('conditions' => array('City.state_id' => $this->request->data['cid']));
        $city = $this->City->find('list', array('conditions' => array('City.state_id' => $user['State']['id']), 'order' => array('City.name' => 'ASC')));

        $this->set(compact('title_for_layout', 'countries', 'state', 'utype', 'city', 'user', 'origin'));
    }

    public function editEscortAbout() {
        //pr($_POST); exit;
        $this->layout = false;
        $this->loadModel('User');
        $this->User->id = $_POST['id'];
        $this->User->saveField('about', $_POST['about']);
        $this->autoRender = false;
    }


    public function mypphoto() {
        if(!$this->Session->read('Auth.Escort')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        
        
        $this->loadModel("Escort");
        $this->loadModel("Photo");
        if ($this->request->is('post')) {
            
            
            
            /*
            pr($this->Session->read('Auth.Escort'));
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
                            $imageName = "escort_".uniqid() . '.' . $ext[1];
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
        
        
        $this->Escort->recursive = 2;
        $option = array('conditions' => array('Escort.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Escort->find('first', $option);  
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
        
        if(!$this->Session->read('Auth.Escort')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }        
        
        
        
        $this->loadModel("Escort");
        $this->loadModel("Escort");
        $this->loadModel("Category");
        $this->loadModel("Service");
        $this->loadModel("EscortService");
        $this->loadModel("EscortCategory");
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
        
        $this->Escort->recursive = 2;
        $option = array('conditions' => array('Escort.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Escort->find('first', $option);  
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
    
    
    
    
    public function rateandservice() {
        
        if(!$this->Session->read('Auth.Escort')){
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }
        if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
            if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
                $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
            }        
            $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        }        
        
        
        $this->loadModel("Escort");
        $this->loadModel("Category");
        $this->loadModel("Service");
        $this->loadModel("EscortService");
        $this->loadModel("EscortCategory");
        $this->loadModel("Rate");
        
        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            if($this->request->data['formtype'] == "service"){
                if(isset($this->request->data['services'])){
                    $this->EscortService->deleteAll(array('EscortService.uid' => $this->request->data['uid']));
                    $servDt['EscortService']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['services'] as $servValk => $servValv){
                        $servDt['EscortService']['service_id'] = $servValv;
                        $this->EscortService->create();
                        $this->EscortService->save($servDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }
            } else if($this->request->data['formtype'] == "category"){
                
                if(isset($this->request->data['category'])){
                    $this->EscortCategory->deleteAll(array('EscortCategory.uid' => $this->request->data['uid']));
                    $catDt['EscortCategory']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['category'] as $catValk => $catValv){
                        $catDt['EscortCategory']['category_id'] = $catValv;
                        $this->EscortCategory->create();
                        $this->EscortCategory->save($catDt);
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
                    $this->EscortCategory->deleteAll(array('EscortCategory.uid' => $this->request->data['uid']));
                    $catDt['EscortCategory']['uid'] = $this->request->data['uid'];
                    foreach($this->request->data['category'] as $catValk => $catValv){
                        $catDt['EscortCategory']['category_id'] = $catValv;
                        $this->EscortCategory->create();
                        $this->EscortCategory->save($catDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }   
                
            }
        }        
        $this->Escort->recursive = 2;
        $option = array('conditions' => array('Escort.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Escort->find('first', $option);  
        
        $myServList = array();
        if(!empty($user['EscortService'])){
            foreach($user['EscortService'] as $sdt){
                $myServList[$sdt['Service']['id']] = $sdt['Service']['name'];
            }
        }
        
        $myCatList = array();
        if(!empty($user['EscortCategory'])){
            foreach($user['EscortCategory'] as $sdtc){
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


    public function escortdetails($id=null){
      $id = base64_decode($id);
      $this->loadModel('User');
      $users = $this->User->find("all", array("conditions"=>array("User.id"=>$id)));

      // echo "<pre>";
      // print_r($users);die;
      $this->set(compact('users'));
    }

    public function message(){
       $this->loadModel("Message");
        $options = array('conditions' => array('Message.to_id' => $this->Session->read('fuid')));
        $messagelist = $this->Message->find('all', $options);
        $this->set(compact('messagelist'));
    }

    public function send_msg(){
      $this->autoRender=false;
      $data = $this->request->data;
      print_r($data);die;
      $this->loadModel("Message");
      //if($this->Message->save())
    }

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
    
}
