<?php

App::uses('AppModel', 'Model');

/**
 * Order Model
 *
 * @property User $User
 */
class Order extends AppModel {

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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Billing' => array(
            'className' => 'Billing',
            'foreignKey' => 'billing_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
        'OrderDetail' => array(
            'className' => 'OrderDetail',
            'foreignKey' => 'order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * hasMany associations
     *
     * @var array
     */
}
