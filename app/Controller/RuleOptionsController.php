<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class RuleOptionsController extends AppController {

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
	/*public function admin_index() {
            	$this->Category->recursive = 0;
		$this->set('rules', $this->Paginator->paginate());
	}*/
	public function admin_index() {		
		$title_for_layout = 'Rule Option List';
		$this->RuleOption->recursive = 0;
		$this->set('rules', $this->Paginator->paginate('RuleOption'));
		$this->set(compact('title_for_layout'));
	}
	
	
	
	/*public function admin_ruleoption_list() {
		$this->loadModel('RuleOption');
		//echo "hello";exit;		
		$title_for_layout = 'Rule Option List';
		$this->RuleOption->recursive = 0;
		$this->set('ruleoptions', $this->Paginator->paginate('RuleOption'));
		$option=
		//$this->loadModel('Rule');
	   //$rules = $this->Rule->find('all',array('conditions'=>array('Rule.id'=>'RuleOption.rule_id'))));
		$this->set(compact('title_for_layout','rules'));
	}*/
	
	public function admin_add() {	
      $this->loadModel('RuleOption');				
		$title_for_layout = 'Rule Option Add';
		if ($this->request->is('post')) {
			$options = array('conditions' => array('RuleOption.option_name'  => $this->request->data['RuleOption']['option_name']));
			$name = $this->RuleOption->find('first', $options);
			if(!$name){
				//print_r($this->request->data);
				$this->RuleOption->create();
				if ($this->RuleOption->save($this->request->data)) {
					$this->Session->setFlash(__('The rule option has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The rule option could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The rule option name already exists. Please, try again.'));
			}
		}
		 $this->loadModel('Rule');
	    $rules = $this->Rule->find('list',array('conditions'=>array('Rule.active'=>1),'order'=>array('Rule.name'=>'ASC')));
		$this->set(compact('title_for_layout','rules'));
	}
	
	
	public function admin_view($id = null) {
		//echo "hello";exit;
		 $this->loadModel('RuleOption');
		$this->RuleOption->recursive = 1;
		$title_for_layout = 'Ruleoption View';
		if (!$this->RuleOption->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('RuleOption.' . $this->RuleOption->primaryKey => $id));
		$option = $this->RuleOption->find('first', $options);
		//pr($option);exit;
		if($option){
			//echo "hello";exit;
			$this->loadModel('Rule');		
			$options1 = array('conditions' => array('Rule.id' => $option['RuleOption']['rule_id']));
			$rule = $this->Rule->find('first', $options1);
			
		}
		$this->set(compact('title_for_layout','option','rule'));
	}
	
	public function admin_edit($id = null) {
		//echo $id;exit;
		$this->loadModel('Rule');
		$this->loadModel('RuleOption');	
		if (!$this->RuleOption->exists($id)) {
			throw new NotFoundException(__('Invalid rule'));
		}
		
         $rules = $this->Rule->find('list',array('conditions'=>array('Rule.active'=>1)));
         $this->set(compact('rules'));
		if ($this->request->is(array('post', 'put'))) {
//pr($this->request->data);exit;
			//echo "hello";exit;
			$options = array('conditions' => array('RuleOption.option_name'  => $this->request->data['RuleOption']['option_name'], 'RuleOption.id <>'=>$id));
			$name = $this->RuleOption->find('first', $options);
			if(!$name){
				//echo "hello";exit;
				if ($this->RuleOption->save($this->request->data)) {
					$this->Session->setFlash(__('The rule option has been saved.'));
				} else {
					$this->Session->setFlash(__('The rule option could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The rule option already exists. Please, try again.'));
			}
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('RuleOption.' . $this->RuleOption->primaryKey => $id));
			$this->request->data = $this->RuleOption->find('first', $options);
			//pr($this->request->data);exit;
			//$option=$this->RuleOption->find('first', $options);
         
			
			//print_r($this->request->data);
		}
	}
	
	public function admin_delete($id = null) {
		$this->loadModel('RuleOption');
		$this->RuleOption->id = $id;
		if (!$this->RuleOption->exists()) {
			throw new NotFoundException(__('Invalid rule option'));
		}
		$this->request->onlyAllow('post', 'delete');
		$options = array('conditions' => array('RuleOption.id' => $id));
		$cat = $this->RuleOption->find('first', $options);
		$rule_id=$cat['RuleOption']['rule_id'];
		$this->loadModel('Rule');	
		$this->RuleOption->id=$rule_id; 
		#pr($cat);
		#exit;
		/*if($cat){
			foreach($cat as $k=>$v){
				$options1 = array('conditions' => array('RuleOption.id' => $k));
				$subcat = $this->RuleOption->find('list', $options1);
				if($subcat){
					foreach($subcat as $k1=>$v1){
						$this->RuleOption->delete($k1);
					}
				}
				$this->RuleOption->delete($k);
			}
		}*/
		if ($this->RuleOption->delete($id)) {
			
			//$this->Rule->delete($rule_id);
			
			$this->Session->setFlash(__('The rule option has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rule option has been deleted.'));
		}
		return $this->redirect(array('action' => 'index'));
	}



	
}
