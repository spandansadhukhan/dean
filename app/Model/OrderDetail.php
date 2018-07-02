<?php

App::uses('AppModel', 'Model');

/**
 * OrderDetail Model
 *
 * @property User $User
 */
class OrderDetail extends AppModel {

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
    public $belongsTo = array(
        'Order' => array(
            'className' => 'Order',
            'foreignKey' => 'id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        // 'Listing' => array(
        //     'className' => 'Listing',
        //     'foreignKey' => 'list_id',
        //     'conditions' => '',
        //     'fields' => '',
        //     'order' => ''
        // ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'owner_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );



}
