<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class BodyTypesController extends AppController {

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
		$title_for_layout = 'Body type List';
		$this->BodyType->recursive = 0;
		$this->set('bodytypes', $this->Paginator->paginate('BodyType'));
		$this->set(compact('title_for_layout'));
	}

public function admin_add() {
	$this->loadModel('BodyType');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('BodyType.body_type'  => $this->request->data['BodyType']['body_type']));
        $bodytypeexists = $this->BodyType->find('first', $options);
        if(!$bodytypeexists)
        {
            //echo "hello";exit;
         $this->request->data['BodyType']['body_type'];
         
         $this->BodyType->create();
         if ($this->BodyType->save($this->request->data)) 
          {
            $this->Session->setFlash('The body type has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The body type could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Body type already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_view($id = null) 
{
    $this->loadModel('BodyType');
    //echo $id;exit;
   
    if (!$this->BodyType->exists($id)) 
    {
        throw new NotFoundException(__('Invalid type'));
    }
    $options = array('conditions' => array('BodyType.' . $this->BodyType->primaryKey => $id));
    $this->set('types', $this->BodyType->find('first', $options));
}
public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('BodyType');
		if (!$this->BodyType->exists($id)) {
			throw new NotFoundException(__('Invalid type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('BodyType.body_type'  => $this->request->data['BodyType']['body_type'], 'BodyType.id <>'=>$id));
			$name = $this->BodyType->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->BodyType->save($this->request->data)) {
					$this->Session->setFlash(__('The body type has been saved', 'default', array('class' => 'success')));
				} else {
					$this->Session->setFlash(__('The body type could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The body type already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('BodyType.' . $this->BodyType->primaryKey => $id));
			$this->request->data = $this->BodyType->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('BodyType');
    $this->BodyType->id = $id;
    
    if (!$this->BodyType->exists()) 
    {
        throw new NotFoundException(__('Invalid type'));
    }
    if ($this->BodyType->delete($id)) 
    {
        $this->Session->setFlash('The type has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The type could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

	
	
	
	


	
}
