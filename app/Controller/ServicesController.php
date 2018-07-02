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
            	$this->Service->recursive = 0;
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
            //$conditions['Service.is_admin']=1;
            $conditions['Service.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'name') {
                        $conditions["Service.name LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['Service.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['Service.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Service.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Service.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Service.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Service.id desc";
                    } else {
                        $order_by = "Service.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "Service.id desc";
        }
        
        //$condition1=array('Service.is_admin !=' => 1,'Service.user_type' => 'E','Service.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_service    = $this->Service->find('count');
        $listservices         = $this->Paginator->paginate('Service');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('listservices', 'total_service', 'active_meta', "inactive_meta", "ad_types"));
    }
       public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->Service->delete($content);
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
                    $this->Service->id = $content;
                    $this->Service->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All services activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All services Deactivated successfully.', 'default', array(
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
            $this->Service->id = $id;
            $this->Service->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Service activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Service Deactivated successfully.', 'default', array(
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
	public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Service View';
            if (!$this->Service->exists($id)) {
                    throw new NotFoundException(__('Invalid Service'));
            }
            $options = array('conditions' => array('Service.' . $this->Service->primaryKey => $id));
            $content = $this->Service->find('first', $options);
            $status=$content["Service"]["is_active"] == 1 ? 'Active' : 'Inactive';
            $out     = "<tr>";
            $out    .= "<td>Service Name</td>";
            $out    .= "<td>" . $content["Service"]["name"] . "</td>";
            $out    .= "</tr>";
            $out    .= "<tr>";
           
        
            
        
            $out    .= "<tr>";
            $out    .= "<td>Add Date</td>";
            $out    .= "<td>" . date("Y-m-d", strtotime($content["Service"]["posttime"])) . "</td>";
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
