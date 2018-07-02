<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Booking extends AppModel {

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
		),

		'Escort' => array(
			'className' => 'User',
			'foreignKey' => 'escort_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

		// ,

		// 'Service' => array(
		// 	'className' => 'Service',
		// 	'foreignKey' => 'service_id',
		// 	'conditions' => '',
		// 	'fields' => '',
		// 	'order' => ''
		// )
	);
}
