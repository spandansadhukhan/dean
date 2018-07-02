<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Escorttour extends AppModel {

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
			'foreignKey' => 'escort_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'State' => array(
			'className' => 'State',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'City' => array(
			'className' => 'City',
			'foreignKey' => 'state_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
