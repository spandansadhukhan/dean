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
                    $this->Session->setFlash('Your Contact Request send successfully.', 'default', array('class' => 'success'));
                    return $this->redirect(array('action' => 'index'));
                }
            }
	}


	public function admin_index() {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
            $title_for_layout = 'Content List';
            $this->Content->recursive = 0;
            $this->set('contents', $this->Paginator->paginate());
            $this->set(compact('title_for_layout'));
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
            $this->set(compact('title_for_layout','content'));
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

}
