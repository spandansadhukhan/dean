<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property User $User
 */
class Escort extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)

		);	


}
