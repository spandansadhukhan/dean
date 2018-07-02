<?php

App::uses('AppModel', 'Model');

/**
 * SiteSetting Model
 *
 * @property User $User
 */
class EscortCategory extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
    );

    
    public $belongsTo = array(
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
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
