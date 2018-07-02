<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class AgenciesController extends AppController {

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
	/*public function admin_index() {
            	$this->Category->recursive = 0;
		$this->set('rules', $this->Paginator->paginate());
	}*/
	public function admin_index() {	

             $this->loadModel("User");	
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
            //$conditions['User.is_admin']=1;
            $conditions['User.id !=']='';
            $conditions['User.is_admin !='] = 1; 
            $conditions['User.user_type'] ='A';
            $conditions['User.is_active'] = 1 ;           
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
         //$condition1=array('User.is_admin !=' => 1,'User.user_type' => 'E','User.is_active' => 1);
         $this->Paginator->settings=array(
         
         'conditions'=> ($conditions),
         'order'=>$order_by,
         'limit'=>$limit
         );
         
         $total_user=$this->User->find('count', array('conditions'=>$conditions));
         
         $users=$this->Paginator->paginate('User');
         $this->set(compact('users','total_user'));
	}

public function admin_add() {
	$this->loadModel('Escort');
   
    if ($this->request->is('post')) { 
      //echo "hello";exit;
    //echo "hello";exit;
        $options = array('conditions' => array('Escort.username'  => $this->request->data['Escort']['username']));
        $bodytypeexists = $this->Escort->find('first', $options);
        if(!$bodytypeexists)
        {

         $this->request->data['Escort']['datetime']=date('Y-m-d');
         //pr($this->request->data);exit;
         $this->Escort->create();
         if ($this->Escort->save($this->request->data)) 
          {
            $this->Session->setFlash('The escort has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The escort could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Escort already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
   
}
/*public function countrywisecity($countryId=null) {
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
  }*/
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
    $this->loadModel('User');
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $user = $this->User->find('first', $options);
        
    if($user['User']['profile_status']=='0'){
        $status = 'Inactive';
    }
    else{
        $status = 'Active';
    }
    if($user['User']['is_email_verified']=='1'){
        $emailVerify = 'Verified';
    }
    else{
        $emailVerify = 'Not verified';
    }
    if($user['User']['subscribe_newsletter']=='0'){
        $subs_newsletter = 'Not subscribed';
    }
    else{
        $subs_newsletter = 'Subscribed';
    }
                
              //  $this->loadModel('Multimageupload');
              //  $multimg = $this->Multimageupload->find('all',array('conditions'=>array('Multimageupload.user_id'=>$userid)));
    $data = '<tr><td style="width:55%;">Id</td><td>'.$user['User']['id'].'</td></tr>'
      . '<tr><td>Name</td><td>'.$user['User']['name'].'</td></tr>'
      . '<tr><td>Contact Person</td><td>'.$user['User']['contact_person'].'</td></tr>'
      . '<tr><td>Username</td><td>'.$user['User']['username'].'</td></tr>'
      . '<tr><td>Email</td><td>'.$user['User']['email'].'</td></tr>'
      . '<tr><td>Phone</td><td>'.$user['User']['phone_no'].'</td></tr>'
      . '<tr><td>Zip Code</td><td>'.$user['User']['zipcode'].'</td></tr>'
      . '<tr><td>City</td><td>'.$user['City']['name'].'</td></tr>'
      . '<tr><td>Newsletter Subscription</td><td>'.$subs_newsletter.'</td></tr>'
      . '<tr><td>Is Mail Verified</td><td>'.$emailVerify.'</td></tr>'
      . '<tr><td>Profile Status</td><td>'.$status.'</td></tr>';
    //pr($user);exit;
    echo $data;exit;
                //$this->set(compact('multimg'));
  }


  /*public function admin_edit($id = null) {
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
                
                
  }*/


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

public function admin_delete($id = null) 
{
    $this->loadModel('User');
    $this->User->id = $id;
    
    if (!$this->User->exists()) 
    {
        throw new NotFoundException(__('Invalid type'));
    }
    if ($this->User->delete($id)) 
    {
        $this->Session->setFlash('The agency type has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The agency type could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

	
	
	
	


	
}
