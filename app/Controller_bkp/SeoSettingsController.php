<?php
App::uses('AppController', 'Controller');
/**
 * SiteSettings Controller
 *
 * @property Privacy $Privacy
 * @property PaginatorComponent $Paginator
 */
class SeoSettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	/*public function index() {
                $userid = $this->Session->read('userid');
                if(!isset($userid) && $userid=='')
                {
	           $this->redirect('/admin');
                }
		$this->SiteSetting->recursive = 0;
		$this->set('sitesettings', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	

	public function admin_edit() {

                /*$userid = $this->Session->read('userid');
                if(!isset($userid) && $userid==''){
	           $this->redirect('/admin');
                }*/
		/*if (!$this->SeoSetting->exists($id)) {
			throw new NotFoundException(__('Invalid setting'));
		}*/
                
		if ($this->request->is(array('post', 'put'))) {
              //pr($this->request->data);exit;         
			if ($this->SeoSetting->save($this->request->data)) {     
                        $this->Session->setFlash('The seo setting has been saved.','default',array('class'=>'success'));
				#return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The seo setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('SeoSetting.' . $this->SeoSetting->primaryKey => 1));
			$this->request->data = $this->SeoSetting->find('first', $options);
		}
	}


}