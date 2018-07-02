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

    //protected $layout = 'escort_site';

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
              $this->loadModel('User');
              $this->User->updateAll(
              array('User.escort_of_week ' => 0),
              array('User.user_type' => 'E')
              );

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

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }



        $this->loadModel("User");

       

        // if ($this->Session->read('futype') != 'E') {
        //     $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
        //     $this->redirect(array('action' => 'index'));
        // }




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


        $this->loadModel('Membership');
        $option1 = array('conditions' => array('Membership.id' => $user['User']['membership_id']));
        $membership = $this->Membership->find('first', $option1);
       // pr($membership); exit;
        $option2 = array('conditions' => array('Membership.is_active' => 1));
        $membershipall = $this->Membership->find('all', $option2);

        //pr($user); exit;
        $this->loadModel("Review");
        $option3 = array('conditions' => array('Review.profile_id' => $this->Session->read('fuid')));
        $reviewall = $this->Review->find('all', $option3);
        //pr($reviewall); exit;


        // $escortslideroption = array('conditions' => array('User.user_type' => 'E','User.membership_id' => 2));
        // $escortslider = $this->User->find('all', $escortslideroption);

        $this->set(compact('title_for_layout', 'user', 'membership', 'membershipall','reviewall'));
    }

    public function membershippayment() {

        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("User");
        if ($this->Session->read('futype') != 'E') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        if ($this->request->is('post', 'put')) {

            $this->loadModel('Membership');
            $option2 = array('conditions' => array('Membership.id' => $this->request->data['Escort']['membership_id']));
            $membershipall = $this->Membership->find('first', $option2);

            $price = $membershipall['Membership']['price'];
            $this->Session->write('finalprice', $price);
            $this->Session->write('packid', $this->request->data['Escort']['membership_id']);
            return $this->redirect(array('action' => 'paypal'));
        }
    }

    public function paypal() {
        
    }

    public function success() {

        date_default_timezone_set("GMT");

        $headeruserId = $this->Session->read('fuid');
        $packid = $this->Session->read('packid');

        $this->loadModel('Membership');
        $option2 = array('conditions' => array('Membership.id' => $packid));
        $membershipall = $this->Membership->find('first', $option2);

        $days = $membershipall['Membership']['duration'];
        $credits_num =  $membershipall['Membership']['credits'];
        $date1 = gmdate("Y-m-d");
        $date2 = date('Y-m-d', strtotime($date1 . "+" . $days . " days"));
        //if($packid == 2){$credit_balance = }

        //Add package Id according to Sorting

        if($packid == 2){$rank = 0;}elseif($packid == 4){$rank = 1;}elseif($packid == 3){$rank = 2;}elseif($packid == 1){$rank = 3;}else{$rank = 4;}

        $this->request->data['User']['id'] = $headeruserId;
        $this->request->data['User']['membership_id'] = $packid;
        $this->request->data['User']['membership_start_date'] = $date1;
        $this->request->data['User']['membership_end_date'] = $date2;
        $this->request->data['User']['payment_status'] = 1;
        $this->request->data['User']['credit_number'] = $credits_num;
        $this->request->data['User']['is_sort'] = $rank;


        $req = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('www.paypal.com', 80, $errno, $errstr, 30);

        if (!$fp) {
            
        } else {
            fputs($fp, $header . $req);
            $res = fgets($fp, 1024);

            if ($_POST['payment_status'] == "Completed") {
                $this->request->data['User']['transaction_id'] = $_POST['txn_id'];
                $this->loadModel('User');
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Your Payment is Successfull.');
                    return $this->redirect(array('action' => 'escortdashboard'));
                }
            } else {
                
            }
        }
        if (strcmp($res, "INVALID") == 0) {
            $this->Session->setFlash('Your Payment is not Successfull.');
            return $this->redirect(array('action' => 'escortdashboard'));
        }
        fclose($fp);

        $this->Session->delete('finalprice');
        $this->Session->delete('packid');
    }

    // public function failure() {
    // }

    public function createwebsite($id = null) {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }




        $this->loadModel("User");
        $this->loadModel('Morebanner');
        $this->loadModel('Moreimage');
        $this->loadModel('UserInformation');


        //$option54 = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        //$findval = $this->User->find('first', $option54);
        // if ($findval['User']['template_id'] == 0) {
        //mkdir('path/to/directory', 0777, true);
        //}


        $dt = array();

        if ($this->Session->read('futype') != 'E') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }

        $title_for_layout = "Edit Profile";
        if ($this->request->is('post', 'put')) {

            $name = $this->request->data['Escort']['first_name'] . ' ' . $this->request->data['Escort']['last_name'];
            //$slaug = $this->create_slug($name);
            $slaug = $this->request->data['Escort']['first_name'].'_'.time();

            $dt['UserInformation']['user_id'] = $this->request->data['Escort']['user_id'];
            $dt['UserInformation']['first_name'] = $this->request->data['Escort']['first_name'];
            $dt['UserInformation']['last_name'] = $this->request->data['Escort']['last_name'];
            $dt['UserInformation']['gender'] = $this->request->data['Escort']['gender'];
            $dt['UserInformation']['phone'] = $this->request->data['Escort']['phone'];
            $dt['UserInformation']['email'] = $this->request->data['Escort']['email'];
            $dt['UserInformation']['about'] = $this->request->data['Escort']['about'];
            $dt['UserInformation']['rate'] = $this->request->data['Escort']['rate'];
            $dt['UserInformation']['is_active'] = 1;
            $dt['UserInformation']['slug'] = $slaug;
            $dt['UserInformation']['facebook_link'] = $this->request->data['Escort']['facebook_link'];
            $dt['UserInformation']['twitter_link'] = $this->request->data['Escort']['twitter_link'];
            $dt['UserInformation']['google_link'] = $this->request->data['Escort']['google_link'];




            $option5 = array('conditions' => array('UserInformation.user_id' => $this->Session->read('fuid')));
            $userinfos_count = $this->UserInformation->find('count', $option5);

            $option5 = array('conditions' => array('UserInformation.user_id' => $this->Session->read('fuid')));
            $userinfos_val = $this->UserInformation->find('first', $option5);

            if ($userinfos_count == 0) {
                if ($this->UserInformation->save($dt)) {

                    $id = base64_decode($id);
                    $this->User->id = $this->Session->read('fuid');
                    $this->User->saveField('template_id', $id);

                    $dirname = WWW_ROOT . $slaug;
                    mkdir($dirname, 0777, true);
                    //chown($dirname, "root");

                    $this->Session->setFlash('Contact Information Updated Successfully.', 'success');
                    $this->redirect(array('action' => 'createwebsite', base64_encode($id)));
                }
            } else {
                $this->UserInformation->id = $userinfos_val['UserInformation']['id'];
                if ($this->UserInformation->save($dt)) {

                    $id = base64_decode($id);
                    $this->User->id = $this->Session->read('fuid');
                    $this->User->saveField('template_id', $id);

                    //$dirname = WWW_ROOT . $slaug;
                    //mkdir($dirname, 0777, true);
                    //chown($dirname, "root");


                    $this->Session->setFlash('Contact Information Updated Successfully.', 'success');
                    $this->redirect(array('action' => 'createwebsite', base64_encode($id)));
                }
            }
        }


        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $this->request->data = $this->User->find('first', $option);
        $user = $this->User->find('first', $option);


        $option1 = array('conditions' => array('UserInformation.user_id' => $this->Session->read('fuid')));
        $userinfos = $this->UserInformation->find('first', $option1);



        $option2 = array('conditions' => array('Moreimage.user_id' => $this->Session->read('fuid')));
        $userinfosimages = $this->Moreimage->find('all', $option2);

        //pr($userinfosimages);
        //exit;


        $option3 = array('conditions' => array('Morebanner.user_id' => $this->Session->read('fuid')));
        $userinfosbanners = $this->Morebanner->find('all', $option3);

        //pr($userinfosbanners);
        //exit;


        $pid = $this->Session->read('fuid');

        $this->set(compact('title_for_layout', 'user', 'pid', 'userinfos', 'userinfosimages', 'userinfosbanners'));
    }

    public function uploadBanner($id = null) {
        $this->autoRender = false;

        $imagename = $_FILES['file']['name'];
        $uploadFolder = "user_banners";
        $uploadPath = WWW_ROOT . $uploadFolder;
        $v = $imagename;
// move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath . '/' . $imagename);

        $mainfolder = "user_banners/";
        $mainfolderpath = WWW_ROOT . $mainfolder;

//$uploadFolder = "product_img";
//$uploadPath = WWW_ROOT . $uploadFolder;
        //$thumbuploadFolder = "product_img/thumb_image/";
        //$uploadPaththumb = WWW_ROOT . $thumbuploadFolder;

        $mediumuploadFolder = "user_banners/medium_image/";
        $uploadPathmedium = WWW_ROOT . $mediumuploadFolder;


//$img_name = $this->cwUpload('file', $mainfolderpath, '', TRUE, $uploadPaththumb, '50', '50');
        $img_name = $this->cwUpload('file', $mainfolderpath, '', TRUE, $uploadPathmedium, '400', '600');


        $this->loadModel('Morebanner');
        $listid = $this->Session->read('fuid');


        $productupdate['Morebanner']['user_id'] = $listid;
        $productupdate['Morebanner']['image'] = $img_name;
        $productupdate['Morebanner']['is_active'] = 1;

        $this->Morebanner->save($productupdate);
        $this->Morebanner->recursive = 0;
        $this->set('productimages', $this->Paginator->paginate('Morebanner', array('Morebanner.user_id' => $this->Session->read('fuid'))));

        $this->Session->setFlash('Banner Image Updated Successfully.', 'success');
        $this->redirect(array('action' => 'createwebsite'));
    }

    public function uploadGallery($id = null) {
        $this->autoRender = false;

        $imagename = $_FILES['file']['name'];
        $uploadFolder = "user_webimages";
        $uploadPath = WWW_ROOT . $uploadFolder;
        $v = $imagename;
// move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath . '/' . $imagename);

        $mainfolder = "user_webimages/";
        $mainfolderpath = WWW_ROOT . $mainfolder;

//$uploadFolder = "product_img";
//$uploadPath = WWW_ROOT . $uploadFolder;
        //$thumbuploadFolder = "product_img/thumb_image/";
        //$uploadPaththumb = WWW_ROOT . $thumbuploadFolder;

        $mediumuploadFolder = "user_webimages/medium_image/";
        $uploadPathmedium = WWW_ROOT . $mediumuploadFolder;


//$img_name = $this->cwUpload('file', $mainfolderpath, '', TRUE, $uploadPaththumb, '50', '50');
        $img_name = $this->cwUpload('file', $mainfolderpath, '', TRUE, $uploadPathmedium, '400', '600');


        $this->loadModel('Moreimage');
        $listid = $this->Session->read('fuid');


        $productupdate['Moreimage']['user_id'] = $listid;
        $productupdate['Moreimage']['image'] = $img_name;
        $productupdate['Moreimage']['is_active'] = 1;

        $this->Moreimage->save($productupdate);
        $this->Moreimage->recursive = 0;
        $this->set('productimages', $this->Paginator->paginate('Moreimage', array('Moreimage.user_id' => $this->Session->read('fuid'))));

        $this->Session->setFlash('Gallery Image Updated Successfully.', 'success');
        $this->redirect(array('action' => 'createwebsite'));
    }

    public function bannersdelete($id = null, $listid = null) {
//echo $listid;
//exit;
        $this->loadModel('Morebanner');
//$id = base64_decode($id);


        $this->Morebanner->id = $id;
        $pro = $this->Morebanner->read();
        if (!$this->Morebanner->exists()) {
            throw new NotFoundException(__('Invalid image'));
        }
#$this->request->allowMethod('post', 'delete');
        if ($this->Morebanner->delete($id)) {
            $this->Session->setFlash('The image has been deleted.', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'createwebsite'));
        } else {
            $this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
        }
