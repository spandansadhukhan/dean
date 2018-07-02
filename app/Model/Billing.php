<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property User $User
 */
class Billing extends AppModel {
    /**
     * Validation rules
     *
     * @var array
     */
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    public $belongsTo = array(
        'Country' => array(
            'className' => 'Country',
            'foreignKey' => 'country_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'State' => array(
            'className' => 'State',
            'foreignKey' => 'state_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'City' => array(
            'className' => 'City',
            'foreignKey' => 'city_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ShipCountry' => array(
            'className' => 'Country',
            'foreignKey' => 'shipping_country_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ShipState' => array(
            'className' => 'State',
            'foreignKey' => 'shipping_state_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'ShipCity' => array(
            'className' => 'City',
            'foreignKey' => 'shipping_city_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
}
