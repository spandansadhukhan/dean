<?php

App::uses('AppController', 'Controller');

/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class ClubsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

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
            $conditions['User.user_type'] = 'C';
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

        $total_user = $this->User->find('count', array('conditions' => $conditions));

        $users = $this->Paginator->paginate('User');
        $this->set(compact('users', 'total_user'));


    }

    public function admin_add() {
        $this->loadModel('Club');

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

        if ($user['User']['is_active'] == '0') {
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
                . '<tr><td>Contact Person</td><td>' . $user['User']['contact_person'] . '</td></tr>'
                . '<tr><td>Username</td><td>' . $user['User']['username'] . '</td></tr>'
                . '<tr><td>Email</td><td>' . $user['User']['email'] . '</td></tr>'
                . '<tr><td>Phone</td><td>' . $user['User']['phone_no'] . '</td></tr>'
                . '<tr><td>Zip Code</td><td>' . $user['User']['zipcode'] . '</td></tr>'
                . '<tr><td>City</td><td>' . $user['City']['name'] . '</td></tr>'
                . '<tr><td>Newsletter Subscription</td><td>' . $subs_newsletter . '</td></tr>'
                . '<tr><td>Is Mail Verified</td><td>' . $emailVerify . '</td></tr>'
                . '<tr><td>Profile Status</td><td>' . $status . '</td></tr>'
                . '<tr><td>Club Image</td><td><img src="'.$this->webroot.'user_images/'.$user['User']['profile_image'].'" style="height:50px;width:50px;"></td></tr>';
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
            $this->Session->setFlash('The agency type has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The agency type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    //      ##################################################################    ////

    public function clubdashboard() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }




        $this->loadModel("User");
        //if(empty($this->Session->read('futype'))){ $this->Session->setFlash('You are not authorised for that page. Please logged in as User'); $this->redirect(array('action' => 'index')); }
        if ($this->Session->read('futype') != 'C') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        $title_for_layout = "Club Dashboard";
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
                                $this->redirect(array('action' => 'clubdashboard'));
                            } else {
                                $this->Session->setFlash('Invalid Image Type. Please Upload jpeg,jpg,png,gif image.', 'info');
                                return $this->redirect(array('action' => 'clubdashboard'));
                            }
                        } else {
                            $this->Session->setFlash('Invalid Image Size. Please Upload Image sized below 1MB.', 'info');
                            return $this->redirect(array('action' => 'clubdashboard'));
                        }
                    } else {
                        $this->Session->setFlash('Invalid Image.', 'info');
                        return $this->redirect(array('action' => 'clubdashboard'));
                    }
                } else {
                    $this->Session->setFlash('Invalid Image Type.', 'info');
                    return $this->redirect(array('action' => 'clubdashboard'));
                }
            }
        }

        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $user = $this->User->find('first', $option);
        //pr($user); exit;

        $this->set(compact('title_for_layout', 'user'));
    }

    public function editclubprofile() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }




        $this->loadModel("User");
        //if(empty($this->Session->read('futype'))){ $this->Session->setFlash('You are not authorised for that page. Please logged in as User'); $this->redirect(array('action' => 'index')); }
        if ($this->Session->read('futype') != 'C') {
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
                        $this->redirect(array('action' => 'editclubprofile'));
                    }
                }
            } else if ($this->request->data['ftype'] == "persionalinfo") {
                //pr($this->request->data); exit;
                $flag = true;
                if ($flag) {

                    $this->request->data['User']['org_name'] = $this->request->data['org_name'];
                    //$this->request->data['User']['country_id'] = $this->request->data['country_id'];
                    //$this->request->data['User']['state_id'] = $this->request->data['state_id'];
                    //$this->request->data['User']['city_id'] = $this->request->data['city_id'];
                    $this->request->data['User']['about'] = $this->request->data['about'];
                    //pr($this->request->data); exit;
                    $this->User->id = $this->Session->read('fuid');
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Personal Information Updated Successfully.', 'success');
                        $this->redirect(array('action' => 'editclubprofile'));
                    }
                }
            }
        }

        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $this->request->data = $this->User->find('first', $option);
        $count_charecter=strlen($this->request->data['User']['about']);
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

        $this->set(compact('title_for_layout', 'countries', 'state', 'utype', 'city', 'user','count_charecter'));
    }

    public function editClubAbout() {
        $this->loadModel("User");
        //pr($_POST); exit;
        $this->layout = false;
        $this->loadModel('User');
        $this->User->id = $_REQUEST['id'];
        $this->User->saveField('about', $_REQUEST['about']);
        $this->autoRender = false;
        exit;
    }

    
    
    
    
    public function happy_hours_escorts() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
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
        $option2 = array('conditions' => array('User.club_id' => $this->Session->read('fuid')));
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
    
    
    
    
    
    
    
    
    
    
    
    public function mypphoto() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


        $this->loadModel("Club");
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
            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                $ext = explode('.', $_FILES['img']['name']);
                if ($ext) {
                    $uploadFolder = "user_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "escort_" . uniqid() . '.' . $ext[1];
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($_FILES['img']['tmp_name'], $full_image_path);
                        $catDt['Photo']['uid'] = $this->request->data['uid'];
                        $catDt['Photo']['img'] = $imageName;
                        $this->Photo->create();
                        $this->Photo->save($catDt);
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }
        }


        $this->Club->recursive = 2;
        $option = array('conditions' => array('Club.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Club->find('first', $option);
        //pr($user); exit;
        $this->set(compact('user'));
    }

    public function deletephoto() {
        $this->layout = null;
        $this->loadModel("Photo");
        //pr($_POST); exit;
        if ($this->Photo->delete($_POST['id'])) {
            echo 1;
        } else {
            echo 0;
        } exit;
        $this->autoRender = false;
    }

    public function myvideo() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("Club");
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

        $this->Club->recursive = 2;
        $option = array('conditions' => array('Club.id' => $this->Session->read('fuid')));
        //$this->request->data = $this->User->find('first', $option);
        $user = $this->Club->find('first', $option);
        //pr($user); exit;
        $this->set(compact('user'));
    }

    public function deletevideo() {
        $this->layout = null;
        $this->loadModel("UserVideo");
        //pr($_POST); exit;
        if ($this->UserVideo->delete($_POST['id'])) {
            echo 1;
        } else {
            echo 0;
        } exit;
        $this->autoRender = false;
    }

    public function addescort() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }

            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("User");
        if ($this->request->is('post', 'put')) {

            $email = $this->request->data['User']['email'];
            $count_email = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($count_email > 0) {
                $this->Session->setFlash(__('Duplicate email not allowed.'));
                return $this->redirect(array('action' => 'managemodel'));	
            }
            else
            {
                
		if(!empty($this->request->data['User']['profile_img']['name'])){
                $pathpart=pathinfo($this->request->data['User']['profile_img']['name']);
                $ext=$pathpart['extension'];
                $uploadFolder = "user_images";
                $uploadPath = WWW_ROOT . $uploadFolder;
                $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
		if(in_array(strtolower($ext),$extensionValid)){
                $imageName = "escort_" . uniqid() . '.' . $ext;
                $full_image_path = $uploadPath . '/' . $imageName;
                move_uploaded_file($this->request->data['User']['profile_img']['tmp_name'], $full_image_path);
                $this->request->data['User']['profile_image'] = $imageName;
                } 
                else 
                {
                    $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    return $this->redirect(array('action' => 'managemodel'));	

                }
             
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
                return $this->redirect(array('action' => 'managemodel'));	
            }
            $namearr= explode(",", $this->request->data['User']['name']);
            $this->request->data['User']['first_name']=$namearr[0];
            $this->request->data['User']['last_name']=!empty($namearr[1])?$namearr[1]:'';
            $this->request->data['User']['user_type']='E';
            $this->request->data['User']['is_active'] = 1;
            $this->request->data['User']['is_admin'] = 0;
            $this->request->data['User']['join_date'] = date('Y-m-d');
            $this->request->data['User']['club_id'] = $this->Session->read('fuid');
            $this->request->data['User']['birthday'] = date('Y-m-d',$this->reverse_birthday($this->request->data['User']['age']));
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Escort Model have been Added to the Club  Directory', 'default', array('class' => 'success'));
                return $this->redirect(array('action' => 'managemodel'));
            }
                
                
                
            }
            
        }
    }

    public function escortlist() {

        if (!$this->Session->read('Auth.Club')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

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
                    $this->Session->setFlash(__('The club could not be saved. Please, try again.', 'default', array('class' => 'error')));
                }
            } else {

                $this->Session->setFlash(__('Club already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }
    }

    //      ##################################################################    ////   

    public function managemodel() {


        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("User");
        // $this->loadModel("Haircolor");
        $option2 = array('conditions' => array('User.club_id' => $this->Session->read('fuid')));
        $membershipall = $this->User->find('all', $option2);


        $this->loadModel("Language");
        $option3 = array('conditions' => array('Language.is_active' => 1));
        $alllanguages = $this->Language->find('all', $option3);
        $busts=array("A"=>"A","B"=>"B","C"=>"C","D"=>"D","DD"=>"DD","E"=>"E","EE"=>"EE","F"=>"F","G"=>"G+");
        $this->loadModel('Haircolor');
        $haircolors = $this->Haircolor->find('list',array('fields'=>array('Haircolor.id','Haircolor.color_name')));  
        
        $this->loadModel('Eyecolor');
        $eyecolors = $this->Eyecolor->find('list',array('fields'=>array('Eyecolor.id','Eyecolor.color_name')));
        
        $this->loadModel('BodyType');
        $bodytypes = $this->BodyType->find('list',array('fields'=>array('BodyType.id','BodyType.body_type')));
        
         for($i=140;$i<=190;$i++)
        {
            $heights[$i]=$i==190?'190cm+':$i;
        }
        $this->loadModel('Service');
        $services = $this->Service->find('list', array('conditions' => array('Service.is_active' => 1), 'order' => array('Service.name' => 'ASC')));        
        $this->loadModel('Availability');
        $availabilities = $this->Availability->find('list');
        $this->loadModel('Nationality');
        $nationalities=$this->Nationality->find('list',array('fields'=>array("Nationality.id","Nationality.name"),"conditions"=>array("Nationality.is_active"=>1)));
        //pr($membershipall); exit;
        $this->set(compact('nationalities','availabilities','services','heights','title_for_layout', 'membershipall', 'alllanguages','busts','haircolors','eyecolors','bodytypes'));
        //$this->load();
    }

    public function rateandtarrif() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel('ClubFee');

        $options = array('conditions' => array('ClubFee.club_id' => $this->Session->read('fuid')));
        $clubrate = $this->ClubFee->find('all', $options);
        $this->loadModel('User');
        $option2 = array('conditions' => array('User.club_id' => $this->Session->read('fuid')));
        $membershipall = $this->User->find('all', $option2);
        $this->set(compact('clubrate','membershipall'));
    }

    public function emaillist() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "C") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("Message");
        $this->loadModel("User");
        //'not' => array('User.site_url' => null)

        $options = array('conditions' => array('Message.to_id' => $this->Session->read('fuid')));
        $messagelist = $this->Message->find('all', $options);

        $options2 = array('conditions' => array('User.id !=' => $this->Session->read('fuid'), 'not' => array('User.name' => null)));
        $userlist = $this->User->find('all', $options2);

        $this->set(compact('messagelist', 'userlist'));
    }

    public function blogs() {
        
        $this->loadModel('Blog');
        
        $userid=$this->Session->read('userid');
        
        
        
            $this->Paginator->settings=array(
            "order"=>"Blog.id desc",
            "conditions"=>array("Blog.user_id"=>$userid)   
            );
            $blogs=$this->Paginator->paginate("Blog");
            
            
            
        
        $this->set(compact('blogs'));
        
    }

    
    function blog_edit($id=null)
    {
        $userid=$this->Session->read('userid');
        $this->loadModel('Blog');
        if ($this->request->is('post')) {
            $name       = $this->request->data["Blog"]["name"];
            $check_name = $this->Blog->find("count", array(
                "conditions" => array(
                    "Blog.name" => $name,
                    "Blog.id !="=>$id
                )
            ));
            if (!$check_name) {
                if (!empty($this->request->data['Blog']['image']['name'])) {
                    $pathpart       = pathinfo($this->request->data['Blog']['image']['name']);
                    $ext            = $pathpart['extension'];
                    $extensionValid = array(
                        'jpg',
                        'jpeg',
                        'png',
                        'gif'
                    );
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder  = "blog_images";
                        $uploadPath    = WWW_ROOT . $uploadFolder;
                        $filename      = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['Blog']['image']['tmp_name'], $full_flg_path);
                        $this->request->data['Blog']['image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        $this->redirect(Router::url($this->referer(), true));
                    }
                }
                else
                {
                    $this->request->data['Blog']['image'] = $this->request->data['Blog']['hide_img'];

                }
                if ($this->Blog->save($this->request->data)) {
                    $this->Session->setFlash('The blog has been saved', 'default', array(
                        'class' => 'success'
                    ));
                    $this->redirect(Router::url($this->referer(), true));
                    
                }
            }
            
            else {
                $this->Session->setFlash(__('Blog Title already exists. Please, try another.', 'default', array(
                    'class' => 'error'
                )));
                $this->redirect(Router::url($this->referer(), true));
            }
            
            
            
        }
        
        else
        {
            
            $this->request->data=$this->Blog->find("first",array("conditions"=>array("Blog.id"=>$id)));
            
            
            
        }
        
    }
    
    
    
    
     public function blog_delete($id = null)
    {
        $this->loadModel('Blog');
        $this->Blog->id = $id;
        if (!$this->Blog->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        if ($this->Blog->delete($id)) {
            $this->Session->setFlash('The blog has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The blog could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'blogs'));
    }
    
    
    
    public function classifiedads() {

       $this->loadModel("Classified");
            $options = array('conditions' => array('Classified.user_id' => $this->Session->read('fuid')));
            $classifieds = $this->Classified->find('all', $options);
            $this->set(compact('classifieds'));
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

    public function manageevents() {
        $this->loadModel("Event");

        $options2 = array('conditions' => array('Event.user_id' => $this->Session->read('fuid')));
        $eventlist = $this->Event->find('all', $options2);
        //pr($joblist); exit;
        $this->set(compact('eventlist'));
    }

    public function blacklistcustomer() {


        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        $this->loadModel('User');
        $this->loadModel('Blacklist');




        $option = array('conditions' => array('Blacklist.from_id' => $this->Session->read('fuid')));
        $user = $this->Blacklist->find('first', $option);

        if (!empty($user)) {
            //$user_black_listed = explode(',', $user['Blacklist']['to_id']);
            $user_black_listed1 = $user['Blacklist']['to_id'];


            $option2 = array('conditions' => array('User.id' => $user_black_listed1));
            $user2 = $this->User->find('all', $option2);



            $optionuserotherlists = array('conditions' => array('User.id !=' => $user_black_listed1));
            $userotherlists = $this->User->find('all', $optionuserotherlists);


            $optionallblacklistdata = array('conditions' => array('Blacklist.from_id ' => $this->Session->read('fuid')));
            $getalldata = $this->Blacklist->find('all', $optionallblacklistdata);


            $this->set(compact('user2', 'userotherlists','getalldata'));
        } else {
            $optionuserotherlists = array('conditions' => array('User.id !=' => $this->Session->read('fuid')));
            $userotherlists = $this->User->find('all', $optionuserotherlists);

            $this->set(compact('userotherlists'));
        }
    }

    public function adonservice() {
        
    }

    public function manageshop() {
        
    }

    public function myorders() {
       $userid = $this->Session->read('fuid');
        $countryname = '';

        if (!isset($userid)) {
            $this->redirect('/');
        }

        $this->loadModel('Order');
        $this->loadModel('OrderDetail');
        $this->loadModel('Billing');
        $this->loadModel('User');
        $this->loadModel('Country');
        $title_for_layout = 'Purchase History';
        //$this->Order->recursive = 0;
        // $this->Paginator->settings = array('order'=>array('Order.id'=>"DESC"));
        // $orders = $this->Paginator->paginate('Order', array('Order.user_id' => $userid));

        $this->Paginator->settings = array('order' => array('Order.id' => "DESC"));
        $orders = $this->Paginator->paginate('Order', array('Order.user_id' => $userid));

        //pr($orders); exit;    


        $options = array('conditions' => array('User.id' => $userid));
        $user = $this->User->find('first', $options);

       // pr($user); exit;

        //pr($user); exit;
        if ($user) {
            if (isset($user['User']['country_id']) && $user['User']['country_id'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $user['User']['country_id']), 'fields' => array('Country.name')));
                $countryname = $countryname['Country']['name'];
            }
        }
        $this->set(compact('orders', 'title_for_layout', 'user', 'countryname'));
        
    }

    public function credittransaction() {
        
    }

    public function accountsettings() {
        
    }

    public function send_msg() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }


        //pr($this->request->data) ; exit;   
        $this->autoRender = false;
        $data = array();
        $this->loadModel("Message");
        $msg_prnt = $this->Message->find("first", array('fields' => array(
                'parent_id'
            ),
            "conditions" => array(
                "or" => array(
                    array(
                        'AND' => array(
                            array('Message.from_id' => $this->request->data['from_id']),
                            array('Message.to_id' => $this->request->data['to_id'])
                        )
                    ), array(
                        'AND' => array(
                            array('Message.from_id' => $this->request->data['to_id']),
                            array('Message.to_id' => $this->request->data['from_id'])
                        )
                    )
                )
            )
                )
        );

        $data['Message'] = $this->request->data;
        if (!empty($msg_prnt)) {
            $data['Message']['parent_id'] = $msg_prnt['Message']['parent_id'];
            if ($this->Message->save($data)) {
                echo "Message posted successfully";

                $this->Session->setFlash('Message sent Successfully', 'default', array('class' => 'success'));
                return $this->redirect('/clubs/emaillist');
            }
        } else {
            $this->Message->create();
            if ($this->Message->save($data)) {
                echo $last_id = $this->Message->getLastInsertID();
                $this->Message->id = $last_id;
                if ($this->Message->saveField('parent_id', $last_id)) {
                    $this->Session->setFlash(__('Message Sent Successfully', 'default', array('class' => 'success')));
                    return $this->redirect('/clubs/emaillist');
                }
            }
        }
        $data['Message'] = $this->request->data;
    }

    public function addrate() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        $catDt = array();
        $this->loadModel('ClubFee');


        if ($this->request->is('post')) {

            //if($this->request->data['id'] == ''){

            $catDt['ClubFee']['club_id'] = $this->request->data['club_id'];
            $catDt['ClubFee']['entrance_fee'] = $this->request->data['entrance_fee'];
            $catDt['ClubFee']['additional_service_cost'] = $this->request->data['extra_service_cost'];
            $catDt['ClubFee']['beer_cost'] = $this->request->data['beer_glass_cost'];

            // $options2 = array('conditions' => array('ClubFee.club_id' => $this->Session->read('fuid')));
            //  $userlist = $this->ClubFee->find('all', $options2);  






            $this->ClubFee->create();
            $this->ClubFee->save($catDt);
            $this->Session->setFlash('Your Club  data savedsuccessfully', 'success');

            $this->redirect('/clubs/rateandtarrif');

            // }else{
            //       //$catDt['ClubFee']['club_id'] = $this->request->data['club_id'];
            //       $catDt['ClubFee']['entrance_fee'] = $this->request->data['entrance_fee'];
            //       $catDt['ClubFee']['additional_service_cost'] = $this->request->data['extra_service_cost'];
            //       $catDt['ClubFee']['beer_cost'] = $this->request->data['beer_glass_cost'];
            //       $this->ClubFee->id = $this->request->data['id'];
            //       if ($this->ClubFee->save($this->request->data)) {
            //           $this->Session->setFlash('Club data  Updated Successfully.', 'success');
            //           $this->redirect('/clubs/rateandtarrif');
            //       }
        }
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

    public function add_to_blacklist() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel('Blacklist');

        $catDt = array();

        if ($this->request->is('post')) {


            //$user_id_to_blacklist = $this->request->data['to_id'];
            //echo $user_id_to_blacklist; exit;

            $catDt['Blacklist']['from_id'] = $this->request->data['from_id'];
            $catDt['Blacklist']['phone']= $this->request->data['phone'];
            $catDt['Blacklist']['email']= $this->request->data['email'];
            $catDt['Blacklist']['comment']= $this->request->data['comment'];
            $catDt['Blacklist']['to_id'] = $this->request->data['to_id'];

            $this->Blacklist->create();
            $this->Blacklist->save($catDt);
            $this->Session->setFlash('Your Have blacklisted Users', 'success');
            $this->redirect('/clubs/blacklistcustomer');
        }
    }

    public function deleteblacklist($id = null) {
     // echo $id ; exit;
        $this->loadModel("Blacklist");



        $this->Blacklist->id = $id;
        if (!$this->Blacklist->exists()) {
            throw new NotFoundException(__(''));
            $this->redirect(array('action' => 'blacklistcustomer'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Blacklist->delete()) {
            $this->Session->setFlash(__('The Blacklist has been removed.'));
            return $this->redirect(array('action' => 'blacklistcustomer'));
        } else {
            $this->Session->setFlash(__('The Coustomer cannot be removed from the blacklst. Please, try again.'));
        }
        return $this->redirect(array('action' => 'blacklistcustomer'));
    }

    public function blogadd() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        //pr($this->request->data); exit;
        $catDt = array();

        $this->loadModel('Blog');
        if ($this->request->is('post')) {



            $catDt['Blog']['user_id'] = $this->request->data['user_id'];
            $catDt['Blog']['name'] = $this->request->data['name'];
            $catDt['Blog']['contaent'] = $this->request->data['contaent'];
            $catDt['Blog']['admin_approve'] = 0;
            $catDt['Blog']['post_date'] = date('Y-m-d');

            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                $ext = explode('.', $_FILES['img']['name']);
                if ($ext) {
                    $uploadFolder = "blog_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "blog_" . uniqid() . '.' . $ext[1];
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($_FILES['img']['tmp_name'], $full_image_path);
                        $catDt['Blog']['image'] = $imageName;
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

            $this->Blog->create();
            $this->Blog->save($catDt);
            $this->Session->setFlash('Yor post have been sent to Admin for moderation', 'success');
            $this->redirect(array('action' => 'blogs'));
        }
    }

    public function add_event() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        //pr($this->request->data); exit;
        $catDt = array();

        $this->loadModel('Event');
        //pr($this->request->data); exit;

        if ($this->request->is('post')) {



            $catDt['Event']['user_id'] = $this->request->data['user_id'];
            $catDt['Event']['name'] = $this->request->data['name'];
            $catDt['Event']['venue'] = $this->request->data['venue'];
            $catDt['Event']['description'] = $this->request->data['contaent'];
            $catDt['Event']['status'] = 1;
            $catDt['Event']['event_date'] = $this->request->data['event_date'];

            if (isset($_FILES['img']['name']) && $_FILES['img']['name'] != '') {
                $ext = explode('.', $_FILES['img']['name']);
                if ($ext) {
                    $uploadFolder = "event_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "event_" . uniqid() . '.' . $ext[1];
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($_FILES['img']['tmp_name'], $full_image_path);
                        $catDt['Event']['image'] = $imageName;
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

            $this->Event->create();
            $this->Event->save($catDt);
            $this->Session->setFlash('Event have been posted successfully', 'success');
            $this->redirect(array('action' => 'manageevents'));
        }
    }

    public function addadver() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        //pr($this->request->data); exit;
        $catDt = array();

        $this->loadModel('Classified');
        //pr($this->request->data); exit;

        if ($this->request->is('post')) {



            $catDt['Classified']['user_id'] = $this->request->data['user_id'];
            $catDt['Classified']['name'] = $this->request->data['title'];
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
                        $catDt['Classified']['image'] = $imageName;
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }

            $this->Classified->create();
            $this->Classified->save($catDt);
            $this->Session->setFlash('Ad have been posted successfully', 'success');
            $this->redirect(array('action' => 'classifiedads'));
        }
    }

    public function deleteclassified($id = null) {
        $this->loadModel("Classified");

        $this->Classified->id = $id;
        if (!$this->Classified->exists()) {
            throw new NotFoundException(__(''));
            // $this->redirect(array('action' => 'blacklistcustomer')); 
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Classified->delete()) {
            $this->Session->setFlash(__('The Adver has been removed.'));
            return $this->redirect(array('action' => 'classifiedads'));
        } else {
            $this->Session->setFlash(__('The Coustomer cannot be removed from the blacklst. Please, try again.'));
        }
        return $this->redirect(array('action' => 'classifiedads'));
    }

    public function deletemodel($id = null){

     if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }


       $this->loadModel("User");

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__(''));
            // $this->redirect(array('action' => 'blacklistcustomer')); 
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The Model has been removed.'));
            return $this->redirect(array('action' => 'managemodel'));
        } else {
            $this->Session->setFlash(__('The Model cannot be deleted'));
        }
        return $this->redirect(array('action' => 'managemodel'));
    }
    
    public function setprice($user_id)
    {
        $this->loadModel('Rate');
        $user_id= base64_decode($user_id);
        if ($_POST) {
        $this->request->data['Rate']['user_id']= $user_id;
        if($this->Rate->save($this->request->data))
        {
         $this->Session->setFlash('Price has been set successfully', 'default', array('class' => 'success'));
         return $this->redirect(array('action' => 'setprice', base64_encode($user_id)));   
        }
        }else{    
        $this->request->data=$this->Rate->find('first',array('conditions'=>array('Rate.user_id'=>$user_id)));
        }
        
    }
    
    function reverse_birthday($age) {
	list($year,$month,$day) = explode("-", date("Y-m-d"));
	$range = $year - $age;
	return strtotime("{$range}-{$month}-{$day}");
   }
    
   

}
