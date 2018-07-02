<?php
App::uses('AppController', 'Controller');
/**
 * Haircolors Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class HaircolorsController extends AppController
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
            //$conditions['Haircolor.is_admin']=1;
            $conditions['Haircolor.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'color_name') {
                        $conditions["Haircolor.color_name LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['Haircolor.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['Haircolor.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Haircolor.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Haircolor.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Haircolor.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Haircolor.id desc";
                    } else {
                        $order_by = "Haircolor.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "Haircolor.id desc";
        }
        //$condition1=array('Haircolor.is_admin !=' => 1,'Haircolor.user_type' => 'E','Haircolor.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_haircolor    = $this->Haircolor->find('count');
        
        $haircolors1         = $this->Paginator->paginate('Haircolor');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('haircolors1', 'total_haircolor', 'active_Hair color', "inactive_Hair color", "ad_types"));
    }
    
    public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->Haircolor->delete($content);
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
        $title_for_layout = 'Haircolor View';
        if (!$this->Haircolor->exists($id)) {
            throw new NotFoundException(__('Invalid Haircolor'));
        }
        $options = array(
            'conditions' => array(
                'Haircolor.' . $this->Haircolor->primaryKey => $id
            )
        );
        $content = $this->Haircolor->find('first', $options);
        $status=$content["Haircolor"]["is_active"] == 1 ? 'Active' : 'Inactive';
        $out     = "<tr>";
        $out .= "<td>Id</td>";
        $out .= "<td>" . $content["Haircolor"]["id"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Hair Color</td>";
        $out .= "<td>" . $content["Haircolor"]["color_name"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Add Date</td>";
        $out .= "<td>" . date('Y-m-d',strtotime($content["Haircolor"]["posttime"])) . "</td>";
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
        $this->Haircolor->id = $id;
        
        if (!$this->Haircolor->exists()) {
            throw new NotFoundException(__('Invalid Hair color'));
        }
        if ($this->Haircolor->delete($id)) {
            $this->Session->setFlash('The Hair color has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The Hair color could not be deleted. Please, try again.'));
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
                    $this->Haircolor->id = $content;
                    $this->Haircolor->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All HairColor  activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All HairColor Deactivated successfully.', 'default', array(
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
            $this->Haircolor->id = $id;
            $this->Haircolor->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Haircolor activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Haircolor Deactivated successfully.', 'default', array(
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
            $this->Haircolor->create();
            $this->request->data["Haircolor"]["posttime"] = date("Y-m-d H:i:s");
            if ($this->Haircolor->save($this->request->data)) {
                $this->Session->setFlash(__('The Haircolor has been saved.', 'default', array(
                    'class' => 'success'
                )));
                $this->redirect(array("action"=>"index"));
               
            } else {
                $this->Session->setFlash(__('The Haircolor could not be saved. Please, try again.'));
            }
        }
        
    }
    public function admin_edit($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        if (!$this->Haircolor->exists($id)) {
            throw new NotFoundException(__('Invalid Haircolor'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            if ($this->Haircolor->save($this->request->data)) {
                 $this->Session->setFlash(__('The Haircolor has been saved.', 'default', array(
                    'class' => 'success'
                )));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The Haircolor could not be saved. Please, try again.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
                
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'Haircolor.' . $this->Haircolor->primaryKey => $id
                )
            );
            $this->request->data = $this->Haircolor->find('first', $options);
        }
    }
    
    
    
}