<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class ServicesController extends AppController {

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
		$title_for_layout = 'Service List';
		$this->Service->recursive = 0;
		$this->set('services', $this->Paginator->paginate('Service'));
		$this->set(compact('title_for_layout'));
	}

public function admin_add() {
	$this->loadModel('Service');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('Service.name'  => $this->request->data['Service']['name']));
        $serviceexists = $this->Service->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['Service']['name'];
         
         $this->Service->create();
         if ($this->Service->save($this->request->data)) 
          {
            $this->Session->setFlash('The service has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The service could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Service already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_view($id = null) 
{
    $this->loadModel('Service');
    //echo $id;exit;
   
    if (!$this->Service->exists($id)) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    $options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
    $this->set('services', $this->Service->find('first', $options));
}
public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('Service');
		if (!$this->Service->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('Service.name'  => $this->request->data['Service']['name'], 'Service.id <>'=>$id));
			$name = $this->Service->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->Service->save($this->request->data)) {
					$this->Session->setFlash(__('The service has been saved', 'default', array('class' => 'success')));
				} else {
					$this->Session->setFlash(__('The service could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The service already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
			$this->request->data = $this->Service->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('Service');
    $this->Service->id = $id;
    
    if (!$this->Service->exists()) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    if ($this->Service->delete($id)) 
    {
        $this->Session->setFlash('The service has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The service could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

	
	
	
	


	
}
