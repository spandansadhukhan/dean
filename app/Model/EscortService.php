<?php

App::uses('AppModel', 'Model');

/**
 * SiteSetting Model
 *
 * @property User $User
 */
class EscortService extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
    );

    
    public $belongsTo = array(
        'Service' => array(
            'className' => 'Service',
            'foreignKey' => 'service_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'uid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );    
    
    
    
    
    //The Associations below have been created with all possible keys, those that are not needed can be removed
}
