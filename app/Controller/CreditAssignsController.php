<?php
App::uses('AppController', 'Controller');
/**
 * Rules Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
 */
class CreditAssignsController extends AppController {

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
		$title_for_layout = 'Credit Assign List';
		$this->CreditAssign->recursive = 0;
		$this->set('credit_assigns', $this->Paginator->paginate('CreditAssign'));
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
	
	
	
	
}
?>
