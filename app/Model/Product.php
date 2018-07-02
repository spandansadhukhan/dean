<?php

App::uses('AppModel', 'Model');

/**
 * State Model
 *
 */
class Product extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array();

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'ProductImage' => array(
            'className' => 'ProductImage',
            'foreignKey' => 'product_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Gettwoimage' => array(
            'className' => 'ProductImage',
            'foreignKey' => 'product_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '1',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
    public $belongsTo = array(
        'ShopCategorie' => array(
            'className' => 'ShopCategorie',
            'foreignKey' => 'product_category_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

}
