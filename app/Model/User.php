<?php
App::uses('AppModel', 'Model');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
/**
 * User Model
 *
 * @property EmailNotification $EmailNotification
 * @property FavoriteList $FavoriteList
 * @property FavoriteShop $FavoriteShop
 * @property FavoriteTreasury $FavoriteTreasury
 * @property InboxMessage $InboxMessage
 * @property Preference $Preference
 * @property Privacy $Privacy
 * @property Security $Security
 * @property SentMessage $SentMessage
 * @property ShippingAddress $ShippingAddress
 * @property Shop $Shop
 *
 */
class User extends AppModel {

    public $actsAs = array('Containable');
/**
 * Validation rules
 *
 * @var array
 */

	 public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$this->data[$this->alias]['password'] = md5(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
        
        

/*
        public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	} */


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	/*public $hasMany = array(
		'Task' => array(
			'className' => 'Task',
			'foreignKey' => 'user_id',
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
                'Comment' => array(
			'className' => 'Comment',
			'foreignKey' => 'user_id',
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
             'Skill' => array(
			'className' => 'Skill',
			'foreignKey' => 'user_id',
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
            'Activity' => array(
			'className' => 'Activity',
			'foreignKey' => 'user_id',
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

	);*/
    public $hasMany = array(
		'UserVideo' => array(
			'className' => 'UserVideo',
			'foreignKey' => 'uid',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'UserImage' => array(
			'className' => 'Photo',
			'foreignKey' => 'uid',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),'Rate' => array(
		   'className' => 'Rate',
		   'foreignKey' => 'user_id',
		   'dependent' => false,
		   'conditions' => '',
		   'fields' => '',
		   'order' => '',
		   'limit' => '',
		   'offset' => '',
		   'exclusive' => '',
		   'finderQuery' => '',
		   'counterQuery' => ''
		),'fav' => array(
		   'className' => 'Favorite',
		   'foreignKey' => 'to_id',
		   'dependent' => false,
		   'conditions' => '',
		   'fields' => '',
		   'order' => '',
		   'limit' => '',
		   'offset' => '',
		   'exclusive' => '',
		   'finderQuery' => '',
		   'counterQuery' => ''
		),'Follow' => array(
		   'className' => 'Follow',
		   'foreignKey' => 'following_id',
		   'dependent' => false,
		   'conditions' => '',
		   'fields' => '',
		   'order' => '',
		   'limit' => '',
		   'offset' => '',
		   'exclusive' => '',
		   'finderQuery' => '',
		   'counterQuery' => ''
		),'EscortCategory' => array(
		   'className' => 'EscortCategory',
		   'foreignKey' => 'uid',
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
        
                
        
        
    );
    public $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Location' => array(
			'className' => 'Location',
			'foreignKey' => 'city_id',
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
		'Haircolor' => array(
			'className' => 'Haircolor',
			'foreignKey' => 'haircolor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'Eyecolor' => array(
			'className' => 'Eyecolor',
			'foreignKey' => 'eyecolor_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'BodyType' => array(
			'className' => 'BodyType',
			'foreignKey' => 'bodytype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),

		'EscortType' => array(
			'className' => 'EscortType',
			'foreignKey' => 'escorttype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Origin' => array(
			'className' => 'Origin',
			'foreignKey' => 'origin_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Availability' => array(
			'className' => 'Availability',
			'foreignKey' => 'availability_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Availability' => array(
			'className' => 'Availability',
			'foreignKey' => 'availability_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Nationality' => array(
			'className' => 'Nationality',
			'foreignKey' => 'availability_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
//                'Category' => array(
//			'className' => 'Category',
//			'foreignKey' => 'category_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
        


	);
	public $hasOne = array(
		'rate' => array(
			'className' => 'Rate',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
