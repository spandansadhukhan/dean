<?php
App::uses('AppController', 'Controller');
/**
 * Contacts Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class ContactsController extends AppController {

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
	public function index() {
            if ($this->request->is('post')) {
                //pr($this->request->data); exit;

                $this->Contact->create();

                if ($this->Contact->save($this->request->data)) {
                    //pr($this->request->data); exit;
                        $msg_body = 'Hi ' . $this->request->data['name'] . '<br/><br/>Thank you for contacting. Our Team will get back you soon<br/><br/>Thanks,<br/>The Directory';
                        App::uses('CakeEmail', 'Network/Email');
                        $Email = new CakeEmail();

                        // pass user input to function
                        $adminEmail = 'info@thedirectory.com';
                        $Email->emailFormat('both');
                        $Email->from(array($adminEmail => 'TheDirectory'));
                        $Email->to($this->request->data['email']);
                        $Email->subject('Thank You From The Directory');
                        $Email->send($msg_body);


                    $this->Session->setFlash('Your Contact Request send successfully.', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
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
            //$conditions['Contact.is_admin']=1;
            $conditions['Contact.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'name') {
                        $conditions["OR"] =array( "Contact.name LIKE "=>urldecode('%' . $value) . '%',"Contact.subject LIKE"=>urldecode('%' . $value).'%');
                    } 

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Contact.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Contact.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Contact.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Contact.id desc";
                    } else {
                        $order_by = "Contact.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Contact.id desc";
        }
        //$condition1=array('Contact.is_admin !=' => 1,'Contact.user_type' => 'E','Contact.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_contact= $this->Contact->find('count');
        $read_contact = $this->Contact->find('count',array("conditions"=>array("Contact.is_seen"=>1)));
        $unread_contact = $this->Contact->find('count',array("conditions"=>array("Contact.is_seen"=>0)));
        $contacts = $this->Paginator->paginate('Contact');
        $ad_types=array("Yes"=>"Yes","No"=>"No");
        //pr($advertisements);exit;
        $this->set(compact('contacts', 'total_contact','read_contact',"unread_contact","ad_types"));
    }
    
         public function admin_bulkdelete($id = null) 
        {
        if ($this->request->is(array('post', 'put'))) 
        {
            try {
                foreach ($this->request->data["content_id"] as $content)
                {
                    $this->Contact->delete($content);
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
            $title_for_layout = 'Contact View';
            if (!$this->Contact->exists($id)) {
                    throw new NotFoundException(__('Invalid Contact'));
            }
            $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
            $content = $this->Contact->find('first', $options);
            $out="<tr>";
            $out.="<td>Id</td>";
            $out.="<td>".$content["Contact"]["id"]."</td>";
            $out.="</tr>";
            $out.="<tr>";
            $out.="<td>Name</td>";
            $out.="<td>".$content["Contact"]["name"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Email</td>";
            $out.="<td>".$content["Contact"]["email"]." </td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Subject</td>";
            $out.="<td>".$content["Contact"]["subject"]." </td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Contact Number</td>";
            $out.="<td>".$content["Contact"]["phone"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Message</td>";
            $out.="<td>".$content["Contact"]["message"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Add Date</td>";
            $out.="<td>".date("Y-m-d",strtotime($content["Contact"]["posttime"]))."</td>";
            $out.="</tr>";
            $this->Contact->id = $id;
            $this->Contact->saveField('is_seen', 1);
           $read_contact = $this->Contact->find('count',array("conditions"=>array("Contact.is_seen"=>1)));
           $unread_contact = $this->Contact->find('count',array("conditions"=>array("Contact.is_seen"=>0)));
           $data=array("Ack"=>1,"html"=>$out,"read_contact"=>$read_contact,"unread_contact"=>$unread_contact);
            
            echo json_encode($data);exit;
            

	}
        
        function admin_reply()
        {
            
            if ($this->request->is('post')) {
            $messae_id=$this->request->data["messae_id"];    
            $contact=$this->Contact->find("first",array("conditions"=>array("Contact.id"=>$messae_id)));    
            $msg_body ="Hi,".$contact["Contact"]["name"]."<br>";
            $msg_body.="Admin Reply on Your Inquiry".'<br>';
            $msg_body.="Please see the message below".'<br>';
            $msg_body.=$this->request->data["message"];
            App::uses('CakeEmail', 'Network/Email');
            $Email = new CakeEmail();
            // pass user input to function
            $adminEmail = 'info@thedirectory.com';
            $Email->emailFormat('both');
            $Email->from(array($adminEmail => 'TheDirectory'));
            $Email->to($contact["Contact"]["email"]);
            $Email->subject('ReplyFrom The Directory');
            $Email->send($msg_body);
            $this->Session->setFlash('Your Message send successfully', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'index'));
            }
            
            exit;
            
        }
   
    


	public function admin_export()
	{
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){
		   $this->redirect('/admin');
		}

		$contents = $this->Content->find('all');

		$output = '';
		$output .='Page Heading, Content';
		$output .="\n";

		if(!empty($contents))
		{
			foreach($contents as $content)
			{
				$output .='"'.html_entity_decode($content['Content']['page_heading']).'","'.strip_tags($content['Content']['content']).'"';
				$output .="\n";
			}
		}
		$filename = "contents".time().".csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		echo $output;
		exit;
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($page_name = null) {

            if(isset($page_name) && $page_name!=''){
                    $options = array('conditions' => array('Content.page_name' => $page_name));
                    $content = $this->Content->find('first', $options);
                    if($content){
                            $title_for_layout = $content['Content']['page_heading'];
                            $this->set(compact('title_for_layout','content'));
                    }
            } else {
                    throw new NotFoundException(__('Invalid Content'));
            }
	}

//	public function admin_view($id = null) {
//            $userid = $this->Session->read('userid');
//            if(!isset($userid) && $userid==''){
//               $this->redirect('/admin');
//            }
//            $title_for_layout = 'Content View';
//            if (!$this->Content->exists($id)) {
//                    throw new NotFoundException(__('Invalid Content'));
//            }
//            $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
//            $content = $this->Content->find('first', $options);
//            $this->set(compact('title_for_layout','content'));
//	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		}
		$users = $this->Category->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Invalid category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('The category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
			$this->request->data = $this->Category->find('first', $options);
		}
		$users = $this->Category->User->find('list');
		$this->set(compact('users'));
	}

	public function admin_edit($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            if (!$this->Content->exists($id)) {
                    throw new NotFoundException(__('Invalid content'));
            }
            if ($this->request->is(array('post', 'put'))) {
                    if ($this->Content->save($this->request->data)) {
                            $this->Session->setFlash(__('The content has been saved.'));
                    } else {
                            $this->Session->setFlash(__('The content could not be saved. Please, try again.'));
                    }
            } else {
                    $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
                    $this->request->data = $this->Content->find('first', $options);
            }
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Category->id = $id;
		if (!$this->Category->exists()) {
			throw new NotFoundException(__('Invalid category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Category->delete()) {
			$this->Session->setFlash(__('The category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function admin_delete($id = null) {
        $this->Contact->id = $id;

        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Invalid Inquiry'));
        }
        if ($this->Contact->delete($id)) {
            $this->Session->setFlash('The Inquiry has been deleted', 'default', array('class' => 'success'));
        } else {
            $this->Session->setFlash(__('The Inquiry could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }


}
