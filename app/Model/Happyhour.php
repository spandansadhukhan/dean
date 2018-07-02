<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Happyhour extends AppModel {

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
		)
	);
}
