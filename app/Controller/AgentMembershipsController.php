<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class AgentMembershipsController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');
public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index','admin_add','admin_view','admin_edit','admin_delete','admin_features');
    }

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
		$title_for_layout = 'AgentMembership List';
		$this->AgentMembership->recursive = 0;
                $this->Paginator->settings=array(
                "order"=>"AgentMembership.id desc"    
                );
		$this->set('services', $this->Paginator->paginate('AgentMembership'));
		$this->set(compact('title_for_layout'));
	}

public function admin_add() {
	$this->loadModel('AgentMembership');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('AgentMembership.name'  => $this->request->data['AgentMembership']['name']));
        $serviceexists = $this->AgentMembership->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['AgentMembership']['name'];
         
         $this->AgentMembership->create();
         if ($this->AgentMembership->save($this->request->data)) 
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
        
            $this->Session->setFlash(__('AgentMembership already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_view($id = null) 
{
    $this->loadModel('AgentMembership');
    //echo $id;exit;
   
    if (!$this->AgentMembership->exists($id)) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    $options = array('conditions' => array('AgentMembership.' . $this->AgentMembership->primaryKey => $id));
    $this->set('services', $this->AgentMembership->find('first', $options));
}
public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('AgentMembership');
		if (!$this->AgentMembership->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('AgentMembership.name'  => $this->request->data['AgentMembership']['name'], 'AgentMembership.id <>'=>$id));
			$name = $this->AgentMembership->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->AgentMembership->save($this->request->data)) {
					$this->Session->setFlash(__('The Membership Plan has been saved', 'default', array('class' => 'success')));
				} else {
					$this->Session->setFlash(__('The Membership Plan could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The Membership Plan name already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('AgentMembership.' . $this->AgentMembership->primaryKey => $id));
			$this->request->data = $this->AgentMembership->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('AgentMembership');
    $this->AgentMembership->id = $id;
    
    if (!$this->AgentMembership->exists()) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    if ($this->AgentMembership->delete($id)) 
    {
        $this->Session->setFlash('The service has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The service could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

public function admin_features($id=null) 
{
    
    if ($this->request->is(array('post', 'put'))) 
    {
        $this->AgentMembership->id = $this->request->data["AgentMembership"]["id"];
        $allow= json_encode($this->request->data["AgentMembership"]);
        if($this->AgentMembership->saveField('allowed_features', $allow))
        {
            $this->Session->setFlash(__('All Features has been saved', 'default', array('class' => 'success')));
            $this->redirect(array('action'=>"index"));
        }
        
        
        

    }
    else
    {    
    $featurs=$this->AgentMembership->find("first",array("conditions"=>array("AgentMembership.id"=>$id)));
    $allowed_featurs= json_decode($featurs["AgentMembership"]["allowed_features"]);
    $this->set(compact('allowed_featurs','featurs'));
    }
    //pr($allowed_featurs);exit;
    
}

	
	
	
	


	
}
