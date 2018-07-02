<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require ('./vendor/autoload.php');
$app = new \Slim\Slim(array(
    'debug' => true
        ));

class AllCapsMiddleware extends \Slim\Middleware {

    public function call() {
        // Get reference to application
        $app = $this->app;

        $req = $app->request;

        //print_r($req);exit;
        // Run inner middleware and application
        $this->next->call();

        // Capitalize response body

        $res = $app->response;
        //$body = $res->getBody();
        if ($req->headers->get('Token') != "123456") {
            $res->setStatus(401);
            $res->setBody("{\"msg\":\"not authorised\"}");
        }
    }

}

$corsOptions = array(
    "origin" => "*",
    "exposeHeaders" => array("Content-Type", "X-Requested-With", "X-authentication", "X-client"),
    "allowMethods" => array('GET', 'POST', 'PUT', 'DELETE', 'OPTIONS')
);
$cors = new \CorsSlim\CorsSlim($corsOptions);

$app->add($cors);



//$app->add(new \CorsSlim\CorsSlim());
//$app->add(new \AllCapsMiddleware());
//$app->response->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
$app->response->headers->set('Content-Type', 'application/json');




$app->group('/users', function () use ($app) {
    	
    	$app->post('/databaseTesting', 'databaseTesting');
		$app->post('/Signup', 'Signup');
		$app->post('/Login', 'Login');
	    $app->post('/User_ForgotPassword', 'User_ForgotPassword');   
      $app->get('/countriesList', 'countriesList');
       $app->get('/ListCountry', 'ListCountry');
       $app->post('/sendOTP', 'sendOTP');
	      $app->post('/changepwd', 'changepwd');
	      $app->post('/userListing', 'userListing');
	      $app->post('/addProject', 'addProject');
	      //$app->post('/frequentlyContacted', 'frequentlyContacted');
	      $app->post('/projectList', 'projectList');
	 //    $app->post('/logout', 'logout');
	 //    $app->post('/userprofile', 'userprofile');
		// $app->post('/updateProfile', 'updateProfile');  
  //       $app->post('/listProducts', 'listProducts');  
  //       $app->post('/productDetails', 'productDetails');  
  //       $app->post('/addFavoriteProduct', 'addFavoriteProduct');  
  //       $app->post('/myFavoriteProduct', 'myFavoriteProduct');
  //       $app->post('/updateProfilePhoto', 'updateProfilePhoto'); 
        
  //       $app->post('/removeFavoriteProduct', 'removeFavoriteProduct');
  //       $app->post('/addProduct', 'addProduct');
  //       $app->post('/updateItemRequest', 'updateItemRequest');
  //       $app->post('/removeProduct', 'removeProduct');
  //       $app->post('/listNotification', 'listNotification');
  //       $app->post('/listOrders', 'listOrders');
        
  //       $app->post('/myProducts', 'myProducts');
  //       $app->post('/countNotification', 'countNotification'); 
  //       $app->post('/orderDetails', 'orderDetails');
  //       $app->post('/itemRequest', 'itemRequest');
  //       $app->post('/itemRating', 'itemRating');
  //       $app->post('/listmyRequests', 'listmyRequests');
  //       $app->post('/search', 'search');
  //       $app->post('/readNotification', 'readNotification');
	 //    $app->post('/followUser', 'followUser');
  //       $app->post('/otherUserDetails', 'otherUserDetails');
  //       $app->post('/listfolloweduser', 'listfolloweduser');
  //       $app->post('/unfollowUser', 'unfollowUser');
  //       $app->post('/listcategories', 'listcategories');
  //       $app->post('/listcategoriessub1', 'listcategoriessub1');
  //       $app->post('/listcategoriessub2', 'listcategoriessub2');
  //        $app->post('/listcategoriessub3', 'listcategoriessub3');
  //         $app->post('/listcategoriessub4', 'listcategoriessub4');
  //        $app->post('/updateProductPhoto', 'updateProductPhoto');

  //         $app->post('/subcatList', 'subcatList');

         
          
             
            
           
          
        
        //$app->post('/unfollowUser', 'unfollowUser');
});
?>