<?php
App::uses('AppController', 'Controller');
/**
 * SiteSettings Controller
 *
 * @property Privacy $Privacy
 * @property PaginatorComponent $Paginator
 */
class SiteSettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	var $uses = array('User','Country','City','Currency','SiteSetting');
/**
 * index method
 *
 * @return void
 */
	public function index() {
        $userid = $this->Session->read('userid');
        if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
		$this->SiteSetting->recursive = 0;
		$this->set('sitesettings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->SiteSetting->exists($id)) {
			throw new NotFoundException(__('Invalid Site Setting'));
		}
		$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => $id));
		$this->set('sitesetting', $this->SiteSetting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->SiteSetting->create();
			if ($this->SiteSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The site setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site setting could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->SiteSetting->exists($id)) {
			throw new NotFoundException(__('Invalid site setting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->SiteSetting->save($this->request->data)) {
				$this->Session->setFlash(__('The site setting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => $id));
			$this->request->data = $this->SiteSetting->find('first', $options);
		}
	}


	public function admin_edit($id = null) {
		
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
		if (!$this->SiteSetting->exists($id)) { throw new NotFoundException(__('Invalid setting')); }
		
		if ($this->request->is(array('post', 'put'))) {
			if(!empty($this->request->data['SiteSetting']['site_logo']['name'])){
				$pathpart=pathinfo($this->request->data['SiteSetting']['site_logo']['name']);
				$ext=$pathpart['extension'];
				$extensionValid = array('jpg','jpeg','png','gif');
				if(in_array(strtolower($ext),$extensionValid)){
					$uploadFolder = "site_logo";
					$uploadPath = WWW_ROOT . $uploadFolder;	
					$filename =uniqid().'.'.$ext;
					$full_flg_path = $uploadPath . '/' . $filename;
					move_uploaded_file($this->request->data['SiteSetting']['site_logo']['tmp_name'],$full_flg_path);
					$this->request->data['SiteSetting']['site_logo'] = $filename;
				} else {
					$this->Session->setFlash(__('Invalid image type.'));
					return $this->redirect(array('action' => 'edit',1));	
				}
			} else {
				$this->request->data['SiteSetting']['site_logo'] = $this->request->data['SiteSetting']['hide_logo'];		
			} 
			if(!empty($this->request->data['SiteSetting']['email_template_logo']['name'])){
				$pathpart=pathinfo($this->request->data['SiteSetting']['email_template_logo']['name']);
				$ext=$pathpart['extension'];
				$extensionValid = array('jpg','jpeg','png','gif');
				if(in_array(strtolower($ext),$extensionValid)){
					$uploadFolder = "site_logo";
					$uploadPath = WWW_ROOT . $uploadFolder;	
					$filename =uniqid().'.'.$ext;
					$full_flg_path = $uploadPath . '/' . $filename;
					move_uploaded_file($this->request->data['SiteSetting']['email_template_logo']['tmp_name'],$full_flg_path);
					$this->request->data['SiteSetting']['email_template_logo'] = $filename;
				} else {
					$this->Session->setFlash(__('Invalid image type.'));
					return $this->redirect(array('action' => 'edit',1));	
				} 
			} else {
				$this->request->data['SiteSetting']['email_template_logo'] = $this->request->data['SiteSetting']['hide_email_logo'];
			} 

			if(!empty($this->request->data['SiteSetting']['water_mark_img']['name'])){
				$pathpart=pathinfo($this->request->data['SiteSetting']['water_mark_img']['name']);
				$ext=$pathpart['extension'];
				$extensionValid = array('jpg','jpeg','png','gif');
				if(in_array(strtolower($ext),$extensionValid)){
					$uploadFolder = "site_logo";
					$uploadPath = WWW_ROOT . $uploadFolder;	
					$filename =uniqid().'.'.$ext;
					$full_flg_path = $uploadPath . '/' . $filename;
					move_uploaded_file($this->request->data['SiteSetting']['water_mark_img']['tmp_name'],$full_flg_path);
					$this->request->data['SiteSetting']['water_mark_img'] = $filename;
				} else {
					$this->Session->setFlash(__('Invalid image type.'));
					return $this->redirect(array('action' => 'edit',1));	
				}
			} else {
				$this->request->data['SiteSetting']['water_mark_img'] = $this->request->data['SiteSetting']['hide_water'];		
			} 

			if(!empty($this->request->data['SiteSetting']['favicon']['name'])){
				$pathpart=pathinfo($this->request->data['SiteSetting']['favicon']['name']);
				$ext=$pathpart['extension'];
				$extensionValid = array('jpg','jpeg','png','gif');
				$uploadPath = WWW_ROOT;	
				$filename ='favicon.ico';
				$full_flg_path = $uploadPath . '/' . $filename;
				move_uploaded_file($this->request->data['SiteSetting']['favicon']['tmp_name'],$full_flg_path);
				$this->request->data['SiteSetting']['favicon'] = $filename;
			} else {
				$this->request->data['SiteSetting']['favicon'] = $this->request->data['SiteSetting']['hide_fav'];		
			} 

			if ($this->SiteSetting->save($this->request->data)) {     
				$this->Session->setFlash('The site setting has been saved.','default',array('class'=>'success'));
				#return $this->redirect(array('action' => 'index'));
			} else {
			$this->Session->setFlash(__('The site setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => $id));
			$this->request->data = $this->SiteSetting->find('first', $options);
		}
		
			/* extraCodeStartHere  */
			$options = array('conditions' => array('Country.is_active' => 1), 'order' => array('Country.name' => 'ASC'));
			$country = $this->Country->find('list', $options);		
			$options = array('conditions' => array('Currency.is_active' => 1), 'order' => array('Currency.name' => 'ASC'));
			$currency = $this->Currency->find('list', $options);	
			//pr($country); pr($currency); exit;
			$this->set(compact('country','currency'));
			/* extraCodeEndHere */
					
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
		$this->SiteSetting->id = $id;	
		if (!$this->SiteSetting->exists()){ throw new NotFoundException(__('Invalid Site Setting')); }
		
		$this->request->onlyAllow('post', 'delete');
		if ($this->SiteSetting->delete()) {
			$this->Session->setFlash(__('The site setting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The site setting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
    public function admin_sitelogo($id = null) {
    	
        $title_for_layout = 'Manage Logo';
        $this->set(compact('title_for_layout'));
        $userid = $this->Session->read('userid');
        if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
		if (!$this->SiteSetting->exists($id)){ throw new NotFoundException(__('Invalid setting')); }
		if ($this->request->is(array('post', 'put'))) {
			
			if(isset($this->request->data['SiteSetting']['site_logo']) && 
				$this->request->data['SiteSetting']['site_logo']['name']!=''){
				$path = $this->request->data['SiteSetting']['site_logo']['name'];
				$ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
				if($ext){
					$uploadPath= Configure::read('UPLOAD_USER_LOGO_PATH');
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext,$extensionValid)){
                        $OldImg=$this->request->data['SiteSetting']['hidsite_logo'];
						$imageName = rand().'_'.(strtolower(trim($this->request->data['SiteSetting']['site_logo']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName;
						move_uploaded_file($this->request->data['SiteSetting']['site_logo']['tmp_name'],$full_image_path);
						$this->request->data['SiteSetting']['site_logo'] = $imageName;
                        if($OldImg!=''){ unlink($uploadPath.'/'.$OldImg); }
					} else{
						$this->Session->setFlash(__('Invalid Image Type.'));
						return $this->redirect(array('action' => 'edit',$id));
					}
				 }
			} else {
			   $this->request->data['SiteSetting']['site_logo'] = $this->request->data['SiteSetting']['hidsite_logo'];
			}
			if ($this->SiteSetting->save($this->request->data)) {
                $this->Session->setFlash('The site logo has been saved.', 'default', array('class' => 'success'));
			} else {
				$this->Session->setFlash(__('The site logo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => $id));
			$this->request->data = $this->SiteSetting->find('first', $options);
		}
	}    
}
