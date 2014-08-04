<?php
class GamesController extends AppController {
	public $name = 'Games';

	public function index() {
		$this->set('games', $this->Game->find('all'));
	}


	/**
	 * VIEW - a single game by id
	 */
	public function view($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid game'));
    }

    $game = $this->Game->findById($id);
    if (!$game) {
      throw new NotFoundException(__('Invalid game'));
    }
    $this->set('game', $game);
  }


  /**
   * ADD - a single game
   */
  public function add() {
    if ($this->request->is('post')) {
      $this->Game->create();
      if ($this->Game->save($this->request->data)) {
          $this->Session->setFlash(__('Game has been saved.'));
          return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('Unable to add your game.'));
    }
  }

  /**
   * EDIT - a single game
   */
  public function edit($id = null) {
    if (!$id) {
      throw new NotFoundException(__('Invalid game'));
    }

    $game = $this->Game->findById($id);
    if (!$game) {
      throw new NotFoundException(__('Invalid game'));
    }

    $this->set('game', $game);

    if ($this->request->is(array('post', 'put'))) {
      $this->Game->id = $id;
      if ($this->Game->save($this->request->data)) {
          $this->Session->setFlash(__('Your game has been updated.'));
          return $this->redirect(array('action' => 'index'));
      }
      $this->Session->setFlash(__('Unable to update your game.'));
    }

    if (!$this->request->data) {
      $this->request->data = $game;
    }
	}


	/**
	 * DELETE - a single game by id
	 */
	public function delete($id) {
    if ($this->request->is('get')) {
        throw new MethodNotAllowedException();
    }

    $game = $this->Game->findById($id);
    if (!$game) {
      throw new NotFoundException(__('Invalid game'));
    }

    if ($this->Game->delete($id)) {
        $this->Session->setFlash(
            __('The Game "%s" has been deleted.', h($game['Game']['title']))
        );
        return $this->redirect(array('action' => 'index'));
    }
}

}
