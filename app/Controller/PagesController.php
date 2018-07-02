<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public function beforeFilter() {
        parent::beforeFilter();

        $this->Auth->allow('advertisefaq','clientfaq','escortfaq','generalfaq','viewpage','index', 'classifiedads', 'all-faq', 'generalfaq', 'faq', 'privacypolicy', 'happyhours', 'onlineescorts', 'termsandconditions', 'howitworks', 'advertisement', 'escortreviews', 'latestcomments', 'news', 'blog', 'parlour', 'agencies', 'clubs', 'addtofavqq', 'myfavorites', 'send_msg', 'rmvfavqq', 'addtofollow', 'rmvfollow', 'deletefavorites', 'countescort', 'shop_physical_item', 'shop_physical_item_details', 'shop_physical_item_buy', 'blog_details', 'workrooms', 'cart', 'edit_cart', 'delete_cart', 'country_state', 'state_city', 'paypalsend', 'successpay', 'failurepay','admin_addlocation','admin_listlocation','admin_editlocation','admin_activelocation','admin_addsuburb','admin_listsuburb','admin_deletesuburb','admin_activesuburb','admin_editsuburb','likeescortprofile','shop');
    }

    public $uses = array();
    public $components = array('Session', 'RequestHandler', 'Paginator');
    public $Helper = array('FckHelper');

    /**
     * Displays a view
     *
     * @param mixed What page to display
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    /* public function display() {
      //echo "hello";exit;
      $path = func_get_args();

      $count = count($path);
      if (!$count) {
      return $this->redirect('/');
      }
      $page = $subpage = $title_for_layout = null;

      if (!empty($path[0])) {
      $page = $path[0];
      }
      if (!empty($path[1])) {
      $subpage = $path[1];
      }
      if (!empty($path[$count - 1])) {
      $title_for_layout = Inflector::humanize($path[$count - 1]);
      }
      $this->set(compact('page', 'subpage', 'title_for_layout'));

      try {
      $this->render(implode('/', $path));
      } catch (MissingViewException $e) {
      if (Configure::read('debug')) {
      throw $e;
      }
      throw new NotFoundException();
      }
      } */

    public function display($page = null) {

        if (!$page) {
            return $this->redirect('/');
        }
        $this->loadModel('Content');
        $options = array('conditions' => array('Content.page_name' => $page));
        $pagename = $this->Content->find('all', $options);
        if (count($pagename) > 0) {
            $title_for_layout = $pagename[0]['Content']['page_heading'];
        } else {
            return $this->redirect('/');
        }
        $this->set(compact('title_for_layout', 'pagename'));
    }

    public function registerinfo() {
        
    }

    public function faq() {
    $this->loadModel('Faq');
    $general_faqs=$this->Faq->find("all",array("conditions"=>array("Faq.type"=>'G')));
    $advertise_faqs=$this->Faq->find("all",array("conditions"=>array("Faq.type"=>'A')));    
    $escorts_faqs=$this->Faq->find("all",array("conditions"=>array("Faq.type"=>'E')));    
    $client_faqs=$this->Faq->find("all",array("conditions"=>array("Faq.type"=>'C')));    
    $this->set(compact('general_faqs',"advertise_faqs","escorts_faqs","client_faqs"));
        
    }

    public function generalfaq() {
    $this->loadModel('Faq');
    $faqs=$this->Faq->find('all',array('conditions'=>array("Faq.type"=>'G')));
    $this->set(compact('faqs'));
        
    }
    public function escortfaq() {
    $this->loadModel('Faq');
    $faqs=$this->Faq->find('all',array('conditions'=>array("Faq.type"=>'E')));
    $this->set(compact('faqs'));
        
    }
    public function clientfaq() {
    $this->loadModel('Faq');
    $faqs=$this->Faq->find('all',array('conditions'=>array("Faq.type"=>'C')));
    $this->set(compact('faqs'));
        
    }
    public function advertisefaq() {
    $this->loadModel('Faq');
    $faqs=$this->Faq->find('all',array('conditions'=>array("Faq.type"=>'A')));
    $this->set(compact('faqs'));
        
    }

    public function allfaq() {
        
    }

    public function classifiedads($id=null) {
        $this->loadModel('Classified');
        $this->loadModel('ClassifiedCategory');
        $conditions["Classified.status"]=1;
        if(!empty($id))
        {
        $conditions["Classified.category_id"]= base64_decode($id);
        }
        $option1 = array('conditions' => $conditions);
        $clissfieddata = $this->Classified->find('all', $option1);
        $classcategories=$this->ClassifiedCategory->find("list",array("order"=>"ClassifiedCategory.name asc"));
        $classify_cats=array();
        foreach ($classcategories as $key =>$cat)
        {
            $count=$this->Classified->find("count",array("conditions"=>array("Classified.category_id"=>$key,"Classified.status"=>1)));
            $classify_cats[]=array("id"=>$key,"name"=>$cat,"count"=>$count);
        }
        
        $this->set(compact('clissfieddata',"classify_cats"));
    }

    public function happyhours() {
        $this->loadModel('User');
        $this->loadModel('Category');
        $this->loadModel('Rate');
        $this->loadModel('Favorite');
        $this->loadModel('Country');
        $this->loadModel('Location');
        $this->loadModel('Suburb');
        $this->loadModel('Happyhour');
        $conditions["User.user_type"]='E';
        $conditions["User.id !="]=$this->Session->read('fuid');  
        $conditions["Happyhour.availibilty"]=1;        
         if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter']))
        {
         $filter_url['controller'] = $this->request->params['controller'];
         $filter_url['action'] = $this->request->params['action'];
         $filter_url['page'] = 1;
         foreach($this->data['Filter'] as $name => $value){
             if($value){
                 $filter_url[$name] = urlencode($value);
             }
         }   
         return $this->redirect($filter_url);
         } 
         else {
                    foreach($this->params['named'] as $param_name => $value)
                    {
                        if(!in_array($param_name, array('page','sort','direction','limit')))
                            {
                            
                                    if($param_name=='age' and !empty($value) and $value!='any')
                                    {
                                        
                                        
                                        $ages= explode("-", urldecode($value));
                                        if(!empty($ages[1]))
                                        {
                                           $yr = urldecode($ages[0]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date1 = date("Y", $time);
                                           
                                           $yr = urldecode($ages[1]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date2 = date("Y", $time);
                                           $conditions['YEAR(User.birthday) >='] = $date2; 
                                           $conditions['YEAR(User.birthday) <='] = $date1; 

                                          
                                        }
                                        else
                                        {
                                          $yr = urldecode($ages[0]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date1 = date("Y", $time);  
                                           $conditions['YEAR(User.birthday) <='] = $date1; 

                                        }
                                          
                                    }
                                    else if($param_name=='height' and !empty($value) and $value!='any')
                                    {
                                        $heights= explode("-", urldecode($value));
                                        if(!empty($heights[1]))
                                        {
                                           $conditions['User.height >='] = $heights[0];
                                           $conditions['User.height <='] = $heights[1];
                                        }
                                        else
                                        {
                                           $conditions['User.height >'] = $heights[0];

                                        }
                                        
                                    }
                                    else if($param_name=='verifieds' and !empty($value) and $value!="any")
                                    {
                                        if($value=='Yes')
                                        {
                                           $conditions['User.is_active'] = 1;
                                        }
                                        else
                                        {
                                           $conditions['User.is_active'] = 0;

                                        }
                                        
                                    }
                                    else if($param_name=='name' and !empty($value) and $value!='any')
                                    {
                                        
                                        $conditions['User.name LIKE'] = '%'.urldecode($value).'%';

                                    }
                                    
                                    else if($param_name=='is_show_face' and !empty($value) and $value!="any")
                                    {
                                        
                                        $conditions['User.'.$param_name] = urldecode($value=='Yes'?1:0);

                                    }
                                    
                                    else if($param_name=='service_id' and !empty($value) and $value!="any")
                                    {
                                        
                                        $conditions[0]='FIND_IN_SET(\''. urldecode($value) .'\',User.service_id)'; 

                                    }
                                   
                                    else 
                                    {
                                       if(!empty($value) and $value!='any') 
                                       {
                                       $conditions['User.'.$param_name] = urldecode($value);
                                       }

                                    }
                                    $this->request->data['Filter'][$param_name] = urldecode($value);
                              }
                    }
              //pr($conditions);exit;
              }
        
         $this->Paginator->settings=array(  
        'conditions'=>$conditions,
        ); 
              
        $userinfos = $this->Paginator->paginate('Happyhour');
        $genders=array('F'=>'Female','M'=>'Male','T'=>'Trans');
        $options12 = array('fields'=>array('Location.id','Location.name'),'conditions' => array('Location.is_active' => 1));
        $locationsarray = $this->Location->find('list', $options12);
        $this->loadModel('Service');
        $services1["any"]="Any";
        $services2 = $this->Service->find('list', array('conditions' => array('Service.is_active' => 1), 'order' => array('Service.name' => 'ASC')));        
        $services=$services1+$services2;
        $availability1["any"] = "Any";
        $this->loadModel('Availability');
         $availability2 = $this->Availability->find('list');
            $availabilities =  $availability1+ $availability2;
            $cups["any"]="Any";
            for($i=4;$i<=20;$i++)
            {
                $cups[$i]=$i==20?'20+':$i;
            }
            $agearr1["any"]="Any";
            $agearr2=array(
            "18-25"=>"18-25","26-30"=>"26-30","31-35"=>"31-35","36-40"=>"36-40","41-49"=>"41-49","50"=>"50+"    
            );
            $agearr=$agearr1+$agearr2;
            $showcountry = $this->Country->find('list', array('fields'=>array('Country.id','Country.name'),'conditions'=>array('Country.id'=>158),'order' => 'Country.id ASC')); 
            $busts=array("any"=>"Any","A"=>"A","B"=>"B","C"=>"C","D"=>"D","DD"=>"DD","E"=>"E","EE"=>"EE","F"=>"F","G"=>"G+");
            $this->loadModel('Nationality');
            $nationality1["any"]="Any";
            $nationality2=$this->Nationality->find('list',array('fields'=>array("Nationality.id","Nationality.name"),"conditions"=>array("Nationality.is_active"=>1)));
            $nationalities=  $nationality1+ $nationality2;

            $this->loadModel('Haircolor');
            $haircolor1["any"]="Any";
            $haircolor2 = $this->Haircolor->find('list',array('fields'=>array('Haircolor.id','Haircolor.color_name'))); 
            $haircolors=$haircolor1+ $haircolor2;    
            $heights=array("any"=>"Any","140-149"=>"140cm-149cm","150-159"=>"150cm-159cm","160-169"=>"160cm-169cm","170-179"=>"170cm-179cm"
                           ,"180-189"=>"180cm-189cm","190"=>"190cm+"
                );
           $showing_face=array("any"=>"Any",'Yes'=>'Yes','No'=>'No');
           $verifieds=array("any"=>"Any",'Yes'=>'Yes','No'=>'No');
           $this->set(compact('userinfos','verifieds'));
           $this->set(compact('list',"showing_face","category_wise_escorts","heights",'haircolors','nationalities','availabilities','cups','busts','services','genders','agearr','category', 'escorts','locationsarray', 'surubsarrays','showonline', 'showfeature','shownewescorts','showescortofweek','showcountry'));
    }

    public function onlineescorts($id = null) {

        $this->loadModel('User');
        $this->loadModel('Rate');
        $this->loadModel('Favorite');
        $this->loadModel('Category');
        $this->loadModel('Country');
        $this->loadModel('Location');
        $this->loadModel('Suburb');
        $conditions['User.user_type']='E';
        $conditions['User.is_loggedin']=1;
        
        if (isset($id) || $id != '') {
            $conditions[0]='FIND_IN_SET(\''. base64_decode($id) .'\',User.category_id)';
            $options = array('conditions' => $conditions);
            $escorts = $this->User->find('all', $options);

        } 
        
         if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter']))
        {
         $filter_url['controller'] = $this->request->params['controller'];
         $filter_url['action'] = $this->request->params['action'];
         $filter_url['page'] = 1;
         foreach($this->data['Filter'] as $name => $value){
             if($value){
                 $filter_url[$name] = urlencode($value);
             }
         }   
         return $this->redirect($filter_url);
         } 
         else {
                    foreach($this->params['named'] as $param_name => $value)
                    {
                        if(!in_array($param_name, array('page','sort','direction','limit')))
                            {
                            
                                    if($param_name=='age' and !empty($value) and $value!='any')
                                    {
                                        
                                        
                                        $ages= explode("-", urldecode($value));
                                        if(!empty($ages[1]))
                                        {
                                           $yr = urldecode($ages[0]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date1 = date("Y", $time);
                                           
                                           $yr = urldecode($ages[1]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date2 = date("Y", $time);
                                           $conditions['YEAR(User.birthday) >='] = $date2; 
                                           $conditions['YEAR(User.birthday) <='] = $date1; 

                                          
                                        }
                                        else
                                        {
                                          $yr = urldecode($ages[0]);
                                           $time = strtotime("-".$yr." year", time());
                                           $date1 = date("Y", $time);  
                                           $conditions['YEAR(User.birthday) <='] = $date1; 

                                        }
                                          
                                    }
                                    else if($param_name=='height' and !empty($value) and $value!='any')
                                    {
                                        $heights= explode("-", urldecode($value));
                                        if(!empty($heights[1]))
                                        {
                                           $conditions['User.height >='] = $heights[0];
                                           $conditions['User.height <='] = $heights[1];
                                        }
                                        else
                                        {
                                           $conditions['User.height >'] = $heights[0];

                                        }
                                        
                                    }
                                    else if($param_name=='name' and !empty($value) and $value!='any')
                                    {
                                        
                                        $conditions['User.name LIKE'] = '%'.urldecode($value).'%';

                                    }
                                    
                                    else if($param_name=='is_show_face' and !empty($value) and $value!='any')
                                    {
                                        
                                        $conditions['User.'.$param_name] = urldecode($value=='Yes'?1:0);

                                    }
                                    
                                     else if($param_name=='verifieds' and !empty($value) and $value!='any')
                                    {
                                        if($value=='Yes')
                                        {
                                           $conditions['User.is_active'] = 1;
                                        }
                                        else
                                        {
                                           $conditions['User.is_active'] = 0;

                                        }
                                        
                                    }
                                    
                                    else if($param_name=='service_id' and !empty($value) and $value!='any')
                                    {
                                        
                                        $conditions[0]='FIND_IN_SET(\''. urldecode($value) .'\',User.service_id)'; 

                                    }
                                   
                                    else 
                                    {
                                       if(!empty($value) and $value!='any') 
                                       {
                                       $conditions['User.'.$param_name] = urldecode($value);
                                       }

                                    }
                                    $this->request->data['Filter'][$param_name] = urldecode($value);
                              }
                    }
              //print_r($conditions);exit;
              }
        
        $this->Paginator->settings=array("conditions"=>$conditions,"order"=>"User.id desc");
        $escorts=$this->Paginator->paginate('User');
        $options = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options);
        foreach($category as $key => $cat)
        {
          $numb = $this->User->find('count',array('conditions'=>array('FIND_IN_SET(\''. $cat['Category']['id'] .'\',User.category_id)','User.user_type'=>'E','User.is_loggedin'=>1)));
          $category[$key]['Category']['count']=$numb;
        }

        $options12 = array('fields'=>array('Location.id','Location.name'),'conditions' => array('Location.is_active' => 1));
        $locationsarray = $this->Location->find('list', $options12);

        $options13 = array('conditions' => array('Suburb.is_active' => 1));
        $surubsarrays = $this->Suburb->find('all', $options13);
        
        $this->loadModel('Nationality');
        $nationality1["any"]="Any";
        $nationality2=$this->Nationality->find('list',array('fields'=>array("Nationality.id","Nationality.name"),"conditions"=>array("Nationality.is_active"=>1)));
        $nationalities=  $nationality1+ $nationality2;

        // $options = array('conditions' => array('Category.id' => 'User.category_id'));
        // $categorycount = $this->Category->find('count', $options);				
        //echo $categorycount; exit;

        //Online Escorts

        $optionsoline = array('conditions' => array('User.user_type' => 'E','User.membership_id' => 3));
        $showonline = $this->User->find('all', $optionsoline);

        //Featured Escorts

        $optionsfeature = array('conditions' => array('User.user_type' => 'E','User.is_featured ' => 1),'limit'=>4);
        $showfeature = $this->User->find('all', $optionsfeature);

         //New Escorts

        $shownewescorts = $this->User->find('all', array('conditions' => 
            array('User.user_type' => 'E'), 'order' => 'User.join_date 
            DESC','limit'=>2)); 

        $optionsescortofweek = array('conditions' => array('User.user_type' => 'E','User.escort_of_week ' => 1));
        $showescortofweek = $this->User->find('all', $optionsescortofweek);
        $showcountry = $this->Country->find('list', array('fields'=>array('Country.id','Country.name'),'conditions'=>array('Country.id'=>158),'order' => 'Country.id ASC')); 
        $this->loadModel('Service');
        $services1["any"]="Any";
        $services2 = $this->Service->find('list', array('conditions' => array('Service.is_active' => 1), 'order' => array('Service.name' => 'ASC')));        
        $services=$services1+$services2;
        $this->loadModel('Availability');
        $availability1["any"] = "Any";
        $availability2 = $this->Availability->find('list');
        $availabilities =  $availability1+ $availability2;
        $cups["any"]="Any";
        for($i=4;$i<=20;$i++)
        {
            $cups[$i]=$i==20?'20+':$i;
        }
        $agearr1["any"]="Any";
        $agearr2=array(
        "18-25"=>"18-25","26-30"=>"26-30","31-35"=>"31-35","36-40"=>"36-40","41-49"=>"41-49","50"=>"50+"    
        );
        $agearr=$agearr1+$agearr2;
        $genders1["any"]="Any";
        $genders2=array('M'=>'Male','F'=>'Female','T'=>'Trans');
        $genders=$genders1+$genders2;
        $busts=array("any"=>"Any","A"=>"A","B"=>"B","C"=>"C","D"=>"D","DD"=>"DD","E"=>"E","EE"=>"EE","F"=>"F","G"=>"G+");
        $showing_face=array('any'=>"Any",'Yes'=>'Yes','No'=>'No');
        $this->loadModel('Haircolor');
        $haircolor1["any"]="Any";
        $haircolor2 = $this->Haircolor->find('list',array('fields'=>array('Haircolor.id','Haircolor.color_name'))); 
        $haircolors=$haircolor1+ $haircolor2;    
        $heights=array("any"=>"Any","140-149"=>"140cm-149cm","150-159"=>"150cm-159cm","160-169"=>"160cm-169cm","170-179"=>"170cm-179cm"
                       ,"180-189"=>"180cm-189cm","190"=>"190cm+"
            );
        $verifieds=array('any'=>"Any",'Yes'=>'Yes','No'=>'No');
        $this->set(compact('verifieds','category','heights','haircolors','showing_face','genders','services','availabilities','cups','agearr','busts','nationalities','showcountry','escorts', 'ratechart', 'category', 'locationsarray', 'surubsarrays', 'showonline', 'showfeature','shownewescorts','showescortofweek'));
    }

    public function countescort($id = null) {
        $this->loadModel('User');
        $this->loadModel('Category');

        $options = array('conditions' => array('User.category_id' => $id));
        $categorycount = $this->Category->find('count', $options);
        return $categorycount;
    }
    
    

    public function addtofavqq() {
        $this->loadModel('Favorite');
        $this->layout = false;
        $this->autoRender = false;
        //echo $_REQUEST['cid'];

        $options = array('conditions' => array('Favorite.from_id' => $this->request->data['uid'], 'Favorite.to_id' => $this->request->data['cid']));
        $loginuser = $this->Favorite->find('count', $options);
        if ($loginuser == 0) {

            $this->request->data['Favorite']['from_id'] = $this->request->data['uid'];
            $this->request->data['Favorite']['to_id'] = $this->request->data['cid'];

            $this->Favorite->create();
            $this->Favorite->save($this->request->data);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function myfavorites() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel("Favorite");
        //$this->loadModel("User");

        $options = array('conditions' => array('Favorite.from_id' => $this->Session->read('fuid')));
        $loginuser = $this->Favorite->find('all', $options);
        //pr($loginuser);exit;
        $this->set(compact('loginuser'));
    }

    public function send_msg() {
        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->autoRender = false;
        $data = array();
        $this->loadModel("Message");
        $msg_prnt = $this->Message->find("first", array('fields' => array(
                'parent_id'
            ),
            "conditions" => array(
                "or" => array(
                    array(
                        'AND' => array(
                            array('Message.from_id' => $this->request->data['from_id']),
                            array('Message.to_id' => $this->request->data['to_id'])
                        )
                    ), array(
                        'AND' => array(
                            array('Message.from_id' => $this->request->data['to_id']),
                            array('Message.to_id' => $this->request->data['from_id'])
                        )
                    )
                )
            )
                )
        );

        $data['Message'] = $this->request->data;
        if (!empty($msg_prnt)) {
            $data['Message']['parent_id'] = $msg_prnt['Message']['parent_id'];
            if ($this->Message->save($data)) {
                echo "Message posted successfully";
            }
        } else {
            $this->Message->create();
            if ($this->Message->save($data)) {
                echo $last_id = $this->Message->getLastInsertID();
                $this->Message->id = $last_id;
                if ($this->Message->saveField('parent_id', $last_id)) {
                    echo "Message posted successfully";
                }
            }
        }
        $data['Message'] = $this->request->data;
    }

    public function rmvfavqq() {
        $this->autoRender = false;
        //print_r($this->request->data);
        $this->loadModel("Favorite");
        $options = array('conditions' => array('Favorite.from_id' => $this->request->data['uid'], 'Favorite.to_id' => $this->request->data['cid']), 'recursive' => -1);
        $id = $this->Favorite->find('first', $options);
        //print_r($id);die;
        if ($this->Favorite->delete($id['Favorite']['id'])) {
            echo 1;
        }
    }

    public function addtofollow() {
        $this->loadModel('Follow');
        $this->autoRender = false;

        $options = array('conditions' => array('Follow.follower_id' => $this->request->data['uid'], 'Follow.following_id' => $this->request->data['cid']));
        $loginuser = $this->Follow->find('count', $options);
        if ($loginuser == 0) {

            $this->request->data['Follow']['follower_id'] = $this->request->data['uid'];
            $this->request->data['Follow']['following_id'] = $this->request->data['cid'];

            $this->Follow->create();
            $this->Follow->save($this->request->data);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function rmvfollow() {
        $this->autoRender = false;
        //print_r($this->request->data);
        $this->loadModel("Follow");
        $options = array('conditions' => array('Follow.follower_id' => $this->request->data['uid'], 'Follow.following_id' => $this->request->data['cid']), 'recursive' => -1);
        $id = $this->Follow->find('first', $options);
        //print_r($id);die;
        if ($this->Follow->delete($id['Follow']['id'])) {
            echo 1;
        }
    }

    public function advertisement() {
        
    }

    public function howitworks() {
        
    }
    
    public function disclaimer() {
        
    }

    public function privacypolicy() {
        
    }

    public function termsandconditions() {
        
    }

    public function escortreviews() {

          $this->loadModel("Review");
         // $this->loadModel("User");


          $options = array('conditions' => array('Review.profile_id' => 'User.id'));
          $allreviews = $this->Review->find('all', $options);
          
          $this->set(compact('allreviews'));
    }

    public function latestcomments() {
        $this->loadModel("Review");
        $this->loadModel("Like");

        $options = array('conditions' => array('Review.profile_id !=' => ''));
        $allreviews = $this->Review->find('all', $options);
        
        //pr($allreviews); exit;  
        $this->set(compact('allreviews'));

    }

    public function news() {
        
    }

    public function blog() {

//        if ($this->Session->read('fuid') == '') {
//            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
//            return $this->redirect('/');
//        }   

        $this->loadModel("Blog");
        $options = array('conditions' => array('Blog.admin_approve' => 1));
        $allblogs = $this->Blog->find('all', $options);
        $this->set(compact('allblogs'));
    }

    public function blog_details($id = null) {

        $id = base64_decode($id);
        $this->loadModel('Blog');
        $blogs = $this->Blog->find("all", array("conditions" => array("Blog.id" => $id)));


        $this->set(compact('blogs'));
    }

    public function parlour() {
        
    }

    public function agencies() {
        $type='';
        $this->loadModel("User");
        $this->loadModel('Category');
       $options11 = array('conditions' => array('Category.active' => 1));
        $category = $this->Category->find('all', $options11);
        foreach($category as $key=>$cat)
            {
              $numb = $this->User->find('count',array('conditions'=>array('User.category_id'=>$cat['Category']['id'],'User.user_type'=>'A')));
              $category[$key]['Category']['count'] = $numb;
            }
        $options = array('conditions' => array('User.user_type' => 'A'));
        $allclubs = $this->User->find('all', $options);
        $this->set(compact('allclubs','category','type'));
        
    }

    public function clubs() {
        $this->loadModel("User");
        $options = array('conditions' => array('User.user_type' => 'C'));
        $allclubs = $this->User->find('all', $options);
        $this->set(compact('allclubs'));
    }

    public function shop_physical_item($id = null) {

//        if ($this->Session->read('fuid') == '') {
//            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
//            return $this->redirect('/');
//        }

        $id = base64_decode($id);

        $this->loadModel('Product');
        $this->loadModel('ProductImage');

        $this->Product->recursive = 2;

//        if (!empty($id)) {
//            $options1 = array('conditions' => array('Product.product_category_id' => $id));
//        } else {
//            $options1 = array('conditions' => array('Product.is_active' => 1));
//        }
//        $allproductsfront = $this->Product->find('all', $options1);
//
//
//        $this->set(compact('allproductsfront'));


        $this->paginate = array(
            'conditions' => array('Product.product_category_id' => $id),
            'limit' => 24,
            'order' => array(
                'Product.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('allproductsfront', $this->Paginator->paginate('Product'));
    }

    public function shop_physical_item_details($id = null) {

//        if ($this->Session->read('fuid') == '') {
//            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
//            return $this->redirect('/');
//        }


        $this->loadModel('Product');
        $this->loadModel('ProductImage');

        $this->Product->recursive = 2;

        $options1 = array('conditions' => array('Product.slug' => $id));
        $fetchproductDetails = $this->Product->find('first', $options1);

        //pr($fetchproductDetails);
        //exit;

        $this->set(compact('fetchproductDetails'));
    }

    public function shop_physical_item_buy() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }

        $this->loadModel("User");

        $id = $this->Session->read('fuid');
        $panty = array('conditions' => array('User.id' => $id));
        $userpanties = $this->User->find('first', $panty);

        $this->loadModel('Country');
        $options1 = array('conditions' => array('Country.is_active' => 'Y'));
        $countries = $this->Country->find('list', $options1);

        $this->loadModel('State');
        $options2 = array('conditions' => array('State.is_active' => 'Y'));
        $states = $this->State->find('list', $options2);

        $this->loadModel('City');
        $options3 = array('conditions' => array('City.is_active' => 'Y'));
        $cities = $this->City->find('list', $options3);
        //pr($cities); exit;

        $this->loadModel('Billing');
        if ($this->request->is(array('post', 'put'))) {

            if ($this->Billing->save($this->request->data)) {
                $lastbillingId = $this->Billing->getLastInsertId();
                $this->Session->write('billingid', $lastbillingId);
                return $this->redirect(array('action' => 'paypalsend'));
            } else {
                $this->Session->setFlash(__('The Listing could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('userpanties', 'countries', 'states', 'cities'));
    }

    public function deletefavorites($id = null) {

        $this->loadModel("Favorite");

        $this->Favorite->id = $id;
        if (!$this->Favorite->exists()) {
            throw new NotFoundException(__(''));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Favorite->delete()) {
            $this->Session->setFlash(__('The Favorite has been deleted.'));
            return $this->redirect(array('action' => 'myfavorites'));
        } else {
            $this->Session->setFlash(__('The Favorite could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'myfavorites'));
    }

    public function workrooms() {
        
    }

    public function cart() {

        if ($this->Session->read('fuid') == '') {
            $this->Session->setFlash(__('Please login to access profile.', 'default', array('class' => 'error')));
            return $this->redirect('/');
        }


        $this->loadModel("Cart");

        if ($this->request->is('post', 'put')) {

            if ($this->request->data['Cart']['user_id'] == '') {
                $this->request->data['Cart']['user_id'] = 0;
            } else {
                $this->request->data['Cart']['user_id'] = $this->request->data['Cart']['user_id'];
            }

            $userid = $this->request->data['Cart']['user_id'];
            $productid = $this->request->data['Cart']['product_id'];

            $options1 = array('conditions' => array('Cart.user_id' => $userid, 'Cart.product_id' => $productid));
            $fetchproductDetails = $this->Cart->find('count', $options1);

            if ($fetchproductDetails == 0) {
                $this->Cart->create();
                $this->Cart->save($this->request->data);
            } else {
                $this->Session->setFlash(__('The product allready in cart.'));
                return $this->redirect(array('action' => 'cart'));
            }
        }

        $headeruserId = $this->Session->read('fuid');
        $this->Cart->recursive = 2;
        $cartitems = $this->Cart->find('all', array('conditions' => array('Cart.user_id' => $headeruserId)));

        $finalprice = 0;
        foreach ($cartitems as $crtitem) {

            $quan = $crtitem['Cart']['quan'];
            $price = $crtitem['Cart']['price'];
            $indprice = $quan * $price;
            $finalprice = $finalprice + $indprice;
        }
        $this->Session->write('totalamount', $finalprice);
        //echo $this->Session->read('totalamount');
        $this->set(compact('cartitems'));
        //pr($cartitems);
        //exit;
    }

    public function edit_cart() {
        $this->layout = false;
        $this->loadModel('Cart');
        $id = $this->request->data['Cart']['id'];

        $findCart = $this->Cart->find('first', array('conditions' => array('Cart.id' => $id)));
        if ($findCart) {
            $this->request->data['Cart']['id'] = $id;
            //$this->Cart->create();
            if ($this->Cart->save($this->request->data)) {
                $this->redirect(array('action' => 'cart'));
            }
        } else {
            $this->redirect(array('action' => 'cart'));
        }
    }

    public function delete_cart($id = null) {
        $this->loadModel('Cart');
        if (is_null($id)) {
            throw new NotFoundException(__l('Invalid Request'));
        }
        if ($id) {

            $findcartTab = $this->Cart->find('first', array('conditions' => array('Cart.id' => $id)));
            $listingId = $findcartTab['Cart']['product_id'];

            $this->Cart->delete($id);
        }
        return $this->redirect(array('action' => 'cart'));
    }

    public function country_state() {

        $this->layout = false;
//$this->layout = 'ajax';

        $this->loadModel('State');

        $options2 = array('conditions' => array('State.country_id' => $_REQUEST['stId']));
        $statelist = $this->State->find('list', $options2);

//pr($subcategorylist);
//exit;

        $this->set(compact('statelist'));

//$this->autoRender = null;
    }

    public function state_city() {

        $this->layout = false;
//$this->layout = 'ajax';

        $this->loadModel('City');

        $options2 = array('conditions' => array('City.state_id' => $_REQUEST['stId']));
        $citylist = $this->City->find('list', $options2);

        // pr($citylist);
        // exit;

        $this->set(compact('citylist'));

//$this->autoRender = null;
    }

    public function paypalsend() {
        
    }

    public function failurepay() {
        
    }

    public function successpay() {

        date_default_timezone_set("GMT");

        $this->loadModel('Cart');
        $this->loadModel('Order');
        $this->loadModel('OrderDetail');
        $this->loadModel('Product');
        $this->loadModel('Billing');

        $this->loadModel('Country');
        $this->loadModel('State');
        $this->loadModel('City');
        $this->loadModel('SiteSetting');
        $this->loadModel('ProductImage');
        $this->loadModel('User');



        $this->request->data['Order']['user_id'] = $this->Session->read('fuid');
        $this->request->data['Order']['total_amount'] = $this->Session->read('totalamount');
        $this->request->data['Order']['payment_date'] = date("Y-m-d H:i:s");
        $this->request->data['Order']['order_date'] = date("Y-m-d H:i:s");
        $this->request->data['Order']['admin_paid'] = 0;
        $this->request->data['Order']['payment_status'] = 1;
        $this->request->data['Order']['billing_id'] = $this->Session->read('billingid');
        $this->request->data['Order']['currency_type'] = 'usd';
        $this->request->data['Order']['exchange_val'] = '1';

        $this->Cart->recursive = -1;
        $cartitems = $this->Cart->find('all', array('conditions' => array('Cart.user_id' => $this->Session->read('fuid'))));

        $options = array('conditions' => array('SiteSetting.' . $this->SiteSetting->primaryKey => 1));
        $sitesetting = $this->SiteSetting->find('first', $options);
        //$percentage = $sitesetting['SiteSetting']['admin_percentage'];



        $req = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }

        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen('www.paypal.com', 80, $errno, $errstr, 30);



        if (!$fp) {
            
        } else {
            fputs($fp, $header . $req);
            $res = fgets($fp, 1024);

//echo "<pre>";
//print_r($_POST);
//exit;


            if ($_POST['payment_status'] == "Completed" || $_POST['payment_status'] == "Pending") {

                $this->request->data['Order']['transaction_id'] = $_POST['txn_id'];
                $this->Order->create();
                if ($this->Order->save($this->request->data)) {
                    $lastorderId = $this->Order->getLastInsertId();
                    $this->OrderDetail->create();
                }

                $totalprice = 0;
                $ct = count($cartitems);

                foreach ($cartitems as $crtitem) {

                    $quan = $crtitem['Cart']['quan'];
                    $originalprice = $crtitem['Cart']['price'];
                    $price = $crtitem['Cart']['price'];
                    $ownerid = 0;
                    $listid = $crtitem['Cart']['product_id'];
                    $indprice = $quan * $price;
                    $data = array();

                    $options1 = array('conditions' => array('Product.id' => $listid));
                    $scost = $this->Product->find('first', $options1);
                    //$shippingcost = $scost['Listing']['shipping_cost'];
                    $mainquan = $scost['Product']['quan'];

                    $totalquan = $mainquan - $quan;
                    $this->Product->id = $listid;
                    $this->Product->saveField('quan', $totalquan);


                    //$adminpers = (($indprice + $shippingcost) * $percentage) / 100;
                    //$peruser = ($indprice + $shippingcost) - $adminpers;



                    $data['OrderDetail']['order_id'] = $lastorderId;
                    $data['OrderDetail']['list_id'] = $listid;
                    $data['OrderDetail']['user_id'] = $this->Session->read('fuid');
                    $data['OrderDetail']['owner_id'] = 0;
                    $data['OrderDetail']['price'] = $price;
                    $data['OrderDetail']['oiginal_price'] = $originalprice;
                    $data['OrderDetail']['quantity'] = $quan;
                    $data['OrderDetail']['amount'] = $indprice;
                    $data['OrderDetail']['admin_amount'] = 0;
                    $data['OrderDetail']['seller_amount'] = 0;
                    $data['OrderDetail']['shipping_cost'] = 0;
                    $data['OrderDetail']['order_date'] = date("Y-m-d H:i:s");
                    $data['OrderDetail']['currency_type'] = 'usd';
                    $data['OrderDetail']['exchange_val'] = 1;
                    $this->OrderDetail->create();
                    $this->OrderDetail->save($data);

//$totaolpricedb+=$indprice + $shippingcost;
                }

                $userd = array('conditions' => array('User.id' => $this->Session->read('fuid')));
                $userdetails = $this->User->find('first', $userd);

                $bill = array('conditions' => array('Billing.id' => $this->Session->read('billingid')));
                $billingdetails = $this->Billing->find('first', $bill);


                $country = array('conditions' => array('Country.id' => $billingdetails['Billing']['country_id']));
                $countrydetails = $this->Country->find('first', $country);

                $state = array('conditions' => array('State.id' => $billingdetails['Billing']['state_id']));
                $statedetails = $this->State->find('first', $state);

                $city = array('conditions' => array('City.id' => $billingdetails['Billing']['city_id']));
                $citydetails = $this->City->find('first', $city);


                $country1 = array('conditions' => array('Country.id' => $billingdetails['Billing']['shipping_country_id']));
                $countrydetails1 = $this->Country->find('first', $country1);

                $state1 = array('conditions' => array('State.id' => $billingdetails['Billing']['shipping_state_id']));
                $statedetails1 = $this->State->find('first', $state1);

                $city1 = array('conditions' => array('City.id' => $billingdetails['Billing']['shipping_city_id']));
                $citydetails1 = $this->City->find('first', $city1);



                $ORDER_DETAILS = "";
                $ORDER_DETAILS.="<table width='100%' cellspacing='0' cellpadding='0' border='0' class='table table-listing'>
<tr>
<td><ul>
    <li style='list-style:none; background-color:#009900;margin-bottom:6px; color:#ffffff'><b>Customer Details</b></li>
    <li style='list-style:none;'><span>Customer Name :</span>" . $userdetails['User']['name'] . "</li>
    <li style='list-style:none;'><span>Email :</span>" . $userdetails['User']['email'] . "</li>
    <li style='list-style:none;'><span>Contact No :</span>" . $userdetails['User']['phone_no'] . "</li>
    <li style='list-style:none;'>&nbsp;</li>
</ul></td>

<td><ul>
    <li style='list-style:none; background-color:#009900;margin-bottom:6px; color:#ffffff'><b>Payment Details</b></li>
    <li style='list-style:none;'><span>Payment Type :</span>Paypal</li>
    <li style='list-style:none;'><span>Order ID :</span>" . $_POST['txn_id'] . "</li>
    <li style='list-style:none;'><span>Amount :</span>$" . $this->Session->read('totalamount') . "</li>
     <li style='list-style:none;'><span>Payment Date : </span>" . date("Y-m-d H:i:s") . "</li>";

                $ORDER_DETAILS.="
</ul></td>
</tr>
<tr>
<td><ul>
    <li style='list-style:none; background-color:#009900;margin-bottom:6px; color:#ffffff'><b>Billing Details</b></li>
    <li style='list-style:none;'><span>Address :</span>" . $billingdetails['Billing']['address1'] . "</li>
    <li style='list-style:none;'><span>Country :</span>" . $countrydetails['Country']['name'] . "</li>
    <li style='list-style:none;'><span>State:</span>" . $statedetails['State']['name'] . "</li>
    <li style='list-style:none;'><span>City : </span>" . $citydetails['City']['name'] . "</li>
    <li style='list-style:none;'><span>Zip : </span>" . $billingdetails['Billing']['zip'] . "</li>";



                $ORDER_DETAILS.="</ul></td>
    <td><ul>
    <li style='list-style:none; background-color:#009900;'><b>Shipping Details</b></li>
    <li style='list-style:none;'><span>Address :</span>" . $billingdetails['Billing']['shipping_address1'] . "</li>
    <li style='list-style:none;'><span>Country :</span>" . $countrydetails1['Country']['name'] . "</li>
    <li style='list-style:none;'><span>State:</span>" . $statedetails1['State']['name'] . "</li>
    <li style='list-style:none;'><span>City : </span>" . $citydetails1['City']['name'] . "</li>
    <li style='list-style:none;'><span>Zip : </span>" . $billingdetails['Billing']['shipping_zip'] . "</li>
</ul></td>
</tr>
</table>";
                $ORDER_DETAILS.="<table width='100%' cellspacing='0' cellpadding='0' border='0' class='table table-listing'>
	<tr>
	<th style='color:#FFFFFF; background-color:#009900;'>
	Item Name
	</th>
	<th style='color:#FFFFFF; background-color:#009900'>
	Image
	</th>
	<th style='color:#FFFFFF; background-color:#009900'>
	QTY
	</th>
	<th style='color:#FFFFFF; background-color:#009900'>
	Price
	</th>
	<th style='color:#FFFFFF; background-color:#009900'>
	Total
	</th>
	</tr>";

                $path = Configure::read('SITE_URL');
                foreach ($cartitems as $crtitem) {

                    $quan = $crtitem['Cart']['quan'];
                    $originalprice = $crtitem['Cart']['price'];
                    $price = $crtitem['Cart']['price'];
                    $ownerid = 0;
                    $this->Session->write('ownerid', $ownerid);
                    $listid = $crtitem['Cart']['product_id'];
                    $indprice = $quan * $price;
                    $data = array();

                    $options1 = array('conditions' => array('Product.id' => $listid));
                    $scost = $this->Product->find('first', $options1);
                    //$shippingcost = $scost['Product']['shipping_cost'];
                    //$adminpers = (($indprice + $shippingcost) * $percentage) / 100;
                    //$peruser = ($indprice + $shippingcost) - $adminpers;

                    $img = $path . 'product_img/' . $scost['ProductImage']['0']['image'];

                    $ORDER_DETAILS.="<tr>
                     <td>" .
                            $scost['Product']['name'] .
                            "</td>";
                    $imgage = $img;
                    $ORDER_DETAILS.="<td>
      <img src=$imgage width='100' height='100'  border='0' align='center' alt='' />
    </td>
    <td style='color:red;font-weight: bold;'>" .
                            $quan .
                            "</td>
    <td>$" .
                            $price .
                            "</td>
    <td>
      $" . $total = $indprice .
                            "</td>
    
  </tr>";
                }

                $ORDER_DETAILS.="</table>";

                $contact_email = $this->SiteSetting->find('first', array('conditions' => array('SiteSetting.id' => 1), 'fields' => array('SiteSetting.contact_email')));
                if ($contact_email) {
                    $adminEmail = $contact_email['SiteSetting']['contact_email'];
                } else {
                    $adminEmail = 'superadmin@thedirectory.com';
                }


                $msg_body = 'Hi ' . $userdetails['User']['name'] . '<br/><br/>Thank you for purchesing with us. Thank You';
                App::uses('CakeEmail', 'Network/Email');
                $Email = new CakeEmail();

                /* pass user input to function */
                $Email->emailFormat('both');
                $Email->from(array($adminEmail => 'The Directory'));
                $Email->to($userdetails['User']['email']);
                $Email->subject('Welcome to The Directory');
                $Email->send($ORDER_DETAILS);
            } else {
                
            }
        }
        if (strcmp($res, "INVALID") == 0) {
            
        }

        //pr($this->Session); exit;
        fclose($fp);

        $this->Session->delete('billingid');
        $this->Session->delete('totalamount');
        $this->Session->delete('lastpromouseid');
        $this->Session->delete('coupondiscount');
        $this->Session->delete('currency_type');
        $this->Session->delete('currencies_val');
        $this->Session->delete('finaltotalamount');
        $this->Session->delete('ownerid');

        $this->Cart->deleteAll(array('Cart.user_id' => $this->Session->read('fuid')));

            $options = array('conditions' => array('User.id' => $this->Session->read('fuid')));
            $usertype = $this->User->find('first', $options);


        if($usertype['User']['user_type'] == 'C'){    
            return $this->redirect(array('controller' => 'clubs', 'action' => 'myorders'));
        }

        if($usertype['User']['user_type'] == 'E'){    
            return $this->redirect(array('controller' => 'escorts', 'action' => 'myorders'));
        }

        if($usertype['User']['user_type'] == 'U'){    
            return $this->redirect(array('controller' => 'users', 'action' => 'purchased'));
        }

        if($usertype['User']['user_type'] == 'P'){    
            return $this->redirect(array('controller' => 'clubs', 'action' => 'myorders'));
        }

    }



     public function admin_addlocation() {
        $this->loadModel('Location');
        $this->loadModel('Country');


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Location.name' => $this->request->data['Location']['name']));
            $name = $this->Location->find('first', $options);
            if (!$name) {
                $this->Location->create();
                if ($this->Location->save($this->request->data)) {
                    $this->Session->setFlash(__('The location has been saved.'));
                    return $this->redirect(array('action' => 'listlocation'));
                } else {
                    $this->Session->setFlash(__('The location could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The location name already exists. Please, try again.'));
            }
        }

         $optionslocations = array('conditions' => array('Country.is_active' => 'Y'));
        $locationsname = $this->Country->find('list', $optionslocations);

        $this->set(compact('parents', 'title_for_layout', 'attrs','locationsname'));
    }

    public function admin_listlocation() {

        $this->loadModel('Location');

        $this->paginate = array(
            'conditions' => array('Location.name !=' => ''),
            'limit' => 8,
            'order' => array(
                'Location.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('etenecities', $this->Paginator->paginate('Location'));
    }

    public function admin_editlocation($id = null) {


        $this->loadModel('Location');

        if (!$this->Location->exists($id)) {
            throw new NotFoundException(__('Invalid location'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Location.name' => $this->request->data['Location']['name']));
            $name = $this->Location->find('first', $options);


            if ($this->Location->save($this->request->data)) {
                $this->Session->setFlash(__('The location has been saved.'));
            } else {
                $this->Session->setFlash(__('The location could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Location.' . $this->Location->primaryKey => $id));
            $this->request->data = $this->Location->find('first', $options);
        }

        $this->set(compact('title_for_layout', 'attrs', 'editattrs'));
    }

    public function admin_deletelocation($id = null) {

        $this->loadModel('Location');

        $this->Location->id = $id;
        if (!$this->Location->exists()) {
            throw new NotFoundException(__('Invalid location'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Location->delete()) {
            $this->Session->setFlash(__('The ethecity has been deleted.'));
        } else {
            $this->Session->setFlash(__('The ethenecty could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listlocation'));
    }

    public function admin_activelocation($id = null, $val = null) {

        $this->loadModel('Location');

        $this->Location->id = $id;
        $this->request->data['Location']['is_active'] = $val;

        $this->Location->save($this->request->data);


        return $this->redirect(array('action' => 'listlocation'));
    }

    //////////////////////////////////////////////////////////////////////////////////////////


    public function admin_addsuburb() {
        $this->loadModel('Location');
        $this->loadModel('Suburb');

        $optionslocations = array('conditions' => array('Location.name !=' => ''));
        $locationsname = $this->Location->find('list', $optionslocations);


        if ($this->request->is('post')) {

            $options = array('conditions' => array('Suburb.name' => $this->request->data['Suburb']['name']));
            $name = $this->Suburb->find('first', $options);
            if (!$name) {
                //pr($this->request->post); exit;
                $this->Suburb->create();
                if ($this->Suburb->save($this->request->data)) {
                    $this->Session->setFlash(__('The Suburb has been saved.'));
                    return $this->redirect(array('action' => 'listsuburb'));
                } else {
                    $this->Session->setFlash(__('The Suburb could not be saved. Please, try again.'));
                }
            } else {
                $this->Session->setFlash(__('The Suburb name already exists. Please, try again.'));
            }
        }
        $this->set(compact('parents', 'title_for_layout', 'attrs', 'locationsname'));
    }

    public function admin_listsuburb() {

         $this->loadModel('Suburb');
         $this->loadModel('Suburb');

        $this->paginate = array(
            'conditions' => array('Suburb.name !=' => ''),
            'limit' => 8,
            'order' => array(
                'Suburb.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;

        $this->set('suburbs', $this->Paginator->paginate('Suburb'));
    }

    public function admin_editsuburb($id = null) {


        $this->loadModel('Suburb');
        $this->loadModel('Location');
        if (!$this->Suburb->exists($id)) {
            throw new NotFoundException(__('Invalid Suburb'));
        }


        if ($this->request->is(array('post', 'put'))) {


            $options = array('conditions' => array('Suburb.name' => $this->request->data['Suburb']['name']));
            $name = $this->Suburb->find('first', $options);


            if ($this->Suburb->save($this->request->data)) {
                $this->Session->setFlash(__('The Suburb has been saved.'));
            } else {
                $this->Session->setFlash(__('The Suburb could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Suburb.' . $this->Suburb->primaryKey => $id));
            $this->request->data = $this->Suburb->find('first', $options);
        }
         $locations = $this->Location->find('list',array('fields'=>array("Location.id","Location.name")));
        $this->set(compact('title_for_layout', 'attrs', 'editattrs','locations'));
    }

    public function admin_deletesuburb($id = null) {

        $this->loadModel('Suburb');

        $this->Suburb->id = $id;
        if (!$this->Suburb->exists()) {
            throw new NotFoundException(__('Invalid Suburb'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Suburb->delete()) {
            $this->Session->setFlash(__('The Suburb has been deleted.'));
        } else {
            $this->Session->setFlash(__('The Suburb could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'listsuburb'));
    }

    public function admin_activesuburb($id = null, $val = null) {

        $this->loadModel('Suburb');

        $this->Suburb->id = $id;
        $this->request->data['Suburb']['is_active'] = $val;

        $this->Suburb->save($this->request->data);


        return $this->redirect(array('action' => 'listsuburb'));
    }

   
    public function likeescortprofile(){
        $this->loadModel("Like");
        //pr($this->request->data);exit;



       if ($this->request->is('post')) 
       {

        //     $options = array('conditions' => array('Like.from_id' => $this->request->data['senderid'] , 'Like.to_id' => $this->request->data['userid']));
        //     $name = $this->Like->find('first', $options);
            
        //     //pr($name); exit;
        //     if ($name == '') {
        //         //pr($this->request->data); exit;
                    
        //             $this->request->data['Like']['from_id'] = $this->request->data['senderid'];
        //             $this->request->data['Like']['to_id'] = $this->request->data['userid'];

        //              $this->Like->create();

        //         if ($this->Like->save($this->request->data)) {
        //         $this->Session->setFlash('Profile Liked', 'default', array('class' => 'success'));
        //         return $this->redirect(array('action' => 'latestcomments'));
        //         }
                   

        //     } else {
        //         $this->Session->setFlash(__('The Profile is already Liked'));
        //         $this->redirect(array('action' => 'latestcomments'));
        //     }
        // }

        $options = array('conditions' => array('Like.from_id' => $this->request->data['senderid'] , 'Like.to_id' => $this->request->data['userid']));
       $name = $this->Like->find('first', $options);
       //pr($name); exit;

        if(empty($name)){

            $this->request->data['Like']['from_id'] = $this->request->data['senderid'];
            $this->request->data['Like']['to_id'] = $this->request->data['userid'];

             $this->Like->create();

            if ($this->Like->save($this->request->data)) {
                //$this->Session->setFlash('Profile Liked', 'default', array('class' => 'success'));
                echo 'Liked';
                return $this->redirect(array('action' => 'latestcomments'));
            }
        }else{
                $this->Session->setFlash('Profile Liked Already', 'default', array('class' => 'failure'));
                return $this->redirect(array('action' => 'latestcomments'));
        }
    }

    }

    public function shop(){

        $this->loadModel('Product');

        $this->Product->recursive = 2;




        $this->paginate = array(
            'conditions' => array('Product.id !=' => ''),
            'limit' => 24,
            'order' => array(
            'Product.id' => 'desc'
            )
        );
        $this->Paginator->settings = $this->paginate;
        $this->set('allproductsfront', $this->Paginator->paginate('Product'));
    }
	
	
	public function right_panel(){

       
    }
    
	public function leftcategory_panel(){
	
       
    }
    public function viewpage($name) 
    {
        $this->loadModel('Content');
        $content=$this->Content->find('first',array('conditions'=>array('Content.page_name'=>$name)));
        $this->set(compact('content'));
        
    }
    
    
}
