<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'users', 'action' => 'index'));
	//Router::connect('/', array('controller' => 'users', 'action' => 'index','admin'=>true,'prefix'=>'admin'));
	Router::connect('/admin', array('controller' => 'users', 'action' => 'index', 'admin' => true, 'prefix' => 'admin'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

        Router::connect('/register-info', array('controller' => 'users', 'action' => 'registerinfo'));
        Router::connect('/forgot-password', array('controller' => 'users', 'action' => 'fotgotpassword'));

        Router::connect('/contacts', array('controller' => 'contacts', 'action' => 'index'));

        Router::connect('/faq', array('controller' => 'pages', 'action' => 'faq'));
        Router::connect('/news', array('controller' => 'pages', 'action' => 'news'));
        Router::connect('/blog', array('controller' => 'pages', 'action' => 'blog'));
        Router::connect('/parlour', array('controller' => 'pages', 'action' => 'parlour'));
        Router::connect('/general-faq', array('controller' => 'pages', 'action' => 'generalfaq'));
        Router::connect('/escort-faq', array('controller' => 'pages', 'action' => 'escortfaq'));
        Router::connect('/client-faq', array('controller' => 'pages', 'action' => 'clientfaq'));
        Router::connect('/advertise-faq', array('controller' => 'pages', 'action' => 'advertisefaq'));
        Router::connect('/all-faq', array('controller' => 'pages', 'action' => 'all-faq'));
        Router::connect('/classified-ads/*', array('controller' => 'pages', 'action' => 'classifiedads'));
        Router::connect('/happy-hours', array('controller' => 'pages', 'action' => 'happyhours'));
        Router::connect('/online-escorts/*', array('controller' => 'pages', 'action' => 'onlineescorts'));
        Router::connect('/escort-reviews', array('controller' => 'pages', 'action' => 'escortreviews'));
        Router::connect('/latest-comments', array('controller' => 'pages', 'action' => 'latestcomments'));
        Router::connect('/advertisement', array('controller' => 'pages', 'action' => 'advertisement'));
        Router::connect('/how-it-works', array('controller' => 'pages', 'action' => 'viewpage','how-it-works'));
        Router::connect('/disclaimer', array('controller' => 'pages', 'action' => 'viewpage','disclaimer'));
        Router::connect('/privacy-policy', array('controller' => 'pages', 'action' => 'viewpage','privacy'));
        Router::connect('/terms-and-conditions', array('controller' => 'pages', 'action' => 'viewpage','terms-and-conditions'));
        Router::connect('/escort-details/*', array('controller' => 'escorts', 'action' => 'escortdetails'));
        Router::connect('/work-rooms/', array('controller' => 'pages', 'action' => 'workrooms'));
        Router::connect('/agencies', array('controller' => 'pages', 'action' => 'agencies'));

        Router::connect('/clubs', array('controller' => 'pages', 'action' => 'clubs'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
