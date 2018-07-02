<?php
App::uses('AppController', 'Controller');
/**
 * Adpackages Controller
 *
 * @property Adpackage $Adpackage
 * @property PaginatorComponent $Paginator
 */
class AdpackagesController extends AppController {

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

	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index','admin_edit','admin_view',"admin_bulk_active","admin_changestatus","admin_delete","admin_bulkdelete","admin_add");
    }




	    public function admin_index() {

        


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
            //$conditions['Adpackage.is_admin']=1;
            $conditions['Adpackage.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'name') {
                        $conditions['Adpackage.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if($param_name=="is_active")
                            {
                                if($value=="Yes")
                                {
                                    $conditions['Adpackage.' . $param_name] = urldecode(1);
                                }
                                else
                                {
                                    $conditions['Adpackage.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Adpackage.add_date asc";
                    } else if ($direction == 'New') {
                        $order_by = "Adpackage.add_date desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Adpackage.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Adpackage.id desc";
                    } else {
                        $order_by = "Adpackage.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Adpackage.id desc";
        }
        //$condition1=array('Adpackage.is_admin !=' => 1,'Adpackage.user_type' => 'E','Adpackage.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_adpacakge = $this->Adpackage->find('count');
        $active_pacakge = $this->Adpackage->find('count',array("conditions"=>array("Adpackage.is_active"=>1)));
        $inactive_pacakge = $this->Adpackage->find('count',array("conditions"=>array("Adpackage.is_active"=>0)));
        $packages = $this->Paginator->paginate('Adpackage');
        $ad_types=array("Yes"=>"Yes","No"=>"No");
        //pr($advertisements);exit;
        $this->set(compact('packages', 'total_adpacakge','active_pacakge',"inactive_pacakge","ad_types"));
    }


	


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Adpackage View';
            if (!$this->Adpackage->exists($id)) {
                    throw new NotFoundException(__('Invalid Adpackage'));
            }
            $options = array('conditions' => array('Adpackage.' . $this->Adpackage->primaryKey => $id));
            $content = $this->Adpackage->find('first', $options);
            $out="<tr>";
            $out.="<td>Plan Name</td>";
            $out.="<td>".$content["Adpackage"]["name"]."</td>";
            $out.="</tr>";
            $out.="<tr>";
            $out.="<td>Size</td>";
            $out.="<td>".$content["Adpackage"]["resolution"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Daily Price</td>";
            $out.="<td>".$content["Adpackage"]["daily_price"]." NZD</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Weekly Price</td>";
            $out.="<td>".$content["Adpackage"]["weekly_price"]." NZD</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Status</td>";
            $out.="<td>".$content["Adpackage"]["is_active"]?'Active':'Inactive'."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Add Date</td>";
            $out.="<td>".$content["Adpackage"]["add_date"]."</td>";
            $out.="</tr>";
            echo $out;exit;
            

	}
        
        function admin_bulk_active()
        {
        if ($this->request->is(array('post', 'put'))) 
        {
            try {
                $status=$this->request->data["status"];
                foreach ($this->request->data["content_id"] as $content)
                {
                    $this->Adpackage->id = $content;
                    $this->Adpackage->saveField('is_active', $status);
                } 
                
                if($status==1)
                {
                  $this->Session->setFlash(__('All content activated successfully.', 'default', array('class' => 'success')));

                }
                else{
                  $this->Session->setFlash(__('All content Deactivated successfully.', 'default', array('class' => 'success')));
                }
                
            echo "1";exit;                
            } catch (Exception $ex) {
                print_r($ex);    
            }
            

        }
        exit;
        }
        
        
        function admin_changestatus($id=null,$status=null)
        {
        
            try {
                $this->Adpackage->id = $id;
                $this->Adpackage->saveField('is_active', $status);
                if($status==1)
                {
                  $this->Session->setFlash(__('Package activated successfully.', 'default', array('class' => 'success')));

                }
                else{
                  $this->Session->setFlash(__('Package Deactivated successfully.', 'default', array('class' => 'success')));
                }   
                $this->redirect(array("action"=>"index"));
                
            } catch (Exception $ex) {
                print_r($ex);  
                exit;
            }
            

        }
        

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Adpackage->create();
                        $this->request->data["Adpackage"]["add_date"]=date("Y-m-d");
			if ($this->Adpackage->save($this->request->data)) {
				$this->Session->setFlash(__('The Package has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Package could not be saved. Please, try again.'));
			}
		}
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function admin_edit($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            if (!$this->Adpackage->exists($id)) {
                    throw new NotFoundException(__('Invalid content'));
            }
            if ($this->request->is(array('post', 'put'))) {
                    if ($this->Adpackage->save($this->request->data)) {
                            $this->Session->setFlash(__('The Package has been saved.'));
                            return $this->redirect(array('action' => 'index'));
                    } else {
                            $this->Session->setFlash(__('The Package could not be saved. Please, try again.'));
                            return $this->redirect(array('action' => 'index'));

                    }
            } else {
                    $options = array('conditions' => array('Adpackage.' . $this->Adpackage->primaryKey => $id));
                    $this->request->data = $this->Adpackage->find('first', $options);
            }
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

    public function admin_delete($id = null) {
        $this->Adpackage->id = $id;

        if (!$this->Adpackage->exists()) {
            throw new NotFoundException(__('Invalid Package'));
        }
        if ($this->Adpackage->delete($id)) {
            $this->Session->setFlash('The package has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The package could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }
	
    public function admin_bulkdelete($id = null) 
   {
        if ($this->request->is(array('post', 'put'))) 
        {
            try {
                foreach ($this->request->data["content_id"] as $content)
                {
                    $this->Adpackage->delete($content);
                }   
                echo "1";           
            } catch (Exception $ex) {
                print_r($ex);    
            }
            

        }
            exit;     
   }
    
       

}
