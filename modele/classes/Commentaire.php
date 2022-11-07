<?php
/**
 * TODO Auto-generated comment.
 */
class Commentaire {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $description;

	private $compte;

	private $dateCommentaire;

	/**
	 * TODO Auto-generated comment.
	 */
	public function setId($id) {
		$this->id= $id;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setDescription($description) {
		$this->description= $description;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setCompte($compte) {
		$this->compte= $compte;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getCompte() {
		return $this->compte;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setDateCommentaire($dateCommentaire) {
		$this->dateCommentaire= $dateCommentaire;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDateCommentaire() {
		return $this->dateCommentaire;
	}
}
