<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class ClassifiedCategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');
public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index','admin_add','admin_view','admin_edit','admin_delete','admin_features','admin_active');
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
		$title_for_layout = 'ClassifiedCategory List';
                
                
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
                        $conditions['ClassifiedCategory.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['ClassifiedCategory.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "ClassifiedCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "ClassifiedCategory.id desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "ClassifiedCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "ClassifiedCategory.id desc";
                    } else {
                        $order_by = "ClassifiedCategory.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
                
                
                
                
		$this->ClassifiedCategory->recursive = 0;
                $this->Paginator->settings=array(
                'conditions' => ($conditions),
                "order"=>"ClassifiedCategory.id desc"    
                );
		$this->set('classcategories', $this->Paginator->paginate('ClassifiedCategory'));
                $total_category = $this->ClassifiedCategory->find('count');
                $total_active_category = $this->ClassifiedCategory->find('count', array('conditions' => array('ClassifiedCategory.status'=>1)));
                $total_inactive_category = $this->ClassifiedCategory->find('count', array('conditions' => array('ClassifiedCategory.status'=>0)));
		$this->set(compact('title_for_layout','total_category','total_active_category','total_inactive_category'));
	}

public function admin_add() {
	$this->loadModel('ClassifiedCategory');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('ClassifiedCategory.name'  => $this->request->data['ClassifiedCategory']['name']));
        $serviceexists = $this->ClassifiedCategory->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['ClassifiedCategory']['name'];
         
         $this->ClassifiedCategory->create();
         if ($this->ClassifiedCategory->save($this->request->data)) 
          {
            $this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The category could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('ClassifiedCategory already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
public function admin_view($id = null) 
{
    $this->loadModel('ClassifiedCategory');
    //echo $id;exit;
   
    if (!$this->ClassifiedCategory->exists($id)) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    $options = array('conditions' => array('ClassifiedCategory.' . $this->ClassifiedCategory->primaryKey => $id));
    $this->set('services', $this->ClassifiedCategory->find('first', $options));
}
public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('ClassifiedCategory');
		if (!$this->ClassifiedCategory->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('ClassifiedCategory.name'  => $this->request->data['ClassifiedCategory']['name'], 'ClassifiedCategory.id <>'=>$id));
			$name = $this->ClassifiedCategory->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->ClassifiedCategory->save($this->request->data)) {
					$this->Session->setFlash(__('The category has been saved', 'default', array('class' => 'success')));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The category name already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('ClassifiedCategory.' . $this->ClassifiedCategory->primaryKey => $id));
			$this->request->data = $this->ClassifiedCategory->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('ClassifiedCategory');
    $this->ClassifiedCategory->id = $id;
    
    if (!$this->ClassifiedCategory->exists()) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    if ($this->ClassifiedCategory->delete($id)) 
    {
        $this->Session->setFlash('The category has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}



 public function admin_active($id = null) {

        $this->loadModel("ClassifiedCategory");
        $checkuser = $this->ClassifiedCategory->find('first', array('conditions' => array('ClassifiedCategory.id' => $id)));
        if ($checkuser['ClassifiedCategory']['status'] == 1) {
            $status = 0;
        } elseif ($checkuser['ClassifiedCategory']['status'] == 0) {
            $status = 1;
        }

        $this->ClassifiedCategory->updateAll(array('ClassifiedCategory.status' => "'$status'"), array('ClassifiedCategory.id' => $id));
        $this->redirect(array('action' => 'index'));
    }	
	
	
	


	
}
