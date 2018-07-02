<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Privilege extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();
        
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
