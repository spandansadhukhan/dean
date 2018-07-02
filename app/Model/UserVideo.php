<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class UserVideo extends AppModel {

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
			'foreignKey' => 'uid',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		
	);
}
