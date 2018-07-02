<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class ContactTypesController extends AppController {

/**
 * Components
 *
 * @var array
 */
public $components = array('Paginator');
public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'admin_index', 'admin_bulkdelete', 'admin_view', "admin_delete", "admin_changestatus", "admin_bulk_active", "admin_changestatus", "admin_edit", "admin_add");
    }

/**
 * index method
 *
 * @return void
 */
	/*public function admin_index() {
            	$this->ContactType->recursive = 0;
		$this->set('rules', $this->Paginator->paginate());
	}*/
	public function admin_index()
        {
        if (($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])) {
            
            $filter_url['controller'] = $this->request->params['controller'];
            $filter_url['action']     = $this->request->params['action'];
            $filter_url['page']       = 1;
            foreach ($this->data['Filter'] as $name => $value) {
                if ($value) {
                    $filter_url[$name] = urlencode($value);
                }
            }
            return $this->redirect($filter_url);
        } else {
            
            
            $limit                    = 20;
            //$conditions['ContactType.is_admin']=1;
            $conditions['ContactType.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'name') {
                        $conditions["ContactType.name LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['ContactType.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['ContactType.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "ContactType.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "ContactType.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "ContactType.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "ContactType.id desc";
                    } else {
                        $order_by = "ContactType.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "ContactType.id desc";
        }
        
        //$condition1=array('ContactType.is_admin !=' => 1,'ContactType.user_type' => 'E','ContactType.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_instruction    = $this->ContactType->find('count');
        $contact_instructions = $this->Paginator->paginate('ContactType');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('contact_instructions', 'total_instruction', 'active_meta', "inactive_meta", "ad_types"));
    }
       public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->ContactType->delete($content);
                }
                echo "1";
            }
            catch (Exception $ex) {
                print_r($ex);
            }
            
            
        }
        exit;
    }
    function admin_bulk_active()
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                $status = $this->request->data["status"];
                foreach ($this->request->data["content_id"] as $content) {
                    $this->ContactType->id = $content;
                    $this->ContactType->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All Contact Instructions activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All Contact Instructions Deactivated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                }
                
                echo "1";
                exit;
            }
            catch (Exception $ex) {
                print_r($ex);
            }
            
            
        }
        exit;
    }
    function admin_changestatus($id = null, $status = null)
    {
        
        try {
            $this->ContactType->id = $id;
            $this->ContactType->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Contact Instruction activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Contact Instruction Deactivated successfully.', 'default', array(
                    'class' => 'success'
                )));
            }
            $this->redirect(array(
                "action" => "index"
            ));
            
        }
        catch (Exception $ex) {
            print_r($ex);
            exit;
        }
        
        
    }
    
    

public function admin_add() {
	$this->loadModel('ContactType');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('ContactType.name'  => $this->request->data['ContactType']['name']));
        $serviceexists = $this->ContactType->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['ContactType']['name'];
         $this->request->data['ContactType']['posttime']=date("y-m-d H:i:s");
         $this->ContactType->create();
         if ($this->ContactType->save($this->request->data)) 
          {
            $this->Session->setFlash('The Contact Instructions has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
          } 
          else 
          {
            $this->Session->setFlash(__('The Contact Instructions could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('Contact Instructions already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    //$countries = $this->Country->find('list',array('fields'=>array('Country.id','Country.name'),'order'=>array('Country.name'=>'ASC')));
    //$this->set(compact('countries'));
}
	public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'ContactType View';
            if (!$this->ContactType->exists($id)) {
                    throw new NotFoundException(__('Invalid Instruction'));
            }
            $options = array('conditions' => array('ContactType.' . $this->ContactType->primaryKey => $id));
            $content = $this->ContactType->find('first', $options);
            $status=$content["ContactType"]["is_active"] == 1 ? 'Active' : 'Inactive';
            $out     = "<tr>";
            $out    .= "<td>Instruction Name</td>";
            $out    .= "<td>" . $content["ContactType"]["name"] . "</td>";
            $out    .= "</tr>";
            $out    .= "<tr>";
           
        
            
        
            $out    .= "<tr>";
            $out    .= "<td>Add Date</td>";
            $out    .= "<td>" . date("Y-m-d", strtotime($content["ContactType"]["posttime"])) . "</td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Status</td>";
            $out    .= "<td>" .$status. "</td>";
            $out    .= "</tr>";
            echo $out;
        
     
        exit;
            
            
            
            
            
            $this->set(compact('title_for_layout','category','categoryname'));
	}



public function admin_edit($id = null) {
		//echo $id;exit;
	    $this->loadModel('ContactType');
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('ContactType.name'  => $this->request->data['ContactType']['name'], 'ContactType.id <>'=>$id));
			$name = $this->ContactType->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->ContactType->save($this->request->data)) {
                                        
					$this->Session->setFlash(__('The Contact Instruction has been saved', 'default', array('class' => 'success')));
                                                    return $this->redirect(array('action' => 'index'));

				} else {
					$this->Session->setFlash(__('The Contact Instruction could not be saved. Please, try again.', 'default', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The Contact Instruction already exists. Please, try again.', 'default', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('ContactType.' . $this->ContactType->primaryKey => $id));
			$this->request->data = $this->ContactType->find('first', $options);
			
			//print_r($this->request->data);
		}
	}

public function admin_delete($id = null) 
{
    $this->loadModel('ContactType');
    $this->ContactType->id = $id;
    
    if (!$this->ContactType->exists()) 
    {
        throw new NotFoundException(__('Invalid Contact Instructions'));
    }
    if ($this->ContactType->delete($id)) 
    {
        $this->Session->setFlash('The Contact Instruction has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The Contact Instructions could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
}

	
	
	
	


	
}
