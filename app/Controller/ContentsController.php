<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class ContentsController extends AppController {

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
        $this->Auth->allow('admin_index','admin_edit','admin_view',"admin_bulk_active","admin_changestatus");
    }


	public function index() {
		$this->Content->recursive = 0;
		$this->set('content', $this->Paginator->paginate());
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
            //$conditions['Content.is_admin']=1;
            $conditions['Content.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'page_heading') {
                        $conditions['Content.page_heading LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if($param_name=="is_active")
                            {
                                if($value=="Yes")
                                {
                                    $conditions['Content.' . $param_name] = urldecode(1);
                                }
                                else
                                {
                                    $conditions['Content.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Content.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Content.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Content.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Content.id desc";
                    } else {
                        $order_by = "Content.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Content.id desc";
        }
        //$condition1=array('Content.is_admin !=' => 1,'Content.user_type' => 'E','Content.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_page = $this->Content->find('count');
        $active_page = $this->Content->find('count',array("conditions"=>array("Content.is_active"=>1)));
        $inactive_page = $this->Content->find('count',array("conditions"=>array("Content.is_active"=>0)));
        $contents = $this->Paginator->paginate('Content');
        $ad_types=array("Yes"=>"Yes","No"=>"No");
        //pr($advertisements);exit;
        $this->set(compact('contents', 'total_page','active_page',"inactive_page","ad_types"));
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

	public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Content View';
            if (!$this->Content->exists($id)) {
                    throw new NotFoundException(__('Invalid Content'));
            }
            $options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
            $content = $this->Content->find('first', $options);
            $out="<tr>";
            $out.="<td>Page Name</td>";
            $out.="<td>".$content["Content"]["page_name"]."</td>";
            $out.="</tr>";
            $out.="<tr>";
            $out.="<td>Page Content</td>";
            $out.="<td>".$content["Content"]["content"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Meta Title</td>";
            $out.="<td>".$content["Content"]["meta_title"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Meta Keywords</td>";
            $out.="<td>".$content["Content"]["meta_keywords"]."</td>";
            $out.="</tr>";
            
            $out.="<tr>";
            $out.="<td>Meta Description</td>";
            $out.="<td>".$content["Content"]["meta_descriptions"]."</td>";
            $out.="</tr>";
            echo $out;exit;
            

	}

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
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $this->Category->id = $id;
            if (!$this->Category->exists()) {
                    throw new NotFoundException(__('Invalid category'));
            }
            $this->request->onlyAllow('post', 'delete');
            $options = array('conditions' => array('Category.parent_id' => $id));
            $cat = $this->Category->find('list', $options);
            #pr($cat);
            #exit;
            if($cat){
                    foreach($cat as $k=>$v){
                            $options1 = array('conditions' => array('Category.parent_id' => $k));
                            $subcat = $this->Category->find('list', $options1);
                            if($subcat){
                                    foreach($subcat as $k1=>$v1){
                                            $this->Category->delete($k1);
                                    }
                            }
                            $this->Category->delete($k);
                    }
            }
            if ($this->Category->delete($id)) {
                    $this->Session->setFlash(__('The category has been deleted.'));
            } else {
                    $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
            }
            return $this->redirect(array('action' => 'index'));
	}
        
        function admin_listfaqs()
        {
            $this->loadModel('Faq');
            $faqs=$this->Faq->find('all');
            $this->set(compact('faqs'));
        }
        
        function  admin_addfaq()
        {
         $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            
            if ($this->request->is(array('post', 'put'))) {
                    if ($this->Content->save($this->request->data)) {
                            $this->Session->setFlash(__('The Faq has been saved.'));
                    } else {
                            $this->Session->setFlash(__('The Faq could not be saved. Please, try again.'));
                    }
            }  
        }
        
        function admin_bulk_active()
        {
        if ($this->request->is(array('post', 'put'))) 
        {
            try {
                $status=$this->request->data["status"];
                foreach ($this->request->data["content_id"] as $content)
                {
                    $this->Content->id = $content;
                    $this->Content->saveField('is_active', $status);
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
                $this->Content->id = $id;
                $this->Content->saveField('is_active', $status);
                if($status==1)
                {
                  $this->Session->setFlash(__('Content activated successfully.', 'default', array('class' => 'success')));

                }
                else{
                  $this->Session->setFlash(__('Content Deactivated successfully.', 'default', array('class' => 'success')));
                }   
                $this->redirect(array("action"=>"index"));
                
            } catch (Exception $ex) {
                print_r($ex);  
                exit;
            }
            

        }
      

}
