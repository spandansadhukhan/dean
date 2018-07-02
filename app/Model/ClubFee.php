<?php
App::uses('AppModel', 'Model');
/**
 * Slider Model
 *
 */
class ClubFee extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array();

	 public $belongsTo = array(
		'Club' => array(
			'className' => 'User',
			'foreignKey' => 'club_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
