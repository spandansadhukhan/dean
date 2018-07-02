<?php
App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {
	
	/*function beforeFilter() {
		parent::beforeFilter();
	}*/
/**
 * Components
 *
 * @var array
 */
	public $name = 'Users';
	public $components = array('Session','RequestHandler','Paginator');
	var $uses = array('User','Country','City','SiteSetting');
	
	
	
	
	
	public function login() {
            $userid = $this->Session->read('userid');
            $username = $this->Session->read('username');
            $title_for_layout = 'Sign In';
            $this->set(compact('title_for_layout'));
            if(isset($userid) && $userid!=''){
                    return $this->redirect(array('action' => 'dashboard'));
            }
            if ($this->request->is('post')) {
                    $options = array('conditions' => array('User.email'  => $this->request->data['User']['email'],'User.password' => md5($this->request->data['User']['passwordl']),'User.is_active'=>1));
                    $loginuser = $this->User->find('first', $options);

                    if(!$loginuser){
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
            if ($fb_user_id!='') {
                    $options = array('conditions' => array('User.fb_user_id'  => $fb_user_id, 'User.is_active'=>1));
                    $loginuser = $this->User->find('first', $options);
                    if(!$loginuser){
                        $data = 'Register@@@@null';
                    } else {				
                        $this->Session->write('userid', $loginuser['User']['id']);
                        $this->Session->write('username', $loginuser['User']['first_name']);
                        $data = 'Login@@@@'.$loginuser['User']['first_name'];
                    }
            }
            echo $data;
            exit;
	}

	public function logout() {
		#return $this->redirect($this->Auth->logout());
		$this->Session->delete('userid');
                $this->Session->delete('username');
		$this->redirect('/');
	}
/**
 * index method
 *
 * @return void
 */
        public function site_logo() {
            $this->loadModel('SiteSetting');
            $setting_array=array('conditions'=>array('`SiteSetting`.`id`'=>1));
            $Content=$this->SiteSetting->find('first',$setting_array);
            $logo_name='logo.png';
            if(count($Content)>0 && !empty($Content)){
                foreach($Content as $val){
                    if($val['SiteSetting']['site_logo']!=''){
                        $logo_name=$val['SiteSetting']['site_logo'];
                    }
                }
            }
            return $logo_name;
	}
        
        
	public function index() {
            $this->loadModel('Category');
            $title_for_layout = 'Home';
            $Category_array=array('conditions'=>array('`Category`.`parent_id`'=>0, '`Category`.`active`'=>1));
            $Category_list=$this->Category->find('list',$Category_array);
            $this->set('Category_list',$Category_list);
            
            //$optionFemale=array('conditions'=>array('`User`.`user_type`= 1', '`User`.`id`!= 2', '`User`.`gender` = F', '`User`.`is_active`= 1'),'order' => array('User.id' => 'DESC'),'limit' =>4);
            //$FemaleEscorts_list=$this->User->find('all',$optionFemale);
            
            //$optionMale=array('conditions'=>array('`User`.`user_type`= 1', '`User`.`id`!= 2', '`User`.`gender` = M', '`User`.`is_active`= 1'),'order' => array('User.id' => 'DESC'),'limit' =>4);
            //$MaleEscorts_list=$this->User->find('all',$optionMale);
            $this->set(compact('title_for_layout', 'FemaleEscorts_list', 'MaleEscorts_list'));    
		/*$options = array('conditions' => array('Shop.is_active'  => 1, 'Shop.is_featured' => 1, 'Shop.display_on_homepage' => 1), 'fields' => array('Shop.user_id'), 'limit' => 3);
		$featuredShops = $this->Shop->find('list', $options);
		#pr($featuredShops);
		if($featuredShops){
			$options = array('conditions' => array('User.id' => $featuredShops), 'fields' => array('User.cover_img'));
			$userFeatured = $this->User->find('all', $options);
			#pr($userFeatured);
		}
		$social=$this->SiteSetting->find('all');
		$this->set('social',$social);
		$optionarray=array('conditions'=>array('DATEDIFF(now(),`Order`.`order_date`)< 30'),'group' => '`OrderDetail`.`list_id` DESC','limit' =>3);
		$recent_list=$this->OrderDetail->find('all',$optionarray);
		$i=0;
		foreach($recent_list as $recentlist)
		{
			$optionarray1=array('conditions'=>array('`OrderDetail`.`list_id`'=>$recentlist['OrderDetail']['list_id']),'fields' => array('sum(`OrderDetail`.`quantity`) as total_sum'));
			$recent_list_quantity=$this->OrderDetail->find('first',$optionarray1);
			$option_image=array('conditions'=>array('`ListImage`.`list_id`'=>$recentlist['OrderDetail']['list_id']));
			$image=$this->ListImage->find('first',$option_image);
			$recent_list[$i]['Listing']['image']=$image['ListImage']['image_name'];
			$recent_list[$i]['Listing']['item']=$recent_list_quantity['0']['total_sum'];
			$i++;	
		}
		$this->set('recent_list',$recent_list);
		
		$content_array=array('conditions'=>array('`Content`.`id`'=>4));
		$Content=$this->Content->find('first',$content_array);
		$this->set('Content',$Content);
		$content_array1=array('conditions'=>array('`Content`.`id`'=>5));
		$Content1=$this->Content->find('first',$content_array1);
		$this->set('Content1',$Content1);
		$content_array2=array('conditions'=>array('`Content`.`id`'=>6));
		$Content2=$this->Content->find('first',$content_array2);
		$this->set('Content2',$Content2);
		$this->set(compact('title_for_layout','userFeatured'));
		$Testimonials= $this->Testimonial->find('all',array('limit'=>1));
		$this->set('Testimonials',$Testimonials);*/
	}

        public function change_password(){
            $title_for_layout='Edit Profile';
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid=='')
            {
                $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
	        return $this->redirect(array('action' => 'login'));
            }
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
            $user=$this->User->find('first', $options);
            if ($this->request->is(array('post', 'put'))){	
               $prev_pass=$user['User']['txt_password'];
               $curr_pass=$this->request->data['User']['curr_pass'];
               $new_pass=$this->request->data['User']['new_pass'];

               //$PasswordHasher = new SimplePasswordHasher();
               //$curr_pass_hash=$PasswordHasher->hash($curr_pass);
               if($prev_pass != $curr_pass){
                    $this->Session->setFlash('Invalid current password.', 'default');
                    return $this->redirect(array('action' => 'change_password'));
               }else{ 
                    if($this->request->data['User']['new_pass'] == $this->request->data['User']['con_pass']){

                        $user_data_auth['User']['id']=$userid;
                        $user_data_auth['User']['password']=md5($new_pass);
                        $user_data_auth['User']['txt_password']=$this->request->data['User']['con_pass'];
                        if($this->User->save($user_data_auth)){
                            $this->Session->setFlash('Password updated successfully.', 'default', array('class' => 'success'));
                            return $this->redirect(array('action' => 'change_password'));
                        } 

                    }else {
                            $this->Session->setFlash('Password Does not matched.', 'default');
                        return $this->redirect(array('action' => 'change_password'));
                    }        
               }
            }
            //$this->set(compact('user'));
            $this->set(compact('user','title_for_layout'));
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
                        $username=$this->request->data['User']['username'];
                        $email=$this->request->data['User']['email'];
                        $checkuser=$this->User->find('count',array('conditions'=>array('User.username'=>$username)));
                        $checkemail=$this->User->find('count',array('conditions'=>array('User.email'=>$email)));
                        if($checkuser>0)
                        {
                            $this->Session->setFlash(__('Duplicate Username.'));
                            return $this->redirect(array('action' => 'addsubadmin'));

                        }
                        elseif ($checkemail>0) {
                        $this->Session->setFlash(__('Duplicate Email.'));
                        return $this->redirect(array('action' => 'addsubadmin'));    
                        }
                        else 
                        {
                        if(!empty($this->request->data['User']['profile_image']['name'])){
			$pathpart=pathinfo($this->request->data['User']['profile_image']['name']);
			$ext=$pathpart['extension'];
			$extensionValid = array('jpg','jpeg','png','gif');
			if(in_array(strtolower($ext),$extensionValid)){
			$uploadFolder = "user_images";
			$uploadPath = WWW_ROOT . $uploadFolder;	
			$filename =uniqid().'.'.$ext;
			$full_flg_path = $uploadPath . '/' . $filename;
			move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_flg_path);
			$this->request->data['User']['profile_image'] = $filename;
                        }
			else{
			$this->Session->setFlash(__('Invalid image type.'));
			return $this->redirect(array('action' => 'addsubadmin'));	
			}
			}else{
			$this->request->data['User']['profile_image']='';		
			}    
                            
                            
                            
                            
                        $this->request->data['User']['join_date']=date('Y-m-d');  
                        $this->request->data['User']['is_active']=1; 
                        $this->request->data['User']['is_admin']=1;
                           
                        if ($this->User->save($this->request->data)) {
                                $last_user=$this->User->getLastInsertId();
                                $this->request->data['Privilege']['user_id']=$last_user;
                                $this->Privilege->save($this->request->data);
				$this->Session->setFlash('The subadmin has been saved.','default',array('class'=>'success'));
				return $this->redirect(array('action' => 'addsubadmin'));
			} else {
				$this->Session->setFlash(__('The subadmin could not be saved. Please, try again.'));
			}  
                        }
                    
                        
                     }
	}
        public function admin_subadmin() 
        {
         $this->User->recursive=0;

        
         if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
            
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action'] = $this->request->params['action'];
            $filter_url['page'] = 1;
            foreach($this->data['Filter'] as $name => $value){
                if($value){
                    $filter_url[$name] = urlencode($value);
                }
            }	
            return $this->redirect($filter_url);
        }
        else 
        {


            $limit = 20;
            $conditions['User.is_admin']=1;
            $conditions['User.id !=']=1;            
            foreach($this->params['named'] as $param_name => $value){
                //pr($param_name);exit;
                if(!in_array($param_name, array('page','sort','direction','limit'))){
                    if($param_name=='name')
                    {
                        $conditions['User.name LIKE'] = urldecode('%'.$value).'%';
                    }
                    else
                    {
                        if($param_name!='advace_search_type')
                        {
                        
                        $conditions['User.'.$param_name] = urldecode($value);
                        }

                    }
                    $is_active=isset($this->params['named']['is_active'])?$this->params['named']['is_active']:'';
                    //pr($is_active);exit;
                    if($is_active=='1')
                    {
                        //echo "hello";exit;
                    }
                    else if($is_active=='')
                    {
                        //$this->params['named']['is_active']=0;
                        $conditions['User.is_active ='] = 0;
                    }
                    $direction=isset($this->params['named']['direction'])?$this->params['named']['direction']:'';
                    if($direction=='Old')
                    {
                     $order_by="User.join_date asc";   
                    }
                    else if($direction=='New'){
                    $order_by="User.join_date desc";                      
                    
                    }
                    
                    else if($direction=='Asc'){
                    $order_by="User.id asc";                      
                    
                    }
                    else if($direction=='New'){
                    $order_by="User.id desc";                      
                    
                    }
                    
                    else{
                    $order_by="User.id desc";                        
                        
                    }
                   if(isset($direction) and !empty($direction)) 
                   {
                   $this->request->data['Filter']['direction'] = $direction;
                   }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                   
                    
                    
                }
            }
        }
         
         if(!isset($order_by))
         {
          $order_by="User.id desc";
         }
         $this->Paginator->settings=array(
         'conditions'=>$conditions,
         'order'=>$order_by,
         'limit'=>$limit,
         'fields'=>array('User.id','User.name','User.username','User.email','User.department','User.join_date','User.profile_image')   
         
         );
         
         $total_user=$this->User->find('count',array('conditions'=>$conditions));
         
         $users=$this->Paginator->paginate('User');
         $this->set(compact('users','total_user'));
         
        }


        public function admin_editsubadmin($id = null)
        {
             $this->loadModel("Privilege");
            //echo $id;exit;

            //echo "hello";exit;

            /*$userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
        $title_for_layout = 'User Edit';
        $this->set(compact('title_for_layout'));
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }*/
        if ($this->request->is(array('post', 'put'))) {

            if(isset($this->request->data['User']['password']) && $this->request->data['User']['password']!=''){
                $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
            }else{
                $this->request->data['User']['password'] = $this->request->data['User']['hidpw'];
            }
                        
                        if(isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name']!=''){

                        $pathpart=pathinfo($this->request->data['User']['profile_image']['name']);
                        $ext=$pathpart['extension'];
                        
                        $extensionValid = array('jpg','jpeg','png','gif');
                        if(in_array(strtolower($ext),$extensionValid)){
                        $uploadFolder = "user_images";
                        $uploadPath = WWW_ROOT . $uploadFolder; 
                        $filename =uniqid().'.'.$ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_flg_path);
                        $this->request->data['User']['profile_image'] = $filename;


                        /*$ext = explode('.',$this->request->data['User']['profile_image']['name']);
            if($ext){
                            $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');

                            $extensionValid = array('jpg','jpeg','png','gif');
                            if(in_array($ext[1],$extensionValid)){
                                    $imageName = rand().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
                                    $full_image_path = $uploadPath . '/' . $imageName;
                                    move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path);
                                    $this->request->data['User']['profile_image'] = $imageName;*/


                            } else{
                                    $this->Session->setFlash(__('Invalid Image Type'));
                                    return $this->redirect(array('action' => 'editsubadmin',$id));
                            }
           
                    }else{
                           $this->request->data['User']['profile_image'] = $this->request->data['User']['hid_profile_image'];
                    }
                        
                        //pr($this->request->data);exit;
                    //pr($this->request->data['Privilege']);exit;
                    

                    $this->Privilege->updateAll($this->request->data['Privilege'],array('Privilege.user_id'=>$id));

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
            $Privileges=$this->Privilege->find('first', $options1);
            //pr($Privileges);exit;
            //pr($this->request->data);exit;
            $this->set(compact('Privileges'));

                       
        }

        }
        
        public function admin_addescort() {
                $this->loadModel("Country");
                $this->loadModel("State");
		if ($this->request->is('post')) {
			$this->User->create();
                        $username=$this->request->data['User']['username'];
                        $email=$this->request->data['User']['email'];
                        $checkuser=$this->User->find('count',array('conditions'=>array('User.username'=>$username)));
                        $checkemail=$this->User->find('count',array('conditions'=>array('User.email'=>$email)));
                        if($checkuser>0)
                        {
                            $this->Session->setFlash(__('Duplicate Username.'));
                            return $this->redirect(array('action' => 'addescort'));

                        }
                        elseif ($checkemail>0) {
                        $this->Session->setFlash(__('Duplicate Email.'));
                        return $this->redirect(array('action' => 'addescort'));    
                        }
                        else 
                        {
                           
                        $this->request->data['User']['join_date']=date('Y-m-d');  
                      
                        $this->request->data['User']['user_type']='E';   
                        if ($this->User->save($this->request->data)) {
                               
				$this->Session->setFlash('The Escort has been saved.','default',array('class'=>'success'));
				return $this->redirect(array('action' => 'addescort'));
			} else {
				$this->Session->setFlash(__('The Escort could not be saved. Please, try again.'));
			}  
                        }
                    
                        
                     }
                $countries=$this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
                $states=$this->State->find('list',array('fields'=>array('State.id','State.name')));
                $this->set(compact('countries','states'));
	}
        
        public function admin_addagency() {
                $this->loadModel("Country");
                $this->loadModel("State");
		if ($this->request->is('post')) {
			$this->User->create();
                        $username=$this->request->data['User']['username'];
                        $email=$this->request->data['User']['email'];
                        $checkuser=$this->User->find('count',array('conditions'=>array('User.username'=>$username)));
                        $checkemail=$this->User->find('count',array('conditions'=>array('User.email'=>$email)));
                        if($checkuser>0)
                        {
                            $this->Session->setFlash(__('Duplicate Username.'));
                            return $this->redirect(array('action' => 'addagency'));

                        }
                        elseif ($checkemail>0) {
                        $this->Session->setFlash(__('Duplicate Email.'));
                        return $this->redirect(array('action' => 'addagency'));    
                        }
                        else 
                        {
                        if(!empty($this->request->data['User']['profile_image']['name'])){
			$pathpart=pathinfo($this->request->data['User']['profile_image']['name']);
			$ext=$pathpart['extension'];
			$extensionValid = array('jpg','jpeg','png','gif');
			if(in_array(strtolower($ext),$extensionValid)){
			$uploadFolder = "user_images";
			$uploadPath = WWW_ROOT . $uploadFolder;	
			$filename =uniqid().'.'.$ext;
			$full_flg_path = $uploadPath . '/' . $filename;
			move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_flg_path);
			$this->request->data['User']['profile_image'] = $filename;
                        }
			else{
			$this->Session->setFlash(__('Invalid image type.'));
			return $this->redirect(array('action' => 'addagency'));	
			}
			}else{
			$this->request->data['User']['profile_image']='';		
			}    
                            
                        $this->request->data['User']['join_date']=date('Y-m-d');  
                      
                        $this->request->data['User']['user_type']='A';   
                        if ($this->User->save($this->request->data)) {
                               
				$this->Session->setFlash('The Agency has been saved.','default',array('class'=>'success'));
				return $this->redirect(array('action' => 'addagency'));
			} else {
				$this->Session->setFlash(__('The addescort could not be saved. Please, try again.'));
			}  
                        }
                    
                        
                     }
                $countries=$this->Country->find('list',array('fields'=>array('Country.id','Country.name')));
                $states=$this->State->find('list',array('fields'=>array('State.id','State.name')));
                $this->set(compact('countries','states'));
	}
        
        
        public function admin_changecity($state_id=null)
        {
          $this->loadModel('City');
          $cities=$this->City->find('list',array('conditions'=>array('City.state_id'=>$state_id),'fields'=>array('City.id','City.name')));
          $output="";
          foreach($cities as  $key=>$city){
            $output.="<option value='".$key."'>".$city."</option>";          
                    
          }
          echo $output;
          exit;
        }
        
        public function dashboard() {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
                    return $this->redirect(array('action' => 'login'));
            }
	}
        
	public function signup() {
		$userid = $this->Session->read('userid');
		$username = $this->Session->read('username');
		if(isset($userid) && $userid!=''){
			return $this->redirect(array('action' => 'dashboard'));
		}
                //$UserTypeID=base64_decode($UserType);
                $title_for_layout = 'Sign up';
		if ($this->request->is('post')) {
                    $Username=$this->request->data['Username'];
                    if($Username!=''){
                        $ExpUsername = explode(" ", $Username);
                        $this->request->data['User']['first_name'] = isset($ExpUsername[0])?$ExpUsername[0]:'';
                        $this->request->data['User']['last_name'] = isset($ExpUsername[1])?$ExpUsername[1]:'';
                    }
                    $options = array('conditions' => array('User.email'  => $this->request->data['User']['email']));
                    $emailexists = $this->User->find('first', $options);
                    if(!$emailexists){
                            
                            if($this->request->data['User']['password']==$this->request->data['User']['conpassword']){
                                
                                    $this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
                                    $this->request->data['User']['password'] = md5($this->request->data['User']['password']);
                                    $this->request->data['User']['user_type'] = $this->request->data['User']['user_type'];
                                    //$this->request->data['User']['user_type'] = $UserTypeID;
                                    $this->request->data['User']['gender'] = $this->request->data['User']['gender'];
                                    $this->request->data['User']['city'] = $this->request->data['User']['city'];
                                    $this->request->data['User']['country_id'] = $this->request->data['User']['country_id'];
                                    $this->request->data['User']['birthday'] = '0000-00-00';
                                    $this->request->data['User']['state_id'] = $this->request->data['User']['state_id'];
                                    $this->request->data['User']['phone_no'] = $this->request->data['User']['phone_no'];
                                    $this->request->data['User']['join_date'] = date('Y-m-d');
                                    if(isset($this->request->data['User']['subscribe_newsletter']) && $this->request->data['User']['subscribe_newsletter']!=''){
                                         $this->request->data['User']['subscribe_newsletter'] = $this->request->data['User']['subscribe_newsletter'];
                                    }
                                   
                                    $this->request->data['User']['is_active'] = 1;
                                    //$this->request->data['User']['fb_user_id'] = $this->request->data['User']['fb_user_id'];
                                    $this->User->create();

                                    if ($this->User->save($this->request->data)) {
                                            $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email', 'SiteSetting.site_name')));
                                            if($contact_email){
                                                    $adminEmail = $contact_email['SiteSetting']['contact_email'];
                                            } else {
                                                    $adminEmail = 'superadmin@abc.com';
                                            }
                                            $options = array('conditions' => array('User.id' => $this->User->getLastInsertId()));
                                            $lastInsetred = $this->User->find('first', $options);
                                            #pr($lastInsetred);
                                            //$link = 'http://shopsfit.com/users/confirm/'.$lastInsetred['User']['id'];
                                            //$msg_body = 'Hi '.$lastInsetred['User']['first_name'].'<br/><br/>Thank you for registering to our website. This email contains a confirmation link. Unless you click on that and confrm your account you will not be able to login. Please click on the link below to activate your account.<br/> <a href="'.$link.'">Click Here</a><br/><br/>Thanks,<br/>ShopsFit';
                                            $msg_body = 'Hi '.$lastInsetred['User']['first_name'].'<br/><br/>Thank you for registering to our website. <br/>Thanks,<br/>'.$contact_email['SiteSetting']['site_name'];

                                            App::uses('CakeEmail', 'Network/Email');

                                            $Email = new CakeEmail();

                                            
                                            $Email->emailFormat('both');
                                            $Email->from(array($adminEmail => $contact_email['SiteSetting']['site_name']));
                                            $Email->to($lastInsetred['User']['email']);
                                            $Email->subject('Welcome to '.$contact_email['SiteSetting']['site_name']);
                                            $Email->send($msg_body);

                                            /*$Email->from(array($this->request->data['Page']['from_email'] => $this->request->data['Page']['from_name']));
                                              $Email->to($this->request->data['Page']['to_email']);
                                              $Email->subject($this->request->data['Page']['subject']);
                                              $Email->send($this->request->data['Page']['message']);*/

                                            $this->Session->setFlash(__('Thanks for registering.', 'default', array('class' => 'success')));
                                            return $this->redirect(array('action' => 'login'));
                                    } else {
                                            $this->Session->setFlash(__('Sorry your details could not be saved. Please, try again.', 'default', array('class' => 'error')));
                                    }
                            } else {
                                    $this->Session->setFlash(__('Password and Confirm Password Mismatch. Please, try again.', 'default', array('class' => 'error')));
                            }
                    } else {
                        $this->Session->setFlash(__('Email already exists. Please, try another.', 'default', array('class' => 'error')));
                    }
			//} 
		}
                
                $this->loadModel('Country');
                $countries = $this->Country->find('all',array('conditions'=>array('Country.is_active'=>1),'order'=>array('Country.name'=>'ASC')));

                $this->loadModel('State');
                $states = $this->State->find('all',array('conditions'=>array('State.country_id'=>1,'State.is_active'=>1),'order'=>array('State.name'=>'ASC')));
		$this->set(compact('title_for_layout', 'countries', 'states'));
	}

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
		if(!isset($userid)){
			$this->redirect('/');
		}
		if (!$this->User->exists($userid)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			#pr($this->data);
			#exit;
                    $Post_type=$this->request->data['Post_type'];
                    $Run_type=$this->request->data['Run_type'];
                    if($Post_type=='Post'){
                        $UserType=1;
                    }
                    
                    if($Run_type=='Run'){
                        $UserType=2;
                    }
                    
                    if($Run_type=='Run' && $Post_type=='Post'){
                        $UserType=3;
                    }
                    
                    $this->request->data['User']['user_type']=$UserType;
                    
                    if(isset($this->request->data['User']['profile_img']) && $this->request->data['User']['profile_img']['name']!=''){
                            $ext = explode('/',$this->request->data['User']['profile_img']['type']);
                            if($ext){
                                    $uploadFolder = "user_images";
                                    $uploadPath = WWW_ROOT . $uploadFolder;
                                    $extensionValid = array('jpg','jpeg','png','gif');
                                    if(in_array($ext[1],$extensionValid)){
                                            $imageName = $this->request->data['User']['id'].'_'.(strtolower(trim($this->request->data['User']['profile_img']['name'])));
                                            $full_image_path = $uploadPath . '/' . $imageName;
                                            move_uploaded_file($this->request->data['User']['profile_img']['tmp_name'],$full_image_path);
                                            $this->request->data['User']['profile_img'] = $imageName;
                                            #exit;
                                            //unlink($uploadPath. '/' .$this->request->data['User']['hidprofile_img']);
                                    } else{
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
                    if(isset($this->request->data['User']['country']) && $this->request->data['User']['country']!=0){
                            $countryname = $this->Country->find('first',array('conditions' => array('Country.id'=>$this->request->data['User']['country']),'fields' => array('Country.printable_name')));
                            #pr($countryname);
                            $countryname = $countryname['Country']['printable_name'];
                    }
                    #pr($this->request->data);
		}
		$countries = $this->Country->find('list',array('fields' => array('Country.printable_name')));
		$this->set(compact('title_for_layout','countries','countryname'));
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
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'User List';
            $this->set(compact('title_for_layout'));
	    
	    $this->loadModel('Credit');
	    $credits = $this->Credit->find('list',array('fields'=>array('id','credit_number'),'conditions'=>array('Credit.status'=>1),'order'=>array('Credit.credit_number desc')));
	    $this->set(compact('credits'));
	    
            if($this->request->is('post')){
		//echo "hello";exit;
		$stitle = $this->request->data['User']['title'];
		
		$arrs='';
		if(isset($stitle) && !empty($stitle))
		{
			$arrs.= " (`User`.`username` Like '%".$stitle."%' OR `User`.`email` Like '%".$stitle."%') AND";
		}
		$arrs.=" `User`.`is_admin` != 1 ";
		$this->set('users', $this->Paginator->paginate('User', array($arrs)));
		$this->set(compact('stitle'));
            }else{
		$this->set('users', $this->Paginator->paginate('User', array('User.is_admin !=' =>1)));
            }

            //$options = array('User.id !=' => 2);
            //$this->set('user', $this->User->find('first', $options));
            //$this->set('users', $this->Paginator->paginate('User', $options));
                
                
	}
        
	public function admin_export()
	{
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){
		   $this->redirect('/admin');
		}
		$options = array('User.id !=' => 2);
		$users = $this->User->find('all',array('conditions' => $options));
		$output = '';
		$output .='First Name, Last Name, Username, Email, Is Active, Is Admin';
		$output .="\n";

		if(!empty($users))
		{
			foreach($users as $user)
			{	
				$isactive = ($user['User']['is_active']==1)?'Yes':'No';
				$isadmin = ($user['User']['is_admin']==1)?'Yes':'No';
			   
				$output .='"'.$user['User']['first_name'].'","'.$user['User']['last_name'].'","'.$user['User']['username'].'","'.$user['User']['email'].'","'.$isactive.'","'.$isadmin.'"';
				$output .="\n";
			}
		}
		$filename = "users".time().".csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
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
	public function admin_add_credit(){
	    if($this->request->is('post')){
		//pr($this->request->data);exit;
		$this->User->id = $this->request->data['User']['id'];
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else{
		    $arr = array();
		    $arr['User']['id'] = $this->request->data['User']['id'];
		    $arr['User']['credit_package'] = $this->request->data['User']['credit_package'];
		    if($this->User->Save($arr)){
			$this->Session->setFlash(__('The user has been saved.', 'default', array('class' => 'success')));
			return $this->redirect(array('controller'=>'users','action'=>'list'));
		    }
		}
            }
	}
	
	public function admin_user_inactive($id=null){
	    if(!empty($id)){
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else{
		    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		    $userdetail = $this->User->find('first', $options);
		    if($userdetail['User']['is_active']==1){
			$arr = array();
			$arr['User']['id'] = $id;
			$arr['User']['is_active'] = 0;
			if($this->User->Save($arr)){
			    $this->Session->setFlash(__('Status of selected record changed successfully', 'default', array('class' => 'success')));
			}
		    }
		    else if($userdetail['User']['is_active']==0){
			$arr = array();
			$arr['User']['id'] = $id;
			$arr['User']['is_active'] = 1;
			if($this->User->Save($arr)){
			    $this->Session->setFlash(__('Status of selected record changed successfully.', 'default', array('class' => 'success')));  
			}
		    }
		    return $this->redirect(array('controller'=>'users','action'=>'list'));
		}
            }
	}
	
	public function admin_user_notes(){
	    if($this->request->is('post')){
		$this->User->id = $this->request->data['User']['id'];
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		else{
		    $arr = array();
		    $arr['User']['id'] = $this->request->data['User']['id'];
		    $arr['User']['notes'] = $this->request->data['User']['notes'];
		    if($this->User->Save($arr)){
			$this->Session->setFlash(__('The Notes has been Added.', 'default', array('class' => 'success')));
			return $this->redirect(array('controller'=>'users','action'=>'list'));
		    }
		}
	    }	
	}
	
	public function admin_view($id = null) {
            /*$userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
		$title_for_layout = 'User View';
		$this->set(compact('title_for_layout'));
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}*/
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$user = $this->User->find('first', $options);
        //pr($user);exit;
		if($user['User']['is_active']=='0'){
		    $status = 'No';
		}
		else{
		    $status = 'Yes';
		}
		if($user['User']['is_email_verified']=='N'){
		    $emailVerify = 'No';
		}
		else{
		    $emailVerify = 'Yes';
		}
		if($user['User']['subscribe_newsletter']=='0'){
		    $subs_newsletter = 'No';
		}
		else{
		    $subs_newsletter = 'Yes';
		}
                
              //  $this->loadModel('Multimageupload');
              //  $multimg = $this->Multimageupload->find('all',array('conditions'=>array('Multimageupload.user_id'=>$userid)));
		$data = '<tr><td style="width:55%;">Id</td><td>'.$user['User']['id'].'</td></tr>'
			. '<tr><td>Name</td><td>'.$user['User']['name'].'</td></tr>'
			. '<tr><td>Username</td><td>'.$user['User']['username'].'</td></tr>'
			. '<tr><td>Email</td><td>'.$user['User']['email'].'</td></tr>'
			. '<tr><td>Phone</td><td>'.$user['User']['phone_no'].'</td></tr>'
			. '<tr><td>Zip Code</td><td>'.$user['User']['zipcode'].'</td></tr>'
			. '<tr><td>Country</td><td>'.$user['Country']['name'].'</td></tr>'
			. '<tr><td>City</td><td>'.$user['City']['name'].'</td></tr>'
			. '<tr><td>Newsletter Subscription</td><td>'.$subs_newsletter.'</td></tr>'
			. '<tr><td>Is Mail Verified</td><td>'.$emailVerify.'</td></tr>'
			. '<tr><td>Member Type</td><td>'.$user['User']['user_type'].'</td></tr>'
			. '<tr><td>Status</td><td>'.$status.'</td></tr>';
		//pr($user);exit;
		echo $data;exit;
                //$this->set(compact('multimg'));
	}
        public function admin_viewnew($id = null) {
        $this->layout=false;
        $user=$this->User->find('first',array('conditions'=>array('')));
        
	}

        
/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
	    $this->loadModel('City');
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
		$title_for_layout = 'User Add';
		$this->set(compact('title_for_layout'));
		if ($this->request->is('post')) {
			
			$options = array('conditions' => array('User.username'  => $this->request->data['User']['username']));
			$username = $this->User->find('first', $options);
			if(!$username){
				$options = array('conditions' => array('User.email'  => $this->request->data['User']['email']));
				$emailexists = $this->User->find('first', $options);
				if(!$emailexists){
					$city = $this->request->data['User']['city'];
			
					if(!empty($city)){
						$options = array('conditions' => array('City.name'  => $this->request->data['User']['city'], 'City.country_id'  => $this->request->data['User']['country_id']));
						$cityexists = $this->City->find('first', $options);
						if(!$cityexists){
						   $arr = array();
						   $arr['City']['name'] = $city;
						   $arr['City']['country_id'] = $this->request->data['User']['country_id'];
						   $this->City->create();
						   $this->City->save($arr);
						   $lastinsertCityId = $this->City->getLastInsertId();
						   $this->request->data['User']['city_id'] = $lastinsertCityId;
						}
					}
                                    /*if(isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name']!=''){
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
                                    }*/
                                    
					/*if($this->request->data['User']['subscribe_newsletter']=='on'){
						$this->request->data['User']['subscribe_newsletter'] = 1;
					}else{
						$this->request->data['User']['subscribe_newsletter'] = 0;
					}*/	
					$this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
					$this->request->data['User']['password'] = md5($this->request->data['User']['password']);
					$this->request->data['User']['country_id']=$this->request->data['User']['country_id'];
                                        $this->request->data['User']['city_id']=$this->request->data['User']['city_id'];
					$this->request->data['User']['subscribe_newsletter']= $this->request->data['subscribe_newsletter'];
					$this->request->data['User']['is_active']= $this->request->data['is_active'];
					$this->request->data['User']['is_email_verified']= $this->request->data['is_email_verified'];
					$this->request->data['User']['gender']= $this->request->data['gender'];
                                        
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
            $haircolors = $this->Haircolor->find('all',array('conditions'=>array('Haircolor.is_active'=>1),'order'=>array('Haircolor.color_name'=>'ASC')));

            $this->loadModel('Eyecolor');
            $eyecolors = $this->Eyecolor->find('all',array('conditions'=>array('Eyecolor.is_active'=>1),'order'=>array('Eyecolor.color_name'=>'ASC')));

              $this->loadModel('BodyType');
            $bodytypes = $this->BodyType->find('all',array('conditions'=>array('BodyType.is_active'=>1),'order'=>array('BodyType.body_type'=>'ASC')));


             $this->loadModel('EscortType');
            $escorttypes = $this->EscortType->find('list',array('conditions'=>array('EscortType.is_active'=>1),'order'=>array('EscortType.name'=>'ASC')));

            //pr($haircolors);
            $this->loadModel('Country');
            $countries = $this->Country->find('all',array('conditions'=>array('Country.is_active'=>1),'order'=>array('Country.name'=>'ASC')));

            $this->loadModel('State');
            $states = $this->State->find('all',array('conditions'=>array('State.country_id'=>1,'State.is_active'=>1),'order'=>array('State.name'=>'ASC')));
            //pr($states);
            $this->set(compact('countries','states','haircolors','eyecolors','bodytypes','escorttypes'));    
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
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
		$title_for_layout = 'User Edit';
		$this->set(compact('title_for_layout'));
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {

			if(isset($this->request->data['User']['password']) && $this->request->data['User']['password']!=''){
				$this->request->data['User']['txt_password'] = $this->request->data['User']['password'];
				$this->request->data['User']['password'] = md5($this->request->data['User']['password']);
			}else{
				$this->request->data['User']['password'] = $this->request->data['User']['hidpw'];
			}
                        
                        if(isset($this->request->data['User']['profile_image']) && $this->request->data['User']['profile_image']['name']!=''){
                        $ext = explode('.',$this->request->data['User']['profile_image']['name']);
			if($ext){
                            $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');

                            $extensionValid = array('jpg','jpeg','png','gif');
                            if(in_array($ext[1],$extensionValid)){
                                    $imageName = rand().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
                                    $full_image_path = $uploadPath . '/' . $imageName;
                                    move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path);
                                    $this->request->data['User']['profile_image'] = $imageName;


                            } else{
                                    $this->Session->setFlash(__('Invalid Image Type'));
                                    return $this->redirect(array('action' => 'user_edit',$id));
                            }
			}
                    }else{
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
            if(!isset($userid) && $userid==''){
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
	'conditions'=> '',
	'limit'=>8,
	'order'=>array(
		'Haircolor.id'=>'desc'
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
		$options = array('conditions' => array('Haircolor.color_name'  => $this->request->data['Haircolor']['color_name']));
		$colorexists = $this->Haircolor->find('first', $options);
		if(!$colorexists)
		{
			//echo "hello";exit;
		 $this->request->data['Haircolor']['color_name'];
       //$this->request->data['Haircolor']['is_active'] = 1;
		 $this->Haircolor->create();
		 if ($this->Haircolor->save($this->request->data)) 
		  {
			$this->Session->setFlash('The color has been saved', 'default', array('class' => 'success'));
			return $this->redirect(array('action' => 'haircolor_list'));
		  } 
		  else 
		  {
			$this->Session->setFlash(__('The color could not be saved. Please, try again.'));
		  }
		 
	  }
	  else {
	  	
			$this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
		}  
	}
	//$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
	//$this->set(compact('countries'));
}
public function admin_haircolor_view($id = null) 
{
	
	//echo $id;exit;
	$this->loadModel('Haircolor');
	if (!$this->Haircolor->exists($id)) 
	{
		throw new NotFoundException(__('Invalid color'));
	}
	$options = array('conditions' => array('Haircolor.' . $this->Haircolor->primaryKey => $id));
	$this->set('colors', $this->Haircolor->find('first', $options));
}
public function admin_haircolor_edit($id = null) 
{	
   //echo $id;exit;
   $this->loadModel('Haircolor');
	if (!$this->Haircolor->exists($id)) 
	{
		throw new NotFoundException(__('Invalid color'));
	}
	if ($this->request->is(array('post', 'put')))  {
		//echo "hello";exit;
		
		$options = array('conditions' => array('Haircolor.color_name'  => $this->request->data['Haircolor']['color_name'],'Haircolor.id !=' => $id));
		$emailexists = $this->Haircolor->find('first', $options);
		if(!$emailexists)
		{
			//echo "hello";exit;
		  $color_name=$this->request->data['Haircolor']['color_name']; 

		  if($this->Haircolor->save($this->request->data)) 
		  {
		  
			if($color_name!='')
			{
					
				$this->Haircolor->query('Update haircolors as haircolor set haircolor.color_name="'.$color_name.'" where haircolor.id='.$id.'');
			}
			$this->Session->setFlash('Color details has been saved', 'default', array('class' => 'success'));
			return $this->redirect(array('controller' => 'users','action' => 'admin_haircolor_edit',$id));
		  } 
		  else 
		  {
			$this->Session->setFlash(__('Color details could not be saved. Please, try again.'));
		  }
		}
		else 
		{
			$this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
			return $this->redirect(array('action' => 'haircolor_edit',$id));
		}
	 
	} 
	else 
	{
		
		$options = array('conditions' => array('Haircolor.' . $this->User->primaryKey => $id));
		$this->request->data = $this->Haircolor->find('first', $options);
		//$countries = $this->User->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
		//$this->set(compact('countries'));
	}	
}

public function admin_eyecolor_list() 
{

    /*  $this->loadModel('Eyecolor');
        $this->set('eyecolor_list', $this->Paginator->paginate('Eyecolor'));*/
    
    $this->loadModel('Eyecolor');
    $this->paginate = array(
    'conditions'=> '',
    'limit'=>8,
    'order'=>array(
        'Eyecolor.id'=>'desc'
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
        $options = array('conditions' => array('Eyecolor.color_name'  => $this->request->data['Eyecolor']['color_name']));
        $colorexists = $this->Eyecolor->find('first', $options);
        if(!$colorexists)
        {
            //echo "hello";exit;
         $this->request->data['Eyecolor']['color_name'];
         //$this->request->data['Eyecolor']['is_active'] = 1;
         $this->Eyecolor->create();
         if ($this->Eyecolor->save($this->request->data)) 
          {
            $this->Session->setFlash('The color has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'eyecolor_list'));
          } 
          else 
          {
            $this->Session->setFlash(__('The color could not be saved. Please, try again.'));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_eyecolor_view($id = null) 
{
    
    //echo $id;exit;
    $this->loadModel('Eyecolor');
    if (!$this->Eyecolor->exists($id)) 
    {
        throw new NotFoundException(__('Invalid color'));
    }
    $options = array('conditions' => array('Eyecolor.' . $this->Eyecolor->primaryKey => $id));
    $this->set('colors', $this->Eyecolor->find('first', $options));
}
public function admin_eyecolor_edit($id = null) 
{   
   //echo $id;exit;
   $this->loadModel('Eyecolor');
    if (!$this->Eyecolor->exists($id)) 
    {
        throw new NotFoundException(__('Invalid color'));
    }
    if ($this->request->is(array('post', 'put')))  {
        //echo "hello";exit;
        
        $options = array('conditions' => array('Eyecolor.color_name'  => $this->request->data['Eyecolor']['color_name'],'Eyecolor.id !=' => $id));
        $emailexists = $this->Eyecolor->find('first', $options);
        if(!$emailexists)
        {
            //echo "hello";exit;
          $color_name=$this->request->data['Eyecolor']['color_name']; 

          if($this->Eyecolor->save($this->request->data)) 
          {
          
            if($color_name!='')
            {
                    
                $this->Eyecolor->query('Update eyecolors as eyecolor set eyecolor.color_name="'.$color_name.'" where eyecolor.id='.$id.'');
            }
            $this->Session->setFlash('Color details has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('controller' => 'users','action' => 'admin_eyecolor_edit',$id));
          } 
          else 
          {
            $this->Session->setFlash(__('Color details could not be saved. Please, try again.'));
          }
        }
        else 
        {
            $this->Session->setFlash(__('Color already exists. Please, try another.', 'default', array('class' => 'error')));
            return $this->redirect(array('action' => 'eyecolor_edit',$id));
        }
     
    } 
    else 
    {
        
        $options = array('conditions' => array('Eyecolor.' . $this->Eyecolor->primaryKey => $id));
        $this->request->data = $this->Eyecolor->find('first', $options);
        //$countries = $this->User->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
        //$this->set(compact('countries'));
    }   
}



public function admin_haircolor_delete($id = null) 
{
	 $this->loadModel('Haircolor');
	 $this->Haircolor->id = $id;
	
	if (!$this->Haircolor->exists()) 
	{
		throw new NotFoundException(__('Invalid color'));
	}
	if ($this->Haircolor->delete($id)) 
	{
		$this->Session->setFlash('The color has been deleted', 'default', array('class' => 'success'));
	} else 
	{
		$this->Session->setFlash(__('The color could not be deleted. Please, try again.'));
	}
	return $this->redirect(array('action' => 'haircolor_list'));
}

public function admin_eyecolor_delete($id = null) 
{
    $this->loadModel('Eyecolor');
    $this->Eyecolor->id = $id;
    
    if (!$this->Eyecolor->exists()) 
    {
        throw new NotFoundException(__('Invalid color'));
    }
    if ($this->Eyecolor->delete($id)) 
    {
        $this->Session->setFlash('The color has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The color could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'eyecolor_list'));
}



        public function admin_imageupload($id = null){
        $this->loadModel('Multimageupload');
        //$imagename = $_FILES['file']['name'];
	//$images = $this->Multimageupload->find('all',array('conditions'=>array('Multimageupload.user_id'=>$id)));
//pr($images);exit;
	$this->paginate = array(
	'conditions'=> array('Multimageupload.user_id'=>$id),
	'limit'=>2,
	'order'=>array(
		'Multimageupload.id'=>'desc'
		)
	);
	$this->Paginator->settings = $this->paginate;
	$this->set('images', $this->Paginator->paginate('Multimageupload'));
        $this->set(compact('id'));
                
	}	
	public function admin_uploadUser($id = null) 
        { 
            $this->autoRender=false;
            $this->loadModel('Multimageupload');
            $imagename = $_FILES['file']['name'];
            $uploadPath= Configure::read('UPLOAD_USER_IMG_PATH');
            //echo $imagename = $_FILES['file']['profile_image']['name'];
            $options = array('conditions' => array('User.id' => $id));
            $user = $this->User->find('first', $options); 
            if(!empty($user)){
                $this->Multimageupload->create();
		
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadPath.'/'.(date('Ymd_his').'__'.$imagename));
		$imageName1 = date('Ymd_his').'__'.$imagename;
                $userupdate['Multimageupload']['user_id']=$id;
                $userupdate['Multimageupload']['image_upload']=$imageName1;
                $this->Multimageupload->save($userupdate);
            }  
              
	}




        
      ////////////////////////////////////////////////////////////////////
        
	public function admin_login() {
		if ($this->request->is('post')) {
			$options = array('conditions' => array('User.username'  => $this->request->data['User']['usernamel'],'User.password' => md5($this->request->data['User']['passwordl']),'User.is_admin'=>1));
			$loginuser = $this->User->find('first', $options);
			if(!$loginuser){
				$this->Session->setFlash(__('Invalid username or password, try again', 'default', array('class' => 'error')));
				return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->write('userid', $loginuser['User']['id']);
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
        
        public function admin_fotgot_password(){
            $title_for_layout = 'Forgot Password';
            $this->set(compact('title_for_layout'));
	 
            if ($this->request->is(array('post', 'put'))){
                $options = array('conditions' => array('User.email' => $this->request->data['User']['email'],'User.is_admin' => 1));    
                $user = $this->User->find('first', $options); 
                if($user){
                    //$password = $this->User->get_fpassword();
                    $password = $user['User']['txt_password'];
                    //$this->request->data['User']['id'] = $user['User']['id'];
                    //$this->request->data['User']['password'] = $password;
                    if ($password!=''){
                       $key = Configure::read('CONTACT_EMAIL');
                       $this->loadModel('EmailTemplate');
                       $EmailTemplate=$this->EmailTemplate->find('first',array('conditions'=>array('EmailTemplate.id'=>1)));
                       $mail_body =str_replace(array('[EMAIL]','[PASSWORD]'),array($this->request->data['User']['email'],$password),$EmailTemplate['EmailTemplate']['content']);
                       $this->send_mail($key,$this->request->data['User']['email'],$EmailTemplate['EmailTemplate']['subject'],$mail_body);
                       $this->Session->setFlash('A new password has been sent to your mail. Please check mail.', 'default', array('class' => 'success'));
                    }else{
                        $this->Session->setFlash("Sorry! some internal error occured.Please try again later.");
                    }
                }else {
                   $this->Session->setFlash("Invalid email or You are not authorize to access.");
                }
            }
        }

	public function emailExists($email = null) {
            $data = '';
            if($email){
                    $emailexists = $this->User->find('first',array('conditions' => array('User.email'=>$email),'fields' => array('User.id')));
                    if($emailexists){
                            $data = 'Email already exists. Please try another.';
                    } else {
                            $data = '';
                    }
            }
            echo $data;
            exit;
	}

	public function forgotpassword(){
		$title_for_layout = 'Forgot Password';
		$this->set(compact('title_for_layout'));
		if ($this->request->is(array('post', 'put'))) {
			$options = array('conditions' => array('User.email' => $this->request->data['User']['email']));
			$user = $this->User->find('first', $options);			
			if($user){
				$length = 6;
				$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.'0123456789';
				$str = '';
				$max = strlen($chars) - 1;
				for ($i=0; $i < $length; $i++)
				$str .= $chars[rand(0, $max)];

				$password = $str;
				$table = '<table style="width:400px;border:0px;">
							<tr>
								<td style="width:100px;">User email&nbsp;:</td>
								<td>'.$user['User']['email'].'</td>
							</tr>
							<tr>
								<td style="width:100px;">Password&nbsp;:</td>
								<td>'.$password.'</td>
							</tr>
							</table>';
				$msg_body = 'Hi '.$user['User']['first_name'].'<br/><br/>Your new password has been successfully regenarated. The new login details are as follows:<br/>'.$table.' <br/><br/>Thanks,<br/>Admin';

				$this->request->data['User']['id'] = $user['User']['id'];
				$this->request->data['User']['password'] = md5($password);
				$this->request->data['User']['txt_password'] = $password;
				if ($this->User->save($this->request->data)) {
					$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email', 'SiteSetting.site_name')));
					if($contact_email){
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
					$Email->subject($site_name.' Forgot Password');
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
		if(!isset($userid)){
			$this->redirect('/');
		}
		if (!$this->User->exists($userid)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			#pr($this->data);
			#exit;
			if(isset($this->request->data['User']['password']) && $this->request->data['User']['password']!=''){				
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
			if(isset($this->request->data['User']['country']) && $this->request->data['User']['country']!=0){
				$countryname = $this->Country->find('first',array('conditions' => array('Country.id'=>$this->request->data['User']['country']),'fields' => array('Country.printable_name')));
				$countryname = $countryname['Country']['printable_name'];
			}
		}
		$countries = $this->Country->find('list',array('fields' => array('Country.printable_name')));
		$this->set(compact('title_for_layout','countries','countryname'));
	}
         function admin_dashboard()
        {
           $userid = $this->Session->read('userid');
                if($userid=='')
                {
                    return $this->redirect(array('controller'=>'users','action' => '/','admin'=>true));
 
                } 
                $this->loadModel('Category');
				
                //$this->loadModel('Activity');
                //$activities = $this->Activity->find('all',array('limit' => 10,'order' => 'Activity.id DESC'));
				//pr($activities);
				//exit;
                
        //$this->loadModel('Task');        
        /*$total_user=$this->User->find("count",array('conditions'=>array('User.id !='=>2)));
        $active_user=$this->User->find("count",array('conditions'=>array('User.is_active'=>1,'User.id !='=>2)));
        $inactive_user=$this->User->find("count",array('conditions'=>array('User.is_active'=>0,'User.id !='=>2)));
        $total_taskers=$this->User->find("count",array('conditions'=>array('User.user_type'=>2)));
        $conditions['OR']['Task.status'] = 1;
        $conditions['OR']['Task.status'] = 2;
        $total_task=$this->Task->find("count",array("conditions"=>$conditions));
        $categories_list=$this->Category->find('all',array('fields'=>array('Category.id','Category.name'),'conditions'=>array('Category.active'=>1,'Category.parent_id != '=>0)));
        
        $this->set(compact('total_task','total_user','total_taskers','activities','active_user','inactive_user','categories_list'));*/
        
        
        }
        function admin_changepwd()
        {
            $userid = $this->Session->read('userid');
                if($userid=='')
                {
                    return $this->redirect(array('controller'=>'users','action' => '/','admin'=>true));
 
                } 
             if ($this->request->is(array('post', 'put'))) {
   
             $this->User->create();
             $this->request->data['User']['txt_password']=$this->request->data['User']['password'];
             $this->request->data['User']['password']=md5($this->request->data['User']['password']);
             if($this->User->save($this->request->data))
             {
              $this->Session->setFlash('Your password changed successfully.', 'default', array('class' => 'success'));
	      return $this->redirect(array('action' => 'changepwd'));
              
             }
             else
             {
                 
             }
             }
            
        }


        
	///////////////////////////////Ak/////////////////////////////////////
	public function profile($id=null){
		$title_for_layout = 'Profile';
		$id= base64_decode($id);
		$options = array('conditions' => array('User.id' => $id));
		$user = $this->User->find('first', $options);
		$this->loadModel('Country');
		//$this->loadModel('Task');
		$this->loadModel('Skill');
		
		//$options = array('conditions' => array('Task.user_id' => $user['User']['id'],'Task.status'=>2));
		//$tasks = $this->Task->find('count', $options);
		
		$options = array('conditions' => array('Task.user_id' => $user['User']['id'],'Task.status'=>2,'Task.task_status'=>'C'));
		//$complete = $this->Task->find('count', $options);
		
		$options = array('conditions' => array('Skill.user_id' => $id));
		$skill = $this->Skill->find('first', $options);
		
		$options = array('conditions' => array('Country.id' => $user['User']['country']));
		$country = $this->Country->find('first', $options);
		$this->set(compact('title_for_layout','user','country','tasks','complete','skill'));
	}
	///////////////////////////////End AK/////////////////////////////////

   
   public function countrywisecity($countryId=null) {

	  if(!empty($countryId)){
		$city = $this->City->find('list',array('fields'=>array('id','name'),'conditions'=>array('City.country_id'=>$countryId, 'City.is_active'=>1)));
		if($city){
		    $data = '<select name="data[User][city_id]" id="cityId" class="form-control"><option value="">Select</option>';
				foreach($city as $k=>$v){					
					$data.='<option value="'.$k.'">'.$v.'</option>';
				}
				$data.='</select>';
		}
		else{
			$data = '<input type="text" name="data[User][city]" class="form-control">';
		}
	    }
	    else{
		$data = '<select name="data[User][city_id]" id="cityId" class="form-control"><option value="">Select</option></select>';
	    }
	    echo $data;
	    exit;
	}
	
}
