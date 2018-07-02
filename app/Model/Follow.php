<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Follow extends AppModel {

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
			'foreignKey' => 'follower_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Fromuser' => array(
			'className' => 'User',
			'foreignKey' => 'following_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
