<?php

App::uses('AppController', 'Controller');

//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
    /* function beforeFilter() {
      parent::beforeFilter();
      } */

    /**
     * Components
     *
     * @var array
     */
    public $name = 'Users';
    public $components = array('Session', 'RequestHandler', 'Paginator');
    var $uses = array('User', 'Country', 'City', 'SiteSetting','WebsiteTemplate','Membershipattrbute');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index', 'admin_login', 'admin_logout', 'admin_register', 'admin_forgot_password', 'admin_dashboard', 'login', 'autoLogin', 'site_logo', 'registerinfo', 'index', 'signup', 'frontUserLogin', 'logout', 'checkemail', 'getCityListOfCountry', 'getCityListOfState', 'checkusername', 'unfollow', 'onlineescorts', 'changepass', 'admin_userindex', 'admin_userdelete', 'admin_membership', 'admin_packageactive', 'admin_purchesedmembership', 'admin_addescort', 'admin_categoryadd', 'admin_categorylist', 'admin_addsubcategory', 'admin_editcat', 'admin_deletecat', 'admin_productadd', 'admin_productlist', 'admin_uploadimage', 'admin_uploadProduct', 'admin_imagedelete', 'admin_editproduct', 'admin_deleteproduct', 'purchased', 'escorttours', 'admin_listlanguage', 'admin_addlanguage', 'admin_editlanguage', 'admin_deletelanguage', 'admin_activelanguage', 'deletebooking', 'admin_activeetenecty', 'admin_deleteetenecity', 'admin_editetenecity', 'admin_listetenecity', 'admin_addetenecity', 'admin_addcategory', 'admin_listcategory', 'admin_editcategory', 'admin_deletecategory', 'admin_activecategory', 'admin_addnationality', 'admin_listnationality', 'admin_editnationality', 'admin_deletenationality', 'admin_activenationality', 'admin_addworkroomcat', 'admin_listworkroomcat', 'admin_editworkroomcat', 'admin_deleteworkroomcat', 'admin_activeworkroomcat','admin_orderlist','admin_deleteOrder','admin_detailOrder','admin_orderdetails','admin_approvephotos','admin_activephoto','success','admin_websitetemplates','admin_activetemplate','admin_memattributeadd','admin_memattributelist','admin_editmemattribute','admin_deletememattribute','admin_membership_feature','admin_addclub','admin_addagency','admin_addparlor','accountsettings','escortlist','massageparlours','stripperlist');
    }

    public function login() {
        $userid = $this->Session->read('userid');
        $username = $this->Session->read('username');
        $title_for_layout = 'Sign In';
        $this->set(compact('title_for_layout'));
        if (isset($userid) && $userid != '') {
            return $this->redirect(array('action' => 'dashboard'));
        }
        if ($this->request->is('post')) {
            $options = array('conditions' => array('User.email' => $this->request->data['User']['email'], 'User.password' => md5($this->request->data['User']['passwordl']), 'User.is_active' => 1));
            $loginuser = $this->User->find('first', $options);

            if (!$loginuser) {
                $this->Session->setFlash(__('Invalid email or password or inactive account.', 'default', array('class' => 'error')));
                return $this->redirect(array('action' => 'login'));
            } else {
                $this->Session->write('userid', $loginuser['User']['id']);
                $this->Session->write('username', $loginuser['User']['first_name']);
                $this->Session->setFlash(__('Login Successful.', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => 'dashboard'));
            }
        }
    }

    public function autoLogin($fb_user_id = null) {
        $data = '';
        if ($fb_user_id != '') {
            $options = array('conditions' => array('User.fb_user_id' => $fb_user_id, 'User.is_active' => 1));
            $loginuser = $this->User->find('first', $options);
            if (!$loginuser) {
                $data = 'Register@@@@null';
            } else {
                $this->Session->write('userid', $loginuser['User']['id']);
                $this->Session->write('username', $loginuser['User']['first_name']);
                $data = 'Login@@@@' . $loginuser['User']['first_name'];
            }
        }
        echo $data;
        exit;
    }

    /**
     * index method
     *
     * @return void
     */
    public function site_logo() {
        $this->loadModel('SiteSetting');
        $setting_array = array('conditions' => array('`SiteSetting`.`id`' => 1));
        $Content = $this->SiteSetting->find('first', $setting_array);
        $logo_name = 'logo.png';
        if (count($Content) > 0 && !empty($Content)) {
            foreach ($Content as $val) {
                if ($val['SiteSetting']['site_logo'] != '') {
                    $logo_name = $val['SiteSetting']['site_logo'];
                }
            }
        }
        return $logo_name;
    }

    // public function index() {
    //     $this->loadModel('Category');
    //     $title_for_layout = 'Home';
    //     $Category_array = array('conditions' => array('`Category`.`parent_id`' => 0, '`Category`.`active`' => 1));
    //     $Category_list = $this->Category->find('list', $Category_array);
    //     $this->set('Category_list', $Category_list);
    //     $this->set(compact('title_for_layout', 'FemaleEscorts_list', 'MaleEscorts_list'));
    // }

    public function change_password() {
        $title_for_layout = 'Edit Profile';
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect(array('action' => 'login'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
        $user = $this->User->find('first', $options);
        if ($this->request->is(array('post', 'put'))) {
            $prev_pass = $user['User']['txt_password'];
            $curr_pass = $this->request->data['User']['curr_pass'];
            $new_pass = $this->request->data['User']['new_pass'];

            //$PasswordHasher = new SimplePasswordHasher();
            //$curr_pass_hash=$PasswordHasher->hash($curr_pass);
            if ($prev_pass != $curr_pass) {
                $this->Session->setFlash('Invalid current password.', 'default');
                return $this->redirect(array('action' => 'change_password'));
            } else {
                if ($this->request->data['User']['new_pass'] == $this->request->data['User']['con_pass']) {

                    $user_data_auth['User']['id'] = $userid;
                    $user_data_auth['User']['password'] = md5($new_pass);
                    $user_data_auth['User']['txt_password'] = $this->request->data['User']['con_pass'];
                    if ($this->User->save($user_data_auth)) {
                        $this->Session->setFlash('Password updated successfully.', 'default', array('class' => 'success'));
                        return $this->redirect(array('action' => 'change_password'));
                    }
                } else {
                    $this->Session->setFlash('Password Does not matched.', 'default');
                    return $this->redirect(array('action' => 'change_password'));
                }
            }
        }
        //$this->set(compact('user'));
        $this->set(compact('user', 'title_for_layout'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
    }

    public function admin_addsubadmin() {
        $this->loadModel("Privilege");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'addsubadmin'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'addsubadmin'));
            } else {
                if (!empty($this->request->data['User']['profile_image']['name'])) {
                    $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'addsubadmin'));
                    }
                } else {
                    $this->request->data['User']['profile_image'] = '';
                }




                $this->request->data['User']['join_date'] = date('Y-m-d');
                $this->request->data['User']['is_active'] = 1;
                $this->request->data['User']['is_admin'] = 1;

                if ($this->User->save($this->request->data)) {
                    $last_user = $this->User->getLastInsertId();
                    $this->request->data['Privilege']['user_id'] = $last_user;
                    $this->Privilege->save($this->request->data);
                    $this->Session->setFlash('The subadmin has been saved.', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'addsubadmin'));
                } else {
                    $this->Session->setFlash(__('The subadmin could not be saved. Please, try again.'));
                }
            }
        }
    }

    public function admin_subadmin() {
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
            $conditions['User.is_admin'] = 1;
            $conditions['User.id !='] = 1;
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
                    $is_active = isset($this->params['named']['is_active']) ? $this->params['named']['is_active'] : '';
                    //pr($is_active);exit;
                    if ($is_active == '1') {
                        //echo "hello";exit;
                    } else if ($is_active == '') {
                        //$this->params['named']['is_active']=0;
                        $conditions['User.is_active ='] = 0;
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
        $this->Paginator->settings = array(
            'conditions' => $conditions,
            'order' => $order_by,
            'limit' => $limit,
            'fields' => array('User.id', 'User.name', 'User.username', 'User.email', 'User.department', 'User.join_date', 'User.profile_image')
        );

        $total_user = $this->User->find('count', array('conditions' => $conditions));

        $users = $this->Paginator->paginate('User');
        $this->set(compact('users', 'total_user'));
    }

    public function admin_userindex() {

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
            $conditions['User.user_type'] = 'U';
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

                    $is_active = isset($this->params['named']['is_active']) ? $this->params['named']['is_active'] : '';
                    //pr($is_active);exit;
                    if ($is_active == '1') {
                        //echo "hello";exit;
                    } else if ($is_active == '') {
                        //$this->params['named']['is_active']=0;
                        $conditions['User.is_active ='] = 0;
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

        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit,
        );

        $total_user = $this->User->find('count', array('conditions' => $conditions));
        $total_active_user = $this->User->find('count', array('conditions' => array('User.is_active' => 1, 'User.is_admin !=' => 1, 'User.user_type' => 'U')));
        $total_inactive_user = $this->User->find('count', array('conditions' => array('User.is_active' => 0, 'User.is_admin !=' => 1, 'User.user_type' => 'U')));

        $users = $this->Paginator->paginate('User');
        $this->set(compact('users', 'total_user', 'total_active_user', 'total_inactive_user'));
    }

    public function admin_useractive($id = null) {

        $checkuser = $this->User->find('first', array('conditions' => array('User.id' => $id)));
        if ($checkuser['User']['is_active'] == 1) {
            $status = 0;
        } elseif ($checkuser['User']['is_active'] == '') {
            $status = 1;
        }

        $this->User->updateAll(array('User.is_active' => "'$status'"), array('User.id' => $id));
        return $this->redirect(array('action' => 'userindex'));
    }

    public function admin_editsubadmin($id = null) {
        $this->loadModel("Privilege");
        //echo $id;exit;
        //echo "hello";exit;

        /* $userid = $this->Session->read('userid');
          if(!isset($userid) && $userid==''){
          $this->redirect('/admin');
          }
          $title_for_layout = 'User Edit';
          $this->set(compact('title_for_layout'));
          if (!$this->User->exists($id)) {
          throw new NotFoundException(__('Invalid user'));
          } */
        if ($this->request->is(array('post', 'put'))) {

            if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] != '') {
                $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            } else {
                $this->request->data['User']['password'] = $this->request->data['User']['hidpw'];
            }

            if (isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name'] != '') {

                $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                $ext = $pathpart['extension'];

                $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                if (in_array(strtolower($ext), $extensionValid)) {
                    $uploadFolder = "user_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $filename = uniqid() . '.' . $ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                    $this->request->data['User']['profile_image'] = $filename;


                    /* $ext = explode('.',$this->request->data['User']['profile_image']['name']);
                      if($ext){
                      $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');

                      $extensionValid = array('jpg','jpeg','png','gif');
                      if(in_array($ext[1],$extensionValid)){
                      $imageName = rand().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
                      $full_image_path = $uploadPath . '/' . $imageName;
                      move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path);
                      $this->request->data['User']['profile_image'] = $imageName; */
                } else {
                    $this->Session->setFlash(__('Invalid Image Type'));
                    return $this->redirect(array('action' => 'editsubadmin', $id));
                }
            } else {
                $this->request->data['User']['profile_image'] = $this->request->data['User']['hid_profile_image'];
            }

            //pr($this->request->data);exit;
            //pr($this->request->data['Privilege']);exit;


            $this->Privilege->updateAll($this->request->data['Privilege'], array('Privilege.user_id' => $id));

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => 'subadmin'));

                //return $this->redirect(array('action' => 'admin_edit/'.$id));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                return $this->redirect(array('action' => 'subadmin'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);

            $options1 = array('conditions' => array('Privilege.user_id' => $id));
            $Privileges = $this->Privilege->find('first', $options1);
            //pr($Privileges);exit;
            //pr($this->request->data);exit;
            $this->set(compact('Privileges'));
        }
    }

    public function admin_addescort() {
        $this->loadModel("Country");
        $this->loadModel("State");
        $this->loadModel("City");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'addescort'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'addescort'));
            } else {


                if (!empty($this->request->data['User']['profile_image']['name'])) {
                    $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'addagency'));
                    }
                } else {
                    $this->request->data['User']['profile_image'] = '';
                }

                $this->request->data['User']['join_date'] = date('Y-m-d');

                $this->request->data['User']['user_type'] = 'E';
                $this->request->data['User']['is_active'] = 1;
                //pr($this->request->data);exit;
                if ($this->User->save($this->request->data)) {

                    $this->Session->setFlash('The Escort has been saved.', 'default', array('class' => 'success'));
                    return $this->redirect(['controller' => 'escorts', 'action' => 'index']);
                } else {
                    $this->Session->setFlash(__('The Escort could not be saved. Please, try again.'));
                }
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $states = $this->State->find('list', array('fields' => array('State.id', 'State.name')));
        $cities = $this->City->find('list', array('fields' => array('City.id', 'City.name')));
        $this->set(compact('countries', 'states', 'cities'));
    }

    public function admin_addagency() {
        $this->loadModel("Country");
        $this->loadModel("State");
        $this->loadModel("City");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'addagency'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'addagency'));
            } else {
                if (!empty($this->request->data['User']['profile_image']['name'])) {
                    $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'addagency'));
                    }
                } else {
                    $this->request->data['User']['profile_image'] = '';
                }

                $this->request->data['User']['join_date'] = date('Y-m-d');

                $this->request->data['User']['user_type'] = 'A';
                $this->request->data['User']['is_active'] = 1;
                if ($this->User->save($this->request->data)) {

                    $this->Session->setFlash('The Agency has been saved.', 'default', array('class' => 'success'));

                    return $this->redirect(['controller' => 'agencies', 'action' => 'index']);
                } else {
                    $this->Session->setFlash(__('The addescort could not be saved. Please, try again.'));
                }
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $states = $this->State->find('list', array('fields' => array('State.id', 'State.name')));
        $cities = $this->City->find('list', array('fields' => array('City.id', 'City.name')));
        $this->set(compact('countries', 'states', 'cities'));
    }

    //Admin Add Agency

    public function admin_addparlor() {
        $this->loadModel("Country");
        $this->loadModel("State");
        $this->loadModel("City");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'addagency'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'addagency'));
            } else {
                if (!empty($this->request->data['User']['profile_image']['name'])) {
                    $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'addagency'));
                    }
                } else {
                    $this->request->data['User']['profile_image'] = '';
                }

                $this->request->data['User']['join_date'] = date('Y-m-d');

                $this->request->data['User']['user_type'] = 'P';
                $this->request->data['User']['is_active'] = 1;
                if ($this->User->save($this->request->data)) {

                    $this->Session->setFlash('The Agency has been saved.', 'default', array('class' => 'success'));

                    return $this->redirect(['controller' => 'parlors', 'action' => 'index']);
                } else {
                    $this->Session->setFlash(__('The addescort could not be saved. Please, try again.'));
                }
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $states = $this->State->find('list', array('fields' => array('State.id', 'State.name')));
        $cities = $this->City->find('list', array('fields' => array('City.id', 'City.name')));
        $this->set(compact('countries', 'states', 'cities'));
    }




    public function admin_changecity($state_id = null) {
        $this->loadModel('City');
        $cities = $this->City->find('list', array('conditions' => array('City.state_id' => $state_id), 'fields' => array('City.id', 'City.name')));
        $output = "";
        foreach ($cities as $key => $city) {
            $output.="<option value='" . $key . "'>" . $city . "</option>";
        }
        echo $output;
        exit;
    }

    public function dashboard() {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            return $this->redirect(array('action' => 'login'));
        }
    }

    public function registerinfo() {
        $title_for_layout = 'Register Info';
        $this->set(compact('title_for_layout'));
    }

    public function fotgotpassword() {

        $title_for_layout = 'Forgot Password';
        $this->set(compact('title_for_layout'));

        if ($this->request->is(array('post', 'put'))) {

            //pr($this->request->data); //exit;

            $this->User->recursive = -1;
            $options = array('conditions' => array('User.email' => $this->request->data['email']));
            $user = $this->User->find('first', $options);
            //pr($user); exit;
            if ($user) {
                $length = 6;
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . '0123456789';
                $str = '';
                $max = strlen($chars) - 1;
                for ($i = 0; $i < $length; $i++)
                    $str .= $chars[rand(0, $max)];
                $password = $str;

                $this->request->data['User']['id'] = $user['User']['id'];
                $this->request->data['User']['password'] = md5($password);
                $this->request->data['User']['txt_password'] = $password;

                if ($this->User->save($this->request->data)) {
                    $this->loadModel('SiteSetting');
                    $this->loadModel('EmailTemplate');
                    $siteSetting = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1)));
                    $tpl = $this->EmailTemplate->find("first", array("conditions" => array("EmailTemplate.id" => 10)));
                    //pr($siteSetting); pr($tpl);

                    if ($siteSetting) {
                        if ($siteSetting['SiteSetting']['contact_email'] != "") {
                            $adminEmail = $siteSetting['SiteSetting']['contact_email'];
                        } else {
                            $adminEmail = 'admin@escort.com';
                        }
                    } else {
                        $adminEmail = 'admin@escort.com';
                    }


                    $site_name = $siteSetting['SiteSetting']['site_name'];

                    $name = $user['User']['name'];
                    $msg_body = str_replace(array('[NAME]', '[PASSWORD]'), array($name, $password), $tpl['EmailTemplate']['content']);
                    $this->send_mail($adminEmail, $email, $tpl['EmailTemplate']['subject'], $msg_body);

                    //echo $msg_body;
                    //  #########################################################
                    //  App::uses('CakeEmail', 'Network/Email');
                    //  $Email = new CakeEmail();
                    //  /* pass user input to function */
                    //  $Email->emailFormat('both');
                    //  $Email->from(array($adminEmail => $site_name));
                    //  $Email->to($user['User']['email']);
                    //  $Email->subject($site_name.' Forgot Password');
                    //  $Email->send($msg_body);
                    //  #########################################################

                    $this->Session->setFlash('Your new password has been sent to your email.', 'success');
                    return $this->redirect(array('action' => 'forgotpassword'));
                }
            } else {
                $this->Session->setFlash('Invalid email provided. Please, try again.', 'error');
            }
        }
    }

    public function getCityListOfCountry() {

        $this->layout = null;
        $this->loadModel('Country');
        $this->loadModel('State');
        $this->loadModel('City');

        //pr($this->request->data);
        $options = array('conditions' => array('State.country_id' => $this->request->data['cid']));
        $stateList = $this->State->find('all', $options);

        //pr($stateList); exit;
        $st = array();
        foreach ($stateList as $stl) {
            $st[] = $stl['State']['id'];
        }

        $option = array('conditions' => array('City.state_id' => $st));
        $cityList = $this->City->find('list', $option);
        //pr($cityList); exit;
        $this->set(compact('cityList'));
    }

    public function getCityListOfState() {

        $this->layout = null;

        $this->loadModel('City');


        $option = array('conditions' => array('City.state_id' => $this->request->data['cid']));
        $cityList = $this->City->find('list', $option);
        //pr($cityList); exit;
        $this->set(compact('cityList'));
    }

    public function checkusername() {

        //pr($this->request->data); exit;
        $options = array('conditions' => array('User.username' => $this->request->data['username']));
        $usernameexists = $this->User->find('first', $options);

        if ($usernameexists) {
            echo 1;
        } else {
            echo 0;
        } exit;
    }

    public function checkemail() {

        //pr($this->request->data); exit;
        $options = array('conditions' => array('User.email' => $this->request->data['email']));
        $emailexists = $this->User->find('first', $options);

        if ($emailexists) {
            echo 1;
        } else {
            echo 0;
        } exit;
    }

    public function signup() {

        $title_for_layout = 'Sign up';
        if ($this->request->is('post')) {

           //pr($this->request->data); exit;

            $flag = true;
            $email = $this->request->data['email'];
            $count_email = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($count_email > 0) {
                $this->Session->setFlash(__('Duplicate email not allowed.'));
                $flag = false;
            }

            $options = array('conditions' => array('User.username' => $this->request->data['username']));
            $usernameexists = $this->User->find('first', $options);

            $username = $this->request->data['username'];
            $count_username = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            if ($count_username > 0) {
                $this->Session->setFlash(__('Duplicate Username not allowed.'));
                $flag = false;
            }


            if ($this->request->data['password'] == "") {
                $this->Session->setFlash(__('Password Can not allowed.'));
                $flag = false;
            }

            if ($this->request->data['cpassword'] == "") {
                $this->Session->setFlash(__('Confirm Password Can not allowed.'));
                $flag = false;
            }

            if ($this->request->data['password'] != $this->request->data['cpassword']) {
                $this->Session->setFlash(__('Confirm Password not matched.'));
                $flag = false;
            }



            if ($flag) {
                
                
                $raw_name_arr = explode(' ', $this->request->data['first_name']);

                // pr($raw_name_arr);
                // exit;

                // $this->request->data['User']['first_name'] = $this->request->data['first_name'];
                // $this->request->data['User']['last_name'] = $this->request->data['last_name'];
                $this->request->data['User']['first_name'] = $raw_name_arr[0];
                $this->request->data['User']['last_name'] = $raw_name_arr[1];
                $this->request->data['User']['name'] = $raw_name_arr[0]. " " . $raw_name_arr[1];
                $this->request->data['User']['user_type'] = $this->request->data['user_type'];
                $this->request->data['User']['srtipper_type'] = $this->request->data['srtipper_type'];
                if (isset($this->request->data['gender'])) {
                    $this->request->data['User']['gender'] = $this->request->data['gender'];
                }
                $this->request->data['User']['country_id'] = $this->request->data['country_id'];
                $this->request->data['User']['state_id'] = $this->request->data['state_id'];
                $this->request->data['User']['city_id'] = $this->request->data['city_id'];
                $this->request->data['User']['phone_no'] = $this->request->data['phone'];
                $this->request->data['User']['email'] = $this->request->data['email'];
                $this->request->data['User']['username'] = $this->request->data['username'];
                $this->request->data['User']['txt_password'] = $this->request->data['password'];
                $this->request->data['User']['password'] = $this->request->data['password'];
                if (isset($this->request->data['is_newsletter'])) {
                    $this->request->data['User']['is_newsletter'] = $this->request->data['is_newsletter'];
                }
                $this->request->data['User']['is_active'] = 1;
                $this->request->data['User']['is_admin'] = 0;
                $this->request->data['User']['join_date'] = date('Y-m-d');

                //pr($this->request->data); exit;

                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    //pr($this->request->data); exit;
                    //$this->Session->setFlash('User has been registered successfully. Waiting for admin Approval', 'default', array('class' => 'success'));
                    $this->Session->setFlash('User has been registered successfully. Login to complete your profile data', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
        }

        $this->loadModel('Country');
        $countries = $this->Country->find('list', array('conditions' => array('Country.is_active' => 1), 'order' => array('Country.name' => 'ASC')));

        $this->loadModel('State');
        $state = $this->State->find('list', array('conditions' => array('State.country_id' => 157, 'State.is_active' => 1), 'order' => array('State.name' => 'ASC')));


        $this->loadModel('UserType');
        $utype = $this->UserType->find('all', array('conditions' => array('UserType.is_active' => 1), 'order' => array('UserType.name' => 'ASC')));



        $this->loadModel('City');
        $city = $this->City->find('list', array('order' => array('City.name' => 'ASC')));

        //pr($countries); exit;
        //pr($utype); pr($countries); pr($city);  exit;
        $this->set(compact('title_for_layout', 'countries', 'state', 'utype', 'city'));
    }

    public function frontUserLogin() {

        $this->layout = null;
        //pr($this->request->data); //exit;
        $this->User->recursive = -1;
        $options = array('conditions' => array('User.email' => $this->request->data['email'], 'User.password' => md5($this->request->data['pass']), 'User.is_admin' => 0));
        $loginuser = $this->User->find('first', $options);
        //pr($loginuser); exit;

        if (!$loginuser) {
            //$this->Session->setFlash('Invalid email or password or inactive account.', 'error');
            //return $this->redirect(array('action' => 'login'));
            //echo "notfound"; exit;
            echo "notfound";
            exit;
        } else {
            if ($loginuser['User']['is_active'] != 1) {
                echo "notactive";
                exit;
            } else {
                $this->Session->write('flogin', "yes");
                $this->Session->write('fuid', $loginuser['User']['id']);
                $this->Session->write('fdet', $loginuser['User']);
                $this->Session->write('futype', $loginuser['User']['user_type']);
                $time_now = date('Y-m-d H:i:s');

                if ($loginuser['User']['user_type'] == "E") {
                    $this->Session->write('fdashboard', 'escorts/escortdashboard');
                    $this->Session->write('Auth.Escort', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "e";
                    exit;
                } else if ($loginuser['User']['user_type'] == "U") {
                    $this->Session->write('fdashboard', 'users/userdashboard');
                    $this->Session->write('Auth.User', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "u";
                    exit;
                } else if ($loginuser['User']['user_type'] == "A") {
                    $this->Session->write('fdashboard', 'agencies/agencydashboard');
                    $this->Session->write('Auth.Agent', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "a";
                    exit;
                } else if ($loginuser['User']['user_type'] == "C") {
                    $this->Session->write('fdashboard', 'clubs/clubdashboard');
                    $this->Session->write('Auth.Club', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "c";
                    exit;
                } else if ($loginuser['User']['user_type'] == "P") {
                    $this->Session->write('fdashboard', 'parlors/parlordashboard');
                    $this->Session->write('Auth.Parlor', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "p";
                    exit;
                } else if ($loginuser['User']['user_type'] == "S") {
                    $this->Session->write('fdashboard', 'strippers/stripperdashboard');
                    $this->Session->write('Auth.Stripper', $loginuser);
                    $this->User->id = $loginuser['User']['id'];
                    $this->User->saveField('last_login', $time_now, false);
                    echo "s";
                    exit;
                }
            }
        }
        $this->autoRender = '';
    }

    public function logout() {
        #return $this->redirect($this->Auth->logout());



        $this->Session->delete('flogin');
        $this->Session->delete('fuid');
        $this->Session->delete('fdet');
        $this->Session->delete('futype');
        $this->Session->delete('fdashboard');
        $this->Session->delete('username');

        if ($this->Session->read('Auth.Escort')) {
            $this->Session->delete('Auth.Escort');
        }
        if ($this->Session->read('Auth.User')) {
            $this->Session->delete('Auth.User');
        }
        if ($this->Session->read('Auth.Agent')) {
            $this->Session->delete('Auth.Agent');
        }
        if ($this->Session->read('Auth.Club')) {
            $this->Session->delete('Auth.Club');
        }
        if ($this->Session->read('Auth.Parlor')) {
            $this->Session->delete('Auth.Parlor');
        }

        //$this->Session->setFlash('logged out successfully');
        $this->redirect('/');
    }

    //      ##################################################################    ////
    //      ##################################################################    ////


    public function userdashboard() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        //if(empty($this->Session->read('futype'))){ $this->Session->setFlash('You are not authorised for that page. Please logged in as User'); $this->redirect(array('action' => 'index')); }
        if ($this->Session->read('futype') != 'U') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }


        $title_for_layout = "User Dashboard";
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
                                $this->redirect(array('action' => 'userdashboard'));
                            } else {
                                $this->Session->setFlash('Invalid Image Type. Please Upload jpeg,jpg,png,gif image.', 'info');
                                return $this->redirect(array('action' => 'userdashboard'));
                            }
                        } else {
                            $this->Session->setFlash('Invalid Image Size. Please Upload Image sized below 1MB.', 'info');
                            return $this->redirect(array('action' => 'userdashboard'));
                        }
                    } else {
                        $this->Session->setFlash('Invalid Image.', 'info');
                        return $this->redirect(array('action' => 'userdashboard'));
                    }
                } else {
                    $this->Session->setFlash('Invalid Image Type.', 'info');
                    return $this->redirect(array('action' => 'userdashboard'));
                }
            }
        }


        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $user = $this->User->find('first', $option);


        $this->loadModel('Membership');
        $option2 = array('conditions' => array('Membership.is_active' => 1));
        $membershipall = $this->Membership->find('all', $option2);
        //pr($user); exit;

        $this->set(compact('title_for_layout', 'user', 'membershipall'));
    }

    public function edituserprofile() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        //if(empty($this->Session->read('futype'))){ $this->Session->setFlash('You are not authorised for that page. Please logged in as User'); $this->redirect(array('action' => 'index')); }
        if ($this->Session->read('futype') != 'U') {
            $this->Session->setFlash('You are not authorised for that page. Please logged in as User');
            $this->redirect(array('action' => 'index'));
        }


        $title_for_layout = "Edit Profile";
        if ($this->request->is('post')) {



            if ($this->request->data['ftype'] == "persionalinfo") {
                //+ pr($this->request->data); exit;
                $flag = true;
                /*
                  $flag = true;
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
                    // $this->request->data['User']['name'] = $this->request->data['first_name'] . " " . $this->request->data['last_name'];
                    // $this->request->data['User']['first_name'] = $this->request->data['first_name'];
                    // $this->request->data['User']['last_name'] = $this->request->data['last_name'];
                    // //$this->request->data['User']['gender'] = $this->request->data['gender'];
                    // $this->request->data['User']['country_id'] = $this->request->data['country_id'];
                    // $this->request->data['User']['state_id'] = $this->request->data['state_id'];
                    // $this->request->data['User']['city_id'] = $this->request->data['city_id'];
                    // $this->request->data['User']['phone_no'] = $this->request->data['phone_no'];
                    // $this->request->data['User']['email'] = $this->request->data['email'];
                    // $this->request->data['User']['about'] = $this->request->data['about'];
                    // $this->request->data['User']['username'] = $this->request->data['username'];
                    //pr($this->request->data); exit;
                    $this->User->id = $this->Session->read('fuid');
                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash('Profile Updated Successfully.', 'success');
                        $this->redirect(array('action' => 'edituserprofile'));
                    }
                }
            }
        }

        //echo($this->Session->read('flogin')); echo "<br>"; echo($this->Session->read('fuid')); echo "<br>"; echo($this->Session->read('futype')); echo "<br>";
        //pr($this->Session->read('fdet')); exit;

        $option = array('conditions' => array('User.id' => $this->Session->read('fuid')));
        $this->request->data = $this->User->find('first', $option);
        $user = $this->User->find('first', $option);
        //pr($user); exit;

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

    public function editUserAbout() {
        //pr($_POST); exit;
        $this->layout = false;
        $this->loadModel('User');
        $this->User->id = $_POST['id'];
        $this->User->saveField('about', $_POST['about']);
        $this->autoRender = false;
    }

    //      ##################################################################    ////
    //      ##################################################################    ////

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    public function editprofile() {
        $title_for_layout = 'Edit Profile';
        $countryname = '';
        $username = $this->Session->read('username');
        $userid = $this->Session->read('userid');
        if (!isset($userid)) {
            $this->redirect('/');
        }
        if (!$this->User->exists($userid)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            #pr($this->data);
            #exit;
            $Post_type = $this->request->data['Post_type'];
            $Run_type = $this->request->data['Run_type'];
            if ($Post_type == 'Post') {
                $UserType = 1;
            }

            if ($Run_type == 'Run') {
                $UserType = 2;
            }

            if ($Run_type == 'Run' && $Post_type == 'Post') {
                $UserType = 3;
            }

            $this->request->data['User']['user_type'] = $UserType;

            if (isset($this->request->data['User']['profile_img']) && $this->request->data['User']['profile_img']['name'] != '') {
                $ext = explode('/', $this->request->data['User']['profile_img']['type']);
                if ($ext) {
                    $uploadFolder = "user_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = $this->request->data['User']['id'] . '_' . (strtolower(trim($this->request->data['User']['profile_img']['name'])));
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($this->request->data['User']['profile_img']['tmp_name'], $full_image_path);
                        $this->request->data['User']['profile_img'] = $imageName;
                        #exit;
                        //unlink($uploadPath. '/' .$this->request->data['User']['hidprofile_img']);
                    } else {
                        $this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
                    }
                }
            } else {
                $this->request->data['User']['profile_img'] = $this->request->data['User']['hidprofile_img'];
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Your details have been saved.'));
                return $this->redirect(array('action' => 'editprofile'));
            } else {
                $this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
            $this->request->data = $this->User->find('first', $options);
            if (isset($this->request->data['User']['country']) && $this->request->data['User']['country'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $this->request->data['User']['country']), 'fields' => array('Country.printable_name')));
                #pr($countryname);
                $countryname = $countryname['Country']['printable_name'];
            }
            #pr($this->request->data);
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.printable_name')));
        $this->set(compact('title_for_layout', 'countries', 'countryname'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    /**
     * index method
     *
     * @return void
     */
    public function admin_index() {
        $title_for_layout = 'Admin Login';
        $this->set(compact('title_for_layout'));
        #$this->User->recursive = 0;
        #$this->set('users', $this->Paginator->paginate());
    }

    public function admin_list() {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $title_for_layout = 'User List';
        $this->set(compact('title_for_layout'));

        $this->loadModel('Credit');
        $credits = $this->Credit->find('list', array('fields' => array('id', 'credit_number'), 'conditions' => array('Credit.status' => 1), 'order' => array('Credit.credit_number desc')));
        $this->set(compact('credits'));

        if ($this->request->is('post')) {
            //echo "hello";exit;
            $stitle = $this->request->data['User']['title'];

            $arrs = '';
            if (isset($stitle) && !empty($stitle)) {
                $arrs.= " (`User`.`username` Like '%" . $stitle . "%' OR `User`.`email` Like '%" . $stitle . "%') AND";
            }
            $arrs.=" `User`.`is_admin` != 1 ";
            $this->set('users', $this->Paginator->paginate('User', array($arrs)));
            $this->set(compact('stitle'));
        } else {
            $this->set('users', $this->Paginator->paginate('User', array('User.is_admin !=' => 1)));
        }

        //$options = array('User.id !=' => 2);
        //$this->set('user', $this->User->find('first', $options));
        //$this->set('users', $this->Paginator->paginate('User', $options));
    }

    public function admin_export() {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $options = array('User.id !=' => 2);
        $users = $this->User->find('all', array('conditions' => $options));
        $output = '';
        $output .='First Name, Last Name, Username, Email, Is Active, Is Admin';
        $output .="\n";

        if (!empty($users)) {
            foreach ($users as $user) {
                $isactive = ($user['User']['is_active'] == 1) ? 'Yes' : 'No';
                $isadmin = ($user['User']['is_admin'] == 1) ? 'Yes' : 'No';

                $output .='"' . $user['User']['first_name'] . '","' . $user['User']['last_name'] . '","' . $user['User']['username'] . '","' . $user['User']['email'] . '","' . $isactive . '","' . $isadmin . '"';
                $output .="\n";
            }
        }
        $filename = "users" . time() . ".csv";
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename=' . $filename);
        echo $output;
        exit;
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_add_credit() {
        if ($this->request->is('post')) {
            //pr($this->request->data);exit;
            $this->User->id = $this->request->data['User']['id'];
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            } else {
                $arr = array();
                $arr['User']['id'] = $this->request->data['User']['id'];
                $arr['User']['credit_package'] = $this->request->data['User']['credit_package'];
                if ($this->User->Save($arr)) {
                    $this->Session->setFlash(__('The user has been saved.', 'default', array('class' => 'success')));
                    return $this->redirect(array('controller' => 'users', 'action' => 'list'));
                }
            }
        }
    }

    public function admin_user_inactive($id = null) {
        if (!empty($id)) {
            $this->User->id = $id;
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $userdetail = $this->User->find('first', $options);
                if ($userdetail['User']['is_active'] == 1) {
                    $arr = array();
                    $arr['User']['id'] = $id;
                    $arr['User']['is_active'] = 0;
                    if ($this->User->Save($arr)) {
                        $this->Session->setFlash(__('Status of selected record changed successfully', 'default', array('class' => 'success')));
                    }
                } else if ($userdetail['User']['is_active'] == 0) {
                    $arr = array();
                    $arr['User']['id'] = $id;
                    $arr['User']['is_active'] = 1;
                    if ($this->User->Save($arr)) {
                        $this->Session->setFlash(__('Status of selected record changed successfully.', 'default', array('class' => 'success')));
                    }
                }
                return $this->redirect(array('controller' => 'users', 'action' => 'list'));
            }
        }
    }

    public function admin_user_notes() {
        if ($this->request->is('post')) {
            $this->User->id = $this->request->data['User']['id'];
            if (!$this->User->exists()) {
                throw new NotFoundException(__('Invalid user'));
            } else {
                $arr = array();
                $arr['User']['id'] = $this->request->data['User']['id'];
                $arr['User']['notes'] = $this->request->data['User']['notes'];
                if ($this->User->Save($arr)) {
                    $this->Session->setFlash(__('The Notes has been Added.', 'default', array('class' => 'success')));
                    return $this->redirect(array('controller' => 'users', 'action' => 'list'));
                }
            }
        }
    }

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
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $user = $this->User->find('first', $options);
        //pr($user);exit;
        if ($user['User']['is_active'] == '0') {
            $status = 'No';
        } else {
            $status = 'Yes';
        }
        if ($user['User']['is_email_verified'] == 'N') {
            $emailVerify = 'No';
        } else {
            $emailVerify = 'Yes';
        }
        if ($user['User']['subscribe_newsletter'] == '0') {
            $subs_newsletter = 'No';
        } else {
            $subs_newsletter = 'Yes';
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
                . '<tr><td>Member Type</td><td>' . $user['User']['user_type'] . '</td></tr>'
                . '<tr><td>Status</td><td>' . $status . '</td></tr>';
        //pr($user);exit;
        echo $data;
        exit;
        //$this->set(compact('multimg'));
    }

    public function admin_userview($id = null) {
        /* $userid = $this->Session->read('userid');
          if(!isset($userid) && $userid==''){
          $this->redirect('/admin');
          }
          $title_for_layout = 'User View';
          $this->set(compact('title_for_layout'));
          if (!$this->User->exists($id)) {
          throw new NotFoundException(__('Invalid user'));
          } */
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $user = $this->User->find('first', $options);
        //pr($user);exit;
        if ($user['User']['is_active'] == '0') {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        if ($user['User']['is_email_verified'] == 'N') {
            $emailVerify = 'No';
        } else {
            $emailVerify = 'Yes';
        }
        if ($user['User']['subscribe_newsletter'] == '0') {
            $subs_newsletter = 'No';
        } else {
            $subs_newsletter = 'Yes';
        }
        if ($user['User']['user_type'] == 'U') {
            $usertype = 'Customer';
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
                . '<tr><td>Member Type</td><td>' . $usertype . '</td></tr>'
                . '<tr><td>Status</td><td>' . $status . '</td></tr>';
        //pr($user);exit;
        echo $data;
        exit;
        //$this->set(compact('multimg'));
    }

    public function admin_viewnew($id = null) {
        $this->layout = false;
        $user = $this->User->find('first', array('conditions' => array('')));
    }

    public function admin_userdelete($id = null) {


        //$this->loadModel('User');
        $this->User->id = $id;

        if ($this->User->delete($id)) {
            $this->Session->setFlash('The user has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The user type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'userindex'));
    }

    public function admin_addnote() {
        $id = $_REQUEST['hid_id'];
        $note = $_REQUEST['note'];
        if ($this->request->is('post')) {

            $this->User->updateAll(array('User.notes' => "'$note'"), array('User.id' => $id));
            return $this->redirect(array('action' => 'userindex'));
        }
    }

    /**
     * add method
     *
     * @return void
     */
    public function admin_add() {
        $this->loadModel('City');
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $title_for_layout = 'User Add';
        $this->set(compact('title_for_layout'));
        if ($this->request->is('post')) {

            $options = array('conditions' => array('User.username' => $this->request->data['User']['username']));
            $username = $this->User->find('first', $options);
            if (!$username) {
                $options = array('conditions' => array('User.email' => $this->request->data['User']['email']));
                $emailexists = $this->User->find('first', $options);
                if (!$emailexists) {
                    $city = $this->request->data['User']['city'];

                    if (!empty($city)) {
                        $options = array('conditions' => array('City.name' => $this->request->data['User']['city'], 'City.country_id' => $this->request->data['User']['country_id']));
                        $cityexists = $this->City->find('first', $options);
                        if (!$cityexists) {
                            $arr = array();
                            $arr['City']['name'] = $city;
                            $arr['City']['country_id'] = $this->request->data['User']['country_id'];
                            $this->City->create();
                            $this->City->save($arr);
                            $lastinsertCityId = $this->City->getLastInsertId();
                            $this->request->data['User']['city_id'] = $lastinsertCityId;
                        }
                    }
                    /* if(isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name']!=''){
                      $ext = explode('/',$this->request->data['User']['profile_image']['type']);
                      if($ext){

                      $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');

                      $extensionValid = array('jpg','jpeg','png','gif');
                      if(in_array($ext[1],$extensionValid)){
                      $imageName = rand().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
                      $full_image_path = $uploadPath . '/' . $imageName;
                      move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path);
                      $this->request->data['User']['profile_image'] = $imageName;
                      }else{
                      $this->Session->setFlash(__('Invalid Image Type'));
                      return $this->redirect(array('action' => 'admin_add'));
                      }
                      }

                      } else{
                      $this->request->data['User']['profile_image']='';
                      } */

                    /* if($this->request->data['User']['subscribe_newsletter']=='on'){
                      $this->request->data['User']['subscribe_newsletter'] = 1;
                      }else{
                      $this->request->data['User']['subscribe_newsletter'] = 0;
                      } */
                    $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                    $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
                    $this->request->data['User']['country_id'] = $this->request->data['User']['country_id'];
                    $this->request->data['User']['city_id'] = $this->request->data['User']['city_id'];
                    $this->request->data['User']['subscribe_newsletter'] = $this->request->data['subscribe_newsletter'];
                    $this->request->data['User']['is_active'] = $this->request->data['is_active'];
                    $this->request->data['User']['is_email_verified'] = $this->request->data['is_email_verified'];
                    $this->request->data['User']['gender'] = $this->request->data['gender'];

                    $this->request->data['User']['birthday'] = '0000-00-00';
                    $this->request->data['User']['about'] = '';
                    $this->request->data['User']['join_date'] = date('Y-m-d');
                    $this->User->create();

                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash(__('The user has been saved.', 'default', array('class' => 'success')));
                        return $this->redirect(array('action' => 'admin_list'));
                    } else {
                        $this->Session->setFlash(__('The user could not be saved. Please, try again.', 'default', array('class' => 'error')));
                    }
                } else {
                    $this->Session->setFlash(__('Email already exists. Please, try another.', 'default', array('class' => 'error')));
                }
            } else {
                $this->Session->setFlash(__('Username already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }


        $this->loadModel('Haircolor');
        $haircolors = $this->Haircolor->find('all', array('conditions' => array('Haircolor.is_active' => 1), 'order' => array('Haircolor.color_name' => 'ASC')));

        $this->loadModel('Eyecolor');
        $eyecolors = $this->Eyecolor->find('all', array('conditions' => array('Eyecolor.is_active' => 1), 'order' => array('Eyecolor.color_name' => 'ASC')));

        $this->loadModel('BodyType');
        $bodytypes = $this->BodyType->find('all', array('conditions' => array('BodyType.is_active' => 1), 'order' => array('BodyType.body_type' => 'ASC')));


        $this->loadModel('EscortType');
        $escorttypes = $this->EscortType->find('list', array('conditions' => array('EscortType.is_active' => 1), 'order' => array('EscortType.name' => 'ASC')));

        //pr($haircolors);
        $this->loadModel('Country');
        $countries = $this->Country->find('all', array('conditions' => array('Country.is_active' => 1), 'order' => array('Country.name' => 'ASC')));

        $this->loadModel('State');
        $states = $this->State->find('all', array('conditions' => array('State.country_id' => 1, 'State.is_active' => 1), 'order' => array('State.name' => 'ASC')));
        //pr($states);
        $this->set(compact('countries', 'states', 'haircolors', 'eyecolors', 'bodytypes', 'escorttypes'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_edit($id = null) {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $title_for_layout = 'User Edit';
        $this->set(compact('title_for_layout'));
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {

            if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] != '') {
                $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            } else {
                $this->request->data['User']['password'] = $this->request->data['User']['hidpw'];
            }

            if (isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name'] != '') {
                $ext = explode('.', $this->request->data['User']['profile_image']['name']);
                if ($ext) {
                    $uploadPath = Configure::read('UPLOAD_USER_IMG_PATH');

                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($ext[1], $extensionValid)) {
                        $imageName = rand() . '_' . (strtolower(trim($this->request->data['User']['profile_image']['name'])));
                        $full_image_path = $uploadPath . '/' . $imageName;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_image_path);
                        $this->request->data['User']['profile_image'] = $imageName;
                    } else {
                        $this->Session->setFlash(__('Invalid Image Type'));
                        return $this->redirect(array('action' => 'user_edit', $id));
                    }
                }
            } else {
                $this->request->data['User']['profile_image'] = $this->request->data['User']['hid_img'];
            }

            //pr($this->request->data);exit;
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.', 'default', array('class' => 'success')));
                //return $this->redirect(array('action' => 'admin_edit/'.$id));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function admin_delete($id = null) {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //$this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'));
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'admin_list'));
    }

    /////////////////////////////////////////////////////////////////////
    //haircolor
    public function admin_haircolor_list() {
        $this->loadModel('Haircolor');
        //$haircolors = $this->Haircolor->find('all',array('conditions'=>array('Haircolor.is_active'=>1)));
//pr($haircolors);exit;
        $this->paginate = array(
            'conditions' => '',
            'limit' => 8,
            'order' => array(
                'Haircolor.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;
        $this->set('haircolor_list', $this->Paginator->paginate('Haircolor'));
        // $this->set('haircolors', $this->Paginator->paginate('Haircolor'));
    }

    public function admin_haircolor_add() {
        $this->loadModel('Haircolor');

        if ($this->request->is('post')) {
            //echo "hello";exit;
            $options = array('conditions' => array('Haircolor.color_name' => $this->request->data['Haircolor']['color_name']));
            $colorexists = $this->Haircolor->find('first', $options);
            if (!$colorexists) {
                //echo "hello";exit;
                $this->request->data['Haircolor']['color_name'];
                //$this->request->data['Haircolor']['is_active'] = 1;
                $this->Haircolor->create();
                if ($this->Haircolor->save($this->request->data)) {
                    $this->Session->setFlash('The color has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'haircolor_list'));
                } else {
                    $this->Session->setFlash(__('The color could not be saved. Please, try again.'));
                }
            } else {

                $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }
        //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
        //$this->set(compact('countries'));
    }

    public function admin_haircolor_view($id = null) {

        //echo $id;exit;
        $this->loadModel('Haircolor');
        if (!$this->Haircolor->exists($id)) {
            throw new NotFoundException(__('Invalid color'));
        }
        $options = array('conditions' => array('Haircolor.' . $this->Haircolor->primaryKey => $id));
        $this->set('colors', $this->Haircolor->find('first', $options));
    }

    public function admin_haircolor_edit($id = null) {
        //echo $id;exit;
        $this->loadModel('Haircolor');
        if (!$this->Haircolor->exists($id)) {
            throw new NotFoundException(__('Invalid color'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //echo "hello";exit;

            $options = array('conditions' => array('Haircolor.color_name' => $this->request->data['Haircolor']['color_name'], 'Haircolor.id !=' => $id));
            $emailexists = $this->Haircolor->find('first', $options);
            if (!$emailexists) {
                //echo "hello";exit;
                $color_name = $this->request->data['Haircolor']['color_name'];

                if ($this->Haircolor->save($this->request->data)) {

                    if ($color_name != '') {

                        $this->Haircolor->query('Update haircolors as haircolor set haircolor.color_name="' . $color_name . '" where haircolor.id=' . $id . '');
                    }
                    $this->Session->setFlash('Color details has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'admin_haircolor_edit', $id));
                } else {
                    $this->Session->setFlash(__('Color details could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
                return $this->redirect(array('action' => 'haircolor_edit', $id));
            }
        } else {

            $options = array('conditions' => array('Haircolor.' . $this->User->primaryKey => $id));
            $this->request->data = $this->Haircolor->find('first', $options);
            //$countries = $this->User->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
            //$this->set(compact('countries'));
        }
    }

    public function admin_eyecolor_list() {

        /*  $this->loadModel('Eyecolor');
          $this->set('eyecolor_list', $this->Paginator->paginate('Eyecolor')); */

        $this->loadModel('Eyecolor');
        $this->paginate = array(
            'conditions' => '',
            'limit' => 8,
            'order' => array(
                'Eyecolor.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;
        $this->set('eyecolor_list', $this->Paginator->paginate('Eyecolor'));
        // $this->set('haircolors', $this->Paginator->paginate('Haircolor'));
    }

    public function admin_eyecolor_add() {
        $this->loadModel('Eyecolor');

        if ($this->request->is('post')) {
            //echo "hello";exit;
            $options = array('conditions' => array('Eyecolor.color_name' => $this->request->data['Eyecolor']['color_name']));
            $colorexists = $this->Eyecolor->find('first', $options);
            if (!$colorexists) {
                //echo "hello";exit;
                $this->request->data['Eyecolor']['color_name'];
                //$this->request->data['Eyecolor']['is_active'] = 1;
                $this->Eyecolor->create();
                if ($this->Eyecolor->save($this->request->data)) {
                    $this->Session->setFlash('The color has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'eyecolor_list'));
                } else {
                    $this->Session->setFlash(__('The color could not be saved. Please, try again.'));
                }
            } else {

                $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
            }
        }
        //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
        //$this->set(compact('countries'));
    }

    public function admin_eyecolor_view($id = null) {

        //echo $id;exit;
        $this->loadModel('Eyecolor');
        if (!$this->Eyecolor->exists($id)) {
            throw new NotFoundException(__('Invalid color'));
        }
        $options = array('conditions' => array('Eyecolor.' . $this->Eyecolor->primaryKey => $id));
        $this->set('colors', $this->Eyecolor->find('first', $options));
    }

    public function admin_eyecolor_edit($id = null) {
        //echo $id;exit;
        $this->loadModel('Eyecolor');
        if (!$this->Eyecolor->exists($id)) {
            throw new NotFoundException(__('Invalid color'));
        }
        if ($this->request->is(array('post', 'put'))) {
            //echo "hello";exit;

            $options = array('conditions' => array('Eyecolor.color_name' => $this->request->data['Eyecolor']['color_name'], 'Eyecolor.id !=' => $id));
            $emailexists = $this->Eyecolor->find('first', $options);
            if (!$emailexists) {
                //echo "hello";exit;
                $color_name = $this->request->data['Eyecolor']['color_name'];

                if ($this->Eyecolor->save($this->request->data)) {

                    if ($color_name != '') {

                        $this->Eyecolor->query('Update eyecolors as eyecolor set eyecolor.color_name="' . $color_name . '" where eyecolor.id=' . $id . '');
                    }
                    $this->Session->setFlash('Color details has been saved', 'default', array('class' => 'success'));
                    return $this->redirect(array('controller' => 'users', 'action' => 'admin_eyecolor_edit', $id));
                } else {
                    $this->Session->setFlash(__('Color details could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
                return $this->redirect(array('action' => 'eyecolor_edit', $id));
            }
        } else {

            $options = array('conditions' => array('Eyecolor.' . $this->Eyecolor->primaryKey => $id));
            $this->request->data = $this->Eyecolor->find('first', $options);
            //$countries = $this->User->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
            //$this->set(compact('countries'));
        }
    }

    public function admin_haircolor_delete($id = null) {
        $this->loadModel('Haircolor');
        $this->Haircolor->id = $id;

        if (!$this->Haircolor->exists()) {
            throw new NotFoundException(__('Invalid color'));
        }
        if ($this->Haircolor->delete($id)) {
            $this->Session->setFlash('The color has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The color could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'haircolor_list'));
    }

    public function admin_eyecolor_delete($id = null) {
        $this->loadModel('Eyecolor');
        $this->Eyecolor->id = $id;

        if (!$this->Eyecolor->exists()) {
            throw new NotFoundException(__('Invalid color'));
        }
        if ($this->Eyecolor->delete($id)) {
            $this->Session->setFlash('The color has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The color could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'eyecolor_list'));
    }

    public function admin_imageupload($id = null) {
        $this->loadModel('Multimageupload');
        //$imagename = $_FILES['file']['name'];
        //$images = $this->Multimageupload->find('all',array('conditions'=>array('Multimageupload.user_id'=>$id)));
//pr($images);exit;
        $this->paginate = array(
            'conditions' => array('Multimageupload.user_id' => $id),
            'limit' => 2,
            'order' => array(
                'Multimageupload.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;
        $this->set('images', $this->Paginator->paginate('Multimageupload'));
        $this->set(compact('id'));
    }

    public function admin_uploadUser($id = null) {
        $this->autoRender = false;
        $this->loadModel('Multimageupload');
        $imagename = $_FILES['file']['name'];
        $uploadPath = Configure::read('UPLOAD_USER_IMG_PATH');
        //echo $imagename = $_FILES['file']['profile_image']['name'];
        $options = array('conditions' => array('User.id' => $id));
        $user = $this->User->find('first', $options);
        if (!empty($user)) {
            $this->Multimageupload->create();

            move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath . '/' . (date('Ymd_his') . '__' . $imagename));
            $imageName1 = date('Ymd_his') . '__' . $imagename;
            $userupdate['Multimageupload']['user_id'] = $id;
            $userupdate['Multimageupload']['image_upload'] = $imageName1;
            $this->Multimageupload->save($userupdate);
        }
    }

    ////////////////////////////////////////////////////////////////////

    public function admin_login() {
        if ($this->request->is('post')) {
            $options = array('conditions' => array('User.username' => $this->request->data['User']['usernamel'], 'User.password' => md5($this->request->data['User']['passwordl']), 'User.is_admin' => 1));
            $loginuser = $this->User->find('first', $options);
            if (!$loginuser) {
                $this->Session->setFlash(__('Invalid username or password, try again', 'default', array('class' => 'error')));
                return $this->redirect(array('action' => 'admin_index'));
            } else {

                $this->Session->write('admin', "yes");
                $this->Session->write('userid', $loginuser['User']['id']);
                $this->Session->write('admDetail', $loginuser['User']);
                //$this->Session->write('userid', $loginuser['User']['id']);

                $this->Session->setFlash(__('You have been successfully logged in', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => 'admin_dashboard'));
                //return $this->redirect(array('action' => 'admin_edit',$loginuser['User']['id']));
            }
        }
    }

    public function admin_logout() {
        #return $this->redirect($this->Auth->logout());
        $this->Session->delete('userid');
        $this->redirect('/admin');
    }

    public function admin_fotgot_password() {
        $title_for_layout = 'Forgot Password';
        $this->set(compact('title_for_layout'));

        if ($this->request->is(array('post', 'put'))) {
            $options = array('conditions' => array('User.email' => $this->request->data['User']['email'], 'User.is_admin' => 1));
            $user = $this->User->find('first', $options);
            if ($user) {
                //$password = $this->User->get_fpassword();
                $password = $user['User']['txt_password'];
                //$this->request->data['User']['id'] = $user['User']['id'];
                //$this->request->data['User']['password'] = $password;
                if ($password != '') {
                    $key = Configure::read('CONTACT_EMAIL');
                    $this->loadModel('EmailTemplate');
                    $EmailTemplate = $this->EmailTemplate->find('first', array('conditions' => array('EmailTemplate.id' => 1)));
                    $mail_body = str_replace(array('[EMAIL]', '[PASSWORD]'), array($this->request->data['User']['email'], $password), $EmailTemplate['EmailTemplate']['content']);
                    $this->send_mail($key, $this->request->data['User']['email'], $EmailTemplate['EmailTemplate']['subject'], $mail_body);
                    $this->Session->setFlash('A new password has been sent to your mail. Please check mail.', 'default', array('class' => 'success'));
                } else {
                    $this->Session->setFlash("Sorry! some internal error occured.Please try again later.");
                }
            } else {
                $this->Session->setFlash("Invalid email or You are not authorize to access.");
            }
        }
    }

    public function emailExists($email = null) {
        $data = '';
        if ($email) {
            $emailexists = $this->User->find('first', array('conditions' => array('User.email' => $email), 'fields' => array('User.id')));
            if ($emailexists) {
                $data = 'Email already exists. Please try another.';
            } else {
                $data = '';
            }
        }
        echo $data;
        exit;
    }

    public function forgotpassword() {
        $title_for_layout = 'Forgot Password';
        $this->set(compact('title_for_layout'));
        if ($this->request->is(array('post', 'put'))) {
            $options = array('conditions' => array('User.email' => $this->request->data['User']['email']));
            $user = $this->User->find('first', $options);
            if ($user) {
                $length = 6;
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . '0123456789';
                $str = '';
                $max = strlen($chars) - 1;
                for ($i = 0; $i < $length; $i++)
                    $str .= $chars[rand(0, $max)];

                $password = $str;
                $table = '<table style="width:400px;border:0px;">
							<tr>
								<td style="width:100px;">User email&nbsp;:</td>
								<td>' . $user['User']['email'] . '</td>
							</tr>
							<tr>
								<td style="width:100px;">Password&nbsp;:</td>
								<td>' . $password . '</td>
							</tr>
							</table>';
                $msg_body = 'Hi ' . $user['User']['first_name'] . '<br/><br/>Your new password has been successfully regenarated. The new login details are as follows:<br/>' . $table . ' <br/><br/>Thanks,<br/>Admin';

                $this->request->data['User']['id'] = $user['User']['id'];
                $this->request->data['User']['password'] = md5($password);
                $this->request->data['User']['txt_password'] = $password;
                if ($this->User->save($this->request->data)) {
                    $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email', 'SiteSetting.site_name')));
                    if ($contact_email) {
                        $adminEmail = $contact_email['SiteSetting']['contact_email'];
                    } else {
                        $adminEmail = 'superadmin@abc.com';
                    }
                    $site_name = $contact_email['SiteSetting']['site_name'];

                    App::uses('CakeEmail', 'Network/Email');

                    $Email = new CakeEmail();
                    /* pass user input to function */
                    $Email->emailFormat('both');
                    $Email->from(array($adminEmail => $site_name));
                    $Email->to($user['User']['email']);
                    $Email->subject($site_name . ' Forgot Password');
                    $Email->send($msg_body);

                    $this->Session->setFlash(__('Your new password has been sent to your email.'));
                    return $this->redirect(array('action' => 'forgotpassword'));
                } else {
                    $this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('Invalid email provided. Please, try again.'));
            }
        }
    }

    public function settings() {
        $title_for_layout = 'Account Settings';
        $countryname = '';
        $username = $this->Session->read('username');
        $userid = $this->Session->read('userid');
        if (!isset($userid)) {
            $this->redirect('/');
        }
        if (!$this->User->exists($userid)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            #pr($this->data);
            #exit;
            if (isset($this->request->data['User']['password']) && $this->request->data['User']['password'] != '') {
                $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            } else {
                $this->request->data['User']['password'] = $this->request->data['User']['hidpassword'];
            }

            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('Profile settings have been updated successfully.'));
                return $this->redirect(array('action' => 'settings'));
            } else {
                $this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
            $this->request->data = $this->User->find('first', $options);
            if (isset($this->request->data['User']['country']) && $this->request->data['User']['country'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $this->request->data['User']['country']), 'fields' => array('Country.printable_name')));
                $countryname = $countryname['Country']['printable_name'];
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.printable_name')));
        $this->set(compact('title_for_layout', 'countries', 'countryname'));
    }

    function admin_dashboard() {
        $userid = $this->Session->read('userid');
        //echo $this->Session->read('userid'); exit;

        if ($userid == '') {
            return $this->redirect(array('controller' => 'users', 'action' => '/', 'admin' => true));
        }
        $this->loadModel('Category');

        //$this->loadModel('Activity');
        //$activities = $this->Activity->find('all',array('limit' => 10,'order' => 'Activity.id DESC'));
        //pr($activities);
        //exit;
        //$this->loadModel('Task');
        /* $total_user=$this->User->find("count",array('conditions'=>array('User.id !='=>2)));
          $active_user=$this->User->find("count",array('conditions'=>array('User.is_active'=>1,'User.id !='=>2)));
          $inactive_user=$this->User->find("count",array('conditions'=>array('User.is_active'=>0,'User.id !='=>2)));
          $total_taskers=$this->User->find("count",array('conditions'=>array('User.user_type'=>2)));
          $conditions['OR']['Task.status'] = 1;
          $conditions['OR']['Task.status'] = 2;
          $total_task=$this->Task->find("count",array("conditions"=>$conditions));
          $categories_list=$this->Category->find('all',array('fields'=>array('Category.id','Category.name'),'conditions'=>array('Category.active'=>1,'Category.parent_id != '=>0)));

          $this->set(compact('total_task','total_user','total_taskers','activities','active_user','inactive_user','categories_list')); */
    }

    function admin_changepwd() {
        $userid = $this->Session->read('userid');
        if ($userid == '') {
            return $this->redirect(array('controller' => 'users', 'action' => '/', 'admin' => true));
        }
        if ($this->request->is(array('post', 'put'))) {

            $this->User->create();
            $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
            $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('Your password changed successfully.', 'default', array('class' => 'success'));
                return $this->redirect(array('action' => 'changepwd'));
            } else {
                
            }
        }
    }

    ///////////////////////////////Ak/////////////////////////////////////
    public function profile($id = null) {
        $title_for_layout = 'Profile';
        $id = base64_decode($id);
        $options = array('conditions' => array('User.id' => $id));
        $user = $this->User->find('first', $options);
        $this->loadModel('Country');
        //$this->loadModel('Task');
        $this->loadModel('Skill');

        //$options = array('conditions' => array('Task.user_id' => $user['User']['id'],'Task.status'=>2));
        //$tasks = $this->Task->find('count', $options);

        $options = array('conditions' => array('Task.user_id' => $user['User']['id'], 'Task.status' => 2, 'Task.task_status' => 'C'));
        //$complete = $this->Task->find('count', $options);

        $options = array('conditions' => array('Skill.user_id' => $id));
        $skill = $this->Skill->find('first', $options);

        $options = array('conditions' => array('Country.id' => $user['User']['country']));
        $country = $this->Country->find('first', $options);
        $this->set(compact('title_for_layout', 'user', 'country', 'tasks', 'complete', 'skill'));
    }

    ///////////////////////////////End AK/////////////////////////////////


    public function countrywisecity($countryId = null) {

        if (!empty($countryId)) {
            $city = $this->City->find('list', array('fields' => array('id', 'name'), 'conditions' => array('City.country_id' => $countryId, 'City.is_active' => 1)));
            if ($city) {
                $data = '<select name="data[User][city_id]" id="cityId" class="form-control"><option value="">Select</option>';
                foreach ($city as $k => $v) {
                    $data.='<option value="' . $k . '">' . $v . '</option>';
                }
                $data.='</select>';
            } else {
                $data = '<input type="text" name="data[User][city]" class="form-control">';
            }
        } else {
            $data = '<select name="data[User][city_id]" id="cityId" class="form-control"><option value="">Select</option></select>';
        }
        echo $data;
        exit;
    }

    public function admin_adduser() {
        $this->loadModel("Country");
        $this->loadModel("City");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'adduser'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'adduser'));
            } else {
                $this->request->data['User']['join_date'] = date('Y-m-d');

                $this->request->data['User']['user_type'] = 'U';
                if ($this->User->save($this->request->data)) {

                    $this->Session->setFlash('The User has been saved.', 'default', array('class' => 'success'));
                    return $this->redirect(['controller' => 'users', 'action' => 'userindex']);
                } else {
                    $this->Session->setFlash(__('The adduser could not be saved. Please, try again.'));
                }
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $cities = $this->City->find('list', array('fields' => array('City.id', 'City.name')));
        $this->set(compact('countries', 'cities'));
    }

    public function mybookingrequest() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel('Booking');

        $options = array('conditions' => array('Booking.user_id' => $this->Session->read('fuid')));
        $bookinglist = $this->Booking->find('all', $options);
        $this->set(compact('bookinglist'));
    }

    public function mycomments() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
    }

    public function myreviews() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
    }

    public function myfollowing() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel("Follow");
        $options = array('conditions' => array('Follow.following_id' => $this->Session->read('fuid')));
        $following = $this->Follow->find('all', $options);
        $this->set(compact('following'));
    }

    public function myfollower() {
        
    }

    public function adonservices() {
        
    }

    public function mypurchaseditems() {
        
    }

    public function credittransaction() {
        
    }

    public function accountsettings() {
        
    }

    public function editEscortAbout() {
        // pr($_POST);exit;
    }

    public function message() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel("Message");
        $options = array(
            'conditions' => array(
                'or' => array(
                    'Message.to_id' => $this->Session->read('fuid'),
                    'Message.from_id' => $this->Session->read('fuid')
                )
            ),
            "group" => "Message.parent_id"
        );
        $messagelist = $this->Message->find('all', $options);

        //pr($messagelist); exit;
        $this->set(compact('messagelist'));
    }

    public function messagedetails($id = null) {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }


        $this->loadModel("Message");
        $id = base64_decode($id);
        $options = array('conditions' => array('Message.id' => $id));
        $messagedetails = $this->Message->find('all', $options);
        //pr($messagedetails);exit;
        $this->set(compact('messagedetails'));
    }

    public function unfollow($id = null) {

        $this->loadModel("Follow");

        $this->Follow->id = $id;
        if (!$this->Follow->exists()) {
            throw new NotFoundException(__(''));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Follow->delete()) {
            $this->Session->setFlash(__('The MyFollowing has been deleted.'));
            return $this->redirect(array('action' => 'myfollowing'));
        } else {
            $this->Session->setFlash(__('The Following could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'myfollowing'));
    }

    public function deletemessage($id = null) {

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

    public function index($id = null) {


        $this->loadModel('Rate');
        $this->loadModel('Favorite');
        $this->loadModel('Category');
        $this->loadModel('Country');
        $this->loadModel('Location');
        $this->loadModel('Suburb');
        $this->loadModel('User');

        // $options = array('conditions' => array('User.user_type' => 'E'));
        // $escorts = $this->User->find('all', $options);
        if($this->request->data)
     {   
        $name = $this->request->data['user_name'];
              $this->paginate = array(
        'conditions' => array('User.user_type' => 'E','User.id !=' => $this->Session->read('fuid'),'User.name LIKE'=>$name,'User.country_id'=>230,'User.state_id'=>$this->request->data['state']),
        'limit' => 8,
        'order' => array(
        'User.is_sort' => 'asc'
        )
        ); 
        
        //echo $city_id;ex
        

     }
        elseif($id)
        {
           // echo $id;exit;
             $id = base64_decode($id);
            $this->paginate = array(
        'conditions' => array('User.user_type' => 'E','User.id !=' => $this->Session->read('fuid'),'User.category_id'=>$id),
        'limit' => 8,
        'order' => array(
        'User.is_sort' => 'asc'
        )
        );
        }
        else
        {
        $this->paginate = array(
        'conditions' => array('User.user_type' => 'E','User.id !=' => $this->Session->read('fuid')),
        'limit' => 8,
        'order' => array(
        'User.is_sort' => 'asc'
        )
        );
    }
        $this->Paginator->settings = $this->paginate;

//pr($this->request->data);exit;
        
        if(isset($this->request->data['user_name']) && $this->request->data['user_name']!=''){ 
             
             $options = array('conditions' => array('User.name LIKE ' => '%'.$this->request->data['user_name'].'%','User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options);
           // pr($escorts); exit;

        }
        elseif(isset($this->request->data['country']) && $this->request->data['country'] !='' && isset($this->request->data['gender']) && $this->request->data['gender'] !='' && isset($this->request->data['age']) && $this->request->data['age'] !='')
        {


             $yr = $this->request->data['age'];
            $time = strtotime("-".$yr." year", time());
            $date = date("Y-m-d", $time);
             $options = array('conditions' => array('User.country_id' => $this->request->data['country'],'User.user_type' => 'E','User.gender' => $this->request->data['gender'],'User.birthday >' => $date));
             $escorts = $this->User->find('all', $options);
        }
        elseif(isset($this->request->data['country']) && $this->request->data['country'] !='' && isset($this->request->data['gender']) && $this->request->data['gender'] !='')
        {

             $options = array('conditions' => array('User.country_id' => $this->request->data['country'],'User.user_type' => 'E','User.gender' => $this->request->data['gender']));
             $escorts = $this->User->find('all', $options);
        }
        elseif(isset($this->request->data['country']) && $this->request->data['country'] !='' && isset($this->request->data['age']) && $this->request->data['age'] !='')
        {

             $yr = $this->request->data['age'];
            $time = strtotime("-".$yr." year", time());
            $date = date("Y-m-d", $time);
             $options = array('conditions' => array('User.country_id' => $this->request->data['country'],'User.user_type' => 'E','User.birthday >' => $date));
             $escorts = $this->User->find('all', $options);
        }
        
        elseif(isset($this->request->data['country']) && $this->request->data['country'] !='')
        {

                
             $options = array('conditions' => array('User.country_id' => $this->request->data['country'],'User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options);
        }
        elseif(isset($this->request->data['state']) && $this->request->data['state'] !='')
        {

                
             $options = array('conditions' => array('User.state_id' => $this->request->data['state'],'User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options);
        }
        elseif(isset($this->request->data['gender']) && $this->request->data['gender'] !='')
        {  
            $options = array('conditions' => array('User.gender' => $this->request->data['gender'],'User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options);    
        }
        elseif(isset($this->request->data['age']) && $this->request->data['age'] !='')
        {
             $yr = $this->request->data['age'];
            $time = strtotime("-".$yr." year", time());
            $date = date("Y-m-d", $time);
           
            $options = array('conditions' => array('User.birthday >' => $date,'User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options);    
        }
        elseif($id)
        {
           // echo $id;exit;
             //$id = base64_decode($id);
             $options = array('conditions' => array('User.category_id'=>$id,'User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options); 
           
        }
        else
        {
                
           $options = array('conditions' => array('User.user_type' => 'E'));
             $escorts = $this->User->find('all', $options); 
        }

        // $escortslideroption = array('conditions' => array('User.user_type' => 'E','User.membership_id' => 2));
        // $escortslider = $this->User->find('all', $escortslideroption);


        $this->set('escorts', $this->Paginator->paginate('User'));

        $options11 = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options11);

        $options12 = array('conditions' => array('Location.is_active' => 1));
        $locationsarray = $this->Location->find('all', $options12);


        $options13 = array('conditions' => array('Suburb.is_active' => 1));
        $surubsarrays = $this->Suburb->find('all', $options13);

        $Category_array = array('conditions' => array('`Category`.`parent_id`' => 0, '`Category`.`active`' => 1));
        $Category_list = $this->Category->find('list', $Category_array);
        $this->set('Category_list', $Category_list);


        //Online Escorts

        $optionsoline = array('conditions' => array('User.user_type' => 'E','User.membership_id' => 3));
        $showonline = $this->User->find('all', $optionsoline);
       // pr($showonline); exit;

        //Featured Escorts

        $optionsfeature = array('conditions' => array('User.user_type' => 'E','User.is_featured ' => 1),'limit'=>4);
        $showfeature = $this->User->find('all', $optionsfeature);


         //New Escorts

        $shownewescorts = $this->User->find('all', array('conditions' => 
            array('User.user_type' => 'E'), 'order' => 'User.join_date 
            DESC','limit'=>2)); 

        $optionsescortofweek = array('conditions' => array('User.user_type' => 'E','User.escort_of_week ' => 1));
        $showescortofweek = $this->User->find('all', $optionsescortofweek);
       
        //country
        $showcountry = $this->Country->find('all', array('order' => 'Country.id ASC')); 
            foreach($category as $key=>$cat)
            {
              $numb = $this->User->find('count',array('conditions'=>array('User.category_id'=>$cat['Category']['id'],'User.user_type'=>'E')));
              $category[$key]['Category']['count'] = $numb;
            }
            //pr($category);exit;
        //$this->set(compact('escorts', 'category', 'locationsarray', 'surubsarrays'));
        $this->set(compact('category', 'escorts','locationsarray', 'surubsarrays','showonline', 'showfeature','shownewescorts','showescortofweek','showcountry'));
    }

    public function changepass() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }
        $title_for_layout = 'Public Profile';
        $datata = array();
        $countryname = '';
        //$username = $this->Session->read('username');
        $userid = $this->Session->read('fuid');
        if (!isset($userid)) {
            $this->redirect('/');
        }
        if (!$this->User->exists($userid)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {


            //      pr( $this->request->data);
            // exit;

            $password = $this->request->data['User']['password'];

            $cpassword = $this->request->data['User']['cpassword'];

            if ($password == $cpassword) {
                $datata['password'] = $password;
                $datata['txt_password'] = $password;
                $datata['id'] = $this->Session->read('fuid');

                //echo $datata['password']; exit;
                // pr($datata); exit;

                if ($this->User->save($datata)) {
                    $this->Session->setFlash('Your Password Has been Updated', 'default', array('class' => 'alert alert-success'));
                    return $this->redirect(array('action' => 'edituserprofile'));
                } else {
                    $this->Session->setFlash('Your password could not be chnaged. Please, try again.', 'default', array('class' => 'alert alert-danger'));
                    //$this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash('Your password and confirm password didnt matched. Please, try again.', 'default', array('class' => 'alert alert-danger'));
                return $this->redirect(array('action' => 'edituserprofile'));
            }
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
        //$options = array('conditions' => array('User.id' => $userid));
        $this->request->data = $this->User->find('first', $options);

        $this->set(compact('title_for_layout'));
    }

    public function admin_membership() {

        $this->loadModel('Membership');

       // pr($this->request->data); exit;

        $users = $this->Paginator->paginate('Membership');
        $this->set(compact('users'));
    }

    public function admin_packageactive($id = null) {

        $this->loadModel('Membership');

        $checkuser = $this->Membership->find('first', array('conditions' => array('Membership.id' => $id)));

        if ($checkuser['Membership']['is_active'] == 1) {
            $status = 0;
        } elseif ($checkuser['Membership']['is_active'] == '') {
            $status = 1;
        }

        $this->Membership->updateAll(array('Membership.is_active' => $status), array('Membership.id' => $id));
        return $this->redirect(array('action' => 'membership'));
    }

    public function admin_purchesedmembership() {

        $this->loadModel('User');
        $this->loadModel('Membership');
        $this->paginate = array(
            'conditions' => array('User.user_type' => 'E'),
            'limit' => 8,
            'order' => array(
                'User.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $Category_array = array('conditions' => array('Membership.id' => 2));
        $Category_list = $this->Membership->find('first', $Category_array);


        $this->set('users', $this->Paginator->paginate('User'));
        $this->set(compact('Category_list'));
    }

    public function newreview() {
        $this->autoRender = false;
        $this->loadModel('Review');
        $data = array();

        $this->request->data['review_date'] = date("Y-m-d");
        $data['Review'] = $this->request->data;
        //print_r($data);die;
        $this->Review->create();
        if ($this->Review->save($data)) {
            $this->loadModel("User");
            $user = $this->User->find("first", array("conditions" => array("User.id" => $data['Review']['user_id']), "recursive" => -1));
            //print_r($user);die;
            echo json_encode(array("status" => 1, "data" => $data, "uname" => $user['User']['first_name'] . " " . $user['User']['last_name'], "u_img" => $user['User']['profile_image']));
        } else {
            echo json_encode(array("status" => 0));
        }
    }

    public function admin_categoryadd() {

        $this->loadModel('ShopCategorie');

        if ($this->request->is('post')) {

            $text_slug = trim($this->request->data['ShopCategorie']['name']);
            $slug_url = $this->create_slug($text_slug);
            $this->request->data['ShopCategorie']['slug'] = $slug_url;

            $options = array('conditions' => array('ShopCategorie.name' => $this->request->data['ShopCategorie']['name']));
            $name = $this->ShopCategorie->find('first', $options);
            if (!$name) {
                $this->ShopCategorie->create();
                if ($this->ShopCategorie->save($this->request->data)) {
                    $this->Session->setFlash(__('The category has been saved.'));
                    return $this->redirect(array('action' => 'categoryadd'));
                } else {
                    $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The category name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_categorylist() {

        $this->loadModel('ShopCategorie');

        $this->paginate = array(
            'conditions' => array('ShopCategorie.is_active' => 1),
            'limit' => 8,
            'order' => array(
                'ShopCategorie.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('shopcategories', $this->Paginator->paginate('ShopCategorie'));

        //$this->set(compact('title_for_layout', 'categories'));
    }

    public function admin_editcat($id = null) {

        $this->loadModel('ShopCategorie');

        if (!$this->ShopCategorie->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }



        if ($this->request->is(array('post', 'put'))) {

            $text_slug = trim($this->request->data['ShopCategorie']['name']);
            $slug_url = $this->create_slug($text_slug);
            $this->request->data['ShopCategorie']['slug'] = $slug_url;


            $options = array('conditions' => array('ShopCategorie.name' => $this->request->data['ShopCategorie']['name']));
            $name = $this->ShopCategorie->find('first', $options);


            if ($this->ShopCategorie->save($this->request->data)) {
                $this->Session->setFlash(__('The category has been saved.'));
            } else {
                $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('ShopCategorie.' . $this->ShopCategorie->primaryKey => $id));
            $this->request->data = $this->ShopCategorie->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletecat($id = null) {

        $this->loadModel('ShopCategorie');

        $this->ShopCategorie->id = $id;
        if (!$this->ShopCategorie->exists()) {
            throw new NotFoundException(__('Invalid category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->ShopCategorie->delete()) {
            $this->Session->setFlash(__('The category has been deleted.'));
        } else {
            $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'categorylist'));
    }


    //Website Templastes

    public function admin_websitetemplates() {
            $options = array('conditions' => array('WebsiteTemplate.name !=' => ''));
            $name = $this->WebsiteTemplate->find('all', $options);
            $this->set(compact('name'));

    }


    public function admin_activetemplate($id = null, $val = null) {

        //$this->loadModel('Category');

        $this->WebsiteTemplate->id = $id;
        $this->request->data['WebsiteTemplate']['is_active'] = $val;

        $this->WebsiteTemplate->save($this->request->data);


        return $this->redirect(array('action' => 'admin_websitetemplates'));
    }

    public function admin_productadd() {

        $this->loadModel('User');
        $this->loadModel('ShopCategorie');
        $this->loadModel('Product');

        if (!empty($this->request->data)) {

            $text_slug = trim($this->request->data['Product']['name']);
            $slug_url = $this->create_slug($text_slug);

            $this->request->data['Product']['slug'] = $slug_url;

            //$this->Product->id = $id;

            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The Product has been saved.'));
                return $this->redirect(array('action' => 'productadd'));
            } else {
                $this->Session->setFlash(__('The Product could not be saved. Please, try again.'));
            }
        }




        $options1 = array('conditions' => array('ShopCategorie.is_active' => 1));
        $category = $this->ShopCategorie->find('list', $options1);


        $this->set(compact('storeList', 'owner', 'category', 'selected', 'subcategory'));
    }

    public function admin_productlist($userid = null) {


        $this->loadModel('Product');

        $this->paginate = array(
            'conditions' => array('Product.is_active' => 1),
            'limit' => 8,
            'order' => array(
                'Product.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('allproducts', $this->Paginator->paginate('Product'));
    }

    public function admin_uploadimage($id = null) {

        $this->loadModel('ProductImage');

        $this->ProductImage->id = $id;

        //$this->loadModel('ListImage');
        $this->ProductImage->recursive = 0;
        $this->set('productimages', $this->Paginator->paginate('ProductImage', array('ProductImage.product_id' => $id)));
        $this->set('pid', $id);
    }

    public function admin_uploadProduct($id = null) {

        $this->loadModel('ProductImage');

        $this->autoRender = false;
        $imagename = $_FILES['file']['name'];
        $uploadFolder = "product_img";
        $uploadPath = WWW_ROOT . $uploadFolder;
        $v = $imagename;
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath . '/' . $imagename);
        //$this->loadModel('ListImage');
        $productupdate['ProductImage']['product_id'] = $id;
        $productupdate['ProductImage']['image'] = $imagename;
        $this->ProductImage->save($productupdate);
        $this->ProductImage->recursive = 0;
        $this->set('productimages', $this->Paginator->paginate('ProductImage', array('ProductImage.product_id' => $id)));
    }

    public function admin_imagedelete($id = null) {
        $this->loadModel('ProductImage');
        //$id = base64_decode($id);
        $this->ProductImage->id = $id;
        $pro = $this->ProductImage->read();
        if (!$this->ProductImage->exists()) {
            throw new NotFoundException(__('Invalid product image'));
        }
        #$this->request->allowMethod('post', 'delete');
        if ($this->ProductImage->delete($id)) {
            $this->Session->setFlash('The product image has been deleted.', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'productlist'));
        } else {
            $this->Session->setFlash(__('The product image could not be deleted. Please, try again.'));
        }
        //return $this->redirect(array('action' => 'admin_uploadimage', $id));
    }

    public function admin_editproduct($id = null) {

        $this->loadModel('User');
        $this->loadModel('ShopCategorie');
        $this->loadModel('Product');

        if (!empty($this->request->data)) {

            $text_slug = trim($this->request->data['Product']['name']);
            $slug_url = $this->create_slug($text_slug);

            $this->request->data['Product']['slug_url'] = $slug_url;
            //$this->request->data['Product']['creation_date'] = gmdate('Y-m-d');



            $this->Product->id = $id;

            if ($this->Product->save($this->request->data)) {
                $this->Session->setFlash(__('The Product has been saved.'));
                return $this->redirect(array('action' => 'productlist'));
            } else {
                $this->Session->setFlash(__('The Product could not be saved. Please, try again.'));
            }
        }

        if (!$this->Product->exists($id)) {
            throw new NotFoundException(__('Invalid Product'));
        }

        $options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
        $this->request->data = $this->Product->find('first', $options);


        $options1 = array('conditions' => array('ShopCategorie.is_active' => 1));
        $category = $this->ShopCategorie->find('list', $options1);


        $this->set(compact('storeList', 'owner', 'category', 'selected', 'subcategory'));
    }

    public function admin_deleteproduct($id = null) {

        $this->loadModel('Product');

        $this->Product->id = $id;
        if (!$this->Product->exists()) {
            throw new NotFoundException(__('Invalid listing'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Product->delete()) {
            $this->Session->setFlash(__('The listing has been deleted.'));
            return $this->redirect(array('action' => 'productlist'));
        } else {
            $this->Session->setFlash(__('The listing could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'productlist'));
    }

    public function purchased() {
        $userid = $this->Session->read('fuid');
        $countryname = '';

        if (!isset($userid)) {
            $this->redirect('/');
        }

        $this->loadModel('Order');
        $this->loadModel('OrderDetail');
        $this->loadModel('Billing');
        $title_for_layout = 'Purchase History';
        //$this->Order->recursive = 0;
        // $this->Paginator->settings = array('order'=>array('Order.id'=>"DESC"));
        // $orders = $this->Paginator->paginate('Order', array('Order.user_id' => $userid));

        $this->Paginator->settings = array('order' => array('Order.id' => "DESC"));
        $orders = $this->Paginator->paginate('Order', array('Order.user_id' => $userid));

        //pr($orders); exit;    


        $options = array('conditions' => array('User.id' => $userid));
        $user = $this->User->find('first', $options);

        //pr($user); exit;
        if ($user) {
            if (isset($user['User']['country_id']) && $user['User']['country_id'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $user['User']['country_id']), 'fields' => array('Country.name')));
                $countryname = $countryname['Country']['name'];
            }
        }
        $this->set(compact('orders', 'title_for_layout', 'user', 'countryname'));
    }

    public function escorttours() {
        // $userid = $this->Session->read('fuid');
        // if (!isset($userid)) {
        //     $this->redirect('/');
        // }
        $this->loadModel('User');

        $this->loadModel('Escorttour');

        //$options = array('conditions' => array('User.user_type' => 'E', 'User.is_active' => 1, 'User.is_approved' => 1));

        $options = array('conditions' => array('User.user_type' => 'E'));
        $escorttours = $this->User->find('all', $options);

        
        $this->set(compact('escorttours'));
        
    } public function massageparlours() {
        // $userid = $this->Session->read('fuid');
        // if (!isset($userid)) {
        //     $this->redirect('/');
        // }
        $this->loadModel('User');

    

        //$options = array('conditions' => array('User.user_type' => 'E', 'User.is_active' => 1, 'User.is_approved' => 1));

        $options = array('conditions' => array('User.user_type' => 'P'));
        $escorttours = $this->User->find('all', $options);

        
        $this->set(compact('escorttours'));
        
    }
    public function escortlist($type = null,$id=null) {
        // $userid = $this->Session->read('fuid');
        // if (!isset($userid)) {
        //     $this->redirect('/');
        // }
        $this->loadModel('User');
        $this->loadModel('Category');
       $options11 = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options11);
        foreach($category as $key=>$cat)
            {
              $numb = $this->User->find('count',array('conditions'=>array('User.category_id'=>$cat['Category']['id'],'User.user_type'=>'E','User.gender' => $type)));
              $category[$key]['Category']['count'] = $numb;
            }

        //$options = array('conditions' => array('User.user_type' => 'E', 'User.is_active' => 1, 'User.is_approved' => 1));
            if($id)
            { $id = base64_decode($id);
                $options = array('conditions' => array('User.user_type' => 'E','User.gender' => $type,'User.category_id'=>$id));
            }
        else
        {
            $options = array('conditions' => array('User.user_type' => 'E','User.gender' => $type));
        }
        
        $list = $this->User->find('all', $options);
       // echo "<pre>";
        // print_r($escorttours);
        // echo "</pre>";
        // exit;
        
        $this->set(compact('list','category','type'));
        
    }
     public function stripperlist($type = null) {
        // $userid = $this->Session->read('fuid');
        // if (!isset($userid)) {
        //     $this->redirect('/');
        // }
        $this->loadModel('User');

        

        //$options = array('conditions' => array('User.user_type' => 'E', 'User.is_active' => 1, 'User.is_approved' => 1));

        $options = array('conditions' => array('User.user_type' => 'S','User.srtipper_type' => $type));
        $list = $this->User->find('all', $options);
       // echo "<pre>";
        // print_r($escorttours);
        // echo "</pre>";
        // exit;
        
        $this->set(compact('list'));
        
    }

    public function booking($id = null) {
        $userid = $this->Session->read('fuid');
        if (!isset($userid)) {
            $this->redirect('/');
        }
        $this->loadModel('Booking');
        $this->loadModel('Rate');
        $this->loadModel('EscortEvent');

        $catDt = array();

        $escort_id = base64_decode($id);

        $options = array('conditions' => array('Rate.user_id' => $escort_id));
        $escortrates = $this->Rate->find('first', $options);



        $this->set(compact('escort_id', 'escortrates'));

        //Check weatehr escort is available




        if (!empty($this->request->data)) {
           // pr($this->request->data); exit;

            $optionscheckescort = array('conditions' => array('EscortEvent.user_id' => $this->request->data['escort_id']));
            $checkescortavailibility = $this->EscortEvent->find('first', $optionscheckescort);
            $start_time = strtotime($checkescortavailibility['EscortEvent']['start_time']);
           
            $end_time = strtotime($checkescortavailibility['EscortEvent']['end_time']);
            echo ($end_time - $start_time);
            exit;


            $catDt['Booking']['escort_id'] = $this->request->data['escort_id'];
            $catDt['Booking']['user_id'] = $this->request->data['user_id'];
            $catDt['Booking']['booking_date'] = $this->request->data['booking_date'];
            $catDt['Booking']['duration'] = $this->request->data['duration'];
            $catDt['Booking']['booking_amount'] = $this->request->data['booking_amount'];
            $catDt['Booking']['booking_type'] = $this->request->data['booking_type'];


            $this->Booking->create();

            if ($this->Booking->save($catDt)) {
                $this->Session->setFlash('Your Booking  data saved successfully', 'success');
            } else {
                $this->Session->setFlash('Your Booking data cannot be saved', 'failure');
            }
            $this->redirect('/users/mybookingrequest');
        }
    }

    public function admin_addlanguage() {
        $this->loadModel('Language');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Language.name' => $this->request->data['Language']['name']));
            $name = $this->Language->find('first', $options);
            if (!$name) {
                $this->Language->create();
                if ($this->Language->save($this->request->data)) {
                    $this->Session->setFlash(__('The language has been saved.'));
                    return $this->redirect(array('action' => 'listlanguage'));
                } else {
                    $this->Session->setFlash(__('The language could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The language name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_listlanguage() {

        $this->loadModel('Language');

        $this->paginate = array(
            'conditions' => array('Language.name !=' => ''),
            'limit' => 8,
            'order' => array(
                'Language.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('languages', $this->Paginator->paginate('Language'));
    }

    public function admin_editlanguage($id = null) {


        $this->loadModel('Language');

        if (!$this->Language->exists($id)) {
            throw new NotFoundException(__('Invalid category'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Language.name' => $this->request->data['Language']['name']));
            $name = $this->Language->find('first', $options);


            if ($this->Language->save($this->request->data)) {
                $this->Session->setFlash(__('The language has been saved.'));
            } else {
                $this->Session->setFlash(__('The language could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Language.' . $this->Language->primaryKey => $id));
            $this->request->data = $this->Language->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletelanguage($id = null) {

        $this->loadModel('Language');

        $this->Language->id = $id;
        if (!$this->Language->exists()) {
            throw new NotFoundException(__('Invalid language'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Language->delete()) {
            $this->Session->setFlash(__('The language has been deleted.'));
        } else {
            $this->Session->setFlash(__('The language could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listlanguage'));
    }

    public function admin_activelanguage($id = null, $val = null) {

        $this->loadModel('Language');

        $this->Language->id = $id;
        $this->request->data['Language']['is_active'] = $val;

        $this->Language->save($this->request->data);


        return $this->redirect(array('action' => 'listlanguage'));
    }

    public function deletebooking($id = null) {
        $this->loadModel('Booking');

        $this->Booking->id = base64_decode($id);
        if (!$this->Booking->exists()) {
            throw new NotFoundException(__('Invalid Booking Record'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Booking->delete()) {
            $this->Session->setFlash(__('The Booking has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Booking could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'mybookingrequest'));
    }

    public function admin_addetenecity() {
        $this->loadModel('Ethnicitie');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Ethnicitie.name' => $this->request->data['Ethnicitie']['name']));
            $name = $this->Ethnicitie->find('first', $options);
            if (!$name) {
                $this->Ethnicitie->create();
                if ($this->Ethnicitie->save($this->request->data)) {
                    $this->Session->setFlash(__('The ethenecity has been saved.'));
                    return $this->redirect(array('action' => 'listetenecity'));
                } else {
                    $this->Session->setFlash(__('The ethenecity could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The ethenecity name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_listetenecity() {

        $this->loadModel('Ethnicitie');

        $this->paginate = array(
            'conditions' => array('Ethnicitie.name !=' => ''),
            'limit' => 8,
            'order' => array(
                'Ethnicitie.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('etenecities', $this->Paginator->paginate('Ethnicitie'));
    }

    public function admin_editetenecity($id = null) {


        $this->loadModel('Ethnicitie');

        if (!$this->Ethnicitie->exists($id)) {
            throw new NotFoundException(__('Invalid ethenecity'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Ethnicitie.name' => $this->request->data['Ethnicitie']['name']));
            $name = $this->Ethnicitie->find('first', $options);


            if ($this->Ethnicitie->save($this->request->data)) {
                $this->Session->setFlash(__('The ethenecity has been saved.'));
            } else {
                $this->Session->setFlash(__('The ethenecity could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Ethnicitie.' . $this->Ethnicitie->primaryKey => $id));
            $this->request->data = $this->Ethnicitie->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deleteetenecity($id = null) {

        $this->loadModel('Ethnicitie');

        $this->Ethnicitie->id = $id;
        if (!$this->Ethnicitie->exists()) {
            throw new NotFoundException(__('Invalid ethenecity'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Ethnicitie->delete()) {
            $this->Session->setFlash(__('The ethecity has been deleted.'));
        } else {
            $this->Session->setFlash(__('The ethenecty could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listetenecity'));
    }

    public function admin_activeetenecty($id = null, $val = null) {

        $this->loadModel('Ethnicitie');

        $this->Ethnicitie->id = $id;
        $this->request->data['Ethnicitie']['is_active'] = $val;

        $this->Ethnicitie->save($this->request->data);


        return $this->redirect(array('action' => 'listetenecity'));
    }

    public function admin_addcategory() {
        $this->loadModel('Category');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Category.name' => $this->request->data['Category']['name']));
            $name = $this->Category->find('first', $options);
            if (!$name) {
                $this->Category->create();
                if ($this->Category->save($this->request->data)) {
                    $this->Session->setFlash(__('The Category has been saved.'));
                    return $this->redirect(array('action' => 'listcategory'));
                } else {
                    $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The Category name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_listcategory() {

        $this->loadModel('Category');

        $this->paginate = array(
            'conditions' => array('Category.name !=' => ''),
            'limit' => 10,
            'order' => array(
                'Category.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('categoriesescort', $this->Paginator->paginate('Category'));
    }

    public function admin_editcategory($id = null) {


        $this->loadModel('Category');

        if (!$this->Category->exists($id)) {
            throw new NotFoundException(__('Invalid Category'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Category.name' => $this->request->data['Category']['name']));
            $name = $this->Category->find('first', $options);


            if ($this->Category->save($this->request->data)) {
                $this->Session->setFlash(__('The Category has been saved.'));
            } else {
                $this->Session->setFlash(__('The Category could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->request->data = $this->Category->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletecategory($id = null) {

        $this->loadModel('Category');

        $this->Category->id = $id;
        if (!$this->Category->exists()) {
            throw new NotFoundException(__('Invalid Category'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Category->delete()) {
            $this->Session->setFlash(__('The Category has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Category could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listcategory'));
    }

    public function admin_activecategory($id = null, $val = null) {

        $this->loadModel('Category');

        $this->Category->id = $id;
        $this->request->data['Category']['active'] = $val;

        $this->Category->save($this->request->data);


        return $this->redirect(array('action' => 'listcategory'));
    }

    public function admin_approvephotos(){

            $ct = array();
            $this->loadModel('Photo');
             $this->loadModel('User');

            $options = array('conditions' => array('User.user_type'=>'E','User.club_id' => 0,'User.agency_id' => 0));
            $alloweduser = $this->User->find('all', $options);
            //pr($alloweduser); exit;
           //echo $alloweduser[0]['User']['id']; exit;

            foreach ($alloweduser as $allescortsids) {
               $ct[] = $allescortsids['User']['id'];
            }
          $storeescortsvar = implode(',', $ct);
          $testescortarr = explode(',', $storeescortsvar);
            $this->paginate = array(
                                    'conditions' => array('Photo.img !=' => '','Photo.uid' => $testescortarr),
                                    'limit' => 10,
                                    'order' => array(
                                        'Photo.id' => 'desc'
                                    )
            );
            $this->Paginator->settings = $this->paginate;

            $this->set('escortphoto', $this->Paginator->paginate('Photo'));
            //pr($escortphoto); exit;

            // $options = array('conditions' => array('Photo.img !=' => '','Photo.uid' => $testescortarr));
            // $alloweduser = $this->Photo->find('all', $options);
            // pr($alloweduser); exit;

    }


    public function admin_activephoto($id = null, $val = null) {

        $this->loadModel('Photo');

        $this->Photo->id = $id;
        $this->request->data['Photo']['is_active'] = $val;

        $this->Photo->save($this->request->data);


        return $this->redirect(array('action' => 'admin_approvephotos'));
    }

    public function admin_addnationality() {
        $this->loadModel('Nationality');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Nationality.name' => $this->request->data['Nationality']['name']));
            $name = $this->Nationality->find('first', $options);
            if (!$name) {
                $this->Nationality->create();
                if ($this->Nationality->save($this->request->data)) {
                    $this->Session->setFlash(__('The Nationality has been saved.'));
                    return $this->redirect(array('action' => 'listnationality'));
                } else {
                    $this->Session->setFlash(__('The Nationality could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The Nationality name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_listnationality() {

        $this->loadModel('Nationality');

        $this->paginate = array(
            'conditions' => array('Nationality.name !=' => ''),
            'limit' => 10,
            'order' => array(
                'Nationality.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('natiolities', $this->Paginator->paginate('Nationality'));
    }

    public function admin_editnationality($id = null) {


        $this->loadModel('Nationality');

        if (!$this->Nationality->exists($id)) {
            throw new NotFoundException(__('Invalid Nationality'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Nationality.name' => $this->request->data['Nationality']['name']));
            $name = $this->Nationality->find('first', $options);


            if ($this->Nationality->save($this->request->data)) {
                $this->Session->setFlash(__('The Nationality has been saved.'));
            } else {
                $this->Session->setFlash(__('The Nationality could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Nationality.' . $this->Nationality->primaryKey => $id));
            $this->request->data = $this->Nationality->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletenationality($id = null) {

        $this->loadModel('Nationality');

        $this->Nationality->id = $id;
        if (!$this->Nationality->exists()) {
            throw new NotFoundException(__('Invalid Nationality'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Nationality->delete()) {
            $this->Session->setFlash(__('The Nationality has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Nationality could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listnationality'));
    }

    public function admin_activenationality($id = null, $val = null) {

        $this->loadModel('Nationality');

        $this->Nationality->id = $id;
        $this->request->data['Nationality']['is_active'] = $val;

        $this->Nationality->save($this->request->data);


        return $this->redirect(array('action' => 'listnationality'));
    }

    public function admin_addworkroomcat() {
        $this->loadModel('WorkroomCategory');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('WorkroomCategory.name' => $this->request->data['WorkroomCategory']['name']));
            $name = $this->WorkroomCategory->find('first', $options);
            if (!$name) {
                $this->WorkroomCategory->create();
                if ($this->WorkroomCategory->save($this->request->data)) {
                    $this->Session->setFlash(__('The WorkroomCategory has been saved.'));
                    return $this->redirect(array('action' => 'listworkroomcat'));
                } else {
                    $this->Session->setFlash(__('The WorkroomCategory could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The WorkroomCategory name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_listworkroomcat() {

        $this->loadModel('WorkroomCategory');

        $this->paginate = array(
            'conditions' => array('WorkroomCategory.name !=' => ''),
            'limit' => 10,
            'order' => array(
                'WorkroomCategory.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('workroomcategories', $this->Paginator->paginate('WorkroomCategory'));
    }

    public function admin_editworkroomcat($id = null) {


        $this->loadModel('WorkroomCategory');

        if (!$this->WorkroomCategory->exists($id)) {
            throw new NotFoundException(__('Invalid WorkroomCategory'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('WorkroomCategory.name' => $this->request->data['WorkroomCategory']['name']));
            $name = $this->WorkroomCategory->find('first', $options);


            if ($this->WorkroomCategory->save($this->request->data)) {
                $this->Session->setFlash(__('The WorkroomCategory has been saved.'));
            } else {
                $this->Session->setFlash(__('The WorkroomCategory could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('WorkroomCategory.' . $this->WorkroomCategory->primaryKey => $id));
            $this->request->data = $this->WorkroomCategory->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deleteworkroomcat($id = null) {

        $this->loadModel('WorkroomCategory');

        $this->WorkroomCategory->id = $id;
        if (!$this->WorkroomCategory->exists()) {
            throw new NotFoundException(__('Invalid WorkroomCategory'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->WorkroomCategory->delete()) {
            $this->Session->setFlash(__('The WorkroomCategory has been deleted.'));
        } else {
            $this->Session->setFlash(__('The WorkroomCategory could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listworkroomcat'));
    }

    public function admin_activeworkroomcat($id = null, $val = null) {

        $this->loadModel('WorkroomCategory');

        $this->WorkroomCategory->id = $id;
        $this->request->data['WorkroomCategory']['is_active'] = $val;

        $this->WorkroomCategory->save($this->request->data);


        return $this->redirect(array('action' => 'listworkroomcat'));
    }

     public function admin_orderlist() {
        $this->loadModel('Order');
        //$this->loadModel('OrderDetail');

        $this->paginate = array(
            'conditions' => array('Order.id !=' => ''),
            'limit' => 8,
            'order' => array(
                'Order.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('orders', $this->Paginator->paginate('Order'));
    }



    public function admin_deleteOrder($id = null) {

        $this->loadModel('Order');

        $this->Order->id = $id;
        if (!$this->Order->exists()) {
            throw new NotFoundException(__('Invalid Order'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Order->delete()) {
            $this->Session->setFlash(__('The Order has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Order could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'orderlist'));
    }

    public function admin_orderdetails($id = null){
        $this->loadModel("OrderDetail");
        //$id = base64_decode($id);
        $options = array('conditions' => array('Order.id' => $id));
        $orderdetails = $this->OrderDetail->find('all', $options);
        //pr($orderdetails);exit;
        $this->set(compact('orderdetails'));
    }

     public function rate_val(){
        $this->autoRender = false ;
        $this->layout = false ;

        $user_id = $this->Session->read('fuid');
        
        if($user_id == ''){
             $this->redirect('/users/');
        }


        $escort_id = $this->request->data('escort_id');
        $service_type = $this->request->data('stId');
        $this->loadModel('Rate');

        $options = array('conditions' => array('Rate.user_id' => $escort_id));
        $userdet = $this->Rate->find('first', $options);
        //pr($options); exit;
        echo $userdet['Rate'][$service_type]; exit;
        $this->set(compact('userdet'));
    }


public function membershippayment() {

        if (!$this->Session->read('flogin') || $this->Session->read('flogin') != "yes") {
            if (!$this->Session->read('futype') || $this->Session->read('futype') != "U") {
                $this->Session->setFlash('You are not authoriised In this page');
                $this->redirect('/');
            }
            $this->Session->setFlash('You are not authoriised In this page');
            $this->redirect('/');
        }

        $this->loadModel("User");
        if ($this->Session->read('futype') != 'U') {
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
        $this->request->data['User']['is_paid'] = 1;


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
                    return $this->redirect(array('action' => 'userdashboard'));
                }
            } else {
                
            }
        }
        if (strcmp($res, "INVALID") == 0) {
            $this->Session->setFlash('Your Payment is not Successfull.');
            return $this->redirect(array('action' => 'userdashboard'));
        }
        fclose($fp);

        $this->Session->delete('finalprice');
        $this->Session->delete('packid');
    }

    public function failure() {
        
    }

    //========================================Admin Attribute Add Edit Delete List


     public function admin_memattributeadd() {

        //$this->loadModel('ShopCategorie');

        if ($this->request->is('post')) {

            $text_slug = trim($this->request->data['Membershipattrbute']['name']);
            $slug_url = $this->create_slug($text_slug);
            $this->request->data['Membershipattrbute']['slug'] = $slug_url;

            $options = array('conditions' => array('Membershipattrbute.name' => $this->request->data['Membershipattrbute']['name']));
            $name = $this->Membershipattrbute->find('first', $options);
            if (!$name) {
                $this->Membershipattrbute->create();
                if ($this->Membershipattrbute->save($this->request->data)) {
                    $this->Session->setFlash(__('The Membership Attribute has been saved.'));
                    return $this->redirect(array('action' => 'memattributelist'));
                } else {
                    $this->Session->setFlash(__('The membership attribute could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The membership attribute name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs'));
    }

    public function admin_memattributelist() {

        //$this->loadModel('ShopCategorie');

        $this->paginate = array(
            'conditions' => array('Membershipattrbute.is_active' => 1),
            'limit' => 8,
            'order' => array(
                'Membershipattrbute.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('categoriesescort', $this->Paginator->paginate('Membershipattrbute'));

        //$this->set(compact('title_for_layout', 'categories'));
    }

    public function admin_editmemattribute($id = null) {

        //$this->loadModel('ShopCategorie');

        if (!$this->Membershipattrbute->exists($id)) {
            throw new NotFoundException(__('Invalid Membership Feature'));
        }



        if ($this->request->is(array('post', 'put'))) {

            $text_slug = trim($this->request->data['Membershipattrbute']['name']);
            $slug_url = $this->create_slug($text_slug);
            $this->request->data['Membershipattrbute']['slug'] = $slug_url;


            $options = array('conditions' => array('Membershipattrbute.name' => $this->request->data['Membershipattrbute']['name']));
            $name = $this->Membershipattrbute->find('first', $options);


            if ($this->Membershipattrbute->save($this->request->data)) {
                $this->Session->setFlash(__('The Membership Feature has been saved.'));
            } else {
                $this->Session->setFlash(__('The Membership Feature could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Membershipattrbute.' . $this->Membershipattrbute->primaryKey => $id));
            $this->request->data = $this->Membershipattrbute->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletememattribute($id = null) {

       

        $this->Membershipattrbute->id = $id;
        if (!$this->Membershipattrbute->exists()) {
            throw new NotFoundException(__('Invalid Attribute'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Membershipattrbute->delete()) {
            $this->Session->setFlash(__('The Attribute has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Attribute could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'memattributelist'));
    }

    public function admin_membership_feature($id = null){
        $this->loadModel('Membership');

        if (!empty($this->request->data)) {

         pr($this->request->data); exit;


        $this->Membership->id = $id;

        // if ($this->Membership->save($this->request->data)) {
        // $this->Session->setFlash(__('The Membership has been saved.'));
        // return $this->redirect(array('action' => 'membership'));
        // } else {
        // $this->Session->setFlash(__('The Membership could not be updated. Please, try again.'));
        // }
        // }

            if ($this->Membership->id) {
                // $data = implode(',', $this->request->data);
                // echo $data; exit;
                $this->Membership->saveField('allowed_features', $data);
                return $this->redirect(array('action' => 'membership'));
            }else {
                $this->Session->setFlash(__('The Membership could not be updated. Please, try again.'));
            }

        if (!$this->Membership->exists($id)) {
            throw new NotFoundException(__('Invalid Membership'));
        }   
    }


            $options1 = array('conditions' => array('Membershipattrbute.is_active' => 1));
            $feature = $this->Membershipattrbute->find('list', $options1);
            $this->set(compact('feature'));

    }

    public function admin_addclub(){
        $this->loadModel("Country");
        $this->loadModel("State");
        $this->loadModel("City");
        if ($this->request->is('post')) {
            $this->User->create();
            $username = $this->request->data['User']['username'];
            $email = $this->request->data['User']['email'];
            $checkuser = $this->User->find('count', array('conditions' => array('User.username' => $username)));
            $checkemail = $this->User->find('count', array('conditions' => array('User.email' => $email)));
            if ($checkuser > 0) {
                $this->Session->setFlash(__('Duplicate Username.'));
                return $this->redirect(array('action' => 'addclub'));
            } elseif ($checkemail > 0) {
                $this->Session->setFlash(__('Duplicate Email.'));
                return $this->redirect(array('action' => 'addclub'));
            } else {


                if (!empty($this->request->data['User']['profile_image']['name'])) {
                    $pathpart = pathinfo($this->request->data['User']['profile_image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'], $full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'addagency'));
                    }
                } else {
                    $this->request->data['User']['profile_image'] = '';
                }

                $this->request->data['User']['join_date'] = date('Y-m-d');

                $this->request->data['User']['user_type'] = 'C';
                $this->request->data['User']['is_active'] = 1;
                //pr($this->request->data);exit;
                if ($this->User->save($this->request->data)) {

                    $this->Session->setFlash('The Club has been saved.', 'default', array('class' => 'success'));
                    return $this->redirect(['controller' => 'clubs', 'action' => 'index']);
                } else {
                    $this->Session->setFlash(__('The Club could not be saved. Please, try again.'));
                }
            }
        }
        $countries = $this->Country->find('list', array('fields' => array('Country.id', 'Country.name')));
        $states = $this->State->find('list', array('fields' => array('State.id', 'State.name')));
        $cities = $this->City->find('list', array('fields' => array('City.id', 'City.name')));
        $this->set(compact('countries', 'states', 'cities'));
    }


}
