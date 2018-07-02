<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class BlogsController extends AppController
{
    
    /**
     * Components
     *
     * @var array
     */
    public $components = array('Paginator');
    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow("admin_activeblog","delete","edit","index",'admin_index', 'admin_add', 'admin_view', 'admin_edit', 'admin_delete', 'admin_features','admin_addblog','admin_blogcategorylist','admin_activeblogcat','admin_deleteblogcat');
    }
    
    /**
     * index method
     *
     * @return void
     */
    /*public function admin_index() {
    $this->Category->recursive = 0;
    $this->set('rules', $this->Paginator->paginate());
    }*/
    public function admin_index()
    {
        $title_for_layout          = 'Blog List';
        $this->Blog->recursive     = 0;
        $this->Paginator->settings = array(
            "order" => "Blog.id desc"
        );
          $total_blog = $this->Blog->find('count');
          $total_active_blog = $this->Blog->find('count',array('conditions' => array('Blog.admin_approve' => 1)));
          $total_inactive_blog = $this->Blog->find('count',array('conditions' => array('Blog.admin_approve' => 0)));
        $this->set('blogs', $this->Paginator->paginate('Blog'));
        $this->set(compact('title_for_layout'));
        $this->set(compact('total_blog','total_active_blog','total_inactive_blog'));
    }
    
    
    
    
  
    function index()
    {
        $userid=$this->Session->read('userid');
        if ($this->request->is('post')) {
            $name       = $this->request->data["Blog"]["name"];
            $check_name = $this->Blog->find("count", array(
                "conditions" => array(
                    "Blog.name" => $name
                )
            ));
            if (!$check_name) {
                $this->request->data['Blog']['user_id'] = $this->Session->read('userid');
                $this->request->data['Blog']['post_date'] = date('Y-m-d');
                if (!empty($this->request->data['Blog']['image']['name'])) {
                    $pathpart       = pathinfo($this->request->data['Blog']['image']['name']);
                    $ext            = $pathpart['extension'];
                    $extensionValid = array(
                        'jpg',
                        'jpeg',
                        'png',
                        'gif'
                    );
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder  = "blog_images";
                        $uploadPath    = WWW_ROOT . $uploadFolder;
                        $filename      = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['Blog']['image']['tmp_name'], $full_flg_path);
                        $this->request->data['Blog']['image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        $this->redirect(Router::url($this->referer(), true));
                    }
                }
                if ($this->Blog->save($this->request->data)) {
                    $this->Session->setFlash('The blog has been saved', 'default', array(
                        'class' => 'success'
                    ));
                    $this->redirect(Router::url($this->referer(), true));
                    
                }
            }
            
            else {
                $this->Session->setFlash(__('Blog Title already exists. Please, try another.', 'default', array(
                    'class' => 'error'
                )));
                $this->redirect(Router::url($this->referer(), true));
            }
            
            
            
        }
        
        else
        {
            $this->Paginator->settings=array(
            "order"=>"Blog.id desc",
            "conditions"=>array("Blog.user_id"=>$userid)   
            );
            $blogs=$this->Paginator->paginate("Blog");
            
            
            
        }
        $this->set(compact('blogs'));
        
    }
    
     function edit($id)
    {
        $userid=$this->Session->read('userid');
        if ($this->request->is('post')) {
            $name       = $this->request->data["Blog"]["name"];
            $check_name = $this->Blog->find("count", array(
                "conditions" => array(
                    "Blog.name" => $name,
                    "Blog.id !="=>$id
                )
            ));
            if (!$check_name) {
                if (!empty($this->request->data['Blog']['image']['name'])) {
                    $pathpart       = pathinfo($this->request->data['Blog']['image']['name']);
                    $ext            = $pathpart['extension'];
                    $extensionValid = array(
                        'jpg',
                        'jpeg',
                        'png',
                        'gif'
                    );
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder  = "blog_images";
                        $uploadPath    = WWW_ROOT . $uploadFolder;
                        $filename      = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['Blog']['image']['tmp_name'], $full_flg_path);
                        $this->request->data['Blog']['image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        $this->redirect(Router::url($this->referer(), true));
                    }
                }
                else
                {
                    $this->request->data['Blog']['image'] = $this->request->data['Blog']['hide_img'];

                }
                if ($this->Blog->save($this->request->data)) {
                    $this->Session->setFlash('The blog has been saved', 'default', array(
                        'class' => 'success'
                    ));
                    $this->redirect(Router::url($this->referer(), true));
                    
                }
            }
            
            else {
                $this->Session->setFlash(__('Blog Title already exists. Please, try another.', 'default', array(
                    'class' => 'error'
                )));
                $this->redirect(Router::url($this->referer(), true));
            }
            
            
            
        }
        
        else
        {
            
            $this->request->data=$this->Blog->find("first",array("conditions"=>array("Blog.id"=>$id)));
            
            
            
        }
        
    }
    
    public function admin_view($id = null)
    {
        $this->loadModel('Blog');
        //echo $id;exit;
        
        if (!$this->Blog->exists($id)) {
            throw new NotFoundException(__('Invalid service'));
        }
        $options = array(
            'conditions' => array(
                'Blog.' . $this->Blog->primaryKey => $id
            ),
            'fields'=>array("Blog.name","Blog.contaent","Blog.image")
        );
        $blog=$this->Blog->find('first', $options);
        if(!empty($blog["Blog"]["image"]))
        {
            $blog["Blog"]["image"]=Configure::read('SITE_URL')."blog_images/".$blog["Blog"]["image"];
        }

        echo json_encode($blog["Blog"]);exit;
        
    }
   /* public function admin_edit($id = null)
    {
        //echo $id;exit;
        $this->loadModel('Blog');
        if (!$this->Blog->exists($id)) {
            throw new NotFoundException(__('Invalid service'));
        }
        if ($this->request->is(array(
            'post',
            'put'
        ))) {
            
            $options = array(
                'conditions' => array(
                    'Blog.name' => $this->request->data['Blog']['name'],
                    'Blog.id <>' => $id
                )
            );
            $name    = $this->Blog->find('first', $options);
            if (!$name) {
                //echo "hello";exit;
                if ($this->Blog->save($this->request->data)) {
                    $this->Session->setFlash(__('The category has been saved', 'default', array(
                        'class' => 'success'
                    )));
                } else {
                    $this->Session->setFlash(__('The category could not be saved. Please, try again.', 'default', array(
                        'class' => 'error'
                    )));
                }
            } else {
                $this->Session->setFlash(__('The category name already exists. Please, try again.', 'default', array(
                    'class' => 'error'
                )));
            }
        } else {
            //echo "hello";exit;
            $options             = array(
                'conditions' => array(
                    'Blog.' . $this->Blog->primaryKey => $id
                )
            );
            $this->request->data = $this->Blog->find('first', $options);
            
            //print_r($this->request->data);
        }
    }*/
    
    public function admin_delete($id = null)
    {
        $this->loadModel('Blog');
        $this->Blog->id = $id;
        
        if (!$this->Blog->exists()) {
            throw new NotFoundException(__('Invalid Blog'));
        }
        if ($this->Blog->delete($id)) {
            $this->Session->setFlash('The Blog has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The Blog could not be deleted. Please, try again.'));
        }
        return $this->redirect(array(
            'action' => 'index'
        ));
    }
    
     public function delete($id = null)
    {
        $this->loadModel('Blog');
        $this->Blog->id = $id;
        if (!$this->Blog->exists()) {
            throw new NotFoundException(__('Invalid service'));
        }
        if ($this->Blog->delete($id)) {
            $this->Session->setFlash('The blog has been deleted', 'default', array(
                'class' => 'success'
            ));
        } else {
            $this->Session->setFlash(__('The blog could not be deleted. Please, try again.'));
        }
        return $this->redirect(array(
            'action' => 'index'
        ));
    }
    function admin_activeblog($id,$status)
    {
        $this->Blog->id = $id;
        if($this->Blog->saveField('admin_approve', $status))
        {
            $this->redirect(array("action"=>"index"));        
        }
        exit;
    }
    
    
    
    
     public function admin_addblog() {

        $this->loadModel("Blog");
        //$this->loadModel("State");
        //$this->loadModel("City");
        if ($this->request->is('post')) {
            $this->Blog->create();
            
    
                if (!empty($this->request->data['Blog']['image']['name'])) {
                    $pathpart = pathinfo($this->request->data['Blog']['image']['name']);
                    $ext = $pathpart['extension'];
                    $extensionValid = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array(strtolower($ext), $extensionValid)) {
                        $uploadFolder = "blog_images";
                        $uploadPath = WWW_ROOT . $uploadFolder;
                        $filename = uniqid() . '.' . $ext;
                        $full_flg_path = $uploadPath . '/' . $filename;
                        move_uploaded_file($this->request->data['Blog']['image']['tmp_name'], $full_flg_path);
                        $this->request->data['Blog']['image'] = $filename;
                    } else {
                        $this->Session->setFlash(__('Invalid image type.'));
                        return $this->redirect(array('action' => 'index'));
                    }
                } else {
                    $this->request->data['Blog']['image'] = '';
                }

                

                $this->request->data['Blog']['admin_approve'] = 1;
                //pr($this->request->data);exit;
                if ($this->Blog->save($this->request->data)) {

                    $this->Session->setFlash('The Blog has been saved.', 'default', array('class' => 'success'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Session->setFlash(__('The Blog could not be saved. Please, try again.'));
                }
            
        }
       
        
    }
    
    public function admin_blogcategorylist() {	
        
        $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
                $this->loadModel("BlogCategory");
		$title_for_layout = 'BlogCategory List';
                
                
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
                        $conditions['BlogCategory.name LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {

                            $conditions['BlogCategory.' . $param_name] = urldecode($value);
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "BlogCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "BlogCategory.id desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "BlogCategory.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "BlogCategory.id desc";
                    } else {
                        $order_by = "BlogCategory.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }
                
                
                
                
		$this->BlogCategory->recursive = 0;
                $this->Paginator->settings=array(
                'conditions' => ($conditions),
                "order"=>"BlogCategory.id desc"    
                );
		$this->set('classcategories', $this->Paginator->paginate('BlogCategory'));
                $total_category = $this->BlogCategory->find('count');
                $total_active_category = $this->BlogCategory->find('count', array('conditions' => array('BlogCategory.status'=>1)));
                $total_inactive_category = $this->BlogCategory->find('count', array('conditions' => array('BlogCategory.status'=>0)));
		$this->set(compact('title_for_layout','total_category','total_active_category','total_inactive_category'));
	}
    
        
        
        
        public function admin_activeblogcat($id = null) {
            
            $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }

        $this->loadModel("BlogCategory");
        $checkuser = $this->BlogCategory->find('first', array('conditions' => array('BlogCategory.id' => $id)));
        if ($checkuser['BlogCategory']['status'] == 1) {
            $status = 0;
        } elseif ($checkuser['BlogCategory']['status'] == 0) {
            $status = 1;
        }

        $this->BlogCategory->updateAll(array('BlogCategory.status' => "'$status'"), array('BlogCategory.id' => $id));
        $this->redirect(array('action' => 'blogcategorylist'));
    }
        
        
     public function admin_deleteblogcat($id = null) 
{
         
         $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
    $this->loadModel('BlogCategory');
    $this->BlogCategory->id = $id;
    
    if (!$this->BlogCategory->exists()) 
    {
        throw new NotFoundException(__('Invalid service'));
    }
    if ($this->BlogCategory->delete($id)) 
    {
        $this->Session->setFlash('The category has been deleted', 'default', array('class' => 'success'));
    } else 
    {
        $this->Session->setFlash(__('The category could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'blogcategorylist'));
} 


        public function admin_add() {
            
            $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
            
	$this->loadModel('BlogCategory');
   
    if ($this->request->is('post')) { 
    //echo "hello";exit;
        $options = array('conditions' => array('BlogCategory.name'  => $this->request->data['BlogCategory']['name']));
        
        
        $serviceexists = $this->BlogCategory->find('first', $options);
        if(!$serviceexists)
        {
            //echo "hello";exit;
         $this->request->data['BlogCategory']['name'];
         $this->request->data['BlogCategory']['add_date']=date('Y-m-d H:i:s');
         
         $this->BlogCategory->create();
         if ($this->BlogCategory->save($this->request->data)) 
          {
            $this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
            return $this->redirect(array('action' => 'blogcategorylist'));
          } 
          else 
          {
            $this->Session->setFlash(__('The category could not be saved. Please, try again.', 'default', array('class' => 'error')));
          }
         
      }
      else {
        
            $this->Session->setFlash(__('BlogCategory already exists. Please, try another.', 'default', array('class' => 'error')));
        }  
    }
    
}


    public function admin_edit($id = null) {
        
        
		$userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
	    $this->loadModel('BlogCategory');
		if (!$this->BlogCategory->exists($id)) {
			throw new NotFoundException(__('Invalid service'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			$options = array('conditions' => array('BlogCategory.name'  => $this->request->data['BlogCategory']['name'], 'BlogCategory.id <>'=>$id));
			$name = $this->BlogCategory->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->BlogCategory->save($this->request->data)) {
					$this->Session->setFlash('The category has been saved', 'default', array('class' => 'success'));
                                        return $this->redirect(array('action' => 'blogcategorylist'));
				} else {
					$this->Session->setFlash(__('The category could not be saved. Please, try again.', array('class' => 'error')));
				}
			} else {
				$this->Session->setFlash(__('The category name already exists. Please, try again.', array('class' => 'error')));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('BlogCategory.' . $this->BlogCategory->primaryKey => $id));
			$this->request->data = $this->BlogCategory->find('first', $options);
			
			//print_r($this->request->data);
		}
	}




    
}