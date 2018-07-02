<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class EscortTypesController extends AppController {

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
		$title_for_layout = 'Escort type List';
		$this->EscortType->recursive = 0;
		$this->set('escorttypes', $this->Paginator->paginate('EscortType'));
		$this->set(compact('title_for_layout'));
	}

public function admin_add() {
	$this->loadModel('EscortType');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('EscortType.name'  => $this->request->data['EscortType']['name']));
        $bodytypeexists = $this->EscortType->find('first', $options);
        if(!$bodytypeexists)
        {
            //echo "hello";exit;
         //$this->request->data['EscortType']['is_active'];
         //$this->request->data['EscortType']['name'];exit;
         
         $this->EscortType->create();
         if ($this->EscortType->save($this->request->data)) 
          {
            $this->Session->setFlash('The escort type has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The escort type could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Escort type already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_view($id = null) 
{
    $this->loadModel('EscortType');
    //echo $id;exit;
   
    if (!$this->EscortType->exists($id)) 
    {
        throw new NotFoundException(__('Invalid type'));
    }
    $options = array('conditions' => array('EscortType.' . $this->EscortType->primaryKey => $id));
    $this->set('types', $this->EscortType->find('first', $options));
}
public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('EscortType');
		if (!$this->EscortType->exists($id)) {
			throw new NotFoundException(__('Invalid type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('EscortType.name'  => $this->request->data['EscortType']['name'], 'EscortType.id <>'=>$id));
			$name = $this->EscortType->find('first', $options);
			if(!$name){
				//echo "hello";exit;
        if($this->request->data['EscortType']['is_active']==1)
        {
          $this->request->data['EscortType']['is_active']=1;
        }
        else
        {
          $this->request->data['EscortType']['is_active']=0;
        }
				if ($this->EscortType->save($this->request->data)) {
					$this->Session->setFlash(__('The escort type has been saved', 'default', array('class' => 'success')));
				} else {
					$this->Session->setFlash(__('The escort type could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The escort type already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('EscortType.' . $this->EscortType->primaryKey => $id));
			$this->request->data = $this->EscortType->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('EscortType');
    $this->EscortType->id = $id;
    
    if (!$this->EscortType->exists()) 
    {
        throw new NotFoundException(__('Invalid type'));
    }
    if ($this->EscortType->delete($id)) 
    {
        $this->Session->setFlash('The escort type has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The escort type could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

	
	
	
	


	
}
