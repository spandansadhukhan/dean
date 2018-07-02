<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

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
    
    public function timezoneset($timezone=null){
    $this->Session->write('clienttimezone', $_REQUEST['timezones']);
    exit;

}

    
    public function index() {
        
    }
    
    /*public function suman_test() {
        $this->autoLayout=null;
        $this->autoRender = false;
        
            $this->loadModel('SiteSetting');

            $SITE_URL = Configure::read('SITE_URL');
            $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
            if($contact_email){
                    $adminEmail = $contact_email['SiteSetting']['admin_email'];
            } else {
                    $adminEmail = 'contibute@info.com';
            }

            //$link =Configure::read('SITELINK').'users/confirm/'.base64_encode($lastInsetred['User']['id']);
            $link =Configure::read('SITELINK');
            $license_msg_body = 'Hi, for your operating system. This feature will connect clients to your computer\'s desktop display. The connection allows clients to control speech language applications, games and activities via ReachTherapy.me. The remote desktop connection is encrypted, browser to browser and HIPAA compliant. <br/><br/>Feel free to <a href="mailto:info@reachtherapy.me">contact us</a> with any questions or for help.<br/><br/> Sincerely, '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';

            App::uses('CakeEmail', 'Network/Email');

            
          // App::uses('CakeEmail', 'Network/Email');

            $Email = new CakeEmail('smtp');

            #pass user input to function 
            $Email->emailFormat('both');
            //$Email->from(array($adminEmail => Configure::read('SITENAME')));
            $Email->from(array($adminEmail => Configure::read('SITENAME')));
            $Email->to('nits.sumansamanta@gmail.com');
            $Email->subject('Your license has been verified - action required!');
            $Email->send($license_msg_body);
    
    }*/
     public function register() {
         $this->loadModel('SiteSetting');
         if ($this->request->is(array('post', 'put'))) {
  $sql="User.email='".$this->request->data['User']['email']."'";

    $emailexistcondition=array('conditions'=>$sql);
$emailexist=$this->User->find('first',$emailexistcondition);
    
if(empty($emailexist))
{
    

$pass = $this->request->data['User']['password'];

$this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
$this->request->data['User']['password'] = md5($pass);

$this->request->data['User']['registerdate'] = date('Y-m-d H:i:s');
if($this->request->data['User']['usertype'] == 'T')
{
	$this->request->data['User']['status'] = 0;
}else{
	$this->request->data['User']['status'] = 1;
}
//$this->request->data['User']['gmail_username'] = $this->request->data['User']['first_name'].'.'.$this->request->data['User']['last_name'].'@reachtherapy.me';


$options = array('conditions' => array('User.' . $this->User->primaryKey => 1));
$admin = $this->User->find('first', $options);
$adminEmail = $admin['User']['email'];

$this->User->create();
if ($this->User->save($this->request->data))
{
$last_user_id = $this->User->getLastInsertId();

$options = array('conditions' => array('User.id' => $this->User->getLastInsertId()));
$lastInsetred = $this->User->find('first', $options);

$SITE_URL = Configure::read('SITE_URL');



$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
    if($contact_email){
        $adminEmail = $contact_email['SiteSetting']['admin_email'];
    } else {
        $adminEmail = 'contibute@info.com';
    }

    $options = array('conditions' => array('User.id' => $this->User->getLastInsertId()));
    $lastInsetred = $this->User->find('first', $options);
    $link =Configure::read('SITELINK').'users/confirm/'.base64_encode($lastInsetred['User']['id']);
    $Sitelink =Configure::read('SITELINK');
           
    $msg_body = 'Hi '.$lastInsetred['User']['name'].'<br/><br/>Welcome to '.Configure::read('SITENAME').'  Please complete the following 2 steps to set up your account:<br/><br/> <b>1. </b>  Confirm your email address and return to the site to complete your profile, <a href="'.$link.'" class="button">Click Here</a>. <br/><br/><b>2. </b>  '.Configure::read('SITENAME').' runs on the Google Chrome Browser. If you have not already, please <a href="https://www.google.com/chrome/browser/desktop/index.html">download</a> and install the world\'s best internet browser, Google Chrome for free.
. <br/><br/>Best regards,<br/>Laura Fuller
<br/> Founder at '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';

    App::uses('CakeEmail', 'Network/Email');

    $Email = new CakeEmail('smtp');

    #pass user input to function 
    $Email->emailFormat('both');
    $Email->from(array($adminEmail => Configure::read('SITENAME')));
    $Email->to($lastInsetred['User']['email']);
    $Email->subject('Welcome to ReachTherapy.me');
    $Email->send($msg_body);
    if($this->request->data['User']['usertype'] == 'T'){
        $msg_body = "Hi Admin, <br/><br/>New Therapist in ".Configure::read('SITENAME')."<br/><br/>"
                 . "A new therapist has registered.<br/><br/>First Name: ".$lastInsetred['User']['first_name']." <br/><br/>Last Name: ".$lastInsetred['User']['last_name']."<br/><br/>Email: ".$lastInsetred['User']['email']."<br/><br/><br/><br/>Thanks,<br/>".Configure::read('SITENAME');



        App::uses('CakeEmail', 'Network/Email');

        $Email = new CakeEmail('smtp');

        #pass user input to function 
        $Email->emailFormat('both');
        $Email->from(array($lastInsetred['User']['email'] => Configure::read('SITENAME')));
        $Email->to($adminEmail);
        $Email->subject('New Therapist in ReachTherapy.me');
        $Email->send($msg_body);
    }

//$this->Session->setFlash(__("Please check your mail and confirm your registration"));
//$this->Session->setFlash(__("Thank you for registration. Log in to continue."));
  //$this->Session->setFlash(__("Please go to your email to confirm address and return to complete profile."));
  $this->Session->setFlash('Please go to your email inbox to confirm your email address and return to complete your profile.','default', array('class' => 'success'));
return $this->redirect(array('controller' => 'users', 'action' => 'register'));


}
else
{
$this->Session->setFlash(__("Cannot Save", 'default', array('class' => 'error')));
}
}else
{
 $this->Session->setFlash(__("Email Exist", 'default', array('class' => 'error')));   
 return $this->redirect(array('controller' => 'users', 'action' => 'register'));
}
}
         
         
         
         
         
         
         
         
         $this->loadModel('State');
        $this->set('state', $this->State->find('all'));
         
        
    }
    
 public function confirm($id = null) {
		$id=base64_decode($id);
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($id) {
			$this->request->data['User']['status'] = 1;
			$this->request->data['User']['id'] = $id;
			if ($this->User->save($this->request->data)) {
                            
                            $options = array('conditions' => array('User.id' => $id));
                            $loginuser = $this->User->find('first', $options);
                            if(!empty($loginuser)){
                                $this->loadModel('VideochatSession');
                                $this->loadModel('Appointment');
                                    $sql="(VideochatSession.to='".$loginuser['User']['id']."'OR  VideochatSession.from='".$loginuser['User']['id']."') AND VideochatSession.status='0' AND VideochatSession.started='0'";

                                     $options = array('conditions' => array($sql));
                                $chk = $this->VideochatSession->find('all', $options);
                                if(!empty($chk)){
                                foreach($chk as $video_dtl){
                                        $appo_id=$video_dtl['VideochatSession']['appointment_id'];
                                        //echo $appo_id;
                                        $this->VideochatSession->delete($video_dtl['VideochatSession']['id']);
                                        $appo_data=array();
                                        $appo_data['Appointment']['id']=$appo_id;
                                        $appo_data['Appointment']['sesion_status']=0;
                                        $this->Appointment->save($appo_data);

                                }
                                }
                                //pr($chk);
                                //exit;

                                    //'time_zone'=>$this->Session->read('clienttimezone'),
                                $logg = array('id' => $loginuser['User']['id'],  'is_online' => 1, 'idletime'=>date("Y-m-d H:i:s"),'timezone'=>$this->Session->read('clienttimezone'));

                                $this->User->save($logg);
                                $this->Session->write('userid', $loginuser['User']['id']);
                                $this->Session->write('email', $loginuser['User']['email']);
                                $this->Session->write('usertype', $loginuser['User']['usertype']);
                                if($loginuser['User']['usertype'] == "T"){
                                 return $this->redirect(array('action' => 'edit-profile'));
                                }else{
                                        return $this->redirect(array('action' => 'editclient'));
                                }
                            }else{
                                return $this->redirect(array('action' => 'login'));
                            }
				
                  // $this->Session->setFlash(__('<center>The account has been activated. You can now login</center>', 'default', array('class' => 'success')));
				
				//return $this->redirect(array('action' => 'login'));
			} else {
				
                   $this->Session->setFlash(__('<center>The user could not be activated. Please, try again.</center>'));
				
				return $this->redirect(array('action' => 'index'));
			}
		} 
	}

    
public function removeloginuser()
{
   if(isset($_REQUEST['userid'])){
    $id=  base64_decode($_REQUEST['userid']);
    
     if( $id!=''){
 $this->request->data['User']['id'] =$id; 
 $this->request->data['User']['is_online'] =0;
 $this->User->save($this->request->data);
 echo 1;
     }
   }
 exit;
}
    
    public function getcity($value=null){
        $this->loadModel('City');
       $cities=$this->City->find('all',array('conditions' => array('City.state_code'=>$value),'fields' => array('City.id','City.city'),'group'=>'City.city'));
       
       
        $html="<option value=''>Select City</option>";
       foreach($cities as $city){
           $html.="<option value='".$city['City']['id']."'>".$city['City']['city']."</option>";
       }
        
       echo $html;exit;
        
    }
    
    
     public function emailexist($value=null){
        $checkemail=$this->User->find('first',array('conditions' => array('User.email'=>$value)));
       if(count($checkemail)>0){
            echo 1;
       }else{
           echo 0;
       }
        
       exit;
        
    }
    
    
    public function emailexist_edit($value=null){
        $user_id=$this->Session->read('userid');
        $checkemail=$this->User->find('first',array('conditions' => array('User.email'=>$value,'User.id !='=>$user_id)));
       if(count($checkemail)>0){
            echo 1;
       }else{
           echo 0;
       }
        
       exit;
        
    }
    

    public function login() {
        if($this->Session->read('userid')!=''){
            if($this->Session->read('usertype') == 'T'){
                return $this->redirect(array('action' => 'therapist_dashboard'));
            }else{
                return $this->redirect(array('action' => 'dashboard'));
            }
        }
        
        if (isset($_COOKIE['username_cookie'])) {
            #print_r($_COOKIE);
            $username_cookie1 = $_COOKIE['username_cookie'];
            $options = array('conditions' => array('User.email' => $username_cookie1));
            $loginuser = $this->User->find('first', $options);
            //print_r($loginuser);exit;

            $logg = array('id' => $loginuser['User']['id'], 'is_logged_in' => 1, 'idletime' => date("Y-m-d H:i:s"));
            $this->User->save($logg);
            $this->Session->write('userid', $loginuser['User']['id']);
            $this->Session->write('username', $loginuser['User']['email']);
            $this->Session->write('email', $loginuser['User']['email']);
            $this->Session->write('usertype', $loginuser['User']['user_type']);

            if ($loginuser['User']['user_type'] == 'C') {
                return $this->redirect(array('controller' => 'consultants', 'action' => 'dashboard'));
            } else {
                return $this->redirect(array('action' => 'dashboard'));
            }
        }
        #exit;

        if ($this->request->is(array('post', 'put'))) {
            #print_r($this->request->data);
            $options = array('conditions' => array('User.email' => $this->request->data['User']['email'], 'User.password' => md5($this->request->data['User']['password']), 'User.status' => 1,'User.id <>'=>1));
$loginuser = $this->User->find('first', $options);
        if(!empty($loginuser)){
            #echo $this->request->data['User']['checkbox_val'];
            if(isset($this->request->data['User']['checkbox_val']) && $this->request->data['User']['checkbox_val']==1)
            {
                #echo 'hii1';
                setcookie('username_cookie', $this->request->data['User']['email'], time()+604800);
                setcookie('remain_cookie', $this->request->data['User']['checkbox_val'], time()+604800);
            }
            else
            {
                if(isset($this->request->data['User']['checkbox_val']) )
                {
                    #echo 'hii2';
                    setcookie('username_cookie', $this->request->data['User']['email'], time()-3600);
                    setcookie('remain_cookie',$this->request->data['User']['checkbox_val'],time()-3600);
                }
            }

        } else {
            if(isset($this->request->data['User']['checkbox_val']))
            {
                #echo 'hii3';
                setcookie('username_cookie', $this->request->data['User']['email'], time()-3600);
                setcookie('remain_cookie',$this->request->data['User']['checkbox_val'],time()-3600);
            }
        }
        #echo $_COOKIE['username_cookie'];
        #echo $_COOKIE['remain_cookie'];
        //exit;

        if(empty($loginuser)){

            $this->Session->setFlash("", 'default', array('class' => 'success'));
            $this->Session->setFlash(__("Invalid email or password", 'default', array('class' => 'error')));

        }else{

            $this->loadModel('VideochatSession');
            $this->loadModel('Appointment');
            $sql="(VideochatSession.to='".$loginuser['User']['id']."'OR  VideochatSession.from='".$loginuser['User']['id']."') AND VideochatSession.status='0' AND VideochatSession.started='0'";

             $options = array('conditions' => array($sql));
            $chk = $this->VideochatSession->find('all', $options);
            if(!empty($chk)){
            foreach($chk as $video_dtl){
                    $appo_id=$video_dtl['VideochatSession']['appointment_id'];
                    //echo $appo_id;
                    $this->VideochatSession->delete($video_dtl['VideochatSession']['id']);
                    $appo_data=array();
                    $appo_data['Appointment']['id']=$appo_id;
                    $appo_data['Appointment']['sesion_status']=0;
                    $this->Appointment->save($appo_data);

            }
        }
//pr($chk);
//exit;
    
    //'time_zone'=>$this->Session->read('clienttimezone'),
$logg = array('id' => $loginuser['User']['id'],  'is_online' => 1, 'idletime'=>date("Y-m-d H:i:s"),'timezone'=>$this->Session->read('clienttimezone'));

$this->User->save($logg);
$this->Session->write('userid', $loginuser['User']['id']);
$this->Session->write('email', $loginuser['User']['email']);
$this->Session->write('usertype', $loginuser['User']['usertype']);
if($loginuser['User']['usertype'] == "T"){
 return $this->redirect(array('action' => 'therapist_dashboard'));
}else{
	return $this->redirect(array('action' => 'dashboard'));
}

}



        }
    }
    
    
    public function logout() {
if($this->Session->read('userid')!=''){
$logg = array('id' => $this->Session->read('userid'), 'last_login' => date('Y-m-d H:i:s'), 'is_online' => 0);
$this->User->save($logg);

}
if(isset($_COOKIE['username_cookie'])){
setcookie('username_cookie', $this->request->data['User']['email'], time()-3600);
setcookie('remain_cookie',$this->request->data['checkbox_val'],time()-3600);
}
$this->Session->delete('userid');
$this->Session->delete('email');
$this->Session->delete('usertype');
$this->Session->destroy();
 $this->redirect('login');
}


