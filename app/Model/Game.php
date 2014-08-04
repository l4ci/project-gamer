<?php
class Game extends AppModel {
	var $game = "Game";

	public $validate = array(
    'title' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter the title of the game.'
			),
			'isUnique' => array(
				'rule' => 'isUnique',
				'message' => 'Game with this title already exists.'
			)
    ),
    'description' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a description of the game.'
			)
    ),
    'link' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please enter a link to the game store or official page.'
			)
    ),
    'type' => array(
  		'notEmpty' => array(
        'rule' => 'notEmpty',
				'message' => 'Please select what type of game this is.'
			)
    )
  );
}
