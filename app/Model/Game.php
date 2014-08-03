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
    )
  );
}
