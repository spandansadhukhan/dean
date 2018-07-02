<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class ClassifiedsController extends AppController {

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
//admin_creditsetting

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_add','admin_creditsetting','admin_index','admin_edit','add','deleteclassified',"admin_activeclassified","admin_deleteclassified","admin_view");
    }
    
    function admin_index()
    {
        
        
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
            
            $conditions[] = array();
          
            foreach ($this->params['named'] as $param_name => $value) {
                
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'name') {
                        $conditions['Classified.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['Classified.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Classified.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Classified.id desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Classified.id asc";
                    }  else {
                        $order_by = "Classified.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        
        
        $this->Paginator->settings=array(
            'conditions' => ($conditions),
            'order'=>"Classified.id desc"    
        );
        $classifieds=$this->Paginator->paginate("Classified");
        $total_category = $this->Classified->find('count');
        $total_active_category = $this->Classified->find('count', array('conditions' => array('Classified.status'=>1)));
        $total_inactive_category = $this->Classified->find('count', array('conditions' => array('Classified.status'=>0)));
        $this->set(compact('classifieds','total_category','total_active_category','total_inactive_category'));
    }
    /*function admin_activeclassified($id,$status)
    {
        //echo $status;exit;
        $this->Classified->id = $id;
       // $this->Classified->saveField('status', $status);
        $this->Classified->updateAll(array('Classified.status' => "'$status'"), array('Classified.id' => $id));
        $this->redirect(array("action"=>"index"));        
        
    }*/
    
    
    
    public function admin_activeclassified($id = null) {

        $this->loadModel("Classified");
        $checkuser = $this->Classified->find('first', array('conditions' => array('Classified.id' => $id)));
        if ($checkuser['Classified']['status'] == 1) {
            $status = 0;
        } elseif ($checkuser['Classified']['status'] == 0) {
            $status = 1;
        }

        $this->Classified->updateAll(array('Classified.status' => "'$status'"), array('Classified.id' => $id));
        $this->redirect(array('action' => 'index'));
    }
    
    
    
    
    
    
    
    function admin_view($id=null)
    {
        $classified=$this->Classified->find("first",array("conditions"=>array("Classified.id"=>$id)));
        if(!empty($classified["Classified"]["image"]))
        {
            $classified["Classified"]["image"]=Configure::read('SITE_URL')."job_images/".$classified["Classified"]["image"];
        }
        echo json_encode($classified["Classified"]);exit;
    }
    
    public function add() {
    $userid = $this->Session->read('userid');
    if(!isset($userid) && $userid==''){
       $this->redirect('/');
    }    
    if ($this->request->is('post')) {
        
                    if(!empty($this->request->data['Classified']['image']['name'])){
                    $pathpart=pathinfo($this->request->data['Classified']['image']['name']);
                    $ext=$pathpart['extension'];
                    $extensionValid = array('jpg','jpeg','png','gif');
                    if(in_array(strtolower($ext),$extensionValid)){
                    $uploadFolder = "job_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;	
                    $filename =uniqid().'.'.$ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    move_uploaded_file($this->request->data['Classified']['image']['tmp_name'],$full_flg_path);
                    $this->request->data['Classified']['image'] = $filename;
                    }
                    else{
                    $this->Session->setFlash(__('Invalid image type.'));
                    $this->redirect( Router::url( $this->referer(), true ) );        
                    }
                    }
                    else{
                    $filename='';    
                    }
                    $this->request->data['Classified']['user_id']=$userid;
                    $this->Classified->create();
                    if ($this->Classified->save($this->request->data)) {
                    $this->Session->setFlash('The classified ads has bee saved', 'default', array('class' => 'success'));
                    $this->redirect( Router::url( $this->referer(), true ) );
                    } else {
                            $this->Session->setFlash(__('The classified ads could not be saved. Please, try again.'));
                    $this->redirect( Router::url( $this->referer(), true ) );        
                    }
            }  
        
        
    }
    
    public function admin_add() {
    $userid = $this->Session->read('userid');
    $this->loadModel("ClassifiedCategory");    
    if(!isset($userid) && $userid==''){
       $this->redirect('/');
    }    
    if ($this->request->is('post')) {
        
                    if(!empty($this->request->data['Classified']['image']['name'])){
                    $pathpart=pathinfo($this->request->data['Classified']['image']['name']);
                    $ext=$pathpart['extension'];
                    $extensionValid = array('jpg','jpeg','png','gif');
                    if(in_array(strtolower($ext),$extensionValid)){
                    $uploadFolder = "job_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;	
                    $filename =uniqid().'.'.$ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    move_uploaded_file($this->request->data['Classified']['image']['tmp_name'],$full_flg_path);
                    $this->request->data['Classified']['image'] = $filename;
                    }
                    else{
                    $this->Session->setFlash(__('Invalid image type.'));
                    $this->redirect(array("action"=>"add"));
                    }
                    }
                    else{
                    $filename='';    
                    }
                    $this->request->data['Classified']['user_id']=$userid;
                    $this->Classified->create();
                    if ($this->Classified->save($this->request->data)) {
                    $this->Session->setFlash('The classified ads has bee saved', 'default', array('class' => 'success'));
                    $this->redirect(array("action"=>"index"));
                    } else {
                            $this->Session->setFlash(__('The classified ads could not be saved. Please, try again.'));
                    $this->redirect(array("action"=>"index"));
                    }
            }else
            {
                $classified_categories=$this->ClassifiedCategory->find("list");
                
            }
            $this->set(compact('classified_categories'));
            
        
        
    }
    public function admin_edit($id=null) {
    $this->loadModel("ClassifiedCategory");    
    $userid = $this->Session->read('userid');
    if(!isset($userid) && $userid==''){
       $this->redirect('/');
    }    
    if ($_POST) {
        
                    if(!empty($this->request->data['Classified']['image']['name'])){
                    $pathpart=pathinfo($this->request->data['Classified']['image']['name']);
                    $ext=$pathpart['extension'];
                    $extensionValid = array('jpg','jpeg','png','gif');
                    if(in_array(strtolower($ext),$extensionValid)){
                    $uploadFolder = "job_images";
                    $uploadPath = WWW_ROOT . $uploadFolder;	
                    $filename =uniqid().'.'.$ext;
                    $full_flg_path = $uploadPath . '/' . $filename;
                    move_uploaded_file($this->request->data['Classified']['image']['tmp_name'],$full_flg_path);
                    $this->request->data['Classified']['image'] = $filename;
                    }
                    else{
                    $this->Session->setFlash(__('Invalid image type.'));
                    }
                    }
                    else{
                    $filename=$this->request->data['Classified']['hide_image'];  
                    $this->request->data['Classified']['image'] = $filename;
                    }
                    if ($this->Classified->save($this->request->data)) {
                    $this->Session->setFlash('The classified ads has bee saved', 'default', array('class' => 'success'));
                    $this->redirect(array("action"=>"index"));
                    } 
                    else 
                    {
                    $this->Session->setFlash(__('The classified ads could not be saved. Please, try again.'));
                    $this->redirect(array("action"=>"index"));
                    }
            }
            
            else
            {
                $this->request->data=$this->Classified->find("first",array("conditions"=>array("Classified.id"=>$id)));
                $classified_categories=$this->ClassifiedCategory->find("list");
            }
            
            $this->set(compact("classified_categories"));
        
        
    }
    
    
    function deleteclassified($id)
    {
        $this->Classified->id = $id;
		if (!$this->Classified->exists()) {
			throw new NotFoundException(__('Invalid Classified'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Classified->delete()) {
			$this->Session->setFlash(__('The classified has been deleted.'));
                        $this->redirect( Router::url( $this->referer(), true ) );        

		} else {
			$this->Session->setFlash(__('The classified could not be deleted. Please, try again.'));
                        $this->redirect( Router::url( $this->referer(), true ) );        
		}
    }
    
    function admin_deleteclassified($id)
    {
        $this->Classified->id = $id;
		if (!$this->Classified->exists()) {
			throw new NotFoundException(__('Invalid Classified'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Classified->delete()) {
			$this->Session->setFlash(__('The classified has been deleted.'));
                        $this->redirect(array("action"=>"index"));        

		} else {
			$this->Session->setFlash(__('The classified could not be deleted. Please, try again.'));
                        $this->redirect(array("action"=>"index"));        
		}
    }
    
    


	
	
	


	
}
