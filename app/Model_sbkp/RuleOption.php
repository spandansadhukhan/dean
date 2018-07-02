<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
  */
class RuleOption extends AppModel {

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
	public $belongsTo = array(
		'Rule' => array(
			'className' => 'Rule',
			'foreignKey' => 'rule_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
		
	);


/**
 * hasMany associations
 *
 * @var array
 */
	

}
