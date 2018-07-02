<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
  */
class EscortRenewal extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	

/**
 * hasMany associations
 *
 * @var array
 */

public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                
	);        

}
