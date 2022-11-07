<?php
/**
 * TODO Auto-generated comment.
 */
class Categorie {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $nom;

	private $genre;

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
	public function setNom($nom) {
		$this->nom= $nom;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNom() {
		return $this->nom;
	}

	public function setGenre($genre) {
		$this->genre= $genre;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getGenre() {
		return $this->genre;
	}
}