//return $this->redirect(array('action' => 'admin_uploadimage', $id));
    }

    public function webimagedelete($id = null, $listid = null) {
//echo $listid;
//exit;
        $this->loadModel('Moreimage');
//$id = base64_decode($id);


        $this->Moreimage->id = $id;
        $pro = $this->Moreimage->read();
        if (!$this->Moreimage->exists()) {
            throw new NotFoundException(__('Invalid image'));
        }
#$this->request->allowMethod('post', 'delete');
        if ($this->Moreimage->delete($id)) {
            $this->Session->setFlash('The image has been deleted.', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'createwebsite'));
        } else {
            $this->Session->setFlash(__('The image could not be deleted. Please, try again.'));
        }
//return $this->redirect(array('action' => 'admin_uploadimage', $id));
    }

    public function websitetemplate() {


        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("WebsiteTemplate");

        $option2 = array('conditions' => array('WebsiteTemplate.is_active' => 1));
        $webtemplates = $this->WebsiteTemplate->find('all', $option2);

        $this->loadModel("Category");
        $options = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options);



        $this->set(compact('webtemplates', 'category'));
    }

    public function editescortprofile() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
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
                    $this->request->data['User']['category_id'] = $this->request->data['category_id'];
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

        $this->loadModel('Category');
        $category = $this->Category->find('all', array('conditions' => array('Category.active' => 1), 'order' => array('Category.name' => 'ASC')));
        //pr($category); exit;
        $this->loadModel('City');
        //$option = array('conditions' => array('City.state_id' => $this->request->data['cid']));
        $city = $this->City->find('list', array('conditions' => array('City.state_id' => $user['State']['id']), 'order' => array('City.name' => 'ASC')));

        $this->set(compact('title_for_layout', 'countries', 'state', 'utype', 'city', 'user', 'origin', 'category'));
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
        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        // if(!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes"){
        //     if(!$this->Session->read('futype') || $this->Session->read('futype') != "E"){
        //         $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        //     }        
        //     $this->Session->setFlash('You are not authoriised In this page'); $this->redirect('/');
        // }


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

              $catDt['Photo']['is_active'] = $this->request->data['agree'];  
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

                        $this->Session->setFlash(__('Image submitted successfully for Admin approval'));
                    } else {
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

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
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

    public function rateandservice() {

        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }



        $this->loadModel("Escort");
        $this->loadModel("Category");
        $this->loadModel("Service");
        $this->loadModel("EscortService");
        $this->loadModel("EscortCategory");
        $this->loadModel("Rate");

        if ($this->request->is('post')) {
            //pr($this->request->data); exit;
            if ($this->request->data['formtype'] == "service") {

                if (isset($this->request->data['services'])) {

                    //pr($this->request);exit;
                    $this->EscortService->deleteAll(array('EscortService.uid' => $this->request->data['uid']));
                    //exit;

                    $servDt['EscortService']['uid'] = $this->request->data['uid'];

                    foreach ($this->request->data['services'] as $servValk => $servValv) {
                        $servDt['EscortService']['service_id'] = $servValv;
                        $this->EscortService->create();
                        $this->EscortService->save($servDt);
                    }
                    $this->Session->setFlash('Your request completed successfully', 'success');
                } else {
                    //$this->Session->setFlash('Choose Service. Emp');
                }
            }
            // else if($this->request->data['formtype'] == "category"){
            //     if(isset($this->request->data['category'])){
            //         $this->EscortCategory->deleteAll(array('EscortCategory.uid' => $this->request->data['uid']));
            //         $catDt['EscortCategory']['uid'] = $this->request->data['uid'];
            //         foreach($this->request->data['category'] as $catValk => $catValv){
            //             $catDt['EscortCategory']['category_id'] = $catValv;
            //             $this->EscortCategory->create();
            //             $this->EscortCategory->save($catDt);
            //         }
            //         $this->Session->setFlash('Your request completed successfully', 'success');
            //     } else {
            //     }   
            // } 
            else if ($this->request->data['formtype'] == "rateadd") {


                $options = array('conditions' => array('Rate.user_id' => $this->request->data['uid']));
                $rateExist = $this->Rate->find('first', $options);
                //pr($rateExist); exit;                

                if ($rateExist) {

                    //$rateDt['Rate']['uid'] = $this->request->data['uid'];

                    if (isset($this->request->data['30min_incall'])) {
                        $rateDt['Rate']['30min_incall'] = $this->request->data['30min_incall'];
                    }
                    if (isset($this->request->data['30min_outcall'])) {
                        $rateDt['Rate']['30min_outcall'] = $this->request->data['30min_outcall'];
                    }

                    if (isset($this->request->data['1hr_incall'])) {
                        $rateDt['Rate']['1hr_incall'] = $this->request->data['1hr_incall'];
                    }
                    if (isset($this->request->data['1hr_outcall'])) {
                        $rateDt['Rate']['1hr_outcall'] = $this->request->data['1hr_outcall'];
                    }

                    if (isset($this->request->data['2hr_incall'])) {
                        $rateDt['Rate']['2hr_incall'] = $this->request->data['2hr_incall'];
                    }
                    if (isset($this->request->data['2hr_outcall'])) {
                        $rateDt['Rate']['2hr_outcall'] = $this->request->data['2hr_outcall'];
                    }

                    if (isset($this->request->data['3hr_incall'])) {
                        $rateDt['Rate']['3hr_incall'] = $this->request->data['3hr_incall'];
                    }
                    if (isset($this->request->data['3hr_outcall'])) {
                        $rateDt['Rate']['3hr_outcall'] = $this->request->data['3hr_outcall'];
                    }

                    if (isset($this->request->data['addhr_incall'])) {
                        $rateDt['Rate']['addhr_incall'] = $this->request->data['addhr_incall'];
                    }
                    if (isset($this->request->data['addhr_outcall'])) {
                        $rateDt['Rate']['addhr_outcall'] = $this->request->data['addhr_outcall'];
                    }

                    if (isset($this->request->data['night_incall'])) {
                        $rateDt['Rate']['night_incall'] = $this->request->data['night_incall'];
                    }
                    if (isset($this->request->data['night_outcall'])) {
                        $rateDt['Rate']['night_outcall'] = $this->request->data['night_outcall'];
                    }

                    if (isset($this->request->data['1day_incall'])) {
                        $rateDt['Rate']['1day_incall'] = $this->request->data['1day_incall'];
                    }
                    if (isset($this->request->data['1day_outcall'])) {
                        $rateDt['Rate']['1day_outcall'] = $this->request->data['1day_outcall'];
                    }

                    if (isset($this->request->data['2day_incall'])) {
                        $rateDt['Rate']['2day_incall'] = $this->request->data['2day_incall'];
                    }
                    if (isset($this->request->data['2day_outcall'])) {
                        $rateDt['Rate']['2day_outcall'] = $this->request->data['2day_outcall'];
                    }

                    if (isset($this->request->data['weekend_incall'])) {
                        $rateDt['Rate']['weekend_incall'] = $this->request->data['weekend_incall'];
                    }
                    if (isset($this->request->data['weekend_outcall'])) {
                        $rateDt['Rate']['weekend_outcall'] = $this->request->data['weekend_outcall'];
                    }

                    $this->Rate->id = $rateExist['Rate']['id'];
                    $this->Rate->save($rateDt);
                } else {
                    $rateDt['Rate']['user_id'] = $this->request->data['uid'];

                    if (isset($this->request->data['30min_incall'])) {
                        $rateDt['Rate']['30min_incall'] = $this->request->data['30min_incall'];
                    }
                    if (isset($this->request->data['30min_outcall'])) {
                        $rateDt['Rate']['30min_outcall'] = $this->request->data['30min_outcall'];
                    }

                    if (isset($this->request->data['1hr_incall'])) {
                        $rateDt['Rate']['1hr_incall'] = $this->request->data['1hr_incall'];
                    }
                    if (isset($this->request->data['1hr_outcall'])) {
                        $rateDt['Rate']['1hr_outcall'] = $this->request->data['1hr_outcall'];
                    }

                    if (isset($this->request->data['2hr_incall'])) {
                        $rateDt['Rate']['2hr_incall'] = $this->request->data['2hr_incall'];
                    }
                    if (isset($this->request->data['2hr_outcall'])) {
                        $rateDt['Rate']['2hr_outcall'] = $this->request->data['2hr_outcall'];
                    }

                    if (isset($this->request->data['3hr_incall'])) {
                        $rateDt['Rate']['3hr_incall'] = $this->request->data['3hr_incall'];
                    }
                    if (isset($this->request->data['3hr_outcall'])) {
                        $rateDt['Rate']['3hr_outcall'] = $this->request->data['3hr_outcall'];
                    }

                    if (isset($this->request->data['addhr_incall'])) {
                        $rateDt['Rate']['addhr_incall'] = $this->request->data['addhr_incall'];
                    }
                    if (isset($this->request->data['addhr_outcall'])) {
                        $rateDt['Rate']['addhr_outcall'] = $this->request->data['addhr_outcall'];
                    }

                    if (isset($this->request->data['night_incall'])) {
                        $rateDt['Rate']['night_incall'] = $this->request->data['night_incall'];
                    }
                    if (isset($this->request->data['night_outcall'])) {
                        $rateDt['Rate']['night_outcall'] = $this->request->data['night_outcall'];
                    }

                    if (isset($this->request->data['1day_incall'])) {
                        $rateDt['Rate']['1day_incall'] = $this->request->data['1day_incall'];
                    }
                    if (isset($this->request->data['1day_outcall'])) {
                        $rateDt['Rate']['1day_outcall'] = $this->request->data['1day_outcall'];
                    }

                    if (isset($this->request->data['2day_incall'])) {
                        $rateDt['Rate']['2day_incall'] = $this->request->data['2day_incall'];
                    }
                    if (isset($this->request->data['2day_outcall'])) {
                        $rateDt['Rate']['2day_outcall'] = $this->request->data['2day_outcall'];
                    }

                    if (isset($this->request->data['weekend_incall'])) {
                        $rateDt['Rate']['weekend_incall'] = $this->request->data['weekend_incall'];
                    }
                    if (isset($this->request->data['weekend_outcall'])) {
                        $rateDt['Rate']['weekend_outcall'] = $this->request->data['weekend_outcall'];
                    }

                    $this->Rate->create();
                    $this->Rate->save($rateDt);
                }

                if (isset($this->request->data['category'])) {
                    $this->EscortCategory->deleteAll(array('EscortCategory.uid' => $this->request->data['uid']));
                    $catDt['EscortCategory']['uid'] = $this->request->data['uid'];
                    foreach ($this->request->data['category'] as $catValk => $catValv) {
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
        if (!empty($user['EscortService'])) {
            foreach ($user['EscortService'] as $sdt) {
                $myServList[$sdt['Service']['id']] = $sdt['Service']['name'];
            }
        }

        $myCatList = array();
        if (!empty($user['EscortCategory'])) {
            foreach ($user['EscortCategory'] as $sdtc) {
                $myCatList[$sdtc['Category']['id']] = $sdtc['Category']['name'];
            }
        }

        $option1 = array('conditions' => array('Category.active' => 1));
        $cat = $this->Category->find('list', $option1);

        $option2 = array('conditions' => array('Service.is_active' => 1));
        $serv = $this->Service->find('list', $option2);

        //pr($cat); pr($serv); pr($user); pr($myServList); pr($myCatList); exit;

        $this->set(compact('user', 'cat', 'serv', 'myServList', 'myCatList'));
    }

    public function escortdetails($id = null) {
        $id = base64_decode($id);
        $this->loadModel('User');
        $this->loadModel('Photo');

        $users = $this->User->find("all", array("conditions" => array("User.id" => $id)));
      //  print_r($users);
      //  exit;


        $this->loadModel("Review");
        $all = $this->Review->find("all", array("conditions" => array("Review.profile_id" => base64_decode($this->params['pass'][0])), "order" => array("Review.id" => "DESC"), "recursive" => 1));

        $all_data = array();
        foreach ($all as $key => $value) {
            $all_data[] = array("id" => $value['Review']['id'], "review" => $value['Review']['review'], "rating" => $value['Review']['rating'], "date" => $value['Review']['review_date'], "name" => $value['User']['first_name'] . " " . $value['User']['last_name'], "image" => $value['User']['profile_image']);
        }

        $this->loadModel("UserInformation");
        $option1 = array('conditions' => array('UserInformation.user_id' => $this->Session->read('fuid')));
        $userinfos = $this->UserInformation->find('first', $option1);


        $this->loadModel("Happyhour");
        $optionhappy = array('conditions' => array('Happyhour.escort_id' => $id));
        $allahppyhoursdata = $this->Happyhour->find('all', $optionhappy);
       // pr($allahppyhoursdata); exit;


        $this->loadModel('Escorttour');
        $optionstours = array('conditions' => array('Escorttour.escort_id' => $id));
       $alloptionstours = $this->Escorttour->find('all', $optionstours);

       $loggedinusers = array('conditions' => array('User.id' => $this->Session->read('fuid')));
       $optionslogged = $this->User->find('all', $loggedinusers);


       $show_privateoptions = array('conditions' => array('Photo.uid' => $id,'Photo.is_private' => 1));
       $optionsprivatestuffs = $this->Photo->find('all', $show_privateoptions);

      

        $this->set(compact('users', 'all_data', 'userinfos', 'allahppyhoursdata','alloptionstours','optionslogged','optionsprivatestuffs'));
    }

    public function message() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        $this->loadModel("Message");
        $options = array('conditions' => array('Message.to_id' => $this->Session->read('fuid')));
        $messagelist = $this->Message->find('all', $options);
        $this->set(compact('messagelist'));
    }

    public function send_msg() {
        $this->autoRender = false;
        $data = $this->request->data;
        print_r($data);
        die;
        $this->loadModel("Message");
        //if($this->Message->save())
    }

    public function emailmessage() {
        
    }

    public function mybookingrequests() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        $this->loadModel('User');
        $this->loadModel('Booking');
        //$this->loadModel('Service');

        $booking = $this->Booking->find("all", array("conditions" => array("Booking.escort_id" => $this->Session->read('fuid'))));
        //pr($users);



        $this->set(compact('booking'));
    }

    public function mycomments() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        $this->loadModel('User');
        $this->loadModel('Comment');

        $comments = $this->Comment->find("all", array("conditions" => array("Comment.user_id" => $this->Session->read('fuid'))));
        //pr($comments); exit;

        $this->set(compact('comments'));
    }

    public function myreviews() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
        $this->loadModel('User');
        $this->loadModel('Review');

        $reviews = $this->Review->find("all", array("conditions" => array("Review.profile_id" => $this->Session->read('fuid'))));
        //pr($reviews); exit;

        $this->set(compact('reviews'));
    }

    // public function myfollowing(){
    // } 
    public function myfollowerupdates() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel("Follow");
        $options = array('conditions' => array('Follow.following_id' => $this->Session->read('fuid')));
        $following = $this->Follow->find('all', $options);
        $this->set(compact('following'));
    }

    public function adonservices() {
         if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
    }

    public function mypurchasedlists() {
         if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
    }

    public function credittransactions() {
         if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
    }

    public function accountsettings() {
         if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
    }

    public function messagedetails($id = null) {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


        $this->loadModel("Message");
        $id = base64_decode($id);
        $options = array('conditions' => array('Message.id' => $id));
        $messagedetails = $this->Message->find('all', $options);
        //pr($messagedetails);exit;
        $this->set(compact('messagedetails'));
    }

    public function deletemessage($id = null) {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


        $this->loadModel("Message");

        $this->Message->id = $id;
        if (!$this->Message->exists()) {
            throw new NotFoundException(__(''));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Message->delete()) {
            $this->Session->setFlash(__('The Message has been deleted.'));
            return $this->redirect(array('action' => 'message'));
        } else {
            $this->Session->setFlash(__('The Message could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'message'));
    }

    public function rateandreview() {
        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "E") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("Review");
        $all = $this->Review->find("all", array("conditions" => array("Review.profile_id" => base64_decode($this->params['pass'][0])), "order" => array("Review.id" => "DESC"), "recursive" => 1));

        $all_data = array();
        foreach ($all as $key => $value) {
            $all_data[] = array("id" => $value['Review']['id'], "review" => $value['Review']['review'], "rating" => $value['Review']['rating'], "date" => $value['Review']['review_date'], "name" => $value['User']['first_name'] . " " . $value['User']['last_name'], "image" => $value['User']['profile_image']);
        }
        $this->set(compact('all_data'));
    }

    public function failure() {
        
    }

    public function for_kalu() {

        $this->loadModel("Category");
        $options = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options);

        $this->set(compact('category'));
    }

    public function set_happy_hours(){
      //$this->request->data

      //pr($this->Session->read()); exit;
      $stored_det = $this->Session->read();
      $logged_in_user_id = $stored_det['fdet']['id']; 

        if (!$this->Session->read('flogin') && $logged_in_user_type != "E") {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }



       //Start the Happy Hour insert 
       $this->loadModel("Happyhour"); 
       $this->loadModel("Rate"); 
       
       if($this->request->is('post'))
       {        
                $this->request->data['Happyhour']['escort_id'] = $this->request->data['escort_id'];  
                $this->request->data['Happyhour']['service_id'] = $this->request->data['service_id'];  
                $this->request->data['Happyhour']['happy_hour_type'] = $this->request->data['happy_hour_type'];
                $this->request->data['Happyhour']['happy_hour_rate'] = $this->request->data['happy_hour_rate'];
                $this->request->data['Happyhour']['availibilty'] = $this->request->data['availibilty'];
                $this->request->data['Happyhour']['phone_number'] = $this->request->data['phone_number'];
                $this->request->data['Happyhour']['description'] = $this->request->data['description'];
                
               // pr($this->request->data); exit;
                $this->Happyhour->create();


                if ($this->Happyhour->save($this->request->data)) {
                   $this->Session->setFlash('Happy hours have been Added', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'set_happy_hours'));
                }
       }

       $optionshappyhours = array('conditions' => array('Happyhour.escort_id' => $this->Session->read('fuid')));
       $allahppyhoursdata = $this->Happyhour->find('all', $optionshappyhours);
       //pr($allahppyhoursdata); exit;

       $this->set(compact('allahppyhoursdata'));
        
    }

    public function escort_tour_plans(){

         //$this->request->data

      //pr($this->Session->read()); exit;
      $stored_det = $this->Session->read();
      //$logged_in_user_id = $stored_det['fdet']['id']; 

        if (!$this->Session->read('flogin') && $logged_in_user_type != "E") {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


       $this->loadModel("Escorttour"); 
       $this->loadModel("State"); 
       $this->loadModel("City"); 
      
       if($this->request->is('post'))
       {        
                
               // pr($this->request->data); exit;
                $this->request->data['Escorttour']['country_id'] = $this->request->data['country_id'];  
                 $this->request->data['Escorttour']['state_id'] = $this->request->data['state_id'];
                $this->request->data['Escorttour']['city_id'] = $this->request->data['city_id'];  
                $this->request->data['Escorttour']['phone'] = $this->request->data['phone'];
                $this->request->data['Escorttour']['phone_instruction'] = $this->request->data['phone_instruction'];
                $this->request->data['Escorttour']['escort_id'] = $this->request->data['escort_id'];
                $this->request->data['Escorttour']['tour_from'] = $this->request->data['from'];
                $this->request->data['Escorttour']['tour_to'] = $this->request->data['to'];
                
              
                $this->Escorttour->create();


                if ($this->Escorttour->save($this->request->data)) {
                   $this->Session->setFlash('Escort have been Added', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'escort_tour_plans'));
                }
       }

      
       //pr($allahppyhoursdata); exit;

       $optionsstate = array('conditions' => array('State.is_active' => 'Y','State.country_id' => '158'));
       $allstates = $this->State->find('all', $optionsstate);


       $optionscity = array('conditions' => array('City.is_active' => 'Y','City.country_id' => '158'));
       $allcities = $this->City->find('all', $optionscity);

        $optionstours = array('conditions' => array('Escorttour.escort_id' => $this->Session->read('fuid')));
       $alloptionstours = $this->Escorttour->find('all', $optionstours);

       $this->set(compact('alloptionstours','allstates','allcities'));
      
    }

    public  function manage_booking(){
        if (!$this->Session->read('flogin') && $logged_in_user_type != "E") {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

       $this->loadModel("EscortEvent");

       $optionstours = array('conditions' => array('EscortEvent.user_id' => $this->Session->read('fuid')));
       $alloptionstours = $this->EscortEvent->find('all', $optionstours);
      // pr($alloptionstours); exit;
        $this->set(compact('alloptionstours'));


    }

    public function get_booked_info($id=""){
      $this->autoRender=false;
      $this->loadModel('Booking');
      $bookingInfo = $this->Booking->find("first", array("conditions"=>array("Booking.id"=>$id)));
      echo json_encode($bookingInfo);
    }

    public function acpt_bking($id=""){
      //echo $id; exit;
      $this->autoRender=false;
      $this->loadModel('Booking');
      if($this->Booking->find("count", array("conditions"=>array("Booking.id"=>$id)))){
      $this->Booking->id=$id;
        if($this->Booking->save(array("Booking"=>array("status"=>1)))){
          echo 1;
        }
      }
      
    }

public function accept_book(){
      //echo $id; exit;
      $this->autoRender=false;
      $catDt = array();
      $this->loadModel('Booking');
      $catDt = array();

      $this->Booking->id = $this->Booking->field('id', array('id' => $this->request->data('id')));
      if ($this->Booking->id) {
        $this->Booking->saveField('status', 1);
        echo 1;
      }

      // $id = $this->request->data('id');
      
      // $options = array('conditions' => array('Booking.id' => $id));
      // $name = $this->Booking->find('first', $options);

      // $catDt['Booking']['booking_type'] = 1;

      // if ($this->Booking->save($catDt)) {
      //  echo 1;
      // } else {
      //  echo 0;
      // }
      // // if($this->Booking->find("count", array("conditions"=>array("Booking.escort_id" => $escort_id,"Booking.user_id" => $user_id)))){
      // // //$this->Booking->id=$id;
      // //   if($this->Booking->save(array("Booking"=>array("status"=>1)))){
      // //     echo 1;
      // //   }
      // // }
      
    }

    public  function manage_schedule(){

    }

    public function deleteescorttour($id = null){
        //$this->layout = null;
        $this->loadModel("Escorttour"); 
       pr($_POST); exit;
        if ($this->Escorttour->delete($_POST['id'])) { echo 1; } else { echo 0; } exit;
        $this->autoRender = false;
        $this->redirect(array('action' => 'escort_tour_plans'));
    }


     public function deletehappyhours($id = null){
        //$this->layout = null;
        $this->loadModel("Happyhour"); 
        pr($_POST); exit;
        if ($this->Happyhour->delete($_POST['id'])) { echo 1; } else { echo 0; } exit;
        $this->autoRender = false;
        $this->redirect(array('action' => 'set_happy_hours'));
     }
    // public function editescorttour($id = null) {


    //     $this->loadModel('Escorttour');

    //     if (!$this->Escorttour->exists($id)) {
    //         throw new NotFoundException(__('Invalid Escorttour'));
    //     }


    //     if ($this->request->is(array('post', 'put'))) {


    //         $options = array('conditions' => array('Escorttour.state_id' => $this->request->data['Escorttour']['state_id']));
    //         $state_id = $this->Escorttour->find('first', $options);


    //         if ($this->Escorttour->save($this->request->data)) {
    //             $this->Session->setFlash(__('The Escorttour has been saved.'));
    //         } else {
    //             $this->Session->setFlash(__('The Escorttour could not be saved. Please, try again.'));
    //         }
    //     } else {
    //         $options = array('conditions' => array('Category.' . $this->Escorttour->primaryKey => $id));
    //         $this->request->data = $this->Escorttour->find('first', $options);
    //     }

    //     $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    // }


    // public function editescorttour($id = null) {
       
    //     $this->loadModel('Escorttour');

    //     if (!$this->Escorttour->exists($id)) {
    //         throw new NotFoundException(__('Invalid Escorttour'));
    //     }



    //     $types = $this->Restaurant->find('first', array('conditions' => array('Restaurant.id' => $id)));

    //     $this->loadModel('Cuisine');
    //     $restcuisines = $this->Cuisine->find('all', array('conditions' => array('Cuisine.is_active' => 1)));


    //     $this->loadModel('Country');
    //     $options1 = array('conditions' => array('Country.is_active' => 'Y'));
    //     $countries = $this->Country->find('list', $options1);

    //     $this->loadModel('State');
    //     $options2 = array('conditions' => array('State.is_active' => 'Y'), 'order' => array('State.name' => 'ASC'));
    //     $states = $this->State->find('list', $options2);

    //     $this->loadModel('City');
    //     $options3 = array('conditions' => array('City.is_active' => 'Y'));
    //     $cities = $this->City->find('list', $options3);


    //     $this->set(compact('cuisines', 'countries', 'states', 'cities'));

    //     if ($this->request->is(array('post', 'put'))) {

    //         $text_slug = trim($this->request->data['Restaurant']['name']);
    //         $slug_url = $this->create_slug($text_slug);
    //         $this->request->data['Restaurant']['slug'] = $slug_url;


    //         $this->request->data['Restaurant']['meta_title'] = trim($this->request->data['Restaurant']['name']);


    //         $address = $this->request->data['Restaurant']['address']; // Google HQ
    //         $prepAddr = str_replace(' ', '+', $address);
    //         $geocode = file_get_contents('http://maps.google.com/maps/api/geocode/json?address=' . $prepAddr . '&sensor=false');
    //         $output = json_decode($geocode);
    //         $latitude = $output->results[0]->geometry->location->lat;
    //         $longitude = $output->results[0]->geometry->location->lng;

    //         $this->request->data['Restaurant']['lat'] = $latitude;
    //         $this->request->data['Restaurant']['lang'] = $longitude;



    //         if (isset($this->request->data['Restaurant']['image']) && $this->request->data['Restaurant']['image']['name'] != '') {
    //             $ext = explode('/', $this->request->data['Restaurant']['image']['type']);
    //             if ($ext) {
    //                 $uploadFolder = "restuarent_image";
    //                 $uploadPath = WWW_ROOT . $uploadFolder;
    //                 $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
    //                 if (in_array($ext[1], $extensionValid)) {
    //                     $imageName = $this->request->data['Restaurant']['image']['name'];
    //                     $full_image_path = $uploadPath . '/' . $imageName;
    //                     move_uploaded_file($this->request->data['Restaurant']['image']['tmp_name'], $full_image_path);
    //                     $this->request->data['Restaurant']['image'] = $this->request->data['Restaurant']['image']['name'];
    //                 } else {
    //                     $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
    //                 }
    //             }
    //         } else {
    //             $this->request->data['Restaurant']['image'] = $this->request->data['Restaurant']['hidprofile_img'];
    //         }

    //         $iiiii = implode(',', $this->request->data['Restaurant']['cuisine_id']);
    //         $this->request->data['Restaurant']['cuisine_id'] = $iiiii;

    //         if ($this->Restaurant->save($this->request->data)) {

    //             $this->Session->setFlash(__('The Restaurant has been saved.'));
    //         } else {
    //             $this->Session->setFlash(__('The Restaurant could not be saved. Please, try again.'));
    //         }
    //     } else {
    //         $options = array('conditions' => array('Restaurant.' . $this->Restaurant->primaryKey => $id));
    //         $this->request->data = $this->Restaurant->find('first', $options);
    //     }

    //     $this->set(compact('title_for_layout', 'attrs', 'editattrs', 'types', 'restcuisines'));
    // }

     public function myblacklistcustomer(){
         if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        $this->loadModel('User');
        $this->loadModel('Blacklist');
        $this->loadModel('Country');
        $this->loadModel('Location');




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

            //Country List
            $optioncntry = array('conditions' => array('Country.id' => 158));
            $getallcountry = $this->Country->find('list', $optioncntry);
            //pr($getallcountry); exit;

            $optionlocation = array('conditions' => array('Location.country_id' => 158));
            $getallloc = $this->Location->find('list', $optionlocation);
            

            $this->set(compact('user2', 'userotherlists','getalldata','getallcountry','getallloc'));


        } else {
            $optionuserotherlists = array('conditions' => array('User.id !=' => $this->Session->read('fuid')));
            $userotherlists = $this->User->find('all', $optionuserotherlists);

            $optioncntry = array('conditions' => array('Country.id' => 158));
            $getallcountry = $this->Country->find('list', $optioncntry);
            //pr($getallcountry); exit;

            $optionlocation = array('conditions' => array('Location.country_id' => 158));
            $getallloc = $this->Location->find('list', $optionlocation);

            $this->set(compact('userotherlists','getallcountry','getallloc'));
        }
     }

     public function add_to_blacklist(){
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
            $catDt['Blacklist']['cntry_id'] = $this->request->data['country_id'];
            $catDt['Blacklist']['location_id'] = $this->request->data['location_id'];
            $catDt['Blacklist']['cust_identity'] = $this->request->data['cust_identity'];


            $this->Blacklist->create();
            $this->Blacklist->save($catDt);
            $this->Session->setFlash('Your Have blacklisted Users', 'success');
            $this->redirect('/escorts/myblacklistcustomer');
        }
     }

     public function deleteblacklist($id = null) {
     // echo $id ; exit;
        $this->loadModel("Blacklist");



        $this->Blacklist->id = $id;
        if (!$this->Blacklist->exists()) {
            throw new NotFoundException(__(''));
            $this->redirect(array('action' => 'myblacklistcustomer'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Blacklist->delete()) {
            $this->Session->setFlash(__('The Blacklist has been removed.'));
            return $this->redirect(array('action' => 'myblacklistcustomer'));
        } else {
            $this->Session->setFlash(__('The Coustomer cannot be removed from the blacklst. Please, try again.'));
        }
        return $this->redirect(array('action' => 'myblacklistcustomer'));
    }

    public function get_location(){
         $this->layout = false;
         $this->autoRender = false;
//$this->layout = 'ajax';

        $this->loadModel('Location');

        $options2 = array('conditions' => array('Location.country_id' => $_REQUEST['stId']));
        $citylist = $this->Location->find('list', $options2);

       //  pr($citylist);
       // exit;

        $this->set(compact('citylist'));
  
    }

    public function savecalenderdata(){

        if (!$this->Session->read('fuid')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }


        $this->layout = false;
        $this->autoRender = false;

        $starttime = strtotime($_REQUEST['start']);
        $endime = strtotime($_REQUEST['end']);

        $strdt = $starttime;

        $str = date("Y-m-d H:i:s", $strdt);

        $endstr = $endime;
        $end = date("Y-m-d H:i:s", $endstr);
        
        $id = uniqid(rand());

        $this->loadModel('EscortEvent');  

        $event['EscortEvent']['eventname'] = "Available";
        $event['EscortEvent']['start_time'] = $str;
        $event['EscortEvent']['end_time'] = $end;
        $event['EscortEvent']['unique_id'] = $id;
        $event['EscortEvent']['user_id'] = $this->Session->read('fuid');
        //$event['UserEvent']['recurring'] = 1;
        $this->EscortEvent->create();
        if($this->EscortEvent->save($event))
        {
          echo $data = str_replace(' ','T',$str).'|'.str_replace(' ','T',$end).'|'.$this->EscortEvent->getLastInsertID();
        }
        return $this->redirect(array('action' => 'manage_booking'));
        exit;
    }


    public function escortshops(){
        if (!$this->Session->read('Auth.Escort')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }
       

        $this->loadModel("Escort");
        $this->loadModel("Photo");
        if ($this->request->is('post')) {



           $catDt['Photo']['is_active'] = $this->request->data['agree'];  
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
                        $catDt['Photo']['is_private'] = $this->request->data['is_private'];
                        $this->Photo->create();
                        $this->Photo->save($catDt);

                        $this->Session->setFlash(__('Image submitted successfully for Admin approval'));
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade image. Image cannot blank.'));
            }


            if (isset($_FILES['vid']['name']) && $_FILES['vid']['name'] != '') {
                $ext = explode('.', $_FILES['vid']['name']);
                if ($ext) {
                    $uploadFolder = "user_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('mp4');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = "escort_" . uniqid() . '.' . $ext[1];
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($_FILES['vid']['tmp_name'], $full_image_path);
                        $catDt['Photo']['uid'] = $this->request->data['uid'];
                        $catDt['Photo']['img'] = $imageName;
                        $catDt['Photo']['is_private'] = $this->request->data['is_private'];
                        $this->Photo->create();
                        $this->Photo->save($catDt);

                        $this->Session->setFlash(__('Video submitted successfully for Admin approval'));
                    } else {
                        $this->Session->setFlash(__('Please uploade video of .mp4 format.'));
                    }
                }
            } else {
                $this->Session->setFlash(__('Please uploade Video. Video cannot blank.'));
            }
        }


        $this->Escort->recursive = 2;
        $option = array('conditions' => array('Escort.id' => $this->Session->read('fuid')));
        $user = $this->Escort->find('first', $option);

        $optionprivate = array('conditions' => array('Photo.uid' => $this->Session->read('fuid'),'Photo.is_private' => 1,'Photo.is_active' => 1));
        $userPhoto = $this->Photo->find('all', $optionprivate);



        //pr($user); exit;
        $this->set(compact('user','userPhoto'));
    }
   
  public function private_gallery(){
      if (!$this->Session->read('fuid')) {
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("Photo");
        $this->loadModel("User");

        $this->Escort->recursive = 2;
        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $user = $this->User->find('first', $option);

        $optionprivate = array('conditions' => array('Photo.uid' => $this->Session->read('fuid'),'Photo.is_private' => 1));
        $userPhoto = $this->Photo->find('all', $optionprivate);



        //pr($user); exit;
        $this->set(compact('userPhoto','user'));

       
  }

  public function escort_site($id = null){
    $this->layout = 'escort_site';
    

        $id = base64_decode($id);
        $this->loadModel('User');
        $this->loadModel('Photo');

        $users = $this->User->find("all", array("conditions" => array("User.id" => $id)));


        $this->loadModel("Review");
        $all = $this->Review->find("all", array("conditions" => array("Review.profile_id" => base64_decode($this->params['pass'][0])), "order" => array("Review.id" => "DESC"), "recursive" => 1));

        $all_data = array();
        foreach ($all as $key => $value) {
            $all_data[] = array("id" => $value['Review']['id'], "review" => $value['Review']['review'], "rating" => $value['Review']['rating'], "date" => $value['Review']['review_date'], "name" => $value['User']['first_name'] . " " . $value['User']['last_name'], "image" => $value['User']['profile_image']);
        }

        $this->loadModel("UserInformation");
        $option1 = array('conditions' => array('UserInformation.user_id' => $this->Session->read('fuid')));
        $userinfos = $this->UserInformation->find('first', $option1);


        $this->loadModel("Happyhour");
        $optionhappy = array('conditions' => array('Happyhour.escort_id' => $id));
        $allahppyhoursdata = $this->Happyhour->find('all', $optionhappy);
       // pr($allahppyhoursdata); exit;


        $this->loadModel('Escorttour');
        $optionstours = array('conditions' => array('Escorttour.escort_id' => $id));
       $alloptionstours = $this->Escorttour->find('all', $optionstours);

       $loggedinusers = array('conditions' => array('User.id' => $this->Session->read('fuid')));
       $optionslogged = $this->User->find('all', $loggedinusers);


       $show_privateoptions = array('conditions' => array('Photo.uid' => $id,'Photo.is_private' => 1));
       $optionsprivatestuffs = $this->Photo->find('all', $show_privateoptions);

      

        $this->set(compact('users', 'all_data', 'userinfos', 'allahppyhoursdata','alloptionstours','optionslogged','optionsprivatestuffs'));

  }
  
}
