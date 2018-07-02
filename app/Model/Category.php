<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property User $User
 */
class Category extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            )
        )
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /* public $hasMany = array(
      'Task' => array(
      'className' => 'Task',
      'foreignKey' => 'category_id',
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
      'Children'=>array(
      'className'=>'Category',
      'foreignKey'=>'parent_id'
      )


      ); */

//    public $belongsTo = array(
//        'Parent' => array(
//            'className' => 'Category',
//            'foreignKey' => 'parent_id'
//        ),
//
//        'User' => array(
//            'className' => 'User',
//            'foreignKey' => 'id',
//            'conditions' => '',
//            'fields' => '',
//            'order' => ''
//        )
//    );

}
