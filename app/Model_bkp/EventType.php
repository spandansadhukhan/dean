<?php
App::uses('AppModel', 'Model');
/**
 * EventType Model
 *
 * @property User $User
 */
class EventType extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasmany = array(
		'EventSubType' => array(
			'className' => 'EventType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'NewsArticle' => array(
			'className' => 'NewsArticle',
			'foreignKey' => 'event_subtype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
