<?php
/**
 * TODO Auto-generated comment.
 */
class Image {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $nom;
	/**
	 * TODO Auto-generated comment.
	 */
	private $emplacement;
	/**
	 * TODO Auto-generated comment.
	 */
	private $article;

	/**
	 * TODO Auto-generated comment.
	 */
	public function setEmplacement($emplacement) {
		$this->emplacement= $emplacement;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getEmplacement() {
		return $this->emplacement;
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

	public function setArticle($article){
		$this->article= $article;
	}

	public function getArticle(){
		return $this->article;
	}

}
