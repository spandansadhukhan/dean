<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class CreditsettingsController extends AppController {

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
        $this->Auth->allow('admin_creditsetting','admin_index','admin_edit',"admin_addpackage");
    }


	/*public function admin_index() {
            	$this->Category->recursive = 0;
		$this->set('rules', $this->Paginator->paginate());
	}*/
	public function admin_index() {		
		$title_for_layout = 'Credit Settings';
		if ($_POST) {
			
                        if ($this->Creditsetting->save($this->request->data)) {
                                $this->Session->setFlash(__('The Credit Setting has been saved.'));
                                return $this->redirect(array('action' => 'index'));
                        } else {
                                $this->Session->setFlash(__('The Credit could not be saved. Please, try again.'));
                        }
			}
                        else
                        {
                                $this->request->data=$this->Creditsetting->find("first",array("conditions"=>array("Creditsetting.id"=>1)));
                        }
		
		$this->set(compact('title_for_layout'));                
	}	
}
