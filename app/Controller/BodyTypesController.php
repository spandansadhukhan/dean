<?php
App::uses('AppController', 'Controller');
/**
 * BodyTypes Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class BodyTypesController extends AppController
{
    
    /**
     * Components
     *
     * @var array
     */
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'admin_index', 'admin_bulkdelete', 'admin_view', "admin_delete", "admin_changestatus", "admin_bulk_active", "admin_changestatus", "admin_edit", "admin_add");
    }
    
    public $components = array('Paginator');
    
    /**
     * index method
     *
     * @return void
     */
    
    
    
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
            //$conditions['BodyType.is_admin']=1;
            $conditions['BodyType.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'body_type') {
                        $conditions["BodyType.body_type LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['BodyType.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['BodyType.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "BodyType.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "BodyType.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "BodyType.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "BodyType.id desc";
                    } else {
                        $order_by = "BodyType.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "BodyType.id desc";
        }
        //$condition1=array('BodyType.is_admin !=' => 1,'BodyType.user_type' => 'E','BodyType.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_bodytype    = $this->BodyType->find('count');
        
        $bodyTypes         = $this->Paginator->paginate('BodyType');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('bodyTypes', 'total_bodytype', 'active_Body Type', "inactive_Body Type", "ad_types"));
    }
    
    public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->BodyType->delete($content);
                }
                echo "1";
            }
            catch (Exception $ex) {
                print_r($ex);
            }
            
            
        }
        exit;
    }
    
    public function admin_view($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        $title_for_layout = 'BodyType View';
        if (!$this->BodyType->exists($id)) {
            throw new NotFoundException(__('Invalid Body Type'));
        }
        $options = array(
            'conditions' => array(
                'BodyType.' . $this->BodyType->primaryKey => $id
            )
        );
        $content = $this->BodyType->find('first', $options);
        $status=$content["BodyType"]["is_active"] == 1 ? 'Active' : 'Inactive';
        $out     = "<tr>";
        $out .= "<td>Id</td>";
        $out .= "<td>" . $content["BodyType"]["id"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Body Type</td>";
        $out .= "<td>" . $content["BodyType"]["name"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Add Date</td>";
        $out .= "<td>" . date('Y-m-d',strtotime($content["BodyType"]["posttime"])) . "</td>";
        $out .= "</tr>";
        
        $out .= "<tr>";
        $out .= "<td>Status</td>";
        $out .= "<td>" .$status. "</td>";
        $out .= "</tr>";
        echo $out;
        
     
        exit;
        
        
    }
    
    
    
    
    
    
    
    
    
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    
    
    
    
    /**
     * add method
     *
     * @return void
     */
    
    
    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    
    
    
    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    
    
    public function admin_delete($id = null)
    {
        $this->BodyType->id = $id;
        
        if (!$this->BodyType->exists()) {
            throw new NotFoundException(__('Invalid Body Type'));
        }
        if ($this->BodyType->delete($id)) {
            $this->Session->setFlash('The Body Type has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The Body Type could not be deleted. Please, try again.'));
        }
        return $this->redirect(array(
            'action' => 'index'
        ));
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
                    $this->BodyType->id = $content;
                    $this->BodyType->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All Body Type  activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All Body Type Deactivated successfully.', 'default', array(
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
            $this->BodyType->id = $id;
            $this->BodyType->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Body Type activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Body Type Deactivated successfully.', 'default', array(
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
    
    public function admin_add()
    {
        if ($this->request->is('post')) {
            $this->BodyType->create();
            $this->request->data["BodyType"]["posttime"] = date("Y-m-d H:i:s");
            if ($this->BodyType->save($this->request->data)) {
                $this->Session->setFlash(__('The Body Type has been saved.', 'default', array(
                    'class' => 'success'
                )));
                $this->redirect(array("action"=>"index"));
               
            } else {
                $this->Session->setFlash(__('The Body Type could not be saved. Please, try again.'));
            }
        }
        
    }
    public function admin_edit($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        if (!$this->BodyType->exists($id)) {
            throw new NotFoundException(__('Invalid Body Type'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            if ($this->BodyType->save($this->request->data)) {
                 $this->Session->setFlash(__('The Body Type has been saved.', 'default', array(
                    'class' => 'success'
                )));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The Body Type could not be saved. Please, try again.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
                
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'BodyType.' . $this->BodyType->primaryKey => $id
                )
            );
            $this->request->data = $this->BodyType->find('first', $options);
        }
    }
    
    
    
}