public function admin_logout() {
$this->Session->delete('userid');
$this->Session->delete('email');

$this->redirect('index');
}
    
    
public function search() {
	$stateClient = '';
	$loginid=  $this->Session->read('userid');  
	$optionsg = array('conditions' => array('User.id' => $loginid), 'fields' => array('User.state_id'));
        $client = $this->User->find('first', $optionsg);   
	if($client){
		$stateClient = $client['User']['state_id'];
	}    
	
	$per_page = 6;
	$offset = 0;
	$optionsusr['fields'] = array("User.id","User.name","User.designation","User.profile_image","User.about");
	$this->User->recursive = 0;
	if($stateClient!=''){
		$users = $this->User->find('all', array('conditions' => array("User.status"=>1,"User.usertype"=>'T','User.state_id'=>$stateClient,'User.is_approved'=>1),$optionsusr, 'limit' => $per_page, 'offset' => $offset));
	} else {
		$users = $this->User->find('all', array('conditions' => array("User.status"=>1,"User.usertype"=>'T','User.is_approved'=>1),$optionsusr, 'limit' => $per_page, 'offset' => $offset));
	}

	$this->set('users', $users);
	$this->loadModel('State');
	$this->set('state', $this->State->find('all'));
	$this->loadModel('Speciality');
	$this->set('speciality', $this->Speciality->find('all'));
	$this->loadModel('Insurance');
	$this->set('insurance', $this->Insurance->find('all'));
	$this->set(compact('stateClient'));
        $this->loadModel('Demographic');
        $this->set('Demographic', $this->Demographic->find('list'));
          
      }
      
      /*public function profile($id=null) {
          $userid=  base64_decode($id);
          $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
        $this->set('user', $this->User->find('first', $options));
      
      }*/

	public function profile($id=null) {
          $userid=  base64_decode($id);
          $login_id=$this->Session->read('userid');
          $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
        $this->set('user', $this->User->find('first', $options));

	        
        $this->loadModel('State');
        $this->loadModel('License');
        
        $this->set('state', $this->State->find('list',array('fields'=>array('State.state_code','State.state'))));
        $selected_license=$this->License->find('all',array('conditions'=>array('License.user_id'=>$userid)));
        //pr($selected_license);
        $this->set('selected_license', $selected_license);
        if ($this->request->is(array('post')))
		{
			$message_data=array();
			if($this->Session->read('userid')==''){
			  $this->Session->setFlash(__('please login'));
			  return $this->redirect(array('action' => 'login'));
			}
			$message_data['Message']['message']=$this->request->data['User']['message'];
			$message_data['Message']['from_id']=$login_id;
			$message_data['Message']['to_id']=$userid;
			$this->loadModel('Message');
			$this->Message->save($message_data);
			$SITE_URL = Configure::read('SITE_URL');

					$this->loadModel('SiteSetting');

			$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
										if($contact_email){
											$adminEmail = $contact_email['SiteSetting']['admin_email'];
										} else {
											$adminEmail = 'contibute@info.com';
										}

				$options = array('conditions' => array('User.id' =>$login_id));
				$from_user = $this->User->find('first', $options);
				
				$options_to = array('conditions' => array('User.id' =>$userid));
				$to_user = $this->User->find('first', $options_to);	
				$msg_subject = "Message from ".	$from_user['User']['name'];		
				 $msg_body = "Hi ".$to_user['User']['name'].". <br<br>"
						 ."You have received a message from   ".$from_user['User']['name'].".<br><br>"." Message:   ".$this->request->data['User']['message'];
				//echo $msg_body;
				//exit;
				App::uses('CakeEmail', 'Network/Email');

				$Email = new CakeEmail('smtp');

				#pass user input to function 
				$Email->emailFormat('both');
				$Email->from(array($adminEmail => Configure::read('SITENAME')));
				$Email->to($to_user['User']['email']);
				//$Email->to('nits.anup@gmail.com');
				$Email->subject($msg_subject);
				$Email->send($msg_body);
			$this->Session->setFlash('Message sent successfully.','default', array('class' => 'success'));
			//return $this->redirect(array('action' => 'profile'));
		}
      
      }
      
       public function appointment($id=null) {
		   $userid=  base64_decode($id);
		   $loginid=  $this->Session->read('userid');
		$this->loadModel('CreditCard');
			if($this->Session->read('userid')==''){
				  $this->Session->setFlash(__('please login'));
				  return $this->redirect(array('action' => 'login'));
			  }
		$options = array('conditions' => array('CreditCard.user_id' => $loginid));
		$credit_card_details=$this->CreditCard->find('all', $options);        
		if(empty($credit_card_details)){			
			 $this->Session->setFlash(__('Please fill up Credit Card details.'));
			 return $this->redirect(array('action' => 'financial'));
		}
		if(!empty($credit_card_details)){
			$cc_count=0;
			foreach($credit_card_details as $credit_card_detail)
			{
				if($credit_card_detail['CreditCard']['active'] == 1)
				{
					$cc_count=$cc_count+1;
				}
			}
			if($cc_count == 0){
				$this->Session->setFlash(__('Please make a credit card active.'));
				return $this->redirect(array('action' => 'financial'));
			}
		}

		   $this->loadModel('UserEvent');
		   $this->loadModel('Appointment');
                   $this->loadModel('MultipleDemographic');
		  $this->UserEvent->recursive = 0;
                  $services=array();
                  $selected_services=array();
                  $services=$this->MultipleDemographic->find('all',array('conditions'=>array('MultipleDemographic.user_id'=>$userid)));
        
        
                if(!empty($services)){
                    foreach($services as $key=>$val){
                        //$selected_services[$val['MultipleDemographic']['service']]=$val['MultipleDemographic']['rate'];
                        $selected_services[$val['Service']['id']]=$val['Service']['name'];
                    }
                }
                //pr($selected_services);
                 $this->set('selected_services', $selected_services);
                  
		  $currweekdate=date("Y-m-d");
		  if ($this->request->is(array('post')))
            {
              $optionss = array('conditions' => array('UserEvent.id' => $this->request->data['hidid']));
              $eventch = $this->UserEvent->find('first', $optionss);

              $optionsg = array('conditions' => array('User.id' => $loginid));
              $userg = $this->User->find('first', $optionsg);

              $optionsc = array('conditions' => array('User.id' => $userid));
              $userc = $this->User->find('first', $optionsc);

              

              $start_time_date_exp=explode('@',$this->request->data['start_time']);

              $start_time_exp=explode('-',$start_time_date_exp[1]);

              $appo['Appointment']['event_id']=$this->request->data['hidid'];
              $appo['Appointment']['request_to']=$this->request->data['hiduserid'];
              $appo['Appointment']['user_id']=$loginid;
              $appo['Appointment']['fromtime']=$start_time_exp[0];
              $appo['Appointment']['totime']=$start_time_exp[1];
              $appo['Appointment']['date_made']=date('Y-m-d');
              $appo['Appointment']['title']=$this->request->data['title'];
              $appo['Appointment']['service_id']=$this->request->data['service'];
              $appo['Appointment']['context']=$this->request->data['description'];
              $appo['Appointment']['date']=$start_time_date_exp[0];
              $appo['Appointment']['is_accepted']=0;

		$app_option = array('conditions' => array('Appointment.request_to' => $userid,'Appointment.user_id' =>$loginid));
              $app_count = $this->Appointment->find('count', $app_option);
              if($app_count == 0){
				  $app_client = "New Client";
			  }else{
				  $app_client = "Returning Client";
			  }
              $this->Appointment->create();
              if ($this->Appointment->save($appo))
              {

			$SITE_URL = Configure::read('SITE_URL');

					$this->loadModel('SiteSetting');

				$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
											if($contact_email){
												$adminEmail = $contact_email['SiteSetting']['admin_email'];
											} else {
												$adminEmail = 'contibute@info.com';
											}

				   // $options = array('conditions' => array('User.id' => $this->User->getLastInsertId()));
				    ///$lastInsetred = $this->User->find('first', $options);
				    $link =Configure::read('SITELINK').'users/therapist_dashboard';
				     $msg_body = "Hi ".$userc['User']['name'].".<br<br>"
             . " Appointment Request from   ".$userg['User']['name']." (".$app_client.").<br><br>".$userg['User']['name']." wants to make an appointment with you on ".$start_time_date_exp[0]."   from ".$start_time_exp[0]." to ".$start_time_exp[1]."<br><br> Note: ".$this->request->data['title']." <br><br> Click on the link to approve this appointment.<br/><br/> <a href='".$link."' class='button'>Click Here</a><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
			    <style>.button{padding:20px;}</style>";

				    App::uses('CakeEmail', 'Network/Email');

				    $Email = new CakeEmail('smtp');

				    #pass user input to function 
				    $Email->emailFormat('both');
				    $Email->from(array($adminEmail => Configure::read('SITENAME')));
				    $Email->to($userc['User']['email']);
				//$Email->to("nits.anup@gmail.com");
				    $Email->subject('Appointment Request');
				    $Email->send($msg_body);
				  $this->Session->setFlash("Your request sent successfully and waiting for therapist approval");
                $this->redirect(array('controller' => 'users', 'action' => 'dashboard'));
                
			  }
		  }
		  $optionss = array('conditions' => array('UserEvent.user_id'=>$userid,'UserEvent.start_time >='=>$currweekdate));
		  $eventch = $this->UserEvent->find('all', $optionss);
		  
		  $options = array('conditions' => array('User.id' => $userid));
            $user = $this->User->find('first', $options);
            $name=$user['User']['name'];
            $this->set('user', $user);
		  //debug($eventch);
		  $eventchfinal=array();
		if(!empty($eventch)){
            foreach($eventch as $events)
            {
              $optionsappo = array('conditions' => array('Appointment.event_id' => $events['UserEvent']['id'],'Appointment.is_accepted' => 1));
              $appoch = $this->Appointment->find('all', $optionsappo);
              if(!empty($appoch))
              {
                $booked_arr=array();
                foreach($appoch as $appos)
                {
                  $booked_arr[]=strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']);
                }
              }
              //debug($appoch);
               if(!empty($appoch))
              {
               foreach($appoch as $appos)
                {

                  for($t=strtotime($events['UserEvent']['start_time']);$t<strtotime($events['UserEvent']['end_time']);$t=$t+1800)
                  {

                    $eventb=array();
                    $eventa=array();
                    if($t==strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']))
                    {
                      $eventb['UserEvent']['timestamp']=$t;
                      $eventb['UserEvent']['booked']='yes';
                      $eventb['UserEvent']['id']=$events['UserEvent']['id'];
                      $eventb['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                      $eventb['UserEvent']['eventname']='Available';
                      $eventb['UserEvent']['start_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['fromtime'];
                      $eventb['UserEvent']['end_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['totime'];
                      $eventb['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                    }
                    else
                    {
                      if(!in_array($t,$booked_arr))
                      {
                              $eventa['UserEvent']['timestamp']=$t;
                              $eventa['UserEvent']['booked']='no';
                              $eventa['UserEvent']['id']=$events['UserEvent']['id'];
                              $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                              $eventa['UserEvent']['eventname']='Available';
                              $eventa['UserEvent']['start_time']=date('Y-m-d H:i:s',$t);
                              $eventa['UserEvent']['end_time']=date('Y-m-d H:i:s',$t+1800);
                              $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                      }
                    }
                    if(!empty($eventa))
                    {
                      if($this->searchForId($eventa['UserEvent']['timestamp'],$eventchfinal)==0 )
                      {
                       $eventchfinal[]=$eventa;
                      }
                    }
                    if(!empty($eventb))
                    {
                      if($this->searchForId($eventb['UserEvent']['timestamp'],$eventchfinal)==0)
                      {
                       $eventchfinal[]=$eventb;
                      }
                    }
                  }


                }
              }
             else
              {
               $eventa['UserEvent']['timestamp']='';
               $eventa['UserEvent']['booked']='no';
               $eventa['UserEvent']['id']=$events['UserEvent']['id'];
               $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
               $eventa['UserEvent']['eventname']='Available';
               $eventa['UserEvent']['start_time']=$events['UserEvent']['start_time'];
               $eventa['UserEvent']['end_time']=$events['UserEvent']['end_time'];
               $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
               //debug($eventa);
               $eventchfinal[]=$eventa;
              }
            }
}
		  //$this->set('events', $eventch);
		  $this->set('events', $eventchfinal);


            $this->set('aname', $name);
            $this->set('aid', base64_encode($userid));
      
      }
      
      
      public function check_past_time()
		{
		   
			$dts=explode("@",$_REQUEST['datetm']);
			
			$tm=explode("-",$dts[1]);
			
			$date=$dts[0]." ".$tm[1];
			
		   $today=date('Y-m-d H:i');
		  if(strtotime($today) > strtotime($date))
		  {
			echo '0';
		  }
		  else
		  {
			echo '1';
		  }
		  exit;
		}
		
	public function check_aval_time($start_time=null,$event_id=null)
		{
		 
		  $start_time_exp=explode('-',$start_time);
		  $this->loadModel('Appointment');
		  $optiona = array('conditions' => array('Appointment.event_id' => $event_id,'Appointment.fromtime' => $start_time_exp[0],'Appointment.is_accepted' => 1));
		  $appo = $this->Appointment->find('first', $optiona);
		  if(!empty($appo))
		  {
			echo 'booked';
		  }
		  else
		  {
			echo 'available';
		  }
		  exit;
		}
		
	public function check_appointment_date()
		{
		   //date_default_timezone_set('America/Chicago');
			$dts=explode("@",$_REQUEST['datetm']);
			$date=$dts[0]." ".$dts[1];


		   $today=date('Y-m-d H:i');

 //echo date('d-m-Y H:i:s');
		  if(strtotime($today) > strtotime($date))
		  {
			echo 'yes';
		  }
		  else
		  {
			echo 'no';
		  }
		  exit;
		}
		
		
	public function get_appointment_time($id=null,$clicked_date=null)
	{
	  $this->loadModel('UserEvent');
	  $this->loadModel('Appointment');
	  $optionss = array('conditions' => array('UserEvent.id' => $id));
	  $eventch = $this->UserEvent->find('first', $optionss);
	  
	  $start_time=date('H:i',strtotime($eventch['UserEvent']['start_time']));
	  $start_date=date('d M, Y',strtotime($eventch['UserEvent']['start_time']));
	  $end_date=date('d M, Y',strtotime($eventch['UserEvent']['end_time']));
	  $start_date1=date('Y-m-d',strtotime($eventch['UserEvent']['start_time']));
	  $end_date1=date('Y-m-d',strtotime($eventch['UserEvent']['end_time']));
	  $end_time=date('H:i',strtotime($eventch['UserEvent']['end_time']));
	  $data['start_time']=$start_time;
	  $data['end_time']=$end_time;
	  $data['id']=$eventch['UserEvent']['id'];
	  $data['user_id']=$eventch['UserEvent']['user_id'];
	  $data['start_date']=$start_date;
	  
	  $start_time_exp=explode(':',$start_time);
	  $end_time_exp=explode(':',$end_time);
	  $select='<select name="data[start_time]" id="appo_time" style="height:30px;width:130px;font-size:16px;" onchange=getval(this.value)>';
	  $increase_time=$start_time;
	  $timestamp = strtotime($start_time) + 30*60;
	  $increase_end_time=date('H:i', $timestamp);
	$loop_count=$start_time_exp[0]+(($end_time_exp[0]-$start_time_exp[0])*2);
//echo $loop_count;
	  

	  if(strtotime($start_date1)==strtotime($end_date1))
	  {
			//for($ct=$start_time_exp[0];$ct<$loop_count;$ct++)
			 for($t=strtotime($start_time);$t<strtotime($end_time);$t=$t+1800)
			{
			   
			   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
			   $appo = $this->Appointment->find('first', $optiona);
			   if(!empty($appo))
			   {
				
			   }
			   else
			   {
				$select.='<option value="'.$start_date1.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
			   }
			   $increase_time=$increase_end_time;
			   $timestamp = strtotime($increase_end_time) + 30*60;
			   $increase_end_time=date('H:i', $timestamp);
			}
	  }
	  else
	  {
		   $now = strtotime($end_date1);
		   $your_date = strtotime($start_date1);
		   $datediff = $now - $your_date;
		   $no_of_days=floor($datediff/(60*60*24));
		   if($no_of_days==1)
		   {


				   for($ct=$start_time_exp[0];$ct<24;$ct++)
					{


					   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.date' =>$start_date1,'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
					   $appo = $this->Appointment->find('first', $optiona);
					   if(!empty($appo))
					   {

					   }
					   else
					   {
						$select.='<option value="'.$start_date1.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
					   }

					   $increase_time=$increase_end_time;
					   $timestamp = strtotime($increase_end_time) + 60*60;
					   $increase_end_time=date('H:i', $timestamp);

		   }


					for($ct=0;$ct<$end_time_exp[0];$ct++)
					{


					   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.date' =>$end_date1,'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
					   $appo = $this->Appointment->find('first', $optiona);
					   if(!empty($appo))
					   {

					   }
					   else
					   {
						$select.='<option value="'.$end_date1.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
					   }

					   $increase_time=$increase_end_time;
					   $timestamp = strtotime($increase_end_time) + 60*60;
					   $increase_end_time=date('H:i', $timestamp);

		   }



		   }
		   else
		   {
			 for($n=0;$n<=$no_of_days;$n++)
			 {
				if($n==0)
				{

				 for($ct=$start_time_exp[0];$ct<24;$ct++)
					{

					   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.date' =>$start_date1,'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
					   $appo = $this->Appointment->find('first', $optiona);
					   if(!empty($appo))
					   {

					   }
					   else
					   {
						$select.='<option value="'.$start_date1.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
					   }

					   $increase_time=$increase_end_time;
					   $timestamp = strtotime($increase_end_time) + 60*60;
					   $increase_end_time=date('H:i', $timestamp);

				}
				  }
				  elseif($n!=0 && $n<$no_of_days)
				  {
					$stop_date = date('Y-m-d', strtotime($start_date1 . ' + '.$n.' day'));


					for($ct=0;$ct<24;$ct++)
					{

					   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.date' =>$stop_date,'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
					   $appo = $this->Appointment->find('first', $optiona);
					   if(!empty($appo))
					   {

					   }
					   else
					   {
						$select.='<option value="'.$stop_date.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
					   }

					   $increase_time=$increase_end_time;
					   $timestamp = strtotime($increase_end_time) + 60*60;
					   $increase_end_time=date('H:i', $timestamp);
					}


				  }
				  else
				  {


					for($ct=0;$ct<$end_time_exp[0];$ct++)
					{

					   $optiona = array('conditions' => array('Appointment.event_id' => $eventch['UserEvent']['id'],'Appointment.date' =>$end_date1,'Appointment.fromtime' => $increase_time,'Appointment.is_accepted' => 1));
					   $appo = $this->Appointment->find('first', $optiona);
					   if(!empty($appo))
					   {

					   }
					   else
					   {
						$select.='<option value="'.$end_date1.'@'.$increase_time.'-'.$increase_end_time.'">'.$increase_time.' - '.$increase_end_time.'</option>';
					   }

					   $increase_time=$increase_end_time;
					   $timestamp = strtotime($increase_end_time) + 60*60;
					   $increase_end_time=date('H:i', $timestamp);

				  }
				  }
			 }
		   }
	  }

	  $select.='</select>';
	  $data['dropdown']=$select;

	  echo json_encode($data);
	  exit;
	}	
		
      
      public function searchForId($id, $array) {
   $c=0;
   foreach ($array as $key => $val) {
       if ($val['UserEvent']['timestamp'] == $id) {
           $c=1;
       }
   }
   return $c;
}
      
      public function dashboard() {
           $user_id=$this->Session->read('userid');
           $user_type=$this->Session->read('usertype');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
          $date=date('Y-m-d');
	$this->Session->write('video_sessionId','' );
        $this->Session->write('video_tokenId', '');
          $this->loadModel('Appointment'); 
          if($user_type == 'T'){
				$optionrequest = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>0,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$requests=$this->Appointment->find('all', $optionrequest);
				//debug($requests);
				
				$optionupcoming = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$upcoming_appointment=$this->Appointment->find('all', $optionupcoming);
				
				$optionrejected = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>2,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$rejected_appointment=$this->Appointment->find('all', $optionrejected);
				//debug($rejected_appointment);
				$this->set(compact('rejected_appointment','upcoming_appointment','requests','user_type'));
		  }else{
			  $this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
			  
			  $optionrequest = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>0,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
			  
				$openrequests=$this->Appointment->find('all', $optionrequest);
				
				
				//debug($openrequests);
				$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
				$optionupcoming = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$upcoming_appointment=$this->Appointment->find('all', $optionupcoming);
				
				$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
				$optionrejected = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>2,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$rejected_appointment=$this->Appointment->find('all', $optionrejected);
				
				$this->set(compact('openrequests','upcoming_appointment','rejected_appointment','user_type'));
			  
		  }
		  $this->set('chcksssion', $this->Session->read('is_online'));
		$this->Session->delete('is_online');
    }
    
    public function myclient() {
        $user_id=$this->Session->read('userid');
           $user_type=$this->Session->read('usertype');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
          $this->loadModel('Appointment'); 
          $client_list=array();
          $this->Appointment->unbindModel(array('hasMany' => array('VideochatSession')));
                                 //$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				
         $optionclient = array('conditions' => array('Appointment.request_to' => $user_id),'group'=>array('Appointment.user_id'));
        $client_list=$this->Appointment->find('all', $optionclient);
        $this->set(compact('client_list'));
        
    }
    
    public function therapist_dashboard() {
           $user_id=$this->Session->read('userid');
           $user_type=$this->Session->read('usertype');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
		
	/*if($this->Session->read('check_dash') == 0)
	{
		$this->Session->write('check_dash', 1);
exit;
		return $this->redirect(array('action' => 'therapist_dashboard'));
		
	}*/
          $date=date('Y-m-d');
	$this->Session->write('video_sessionId','' );
            $this->Session->write('video_tokenId', '');
          $this->loadModel('Appointment'); 
          if($user_type == 'T'){
				$optionrequest = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>0,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$requests=$this->Appointment->find('all', $optionrequest);
				//debug($requests);
				
				$optionupcoming = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$upcoming_appointment=$this->Appointment->find('all', $optionupcoming);
				
				$optionpayment = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date <'=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
                                $pending_payment=$this->Appointment->find('all', $optionpayment);
                                
				
				$optionrejected = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>2,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$rejected_appointment=$this->Appointment->find('all', $optionrejected);
				//debug($rejected_appointment);
                                $this->Appointment->unbindModel(array('hasMany' => array('VideochatSession')));
                                 //$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				
                                 $optionclient = array('conditions' => array('Appointment.request_to' => $user_id),'group'=>array('Appointment.user_id'));
                                $client_list=$this->Appointment->find('all', $optionclient);
                                
                               // pr($client_list);
                                
				$this->set(compact('rejected_appointment','upcoming_appointment','requests','user_type','pending_payment','client_list'));
		  }else{
			  $this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
			  
			  $optionrequest = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>0,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
			  
				$openrequests=$this->Appointment->find('all', $optionrequest);
				
				
				//debug($openrequests);
				$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
				$optionupcoming = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$upcoming_appointment=$this->Appointment->find('all', $optionupcoming);
				
				$this->Appointment->unbindModel(array('belongsTo' => array('User')));
				$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
				$optionrejected = array('conditions' => array('Appointment.type'=> 0,'Appointment.user_id' => $user_id,'Appointment.is_accepted'=>2,'Appointment.date >='=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
				$rejected_appointment=$this->Appointment->find('all', $optionrejected);
				
				$this->set(compact('openrequests','upcoming_appointment','rejected_appointment','user_type'));
			  
		  }
		  $this->set('chcksssion', $this->Session->read('is_online'));
			$this->Session->delete('is_online');
    }
    
    
    
    
    
     public function editprofile() {
           $user_id=$this->Session->read('userid');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
                        $this->loadModel('MultipleDemographic');
                        $this->loadModel('License');
                        $this->loadModel('Service');
        $options = array('conditions' => array('User.id' => $user_id));
        $usr = $this->User->find('first', $options);        
                        
        if ($this->request->is(array('post', 'put'))) {
			
			if(isset($this->request->data['User']['profile_image']['name']) && !empty($this->request->data['User']['profile_image']['name'])){

				$ext = explode('/',$this->request->data['User']['profile_image']['type']);
				if($ext){
					$uploadFolder = "profile_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path); 
						$this->request->data['User']['profile_image']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['User']['hid_profile_image']);
					} else{
					$this->request->data['User']['profile_image'] =$this->request->data['User']['hid_profile_image'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
						}
				}
			 } else {
				$this->request->data['User']['profile_image']=$this->request->data['User']['hid_profile_image'];
			}
			
			if(isset($this->request->data['User']['resume']['name']) && !empty($this->request->data['User']['resume']['name'])){

				$ext = explode('.',$this->request->data['User']['resume']['name']);
				if($ext){
					$uploadFolder = "resume";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('pdf','doc','docx');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['resume']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['resume']['tmp_name'],$full_image_path); 
						$this->request->data['User']['resume']=$imageName2;

						#exit;
						/*if($this->request->data['User']['hid_resume'])
						unlink($uploadPath. '/' .$this->request->data['User']['hid_resume']);*/
					} else{
					$this->request->data['User']['resume'] =$this->request->data['User']['hid_resume'];
						$this->Session->setFlash(__('Please uploade resume of .pdf, .doc or .docx format.'));
						return $this->redirect(array('action' => 'edit-profile'));
						}
				}
			 } else {
				$this->request->data['User']['resume']=$this->request->data['User']['hid_resume'];
			}
			
			 if($this->Session->read('usertype')=="C") {  

			if(isset($this->request->data['User']['insurance_card_pic']['name']) && !empty($this->request->data['User']['insurance_card_pic']['name'])){

				$ext = explode('/',$this->request->data['User']['insurance_card_pic']['type']);
				if($ext){
					$uploadFolder = "insurance_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['insurance_card_pic']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['insurance_card_pic']['tmp_name'],$full_image_path); 
						$this->request->data['User']['insurance_card_pic']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['User']['hid_insurance_card_pic']);
					} else{
					$this->request->data['User']['insurance_card_pic'] =$this->request->data['User']['hid_insurance_card_pic'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format for insurance card.'));
						}
				}
			 } else {
				$this->request->data['User']['insurance_card_pic']=$this->request->data['User']['hid_insurance_card_pic'];
			}
			}
			
			
                        $files='';
			if(isset($this->request->data['User']['images'][0]['name']) && !empty($this->request->data['User']['images'][0]['name'])){

		foreach ($this->request->data['User']['images'] as $image) { 
				$ext = explode('/',$image['type']);
				if($ext){
					$uploadFolder = "user_images";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','docx','doc','txt','pdf','xls','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName = time().'_'.(strtolower(trim($image['name'])));
						$full_image_path = $uploadPath . '/' . $imageName;
						 move_uploaded_file($image['tmp_name'],$full_image_path); 
						$files.=$imageName.',';

						#exit;
						//unlink($uploadPath. '/' .$this->request->data['User']['hidprofile_img']);
					} else{
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
						}
				}
			} } else {
				$this->request->data['User']['files'] =$this->request->data['User']['hidprofile_img'];
			}
			
			if(isset($this->request->data['User']['hidprofile_img']) && $this->request->data['User']['hidprofile_img']=='') {
				if ($files!='') {
				$this->request->data['User']['files']=rtrim($files,',');
				}
				else {
				$this->request->data['User']['files']="";
				} 
			
			} else {
				
				if ($files!='') {
				$this->request->data['User']['files']=$files.$this->request->data['User']['hidprofile_img'];
				} else {
					$this->request->data['User']['files']=$this->request->data['User']['hidprofile_img'];
				}
			}
                        
                        if($this->Session->read('usertype')=="T") {
                            if (isset($this->request->data['Demographic']['check']) && !empty($this->request->data['Demographic']['check'])) {
                                $this->MultipleDemographic->deleteAll(array('MultipleDemographic.user_id' => $user_id));
                                foreach($this->request->data['Demographic']['check'] as $key=>$check_val){
                                   // echo 12;
                                    $demo_data=array();
                                    $demo_data['MultipleDemographic']['user_id']=$user_id;
                                    $demo_data['MultipleDemographic']['service']=$this->request->data['Demographic']['id'][$key];
                                    $demo_data['MultipleDemographic']['rate']=$this->request->data['Demographic']['rate'][$key];
                                   // print_r($demo_data);
                                    $this->MultipleDemographic->create();
                                    $this->MultipleDemographic->save($demo_data);
                                    
                                }
                                
                            }else{
                                $this->Session->setFlash(__('Please select atleast one service'));
			        return $this->redirect(array('action' => 'edit-profile'));
                            }
                            
                            if (isset($this->request->data['License']['check']) && !empty($this->request->data['License']['check'])) {
                                $this->License->deleteAll(array('License.user_id' => $user_id));
                                $state_code_value="";
                                foreach($this->request->data['License']['check'] as $key=>$check_val){
                                   // echo 12;
                                    if(empty($state_code_value)){
                                        $state_code_value=$this->request->data['License']['state_code'][$key];
                                    }else{
                                        $state_code_value=$state_code_value.','.$this->request->data['License']['state_code'][$key];
                                    }
                                    $demo_data=array();
                                    $demo_data['License']['user_id']=$user_id;
                                    $demo_data['License']['state_id']=$this->request->data['License']['state_id'][$key];
                                    $demo_data['License']['state_number']=$this->request->data['License']['state_number'][$key];
                                    $uploadFolder = "state_images";
					$uploadPath = WWW_ROOT . $uploadFolder;
					
					$state_image=$this->request->data['License']['image'][$key];
                                        if(!empty($state_image['name'])){
                                            $full_image_path='';
                                            $imageName = time().'_'.(strtolower(trim($state_image['name'])));
                                            $full_image_path = $uploadPath . '/' . $imageName;
                                            move_uploaded_file($state_image['tmp_name'],$full_image_path); 
                                            $demo_data['License']['image']=$imageName;
                                        }else{
                                            $demo_data['License']['image']=$this->request->data['License']['hid_image'][$key];
                                        }

						#exit;
						//unlink($uploadPath. '/' .$this->request->data['User']['hidprofile_img']);
					
                                    
                                   // print_r($demo_data);
                                    $this->License->create();
                                    $this->License->save($demo_data);
                                    
                                }
                                $this->request->data['User']['state_licences']= $state_code_value;
                                
                            }
                            else{
                                $this->Session->setFlash(__('Please Provide your State License Number'));
			        return $this->redirect(array('action' => 'edit-profile'));
                            }
                        }
                        
			/*if (isset($this->request->data['User']['state_licences']) && !empty($this->request->data['User']['state_licences'])) {
			$this->request->data['User']['state_licences']=implode(",",$this->request->data['User']['state_licences']);
			}*/

				if (isset($this->request->data['User']['demographic']) && !empty($this->request->data['User']['demographic'])) {
				$this->request->data['User']['demographic']=implode(",",$this->request->data['User']['demographic']);
			}
                        
                        if (isset($this->request->data['User']['credential']) && !empty($this->request->data['User']['credential'])) {
				$this->request->data['User']['credential']=implode(",",$this->request->data['User']['credential']);
			}

			if (isset($this->request->data['User']['speciality']) && !empty($this->request->data['User']['speciality'])) {
				$this->request->data['User']['speciality']=implode(",",$this->request->data['User']['speciality']);
			}
			
			if (isset($this->request->data['User']['services']) && !empty($this->request->data['User']['services'])) {
				$this->request->data['User']['services']=implode(",",$this->request->data['User']['services']);
			}
                        if (isset($this->request->data['User']['language_served']) && !empty($this->request->data['User']['language_served'])) {
				$this->request->data['User']['language_served']=implode(",",$this->request->data['User']['language_served']);
			}

			/*if (isset($this->request->data['User']['insurance']) && !empty($this->request->data['User']['insurance'])) {
				$this->request->data['User']['insurance']=implode(",",$this->request->data['User']['insurance']);
			}*/
		$error=0;
		/*if (isset($this->request->data['User']['password']) && $this->request->data['User']['password']!='') {
			if ($this->request->data['User']['password']==$this->request->data['User']['con_password']) {
			
			$this->request->data['User']['password']=md5($this->request->data['User']['password']);
			}
			else {
			$error=1;
			}
		}
		else {
		$this->request->data['User']['password']=$this->request->data['User']['hidpassword'];
		}*/
		
		if ($error==0) {
		
				$this->User->id=$user_id;
			if(isset($this->request->data['User']['dob']) && !empty($this->request->data['User']['dob'])){
				$this->request->data['User']['dob']=date('Y-m-d',strtotime($this->request->data['User']['dob']));
			}
                        $this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
                        $checkemail = explode('@',$this->request->data['User']['email']);
                        if($checkemail[1]=='reachtherapy.me')
                        {
                        		$this->request->data['User']['is_approved'] = 1;
                        		$this->request->data['User']['gmail_username'] = $this->request->data['User']['email'];
                        }
			if ($this->User->save($this->request->data)) {
				if($this->Session->read('usertype')=="T" && $usr['User']['is_approved']==0 && $usr['User']['state_license_blank']==0) {
					 $this->loadModel('SiteSetting');
                	      $SITE_URL = Configure::read('SITE_URL');
				      $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
				      if($contact_email){
				              $adminEmail = $contact_email['SiteSetting']['admin_email'];
				      } else {
				              $adminEmail = 'info@reachtherapy.me';
				      }
				      $state_license = $this->GetStateLicense($user_id);
				      $link =Configure::read('SITELINK');
				      $license_msg_body = 'Hi Admin, <br/>Therapist '.$this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'].' has joined ReachTherapy.me and is awaiting approval. The details of the thereapist follow:<br/>*State : <b>'.$this->request->data['User']['state'].'.</b><br/>*Email : <b>'.$this->request->data['User']['email'].'.</b><br/>*State License : <b>'.$state_license.'.</b>.<br/><br/> Sincerely, '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';

				      App::uses('CakeEmail', 'Network/Email');

				    // App::uses('CakeEmail', 'Network/Email');

				      $Email = new CakeEmail('smtp');

				      #pass user input to function 
				      $Email->emailFormat('both');
				      //$Email->from(array($adminEmail => Configure::read('SITENAME')));
				      $Email->from(array($adminEmail => Configure::read('SITENAME')));
				      $Email->to($adminEmail);
				      $Email->subject('New Therapist has joined ReachTherapy.me');
				      $Email->send($license_msg_body);
				}
				   #$this->Session->setFlash(__('Your details have been saved.'));
                                   $this->Session->setFlash('Your details have been saved.','default', array('class' => 'success'));
				 
			        return $this->redirect(array('action' => 'edit-profile'));
                                //return $this->redirect(array('action' => 'calendar'));
			} else {
				$this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
				}
			} else {
			$this->Session->setFlash(__('password Not Matched'));
			return $this->redirect(array('action' => 'edit-profile'));
                        //return $this->redirect(array('action' => 'calendar'));
			}	
				
		} else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
            $this->request->data = $this->User->find('first', $options);
        }
        $services=array();
        $selected_services=array();
        $selected_license=array();
        $selected_license_id=array();
        $services=$this->MultipleDemographic->find('all',array('conditions'=>array('MultipleDemographic.user_id'=>$user_id)));
        
        $selected_license=$this->License->find('all',array('conditions'=>array('License.user_id'=>$user_id)));
        $license_check=count($selected_license);
        $license_popup=0;
        if(!empty($license_check)){
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
            $user_info = $this->User->find('first', $options);
            $license_popup=$user_info['User']['state_license_blank'];
            if($license_popup == 0){
                $state_license_data['User']['state_license_blank']=1;
                $state_license_data['User']['id']=$user_id;
                //$this->User->save($state_license_data);
                // send user email for  license has been verified.
                
                /*$this->loadModel('SiteSetting');
                
                $SITE_URL = Configure::read('SITE_URL');
                $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                if($contact_email){
                        $adminEmail = $contact_email['SiteSetting']['admin_email'];
                } else {
                        $adminEmail = 'contibute@info.com';
                }

                //$link =Configure::read('SITELINK').'users/confirm/'.base64_encode($lastInsetred['User']['id']);
                $link =Configure::read('SITELINK');
                $license_msg_body = 'Hi '.$user_info['User']['name'].', your state license and Certificate of Clinical Competence have been verified. You can now schedule, treat and bill clients on <a href="'.$link.'">ReachTherapy.me</a> by completing the following steps:<br/><br/><b>1. </b> Confirm you have a Google Chrome browser  <img src="https://www.google.com/chrome/assets/common/images/chrome_logo_2x.png" style="width: 123px; height:80px;" alt="Chrome">. If not, please download and install <a href="https://www.google.com/chrome/browser/desktop/index.html">Google Chrome</a> .<br/><br/><b>2. </b> Activate your free <a href="https://www.google.com/a/signup/invite?inviteToken=ALWunUOpzc7P5YYqwPhTCvv3J9EJ9iL9PnOfhxvZpUmVpGTmoko9RzHwVcxGSLxu3-FnmkUa1DZhuXJHlfyrft4pWasnXsvcphLZZNwQRLRBKd8L64JN4-w83C8fNtMADcg-PUePYeWv&hl=en">Google Apps for Work</a> account. Choose an email address and password to access your email, calendar and HIPAA compliant cloud storage. <b>Be sure to save your new @ReachTherapy.me email address and password. You will use these credentials to sign in to ReachTherapy.me.</b><br/><br/><b>3. </b>  Sign into ReachTherapy.me with your new user name and password by clicking <a href="'.$link.'users/login">here</a>.<br/><br/><b>4. </b>  Go to the Direct Deposit Tab and input your direct deposit bank information for your ReachTherapy.me earnings.<br/><br/><b>5. </b> Go to the Calendar Tab to schedule clients or availability for new clients. <b>New clients may only request appointments during your available times. </b><br/><br/><b>6. (Optional recommended step)</b> If you wish to share screens or applications with clients during sessions, download and install the <a href="http://www.realvnc.com/download/vnc/">remote desktop sever</a> for your operating system. This feature will connect clients to your computer\'s desktop display. The connection allows clients to control speech language applications, games and activities via ReachTherapy.me. The remote desktop connection is encrypted, browser to browser and HIPAA compliant. <br/><br/>Feel free to <a href="mailto:info@reachtherapy.me">contact us</a> with any questions or for help.<br/><br/> Sincerely, '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';

                App::uses('CakeEmail', 'Network/Email');

              // App::uses('CakeEmail', 'Network/Email');

                $Email = new CakeEmail('smtp');

                #pass user input to function 
                $Email->emailFormat('both');
                //$Email->from(array($adminEmail => Configure::read('SITENAME')));
                $Email->from(array($adminEmail => Configure::read('SITENAME')));
                $Email->to($user_info['User']['email']);
                $Email->subject('Your license has been verified - action required!');
                $Email->send($license_msg_body);*/
                
            }
        }
        if(!empty($services)){
            foreach($services as $key=>$val){
                //$selected_services[$val['MultipleDemographic']['service']]=$val['MultipleDemographic']['rate'];
                $selected_services[]=$val['MultipleDemographic']['service'];
            }
        }
        if(!empty($selected_license)){
            foreach($selected_license as $key=>$val){
                $selected_license_id[]=$val['License']['state_id'];
            }
        }
        //pr($selected_services)
       // pr($services);;
        $this->set('services', $services);
        $education_field=array('University','Degree','Years Attended');
        $this->set('education_field', $education_field); 
        $this->set('selected_license', $selected_license);
        $this->set('selected_license_id', $selected_license_id);
        $this->set('selected_services', $selected_services); 
         
        $this->loadModel('State');
        $this->set('state', $this->State->find('all'));
        $this->set('license_popup', $license_popup);
        $this->set('license_check', $license_check);
        $faq_link =Configure::read('SITELINK').'questions/listing';
        $this->set('faq_link', $faq_link);
        
         $this->loadModel('City');
        $this->set('cities', $this->City->find('list',array('conditions'=>array('City.state_code'=>$this->request->data['User']['state_id']),'fields'=>array('id','city'))));
        
        $this->loadModel('Demographic');
        $this->set('Demographic', $this->Demographic->find('list'));
        $this->set('all_services', $this->Service->find('all'));
        $this->loadModel('Insurance');
         $this->set('Insurance', $this->Insurance->find('list'));
        $this->loadModel('Speciality');
         $this->set('Speciality', $this->Speciality->find('list'));
        
    }
    

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }
        $states = $this->User->State->find('list');
        $cities = $this->User->City->find('list');
        $this->set(compact('states', 'cities'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
        $states = $this->User->State->find('list');
        $cities = $this->User->City->find('list');
        $this->set(compact('states', 'cities'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The client has been deleted.'));
        } else {
            $this->Session->setFlash(__('The client could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'editclient'));
    }

    public function admin_index() {

        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }
    
    public function get_state_name($id=null) {
        $this->loadModel('State');
        $State_res = $this->State->find('first', array(
            'conditions' => array('OR'=>array('State.state_code' => $id, 'State.id' => $id))
        ));
        $State_name='';
        if(count($State_res)>0 && !empty($State_res)){
            $State_name=$State_res['State']['state'];
        }
        return $State_name;
    }
    
    public function GetStateLicense($id=null) {
        $this->loadModel('License');
        $License_res = $this->License->find('all', array(
            'conditions' => array('License.user_id' => $id)
        ));
        $LicenceStr='';
        if(count($License_res)>0 && !empty($License_res)){
            foreach($License_res as $Res){
                $state_number=$Res['License']['state_number'];
                $state_id=$Res['License']['state_id'];
                if($state_id!=''){
                    $stateName=$this->get_state_name($state_id);
                }else{
                    $stateName='';
                }
                $LicenceStr.=$stateName.'#'.$state_number.'<br />';
            }
        }
        return $LicenceStr;
    }
    
    public function admin_list() {
        $this->loadModel('State');
        $this->User->recursive = 0;
		if((isset($_GET['search'])) && !empty($_GET['state_code'])){
			//$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1',"User.usertype"=>'T','OR' => array("User.state_licences ="=>'', "User.certifications_publications ="=>''),"User.state_id"=>$_GET['state_code'])));
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1', "User.is_approved"=>'0', "User.usertype"=>'T',"User.state_id"=>$_GET['state_code'])));
		}else{
			//$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1', 'OR' => array("User.state_licences ="=>'', "User.certifications_publications ="=>''), "User.usertype"=>'T')));
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1', "User.is_approved"=>'0', "User.usertype"=>'T')));
		}
		$all_states=$this->State->find('all');
		foreach($all_states as $state_val){
			$states[$state_val['State']['state_code']]=$state_val['State']['state'];
		}
		//pr($states);
		$this->set('states',$states);
		
    }
    
    public function admin_complete_list() {
        $this->loadModel('State');
        $this->User->recursive = 0;
		if((isset($_GET['search'])) && !empty($_GET['state_code'])){
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1',"User.usertype"=>'T',"User.state_licences !="=>'',"User.certifications_publications !="=>'',"User.state_id"=>$_GET['state_code'],"User.is_approved"=>'1',)));
		}else{
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1', "User.state_licences !="=>'',"User.certifications_publications !="=>'',"User.is_approved"=>'1', "User.usertype"=>'T')));
		}
		$all_states=$this->State->find('all');
		foreach($all_states as $state_val){
			$states[$state_val['State']['state_code']]=$state_val['State']['state'];
		}
		//pr($states);
		$this->set('states',$states);
		
    }
    
    public function admin_send_mail($id) {
        $this->autoLayout=null;
        $this->autoRender = false;
        //$UserID=$this->request->data['UserID'];
        $UserID=$id;
        $this->loadModel('User');
        if($UserID!=''){
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $UserID));
            $user_info = $this->User->find('first', $options);
            
            	  $state_license_data['User']['state_license_blank']=1;
		       $state_license_data['User']['id']=$UserID;
		       $this->User->save($state_license_data);
		       // send user email for  license has been verified.

		       $this->loadModel('SiteSetting');

		       $SITE_URL = Configure::read('SITE_URL');
		       $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
		       if($contact_email){
		               $adminEmail = $contact_email['SiteSetting']['admin_email'];
		       } else {
		               $adminEmail = 'info@reachtherapy.com';
		       }

		       //$link =Configure::read('SITELINK').'users/confirm/'.base64_encode($lastInsetred['User']['id']);
		       $link =Configure::read('SITELINK');
		       $license_msg_body = 'Hi '.$user_info['User']['name'].', your state license and Certificate of Clinical Competence have been verified. You can now schedule, treat and bill clients on <a href="'.$link.'">ReachTherapy.me</a> by completing the following steps:<br/><br/><b>1. </b> Confirm you have a Google Chrome browser  <img src="'.$link.'images/Google_Chrome.png" height="30px" width="30px" alt="Chrome">. If not, please download and install <a href="https://www.google.com/chrome/browser/desktop/index.html">Google Chrome</a> .<br/><br/><b>2. </b> Activate your free <a href="https://www.google.com/a/signup/invite?inviteToken=ALWunUOpzc7P5YYqwPhTCvv3J9EJ9iL9PnOfhxvZpUmVpGTmoko9RzHwVcxGSLxu3-FnmkUa1DZhuXJHlfyrft4pWasnXsvcphLZZNwQRLRBKd8L64JN4-w83C8fNtMADcg-PUePYeWv&hl=en">Google Apps for Work</a> account. Choose an email address and password to access your email, calendar and HIPAA compliant cloud storage. <b>Be sure to save your new @ReachTherapy.me email address and password. You will use these credentials to sign in to ReachTherapy.me.</b><br/><br/><b>3. </b>  <a href="'.$link.'users/login">Click Here</a> to return to site to login and change username/email of your new @reachTherapy.me gmail account . "Please update your email account with new username/email using the credentials created in Step .2 to activate your account".<br/><br/><b>4. </b>  Go to the Direct Deposit Tab and input your direct deposit bank information for your ReachTherapy.me earnings.<br/><br/><b>5. </b> Go to the Calendar Tab to schedule clients or availability for new clients. <b>New clients may only request appointments during your available times. </b><br/><br/><b>6. (Optional recommended step)</b> If you wish to share screens or applications with clients during sessions, download and install the <a href="http://www.realvnc.com/download/vnc/">remote desktop sever</a> for your operating system. This feature will connect clients to your computer\'s desktop display. The connection allows clients to control speech language applications, games and activities via ReachTherapy.me. The remote desktop connection is encrypted, browser to browser and HIPAA compliant. <br/><br/>Feel free to <a href="mailto:info@reachtherapy.me">contact us</a> with any questions or for help.<br/><br/> Sincerely, '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';

		       App::uses('CakeEmail', 'Network/Email');

		     // App::uses('CakeEmail', 'Network/Email');

		       $Email = new CakeEmail('smtp');

		       #pass user input to function 
		       $Email->emailFormat('both');
		       //$Email->from(array($adminEmail => Configure::read('SITENAME')));
		       $Email->from(array($adminEmail => Configure::read('SITENAME')));
		       $Email->to($user_info['User']['email']);
		       $Email->subject('Your license has been verified - action required!');
		       $Email->send($license_msg_body);
		       $this->Session->setFlash(__('Mail send successfully.'));
		       return $this->redirect(array('action' => 'admin_list'));
            
            
        }
		
    }
    
	public function admin_view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid User'));
		}
                $this->loadModel('License');
                $this->loadModel('Speciality');
                $this->loadModel('Demographic');
                
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $users=$this->User->find('first', $options);
		$LicenseOpt = array('conditions' => array('License.user_id' => $id));
                $License_data = $this->License->find('all', $LicenseOpt);
                $specialityStr=$users['User']['speciality'];
                $demographicStr=$users['User']['demographic'];
                if($specialityStr!=''){
                    if(strpos($specialityStr, ',')=== false){
                       $specialityArr=array($specialityStr); 
                    }else{
                        $specialityArr=array();
                        $specialityExpStr=explode(',', $specialityStr);
                        if(!empty($specialityExpStr) && count($specialityExpStr)>0){
                            foreach($specialityExpStr as $val){
                                if($val!=''){
                                    array_push($specialityArr, $val);
                                }
                            }
                        }
                    }
                    $SpecialityOpt = array('conditions' => array('Speciality.id' => $specialityArr));
                    $Speciality_data = $this->Speciality->find('all', $SpecialityOpt);
                }else{
                    $Speciality_data=array();
                }
                
                if($demographicStr!=''){
                    if(strpos($demographicStr, ',')=== false){
                       $demographicArr=array($demographicStr); 
                    }else{
                        $demographicArr=array();
                        $demographicExpStr=explode(',', $demographicStr);
                        if(!empty($demographicExpStr) && count($demographicExpStr)>0){
                            foreach($demographicExpStr as $Dem){
                                if($Dem!=''){
                                    array_push($demographicArr, $Dem);
                                }
                            }
                        }
                    }
                    $DemographicOpt = array('conditions' => array('Demographic.id' => $demographicArr));
                    $Demographic_data = $this->Demographic->find('all', $DemographicOpt);
                }else{
                    $Demographic_data=array();
                }
                //$this->set('users', $this->User->find('first', $options));
                $this->set(compact('License_data', 'users', 'Speciality_data', 'Demographic_data'));
                
	}

	public function admin_edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
                            
                                $SITE_URL = Configure::read('SITE_URL');

                                $this->loadModel('SiteSetting');

                                $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                                                                                        if($contact_email){
                                                                                                $adminEmail = $contact_email['SiteSetting']['admin_email'];
                                                                                        } else {
                                                                                                $adminEmail = 'contibute@info.com';
                                                                                        }

                                    $options = array('conditions' => array('User.id' => $id));
                                    $lastInsetred = $this->User->find('first', $options);
                                    $link =Configure::read('SITELINK').'users/edit-profile';
                                     $msg_body = "Hi ".$lastInsetred['User']['name'].",<br/><br/>Welcome to ".Configure::read('SITENAME')."<br/><br/>"
                                             . "Just click here to fill up your profile .<br/><br/> <a href='".$link."' class='button'>Click Me</a><br/><br/><p style='color:#000'>or click this link: ".$link."</p><br/><br/> Your gmail details with reachtherapy.me:<br/><br/>Username: ".$lastInsetred['User']['gmail_username']."<br/><br/>Password: ".$lastInsetred['User']['gmail_password']."<br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
                                    <style>.button{padding:20px;}</style>";
                                     //echo $msg_body;
                                     //exit;

                                    App::uses('CakeEmail', 'Network/Email');

                                  // App::uses('CakeEmail', 'Network/Email');

                                    $Email = new CakeEmail('smtp');

                                    #pass user input to function 
                                    $Email->emailFormat('both');
                                    $Email->from(array($adminEmail => Configure::read('SITENAME')));
                                    $Email->to($lastInsetred['User']['email']);
                                    $Email->subject('Welcome to ReachTherapy.me');
                                    $Email->send($msg_body);
                            
				$this->Session->setFlash(__('The User has been saved.'));
				//return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

	public function admin_delete($id = null,$action=null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid User'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => $action));
	}
    
    public function admin_client_list() {
		$this->loadModel('State');
        $this->User->recursive = 0;
		if((isset($_GET['search'])) && !empty($_GET['state_code'])){
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1',"User.usertype"=>'C',"User.state_id"=>$_GET['state_code'])));
		}else{
			$this->set('users', $this->Paginator->paginate('User', array('User.id <>' => '1',"User.usertype"=>'C')));
		}
		$all_states=$this->State->find('all');
		foreach($all_states as $state_val){
			$states[$state_val['State']['state_code']]=$state_val['State']['state'];
		}
		//pr($states);
		$this->set('states',$states);
    }
    
    
    public function admin_login() {


        if ($this->request->is('post')) {



            $options = array('conditions' => array('User.email' => $this->request->data['User']['email'], 'User.password' => md5($this->request->data['User']['password'])));
            $loginuser = $this->User->find('first', $options);





            if (!$loginuser) {
                $this->Session->setFlash(__('Invalid username or password, try again', 'default', array('class' => 'error')));
                return $this->redirect(array('action' => 'index'));
            } else {

                $this->Session->write('userid', $loginuser['User']['id']);
                $this->Session->write('username', $loginuser['User']['email']);

                $this->Session->setFlash(__('You have been successfully logged in', 'default', array('class' => 'success')));
                return $this->redirect(array('action' => '/list'));
            }
        }
    }
    
    public function searchresult(){
		$this->autoLayout = false;
		$condition=array();
		$search_data=array();
		$name=$_POST['name'];
		$state=$_POST['state'];
		$speciality=$_POST['specialization'];
		$srt_val=$_POST['srt_val'];
		//$city=$_POST['city'];
		$population_served=$_POST['population_served'];
		
		if(!empty($name)){
			$condition['AND'][]['User.name LIKE']="%$name%";
		}
		if(!empty($state)){
			$condition['AND'][]['User.state_id']=$state;
		}
		/*if(!empty($city)){
			$condition['AND'][]['User.city_id']=$city;
		}*/
		if(!empty($population_served)){
			if(isset($condition['AND'])){
				$cnt=count($condition['AND']);
			}else{
				$cnt=0;	
			}
			$cnt=count($condition['AND']);
			$condition['AND'][$cnt]['OR'][]['User.demographic LIKE']="%,$population_served";
			$condition['AND'][$cnt]['OR'][]['User.demographic LIKE']="%,$population_served,%";
			$condition['AND'][$cnt]['OR'][]['User.demographic LIKE']="$population_served,%";
			$condition['AND'][$cnt]['OR'][]['User.demographic']=$population_served;
		}
		if(!empty($speciality)){
			if(isset($condition['AND'])){
				$cnt=count($condition['AND']);
			}else{
				$cnt=0;	
			}
			$condition['AND'][$cnt]['OR'][]['User.speciality LIKE']="%,$speciality";
			$condition['AND'][$cnt]['OR'][]['User.speciality LIKE']="%,$speciality,%";
			$condition['AND'][$cnt]['OR'][]['User.speciality LIKE']="$speciality,%";
			$condition['AND'][$cnt]['OR'][]['User.speciality']=$speciality;
		}
		if(!empty($condition)){
			$condition['AND'][]['User.status']=1;
			$condition['AND'][]['User.usertype']='T';
			$condition['AND'][]['User.is_approved']=1;
			$this->User->recursive = 0;
			if(!empty($srt_val)){
				if($srt_val =="Rating"){
				$option=array('conditions'=>$condition,'order' => array('User.rating' => 'ASC'));
				}else if($srt_val =="Pay Rate"){
					$option=array('conditions'=>$condition,'order' => array('User.payment' => 'ASC'));
				}else if($srt_val =="Sort by"){
					$option=array('conditions'=>$condition);
				}
			}else{
				$option=array('conditions'=>$condition);
			}
			$search_data = $this->User->find('all', $option);			
		}else{
			$condition['User.status']=1;
			$condition['User.usertype']='T';
			$condition['User.is_approved']=1;
			if($srt_val !="Sort by"){
				if($srt_val =="Rating"){
				$option=array('conditions'=>$condition,'order' => array('User.rating' => 'ASC'));
				}else if($srt_val =="Pay Rate"){
					$option=array('conditions'=>$condition,'order' => array('User.payment' => 'ASC'));
				}
				$search_data = $this->User->find('all', $option);
			}
		}
		$this->set('users', $search_data);		
	}
	
	/*public function taskcalendar() {
		if($this->Session->read('userid')==''){
			  $this->Session->setFlash(__('please login'));
			  return $this->redirect(array('action' => 'login'));
		  }
      $this->loadModel('UserEvent');
	  $this->UserEvent->recursive = -1;
	  $currweekdate=date("Y-m-d");
	  $optionss = array('conditions' => array('UserEvent.user_id' => $this->Session->read('userid'),'UserEvent.start_time >='=>$currweekdate));
	  $eventch = $this->UserEvent->find('all', $optionss);
	  $this->set('events', $eventch);
  }*/

public function taskcalendar() {
		if($this->Session->read('userid')==''){
			  $this->Session->setFlash(__('please login'));
			  return $this->redirect(array('action' => 'login'));
		  }
		  $eventchfinal=array();
		$userid = $this->Session->read('userid');
      $this->loadModel('UserEvent');
      $this->loadModel('Appointment');
	  $this->UserEvent->recursive = -1;
	  $currweekdate=date("Y-m-d");
	  $optionss = array('conditions' => array('UserEvent.user_id' => $this->Session->read('userid'),'UserEvent.start_time >='=>$currweekdate));
	  $eventch = $this->UserEvent->find('all', $optionss);
	  
	  if(!empty($eventch)){
            foreach($eventch as $events)
            {
              $optionsappo = array('conditions' => array('Appointment.event_id' => $events['UserEvent']['id'],'Appointment.is_accepted' => 1));
              $appoch = $this->Appointment->find('all', $optionsappo);
              if(!empty($appoch))
              {
                $booked_arr=array();
                foreach($appoch as $appos)
                {
                  $booked_arr[]=strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']);
                }
              }
              //debug($appoch);
               if(!empty($appoch))
              {
               foreach($appoch as $appos)
                {

                  for($t=strtotime($events['UserEvent']['start_time']);$t<strtotime($events['UserEvent']['end_time']);$t=$t+1800)
                  {
                    $eventb=array();
                    $eventa=array();
                    if($t==strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']))
                    {
                      $eventb['UserEvent']['timestamp']=$t;
                      $eventb['UserEvent']['booked']='yes';
                      $eventb['UserEvent']['id']=$events['UserEvent']['id'];
                      $eventb['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                      $eventb['UserEvent']['eventname']='Available';
                      $eventb['UserEvent']['start_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['fromtime'];
                      $eventb['UserEvent']['end_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['totime'];
                      $eventb['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                    }
                    else
                    {
                      if(!in_array($t,$booked_arr))
                      {
                              $eventa['UserEvent']['timestamp']=$t;
                              $eventa['UserEvent']['booked']='no';
                              $eventa['UserEvent']['id']=$events['UserEvent']['id'];
                              $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                              $eventa['UserEvent']['eventname']='Available';
                              $eventa['UserEvent']['start_time']=date('Y-m-d H:i:s',$t);
                              $eventa['UserEvent']['end_time']=date('Y-m-d H:i:s',$t+1800);
                              $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                      }
                    }
                    if(!empty($eventa))
                    {
                      if($this->searchForId($eventa['UserEvent']['timestamp'],$eventchfinal)==0 )
                      {
                       $eventchfinal[]=$eventa;
                      }
                    }
                    if(!empty($eventb))
                    {
                      if($this->searchForId($eventb['UserEvent']['timestamp'],$eventchfinal)==0)
                      {
                       $eventchfinal[]=$eventb;
                      }
                    }
                  }


                }
              }
             else
              {
               $eventa['UserEvent']['timestamp']='';
               $eventa['UserEvent']['booked']='no';
               $eventa['UserEvent']['id']=$events['UserEvent']['id'];
               $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
               $eventa['UserEvent']['eventname']='Available';
               $eventa['UserEvent']['start_time']=$events['UserEvent']['start_time'];
               $eventa['UserEvent']['end_time']=$events['UserEvent']['end_time'];
               $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
               //debug($eventa);
               $eventchfinal[]=$eventa;
              }
            }
}
	 // pr($eventchfinal);
	  $this->set('events', $eventchfinal);
  }
  	
public function calendar() {
		if($this->Session->read('userid')==''){
			  $this->Session->setFlash(__('please login'));
			  return $this->redirect(array('action' => 'login'));
		  }
		  $eventchfinal=array();
		$userid = $this->Session->read('userid');
	$options = array('conditions' => array('User.id' => $userid));
	$user = $this->User->find('first', $options);	
      $this->loadModel('UserEvent');
      $this->loadModel('Appointment');
	  $this->UserEvent->recursive = 2;
	  $currweekdate=date("Y-m-d");
	  $optionss = array('conditions' => array('UserEvent.user_id' => $this->Session->read('userid'),'UserEvent.start_time >='=>$currweekdate));
	  $eventch = $this->UserEvent->find('all', $optionss);
	  
	  if(!empty($eventch)){
            foreach($eventch as $events)
            {
              $optionsappo = array('conditions' => array('Appointment.event_id' => $events['UserEvent']['id'],'Appointment.is_accepted' => 1));
              $appoch = $this->Appointment->find('all', $optionsappo);
              if(!empty($appoch))
              {
                $booked_arr=array();
                foreach($appoch as $appos)
                {
                  $booked_arr[]=strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']);
                }
              }
              //debug($appoch);
               if(!empty($appoch))
              {
               foreach($appoch as $appos)
                {

                  for($t=strtotime($events['UserEvent']['start_time']);$t<strtotime($events['UserEvent']['end_time']);$t=$t+1800)
                  {
                    $eventb=array();
                    $eventa=array();
                    if($t==strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']))
                    {
                      $eventb['UserEvent']['timestamp']=$t;
                      $eventb['UserEvent']['booked']='yes';
                      $eventb['UserEvent']['id']=$events['UserEvent']['id'];
                      $eventb['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                      $eventb['UserEvent']['eventname']='Available';
                      $eventb['UserEvent']['start_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['fromtime'];
                      $eventb['UserEvent']['end_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['totime'];
                      $eventb['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                    }
                    else
                    {
                      if(!in_array($t,$booked_arr))
                      {
                              $eventa['UserEvent']['timestamp']=$t;
                              $eventa['UserEvent']['booked']='no';
                              $eventa['UserEvent']['id']=$events['UserEvent']['id'];
                              $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                              $eventa['UserEvent']['eventname']='Available';
                              $eventa['UserEvent']['start_time']=date('Y-m-d H:i:s',$t);
                              $eventa['UserEvent']['end_time']=date('Y-m-d H:i:s',$t+1800);
                              $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                      }
                    }
                    if(!empty($eventa))
                    {
                      if($this->searchForId($eventa['UserEvent']['timestamp'],$eventchfinal)==0 )
                      {
                       $eventchfinal[]=$eventa;
                      }
                    }
                    if(!empty($eventb))
                    {
                      if($this->searchForId($eventb['UserEvent']['timestamp'],$eventchfinal)==0)
                      {
                       $eventchfinal[]=$eventb;
                      }
                    }
                  }


                }
              }
             else
              {
               $eventa['UserEvent']['timestamp']='';
               $eventa['UserEvent']['booked']='no';
               $eventa['UserEvent']['id']=$events['UserEvent']['id'];
               $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
               $eventa['UserEvent']['eventname']='Available';
               $eventa['UserEvent']['start_time']=$events['UserEvent']['start_time'];
               $eventa['UserEvent']['end_time']=$events['UserEvent']['end_time'];
               $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
               //debug($eventa);
               $eventchfinal[]=$eventa;
              }
            }
}
	 // pr($eventchfinal);
	  $this->set('events', $eventchfinal);
	  $this->set('user', $user);
  }
  
  public function seekingcalendar() {
      $this->loadModel('UserEvent');
	  $this->UserEvent->recursive = 0;
	  $currweekdate=date("Y-m-d");
	  $optionss = array('conditions' => array('UserEvent.start_time >='=>$currweekdate));
	  $eventch = $this->UserEvent->find('all', $optionss);
	  //debug($eventch);
	  $this->set('events', $eventch);
  }
  
  public function savecalenderdata(){


	$starttime = strtotime($_REQUEST['start']);
	$endime = strtotime($_REQUEST['end']);




	$strdt = $starttime;

	$str = date("Y-m-d H:i:s", $strdt);

	$endstr = $endime;
	$end = date("Y-m-d H:i:s", $endstr);
	
	$id = uniqid(rand());

	$this->loadModel('UserEvent');	

	$event['UserEvent']['eventname'] = "Available";
	$event['UserEvent']['start_time'] = $str;
	$event['UserEvent']['end_time'] = $end;
	$event['UserEvent']['unique_id'] = $id;
	$event['UserEvent']['user_id'] = $this->Session->read('userid');
	//$event['UserEvent']['recurring'] = 1;
	$this->UserEvent->create();
	if($this->UserEvent->save($event))
	{
		echo $data = str_replace(' ','T',$str).'|'.str_replace(' ','T',$end).'|'.$this->UserEvent->getLastInsertID();
	}
	exit;
}
	
	public function editcalenderdata(){

	$this->loadModel('UserEvent');
	$options = array('conditions' => array('UserEvent.user_id' => $this->Session->read('userid'),
	 'UserEvent.unique_id' => $_REQUEST['id']
	));

	$eventch = $this->UserEvent->find('all', $options);

	foreach($eventch as $ev){
	  $this->UserEvent->delete($ev['UserEvent']['id']);
	}

	$end = $endime = date('Y-m-d H:i:s', strtotime($_REQUEST['end']));
	$str = $starttime = date('Y-m-d H:i:s', strtotime($_REQUEST['strt']));



	$id = uniqid(rand());

	$event['UserEvent']['eventname'] = "Available";
	$event['UserEvent']['start_time'] = $str;
	$event['UserEvent']['end_time'] = $end;
	$event['UserEvent']['unique_id'] = $id;
	$event['UserEvent']['user_id'] = $this->Session->read('userid');
	//$event['UserEvent']['recurring'] = 1;


	$this->UserEvent->create();

	if($this->UserEvent->save($event))
	{
		echo $data = str_replace(' ','T',$str).'|'.str_replace(' ','T',$end).'|'.$this->UserEvent->getLastInsertID();
	}



	exit;
}

public function updateEventId($id=null,$eveId=null){
	$this->loadModel('UserEvent');
	$eve['UserEvent']['id'] = $id;
	$eve['UserEvent']['event_id'] = $eveId;
	$this->UserEvent->save($eve);
	exit;
}
	
	public function delcalenderdata(){
	$this->loadModel('UserEvent');
	$options = array('conditions' => array('UserEvent.user_id' => $this->Session->read('userid'),
	 'UserEvent.event_id' => $_REQUEST['id']
	));

	$eventch = $this->UserEvent->find('all', $options);

	foreach($eventch as $ev){
	//echo $ev['UserEvent']['id'];
	$this->UserEvent->delete($ev['UserEvent']['id']);
	}
	
	exit;
	}
	
	public function activateAppointment($id=null,$status=null) {
		$this->loadModel('Appointment');
		$this->loadModel('UserEvent');
                $this->loadModel('User');
                $this->loadModel('SiteSetting');
		//$id=$_POST['id'];
		$data['Appointment']['id']=$id;
		if($status == 'active')
		$data['Appointment']['is_accepted']=1;
		else
		$data['Appointment']['is_accepted']=2;
		if($this->Appointment->save($data))
		{
                    //$this->Appointment->recursive = -1;
                    $options = array('conditions'=>array('Appointment.id'=>$id));
                    $appointment = $this->Appointment->find('first',$options);
                    $Appointment_date=$appointment['Appointment']['date'];
                    $Appointment_fromtime=$appointment['Appointment']['fromtime'];
                    $Appointment_totime=$appointment['Appointment']['totime'];
                    $Client_name=$appointment['User']['name'];
                    $Client_email=$appointment['User']['email'];
                    $TherapistID = $this->Session->read('userid');
                    $TherapistEmail = $this->Session->read('email');
                    
                    $TheraOptions = array('conditions'=>array('User.id'=>$TherapistID));
                    $TherapistData = $this->User->find('first',$TheraOptions);
                    $TherapistName=$TherapistData['User']['name'];
                    if($Client_email!='' && $TherapistEmail!=''){
                        $SITE_URL = Configure::read('SITE_URL');
                        $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                        if($contact_email){
                            $adminEmail = $contact_email['SiteSetting']['admin_email'];
                        } else {
                            $adminEmail = 'contibute@info.com';
                        }
                        $msg_body = 'Hi '.$Client_name.'<br/><br/>You are scheduled for Speech Therapy with '.$TherapistName.' on '.$Appointment_date.' between '.$Appointment_fromtime.' to '.$Appointment_totime.'.<br/><br/>Laura Fuller
<br/> Founder at ReachTherapy Solutions and '.Configure::read('SITENAME').'<style>.button{padding:20px;}</style>';
                        //echo $msg_body;
                        App::uses('CakeEmail', 'Network/Email');
                        //$Email = new CakeEmail();
                        $Email = new CakeEmail('smtp');

                        #pass user input to function 
                        $Email->emailFormat('both');
                        $Email->from(array($adminEmail => Configure::read('SITENAME')));
                        //$Email->from(array($TherapistEmail => $TherapistName));
                        $Email->to($Client_email);
                        $Email->subject('Speech Appointment Reminder.');
                        $Email->send($msg_body);
                    }	
		}
		exit;
	}
	
    /*public function termscondition() {
	}
	public function privacypolicy() {
	}*/
    public function screenshare() {
		$this->autoLayout = false;
	}

	public function termscondition() {
		$this->loadModel('SiteSetting');

		$site_settings = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.therapy_terms','SiteSetting.client_terms')));
		$this->set(compact('site_settings'));
	}
	public function privacypolicy() {
		$this->loadModel('SiteSetting');

		$site_settings = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.privacy_policy')));
		$this->set(compact('site_settings'));
	}
	
		public function checkrequest(){
    $this->Session->delete('once');
   
    


    $this->loadModel('VideochatSession');
    
     $options = array('conditions' => array('VideochatSession.to' =>$this->Session->read('userid'),'VideochatSession.status' =>0,'VideochatSession.started'=>0,'VideochatSession.denied'=>0,'VideochatSession.finished'=>0));
$chk = $this->VideochatSession->find('first', $options);

if(!empty($chk)){
    $data=$chk['VideochatSession']['id']."|||";
    
    $this->loadModel('Appointment');
    
    $optionss = array('conditions' => array('Appointment.id' => $chk['VideochatSession']['appointment_id']));
$appointment = $this->Appointment->find('first', $optionss);

   
           $options = array('conditions' => array('User.id' => $chk['VideochatSession']['to']));
$touser = $this->User->find('first', $options);

 $optionsss = array('conditions' => array('User.id'  => $chk['VideochatSession']['from']));
$user = $this->User->find('first', $optionsss);
//pr($user);


$img='NoImageAvailable.jpg';
$data.='<h2 style="margin-top: 0; padding:2%; background-color:#4FA8FF; color: #fff; border-radius: 7px 7px 0 0;text-align: center">Request for video session</h2>
<ul class="calling_tab" style="position:relative;overflow: hidden; width:auto;">
    <li style="width:100%; height:auto; ">
                    
                    <div>
                        <div class="uimage_left_user" style="float:left; text-align: left; width:20%;margin-left:10px">';?>
                    <?php if(isset($user['User']['profile_image']) && $user['User']['profile_image']!=''){?>
                        <?php    $data.='<img src="'.($this->webroot).'profile_image/'.$user['User']['profile_image'].'" style="height:auto; width:auto; max-height: 120px; max-width:100%;" >';?>
                                <?php }else{?>
                             <?php    $data.='<img src="'.($this->webroot).'images/'.$img.'" style="height:auto; width:auto; max-height: 120px; max-width:100%;">';?>
                                <?php }
                             
                        $data.='</div> 
                    <div class="user_des_right" style="float:left; text-align: left; width:75%; margin-left: 10px;">
                        
                       <p class="h2_font" style="text-align:left; line-height:22px;">';
                   $data.=$user['User']['name'];
                       $data.='</p>
                       <p class="generl_txt" style="text-align:left; margin-top:0px!important; color:#6d6967;">
                           <label style="color:#6d6967;">Appoinment Title : </label>';?> 
                               <?php if($appointment['Appointment']['title']!=''){
                                   $data.= $appointment['Appointment']['title'];
                               
                               }
                            $data.='</p>';

                            if($appointment['Appointment']['context']!=''){
                      $data.= '<p style="text-align:left; max-height: 44px; overflow: auto; color:#6d6967;">Appoinment Description:   '.nl2br($appointment['Appointment']['context']).'</p>';
                  
                  } 
                        
                    $data.= ' <div style="clear:both;"></div></div>
                    
                    
                    
                     <div style="clear:both;"></div>
                    </div>
                    
                     
                    <div style="clear:both;"></div>
                    
                </li>';
                    
                    $location="location.href='".($this->webroot)."users/acceptsessionrequest/".$chk['VideochatSession']['id']."'";
$onlcik="$('#denyrsn').slideDown('slow'); $('#accptbtn').attr('disabled',true);$('#cnclbtn').attr('disabled',true);"; 

                $data.=' <li class="button_holder_div" style=" height:auto;width:100%; ">
                     
               <div style="width:auto; float:right; margin-bottom: 10px;" >
                        <div style="float:left; width: auto; margin-right: 4px;">';

                   
if($user['User']['usertype']=='T'){
$data.='<input type="button" onclick="'.$location.'" value="Accept" class="btn btn-success" style="float:none; cursor: pointer;" id="accptbtn">';
}else{
$data.='<input type="button" onclick="'.$location.'" value="Accept" class="btn btn-success" style="float:none; cursor: pointer;" id="accptbtn">';
}

$onlcik1="$('#denyrsn').slideUp('slow');$('.calling_tab').css('min-height','100px');$('#accptbtn').attr('disabled',false);$('#cnclbtn').attr('disabled',false); ";
    $data.='</div>
        
 <div style="float:right; width: auto; margin-right: 10px; text-align: right; margin-bottom:10px;">';
                    /*<input type="button" value="Cancel"  onclick="'.$onlcik.'" class="secondary secondary5" style="float:none; cursor: pointer;" id="cnclbtn">*/
                                   
                 $data.='</div>

                     <div style="clear:both;"></div>
                
                   
                
                

                </div>
                     <div id="denyrsn" style="margin:0 2% 2% 2%; display: none;">
                        <form action="'.($this->webroot).'users/denyrequest" method="post" id="rsnfrm">
                    <input type="hidden" value="'.$chk['VideochatSession']['id'].'" name="data[VideochatSession][id]">
                    <input type="hidden" value="1" name="data[VideochatSession][denied]">
                    
                    <div style="margin: 10px 3px;"><textarea style="height: 70px; padding:3px; font-size:16px; resize:none; width: 99%;" id="dentext" name="data[VideochatSession][deny_reason]"></textarea>
                        <div id="err_den" style="color:#ff0000;"></div>
                    </div>
                    <div style=" margin: 0 4px; width:auto; float:right; text-align: right;">
                    
					<input type="button" value="Send" class="send_btn" onclick="rsn();" style="margin-right: 10px !important;" >
					<input type="button" value="ab" class="secondary" onclick="'.$onlcik1.'" style="margin:0; float:right; margin-bottom:10px;" >
					
					</div>
                     </form>
                         <div style="clear:both;"></div>
                </div> 
                </li>
                
                <div style="clear:both;"></div>
            </ul>
           
<div style="clear:both;"></div>';  
echo json_encode($data);

}else{
    echo "0";
}
  exit;
}

public function acceptsessionrequest($id=null){
    $this->Session->delete('once');
         $this->loadModel('VideochatSession');
         $options = array('conditions' => array('VideochatSession.id' =>$id));
         $chk = $this->VideochatSession->find('first', $options);
         $this->Session->write('accepted', 1);
         $this->Session->write('requestsession', 0);
         
         $this->loadModel('Appointment');
         $apnmnt['Appointment']['id']=$chk['VideochatSession']['appointment_id'];
         $apnmnt['Appointment']['sesion_status'] =1;       
         $this->Appointment->save($apnmnt);
         
         
         $Site_url="https://reachtherapy.me/";
         //$Site_url="http://localhost/therapist/";
         $this->redirect("".$Site_url."OpenTokSDK/app/OpenTok/web/index1.php?vidID=".$id."&id=".$chk['VideochatSession']['from']."&appoinmentID=".$chk['VideochatSession']['appointment_id']);
         
         //$this->redirect($Site_url.'users/videosession/'.$chk['VideochatSession']['from'].'/'.$chk['VideochatSession']['appointment_id']);
         //$this->redirect("".$SITE_URL."OpenTokSDK/app/OpenTok/web/index1.php?vidID=".$id."&id=".base64_encode($chk['VideochatSession']['from'])."&appoinmentID=".base64_encode($chk['VideochatSession']['appointment_id']));
}

public function checkaccepted($id=null){
     $this->loadModel('VideochatSession');
     $options = array('conditions' => array('VideochatSession.id' =>$id));
     $chk = $this->VideochatSession->find('first', $options);

     
     if($chk['VideochatSession']['status']==1){
            $this->Session->write('video_sessionId',$chk['VideochatSession']['session_id'] );
            $this->Session->write('video_tokenId', $chk['VideochatSession']['token_id']);
            echo "1||0";exit;
     }
     if($chk['VideochatSession']['denied']==1){
             $this->Session->delete('requestsession');
            echo "2||".json_encode(nl2br($chk['VideochatSession']['deny_reason']));
            exit;
     }
     if($chk['VideochatSession']['status']==0){
             echo "0||0";exit;
     }
}

public function startingSession($id=null,$appoinmentID=null){
    $this->Session->delete('once');
     $this->Session->delete('requestsession');
    //$SITE_URL = Configure::read('SITE_URL');
    $Site_url="https://reachtherapy.me/";
    //$Site_url="http://localhost/therapist/";
     $this->redirect($Site_url.'users/videosession/'.$id.'/'.$appoinmentID);
}
	
	public function videosession($id=null,$appoinmentID=null,$sessId=null,$tokId=null,$vidID=null) {
            #echo $id.'--id<br/>';
            #echo $appoinmentID.'--appoinmentID<br/>';
            #echo $sessId.'--sessId<br/>';
            #echo $tokId.'--tokId<br/>';
            #echo $vidID.'--vidID<br/>';
            
		//$this->autoLayout = false;
		$user_id=$this->Session->read('userid');
	   $user_type=$this->Session->read('usertype');
	  if($user_id==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
          $folder_id='';
          if($user_type == 'T'){
            $this->loadModel('Folder');
            $folder=$this->Folder->find('first',array('conditions'=>array('Folder.user_therapiest'=>$user_id,'Folder.user_client'=>$id)));
            if(!empty($folder)){
                $folder_id = $folder['Folder']['google_id'];
            }
          }
          $this->set('folder_id', $folder_id);
	$this->Session->write('check_dash', 0);
	  $this->loadModel('VideochatSession');
		$optionssvideochat = array('conditions' => array('appointment_id' => $appoinmentID));
		$videochatsessiondata = $this->VideochatSession->find('first', $optionssvideochat);
                $this->set('videochatsessiondata',$videochatsessiondata);
		if($videochatsessiondata['VideochatSession']['finished']==1)
		{
			if($this->Session->read('usertype')=='T')
			{
				return $this->redirect(array('controller'=>'users','action' => 'therapist_dashboard'));  
			}
			else
			{
		  return $this->redirect(array('controller'=>'users','action' => 'dashboard'));  
			} 
		}
		if($videochatsessiondata['VideochatSession']['from']!=$this->Session->read('userid')  && $videochatsessiondata['VideochatSession']['to']!=$this->Session->read('userid')) 
		{
			 if($this->Session->read('usertype')=='T')
			{
				return $this->redirect(array('controller'=>'users','action' => 'therapist_dashboard'));  
			}
			else
			{
		  return $this->redirect(array('controller'=>'users','action' => 'dashboard'));  
			}   
		}
		
		$options = array('conditions' => array('User.id' => $id));
		$touser = $this->User->find('first', $options);

		 $optionsss = array('conditions' => array('User.id'=> $this->Session->read('userid')));
		$user = $this->User->find('first', $optionsss);

		$this->loadModel('Appointment');
		$optionss = array('conditions' => array('Appointment.id' => $appoinmentID));
		$appointment = $this->Appointment->find('first', $optionss);

		$this->loadModel('Note');
                $note_count = $this->Note->find('count', array('conditions' => array('Note.appointment_id' => $appoinmentID)));
                if($note_count == 0){
                    $note_data['Note']['appointment_id']=$appoinmentID;
                    $this->Note->create();
                    $this->Note->save($note_data);
                }
		$optionss = array('conditions' => array('Note.appointment_id' => $appoinmentID));
		$note = $this->Note->find('first', $optionss);
		
		$this->set('user', $user);
		$this->set('touser', $touser);
		$this->set('appointment', $appointment); 
		$this->set('note', $note); 
		 
		 if($this->Session->read('accepted')==1){
       $sessionId=$sessId;
       $tok=$tokId;
      $this->set('sessionId', $sessionId);
      $this->set('tok', $tok);
      
      
      $this->loadModel('VideochatSession');
		$optionssvid = array('conditions' => array('VideochatSession.appointment_id' => $appoinmentID,'VideochatSession.status' =>0,'VideochatSession.started'=>0,'VideochatSession.denied'=>0,'VideochatSession.finished'=>0));
	$vidsession = $this->VideochatSession->find('first', $optionssvid);
		  $this->Session->write('session_request',$vidsession['VideochatSession']['id'] );
		 
		  $appoin['VideochatSession']['id']=$vidsession['VideochatSession']['id'];
		   $appoin['VideochatSession']['session_id']=$sessionId;
			$appoin['VideochatSession']['token_id']=$tok;
			//$appoin['VideochatSession']['session_id']=1;
			//$appoin['VideochatSession']['token_id']=2;
			$appoin['VideochatSession']['status']=1;
			$appoin['VideochatSession']['started']=1;
			$appoin['VideochatSession']['start_time']=date("Y-m-d H:i:s");
		   
			 $this->VideochatSession->create();
		 if($this->VideochatSession->save($appoin)){
			  $this->Session->delete('accepted');
			  
			  $this->Session->write('video_sessionId',$sessionId );
		$this->Session->write('video_tokenId', $tok);
		
		$this->redirect('videosession/'.$id.'/'.$appoinmentID);
			 
		 }
		  
		  
		  
		
	 }else{
		  
		  $this->set('sessionId', $this->Session->read('video_sessionId'));
		  $this->set('tok', $this->Session->read('video_tokenId'));
		 
	 }
	}
	
	/*public function videosession1($id=null,$appoinmentID=null) {
		$this->Session->delete('once');
		$user_id=$this->Session->read('userid');
	   $user_type=$this->Session->read('usertype');
	  if($user_id==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$touser = $this->User->find('first', $options);
	  if($touser['User']['is_online']==0){
      $this->Session->write('is_online', 0);
      $this->redirect( Router::url( $this->referer(), true ) );
    
    }else{
      $this->Session->write('is_online', 1);
    }
     $this->loadModel('VideochatSession');
    $sql="(VideochatSession.to='".$id."'OR  VideochatSession.from='".$id."') AND VideochatSession.finished='0' AND VideochatSession.denied='0'";
    
     $options = array('conditions' => array($sql));
$chk = $this->VideochatSession->find('first', $options);

  //if(empty($chk)){
    
    $vid['VideochatSession']['appointment_id']=$appoinmentID;
    $vid['VideochatSession']['from']=$this->Session->read('userid');
    $vid['VideochatSession']['to']=$id;
    $vid['VideochatSession']['status']=0;
    
     $this->VideochatSession->create();
     
     if($this->VideochatSession->save($vid)){
        $this->Session->write('requestsession', 1);
        $this->Session->write('session_request', $this->VideochatSession->getLastInsertID());
        $this->redirect('videosession/'.$id.'/'.$appoinmentID);
     }
          
//}else{
    //$this->Session->setFlash('video session already taken', 'default', array('class' => 'success'));
    //$this->redirect( Router::url( $this->referer(), true ) );
//}     
	}*/

	public function videosession1($id=null,$appoinmentID=null) {
		$this->Session->delete('once');
		$user_id=$this->Session->read('userid');
	   $user_type=$this->Session->read('usertype');
	   $video_detail=array();
	   $this->loadModel('Appointment');
	  if($user_id==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
	$touser = $this->User->find('first', $options);
	  if($touser['User']['is_online']==0){
      $this->Session->write('is_online', 0);
      //$this->redirect( Router::url( $this->referer(), true ) );
	if($this->Session->read('usertype') == "T"){
	 return $this->redirect(array('action' => 'therapist_dashboard'));
	}else{
		return $this->redirect(array('action' => 'dashboard'));
	}
    
    }else{
      $this->Session->write('is_online', 1);
    }

     $this->loadModel('VideochatSession');
    $sql="(VideochatSession.to='".$id."'OR  VideochatSession.from='".$id."') AND VideochatSession.finished='0' AND VideochatSession.denied='0'";
    
     $options = array('conditions' => array($sql));
$chk = $this->VideochatSession->find('first', $options);
		$appo_data['Appointment']['id']=$appoinmentID;
		$appo_data['Appointment']['sesion_status']=0;
		$this->Appointment->save($appo_data);

$video_optionss = array('conditions' => array('VideochatSession.appointment_id' => $appoinmentID));
		$video_detail = $this->VideochatSession->find('first', $video_optionss);

  //if(empty($chk)){
    if(!empty($video_detail)){
		$vid['VideochatSession']['id']=$video_detail['VideochatSession']['id'];
		$vid['VideochatSession']['from']=$this->Session->read('userid');
		$vid['VideochatSession']['to']=$id;
		$vid['VideochatSession']['status']=0;
		$vid['VideochatSession']['started']=0;
		
	}else{
		$vid['VideochatSession']['appointment_id']=$appoinmentID;
		$vid['VideochatSession']['from']=$this->Session->read('userid');
		$vid['VideochatSession']['to']=$id;
		$vid['VideochatSession']['status']=0;
	}
    
     $this->VideochatSession->create();
     
     if($this->VideochatSession->save($vid)){
        $this->Session->write('requestsession', 1);
        $this->Session->write('endvideosession', 1);
        if(!empty($video_detail)){
			$this->Session->write('session_request', $video_detail['VideochatSession']['id']);
		}else{
			$this->Session->write('session_request', $this->VideochatSession->getLastInsertID());
		}	
        //echo $this->Session->read('requestsession');
        //echo $this->Session->read('endvideosession');
        //echo $this->Session->read('session_request');
        //exit;
        $this->redirect('videosession/'.$id.'/'.$appoinmentID);
     }
          
//}else{
    //$this->Session->setFlash('video session already taken', 'default', array('class' => 'success'));
    //$this->redirect( Router::url( $this->referer(), true ) );
//}     
	}

	public function abc() {
		$this->autoRender=false;
		$Site_url="https://reachtherapy.me/";
		 $this->redirect("".$Site_url."OpenTokSDK/app/OpenTok/web/index1.php?vidID=1&id=1&appoinmentID=1");

	}
	
	public function xyz($a=null,$b=null,$c=null,$d=null,$e=null) {
		$this->autoRender=false;
		echo $a.'<br>';
		echo $b.'<br>';
		echo $c.'<br>';
		echo $d.'<br>';
		echo $e.'<br>';

	}


public function saveScreenSharing($status=null) {
		$this->loadModel('VideochatSession');
		//$id=$_POST['id'];
		$data=array();
		$video_chat_id=$this->Session->read('session_request');
		$data['VideochatSession']['id']=$video_chat_id;		
		$data['VideochatSession']['screen_share_url']=$_POST['viewer_url'];	
		$data['VideochatSession']['screen_share_check']=1;		
		$data['VideochatSession']['screen_share_user']=$this->Session->read('userid');
		$this->VideochatSession->save($data);

		exit;
	}
	
	public function redirectScreenSharing() {
		$this->loadModel('VideochatSession');
		//$id=$_POST['id'];
		$data=array();
		$video_screen=array();
		$text="ok";
		$video_chat_id=$this->Session->read('session_request');
		$options = array('conditions' => array('VideochatSession.id' => $video_chat_id,'VideochatSession.screen_share_check'=>1));
		$video_screen = $this->VideochatSession->find('first', $options);
		if(!empty($video_screen)){
			if($video_screen['VideochatSession']['screen_share_user'] != $this->Session->read('session_request')){
				$text=$video_screen['VideochatSession']['screen_share_user'].'|||';
				$screen_url=$video_screen['VideochatSession']['screen_share_url'];
				$text.='<iframe width=100% height=100% src="'.$screen_url.'" frameborder="0" allowfullscreen></iframe>';
				$data['VideochatSession']['id']=$video_chat_id;
				$data['VideochatSession']['screen_share_check']=0;		
				$this->VideochatSession->save($data);
			}
		}
		echo $text;
		exit;
	}
	/*public function financial() {
		//App::import('Vendor','Stripe.php');
		App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$userid=$this->Session->read('userid');
		if($userid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.id' => $userid));
       $login_user_details=$this->User->find('first', $options);
       $data=array();
	  if ($this->request->is(array('post', 'put'))) {
		  Stripe::setApiKey("sk_live_xJCyI57qELARwzzRJ59BbCOd");
	  //debug($this->request->data);
		$stripe_token=$this->request->data['User']['stripeToken'];
		$customer = Stripe_Customer::create(array(
		  "source" => $stripe_token,
		  "description" => $login_user_details['User']['name'])
		);
		if(!empty($customer->id)){
			$data['User']['id']=$login_user_details['User']['id'];
			$data['User']['stripe_customer_id']=$customer->id;
			if($this->User->save($data)){
				$this->Session->setFlash(__('Successsfully Added'));
				return $this->redirect(array('action' => 'financial'));
			}else{
				$this->Session->setFlash(__('Invalid Stripe Token, Try Again'));
				return $this->redirect(array('action' => 'financial'));
			}
		}else{
			$this->Session->setFlash(__('Invalid Stripe Token, Try Again'));
		  return $this->redirect(array('action' => 'financial'));
		}
  }
	  
		 $this->set(compact('userid'));
	}*/

	public function financial() {
		//App::import('Vendor','Stripe.php');
		App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$userid=$this->Session->read('userid');
		$credit_card_details=array();
		$credit_card_data=array();
		$this->loadModel('CreditCard');
		//$stripe_api_key="sk_live_xJCyI57qELARwzzRJ59BbCOd";
                $stripe_api_key="sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD";
                //$stripe_api_key="sk_test_9ve4nRavWyK0gNGkWW5OsGg2";
                
				
		if($userid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.id' => $userid));
       $login_user_details=$this->User->find('first', $options);
       $data=array();
	  if ($this->request->is(array('post', 'put'))) {
		  Stripe::setApiKey($stripe_api_key);
	  //debug($this->request->data);
		$stripe_token=$this->request->data['User']['stripeToken'];
		$customer = Stripe_Customer::create(array(
		  "source" => $stripe_token,
		  "description" => $login_user_details['User']['name'])
		);
                $redirect_url = $this->request->data['HTTP_REFERER'];
		if(!empty($customer->id)){
			$data['CreditCard']['user_id']=$login_user_details['User']['id'];
			$data['CreditCard']['active']=1;
			$data['CreditCard']['stripe_customer_id']=$customer->id;
			if($this->CreditCard->save($data)){
				#$this->Session->setFlash(__('Successsfully Added'));
                                $this->Session->setFlash('Your details have been saved.','default', array('class' => 'success'));
                                #return $this->redirect(array('action' => 'financial'));
                                if($redirect_url!=''){
                                    $this->redirect($redirect_url);
                                }else{
                                    $this->redirect( Router::url( $this->referer(), true ) );
                                }
			}else{
				$this->Session->setFlash(__('Invalid Stripe Token, Try Again'));
				return $this->redirect(array('action' => 'financial'));
			}
		}else{
			$this->Session->setFlash(__('Invalid Stripe Token, Try Again'));
		  return $this->redirect(array('action' => 'financial'));
		}
  }
	  //$credit_card_details=$this->CreditCard->find('all', array('conditions' => array('CreditCard.user_id' => $userid)));
	  $credit_card_details=$this->CreditCard->find('first', array('conditions' => array('CreditCard.user_id' => $userid)));
	  #print_r($credit_card_details);
	  if(!empty($credit_card_details)){
		  /*foreach($credit_card_details as $credit_card_detail){
			  $credit_card_info=array();
			  $credit_card_customer_id="";
			  $credit_card_info['id']=$credit_card_detail['CreditCard']['id'];
			  $credit_card_info['user_id']=$credit_card_detail['CreditCard']['user_id'];
			  $credit_card_info['active']=$credit_card_detail['CreditCard']['active'];
			  $credit_card_customer_id=$credit_card_detail['CreditCard']['stripe_customer_id'];
			  if(!empty($credit_card_customer_id)){
				  Stripe::setApiKey($stripe_api_key);
				  $customer=Stripe_Customer::retrieve($credit_card_customer_id);
					//pr($customer->sources->data[0]);
					$credit_card_info['card_no']=$customer->sources->data[0]->last4;
					$credit_card_info['brand']=$customer->sources->data[0]->brand;
					$credit_card_info['card_type']=$customer->sources->data[0]->funding;
					$credit_card_info['exp_month']=$customer->sources->data[0]->exp_month;
					$credit_card_info['exp_year']=$customer->sources->data[0]->exp_year;
			  }
			  $credit_card_data[]=$credit_card_info;
		  }*/


		$credit_card_info=array();
		$credit_card_customer_id="";
		$credit_card_info['id']=$credit_card_details['CreditCard']['id'];
		$credit_card_info['user_id']=$credit_card_details['CreditCard']['user_id'];
		$credit_card_info['active']=$credit_card_details['CreditCard']['active'];
		$credit_card_customer_id=$credit_card_details['CreditCard']['stripe_customer_id'];
		if(!empty($credit_card_customer_id)){
		  Stripe::setApiKey($stripe_api_key);
		  $customer=Stripe_Customer::retrieve($credit_card_customer_id);
			//pr($customer->sources->data[0]);
			$credit_card_info['card_no']=$customer->sources->data[0]->last4;
			$credit_card_info['brand']=$customer->sources->data[0]->brand;
			$credit_card_info['card_type']=$customer->sources->data[0]->funding;
			$credit_card_info['exp_month']=$customer->sources->data[0]->exp_month;
			$credit_card_info['exp_year']=$customer->sources->data[0]->exp_year;
		}
		$credit_card_data=$credit_card_info;
	}
	//pr($credit_card_data);
  
	  
		 $this->set(compact('userid','credit_card_data'));
                 
                 $user_id=$this->Session->read('userid');
                  $user_type=$this->Session->read('usertype');
                  
                  $this->loadModel('Payment');
                  $this->Payment->unbindModel(array('belongsTo' => array('User')));
                $this->Payment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			        'foreignKey' => 'therapy_id','conditions' => '','fields' => '','order' => ''))));
                  if($user_type == 'C'){
                      $this->Paginator->settings=array(
                         'limit'=>8
                      );
                      $this->set('allpayment', $this->Paginator->paginate('Payment', array('Payment.client_id'  => $user_id)));
	          }
	}
	
	


	/*public function earning() {
		//App::import('Vendor','Stripe.php');
		//App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$userid=$this->Session->read('userid');
		if($userid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.id' => $userid));
       $login_user_details=$this->User->find('first', $options);
       $data=array();
	  if ($this->request->is(array('post', 'put'))) {
		//pr($this->request->data);
		//exit;
		
			//$data['User']['id']=$login_user_details['User']['id'];
			//$data['User']['bank_name']=$customer->id;
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Successsfully Added'));
				return $this->redirect(array('action' => 'earning'));
			}else{
				$this->Session->setFlash(__('Error, Try Again'));
				return $this->redirect(array('action' => 'earning'));
			}

  }
	  
		 $this->set(compact('userid'));
	}*/
        
        public function activities() {
            
        }

	public function earning() {
		//App::import('Vendor','Stripe.php');
		//App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$stripe_api_key="sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD";
                //$stripe_api_key="sk_live_xJCyI57qELARwzzRJ59BbCOd";
		$userid=$this->Session->read('userid');
		if($userid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $options = array('conditions' => array('User.id' => $userid));
	       $login_user_details=$this->User->find('first', $options);
               $first_name=$login_user_details['User']['first_name'];
               $last_name=$login_user_details['User']['last_name'];
	       $data=array();
	       $payment_details=array();
		if ($this->request->is(array('post', 'put'))) {
                        //pr($this->request->data);
                         //exit;
                        $token=$this->request->data['User']['stripeToken'];
                        unset($this->request->data['User']['stripeToken']);
                        $dob=explode('/',$this->request->data['User']['dob']);
                        $day=$dob[1];
                        $month=$dob[0];
                        $year=$dob[2];
                        $ssn=substr($this->request->data['User']['ssn'], -4);
			/*Stripe::setApiKey($stripe_api_key);
			$account = Stripe_Recipient::create(
			  array(
			    "country" => "US",
			    "managed" => true
			  )
			);
			print_r($account);
			print_r($this->request->data);
			exit;*/

			//$data['User']['id']=$login_user_details['User']['id'];
			//$data['User']['bank_name']=$customer->id;
                    if(empty($login_user_details['User']['account_id'])){
                        $email=$login_user_details['User']['email'];
                        //$email='nits.arif@gmail.com';
                        $url = 'https://api.stripe.com/v1/accounts'; 
                        $ch = curl_init($url);  
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$stripe_api_key));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'managed=true&country=US&email='.$email); 
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $result = curl_exec($ch); 
                        curl_close($ch);
                        //echo '<pre>';print_r($ch);
                        $decoded_result=json_decode($result);
                        //pr($decoded_result);
                        $account_id= $decoded_result->id;
                        $secret_key =  $decoded_result->keys->secret;
                        $publish_key =  $decoded_result->keys->publishable;
                        if(!empty($account_id)){
                            $user_data['User']['account_id']=$account_id;
                            $user_data['User']['secret_key']=$secret_key;
                            $user_data['User']['publish_key']=$publish_key;
                            $user_data['User']['id']=$userid;
                            $this->User->save($user_data);
                        }
                        //exit;
                    }
                    if(empty($login_user_details['User']['bank_id'])){
                        if(!empty($login_user_details['User']['account_id'])){
                            $acc_id=$login_user_details['User']['account_id'];
                        }else{
                            $acc_id=$account_id;
                        }
                        $url = 'https://api.stripe.com/v1/accounts/'.$acc_id.'/external_accounts'; 
                        $ch = curl_init($url);  
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$stripe_api_key));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'external_account='.$token); 
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $bank_data = curl_exec($ch); 
                        curl_close($ch);                        
                        $decoded_bank_data=json_decode($bank_data);
                        pr($decoded_bank_data);
                        $bank_id=$decoded_bank_data->id;
                        if(!empty($bank_id)){
                            $user_data=array();
                            $user_data['User']['bank_id']=$bank_id;                            
                            $user_data['User']['id']=$userid;
                            $user_data['User']['token_id']=$token;
                            $this->User->save($user_data);
                        }
                        //exit;
                        
                    }
                    if(!empty($login_user_details['User']['account_id'])){
                            $acc_id=$login_user_details['User']['account_id'];
                        }else{
                            $acc_id=$account_id;
                        }
                    
			$client_ip = $_SERVER['REMOTE_ADDR'];
			$current_date_time = time();
			$url = 'https://api.stripe.com/v1/accounts/'.$acc_id; 
			$ch = curl_init($url);  
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$stripe_api_key));
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'tos_acceptance[date]='.$current_date_time.'&tos_acceptance[ip]='.$client_ip); 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$edit_term_result = curl_exec($ch); 
			curl_close($ch);
			$decoded_edit_terms_result=json_decode($edit_term_result);
			

                    $url = 'https://api.stripe.com/v1/accounts/'.$acc_id; 
                    $ch = curl_init($url);  
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$stripe_api_key));
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'legal_entity[type]=individual&legal_entity[first_name]='.$first_name.'&legal_entity[last_name]='.$last_name.'&legal_entity[dob][day]='.$day.'&legal_entity[dob][month]='.$month.'&legal_entity[dob][year]='.$year.'&legal_entity[ssn_last_4]='.$ssn); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $edit_result = curl_exec($ch); 
                    curl_close($ch);
                    //echo '<pre>';print_r($ch);
                    $decoded_edit_result=json_decode($edit_result);
                       
                        
                        
                        $this->request->data['User']['dob']=date('Y-m-d',strtotime($this->request->data['User']['dob']));
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('Successsfully Added'));
				return $this->redirect(array('action' => 'earning'));
			}else{
				$this->Session->setFlash(__('Error, Try Again'));
				return $this->redirect(array('action' => 'earning'));
			}

		}
		$cur_date=time();
		$cur_mnth=date('m',$cur_date);
		$cur_year=date('Y',$cur_date);
		$this->loadModel('Payment');
		$option = array('conditions' => array('Payment.therapy_id' => $userid,'Payment.cur_month'=>$cur_mnth,'Payment.cur_year'=>$cur_year));	
		
       $payment_details=$this->Payment->find('all', $option);       
	 //pr($payment_details);
       $user_id=$this->Session->read('userid');
       $date=date('Y-m-d');
       $this->loadModel('Appointment');
       $optionpayment = array('conditions' => array('Appointment.type'=> 0,'Appointment.request_to' => $user_id,'Appointment.is_accepted'=>1,'Appointment.date <'=>$date),'order'=>'Appointment.date ASC,Appointment.fromtime ASC');
       $pending_payment=$this->Appointment->find('all', $optionpayment); 
       //pr($pending_payment);
       
		 $this->set(compact('userid','payment_details','login_user_details','pending_payment'));
	}
	
	
	
	public function financial_test() {
		//App::import('Vendor','Stripe.php');
		App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$userid=$this->Session->read('userid');
		if($userid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  
	 // Stripe::setApiKey("sk_live_xJCyI57qELARwzzRJ59BbCOd");
		//Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");
                //Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");
                //Stripe::setApiKey("sk_test_9ve4nRavWyK0gNGkWW5OsGg2");

		// Get the credit card details submitted by the form
		//$token = $_POST['stripeToken'];
		$token = "tok_16K6u5J4EdLukUPNTZkSaqsG";
		$customerId="cus_6XBH8g7tIBsp9P";
		// Create a Customer
		/*$customer = Stripe_Customer::create(array(
		  "source" => $token,
		  "description" => "Example customer")
		);
		debug($customer);
		echo $customer->id;*/
		// Charge the Customer instead of the card
		Stripe_Charge::create(array(
		  "amount" => 1000, # amount in cents, again
		  "currency" => "usd",
		  "customer" => $customerId)
		);

		// Save the customer ID in your database so you can use it later
		//saveStripeCustomerId($user, $customer->id);

		// Later...
		//s$customerId = getStripeCustomerId($user);

		Stripe_Charge::create(array(
		  "amount"   => 1500, # $15.00 this time
		  "currency" => "usd",
		  "customer" => $customerId)
		);
	  
		 //$this->set(compact('userid'));
		 		$this->autoRender=false;
	}
	
	/*public function getpayment($user_id=null,$other_id=null,$appointment_id=null,$session_id=null) {
		App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$loginid=$this->Session->read('userid');
		if($loginid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $client_id="";
	  $price=0;
	  $data=array();
	  $apnmnt=array();
	  $this->loadModel('VideochatSession');
		$options = array('conditions' => array('User.id' => $user_id));
		$first_user = $this->User->find('first', $options);

		 $optionsss = array('conditions' => array('User.id'=> $other_id));
		$second_user = $this->User->find('first', $optionsss);
		if(!empty($first_user)){
			if($first_user['User']['usertype']=='C'){
				$client_id=$first_user['User']['stripe_customer_id'];
			}
			if($first_user['User']['usertype']=='T'){
				$price=$first_user['User']['price']*100;
			}
		}
		if(!empty($second_user)){
			if($second_user['User']['usertype']=='C'){
				$client_id=$second_user['User']['stripe_customer_id'];
			}
			if($second_user['User']['usertype']=='T'){
				$price=$second_user['User']['price']*100;
			}
		}
		//$opt = array('conditions' => array('User.id' => $loginid));
		//$loginuser = $this->User->find('first', $opt);
		//$price=$loginuser['User']['price']*100;
		//$price= 150*100;
		if(!empty($client_id)){
			$option = array('conditions' => array('VideochatSession.id' => $session_id));
			$session_details = $this->VideochatSession->find('first', $option);
			if(!empty($session_details)){
				if($session_details['VideochatSession']['payment_status'] == 0)
				{
					Stripe::setApiKey("sk_test_9ve4nRavWyK0gNGkWW5OsGg2");
					Stripe_Charge::create(array(
					  "amount"   => $price,
					  "currency" => "usd",
					  "customer" => $client_id)
					);
					$data['VideochatSession']['id']=$session_details['VideochatSession']['id'];
					$data['VideochatSession']['payment_status']=1;
					$this->VideochatSession->save($data);
					$this->loadModel('Appointment');
					$apnmnt['Appointment']['id']=$session_details['VideochatSession']['appointment_id'];
					$apnmnt['Appointment']['type'] =1;
					$this->Appointment->save($apnmnt);
					$this->Session->setFlash('Payment sucessfully done','default', array('class' => 'success'));
				}else{
					$this->Session->setFlash('Payment already done','default', array('class' => 'success'));
					
				}
				
			}else{
				$this->Session->setFlash('Wrong video session','default', array('class' => 'error'));
			}
			
		}else{
			$this->Session->setFlash('Invalid stripe client id','default', array('class' => 'error'));
		}
		if($this->Session->read('usertype') == "T"){
			return $this->redirect(array('action' => 'therapist_dashboard'));
		}else{
			return $this->redirect(array('action' => 'dashboard'));
		}
		
	}*/
        
       /* $this->loadModel('SiteSetting');
		$this->loadModel('Appointment');
		$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => 1));
		$site_setting_detail = $this->SiteSetting->find('first', $options);
        $this->Appointment->unbindModel(array('belongsTo' => array('User')));
		$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
        $this->Appointment->recursive = 0;
        $appo_list = $this->Paginator->paginate('Appointment', array('Appointment.session_time <>' => ''));
        //pr($appo_list);
        $current_date=time();
        if(!empty($appo_list)){
			foreach($appo_list as $appo_list_key=>$appo_list_val){
				$user_reg_date="";
				$therapy_price="";
				$admin_price="";
				$trial_status="";
				$user_reg_date=strtotime($appo_list_val['User']['registerdate'])+($site_setting_detail['SiteSetting']['therapist_free_trial_day']*24*60*60);
				if($current_date < $user_reg_date){
					$trial_status="Free";
					//$therapy_price=$appo_list_val['User']['price']-$site_setting_detail['SiteSetting']['admin_commission'];
					//$admin_price=$site_setting_detail['SiteSetting']['admin_commission'];
				}else{
					if($appo_list_val['Appointment']['is_paid'] == 1){
						$trial_status="Paid";
					}else{
						$trial_status="Pending";
					}
					$therapy_price=$appo_list_val['User']['price']-$site_setting_detail['SiteSetting']['admin_commission'];
					$admin_price=$site_setting_detail['SiteSetting']['admin_commission'];
				}
				$appo_list[$appo_list_key]['Appointment']['trial_status']=$trial_status;
				$appo_list[$appo_list_key]['Appointment']['therapy_price']=$therapy_price;
				$appo_list[$appo_list_key]['Appointment']['admin_price']=$admin_price;
				//$appo_list[0]['Appointment']['trial_status']=$trial_status;
			}
		}*/

	public function getpayment($user_id=null,$other_id=null,$appointment_id=null,$session_id=null) {
		App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
		$loginid=$this->Session->read('userid');
		if($loginid==''){
		  $this->Session->setFlash(__('please login'));
		  return $this->redirect(array('action' => 'login'));
	  }
	  $client_id="";
	  $therapy_id="";
	  $seeker_id="";
	  $price=0;
	  $data=array();
	  $apnmnt=array();
	$cc_info=array();
	  $this->loadModel('VideochatSession');
	$this->loadModel('CreditCard');
        $this->loadModel('SiteSetting');
        $this->loadModel('Appointment');
        $this->loadModel('MultipleDemographic');
        $options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => 1));
	$site_setting_detail = $this->SiteSetting->find('first', $options);
        $app_option = array('conditions' => array('Appointment.id' => $appointment_id));
	$appointment_detail = $this->Appointment->find('first', $app_option);
        $ttl_min=$appointment_detail['Appointment']['session_time'];
        $first_price=0;
        $second_price=0;
        $ttl_min=explode('-',$ttl_min);
        $total_min=$ttl_min[0];
        if($total_min == 0){
            $first_price=1;
        }elseif($total_min < 30){
            $first_price=1;
        }else{
            $first_price= $total_min/30;
            $second_price= $total_min%30;
        }
        
        
	  $payment_data=array();
		$options = array('conditions' => array('User.id' => $user_id));
		$first_user = $this->User->find('first', $options);

		 $optionsss = array('conditions' => array('User.id'=> $other_id));
		$second_user = $this->User->find('first', $optionsss);
		if(!empty($first_user)){
			if($first_user['User']['usertype']=='C'){
				//$client_id=$first_user['User']['stripe_customer_id'];
				$seeker_id=$first_user['User']['id'];
				$client_mail=$first_user['User']['email'];
				$client_name=$first_user['User']['name'];
			}
			if($first_user['User']['usertype']=='T'){
				$price=$first_user['User']['price']*100;
				$therapy_id=$first_user['User']['id'];				
				$therapist_name=$first_user['User']['name'];
                                $reg_date=$first_user['User']['registerdate'];
                                $account_id=$first_user['User']['account_id'];
                                $legal_name = $first_user['User']['bank_legal_name'];
                                $bank_email = $first_user['User']['bank_email'];
                                $token_id = $first_user['User']['token_id'];
                                $type = 'individual';
			}
		}
		if(!empty($second_user)){
			if($second_user['User']['usertype']=='C'){
				//$client_id=$second_user['User']['stripe_customer_id'];
				$seeker_id=$second_user['User']['id'];
				$client_mail=$second_user['User']['email'];
				$client_name=$second_user['User']['name'];
			}
			if($second_user['User']['usertype']=='T'){
				$price=$second_user['User']['price']*100;
				$therapy_id=$second_user['User']['id'];
				$therapist_name=$second_user['User']['name'];
                                $reg_date=$second_user['User']['registerdate'];
                                $account_id=$second_user['User']['account_id'];
                                $legal_name = $first_user['User']['bank_legal_name'];
                                $bank_email = $first_user['User']['bank_email'];
                                $token_id = $first_user['User']['token_id'];
                                $type = 'individual';
			}
		}
		//$opt = array('conditions' => array('User.id' => $loginid));
		//$loginuser = $this->User->find('first', $opt);
		//$price=$loginuser['User']['price']*100;
		//$price= 150*100;
                $demo_option = array('conditions' => array('MultipleDemographic.service' => $appointment_detail['Appointment']['service_id'],'MultipleDemographic.user_id' =>$therapy_id));
                $service_rate = $this->MultipleDemographic->find('first', $demo_option);
                //pr($service_rate);
		$optioncc = array('conditions' => array('CreditCard.user_id' => $seeker_id,'CreditCard.active' => 1));
		$cc_info = $this->CreditCard->find('first', $optioncc);		
		$current_date=time();
		if(!empty($cc_info)){
			$client_id=$cc_info['CreditCard']['stripe_customer_id'];
		}
		
		if(!empty($client_id)){
			$option = array('conditions' => array('VideochatSession.id' => $session_id));
			$session_details = $this->VideochatSession->find('first', $option);
			if(!empty($session_details)){
				if($session_details['VideochatSession']['payment_status'] == 0)
				{
					//Stripe::setApiKey("sk_live_xJCyI57qELARwzzRJ59BbCOd");
					//Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");
                                        //Stripe::setApiKey("sk_test_9ve4nRavWyK0gNGkWW5OsGg2");
					/*Stripe_Charge::create(array(
					  "amount"   => $price,
					  "currency" => "usd",
					  "customer" => $client_id)
					);*/
                                       //$apiKey="sk_live_xJCyI57qELARwzzRJ59BbCOd";
                                       $apiKey="sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD";
                                        $price_rate = $service_rate['MultipleDemographic']['rate'];
                                        $per_min_price = $price_rate/30;
                                        $per_thirty_min_rate = $price_rate * $first_price;
                                        $extra_min_rate = $per_min_price * $second_price;
                                        $total_session_price = round($per_thirty_min_rate + $extra_min_rate);
                                        $user_reg_date=strtotime($reg_date)+($site_setting_detail['SiteSetting']['therapist_free_trial_day']*24*60*60);
                                        $url = 'https://api.stripe.com/v1/charges'; 
                                        $ch = curl_init($url);  
                                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
                                        
                                        
                                        if($current_date < $user_reg_date){
                                               
                                              // $price = $service_rate['MultipleDemographic']['rate']*100;
                                            $price = $total_session_price*100;
                                              
                                               curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$price.'&currency=usd&customer='.$client_id.'&destination='.$account_id); 
                                        }else{
                                            //$price=($service_rate['MultipleDemographic']['rate']-$site_setting_detail['SiteSetting']['admin_commission'])*100;
                                            $price=($total_session_price-$site_setting_detail['SiteSetting']['admin_commission'])*100;
                                            
                                            $owner_price = $site_setting_detail['SiteSetting']['admin_commission']*100;
                                            
                                            curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$price.'&currency=usd&customer='.$client_id.'&destination='.$account_id.'&application_fee='.$owner_price); 
                                            
                                        }
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        $data = curl_exec($ch); 
                                        curl_close($ch);
                                        $charge_data=json_decode($data);
                                        //echo $price.'<br>';
                                        //echo $client_id.'<br>';
                                        //echo $account_id.'<br>';
                                        //pr($charge_data);
                                        //exit;
                                        $application_fee_id='';
                                        $charge_id=$charge_data->id;
                                        if(!empty($charge_data->application_fee)){
                                            $application_fee_id=$charge_data->application_fee;
                                        }
                                        $refund_url=$charge_data->refunds->url;
                                        
///////////////Code for bank transfer start ////////////////////////////////
/*$url = 'https://api.stripe.com/v1/recipients'; 
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'name='.$legal_name.'&type='.$type.'&bank_account='.$token_id.'&email='.$bank_email.''); 
        $result = curl_exec($ch); 
        curl_close($ch);
        $decoded_result=json_decode($result);
        pr($decoded_result);
        
$turl = 'https://api.stripe.com/v1/transfers'; 
        $ch = curl_init($turl);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$price.'&currency=usd&recipient=acct_16cGOOFB9UC4W0q4&source_transaction=ch_16dZujLCAXeDoZVMi28cOBVt'); 
        $result = curl_exec($ch); 
        curl_close($ch);
        $decoded_result=json_decode($result);
        pr($decoded_result);  */                                       
///////////////Code for bank transfer end ////////////////////////////////                                       // pr($session_details);
                                        $data=array();
					$data['VideochatSession']['id']=$session_details['VideochatSession']['id'];
					$data['VideochatSession']['payment_status']=1;
					$this->VideochatSession->save($data);
					//$this->loadModel('Appointment');
					$apnmnt['Appointment']['id']=$session_details['VideochatSession']['appointment_id'];
					$apnmnt['Appointment']['type'] =1;
                                        $apnmnt['Appointment']['charge_id'] =$charge_id;
                                        $apnmnt['Appointment']['application_fee_id'] =$application_fee_id;
                                        $apnmnt['Appointment']['refund_url'] =$refund_url;
					$this->Appointment->save($apnmnt);
					$this->loadModel('Payment');
					$cur_dt=date('Y-m-d H:i:s', time());
					$mail_dt= date("m-d-Y H:i:s", strtotime($cur_dt));
		
					$payment_data['Payment']['therapy_id']=$therapy_id;
					$payment_data['Payment']['client_id']=$seeker_id;
					$payment_data['Payment']['payment']=$price/100;
					$payment_data['Payment']['cur_month']=date('m',strtotime($cur_dt));
					$payment_data['Payment']['cur_year']=date('Y',strtotime($cur_dt));
					$payment_data['Payment']['created_date']=$cur_dt;
					$this->Payment->save($payment_data);

					$payment_id = $this->Payment->getLastInsertId();
					$this->loadModel('SiteSetting');
					$SITE_URL = Configure::read('SITE_URL');



					$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
												if($contact_email){
													$adminEmail = $contact_email['SiteSetting']['admin_email'];
												} 

						
						$link =Configure::read('SITELINK').'users/paymentreceipt/'.base64_encode($payment_id);
						$msg_body = "Hi, ".$client_name."<br/><br/>$".($price/100)."  debited from your account<br/><br/>You have completed a session with ".$therapist_name."(therapist) on ".$mail_dt
								 . "<br/><br/> Just click here for payment detail.<br/><br/> <a href='".$link."' class='button'>Click Here</a><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
						<style>.button{padding:20px;}</style>";

						App::uses('CakeEmail', 'Network/Email');

						$Email = new CakeEmail('smtp');

						#pass user input to function 
						$Email->emailFormat('both');
						$Email->from(array($adminEmail => Configure::read('SITENAME')));
						$Email->to($client_mail);
						//$Email->to('nits.anup@gmail.com');
						$Email->subject('Payment Receipt Link');
						$Email->send($msg_body);

					$this->Session->setFlash('Payment sucessfully done','default', array('class' => 'success'));
				}else{
					$this->Session->setFlash('Payment already done','default', array('class' => 'success'));
					
				}
				
			}else{
				$this->Session->setFlash('Wrong video session','default', array('class' => 'success'));
			}
			
		}else{
			$this->Session->setFlash('Invalid stripe client id','default', array('class' => 'success'));
		}
		if($this->Session->read('usertype') == "T"){
			return $this->redirect(array('action' => 'therapist_dashboard'));
		}else{
			return $this->redirect(array('action' => 'dashboard'));
		}
		
	}
		

	public function seesionend($min=null,$sec=null) {
		$video_session_id=$this->Session->read('session_request');
		$data=array();
		$data_appo=array();
		$this->loadModel('VideochatSession');
		$this->loadModel('Appointment');
		$data['VideochatSession']['id']=$video_session_id;
		$data['VideochatSession']['finished']=1;
		$this->VideochatSession->save($data);
		$option = array('conditions' => array('VideochatSession.id' => $video_session_id));
		$session_details = $this->VideochatSession->find('first', $option);

		//$options = array('conditions' => array('Appointment.id' => $session_details['VideochatSession']['appointment_id']));
		//$session_details = $this->Appointment->find('first', $options);
		$data_appo['Appointment']['id']=$session_details['VideochatSession']['appointment_id'];
		$data_appo['Appointment']['session_time']=$min.'-'.$sec;
		$this->Appointment->save($data_appo);
		
		$this->Session->setFlash('Session ended','default', array('class' => 'success'));
		if($this->Session->read('usertype') == "T"){
			return $this->redirect(array('action' => 'therapist_dashboard'));
		}else{
			return $this->redirect(array('action' => 'dashboard'));
		}
		
	}
        
        public function seesiondestroyed($appointment_id=null,$min=null,$sec=null) {		
		//$data=array();
		$data_appo=array();		
		$this->loadModel('Appointment');		
		$data_appo['Appointment']['id']=$appointment_id;
		$data_appo['Appointment']['session_time']=$min.'-'.$sec;
		$this->Appointment->save($data_appo);
		
		//$this->Session->setFlash('Session ended','default', array('class' => 'success'));
		if($this->Session->read('usertype') == "T"){
			return $this->redirect(array('action' => 'therapist_dashboard'));
		}else{
			return $this->redirect(array('action' => 'dashboard'));
		}
		
	}

	public function getpaymentlist($month=null,$year=null) {
		
		$this->autoLayout=null;
		$userid=$this->Session->read('userid');
		$this->loadModel('Payment');
		$payment_details=array();
		$option = array('conditions' => array('Payment.therapy_id' => $userid,'Payment.cur_month'=>$month,'Payment.cur_year'=>$year));	
		
       $payment_details=$this->Payment->find('all', $option);       
	 //pr($payment_details);
		 $this->set(compact('userid','payment_details'));
	}

	public function makecreditcard($id=null) {
		$userid=$this->Session->read('userid');
		$this->loadModel('CreditCard');
		$this->CreditCard->updateAll(
			array('CreditCard.active' => 0), 
			array('CreditCard.user_id' => $userid)
		);
		$this->CreditCard->updateAll(
			array('CreditCard.active' => 1), 
			array('CreditCard.user_id' => $userid,'CreditCard.id' => $id)
		);
		exit;
	}

	public function howitworksclient() {
		$this->loadModel('SiteSetting');

		$site_settings = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.how_it_works_client')));
		$this->set(compact('site_settings'));
	}
	public function howitworkstherapist() {
		$this->loadModel('SiteSetting');

		$site_settings = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.how_it_works_therapist')));
		$this->set(compact('site_settings'));
	}
	
	public function client_profile($id=null) {
                $userid=  base64_decode($id);
                $login_id=$this->Session->read('userid');
                $responsibleParty=array();
                $client_list=array();
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
                $this->set('user', $this->User->find('first', $options));
                
                $this->loadModel('Folder');
                $folder_details = $this->Folder->find('first',array('conditions' => array('Folder.user_therapiest' => $this->Session->read('userid'), 'Folder.user_client' => $userid)));
                $client_options = array('conditions' => array('User.parent_id' => $userid));
		$client_list = $this->User->find('all', $client_options);
		$this->loadModel('ResponsibleParty');
		
		$optionss = array('conditions' => array('ResponsibleParty.user_id' => $userid));
		$responsibleParty = $this->ResponsibleParty->find('first', $optionss);	

		$this->loadModel('Note');
		$optionss = array('conditions' => array('Note.user_id' => $userid,'Note.request_to' => $login_id));
		$note = $this->Note->find('all', $optionss);
			
                $this->set(compact('folder_details','responsibleParty','client_list','note','userid'));
        }

	public function abctest() {
         $this->autoRender=false;
          
	echo date('d-m-Y H:i:s');
        
      
      }

	public function paymentreceipt($id=null) {
          $payment_id=  base64_decode($id);
          $this->autoLayout=false;
          //$login_id=$this->Session->read('userid');
          $this->loadModel('Payment');
          $options = array('conditions' => array('Payment.id' => $payment_id));
          $payment=$this->Payment->find('first', $options);
          $option = array('conditions' => array('User.id' => $payment['Payment']['therapy_id']));
         
		$therapist_user = $this->User->find('first', $option);
		 
		$therapist_name = $therapist_user['User']['name'];

		 $optionsss = array('conditions' => array('User.id'=> $payment['Payment']['client_id']));
		$client_user = $this->User->find('first', $optionsss);
		$client_name = $client_user['User']['name'];
          
        $this->set(compact('payment','therapist_name','client_name'));
        
      
      }

	public function paymentlist(){
          $user_id=$this->Session->read('userid');
          $user_type=$this->Session->read('usertype');
          if($user_id==''){
              $this->Session->setFlash(__('Please login'));
              return $this->redirect(array('controller'=>'users','action' => 'login'));  
          }
          $this->loadModel('Payment');
          $this->Payment->unbindModel(array('belongsTo' => array('User')));
				$this->Payment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'therapy_id','conditions' => '','fields' => '','order' => ''))));
          if($user_type == 'C'){
              $this->Paginator->settings=array(
                 'limit'=>8
              );
              $this->set('allpayment', $this->Paginator->paginate('Payment', array('Payment.client_id'  => $user_id)));
	  }
	  else
	  {
	      return $this->redirect(array('controller'=>'users','action' => 'index'));  
	  }
      }

	public function addChild() {
           $user_id=$this->Session->read('userid');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
          
	if ($this->request->is(array('post', 'put'))) {
		$this->request->data['ChildUser']['user_id']=$user_id;
		
		$this->loadModel('ChildUser');
		
	if ($this->ChildUser->save($this->request->data)) {
		
		   $this->Session->setFlash(__('Child info have been saved.'));
		 
		
	} else {
		$this->Session->setFlash(__('Child info could not be saved. Please, try again.'));
		}		
		
	} 
	return $this->redirect(array('action' => 'edit-profile'));
                
        
        
    }

	/*public function forgotPassword() {
           
          
	if ($this->request->is(array('post', 'put'))) {
		$email_id = $this->request->data['Forgot']['email'];
		$new_password=mt_rand();

		

		    $option=array('conditions'=>array('User.email'=>$email_id));
		$user_info=$this->User->find('first',$option);
//pr($user_info);die();
		    
		if(!empty($user_info))
		{
			$pass = md5($new_password);
			$data=array();
			$data['User']['id']=$user_info['User']['id'];
			$data['User']['password']=$pass;
			if($this->User->save($data)) {

			$SITE_URL = Configure::read('SITE_URL');
			$this->loadModel('SiteSetting');


			$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                        if($contact_email){
                                $adminEmail = $contact_email['SiteSetting']['admin_email'];
                        } else {

                        }

			    
			    $link =Configure::read('SITELINK').'users/login';
			     $msg_body = "Hi ".$user_info['User']['name'].",<br/><br/>Here is your new temporary password. Please login to your account by clicking on the link below to update your password.<br/><br/> Temp Password: ".$new_password. "<br/><br/> <a href='".$link."' class='button'>Click here to login</a><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
			    <style>.button{padding:20px;}</style>";

			    App::uses('CakeEmail', 'Network/Email');
//echo $msg_body;die();

			    $Email = new CakeEmail();

			    #pass user input to function 
			    $Email->emailFormat('both');
			    $Email->from(array($adminEmail => Configure::read('SITENAME')));
			    $Email->to($email_id);
			//$Email->to('nits.anup@gmail.com');
			    $Email->subject('ReachTherapy.me Forgot  Password');
			    $Email->send($msg_body);

			//$this->Session->setFlash(__('Please check your mail, you pasword has been changed to your mail.'));
                        $this->Session->setFlash('Please check your mail inbox. We have sent you a temporary password.','default', array('class' => 'success'));
		}
			
		
		}else{
			$this->Session->setFlash(__('This email does not match with your profile email.'));
		}	
		
	} 
	return $this->redirect(array('action' => 'login'));
                
        
        
    }*/

	public function forgotPassword() {
           
          
	if ($this->request->is(array('post', 'put'))) {
		$email_id = $this->request->data['Forgot']['email'];
		$new_password=mt_rand();

		

		    $option=array('conditions'=>array('User.email'=>$email_id));
		$user_info=$this->User->find('first',$option);
//pr($user_info);die();
		    
		if(!empty($user_info))
		{
			

			$SITE_URL = Configure::read('SITE_URL');
			$this->loadModel('SiteSetting');


			$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                        if($contact_email){
                                $adminEmail = $contact_email['SiteSetting']['admin_email'];
                        } else {

                        }

			    
			    $link =Configure::read('SITELINK').'users/new_password/'.base64_encode($user_info['User']['id']);
			     $msg_body = "Hi ".$user_info['User']['name'].",<br/><br/>Please click on the link below to change your password.<br/><br/> <a href='".$link."' class='button'>Click here</a><br/><br/><p style='color:#000'>or copy paste this link: ".$link."</p><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
			    <style>.button{padding:20px;}</style>";

			    App::uses('CakeEmail', 'Network/Email');
//echo $msg_body;die();

			    $Email = new CakeEmail('smtp');

			    #pass user input to function 
			    $Email->emailFormat('both');
			    $Email->from(array($adminEmail => Configure::read('SITENAME')));
			    $Email->to($email_id);
			//$Email->to('nits.anup@gmail.com');
			    $Email->subject('ReachTherapy.me Forgot  Password');
			    $Email->send($msg_body);

			//$this->Session->setFlash(__('Please check your mail, you pasword has been changed to your mail.'));
                        $this->Session->setFlash('Please check your mail.','default', array('class' => 'success'));
		
			
		
		}else{
			$this->Session->setFlash(__('This email does not match with your profile email.'));
		}	
		
	} 
	return $this->redirect(array('action' => 'login'));
                
        
        
    }

	public function clientparty() {
           $user_id=$this->Session->read('userid');
	$this->loadModel('ResponsibleParty');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
		$responsibleParty=array();
		$options = array('conditions' => array('ResponsibleParty.user_id' => $user_id));
		$responsibleParty = $this->ResponsibleParty->find('first', $options);
		if(empty($responsibleParty)){
			$data=array();
			$data['ResponsibleParty']['user_id']=$user_id;
			$this->ResponsibleParty->save($data);
			$options = array('conditions' => array('ResponsibleParty.user_id' => $user_id));
			$responsibleParty = $this->ResponsibleParty->find('first', $options);
		}

          
          		if ($this->request->is(array('post', 'put'))) {
			//pr($this->request->data);
			//exit;
			
			 if($this->Session->read('usertype')=="C") {  

			if(isset($this->request->data['ResponsibleParty']['insurance_card_image']['name']) && !empty($this->request->data['ResponsibleParty']['insurance_card_image']['name'])){

				$ext = explode('/',$this->request->data['ResponsibleParty']['insurance_card_image']['type']);
				if($ext){
					$uploadFolder = "insurance_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['ResponsibleParty']['insurance_card_image']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['ResponsibleParty']['insurance_card_image']['tmp_name'],$full_image_path); 
						$this->request->data['ResponsibleParty']['insurance_card_image']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['ResponsibleParty']['hid_insurance_card_pic']);
					} else{
					$this->request->data['ResponsibleParty']['insurance_card_image'] =$this->request->data['ResponsibleParty']['hid_insurance_card_image'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format for insurance card.'));
						}
				}
			 } else {
				$this->request->data['ResponsibleParty']['insurance_card_image']=$this->request->data['ResponsibleParty']['hid_insurance_card_image'];
			}
			}
			
			
                        
			
		//pr($this->request->data);
		//exit;	

			
		$error=0;
		
		
		if ($error==0) {
		
				
			if(!empty($responsibleParty)){
				$this->ResponsibleParty->id=$responsibleParty['ResponsibleParty']['id'];
			}
			if ($this->ResponsibleParty->save($this->request->data)) {
				
				   $this->Session->setFlash(__('Saved successfully.'));
				 
				return $this->redirect(array('action' => 'edit-profile'));
			} else {
				$this->Session->setFlash(__('Responsible party info could not be saved. Please, try again.'));
				return $this->redirect(array('action' => 'edit-profile'));
				}
			} 
				
		} 
		$this->set(compact('responsibleParty'));
                
        /*$this->loadModel('State');
        $this->set('state', $this->State->find('all'));
        
         $this->loadModel('City');
        $this->set('cities', $this->City->find('list',array('conditions'=>array('City.state_code'=>$this->request->data['User']['state_id']),'fields'=>array('id','city'))));*/
        
        
        
    }



