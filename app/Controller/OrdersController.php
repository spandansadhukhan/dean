<?php

App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Session', 'RequestHandler', 'Paginator');
    var $uses = array('Order', 'OrderDetail', 'Shop', 'Country', 'User', 'Category', 'Attribute', 'AttributeItem', 'UserPaymentDetail', 'UserBillingAddress', 'UserCreditCard', 'Listing', 'ListAttribute', 'ListAttributeItem', 'ListTag', 'ListMaterial', 'ListDispatch', 'ListImage', 'ListFile', 'ShopSetting', 'ShopFollowing', 'SiteSetting', 'PartnershipDetail');

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        //$username = $this->Session->read('username');
        $userid = $this->Session->read('fuid');
        $countryname = '';
        if (!isset($userid)) {
            $this->redirect('/');
        }
        //$title_for_layout = 'Order History';
        $this->OrderDetail->recursive = 0;
        $orders = $this->Paginator->paginate('OrderDetail', array('OrderDetail.owner_id' => $userid));
        #pr($orders);
        $options = array('conditions' => array('User.username' => $username));
        $user = $this->User->find('first', $options);
        if ($user) {
            if (isset($user['User']['country']) && $user['User']['country'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $user['User']['country']), 'fields' => array('Country.printable_name')));
                $countryname = $countryname['Country']['printable_name'];
            }
        }
        $this->set(compact('orders', 'title_for_layout', 'user', 'countryname'));
    }

    public function purchased() {
        //$username = $this->Session->read('username');
        $userid = $this->Session->read('fuid');
        $countryname = '';
        if (!isset($userid)) {
            $this->redirect('/');
        }
       // $title_for_layout = 'Purchase History';
        $this->Order->recursive = 0;
        $this->Paginator->settings = array('order'=>array('Order.id'=>"DESC"));
        $orders = $this->Paginator->paginate('Order', array('Order.user_id' => $userid));
        #pr($orders);
        $options = array('conditions' => array('User.username' => $username));
        $user = $this->User->find('first', $options);
        if ($user) {
            if (isset($user['User']['country']) && $user['User']['country'] != 0) {
                $countryname = $this->Country->find('first', array('conditions' => array('Country.id' => $user['User']['country']), 'fields' => array('Country.printable_name')));
                $countryname = $countryname['Country']['printable_name'];
            }
        }
        $this->set(compact('orders', 'title_for_layout', 'user', 'countryname'));
    }

    public function admin_index() {
        $this->Order->recursive = 0;
        $this->Paginator->settings = array('order'=>array('Order.id'=>"DESC"));
        $orders = $this->Paginator->paginate();
        #pr($orders);
        $this->set(compact('orders'));
    }



    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Order->exists($id)) {
            throw new NotFoundException(__('Invalid order'));
        }
        $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
        $this->set('order', $this->Order->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    // public function add() {
    //     if ($this->request->is('post')) {
    //         $this->Order->create();
    //         if ($this->Order->save($this->request->data)) {
    //             $this->Session->setFlash(__('The order has been saved.'));
    //             return $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
    //         }
    //     }
    //     $users = $this->Order->User->find('list');
    //     $this->set(compact('users'));
    // }

    // /**
    //  * edit method
    //  *
    //  * @throws NotFoundException
    //  * @param string $id
    //  * @return void
    //  */
    // public function edit($id = null) {
    //     if (!$this->Order->exists($id)) {
    //         throw new NotFoundException(__('Invalid order'));
    //     }
    //     if ($this->request->is(array('post', 'put'))) {
    //         if ($this->Order->save($this->request->data)) {
    //             $this->Session->setFlash(__('The order has been saved.'));
    //             return $this->redirect(array('action' => 'index'));
    //         } else {
    //             $this->Session->setFlash(__('The order could not be saved. Please, try again.'));
    //         }
    //     } else {
    //         $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $id));
    //         $this->request->data = $this->Order->find('first', $options);
    //     }
    //     $users = $this->Order->User->find('list');
    //     $this->set(compact('users'));
    // }

    // /**
    //  * delete method
    //  *
    //  * @throws NotFoundException
    //  * @param string $id
    //  * @return void
    //  */
    // public function delete($id = null) {
    //     $this->Order->id = $id;
    //     if (!$this->Order->exists()) {
    //         throw new NotFoundException(__('Invalid order'));
    //     }
    //     $this->request->onlyAllow('post', 'delete');
    //     if ($this->Order->delete()) {
    //         $this->Session->setFlash(__('The order has been deleted.'));
    //     } else {
    //         $this->Session->setFlash(__('The order could not be deleted. Please, try again.'));
    //     }
    //     return $this->redirect(array('action' => 'index'));
    // }

    // public function getUsername($id = null) {
    //     $username = '';
    //     if ($id != '') {
    //         $userName = $this->User->find('first', array('conditions' => array('User.id' => $id), 'fields' => array('User.first_name', 'User.last_name')));
    //         if ($userName) {
    //             $username = $userName['User']['first_name'] . ' ' . $userName['User']['last_name'];
    //         }
    //     }
    //     return $username;
    // }

    // public function confirm() {

    //     date_default_timezone_set("GMT");

    //     $userid = $this->Session->read('userid');
    //     $username = $this->Session->read('username');
    //     if (!isset($userid)) {
    //         return $this->redirect('/');
    //     }
    //     #print_r($_POST);
    //     #exit;
    //     if (isset($_POST['txn_id']) && $_POST['txn_id'] != '') {
    //         $this->request->data['Order']['user_id'] = $userid;
    //         $this->request->data['Order']['total_amount'] = $_POST['payment_gross'];
    //         $this->request->data['Order']['order_date'] = date('Y-m-d');
    //         $this->request->data['Order']['transaction_id'] = $_POST['txn_id'];
    //         $this->request->data['Order']['payment_date'] = date('Y-m-d H:i:s');
    //         $this->Order->create();
    //         if ($this->Order->save($this->request->data)) {
    //             if ($this->Session->check('Cart')) {
    //                 $this->Session->delete('Cart');
    //             }
    //             $orderId = $this->Order->getLastInsertId();
    //             $custom = $_POST['custom'];
    //             if ($custom != '') {
    //                 $lists = explode('@@@@', $custom);
    //                 #pr($lists);
    //                 if ($lists) {
    //                     foreach ($lists as $list) {
    //                         if ($list != '') {
    //                             #echo 'hii';
    //                             $listId = explode('_', $list);
    //                             #pr($listId);
    //                             if (!empty($listId)) {
    //                                 $options = array('conditions' => array('Listing.id' => $listId[0]));
    //                                 $listing = $this->Listing->find('first', $options);
    //                                 if ($listing) {
    //                                     $data['OrderDetail']['order_id'] = $orderId;
    //                                     $data['OrderDetail']['list_id'] = $listing['Listing']['id'];
    //                                     $data['OrderDetail']['shop_id'] = $listing['Listing']['shop_id'];
    //                                     $data['OrderDetail']['owner_id'] = $listing['Listing']['user_id'];
    //                                     $data['OrderDetail']['price'] = $listing['Listing']['price'];
    //                                     $data['OrderDetail']['quantity'] = $listId[1];
    //                                     $data['OrderDetail']['shipping_cost'] = $listing['Listing']['shipping_cost'];
    //                                     $data['OrderDetail']['amount'] = ($listId[1] * $listing['Listing']['price']) + $listing['Listing']['shipping_cost'];
    //                                     $data['OrderDetail']['order_status'] = 'U';
    //                                     $data['OrderDetail']['delivery_date'] = '0000-00-00';
    //                                     $this->OrderDetail->create();
    //                                     $this->OrderDetail->save($data);

    //                                     /*                                         * **** */
    //                                     $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email')));
    //                                     if ($contact_email) {
    //                                         $adminEmail = $contact_email['SiteSetting']['contact_email'];
    //                                     } else {
    //                                         $adminEmail = 'superadmin@shopsfit.com';
    //                                     }

    //                                     $options = array('conditions' => array('User.id' => $listing['Listing']['user_id']));
    //                                     $shopOwner = $this->User->find('first', $options);
    //                                     #pr($lastInsetred);
    //                                     $link = 'http://shopsfit.com/order_details/index/' . base64_encode($orderId);
    //                                     $msg_body = 'Hi ' . $shopOwner['User']['first_name'] . '<br/><br/>You have received a new Order. The Order Id is ' . $orderId . '. Please Login to your dashborad and click on the link below to view the Order details.<br/> <a href="' . $link . '">Click Here</a><br/><br/>Thanks,<br/>ShopsFit';

    //                                     App::uses('CakeEmail', 'Network/Email');

    //                                     $Email = new CakeEmail();

    //                                     /* pass user input to function */
    //                                     $Email->emailFormat('both');
    //                                     $Email->from(array($adminEmail => 'ShopsFit'));
    //                                     $Email->to($shopOwner['User']['email']);
    //                                     $Email->subject('ShopsFit New Order Received');
    //                                     $Email->send($msg_body);
    //                                     /*                                         * **** */

    //                                     $data1['Listing']['id'] = $listing['Listing']['id'];
    //                                     $data1['Listing']['quantity'] = $listing['Listing']['quantity'] - $listId[1];
    //                                     $this->Listing->save($data1);
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //                 $options = array('conditions' => array('User.id' => $userid));
    //                 $orderBy = $this->User->find('first', $options);
    //                 /*                     * *Email TO Admin*** */
    //                 $link = 'http://shopsfit.com/admin/order_details/index/' . $orderId;
    //                 $msg_body = 'Hi Admin,<br/><br/>ShopsFit has received a new Order. The Order Id is ' . $orderId . '. Please Login to admin panel and click on the link below to view the Order details.<br/> <a href="' . $link . '">Click Here</a><br/><br/>Thanks,<br/>ShopsFit';
    //                 App::uses('CakeEmail', 'Network/Email');
    //                 $Email = new CakeEmail();
    //                 /* pass user input to function */
    //                 $Email->emailFormat('both');
    //                 $Email->from(array($orderBy['User']['email'] => 'ShopsFit'));
    //                 $Email->to($adminEmail);
    //                 $Email->subject('ShopsFit New Order Received');
    //                 $Email->send($msg_body);
    //                 /*                     * *Email TO Admin*** */

    //                 /*                     * *Email TO User*** */
    //                 $msg_body1 = 'Hi ' . $orderBy['User']['first_name'] . ',<br/><br/>Your Order has been successfully placed. You will receive email once your Order is shipped.<br/><br/>Thanks,<br/>ShopsFit';
    //                 App::uses('CakeEmail', 'Network/Email');
    //                 $Email = new CakeEmail();
    //                 /* pass user input to function */
    //                 $Email->emailFormat('both');
    //                 $Email->from(array($adminEmail => 'ShopsFit'));
    //                 $Email->to($orderBy['User']['email']);
    //                 $Email->subject('ShopsFit Order Placed');
    //                 $Email->send($msg_body1);
    //                 /*                     * *Email TO User*** */
    //             }
    //             #exit;
    //             $this->Session->setFlash(__('The order has been placed successfully.'));
    //             return $this->redirect(array('controller' => 'users', 'action' => 'index'));
    //         } else {
    //             $this->Session->setFlash(__('The order could not be placed. Please, try again.'));
    //             return $this->redirect(array('controller' => 'users', 'action' => 'index'));
    //         }
    //     } else {
    //         $this->Session->setFlash(__('The order could not be placed. Please, try again.'));
    //         return $this->redirect(array('controller' => 'users', 'action' => 'index'));
    //     }
    // }

    // public function cancel() {
    //     $this->Session->setFlash(__('The order could not be placed. Please, try again.'));
    //     return $this->redirect(array('controller' => 'users', 'action' => 'index'));
    // }

    // public function admin_paynow($order_id = null) {
    //     $this->Order->id = $order_id;
    //     if (!$this->Order->exists()) {
    //         throw new NotFoundException(__('Invalid order'));
    //     }
    //     $settings = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1)));
    //     #pr($settings);
    //     $Item = array();
    //     $MPItems = array();
    //     $i = 0;
    //     $has_partner = false;
    //     $this->Order->recursive = -1;
    //     $options = array('conditions' => array('Order.' . $this->Order->primaryKey => $order_id));
    //     $order = $this->Order->find('first', $options);
    //     if ($order) {
    //         $this->User->recursive = -1;
    //         $options = array('conditions' => array('User.id' => $order['Order']['user_id']), 'fields' => array('User.referrer_id'));
    //         $referrer = $this->User->find('first', $options);
    //         if ($referrer) {
    //             #pr($referrer);
    //             #$this->User->recursive = -1;
    //             $options = array('conditions' => array('User.id' => $referrer['User']['referrer_id'], 'User.is_active' => 1, 'User.is_partner' => 1), 'fields' => array('User.id', 'User.is_partner', 'User.is_active', 'User.partnership_start_date', 'User.partnership_end_date'));
    //             $partnersDetails = $this->User->find('first', $options);
    //             #pr($partnersDetails);
    //             if ($partnersDetails) {
    //                 if ($partnersDetails['User']['partnership_end_date'] >= $order['Order']['payment_date']) {
    //                     $has_partner = true;
    //                 }
    //             }
    //         }

    //         $partner_commission = 0.00;
    //         $this->OrderDetail->recursive = -1;
    //         $options = array('conditions' => array('OrderDetail.order_id' => $order_id));
    //         $orderDetails = $this->OrderDetail->find('all', $options);
    //         #pr($orderDetails);
    //         if ($orderDetails) {
    //             foreach ($orderDetails as $data) {
    //                 $this->UserPaymentDetail->recursive = -1;
    //                 $options = array('conditions' => array('UserPaymentDetail.user_id' => $data['OrderDetail']['owner_id']));
    //                 $userPaymentdetail = $this->UserPaymentDetail->find('first', $options);
    //                 if ($userPaymentdetail) {
    //                     if ($has_partner == true) {
    //                         $admin_commission = ((($data['OrderDetail']['amount']) * ($settings['SiteSetting']['admin_percentage'])) / 100);
    //                         $price_paid = ($data['OrderDetail']['amount'] - $admin_commission);

    //                         $partner_commission = $partner_commission + ((($data['OrderDetail']['amount']) * ($settings['SiteSetting']['partner_percentage'])) / 100);
    //                     } else {
    //                         $admin_commission = ((($data['OrderDetail']['amount']) * ($settings['SiteSetting']['admin_percentage'])) / 100);
    //                         $price_paid = ($data['OrderDetail']['amount'] - $admin_commission);
    //                     }
    //                     $Item[$i] = array(
    //                         'l_email' => $userPaymentdetail['UserPaymentDetail']['paypal_email'],
    //                         'l_receiverid' => '',
    //                         'l_amt' => $price_paid,
    //                         'l_uniqueid' => $userPaymentdetail['UserPaymentDetail']['user_id'],
    //                         'l_note' => 'ShopOwner_' . $order_id
    //                     );
    //                     $i++;
    //                 }
    //             }
    //         }
    //         if ($has_partner == true) {
    //             $this->UserPaymentDetail->recursive = -1;
    //             $options = array('conditions' => array('UserPaymentDetail.user_id' => $partnersDetails['User']['id']));
    //             $partnerPaymentdetail = $this->UserPaymentDetail->find('first', $options);
    //             if ($partnerPaymentdetail) {
    //                 #pr($partnerPaymentdetail);
    //                 $count = count($Item);
    //                 $Item[$count] = array(
    //                     'l_email' => $partnerPaymentdetail['UserPaymentDetail']['paypal_email'],
    //                     'l_receiverid' => '',
    //                     'l_amt' => $partner_commission,
    //                     'l_uniqueid' => $partnerPaymentdetail['UserPaymentDetail']['user_id'],
    //                     'l_note' => 'Partner_' . $order_id
    //                 );
    //             }
    //         }
    //         #pr($Item);
    //         $MPItems = $Item;
    //     }
    //     #pr($order);
    //     $this->set(compact('settings', 'order', 'orderDetails', 'MPItems'));
    // }

    // public function admin_payments($payments = null) {
    //     $PayPalResult = base64_decode($payments);
    //     $PayPalResult = unserialize($PayPalResult);
    //     #pr($PayPalResult);
    //     $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email')));
    //     if ($contact_email) {
    //         $adminEmail = $contact_email['SiteSetting']['contact_email'];
    //     } else {
    //         $adminEmail = 'superadmin@shopsfit.com';
    //     }
    //     if ($PayPalResult) {
    //         if ($PayPalResult['ACK'] == 'Success') {
    //             $i = 0;
    //             for ($i = 0; $i < 15; $i++) {
    //                 if (isset($PayPalResult['REQUESTDATA']['L_EMAIL' . $i])) {
    //                     $order = explode('_', $PayPalResult['REQUESTDATA']['L_NOTE' . $i]);
    //                     if ($order) {
    //                         $orderId = $order[1];
    //                         $note = $order[0];
    //                     } else {
    //                         $orderId = 0;
    //                         $note = '';
    //                     }
    //                     $options = array('conditions' => array('User.id' => $PayPalResult['REQUESTDATA']['L_UNIQUEID' . $i]));
    //                     $userDetails = $this->User->find('first', $options);
    //                     if ($userDetails) {
    //                         $this->request->data['PartnershipDetail']['user_id'] = $PayPalResult['REQUESTDATA']['L_UNIQUEID' . $i];
    //                         $this->request->data['PartnershipDetail']['order_id'] = $orderId;
    //                         $this->request->data['PartnershipDetail']['amount_received'] = $PayPalResult['REQUESTDATA']['L_AMT' . $i];
    //                         $this->request->data['PartnershipDetail']['payment_type'] = $note;
    //                         $this->PartnershipDetail->create();
    //                         $this->PartnershipDetail->save($this->request->data);
    //                         if ($note == 'ShopOwner') {
    //                             $msg_body = 'Hi ' . $userDetails['User']['first_name'] . '<br/><br/>You just received a payment from ShopsFit of amount $' . $PayPalResult['REQUESTDATA']['L_AMT' . $i] . ' for <strong>Order Id ' . $orderId . '<strong> as the Shop Owner.<br/><br/>Thanks,<br/>ShopsFit';
    //                         } else {
    //                             $msg_body = 'Hi ' . $userDetails['User']['first_name'] . '<br/><br/>You just received a payment from ShopsFit of amount $' . $PayPalResult['REQUESTDATA']['L_AMT' . $i] . ' for <strong>Order Id ' . $orderId . '<strong> as the Partner.<br/><br/>Thanks,<br/>ShopsFit';
    //                         }
    //                         App::uses('CakeEmail', 'Network/Email');
    //                         $Email = new CakeEmail();
    //                         $Email->emailFormat('both');
    //                         $Email->from(array($adminEmail => 'ShopsFit'));
    //                         $Email->to($PayPalResult['REQUESTDATA']['L_EMAIL' . $i]);
    //                         $Email->subject('ShopsFit Payments Received');
    //                         $Email->send($msg_body);

    //                         $this->request->data['Order']['id'] = $orderId;
    //                         $this->request->data['Order']['admin_paid'] = 1;
    //                         $this->Order->save($this->request->data);
    //                     }
    //                 }
    //             }

    //             $this->Session->setFlash(__('Payment was done successfully.'));
    //             return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
    //         } else {
    //             $this->Session->setFlash(__('Sorry the payment was not successfully. Please, try again.'));
    //             return $this->redirect(array('controller' => 'orders', 'action' => 'index'));
    //         }
    //     }
    //     exit;
    // }

    // public function admin_cancelorder() {

    //     date_default_timezone_set("GMT");

    //     $title_for_layout = 'Public Profile';
    //     $countryname = '';
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/');
    //     }
    //     if (!$this->User->exists($userid)) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }

    //     $this->loadModel('OrderReturn');
    //     $this->loadModel('OrderDetail');
    //     $this->loadModel('Order');


    //     $this->OrderReturn->recursive = 2;
    //     //$options1 = array('conditions' => array('OrderReturn.owner_id' => $userid));
    //     //$myreturns = $this->OrderReturn->find('all', $options1);



    //     $conditions = array('OrderReturn.type' => 'Cancel');
    //     $this->Paginator->settings = array(
    //         'conditions' => $conditions,
    //         'order' => 'OrderReturn.id DESC',
    //         'limit' => 25
    //     );
    //     $myreturns = $this->Paginator->paginate('OrderReturn');
    //     //pr($myreturns);
    //     //exit;




    //     $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
    //     $myorders = $this->User->find('first', $options);

    //     $this->set(compact('title_for_layout', 'myorders', 'totalorders', 'myreturns'));
    // }

    // public function admin_pays() {
    //     $price = $this->request->data['Orders']['price'];
    //     $email = $this->request->data['Orders']['email'];

    //     //pr($this->request->data);
    //     //exit;

    //     $order_details_id = $this->request->data['Orders']['order_details_id'];

    //     $this->Session->write('orderdetailsidadmin', $order_details_id);

    //     $this->set(compact('price', 'email'));
    // }

    // public function admin_success() {

    //     date_default_timezone_set("GMT");

    //     $req = 'cmd=_notify-validate';
    //     foreach ($_POST as $key => $value) {
    //         $value = urlencode(stripslashes($value));
    //         $req .= "&$key=$value";
    //     }

    //     $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    //     $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    //     $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
    //     $fp = fsockopen('www.paypal.com', 80, $errno, $errstr, 30);



    //     if (!$fp) {
            
    //     } else {
    //         fputs($fp, $header . $req);
    //         $res = fgets($fp, 1024);

    //         //echo "<pre>";
    //         //print_r($_POST);
    //         //exit();

    //         if ($_POST['payment_status'] == "Completed" || $_POST['payment_status'] == "Pending") {



    //             $orderdetailsid = $this->Session->read('orderdetailsidadmin');

    //             $this->loadModel('OrderReturn');
    //             $this->loadModel('CancelRefund');
    //             $this->OrderReturn->recursive = 2;
    //             $options = array('conditions' => array('OrderReturn.order_details_id' => $orderdetailsid));
    //             $returnmyorders = $this->OrderReturn->find('first', $options);
    //             //pr($returnmyorders);
    //             //exit();

    //             $data['user_id'] = $returnmyorders['OrderReturn']['user_id'];
    //             $data['owner_id'] = $returnmyorders['OrderReturn']['owner_id'];
    //             $data['listing_id'] = $returnmyorders['OrderReturn']['listing_id'];
    //             $data['order_details_id'] = $returnmyorders['OrderReturn']['order_details_id'];
    //             $data['amount'] = $returnmyorders['OrderReturn']['price'];
    //             $data['quantity'] = $returnmyorders['OrderReturn']['quantity'];
    //             $data['payment_status'] = 1;
    //             $data['date'] = date("Y-m-d H:i:s");
    //             $data['transaction_id'] = $_POST['txn_id'];

    //             //pr($data);
    //             //exit;


    //             $this->CancelRefund->create();
    //             if ($this->CancelRefund->save($data)) {
    //                 $lastorderId = $this->CancelRefund->getLastInsertId();
    //             }

    //             $stat = 1;
    //             $this->OrderReturn->id = $returnmyorders['OrderReturn']['id'];
    //             $this->OrderReturn->saveField('payment_status', $stat);
    //         } else {
                
    //         }
    //     }
    //     if (strcmp($res, "INVALID") == 0) {
            
    //     }
    //     fclose($fp);

    //     $this->Session->delete('orderdetailsidadmin');
    // }

    // public function admin_failure() {
        
    // }

    // public function admin_setclaimdate() {

    //     date_default_timezone_set("GMT");

    //     $title_for_layout = 'Public Profile';
    //     $countryname = '';
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/');
    //     }
    //     if (!$this->User->exists($userid)) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }

    //     $this->loadModel('ClaimDate');

    //     if ($this->request->is(array('post', 'put'))) {

    //         $data['date_option1'] = $this->request->data['ClaimDate']['first_date'];
    //         $data['date_option2'] = $this->request->data['ClaimDate']['second_date'];
    //         $data['is_active'] = $this->request->data['ClaimDate']['is_active'];
    //         $data['id'] = $this->request->data['ClaimDate']['id'];

    //         //pr($data);
    //         //exit;

    //         $this->ClaimDate->create();
    //         if ($this->ClaimDate->save($data)) {
                
    //         }
    //     } else {
    //         $options = array('conditions' => array('ClaimDate.id' => 1));
    //         $alldata = $this->ClaimDate->find('first', $options);
    //         //pr($alldata);
    //         //exit;

    //         $this->request->data['ClaimDate']['first_date'] = $alldata['ClaimDate']['date_option1'];
    //         $this->request->data['ClaimDate']['second_date'] = $alldata['ClaimDate']['date_option2'];
    //         $this->request->data['ClaimDate']['is_active'] = $alldata['ClaimDate']['is_active'];
    //         $this->request->data['ClaimDate']['id'] = $alldata['ClaimDate']['id'];
    //     }
    // }

    // public function admin_userclimed() {

    //     date_default_timezone_set("GMT");

    //     $title_for_layout = 'Public Profile';
    //     $countryname = '';
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/');
    //     }
    //     if (!$this->User->exists($userid)) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }

    //     $this->loadModel('Claim');
    //     $this->loadModel('User');

    //     $this->Claim->recursive = 0;

    //     $conditions = array('Claim.active' => 1);
    //     $this->Paginator->settings = array(
    //         'conditions' => $conditions,
    //         'order' => 'Claim.id DESC',
    //         'limit' => 25
    //     );
    //     $userclimed = $this->Paginator->paginate('Claim');
    //     //pr($userclimed);
    //     //exit;
    //     $this->set(compact('userclimed'));
    // }

    // public function admin_claimpays() {
    //     $this->loadModel('PaidClaim');
    //     $price = $this->request->data['PaidClaim']['amount'];
    //     $email = $this->request->data['PaidClaim']['user_email'];

    //     $userid = $this->request->data['PaidClaim']['user_id'];
    //     $month_of = $this->request->data['PaidClaim']['month_of'];

    //     $this->Session->write('claimuserid', $userid);
    //     $this->Session->write('claimusermonth', $month_of);

    //     $this->set(compact('price', 'email'));
    // }

    // public function admin_successclaim() {

    //     date_default_timezone_set("GMT");

    //     $title_for_layout = 'Public Profile';
    //     $countryname = '';
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/');
    //     }
    //     if (!$this->User->exists($userid)) {
    //         throw new NotFoundException(__('Invalid user'));
    //     }


    //     date_default_timezone_set("GMT");

    //     $req = 'cmd=_notify-validate';
    //     foreach ($_POST as $key => $value) {
    //         $value = urlencode(stripslashes($value));
    //         $req .= "&$key=$value";
    //     }

    //     $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
    //     $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
    //     $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
    //     $fp = fsockopen('www.paypal.com', 80, $errno, $errstr, 30);



    //     if (!$fp) {
            
    //     } else {
    //         fputs($fp, $header . $req);
    //         $res = fgets($fp, 1024);

    //         //echo "<pre>";
    //         //print_r($_POST);
    //         //exit();

    //         if ($_POST['payment_status'] == "Completed" || $_POST['payment_status'] == "Pending") {


    //             $this->loadModel('PaidClaim');
    //             $this->loadModel('Claim');

    //             $this->Claim->recursive = 2;
    //             $options = array('conditions' => array('Claim.user_id' => $this->Session->read('claimuserid'), 'Claim.month_of' => $this->Session->read('claimusermonth')));
    //             $returnmyorders = $this->Claim->find('first', $options);

    //             //$idd = $returnmyorders['Claim']['id'];
    //             //pr($returnmyorders);
    //             //exit();

    //             $data['user_id'] = $returnmyorders['Claim']['user_id'];
    //             $data['amount'] = $returnmyorders['Claim']['seller_payment'];
    //             $data['month_of'] = $returnmyorders['Claim']['month_of'];
    //             $data['user_email'] = 'test';
    //             $data['payment_status'] = 1;
    //             $data['date'] = date("Y-m-d H:i:s");
    //             $data['transaction_id'] = $_POST['txn_id'];

    //             //pr($data);
    //             //exit;

    //             $this->PaidClaim->create();
    //             if ($this->PaidClaim->save($data)) {
    //                 $lastorderId = $this->PaidClaim->getLastInsertId();
    //             }

    //             $stat = 1;
    //             $this->Claim->id = $returnmyorders['Claim']['id'];
    //             $this->Claim->saveField('payment_status', $stat);
    //         } else {
                
    //         }
    //     }
    //     if (strcmp($res, "INVALID") == 0) {
            
    //     }
    //     fclose($fp);

    //     $this->Session->delete('claimuserid');
    //     $this->Session->delete('claimusermonth');
    //     $this->Session->setFlash(__('Paid successfully.'));
    //     return $this->redirect(array('controller' => 'orders', 'action' => 'userclimed'));
    // }

    // public function admin_failureclaim() {
        
    // }

    // public function order_details($order_id=null){
    //     $order_id = base64_decode($order_id);
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/users/login');
    //     }
    //     $title_for_layout = 'Order Details';
    //     $this->loadModel("Order");
    //     $orders = $this->Order->find("all",array("conditions"=>array("Order.id"=>$order_id), "recursive"=>2));
    //     // echo "<pre>";
    //     // print_r($orders);die;
    //     $this->loadModel("ListImage");
    //     $all_list=array();
    //     foreach ($orders as $key => $value) {
    //         foreach ($value['OrderDetail'] as $val) {
    //             //$all_list[]=$val['list_id'];
    //             $ListImage[$val['list_id']]=$this->ListImage->find("all",array("conditions"=>array("ListImage.list_id"=>$val['list_id']),"recursive"=>-1));
    //         }
    //     }
        
    //     // echo "<pre>";
    //     // print_r($ListImage);die;
    //     $this->set(compact('orders','title_for_layout','ListImage'));
    // }

    // public function admin_order($order_id=null){
    //     $this->autoRander=false;
    //     $order_id = base64_decode($order_id);
    //     $username = $this->Session->read('username');
    //     $userid = $this->Session->read('userid');
    //     if (!isset($userid)) {
    //         $this->redirect('/users/login');
    //     }
    //     $title_for_layout = 'Order Details';
    //     $this->loadModel("Order");
    //     $orders = $this->Order->find("all",array("conditions"=>array("Order.id"=>$order_id), "recursive"=>2));
    //     // echo "<pre>";
    //     // print_r($orders);die;
    //     $this->loadModel("ListImage");
    //     $all_list=array();
    //     foreach ($orders as $key => $value) {
    //         foreach ($value['OrderDetail'] as $val) {
    //             //$all_list[]=$val['list_id'];
    //             $ListImage[$val['list_id']]=$this->ListImage->find("all",array("conditions"=>array("ListImage.list_id"=>$val['list_id']),"recursive"=>-1));
    //         }
    //     }
        
    //     // echo "<pre>";
    //     // print_r($ListImage);die;
    //     $this->set(compact('orders','title_for_layout','ListImage'));
    // }

}
