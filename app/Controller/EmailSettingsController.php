<?php
App::uses('AppController', 'Controller');
/**
 * SiteSettings Controller
 *
 * @property Privacy $Privacy
 * @property PaginatorComponent $Paginator
 */
class EmailSettingsController extends AppController {

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
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index','admin_edit');
    }




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
			if ($this->EmailSetting->save($this->request->data)) {     
                        $this->Session->setFlash('The email setting has been saved.','default',array('class'=>'success'));
				#return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email setting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('EmailSetting.' . $this->EmailSetting->primaryKey => 1));
			$this->request->data = $this->EmailSetting->find('first', $options);
		}
	}


}