public function editclient() {
           $user_id=$this->Session->read('userid');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
	$responsiblePartyArray=array();
	$clientArray=array();
	$this->loadModel('ResponsibleParty');
	$responsibleParty=array();
		$options = array('conditions' => array('ResponsibleParty.user_id' => $user_id));
		$responsibleParty = $this->ResponsibleParty->find('first', $options);
		if(empty($responsibleParty)){
			$data=array();
			$data['ResponsibleParty']['user_id']=$user_id;
			$this->ResponsibleParty->save($data);
			$options = array('conditions' => array('ResponsibleParty.user_id' => $user_id));
			$responsibleParty = $this->ResponsibleParty->find('first', $options);
		}
          
          		if ($this->request->is(array('post', 'put'))) {
//pr($this->request->data);
//exit;

			if($this->Session->read('usertype')=="C") {  

			if(isset($this->request->data['ResponsibleParty']['insurance_card_image']['name']) && !empty($this->request->data['ResponsibleParty']['insurance_card_image']['name'])){

				$ext = explode('/',$this->request->data['ResponsibleParty']['insurance_card_image']['type']);
				if($ext){
					$uploadFolder = "insurance_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['ResponsibleParty']['insurance_card_image']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['ResponsibleParty']['insurance_card_image']['tmp_name'],$full_image_path); 
						$this->request->data['ResponsibleParty']['insurance_card_image']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['ResponsibleParty']['hid_insurance_card_pic']);
					} else{
					$this->request->data['ResponsibleParty']['insurance_card_image'] =$this->request->data['ResponsibleParty']['hid_insurance_card_image'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format for insurance card.'));
						}
				}
			 } else {
				$this->request->data['ResponsibleParty']['insurance_card_image']=$this->request->data['ResponsibleParty']['hid_insurance_card_image'];
			}
			}
			$responsiblePartyArray['ResponsibleParty']=$this->request->data['ResponsibleParty'];
			if(!empty($responsibleParty)){
				$this->ResponsibleParty->id=$responsibleParty['ResponsibleParty']['id'];
				$responsiblePartyArray['ResponsibleParty']['id']=$responsibleParty['ResponsibleParty']['id'];
			}
			
			//pr($responsiblePartyArray);
//exit;
			if ($this->ResponsibleParty->save($responsiblePartyArray)) {
				
				   //$this->Session->setFlash(__('Saved successfully.'));
				 
				//return $this->redirect(array('action' => 'edit-profile'));
			} else {
				//$this->Session->setFlash(__('Responsible party info could not be saved. Please, try again.'));
				//return $this->redirect(array('action' => 'edit-profile'));
				}
			//} 
			//pr($this->request->data);
			//exit;
			$this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
			if(isset($this->request->data['User']['profile_image']['name']) && !empty($this->request->data['User']['profile_image']['name'])){

				$ext = explode('/',$this->request->data['User']['profile_image']['type']);
				if($ext){
					$uploadFolder = "profile_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path); 
						$this->request->data['User']['profile_image']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['User']['hid_profile_image']);
					} else{
					$this->request->data['User']['profile_image'] =$this->request->data['User']['hid_profile_image'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
						}
				}
			 } else {
				$this->request->data['User']['profile_image']=$this->request->data['User']['hid_profile_image'];
			}
			 if($this->Session->read('usertype')=="C") {  

			if(isset($this->request->data['User']['insurance_card_pic']['name']) && !empty($this->request->data['User']['insurance_card_pic']['name'])){

				$ext = explode('/',$this->request->data['User']['insurance_card_pic']['type']);
				if($ext){
					$uploadFolder = "insurance_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['insurance_card_pic']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['insurance_card_pic']['tmp_name'],$full_image_path); 
						$this->request->data['User']['insurance_card_pic']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['User']['hid_insurance_card_pic']);
					} else{
					$this->request->data['User']['insurance_card_pic'] =$this->request->data['User']['hid_insurance_card_pic'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format for insurance card.'));
						}
				}
			 } else {
				$this->request->data['User']['insurance_card_pic']=$this->request->data['User']['hid_insurance_card_pic'];
			}
			}
			
			
                        /*$files='';
			if(isset($this->request->data['User']['images'][0]['name']) && !empty($this->request->data['User']['images'][0]['name'])){

		foreach ($this->request->data['User']['images'] as $image) { 
				$ext = explode('/',$image['type']);
				if($ext){
					$uploadFolder = "user_images";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','docx','doc','txt','pdf','xls','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName = time().'_'.(strtolower(trim($image['name'])));
						$full_image_path = $uploadPath . '/' . $imageName;
						 move_uploaded_file($image['tmp_name'],$full_image_path); 
						$files.=$imageName.',';

						#exit;
						//unlink($uploadPath. '/' .$this->request->data['User']['hidprofile_img']);
					} else{
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
						}
				}
			} } else {
				$this->request->data['User']['files'] =$this->request->data['User']['hidprofile_img'];
			}
			
			if(isset($this->request->data['User']['hidprofile_img']) && $this->request->data['User']['hidprofile_img']=='') {
				if ($files!='') {
				$this->request->data['User']['files']=rtrim($files,',');
				}
				else {
				$this->request->data['User']['files']="";
				} 
			
			} else {
				
				if ($files!='') {
				$this->request->data['User']['files']=$files.$this->request->data['User']['hidprofile_img'];
				} else {
					$this->request->data['User']['files']=$this->request->data['User']['hidprofile_img'];
				}
			}*/

			if (isset($this->request->data['User']['demographic']) && !empty($this->request->data['User']['demographic'])) {
			$this->request->data['User']['demographic']=implode(",",$this->request->data['User']['demographic']);
		}

		if (isset($this->request->data['User']['speciality']) && !empty($this->request->data['User']['speciality'])) {
			$this->request->data['User']['speciality']=implode(",",$this->request->data['User']['speciality']);
		}

		if (isset($this->request->data['User']['insurance']) && !empty($this->request->data['User']['insurance'])) {
			$this->request->data['User']['insurance']=implode(",",$this->request->data['User']['insurance']);
		}
		$error=0;
		/*if (isset($this->request->data['User']['password']) && $this->request->data['User']['password']!='') {
			if ($this->request->data['User']['password']==$this->request->data['User']['con_password']) {
			
			$this->request->data['User']['password']=md5($this->request->data['User']['password']);
			}
			else {
			$error=1;
			}
		}
		else {
		$this->request->data['User']['password']=$this->request->data['User']['hidpassword'];
		}*/
		
		if ($error==0) {
		
				$this->User->id=$user_id;
			if(isset($this->request->data['User']['dob']) && !empty($this->request->data['User']['dob'])){
				$this->request->data['User']['dob']=date('Y-m-d',strtotime($this->request->data['User']['dob']));
			}
			$clientArray['User']=$this->request->data['User'];
			if ($this->User->save($clientArray)) {
				
                        //$this->Session->setFlash(__('Your details have been saved.'));
                        $this->Session->setFlash('Your details have been saved.','default', array('class' => 'success'));
                         #return $this->redirect(array('action' => 'editclient'));
                         return $this->redirect(array('action' => 'search'));
			} else {
				$this->Session->setFlash(__('Your details could not be saved. Please, try again.'));
				}
			} else {
			$this->Session->setFlash(__('password Not Matched'));
			#return $this->redirect(array('action' => 'editclient'));
                        return $this->redirect(array('action' => 'search'));
			}	
				
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
			$this->request->data = $this->User->find('first', $options);
		}
                
        $this->loadModel('State');
        $this->set('state', $this->State->find('all'));
        
         $this->loadModel('City');
        $this->set('cities', $this->City->find('list',array('conditions'=>array('City.state_code'=>$this->request->data['User']['state_id']),'fields'=>array('id','city'))));
        
        $this->loadModel('Demographic');
        $this->set('Demographic', $this->Demographic->find('list'));
        $this->loadModel('Insurance');
         $this->set('Insurance', $this->Insurance->find('list'));
        $this->loadModel('Speciality');
         $this->set('Speciality', $this->Speciality->find('list'));
         $client_options = array('conditions' => array('User.parent_id' => $user_id));
		$client_list = $this->User->find('all', $client_options);
	$this->set(compact('responsibleParty','client_list'));
        
    }
    
    public function updateclient() {
		$this->autoLayout=null;
		$this->loadModel('State');
		$user_id=$_POST['user_id'];
        $this->set('state', $this->State->find('all'));
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
		$this->request->data = $this->User->find('first', $options);
	}
	
	public function saveclient() {
           $user_id=$this->Session->read('userid');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
	$responsiblePartyArray=array();
	$clientArray=array();
	
          
          		if ($this->request->is(array('post', 'put'))) {
//pr($this->request->data);
//exit;

			
			
			
			
			$this->request->data['User']['name'] = $this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
			if(isset($this->request->data['User']['profile_image']['name']) && !empty($this->request->data['User']['profile_image']['name'])){

				$ext = explode('/',$this->request->data['User']['profile_image']['type']);
				if($ext){
					$uploadFolder = "profile_image";
					$uploadPath = WWW_ROOT . $uploadFolder;
					$extensionValid = array('jpg','jpeg','png','gif');
					if(in_array($ext[1],$extensionValid)){
						$imageName2 = time().'_'.(strtolower(trim($this->request->data['User']['profile_image']['name'])));
						$full_image_path = $uploadPath . '/' . $imageName2;
						 move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_image_path); 
						$this->request->data['User']['profile_image']=$imageName2;

						#exit;
						unlink($uploadPath. '/' .$this->request->data['User']['hid_profile_image']);
					} else{
					$this->request->data['User']['profile_image'] =$this->request->data['User']['hid_profile_image'];
						$this->Session->setFlash(__('Please uploade image of .jpg, .jpeg, .png or .gif format.'));
						}
				}
			 } else {
				$this->request->data['User']['profile_image']=$this->request->data['User']['hid_profile_image'];
			}
		
		$error=0;
		
		
		if ($error==0) {
		
				//$this->User->id=$user_id;
			if(isset($this->request->data['User']['dob']) && !empty($this->request->data['User']['dob'])){
				$this->request->data['User']['dob']=date('Y-m-d',strtotime($this->request->data['User']['dob']));
			}
			$clientArray['User']=$this->request->data['User'];
			if ($this->User->save($clientArray)) {
				
				   $this->Session->setFlash(__('Successfully saved.'));
				 
				return $this->redirect(array('action' => 'editclient'));
			} else {
				$this->Session->setFlash(__('client details could not be saved. Please, try again.'));
				}
			} else {
			$this->Session->setFlash(__('password Not Matched'));
			return $this->redirect(array('action' => 'editclient'));
			}	
				
		} else {
			//$options = array('conditions' => array('User.' . $this->User->primaryKey => $user_id));
			//$this->request->data = $this->User->find('first', $options);
		}
                
        
        
    }
    
    public function createclient() {
     $user_id=$this->Session->read('userid');
     if($user_id==''){
     $this->Session->setFlash(__('please login'));
     return $this->redirect(array('action' => 'login'));
     }      
     if ($this->request->is(array('post', 'put'))) {
		 //pr($this->request->data);
		// exit;
     if(!empty($this->request->data['User']['profile_image']['name'])){
     $pathpart=pathinfo($this->request->data['User']['profile_image']['name']);
     $ext=$pathpart['extension'];
     $extensionValid = array('jpg','jpeg','png','gif');
     if(in_array(strtolower($ext),$extensionValid)){
     $uploadFolder = "profile_image";
     $uploadPath = WWW_ROOT . $uploadFolder;	
     $filename =uniqid().'.'.$ext;
     $full_flg_path = $uploadPath . '/' . $filename;
     move_uploaded_file($this->request->data['User']['profile_image']['tmp_name'],$full_flg_path);
     $this->request->data['User']['profile_image'] = $filename;
     }
    else{
    $this->Session->setFlash(__('Invalid image type.'));
    return $this->redirect(array('action' => 'editclient'));	
    }
    }else{
    $this->request->data['User']['profile_image']="";	
     }
     
     $this->request->data['User']['name']=$this->request->data['User']['first_name'].' '.$this->request->data['User']['last_name'];
     $this->request->data['User']['usertype']='C';
     $this->request->data['User']['parent_id']=$user_id;
    if(isset($this->request->data['User']['dob']) && !empty($this->request->data['User']['dob'])){
     $this->request->data['User']['dob']=date('Y-m-d',strtotime($this->request->data['User']['dob']));
     }
     $this->request->data['User']['registerdate'] = date('Y-m-d H:i:s');
     $this->request->data['User']['status'] = 1;

     $this->User->create();
     if($this->User->save($this->request->data)){
     $this->Session->setFlash(__('This client saved successfully.'));
     return $this->redirect(array('action' => 'editclient'));	     }
     
     
     
     }
     
        
    exit;    
        
    }
    
    public function downloadtherapist($search_code=null) {
    $i=1; 
		$this->loadModel('State');
		if(!empty($search_code)){
		$therapists=$this->User->find("all",array('conditions'=>array('User.usertype'=>'T','User.state_id'=>$search_code)));
	}else{
		$therapists=$this->User->find("all",array('conditions'=>array('User.usertype'=>'T')));
	}
    //$therapists=$this->User->find("all",array('conditions'=>array('User.usertype'=>'T')));
	//pr($therapists);
	//exit;
    $output='';
    $output ='SL NO,Name,Email,Phone,Registration Date,DOB,State';
    $output .="\n"; 
   
    foreach ($therapists as $therapy){
		$state='';
		if(!empty($therapy['User']['state_id'])){
			$state_name=$this->State->find("first",array('conditions'=>array('State.state_code'=>$therapy['User']['state_id'])));
			$state=$state_name['State']['state'];
		}
      $output .='"'.$i++.'","'.$therapy['User']['name'].'","'.$therapy['User']['email'].'","'.$therapy['User']['phone'].'","'.date('m-d-Y',strtotime($therapy['User']['registerdate'])).'","'.$therapy['User']['dob'].'","'.$state.'"';    
      $output .="\n"; 
    }
     $filename = "therapist".date('d-m-Y').'.'.'csv';
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;   
    exit;    
        
        
    }
    public function downloadclient($search_code=null) {
    $i=1;    
	$this->loadModel('State');
	if(!empty($search_code)){
		$therapists=$this->User->find("all",array('conditions'=>array('User.usertype'=>'C','User.state_id'=>$search_code)));
	}else{
		$therapists=$this->User->find("all",array('conditions'=>array('User.usertype'=>'C')));
	}
    $output='';
    $output ='SL NO,Name,Email,Phone,Registration Date,DOB,State';
    $output .="\n"; 
   
    foreach ($therapists as $therapy){
		$state='';
		if(!empty($therapy['User']['state_id'])){
			$state_name=$this->State->find("first",array('conditions'=>array('State.state_code'=>$therapy['User']['state_id'])));
			$state=$state_name['State']['state'];
		}
      $output .='"'.$i++.'","'.$therapy['User']['name'].'","'.$therapy['User']['email'].'","'.$therapy['User']['phone'].'","'.date('m-d-Y',strtotime($therapy['User']['registerdate'])).'","'.$therapy['User']['dob'].'","'.$state.'"';    
      $output .="\n"; 
    }
     $filename = "client".date('d-m-Y').'.'.'csv';
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);

