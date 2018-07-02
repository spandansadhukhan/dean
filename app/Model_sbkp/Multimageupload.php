<?php
App::uses('AppModel', 'Model');
/**
 * Honour Model
 *
 * @property User $User
 * @property Event $Event
 */
class Multimageupload extends AppModel {

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
