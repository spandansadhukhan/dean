<?php
App::uses('AppController', 'Controller');
/**
 * AdvertisementsControllers Controller
 *
 * @property AdvertisementsController $AdvertisementsController
 * @property PaginatorComponent $Paginator
 */
class AdvertisementsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
           public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('admin_index',"admin_changestatus","admin_view");
    }


/**
 * index method
 *
 * @return void
 */
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
            //$conditions['Advertisement.is_admin']=1;
            $conditions['Advertisement.id !='] = '';
            foreach ($this->params['named'] as $param_name => $value) {
                //pr($param_name);exit;
                if (!in_array($param_name, array('page', 'sort', 'direction', 'limit'))) {
                    if ($param_name == 'txn_id') {
                        $conditions['Advertisement.txn_id LIKE'] = urldecode('%' . $value) . '%';
                    } else {
                        if ($param_name != 'advace_search_type') {
                            if($param_name=="is_active")
                            {
                                if($value=="Yes")
                                {
                                    $conditions['Advertisement.' . $param_name] = urldecode(1);
                                }
                                else
                                {
                                    $conditions['Advertisement.' . $param_name] = urldecode(0);
                                }
                            }
                        }
                    }

                    $direction = isset($this->params['named']['direction']) ? $this->params['named']['direction'] : '';
                    if ($direction == 'Old') {
                        $order_by = "Advertisement.posttime asc";
                    } else if ($direction == 'New') {
                        $order_by = "Advertisement.posttime desc";
                    } else if ($direction == 'Asc') {
                        $order_by = "Advertisement.id asc";
                    } else if ($direction == 'New') {
                        $order_by = "Advertisement.id desc";
                    } else {
                        $order_by = "Advertisement.id desc";
                    }
                    if (isset($direction) and ! empty($direction)) {
                        $this->request->data['Filter']['direction'] = $direction;
                    }

                    $this->request->data['Filter'][$param_name] = urldecode($value);
                }
            }
        }

        if (!isset($order_by)) {
            $order_by = "Advertisement.id desc";
        }
        //$condition1=array('Advertisement.is_admin !=' => 1,'Advertisement.user_type' => 'E','Advertisement.is_active' => 1);
        $this->Paginator->settings = array(
            'conditions' => ($conditions),
            'order' => $order_by,
            'limit' => $limit
        );

        $total_bannerad = $this->Advertisement->find('count');
        $active_advertisement = $this->Advertisement->find('count',array("conditions"=>array("Advertisement.is_active"=>1)));
        $inactive_advertisement = $this->Advertisement->find('count',array("conditions"=>array("Advertisement.is_active"=>0)));
        $advertisements = $this->Paginator->paginate('Advertisement');
        $ad_types=array("Yes"=>"Yes","No"=>"No");
        //pr($advertisements);exit;
        $this->set(compact('advertisements', 'total_bannerad','active_advertisement',"inactive_advertisement","ad_types"));
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Advertisement->exists($id)) {
			throw new NotFoundException(__('Invalid email notification'));
		}
		$options = array('conditions' => array('Advertisement.' . $this->Advertisement->primaryKey => $id));
                $advertisement=$this->Advertisement->find('first', $options);
                $duration=round((strtotime($advertisement["Advertisement"]["end_date"])-strtotime($advertisement["Advertisement"]["start_date"]))/(86400));
                $publishstatus=$advertisement["Advertisement"]["is_active"]?'Active':'Inactive'  ;  
                $paymentstatus=$advertisement["Advertisement"]["is_paid"]?'Yes':'No'  ;              
                $out="<tr>";
                $out.="<td>ID</td>";
                $out.="<td>".$advertisement["Advertisement"]["id"]."</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Buyer</td>";
                $out.="<td>".$advertisement["Buyer"]["name"]."</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Banner Image</td>";
                $out.="<td>"
                        . "<img src='".$this->webroot.'advertisement/'.$advertisement["Advertisement"]["image"]."' style='height:150px; width:150px;' class='img-responsive'></td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Country</td>";
                $out.="<td>NZ</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Advertisement Duration</td>";
                $out.="<td>".$duration." Days </td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Payment Date</td>";
                $out.="<td>".date("M-d-Y",strtotime($advertisement["Advertisement"]["posttime"]))."</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Advertisement Price</td>";
                $out.="<td>".$advertisement["Advertisement"]["amount"]."NZD</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Publish Status</td>";
                $out.="<td>".$publishstatus."</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Payment method</td>";
                $out.="<td>Paypal</td>";
                $out.="</tr>";
                $out.="<tr>";
                $out.="<td>Payment status</td>";
                $out.="<td>".$paymentstatus."</td>";
                $out.="</tr>";
                echo $out;exit;
                
                
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->AdvertisementsController->create();
			if ($this->AdvertisementsController->save($this->request->data)) {
				$this->Session->setFlash(__('The email notification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email notification could not be saved. Please, try again.'));
			}
		}
		$users = $this->AdvertisementsController->Advertisement->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->AdvertisementsController->exists($id)) {
			throw new NotFoundException(__('Invalid email notification'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdvertisementsController->save($this->request->data)) {
				$this->Session->setFlash(__('The email notification has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The email notification could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdvertisementsController.' . $this->AdvertisementsController->primaryKey => $id));
			$this->request->data = $this->AdvertisementsController->find('first', $options);
		}
		$users = $this->AdvertisementsController->Advertisement->find('list');
		$this->set(compact('users'));
	}
	public function admin_changestatus($id = null,$status=null) {
		if (!$this->Advertisement->exists($id)) {
			throw new NotFoundException(__('Invalid email notification'));
		}
                        $this->request->data["Advertisement"]["id"]=$id;
                        $this->request->data["Advertisement"]["is_active"]=$status;
                        try 
                        {
                            $this->Advertisement->save($this->request->data);
                            return $this->redirect(array('action' => 'index'));
                            
                        } catch (Exception $ex) {
                            
                       pr($ex);exit;     
                       return $this->redirect(array('action' => 'index'));

                            
                        }
			
		
                
	}
/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->AdvertisementsController->id = $id;
		if (!$this->AdvertisementsController->exists()) {
			throw new NotFoundException(__('Invalid email notification'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdvertisementsController->delete()) {
			$this->Session->setFlash(__('The email notification has been deleted.'));
		} else {
			$this->Session->setFlash(__('The email notification could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
