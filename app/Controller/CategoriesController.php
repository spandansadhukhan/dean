<?php
App::uses('AppController', 'Controller');
/**
 * Privacies Controller
 *
 * @property Privacy $Privacy
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

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
	public function index() {
            	$this->Category->recursive = 0;
		$this->set('categories', $this->Paginator->paginate());
	}

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
            //$conditions['Category.is_admin']=1;
            $conditions['Category.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array(
                    'page',
                    'sort',
                    'direction',
                    'limit'
                ))) {
                    if ($param_name == 'title') {
                        $conditions["Category.title LIKE"] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if ($param_name == "active") {
                                if ($value == "Yes") {
                                    $conditions['Category.' . $param_name] = urldecode(1);
                                } else {
                                    $conditions['Category.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }
                    
                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Category.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Category.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Category.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Category.id desc";
                    } else {
                        $order_by = "Category.id desc";
                    }
                    if (isset($direction) and !empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }
                    
                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
        
        if (!isset($order_by)) {
            $order_by = "Category.id desc";
        }
        
        //$condition1=array('Category.is_admin !=' => 1,'Category.user_type' => 'E','Category.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );
        
        $total_category    = $this->Category->find('count');
        $listcategories         = $this->Paginator->paginate('Category');
        $ad_types      = array(
            "Yes" => "Yes",
            "No" => "No"
        );
        //pr($advertisements);exit;
        $this->set(compact('listcategories', 'total_category', 'active_meta', "inactive_meta", "ad_types"));
    }
    
        public function admin_bulkdelete($id = null)
    {
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            try {
                foreach ($this->request->data["content_id"] as $content) {
                    $this->Category->delete($content);
                }
                echo "1";
            }
            catch (Exception $ex) {
                print_r($ex);
            }
            
            
        }
        exit;
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
                    $this->Category->id = $content;
                    $this->Category->saveField('active', $status);
                }
                
                if ($status == 1) {
                    $this->Session->setFlash(__('All category activated successfully.', 'default', array(
                        'class' => 'success'
                    )));
                    
                } else {
                    $this->Session->setFlash(__('All category Deactivated successfully.', 'default', array(
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
            $this->Category->id = $id;
            $this->Category->saveField('active', $status);
            if ($status == 1) {
                $this->Session->setFlash(__('Category activated successfully.', 'default', array(
                    'class' => 'success'
                )));
                
            } else {
                $this->Session->setFlash(__('Category Deactivated successfully.', 'default', array(
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
    
    

	public function admin_subcategories($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Sub Category List';
            $options = array('conditions' => array('Category.id' => $id));
            $categoryname = $this->Category->find('list', $options);
            if($categoryname){
                    $categoryname = $categoryname[$id];
            } else {
                    $categoryname = '';
            }
            $this->Category->recursive = 0;
            $this->set('categories_list', $this->Paginator->paginate('Category', array('Category.parent_id' => $id)));
            $this->set(compact('title_for_layout','categoryname','id'));
	}
	
	public function admin_exportsub($id = null)
	{
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){
		   $this->redirect('/admin');
		}
		$categories = $this->Category->find('all');
		
		$output = '';
		$output .='Name, Status';
		$output .="\n";

		if(!empty($categories))
		{
			foreach($categories as $category)
			{	
				$isactive = ($category['Category']['active']==1?'Active':'Inactive');
			   
				$output .='"'.$category['Category']['name'].'","'.$isactive.'"';
				$output .="\n";
			}
		}
		$filename = "categories".time().".csv";
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
	public function view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            if (!$this->Category->exists($id)) {
                    throw new NotFoundException(__('Invalid Category'));
            }
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $this->set('category', $this->Category->find('first', $options));
	}

	public function admin_view($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Category View';
            if (!$this->Category->exists($id)) {
                    throw new NotFoundException(__('Invalid Category'));
            }
            $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
            $content = $this->Category->find('first', $options);
            $status=$content["Category"]["active"] == 1 ? 'Active' : 'Inactive';
            $out     = "<tr>";
            $out    .= "<td>Category Name</td>";
            $out    .= "<td>" . $content["Category"]["id"] . "</td>";
            $out    .= "</tr>";
            $out    .= "<tr>";
            $out    .= "<td>Category Description</td>";
            $out    .= "<td>" . $content["Category"]["description"] . "</td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Category Meta Title</td>";
            $out    .= "<td>" . $content["Category"]["meta_title"] . " </td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Category Meta Keywords</td>";
            $out    .= "<td>" . $content["Category"]["meta_keywords"] . " </td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Category Meta Description</td>";
            $out    .= "<td>" . $content["Category"]["meta_descriptions"] . " </td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Add Date</td>";
            $out    .= "<td>" . date("Y-m-d", strtotime($content["Category"]["posttime"])) . "</td>";
            $out    .= "</tr>";
        
            $out    .= "<tr>";
            $out    .= "<td>Status</td>";
            $out    .= "<td>" .$status. "</td>";
            $out    .= "</tr>";
            echo $out;
        
     
        exit;
            
            
            
            
            
            $this->set(compact('title_for_layout','category','categoryname'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
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

	public function admin_add() {	
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Category Add';
            if ($this->request->is('post')) {
                    $options = array('conditions' => array('Category.name'  => $this->request->data['Category']['name']));
                    $name = $this->Category->find('first', $options);
                    if(!$name){
                        
                        if(!empty($this->request->data['Category']['image']['name'])){
					$pathpart=pathinfo($this->request->data['Category']['image']['name']);
					$ext=$pathpart['extension'];
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array(strtolower($ext),$extensionValid)){
					$uploadFolder = "img/cat_img";
					$uploadPath = WWW_ROOT . $uploadFolder;	
					$filename =uniqid().'.'.$ext;
					$full_flg_path = $uploadPath . '/' . $filename;
					move_uploaded_file($this->request->data['Category']['image']['tmp_name'],$full_flg_path);
					$this->request->data['Category']['image'] = $filename;
					}
					else{
					$this->Session->setFlash(__('Invalid image type.'));
					return $this->redirect(array('action' => 'index'));	
					}
					}
                                        else{
                                        $filename='';    
                                        }
                        
                             $this->request->data["Category"]["posttime"]=date("Y-m-d H:i:s");           
                            $this->Category->create();
                            if ($this->Category->save($this->request->data)) {
                                     $this->Session->setFlash(__('The category has been saved successfully.', 'default', array(
                    'class' => 'success'
                )));
                                    
                                    return $this->redirect(array('action' => 'index'));
                            } else {
                                    $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
                            }
                    } else {
                            $this->Session->setFlash(__('The category name already exists. Please, try again.'));
                    }
            }
            $this->set(compact('parents','title_for_layout'));
	}


	public function admin_addsubcategory($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Sub Category Add';
            if ($this->request->is('post')) {
                    $options = array('conditions' => array('Category.name'  => $this->request->data['Category']['name'], 'Category.parent_id'=>$this->request->data['Category']['parent_id']));
                    $name = $this->Category->find('first', $options);
                    if(!$name){
                            $this->Category->create();
                            if ($this->Category->save($this->request->data)) {
                                    $this->Session->setFlash(__('The sub category has been saved.'));
                                    return $this->redirect(array('action' => 'subcategories',$id));
                            } else {
                                    $this->Session->setFlash(__('The sub category could not be saved. Please, try again.'));
                            }
                    } else {
                            $this->Session->setFlash(__('The sub category name already exists. Please, try again.'));
                    }
            }
            $options = array('conditions' => array('Category.id' => $id));
            $categoryname = $this->Category->find('list', $options);
            if($categoryname){
                    $categoryname = $categoryname[$id];
            } else {
                    $categoryname = '';
            }		
            $this->set(compact('title_for_layout','categoryname','id'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
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
		//echo $id;exit;
            if (!$this->Category->exists($id)) {
                    throw new NotFoundException(__('Invalid category'));
            }
            if ($this->request->is(array('post', 'put'))) {
                    //echo "hello";exit;
                    $options = array('conditions' => array('Category.name'  => $this->request->data['Category']['name'], 'Category.parent_id'=>$this->request->data['Category']['parent_id'], 'Category.id <>'=>$id));
                    $name = $this->Category->find('first', $options);
                    
                    if(!$name){
                            //echo "hello";exit;
                        
                        
                        
                            if ($this->Category->save($this->request->data)) {
                                
                                $this->Session->setFlash(__('The category has been saved successfully.', 'default', array(
                    'class' => 'success'
                )));
                                
                    } else {
                                    $this->Session->setFlash(__('The category could not be saved. Please, try again.'));
                            }
                    } else {
                            $this->Session->setFlash(__('The category already exists. Please, try again.'));
                    }
            } else {
                    //echo "hello";exit;
                    $is_parent=$this->Category->find('count',array('conditions'=>array('Category.parent_id'=>0,'Category.id'=>$id)));
                    $options = array('conditions' => array('Category.' . $this->Category->primaryKey => $id));
                    $this->request->data = $this->Category->find('first', $options);

                    //print_r($this->request->data);
            }
            $this->set(compact('is_parent'));
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
	
}
