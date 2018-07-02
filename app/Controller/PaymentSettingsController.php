<?php
App::uses('AppController', 'Controller');
/**
 * SiteSettings Controller
 *
 * @property Privacy $Privacy
 * @property PaginatorComponent $Paginator
 */
class PaymentSettingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index','admin_edit','admin_paymentstatus','admin_paymentcard','admin_paymentdirect','admin_directpayment');
    }
	

	/*public function index() {
                $userid = $this->Session->read('userid');
                if(!isset($userid) && $userid=='')
                {
	           $this->redirect('/admin');
                }
		$this->SiteSetting->recursive = 0;
		$this->set('sitesettings', $this->Paginator->paginate());
	}*/

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	

	public function admin_index() {
            
            $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }

		$payment=$this->PaymentSetting->find('first', array('conditions'=>array('PaymentSetting.id' =>1)));
		$this->set(compact('payment'));

}


public function admin_paymentstatus($stat = null)
{
        $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
	if($stat==1)
	{
		$status=0;
		$this->PaymentSetting->updateAll(array('PaymentSetting.pay_through_credit' => "'$status'"),array('PaymentSetting.id' => 1));
	}
	else
	{

		$status=1;
		$this->PaymentSetting->updateAll(array('PaymentSetting.pay_through_credit' => "'$status'"),array('PaymentSetting.id' => 1));

	}	

	return $this->redirect(array('action' => 'index'));
	
}

public function admin_paymentcard($stat = null)
{
    $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
	if($stat==1)
	{
		$status=0;
		$this->PaymentSetting->updateAll(array('PaymentSetting.pay_through_credit_cards' => "'$status'"),array('PaymentSetting.id' => 1));
	}
	else
	{

		$status=1;
		$this->PaymentSetting->updateAll(array('PaymentSetting.pay_through_credit_cards' => "'$status'"),array('PaymentSetting.id' => 1));

	}	

	return $this->redirect(array('action' => 'index'));
	
}

public function admin_paymentdirect($stat = null)
{

        $userid = $this->Session->read('userid');
		if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
                
	if($stat==1)
	{
		$status=0;
		$this->PaymentSetting->updateAll(array('PaymentSetting.direct_payment' => "'$status'"),array('PaymentSetting.id' => 1));
	}
	else
	{

		$status=1;
		$this->PaymentSetting->updateAll(array('PaymentSetting.direct_payment' => "'$status'"),array('PaymentSetting.id' => 1));

	}	

	return $this->redirect(array('action' => 'index'));
	
}


public function admin_directpayment() 
{
    
    $userid = $this->Session->read('userid');
    if(!isset($userid) && $userid==''){ $this->redirect('/admin'); }
                
     $id=$_REQUEST['hid_id'];
     $payment_details=$_REQUEST['direct_payment_details'];
    if ($this->request->is('post')) {

    $this->PaymentSetting->updateAll(array('PaymentSetting.direct_payment_details' => "'$payment_details'"),array('PaymentSetting.id' => $id));
    return $this->redirect(array('action' => 'index'));

    }


}

}