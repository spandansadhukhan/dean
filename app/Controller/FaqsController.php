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
            //pr($faqs);exit;
            
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
            
         $this->loadModel('FaqCategory');
         $options1 = array('conditions' => array('FaqCategory.status' => 1));
         $category = $this->FaqCategory->find('list', $options1);
            
            $types=array("G"=>"General FAQ","E"=>"Escort FAQ","C"=>"Client FAQ","A"=>"Advertise FAQ");
            $this->set(compact('types','category'));
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
             $this->loadModel('FaqCategory');
             $options1 = array('conditions' => array('FaqCategory.status' => 1));
             $category = $this->FaqCategory->find('list', $options1);
            $types=array("G"=>"General FAQ","E"=>"Escort FAQ","C"=>"Client FAQ","A"=>"Advertise FAQ");
            $this->set(compact('types','category'));
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

        
        
        public function admin_faqcategorylist() {	
        
        $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
                $this->loadModel("FaqCategory");
		$title_for_layout = 'FaqCategory List';
                
                
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
                        $conditions['FaqCategory.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['FaqCategory.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "FaqCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "FaqCategory.id desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "FaqCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "FaqCategory.id desc";
                    } else {
                        $order_by = "FaqCategory.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
                
                
                
                
		$this->FaqCategory->recursive = 0;
                $this->Paginator->settings=array(
                'conditions' => ($conditions),
                "order"=>"FaqCategory.id desc"    
                );
		$this->set('classcategories', $this->Paginator->paginate('FaqCategory'));
                $total_category = $this->FaqCategory->find('count');
                $total_active_category = $this->FaqCategory->find('count', array('conditions' => array('FaqCategory.status'=>1)));
                $total_inactive_category = $this->FaqCategory->find('count', array('conditions' => array('FaqCategory.status'=>0)));
		$this->set(compact('title_for_layout','total_category','total_active_category','total_inactive_category'));
	}
        
       public function admin_activefaqcat($id = null) {
            
            $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }

        $this->loadModel("FaqCategory");
        $checkuser = $this->FaqCategory->find('first', array('conditions' => array('FaqCategory.id' => $id)));
        if ($checkuser['FaqCategory']['status'] == 1) {
            $status = 0;
        } elseif ($checkuser['FaqCategory']['status'] == 0) {
            $status = 1;
        }

        $this->FaqCategory->updateAll(array('FaqCategory.status' => "'$status'"), array('FaqCategory.id' => $id));
        $this->redirect(array('action' => 'faqcategorylist'));
    }
        
        
     public function admin_deletefaqcat($id = null) 
{
         
         $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
    $this->loadModel('FaqCategory');
    $this->FaqCategory->id = $id;
    
    if (!$this->FaqCategory->exists()) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    if ($this->FaqCategory->delete($id)) 
    {
        $this->Session->setFlash('The category has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'faqcategorylist'));
} 
        
  


    public function admin_editcat($id = null) {
        
        
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
	    $this->loadModel('FaqCategory');
		if (!$this->FaqCategory->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('FaqCategory.name'  => $this->request->data['FaqCategory']['name'], 'FaqCategory.id <>'=>$id));
			$name = $this->FaqCategory->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->FaqCategory->save($this->request->data)) {
					$this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
                                        return $this->redirect(array('action' => 'faqcategorylist'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The category name already exists. Please, try again.', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('FaqCategory.' . $this->FaqCategory->primaryKey => $id));
			$this->request->data = $this->FaqCategory->find('first', $options);
			
			//print_r($this->request->data);
		}
	}
        
        
        
        public function admin_addcat() {
            
            $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
            
	$this->loadModel('FaqCategory');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('FaqCategory.name'  => $this->request->data['FaqCategory']['name']));
        
        
        $serviceexists = $this->FaqCategory->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['FaqCategory']['name'];
         $this->request->data['FaqCategory']['add_date']=date('Y-m-d H:i:s');
         
         $this->FaqCategory->create();
         if ($this->FaqCategory->save($this->request->data)) 
          {
            $this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'faqcategorylist'));
          } 
          else 
          {
            $this->Session->setFlash(__('The category could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('FaqCategory already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    
}

}
