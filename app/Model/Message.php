<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class Message extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();


	public $hasMany = array(

		     
    );
    public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'to_id',
			'conditions' => '',
			'fields' => array("User.id","User.name","User.email"),
			'order' => ''
		),
		'FromUser' => array(
			'className' => 'User',
			'foreignKey' => 'from_id',
			'conditions' => '',
			'fields' => array("FromUser.id","FromUser.name","FromUser.email"),
			'order' => ''
		)
	);
}