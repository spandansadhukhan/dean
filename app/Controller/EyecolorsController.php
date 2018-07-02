<?php
App::uses('AppController', 'Controller');
/**
 * Eyecolors Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class EyecolorsController extends AppController
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
            //$conditions['Eyecolor.is_admin']=1;
            $conditions['Eyecolor.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'color_name') {
                        $conditions["Eyecolor.color_name LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['Eyecolor.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['Eyecolor.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Eyecolor.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Eyecolor.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Eyecolor.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Eyecolor.id desc";
                    } else {
                        $order_by = "Eyecolor.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "Eyecolor.id desc";
        }
        //$condition1=array('Eyecolor.is_admin !=' => 1,'Eyecolor.user_type' => 'E','Eyecolor.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_eyecolor    = $this->Eyecolor->find('count');
        
        $eyecolors1         = $this->Paginator->paginate('Eyecolor');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('eyecolors1', 'total_eyecolor', 'active_Eye color', "inactive_Eye color", "ad_types"));
    }
    
    public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->Eyecolor->delete($content);
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
        $title_for_layout = 'Eyecolor View';
        if (!$this->Eyecolor->exists($id)) {
            throw new NotFoundException(__('Invalid Eyecolor'));
        }
        $options = array(
            'conditions' => array(
                'Eyecolor.' . $this->Eyecolor->primaryKey => $id
            )
        );
        $content = $this->Eyecolor->find('first', $options);
        $status=$content["Eyecolor"]["is_active"] == 1 ? 'Active' : 'Inactive';
        $out     = "<tr>";
        $out .= "<td>Id</td>";
        $out .= "<td>" . $content["Eyecolor"]["id"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Eye Color</td>";
        $out .= "<td>" . $content["Eyecolor"]["color_name"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Add Date</td>";
        $out .= "<td>" . $content["Eyecolor"]["posttime"] . "</td>";
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
        $this->Eyecolor->id = $id;
        
        if (!$this->Eyecolor->exists()) {
            throw new NotFoundException(__('Invalid Eye color'));
        }
        if ($this->Eyecolor->delete($id)) {
            $this->Session->setFlash('The Eye color has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The Eye color could not be deleted. Please, try again.'));
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
                    $this->Eyecolor->id = $content;
                    $this->Eyecolor->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All EyeColor  activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All EyeColor Deactivated successfully.', 'default', array(
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
            $this->Eyecolor->id = $id;
            $this->Eyecolor->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Eyecolor activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Eyecolor Deactivated successfully.', 'default', array(
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
            $this->Eyecolor->create();
            $this->request->data["Eyecolor"]["posttime"] = date("Y-m-d");
            if ($this->Eyecolor->save($this->request->data)) {
                $this->Session->setFlash(__('The Eyecolor has been saved.', 'default', array(
                    'class' => 'success'
                )));
                $this->redirect(array("action"=>"index"));
               
            } else {
                $this->Session->setFlash(__('The Eyecolor could not be saved. Please, try again.'));
            }
        }
        
    }
    public function admin_edit($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        if (!$this->Eyecolor->exists($id)) {
            throw new NotFoundException(__('Invalid Eyecolor'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            if ($this->Eyecolor->save($this->request->data)) {
                 $this->Session->setFlash(__('The Eyecolor has been saved.', 'default', array(
                    'class' => 'success'
                )));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The Eyecolor could not be saved. Please, try again.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
                
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'Eyecolor.' . $this->Eyecolor->primaryKey => $id
                )
            );
            $this->request->data = $this->Eyecolor->find('first', $options);
        }
    }
    
    
    
}