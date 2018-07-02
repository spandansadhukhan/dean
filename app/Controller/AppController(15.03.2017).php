<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	//public $components = array('Session','Email');
        public $components = array('Session','Email','Auth');
	//public $helpers = array( 'CksourceHelper');
    var $uses = array('Banner');
	public function beforeFilter() {
		$adminRoute = Configure::read('Routing.prefixes');
		#pr($adminRoute);
		if (isset($this->params['prefix']) && in_array($this->params['prefix'], $adminRoute)) {
			$this->layout = 'admin_default';
		} else {
			$this->layout = 'default';
                        $this->Auth->authenticate = array('all' => array('scope' => array('User.is_active' => 1,'User.is_admin'=> 0)), 
                            'Form' => array('userModel' => 'User', 'fields' => array('username' => 'email', 'password' => 'password')));
		}
	}

        
        public function beforeRender() {
                $this->loadModel('User');
                $this->loadModel('Content');
                $this->loadModel('SiteSetting');
                $this->loadModel('Category');
                $this->loadModel('Country');
                $this->loadModel('City');
                $this->loadModel('State');
                /*$this->loadModel('Haircolor');
                $this->loadModel('Eyecolor');
                $this->loadModel('EscortType');
                $this->loadModel('BodyType');*/
                $SITE_URL = Configure::read('SITE_URL');

                $userid = $this->Session->read('userid');
                //$usertype = $this->Session->read('Auth.User.type');
                if(isset($userid) && $userid!=''){
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $userid));
                $userdetails=$this->User->find('first', $options);
                $this->set(compact('userdetails'));
                }

                $options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => 1));
                $sitesetting = $this->SiteSetting->find('first', $options);
                $this->set(compact('sitesetting','SITE_URL','userid'));

                $options = array('conditions' => array('Category.parent_id'=>0,'Category.active' => 1 ));
                $categories = $this->Category->find('all', $options);
                $this->set(compact('categories'));

                $countries = $this->Country->find('list',array('fields'=>array('id','name')));
                $states = $this->State->find('list',array('fields'=>array('id','name')));
                /* $haircolors = $this->Haircolor->find('list',array('fields'=>array('id','color_name')));
                $eyecolors = $this->Eyecolor->find('list',array('fields'=>array('id','color_name')));
                $escorttypes = $this->EscortType->find('list',array('fields'=>array('id','name')));
                $bodytypes = $this->BodyType->find('list',array('fields'=>array('id','body_type')));
                //$allcontents = $this->Content->find('all');*/




                $user_status=array('1'=>'Active','0'=>'Inactive');
                $directions=array('New'=>'New','Old'=>'Old','Asc'=>'Asc','Desc'=>'Desc');


                $escortslideroption = array('conditions' => array('User.user_type' => 'E','User.membership_id' => 2));
                $escortslider = $this->User->find('all', $escortslideroption);  
                //pr($escortslider); exit;
                $options = array('conditions' => array('Banner.status'=>1));
                $banners = $this->Banner->find('all', $options);
                
                $optionsfeature = array('conditions' => array('User.user_type' => 'E','User.is_featured ' => 1),'limit'=>4);
        $showfeature = $this->User->find('all', $optionsfeature);
                //$this->set(compact('categories'));

                $this->set(compact('escortslider','countries','states','haircolors','eyecolors','bodytypes','escorttypes','user_status','directions', 'banners','showfeature'));
        }

	public function countrywisecity($countryId=null) {
	     $this->loadModel('City');
	    if(!empty($countryId)){
		$city = $this->City->find('list',array('fields'=>array('id','name'),'conditions'=>array('City.country_id'=>$countryId, 'City.is_active'=>1)));
	    }
	    else{
		$city = '';
	    }
	    return $city;
	    exit;
	}


    public function create_slug($string, $ext=''){     
        $replace = '-';         
        $string = strtolower($string);     

        //replace / and . with white space     
        $string = preg_replace("/[\/\.]/", " ", $string);     
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);     

        //remove multiple dashes or whitespaces     
        $string = preg_replace("/[\s-]+/", " ", $string);     

        //convert whitespaces and underscore to $replace     
        $string = preg_replace("/[\s_]/", $replace, $string);     

        //limit the slug size     
        $string = substr($string, 0, 200);     

        //slug is generated     
        return ($ext) ? $string.$ext : $string; 
    }




	public function send_mail($from=null,$to=null,$subject=null,$body=null){
		 $Email = new CakeEmail();
		 /* pass user input to function */
		 $Email->emailFormat('both');
		 $Email->from($from);
		 $Email->to($to);
		 $Email->subject($subject);
		 $Email->send($body);
	}




}
