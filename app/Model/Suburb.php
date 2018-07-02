<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property User $User
 */
class Suburb extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
   
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'location_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),);

    
    
}
