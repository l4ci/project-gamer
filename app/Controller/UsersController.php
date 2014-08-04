<?php
class UsersController extends AppController {
	public $name = 'Users';


  public function beforeFilter() {
  	parent::beforeFilter();

  	// Public Access
  	$this->Auth->allow(
  		'add',  		// register
  		'profile',  // view profile
  		'login',
  		'logout'
  	);

  	if($this->Auth->user('roles') == 'admin') {
        $this->Auth->allow('*');
    } elseif($this->Auth->user('roles') == 'mod') {
        $this->Auth->allow(
        	'index',
        	'edit',
        	'deactivate',
        	'activate'
        );
    }
  }

/**
* INDEX - List all users
*/
	public function index() {
		$this->set('users', $this->User->find('all'));
	}


/**
 * PROFIL - page
 */
	public function profile() {
		$this->set('user', $this->Auth->user());
	}


/**
 * VIEW - a single user
 */
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


/**
 * ADD - a single user
 */
  public function add() {
  	if ($this->Auth->user()) {
			$this->Session->setFlash(__d('users', 'You are already registered and logged in!'));
			$this->redirect('/');
		}

    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('User has been saved.'));
          return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('Unable to add user.'));
    }
  }

/**
 * EDIT - a single user
 */
  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }

    $this->set('user', $user);

    if ($this->request->is(array('post', 'put'))) {
      $this->User->id = $id;
      if ($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('The user has been updated.'));
          return $this->redirect(array('action' => 'view',$id));
      }
      $this->Session->setFlash(__('Unable to update the user.'));
    }

    if (!$this->request->data) {
      $this->request->data = $user;
    }
	}


/**
 * DELETE - a single user by id
 */
	public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }

    if ($this->User->delete($id)) {
        $this->Session->setFlash(__('The User has been deleted.'));
        return $this->redirect(array('action' => 'index'));
    }
  }

/**
 * ACTIVATE - a user by id
 */
  public function activate($id = null) {
  	if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }

   	$this->User->saveField('active', 1);
		$this->Session->setFlash(__('User %s was activated!',$user['User']['username']));
		return $this->redirect(array('action' => 'index'));
	}

/**
 * DEACTIVATE - a user by id
 */
	public function deactivate($id = null) {
  	if (!$id) {
      throw new NotFoundException(__('Invalid user'));
    }

    $user = $this->User->findById($id);
    if (!$user) {
      throw new NotFoundException(__('Invalid user'));
    }

   	$this->User->saveField('active', 0);
		$this->Session->setFlash(__('User %s was deactivated!',$user['User']['username']));
		return $this->redirect(array('action' => 'index'));
	}


/**
 * LOGIN
 */
  public function login() {

  	//if already logged-in, redirect
    if($this->Session->check('Auth.User')){
      $this->redirect(array('action' => 'index'));
    }

  	if ($this->request->is('post')) {
      if ($this->Auth->login()) {
      	$this->User->saveField('last_login', date('Y-m-d H:i:s'));

      	$this->Session->setFlash(__('Welcome back!'));

    		if (empty($this->request->data['User']['remember_me'])) {
					$this->_destroyCookie();
				} else {
					$this->_setCookie();
				}

        return $this->redirect($this->Auth->redirectUrl());
      } else {
        $this->Session->setFlash(__('Username or password is incorrect'));
      }
  	}
	}

/**
 * LOGOUT
 */
	public function logout() {
	  //$user = $this->Auth->user();
		$this->Session->destroy();
		$this->Session->setFlash(__d('users', 'You have successfully logged out'));
		return $this->redirect($this->Auth->logout());
	}


	public function _setCookie() {
		return true;
	}

	public function _destroyCookie() {
		return true;
	}

}
