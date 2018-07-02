<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class CreditsController extends AppController {

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
		$title_for_layout = 'Credit List';
		$this->Credit->recursive = 0;
		$this->set('credits', $this->Paginator->paginate('Credit'));
		$this->set(compact('title_for_layout'));
	}
	
	public function admin_addpackage() {	
			
		$title_for_layout = 'Credit Add';
		if ($this->request->is('post')) {
			$options = array('conditions' => array('Credit.credit_number'  => $this->request->data['Credit']['credit_number']));
			$name = $this->Credit->find('first', $options);
			if(!$name){
			$this->request->data['Credit']['created_on'] = date('Y-m-d');
			$this->request->data['Credit']['status'] = 1;
				$this->Credit->create();
				if ($this->Credit->save($this->request->data)) {
					$this->Session->setFlash(__('The Credit has been saved.'));
					return $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The Credit could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The Credit name already exists. Please, try again.'));
			}
		}
		$this->set(compact('title_for_layout'));
	}
	
	public function admin_packageview($id = null) {			
		$title_for_layout = 'Credit View';
		$this->set(compact('title_for_layout'));
		if (!$this->Credit->exists($id)) {
			throw new NotFoundException(__('Invalid Credit'));
		}
		$options = array('conditions' => array('Credit.' . $this->Credit->primaryKey => $id));
		$creditview = $this->Credit->find('first', $options);
		if($creditview['Credit']['status']=='0'){
		    $status = 'Inactive';
		}
		else{
		    $status = 'Active';
		}
		if($creditview['Credit']['is_discount']=='0'){
		    $is_discount = 'No';
		    $discount = 'N/A';
		    $application_cost = $creditview['Credit']['cost'];
		}
		else{
		    $is_discount = 'Yes';
		    $discount = $creditview['Credit']['discount'].'%';
		    $application_cost = $creditview['Credit']['cost'] - (($creditview['Credit']['cost']*$creditview['Credit']['discount'])/100);
		}

		$data = '<tr><td style="width:75%;">Id</td><td>'.$creditview['Credit']['id'].'</td></tr>'
			. '<tr><td>No Of Credit</td><td>'.$creditview['Credit']['credit_number'].' credits'.'</td></tr>'
			. '<tr><td>Total Cost</td><td>'.$creditview['Credit']['cost'].' AUD'.'</td></tr>'
			. '<tr><td>Is Discount</td><td>'.$is_discount.'</td></tr>'
			. '<tr><td>Discount Percent</td><td>'.$discount.'</td></tr>'
			. '<tr><td>Application Cost</td><td>'.$application_cost.' AUD'.'</td></tr>'
			. '<tr><td>Status</td><td>'.$status.'</td></tr>';
		//pr($user);exit;
		echo $data;exit;
		
	}
	
	public function admin_edit($id = null) {
		//echo $id;exit;
		if (!$this->Credit->exists($id)) {
			throw new NotFoundException(__('Invalid Credit'));
		}
		if ($this->request->is(array('post', 'put'))) {
			//echo "hello";exit;
			//pr($this->request->data);exit;
			if($this->request->data['Credit']['is_discount']==0){
				$this->request->data['Credit']['discount'] = '0';
			}
			//$options = array('conditions' => array('Credit.id'  => $this->request->data['Credit']['id']));
			//$name = $this->Credit->find('first', $options);
			//if(!$name){
				//echo "hello";exit;
				
				if ($this->Credit->save($this->request->data)) {
					$this->Session->setFlash(__('The Credit has been saved.'));
				} else {
					$this->Session->setFlash(__('The Credit could not be saved. Please, try again.'));
				}
			//}
			/* else {
				$this->Session->setFlash(__('The Credit already exists. Please, try again.'));
			}*/
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('Credit.' . $this->Credit->primaryKey => $id));
			$this->request->data = $this->Credit->find('first', $options);
			
			//print_r($this->request->data);
		}
	}
	
	public function admin_credit_status($id=null){
	    if(!empty($id)){
		$this->Credit->id = $id;
		if (!$this->Credit->exists()) {
			throw new NotFoundException(__('Invalid Credit'));
		}
		else{
		    $options = array('conditions' => array('Credit.' . $this->Credit->primaryKey => $id));
		    $userdetail = $this->Credit->find('first', $options);
		    if($userdetail['Credit']['status']==1){
			$arr = array();
			$arr['Credit']['id'] = $id;
			$arr['Credit']['status'] = 0;
			if($this->User->Save($arr)){
			    $this->Session->setFlash(__('Status of selected record changed successfully', 'default', array('class' => 'success')));
			}
		    }
		    else if($userdetail['Credit']['status']==0){
			$arr = array();
			$arr['Credit']['id'] = $id;
			$arr['Credit']['status'] = 1;
			if($this->Credit->Save($arr)){
			    $this->Session->setFlash(__('Status of selected record changed successfully.', 'default', array('class' => 'success')));  
			}
		    }
		    return $this->redirect(array('controller'=>'credits','action'=>'index'));
		}
            }
	}

	public function admin_delete($id = null) {
            $userid = $this->Session->read('userid');
            if(!isset($userid) && $userid==''){
               $this->redirect('/admin');
            }
		$this->Credit->id = $id;
		if (!$this->Credit->exists()) {
			throw new NotFoundException(__('Invalid Credit'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Credit->delete()) {
			$this->Session->setFlash(__('The Credit has been deleted.'));
		} else {
			$this->Session->setFlash(__('The Credit could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	

	public function admin_creditsetting() {	
		$this->loadModel('Creditsetting');
		$title_for_layout = 'Credit Settings';
	$id = 1;
		if (!$this->Creditsetting->exists($id)) {
			throw new NotFoundException(__('Invalid Creditsetting'));
		}
		if ($this->request->is(array('post', 'put'))) {
		//pr($this->request->data);exit;	
				if ($this->Creditsetting->save($this->request->data)) {
					$this->Session->setFlash(__('The Credit Setting has been saved.'));
				} else {
					$this->Session->setFlash(__('The Credit Setting could not be saved. Please, try again.'));
				}
			//}
			/* else {
				$this->Session->setFlash(__('The Credit already exists. Please, try again.'));
			}*/
		} else {
			//echo "hello";exit;
			$options = array('conditions' => array('Creditsetting.id' =>1));
			$this->request->data = $this->Creditsetting->find('first', $options);
			//pr($this->request->data);exit;
			//print_r($this->request->data);
		}
	}


	public function admin_ruleoption_list() {
		$this->loadModel('RuleOption');
		//echo "hello";exit;		
		$title_for_layout = 'Rule Option List';
		$this->RuleOption->recursive = 0;
		$this->set('ruleoptions', $this->Paginator->paginate('RuleOption'));
		$option=
		//$this->loadModel('Rule');
	   //$rules = $this->Rule->find('all',array('conditions'=>array('Rule.id'=>'RuleOption.rule_id'))));
		$this->set(compact('title_for_layout','rules'));
	}
	
	public function admin_ruleoption_add() {	
      $this->loadModel('RuleOption');				
		$title_for_layout = 'Rule Option Add';
		if ($this->request->is('post')) {
			$options = array('conditions' => array('RuleOption.option_name'  => $this->request->data['RuleOption']['option_name']));
			$name = $this->RuleOption->find('first', $options);
			if(!$name){
				//print_r($this->request->data);exit;
				$this->RuleOption->create();
				if ($this->RuleOption->save($this->request->data)) {
					$this->Session->setFlash(__('The rule option has been saved.'));
					return $this->redirect(array('action' => 'ruleoption_list'));
				} else {
					$this->Session->setFlash(__('The rule option could not be saved. Please, try again.'));
				}
			} else {
				$this->Session->setFlash(__('The rule option name already exists. Please, try again.'));
			}
		}
		 $this->loadModel('Rule');
	    $rules = $this->Rule->find('all',array('conditions'=>array('Rule.active'=>1),'order'=>array('Rule.name'=>'ASC')));
		$this->set(compact('title_for_layout','rules'));
	}
	
	
	public function admin_ruleoption_view($id = null) {
		//echo "hello";exit;
		 $this->loadModel('RuleOption');	
		$title_for_layout = 'Ruleoption View';
		if (!$this->RuleOption->exists($id)) {
			throw new NotFoundException(__('Invalid option'));
		}
		$options = array('conditions' => array('RuleOption.' . $this->RuleOption->primaryKey => $id));
		$option = $this->RuleOption->find('first', $options);
		
		if($option){
			//echo "hello";exit;
			$this->loadModel('Rule');		
			$options1 = array('conditions' => array('Rule.id' => $option['RuleOption']['rule_id']));
			$rule = $this->Rule->find('first', $options1);
			//$options2 = array('conditions' => array('Rule.id' => $product['Listing']['sub_category_id']));
			//$subcategoryname = $this->Category->find('first', $options2);
			//print_r($categoryname);exit;
			#pr($categoryname);
			//if($categoryname){
				//$categoryname = $categoryname[$category['Category']['parent_id']];
			//} else {
				//$categoryname = '';
			//}
		}
		$this->set(compact('title_for_layout','option','rule'));
	}
	
	public function admin_ruleoption_edit($id = null) {
		//echo $id;exit;
		$this->loadModel('RuleOption');	
		if (!$this->RuleOption->exists($id)) {
			throw new NotFoundException(__('Invalid rule'));
		}
		if ($this->request->is(array('post', 'put'))) {
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
			
			//$option=$this->RuleOption->find('first', $options);
         $this->loadModel('Rule');
         $rules = $this->Rule->find('list',array('conditions'=>array('Rule.active'=>1),'order'=>array('Rule.name'=>'ASC')));
         $this->set(compact('rules','option'));
			
			print_r($this->request->data);
		}
	}
	
	public function admin_ruleoption_delete($id = null) {
		$this->RuleOption->id = $id;
		if (!$this->RuleOption->exists()) {
			throw new NotFoundException(__('Invalid rule option'));
		}
		$this->request->onlyAllow('post', 'delete');
		$options = array('conditions' => array('RuleOption.id' => $id));
		$cat = $this->RuleOption->find('list', $options);
		#pr($cat);
		#exit;
		if($cat){
			foreach($cat as $k=>$v){
				$options1 = array('conditions' => array('RuleOption.id' => $k));
				$subcat = $this->RuleOption->find('list', $options1);
				if($subcat){
					foreach($subcat as $k1=>$v1){
						$this->Rule->delete($k1);
					}
				}
				$this->RuleOption->delete($k);
			}
		}
		if ($this->RuleOption->delete($id)) {
			
			$this->Session->setFlash(__('The rule has been deleted.'));
		} else {
			$this->Session->setFlash(__('The rule has been deleted.'));
		}
		return $this->redirect(array('action' => 'ruleoption_list'));
	}



	
}
