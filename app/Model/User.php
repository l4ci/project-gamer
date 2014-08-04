<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	var $user = "User";

	public function beforeSave($options = array()) {
    if (!empty($this->data['User']['password'])) {
      $passwordHasher = new SimplePasswordHasher(array('hashType' => 'sha256'));
      $this->data['User']['password'] = $passwordHasher->hash(
          $this->data['User']['password']
      );
    }
    return true;
  }

	public $validate = array(
    'username' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a username.'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Username is already taken.'
			),
			'isOkayLong' => array(
				'rule' => array('between', 3, 20),
				'message' => 'The username must be between 3 and 20 characters.'
			),
			'alphaNumericDashUnderscore' => array(
          'rule'    => array('alphaNumericDashUnderscore'),
          'message' => 'Username can only be letters, numbers and underscores'
      )
    ),
    'name' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a name.'
			)
    ),
    'email' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a valid email.'
			),
			'isEmail' => array(
				'rule' => array('email'),
				'message' => 'Please enter a valid email.'
			)
    ),
    'password' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a password.'
			),
			'isOkayLong' => array(
				'rule' => array('minLength', 5),
				'message' => 'The password must be at least 5 characters long.'
			)
    ),
  );

	public function alphaNumericDashUnderscore($check) {
		$value = array_values($check);
		$value = $value[0];

		return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
	}
}