echo $output;   
    exit;    
        
        
    }

	public function admin_appointmentlist() {
		$this->loadModel('SiteSetting');
		$this->loadModel('Appointment');
		$options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => 1));
		$site_setting_detail = $this->SiteSetting->find('first', $options);
        $this->Appointment->unbindModel(array('belongsTo' => array('User')));
		$this->Appointment->bindModel(array('belongsTo' => array('User' => array('className' => 'User',
			'foreignKey' => 'request_to','conditions' => '','fields' => '','order' => ''))));
        $this->Appointment->recursive = 0;
        $appo_list = $this->Paginator->paginate('Appointment', array('Appointment.session_time <>' => ''));
        //pr($appo_list);
        $current_date=time();
        if(!empty($appo_list)){
			foreach($appo_list as $appo_list_key=>$appo_list_val){
				$user_reg_date="";
				$therapy_price="";
				$admin_price="";
				$trial_status="";
				$user_reg_date=strtotime($appo_list_val['User']['registerdate'])+($site_setting_detail['SiteSetting']['therapist_free_trial_day']*24*60*60);
				if($current_date < $user_reg_date){
					$trial_status="Free";
					//$therapy_price=$appo_list_val['User']['price']-$site_setting_detail['SiteSetting']['admin_commission'];
					//$admin_price=$site_setting_detail['SiteSetting']['admin_commission'];
				}else{
					if($appo_list_val['Appointment']['is_paid'] == 1){
						$trial_status="Paid";
					}else{
						$trial_status="Pending";
					}
					$therapy_price=$appo_list_val['User']['price']-$site_setting_detail['SiteSetting']['admin_commission'];
					$admin_price=$site_setting_detail['SiteSetting']['admin_commission'];
				}
				$appo_list[$appo_list_key]['Appointment']['trial_status']=$trial_status;
				$appo_list[$appo_list_key]['Appointment']['therapy_price']=$therapy_price;
				$appo_list[$appo_list_key]['Appointment']['admin_price']=$admin_price;
				//$appo_list[0]['Appointment']['trial_status']=$trial_status;
			}
		}
        //pr($appo_list);
        //exit;
        
        $this->set(compact('appo_list'));
    }
    
    public function admin_payment($id = null) {
		$this->loadModel('Appointment');
		$this->Appointment->id = $id;
		if (!$this->Appointment->exists()) {
			throw new NotFoundException(__('Invalid Appointment'));
		}
		//if ($this->request->is(array('post', 'put'))) {
			$data['Appointment']['id']=$id;
			$data['Appointment']['is_paid']=1;
			if ($this->Appointment->save($data)) {
				$this->Session->setFlash(__('Successfully saved.'));
				//return $this->redirect(array('action' => 'admin_index'));
			} else {
				$this->Session->setFlash(__('Please, try again.'));
			}
		//}
		
		return $this->redirect(array('action' => 'appointmentlist'));
	}
	

 	public function appointmentnew() {

	}

	public function takenotes(){
		if ($this->request->is(array('post'))){
			//pr($this->request->data);
			$this->loadModel('Note');
			if($this->request->data['noteid']!=''){
				$this->request->data['Note']['id'] = $this->request->data['noteid'];
			}
			$this->request->data['Note']['appointment_id'] = $this->request->data['appointment_id'];
			$this->request->data['Note']['user_id'] = $this->request->data['user_id'];
			$this->request->data['Note']['request_to'] = $this->request->data['request_to'];
			$this->request->data['Note']['subjective'] = $this->request->data['subjective'];
			$this->request->data['Note']['objective'] = $this->request->data['objective'];
			$this->request->data['Note']['assessment'] = $this->request->data['assessment'];
			$this->request->data['Note']['plan'] = $this->request->data['plan'];
			$this->request->data['Note']['date'] = date('Y-m-d H:i:s');
			if ($this->Note->save($this->request->data)) {
				if($this->request->data['noteid']!=''){
					echo $this->request->data['noteid'];
				} else {
					echo $inserId = $this->Note->getLastInsertId();	
				}
			} else {
				echo '0';
			}
		}
		exit;
	}
        
        
    public function clientappointment() {
		   $userid= $this->Session->read('userid'); //base64_decode($id);
		  // $loginid=  $this->Session->read('userid');
		$this->loadModel('CreditCard');
			if($this->Session->read('userid')==''){
				  $this->Session->setFlash(__('please login'));
				  return $this->redirect(array('action' => 'login'));
			  }
		/*$options = array('conditions' => array('CreditCard.user_id' => $loginid));
		$credit_card_details=$this->CreditCard->find('all', $options);        
		if(empty($credit_card_details)){			
			 $this->Session->setFlash(__('Please fill up Credit Card details.'));
			 return $this->redirect(array('action' => 'financial'));
		}
		if(!empty($credit_card_details)){
			$cc_count=0;
			foreach($credit_card_details as $credit_card_detail)
			{
				if($credit_card_detail['CreditCard']['active'] == 1)
				{
					$cc_count=$cc_count+1;
				}
			}
			if($cc_count == 0){
				$this->Session->setFlash(__('Please make a credit card active.'));
				return $this->redirect(array('action' => 'financial'));
			}
		}*/

		   $this->loadModel('UserEvent');
		   $this->loadModel('Appointment');
                   $this->loadModel('MultipleDemographic');
                   
                    $client_list=array();
                    $this->Appointment->unbindModel(array('hasMany' => array('VideochatSession')));
                                           //$this->Appointment->unbindModel(array('belongsTo' => array('User')));

                   $optionclient = array('conditions' => array('Appointment.request_to' => $userid),'group'=>array('Appointment.user_id'));
                  $client_list=$this->Appointment->find('all', $optionclient);
                  //pr($client_list);
                  $this->set(compact('client_list'));
		  $this->UserEvent->recursive = 0;
                  $services=array();
                  $selected_services=array();
                  $services=$this->MultipleDemographic->find('all',array('conditions'=>array('MultipleDemographic.user_id'=>$userid)));
        
        
                if(!empty($services)){
                    foreach($services as $key=>$val){
                        //$selected_services[$val['MultipleDemographic']['service']]=$val['MultipleDemographic']['rate'];
                        $selected_services[$val['Service']['id']]=$val['Service']['name'];
                    }
                }
                //pr($selected_services);
                 $this->set('selected_services', $selected_services);
                  
		  $currweekdate=date("Y-m-d");
		  if ($this->request->is(array('post')))
            {
                      
                      
              $optionscc = array('conditions' => array('CreditCard.user_id' => $this->request->data['client_id']));
		$credit_card_details=$this->CreditCard->find('all', $optionscc);        
		if(empty($credit_card_details)){			
			 $this->Session->setFlash(__('No Credit card found for the selected client.'));
			 return $this->redirect(array('action' => 'clientappointment'));
		}
		if(!empty($credit_card_details)){
			$cc_count=0;
			foreach($credit_card_details as $credit_card_detail)
			{
				if($credit_card_detail['CreditCard']['active'] == 1)
				{
					$cc_count=$cc_count+1;
				}
			}
			if($cc_count == 0){
				$this->Session->setFlash(__('No active credit card found for the selected client.'));
				return $this->redirect(array('action' => 'clientappointment'));
			}
		}
                $loginid=$this->request->data['client_id'];
              $optionss = array('conditions' => array('UserEvent.id' => $this->request->data['hidid']));
              $eventch = $this->UserEvent->find('first', $optionss);

              $optionsg = array('conditions' => array('User.id' => $loginid));
              $userg = $this->User->find('first', $optionsg);

              $optionsc = array('conditions' => array('User.id' => $userid));
              $userc = $this->User->find('first', $optionsc);

              

              $start_time_date_exp=explode('@',$this->request->data['start_time']);

              $start_time_exp=explode('-',$start_time_date_exp[1]);

              $appo['Appointment']['event_id']=$this->request->data['hidid'];
              $appo['Appointment']['request_to']=$userid;
              $appo['Appointment']['user_id']=$loginid;
              $appo['Appointment']['fromtime']=$start_time_exp[0];
              $appo['Appointment']['totime']=$start_time_exp[1];
              $appo['Appointment']['date_made']=date('Y-m-d');
              $appo['Appointment']['title']=$this->request->data['title'];
              $appo['Appointment']['service_id']=$this->request->data['service'];
              //$appo['Appointment']['context']=$this->request->data['description'];
              $appo['Appointment']['context']='';
              $appo['Appointment']['date']=$start_time_date_exp[0];
              $appo['Appointment']['is_accepted']=1;

		$app_option = array('conditions' => array('Appointment.request_to' => $userid,'Appointment.user_id' =>$loginid));
              $app_count = $this->Appointment->find('count', $app_option);
              if($app_count == 0){
				  $app_client = "New Client";
			  }else{
				  $app_client = "Returning Client";
			  }
              $this->Appointment->create();
              if ($this->Appointment->save($appo))
              {

			$SITE_URL = Configure::read('SITE_URL');

					$this->loadModel('SiteSetting');

				$contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
											if($contact_email){
												$adminEmail = $contact_email['SiteSetting']['admin_email'];
											} else {
												$adminEmail = 'contibute@info.com';
											}

				   // $options = array('conditions' => array('User.id' => $this->User->getLastInsertId()));
				    ///$lastInsetred = $this->User->find('first', $options);
				    $link =Configure::read('SITELINK').'users/dashboard';
				     $msg_body = "Hi ".$userg['User']['name'].".<br<br>"
             . " Appointment Request from   ".$userc['User']['name']."<br><br>".$userc['User']['name']." wants to make an appointment with you on ".$start_time_date_exp[0]."   from ".$start_time_exp[0]." to ".$start_time_exp[1]."<br><br> Note: ".$this->request->data['title']." <br><br> Click on the link for more details about this appointment.<br/><br/> <a href='".$link."' class='button'>Click Here</a><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
			    <style>.button{padding:20px;}</style>";

				    App::uses('CakeEmail', 'Network/Email');

				    $Email = new CakeEmail('smtp');

				    #pass user input to function 
				    $Email->emailFormat('both');
				    $Email->from(array($adminEmail => Configure::read('SITENAME')));
				    $Email->to($userg['User']['email']);
				//$Email->to("nits.anup@gmail.com");
				    $Email->subject('Appointment Request');
				    $Email->send($msg_body);
				  $this->Session->setFlash("Your request sent successfully");
                $this->redirect(array('controller' => 'users', 'action' => 'therapist_dashboard'));
                
			  }
		  }
		  $optionss = array('conditions' => array('UserEvent.user_id'=>$userid,'UserEvent.start_time >='=>$currweekdate));
		  $eventch = $this->UserEvent->find('all', $optionss);
		  
		  $options = array('conditions' => array('User.id' => $userid));
            $user = $this->User->find('first', $options);
            $name=$user['User']['name'];
            $this->set('user', $user);
		  //debug($eventch);
		  $eventchfinal=array();
		if(!empty($eventch)){
            foreach($eventch as $events)
            {
              $optionsappo = array('conditions' => array('Appointment.event_id' => $events['UserEvent']['id'],'Appointment.is_accepted' => 1));
              $appoch = $this->Appointment->find('all', $optionsappo);
              if(!empty($appoch))
              {
                $booked_arr=array();
                foreach($appoch as $appos)
                {
                  $booked_arr[]=strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']);
                }
              }
             
               if(!empty($appoch))
              {
               foreach($appoch as $appos)
                {

                  for($t=strtotime($events['UserEvent']['start_time']);$t<strtotime($events['UserEvent']['end_time']);$t=$t+1800)
                  {

                    $eventb=array();
                    $eventa=array();
                    if($t==strtotime($appos['Appointment']['date'].' '.$appos['Appointment']['fromtime']))
                    {
                      $eventb['UserEvent']['timestamp']=$t;
                      $eventb['UserEvent']['booked']='yes';
                      $eventb['UserEvent']['id']=$events['UserEvent']['id'];
                      $eventb['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                      $eventb['UserEvent']['eventname']='Available';
                      $eventb['UserEvent']['start_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['fromtime'];
                      $eventb['UserEvent']['end_time']=$appos['Appointment']['date'].' '.$appos['Appointment']['totime'];
                      $eventb['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                    }
                    else
                    {
                      if(!in_array($t,$booked_arr))
                      {
                              $eventa['UserEvent']['timestamp']=$t;
                              $eventa['UserEvent']['booked']='no';
                              $eventa['UserEvent']['id']=$events['UserEvent']['id'];
                              $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
                              $eventa['UserEvent']['eventname']='Available';
                              $eventa['UserEvent']['start_time']=date('Y-m-d H:i:s',$t);
                              $eventa['UserEvent']['end_time']=date('Y-m-d H:i:s',$t+1800);
                              $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
                      }
                    }
                    if(!empty($eventa))
                    {
                      if($this->searchForId($eventa['UserEvent']['timestamp'],$eventchfinal)==0 )
                      {
                       $eventchfinal[]=$eventa;
                      }
                    }
                    if(!empty($eventb))
                    {
                      if($this->searchForId($eventb['UserEvent']['timestamp'],$eventchfinal)==0)
                      {
                       $eventchfinal[]=$eventb;
                      }
                    }
                  }


                }
              }
             else
              {
               $eventa['UserEvent']['timestamp']='';
               $eventa['UserEvent']['booked']='no';
               $eventa['UserEvent']['id']=$events['UserEvent']['id'];
               $eventa['UserEvent']['user_id']=$events['UserEvent']['user_id'];
               $eventa['UserEvent']['eventname']='Available';
               $eventa['UserEvent']['start_time']=$events['UserEvent']['start_time'];
               $eventa['UserEvent']['end_time']=$events['UserEvent']['end_time'];
               $eventa['UserEvent']['unique_id']=$events['UserEvent']['unique_id'];
               //debug($eventa);
               $eventchfinal[]=$eventa;
              }
            }
}

		  //$this->set('events', $eventch);
		  $this->set('events', $eventchfinal);


            $this->set('aname', $name);
            $this->set('aid', base64_encode($userid));
      
      }
      
      
      public function downloadSoap($user_id=null) {
                $i=1; 
		$this->loadModel('Note');
                $login_id=$this->Session->read('userid');
                if($this->Session->read('userid')==''){
                        $this->Session->setFlash(__('please login'));
                        return $this->redirect(array('action' => 'login'));
                }
		$user_details = $this->User->find('first',array('conditions'=>array('User.id'=>$user_id)));
		$name = $user_details['User']['name'];
		$name = str_replace(" ","",$name);
		$all_notes=$this->Note->find("all",array('conditions'=>array('Note.user_id'=>$user_id,'Note.request_to'=>$login_id)));
               
            
            $output='';
            $output ='SL NO,Date,Subjective,Objective,Assessment,Plan';
            $output .="\n"; 

            foreach ($all_notes as $note){
                       
              $output .='"'.$i++.'","'.date('m-d-Y',strtotime($note['Note']['date'])).'","'.$note['Note']['subjective'].'","'.$note['Note']['objective'].'","'.$note['Note']['assessment'].'","'.$note['Note']['plan'].'"';    
              $output .="\n"; 
            }
             $filename = "soap_notes_".$name."_".date('m-d-Y-H-i-s').'.'.'csv';
        header('Content-type: application/csv');
        header('Content-Disposition: attachment; filename='.$filename);

        echo $output;   
            exit; 
    }
      
        
      public function withdraw(){
      	$user_id=$this->Session->read('userid');
          if($user_id==''){
              $this->Session->setFlash(__('please login'));
              return $this->redirect(array('action' => 'login'));
          }
          $option=array('conditions'=>array('User.id'=>$user_id));
		$user=$this->User->find('first',$option);
		
	   	$url = 'https://api.stripe.com/v1/balance'; 
		$churl = curl_init($url);  
		curl_setopt($churl, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$user['User']['secret_key']));
		//curl_setopt($churl, CURLOPT_POSTFIELDS, 'name='.$legal_name.'&type='.$type.'&bank_account='.$token_id.'&email='.$bank_email.''); 
		curl_setopt($churl, CURLOPT_RETURNTRANSFER, true);
		$res = curl_exec($churl); 
		curl_close($churl);
		$decRes=json_decode($res);
		pr($decRes);
		echo '<br>';
		//echo $recipents_id = $decRes->id;
      }
      
      
      public function teststrp() {
          //App::import('Vendor', 'stripe-php', array('file' => 'init.php'));
         // App::import('Vendor', array('file' => 'stripe-php'.DS.'lib'.DS.'Stripe.php'));
         //App::import('Vendor', 'Stripe', array('file' => 'Stripe.php'));
         // $this->autoRender=false;
         // $this->autoLayout=null;
//$apiKey = 'sk_live_xJCyI57qELARwzzRJ59BbCOd';//'sk_live_gXXKjG4ryXV03dMs6O5ipZwj';//
$legal_name = 'Dolan Kirkpatrick';		
$type = 'individual';
$price = 100;
$bank_id = 'ba_16e54jFxrn9wUQHIsrRYOucn';
$bank_email = 'dolan@reachtherapy.me';
if ($this->request->is(array('post'))){
	echo $token_id = $this->request->data['User']['stripeToken'];
	  $url = 'https://api.stripe.com/v1/recipients'; 
        $churl = curl_init($url);  
        curl_setopt($churl, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
      curl_setopt($churl, CURLOPT_POSTFIELDS, 'name='.$legal_name.'&type='.$type.'&bank_account='.$token_id.'&email='.$bank_email.''); 
      curl_setopt($churl, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($churl); 
        curl_close($churl);
        $decRes=json_decode($res);
       // pr($decRes);
        echo '<br>';
       echo $recipents_id = $decRes->id;
        echo 'amount='.$price.'&currency=usd&recipient='.$recipents_id.'&bank_account='.$bank_id.'';
        $turl = 'https://api.stripe.com/v1/transfers'; 
        $ch = curl_init($turl);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$price.'&currency=usd&recipient='.$recipents_id); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        $decoded_result=json_decode($result);
        echo '<pre>';print_r($decoded_result);
        //pr($decoded_result);
    }    
/*$turl = 'https://api.stripe.com/v1/transfers'; 
        $ch = curl_init($turl);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer '.$apiKey));
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount='.$price.'&currency=usd&recipient=acct_16cGOOFB9UC4W0q4&source_transaction=ch_16dZujLCAXeDoZVMi28cOBVt'); 
        $result = curl_exec($ch); 
        curl_close($ch);
        $decoded_result=json_decode($result);
        pr($decoded_result); */
	  
               /* Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");
                $email = "nits.tanmoy@gmail.com";
		
		$abc = Stripe_Account::create(array(
                    "managed" => false,
                    "country" => "US",
                    "email" => "nits.tanmoy@gmail.com")
		);*/
          
          /*\Stripe\Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");

\Stripe\Account::create(array(
  "managed" => true,
  "country" => "US",
  "email" => "nits.tanmoy@gmail.com"
));*/
          
       /* $ curl https://api.stripe.com/v1/accounts \
                -u sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD: \
                -d managed=true \
                -d country=US \
                -d email="nits.tanmoy@gmail.com";*/

        
        /*$url = 'https://api.stripe.com/v1/accounts'; 
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'managed=true&country=US&email=nits.tanmoy@gmail.com'); 
        $data = curl_exec($ch); 
        curl_close($ch);*/
        
        
        /*curl https://api.stripe.com/v1/charges \
   -u {PLATFORM_SECRET_KEY}: \
   -H "Stripe-Account: {CONNECTED_STRIPE_ACCOUNT_ID}" \
   -d amount=1000 \
   -d currency=usd \
   -d source={TOKEN} \
   -d description="payinguser@example.com" \
   -d application_fee=123*/
          
          

   
        /*$url = 'https://api.stripe.com/v1/charges'; 
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=1000&currency=usd&customer=cus_6kcsOTIDbNTTEP&destination=acct_16b9BTGXLuVLx39F&application_fee=100'); 
        $data = curl_exec($ch); 
        curl_close($ch);*/
          //curl https://api.stripe.com/v1/accounts/acct_16JoLPLCAXeDoZVM/external_accounts////external_account=token_id
          
          /*url https://api.stripe.com/v1/accounts/acct_16JoLPLCAXeDoZVM/external_accounts/ba_16bliqLCAXeDoZVMOzsUhHtn \
   -u sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD:*/

          
            /*$client_id="cus_6kcsOTIDbNTTEP";
            $price=30000;
           //Stripe::setApiKey("sk_live_xJCyI57qELARwzzRJ59BbCOd");
            Stripe::setApiKey("sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD");
            //Stripe::setApiKey("sk_test_9ve4nRavWyK0gNGkWW5OsGg2");
            Stripe_Charge::create(array(
              "amount"   => $price,
              "currency" => "usd",
              "customer" => $client_id)
            );*/
          
         
          /*$url = 'https://api.stripe.com/v1/transfers'; 
        $ch = curl_init($url);  
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_xJCyI57qELARwzzRJ59BbCOd'));
      curl_setopt($ch, CURLOPT_POSTFIELDS, 'amount=200&currency=usd&destination=acct_16cGOOFB9UC4W0q4&source_transaction=ch_16dZujLCAXeDoZVMi28cOBVt'); 
        $result = curl_exec($ch); 
        curl_close($ch);
        $decoded_result=json_decode($result);
        pr($decoded_result); */
          
          /*$url = 'https://api.stripe.com/v1/accounts/acct_16djIoFxrn9wUQHI'; 
                    $ch = curl_init($url);  
                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_xJCyI57qELARwzzRJ59BbCOd'));
                    curl_setopt($ch, CURLOPT_POSTFIELDS, 'legal_entity[type]=individual&legal_entity[first_name]=Richard&legal_entity[last_name]=Kirkpatrick&legal_entity[dob][day]=4&legal_entity[dob][month]=6&legal_entity[dob][year]=1967&legal_entity[ssn_last_4]=7971'); 
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $edit_result = curl_exec($ch); 
                    curl_close($ch);
                    //echo '<pre>';print_r($ch);
                    $decoded_edit_result=json_decode($edit_result);*/
          
         /* curl https://api.stripe.com/v1/accounts/acct_16JoLPLCAXeDoZVM \
   -u sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD: \
   -d support_phone=555-867-5309
         
          /*$image = WWW_ROOT . 'profile_image/Us-passport.jpg';
          $abc="identity_document";
          
          $url = 'https://uploads.stripe.com/v1/files'; 
          $ch = curl_init($url);
          curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_test_QM1F2E9lJOUhC2G9wzoDe9ZD','Content-Type:multipart/form-data'));
          curl_setopt($ch, CURLOPT_POSTFIELDS, 'Stripe-Account=acct_16b9BTGXLuVLx39F&purpose='.$abc.'&file=@'.$image); 
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); 
        curl_close($ch);
        //echo '<pre>';print_r($ch);
        $decoded_result=json_decode($result);
        pr($decoded_result);*/
          
         /* $url = 'https://api.stripe.com/v1/accounts/acct_16cGOOFB9UC4W0q4'; 
                        $ch = curl_init($url);  
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:Bearer sk_live_xJCyI57qELARwzzRJ59BbCOd'));
                        curl_setopt($ch, CURLOPT_POSTFIELDS, 'legal_entity[type]=individual&leg*/
      }
      
      public function getUser($id=null){
      	if($id!='' && $id!=null)
      	{
      		$options = array('conditions'=>array('User.id'=>$id));
      		$user = $this->User->find('first',$options);
      		return $user;
      	}
      	exit;
      }
      
      
    public function sendmail(){
        $userid= $this->Session->read('userid'); 
        $options = array('conditions'=>array('User.id'=>$userid));
        $user = $this->User->find('first',$options);
        
        if($user){
            $state = $user['User']['state_id'];
            $ClientEmail = $user['User']['email'];
            if($state!=''){
                $options = array('conditions'=>array('User.usertype'=>'T', 'User.status'=>1, 'User.state_licences LIKE '=>'%'.$state.'%'), 'fields'=>array('User.id','User.name','User.email'));
                $therapists = $this->User->find('all',$options);
                
                if($therapists){
                    $SITE_URL = Configure::read('SITE_URL');
                    $this->loadModel('SiteSetting');
                    $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.admin_email')));
                    if($contact_email){
                        $adminEmail = $contact_email['SiteSetting']['admin_email'];
                    } else {
                        $adminEmail = 'info@reachtherapy.me';
                    }
                                        
                    foreach($therapists as $therapist){
                        
                        $link =Configure::read('SITELINK').'users/client_profile/'.base64_encode($userid);
                        $msg_body = "Hi ".$therapist['User']['name'].".<br><br> A new client ".$user['User']['name']." is seeking speech therapy. <br><br>Client email is <a href='mailto:".$ClientEmail."'>".$ClientEmail."</a>. <br><br>Click on the link for more details about this client.<br/><br/> <a href='".$link."' class='button'>Click Here</a><br/><br/>Thanks,<br/>".Configure::read('SITENAME')."
                        <style>.button{padding:20px;}</style>";
                        App::uses('CakeEmail', 'Network/Email');
                        $Email = new CakeEmail('smtp');
                        $Email->emailFormat('both');
                        $Email->from(array($adminEmail => Configure::read('SITENAME')));
                        $Email->to($therapist['User']['email']);
                        $Email->subject('New Client Seeking Speech Therapist on '.date('Y-m-d H:i:s'));
                        $Email->send($msg_body);
                    }
                    $this->Session->setFlash('Your request has been received. Please check your email for replies from available Speech Therapists licensed to practice in your state.','default', array('class' => 'success'));
                } else {
                    $this->Session->setFlash(__('Sorry, no therapists were found in your region.'));
                }
            } else {
                $this->Session->setFlash(__('Please fill up your state in About Me section.'));
            }
        }
        return $this->redirect(array('action' => 'search'));
    }


	public function new_password($id=null) {
        $id=base64_decode($id);                
	if ($this->request->is(array('post', 'put'))) {		
		
		$option=array('conditions'=>array('User.id'=>$id));
		$user_info=$this->User->find('first',$option);
		    
		if(!empty($user_info))
		{
			$new_password=$this->request->data['User']['new_password'];
			$confirm_password=$this->request->data['User']['confirm_password'];
			if($new_password == $confirm_password){
			
			
			$pass = md5($new_password);
			$data=array();
			$data['User']['id']=$user_info['User']['id'];
			$data['User']['password']=$pass;
			if($this->User->save($data)) {
                        $this->Session->setFlash('Your password has been changed successfully,Please login','default', array('class' => 'success'));
                        return $this->redirect(array('action' => 'login'));
		}
			
		}else{
			$this->Session->setFlash('Password and confirm password do not match','default', array('class' => 'success'));
			return $this->redirect(array('action' => 'new_password',base64_encode($id)));
		}
		}else{
			$this->Session->setFlash(__('Invalid User.'));
			return $this->redirect(array('action' => 'new_password',base64_encode($id)));
		}	
		
	} 
	
                
        
        
    }
      
     
}
