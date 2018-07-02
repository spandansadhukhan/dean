<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Faq extends AppModel {

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
		'FaqCategory' => array(
			'className' => 'FaqCategory',
			'foreignKey' => 'type',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		));
    
}
