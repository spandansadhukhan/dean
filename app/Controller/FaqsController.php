<?php

App::uses('AppController', 'Controller');

/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class FaqsController extends AppController {

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

    function admin_index()
        {
            $this->loadModel('Faq');
            $faqs=$this->Faq->find('all');
            $this->set(compact('faqs'));
        }
        
        function  admin_add()
        {
            
            if ($this->request->is(array('post', 'put'))) {
                    if ($this->Faq->save($this->request->data)) {
                            $this->Session->setFlash(__('The Faq has been saved.'));
                            $this->redirect(array('action'=>'index'));
                    } else {
                            $this->Session->setFlash(__('The Faq could not be saved. Please, try again.'));
                    }
            }
            $types=array("G"=>"General FAQ","E"=>"Escort FAQ","C"=>"Client FAQ","A"=>"Advertise FAQ");
            $this->set(compact('types'));
        }
        
        function  admin_edit($id=null)
        {
            $this->Faq->id = $id;
            if (!$this->Faq->exists()) {
                    throw new NotFoundException(__('Invalid category'));
            }
            
            if ($this->request->is(array('post', 'put'))) {
                    if ($this->Faq->save($this->request->data)) {
                            $this->Session->setFlash(__('The Faq has been saved.'));
                            $this->redirect(array('action'=>'index'));
                    } else {
                            $this->Session->setFlash(__('The Faq could not be saved. Please, try again.'));
                    }
            }
            else
            {
                $options = array('conditions' => array('Faq.' . $this->Faq->primaryKey => $id));
                $this->request->data = $this->Faq->find('first', $options);
            }
            $types=array("G"=>"General FAQ","E"=>"Escort FAQ","C"=>"Client FAQ","A"=>"Advertise FAQ");
            $this->set(compact('types'));
        }
        	public function admin_delete($id = null) {
		$this->Faq->id = $id;
		if (!$this->Faq->exists()) {
			throw new NotFoundException(__('Invalid Faq'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Faq->delete()) {
			$this->Session->setFlash(__('The faq has been deleted.'));
		} else {
			$this->Session->setFlash(__('The faq not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


}
