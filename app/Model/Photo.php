<?php
App::uses('AppModel', 'Model');
/**
 * State Model
 *
  */
class Photo extends AppModel {

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
        'Escort' => array(
            'className' => 'User',
            'foreignKey' => 'uid',
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
