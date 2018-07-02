<?php
// App::uses('AppModel', 'Model');
// /**
//  * State Model
//  *
//   */
// class Rate extends AppModel {

// /**
//  * Validation rules
//  *
//  * @var array
//  */
// 	public $validate = array();

// 	//The Associations below have been created with all possible keys, those that are not needed can be removed

// /**
//  * belongsTo associations
//  *
//  * @var array
//  */
	

// /**
//  * hasMany associations
//  *
//  * @var array
//  */
	



App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Rate extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	/**
 * Validation rules
 *
 * @var array
 */

	

/**
 * hasMany associations
 *
 * @var array
 */
	
    public $hasMany = array(

		     
    );
    public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);	

}
