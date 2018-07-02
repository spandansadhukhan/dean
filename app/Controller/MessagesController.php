<?php
App::uses('AppController', 'Controller');
/**
 * Messages Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class MessagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index','admin_index','admin_bulkdelete','admin_view',"admin_delete","admin_reply");
    }   

	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	


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
            //$conditions['Message.is_admin']=1;
            $conditions['Message.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'title') {
                        $conditions["Message.title LIKE"] =urldecode('%' . $value) . '%';
                    }else {
                        if ($param_name != 'advace_search_type') {
                            if($param_name=="is_read")
                            {
                                if($value=="Yes")
                                {
                                    $conditions['Message.' . $param_name] = urldecode(1);
                                }
                                else
                                {
                                    $conditions['Message.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    } 

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Message.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Message.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Message.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Message.id desc";
                    } else {
                        $order_by = "Message.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Message.id desc";
        }
        //$condition1=array('Message.is_admin !=' => 1,'Message.user_type' => 'E','Message.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_message= $this->Message->find('count');
        $read_message = $this->Message->find('count',array("conditions"=>array("Message.is_read"=>1)));
        $unread_message = $this->Message->find('count',array("conditions"=>array("Message.is_read"=>0)));
        $messages = $this->Paginator->paginate('Message');
        $ad_types=array("Yes"=>"Yes","No"=>"No");
        //pr($advertisements);exit;
        $this->set(compact('messages', 'total_message','read_message',"unread_message","ad_types"));
    }
    
         public function admin_bulkdelete($id = null) 
        {
        if ($this->request->is(array('post', 'put'))) 
        {
            try {
                foreach ($this->request->data["content_id"] as $content)
                {
                    $this->Message->delete($content);
                }   
                echo "1";           
            } catch (Exception $ex) {
                print_r($ex);    
            }
            

        }
            exit;     
   }
         
        public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Message View';
            if (!$this->Message->exists($id)) {
                    throw new NotFoundException(__('Invalid Message'));
            }
            $options = array('conditions' => array('Message.' . $this->Message->primaryKey => $id));
            $content = $this->Message->find('first', $options);
            $out="<tr>";
            $out.="<td>Id</td>";
            $out.="<td>".$content["Message"]["id"]."</td>";
            $out.="</tr>";
            $out.="<tr>";
            $out.="<td>Subject</td>";
            $out.="<td>".$content["Message"]["title"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Message</td>";
            $out.="<td>".$content["Message"]["message"]." </td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Sender</td>";
            $out.="<td>".$content["FromUser"]["name"]." </td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Sender Email</td>";
            $out.="<td>".$content["FromUser"]["email"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Receiver</td>";
            $out.="<td>".$content["User"]["name"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Receiver Email</td>";
            $out.="<td>".$content["User"]["email"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Add Date</td>";
            $out.="<td>".date("Y-m-d",strtotime($content["Message"]["posttime"]))."</td>";
            $out.="</tr>";
            
           $data=array("Ack"=>1,"html"=>$out);
            
            echo json_encode($data);exit;
            

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
	

	public function admin_delete($id = null) {
        $this->Message->id = $id;

        if (!$this->Message->exists()) {
            throw new NotFoundException(__('Invalid message'));
        }
        if ($this->Message->delete($id)) {
            $this->Session->setFlash('The message has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The message could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }


}
