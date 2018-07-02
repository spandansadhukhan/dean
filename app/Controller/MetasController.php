<?php
App::uses('AppController', 'Controller');
/**
 * Metas Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class MetasController extends AppController
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
            //$conditions['Meta.is_admin']=1;
            $conditions['Meta.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'title') {
                        $conditions["Meta.title LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "is_active") {
                                if ($value == "Yes") {
                                    $conditions['Meta.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['Meta.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Meta.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Meta.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Meta.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Meta.id desc";
                    } else {
                        $order_by = "Meta.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "Meta.id desc";
        }
        //$condition1=array('Meta.is_admin !=' => 1,'Meta.user_type' => 'E','Meta.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_meta    = $this->Meta->find('count');
        $active_meta   = $this->Meta->find('count', array(
            "conditions" => array(
                "Meta.is_active" => 1
            )
        ));
        $inactive_meta = $this->Meta->find('count', array(
            "conditions" => array(
                "Meta.is_active" => 0
            )
        ));
        $metas         = $this->Paginator->paginate('Meta');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('metas', 'total_meta', 'active_meta', "inactive_meta", "ad_types"));
    }
    
    public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->Meta->delete($content);
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
        $title_for_layout = 'Meta View';
        if (!$this->Meta->exists($id)) {
            throw new NotFoundException(__('Invalid Meta'));
        }
        $options = array(
            'conditions' => array(
                'Meta.' . $this->Meta->primaryKey => $id
            )
        );
        $content = $this->Meta->find('first', $options);
        $status=$content["Meta"]["is_active"] == 1 ? 'Active' : 'Inactive';
        $out     = "<tr>";
        $out .= "<td>Id</td>";
        $out .= "<td>" . $content["Meta"]["id"] . "</td>";
        $out .= "</tr>";
        $out .= "<tr>";
        $out .= "<td>Title</td>";
        $out .= "<td>" . $content["Meta"]["title"] . "</td>";
        $out .= "</tr>";
        
        $out .= "<tr>";
        $out .= "<td>Keyword</td>";
        $out .= "<td>" . $content["Meta"]["keyword"] . " </td>";
        $out .= "</tr>";
        
        $out .= "<tr>";
        $out .= "<td>Description</td>";
        $out .= "<td>" . $content["Meta"]["description"] . " </td>";
        $out .= "</tr>";
        
        $out .= "<tr>";
        $out .= "<td>URL</td>";
        $out .= "<td>" . $content["Meta"]["url"] . " </td>";
        $out .= "</tr>";
        
        $out .= "<tr>";
        $out .= "<td>Add Date</td>";
        $out .= "<td>" . date("Y-m-d", strtotime($content["Meta"]["posttime"])) . "</td>";
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
        $this->Meta->id = $id;
        
        if (!$this->Meta->exists()) {
            throw new NotFoundException(__('Invalid meta'));
        }
        if ($this->Meta->delete($id)) {
            $this->Session->setFlash('The meta has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The meta could not be deleted. Please, try again.'));
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
                    $this->Meta->id = $content;
                    $this->Meta->saveField('is_active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All content activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All content Deactivated successfully.', 'default', array(
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
            $this->Meta->id = $id;
            $this->Meta->saveField('is_active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Meta activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Meta Deactivated successfully.', 'default', array(
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
            $this->Meta->create();
            $this->request->data["Meta"]["posttime"] = date("Y-m-d H:i:s");
            if ($this->Meta->save($this->request->data)) {
                $this->Session->setFlash(__('The Meta has been saved.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The Meta could not be saved. Please, try again.'));
            }
        }
        
    }
    public function admin_edit($id = null)
    {
        $userid = $this->Session->read('userid');
        if (!isset($userid) && $userid == '') {
            $this->redirect('/admin');
        }
        if (!$this->Meta->exists($id)) {
            throw new NotFoundException(__('Invalid Meta'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            if ($this->Meta->save($this->request->data)) {
                $this->Session->setFlash(__('The Meta has been saved.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
            } else {
                $this->Session->setFlash(__('The Meta could not be saved. Please, try again.'));
                return $this->redirect(array(
                    'action' => 'index'
                ));
                
            }
        } else {
            $options             = array(
                'conditions' => array(
                    'Meta.' . $this->Meta->primaryKey => $id
                )
            );
            $this->request->data = $this->Meta->find('first', $options);
        }
    }
    
    
    
}