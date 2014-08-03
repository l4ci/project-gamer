<?php
class UsersController extends AppController {
	var $name = "Users";

	public $scaffold = 'admin';
	public $helpers = array('Html', 'Form', 'Session');
  public $components = array('Session');


	public function index() {
		$this->set('users', $this->User->find('all'));
	}

	public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }
    $this->set('user', $user);
  }
}
