<?php
App::uses('AppController', 'Controller');
/**
 * CupSizes Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class CupSizesController extends AppController
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
            //$conditions['CupSize.is_admin']=1;
            $conditions['CupSize.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'name') {
                        $conditions["CupSize.name LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['CupSize.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['CupSize.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "CupSize.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "CupSize.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "CupSize.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "CupSize.id desc";
                    } else {
                        $order_by = "CupSize.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "CupSize.id desc";
        }
        //$condition1=array('CupSize.is_admin !=' => 1,'CupSize.user_type' => 'E','CupSize.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_cupsize    = $this->CupSize->find('count');
        
        $cupSizes         = $this->Paginator->paginate('CupSize');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('cupSizes', 'total_cupsize', 'active_Cup Size', "inactive_Cup Size", "ad_types"));
    }
    
    public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->CupSize->delete($content);
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
        $title_for_layout = 'CupSize View';
        if (!$this->CupSize->exists($id)) {
            throw new NotFoundException(__('Invalid CupSize'));
        }
        $options = array(
            'conditions' => array(
                'CupSize.' . $this->CupSize->primaryKey => $id
            )
        );
        $content = $this->CupSize->find('first', $options);
        $status=$content["CupSize"]["is_active"] == 1 ? 'Active' : 'Inactive';
        $out     = "<tr>";
        $out .= "<td>Id</td>";
        $out .= "<td>" . $content["CupSize"]["id"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Cup Size</td>";
        $out .= "<td>" . $content["CupSize"]["name"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Add Date</td>";
        $out .= "<td>" . $content["CupSize"]["posttime"] . "</td>";
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
        $this->CupSize->id = $id;
        
        if (!$this->CupSize->exists()) {
            throw new NotFoundException(__('Invalid Cup Size'));
        }
        if ($this->CupSize->delete($id)) {
            $this->Session->setFlash('The Cup Size has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The Cup Size could not be deleted. Please, try again.'));
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
                    $this->CupSize->id = $content;
                    $this->CupSize->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All Cup Size  activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All Cup Size Deactivated successfully.', 'default', array(
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
            $this->CupSize->id = $id;
            $this->CupSize->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('CupSize activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('CupSize Deactivated successfully.', 'default', array(
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
            $this->CupSize->create();
            $this->request->data["CupSize"]["posttime"] = date("Y-m-d H:i:s");
            if ($this->CupSize->save($this->request->data)) {
                $this->Session->setFlash(__('The CupSize has been saved.', 'default', array(
                    'class' => 'success'
                )));
                $this->redirect(array("action"=>"index"));
               
            } else {
                $this->Session->setFlash(__('The CupSize could not be saved. Please, try again.'));
            }
        }
        
    }
    public function admin_edit($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        if (!$this->CupSize->exists($id)) {
            throw new NotFoundException(__('Invalid CupSize'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            if ($this->CupSize->save($this->request->data)) {
                 $this->Session->setFlash(__('The CupSize has been saved.', 'default', array(
                    'class' => 'success'
                )));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The CupSize could not be saved. Please, try again.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
                
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'CupSize.' . $this->CupSize->primaryKey => $id
                )
            );
            $this->request->data = $this->CupSize->find('first', $options);
        }
    }
    
    
    
}