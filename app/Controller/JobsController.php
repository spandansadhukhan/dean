<?php

App::uses('AppController', 'Controller');

/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class JobsController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow();
    }

    /**
     * index method
     *
     * @return void
     */
    
    public function admin_index() {

        $this->loadModel("User");
        $this->loadModel("Job");
        $this->User->recursive = 0;


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
                        $conditions['Job.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['Job.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Job.posted_date asc";
                    } else if ($direction == 'New') {
                        $order_by = "Job.posted_date desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Job.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Job.id desc";
                    } else {
                        $order_by = "Job.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Job.id desc";
        }
        
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

       
        $users = $this->Paginator->paginate('Job');
         $total_job = $this->Job->find('count');
        $total_active_job = $this->Job->find('count', array('conditions' => array('Job.status'=>1)));
        $total_inactive_job = $this->Job->find('count', array('conditions' => array('Job.status'=>0)));
//echo $total_inactive_job;exit;
        //pr($users);exit;
        $this->set(compact('users', 'total_job','total_active_job','total_inactive_job'));
    }
    
    
    
 public function admin_jobactive($id = null) {

        $this->loadModel("Job");
        $checkuser = $this->Job->find('first', array('conditions' => array('Job.id' => $id)));
        if ($checkuser['Job']['status'] == 1) {
            $status = 0;
        } elseif ($checkuser['Job']['status'] == 0) {
            $status = 1;
        }

        $this->Job->updateAll(array('Job.status' => "'$status'"), array('Job.id' => $id));
        $this->redirect(array('action' => 'index'));
    }
   
    
   public function admin_view($id = null) {

       
        $this->loadModel('User');
        $this->loadModel('Job');
        $options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
        $user = $this->Job->find('first', $options);

        if ($user['Job']['status'] == 0) {
            $status = 'Inactive';
        } else {
            $status = 'Active';
        }
        if ($user['User']['is_email_verified'] == '1') {
            $emailVerify = 'Verified';
        } else {
            $emailVerify = 'Not verified';
        }
       

        
        $data = '<tr><td style="width:55%;">Id</td><td>' . $user['Job']['id'] . '</td></tr>'
                . '<tr><td>Posted By</td><td>' . $user['User']['name'] . '</td></tr>'
                . '<tr><td>Job name</td><td>' . $user['Job']['name'] . '</td></tr>'
                . '<tr><td>Description</td><td>' . $user['Job']['job_description'] . '</td></tr>'
                . '<tr><td>Is Mail Verified</td><td>' . $emailVerify . '</td></tr>'
                . '<tr><td>Profile Status</td><td>' . $status . '</td></tr>';
        
        
        echo $data;
        exit;
        
    }
    
    
    public function admin_jobdelete($id = null) {
        
        //echo "sp";exit;
        $this->loadModel("Job");
        $this->Job->id = $id;
        
        if (!$this->Job->exists()) {
            throw new NotFoundException(__('Invalid user.'));
        }
        if ($this->Job->delete($id)) {
           $this->Session->setFlash('The Job has been deleted.', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The Job could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

}
