<?php
/**
 * TODO Auto-generated comment.
 */
class Adresse {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $ville;
	/**
	 * TODO Auto-generated comment.
	 */
	private $region;
	/**
	 * TODO Auto-generated comment.
	 */
	private $description;
	/**
	 * TODO Auto-generated comment.
	 */
	private $compte;
	
	/**
	 * TODO Auto-generated comment.
	 */
	 public function setVille($ville) {
		$this->ville= $ville;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getVille() {
		return $this->ville;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setRegion($region) {
		$this->region= $region;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getRegion() {
		return $this->region;
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
	public function setId($id) {
		$this->id= $id;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getId() {
		return $this->id;
	}

	public function setCompte($compte){
		$this->compte= $compte;
	}

	public function getCompte(){
		return $this->compte;
	}
}
