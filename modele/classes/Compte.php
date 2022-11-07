<?php
/**
 * TODO Auto-generated comment.
 */
class Compte {
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
	private $prenom;
	/**
	 * TODO Auto-generated comment.
	 */
	private $numeroTelephone;
	/**
	 * TODO Auto-generated comment.
	 */
	private $adresseMail;
	/**
	 * TODO Auto-generated comment.
	 */
	private $motDePasse;
	/**
	 * TODO Auto-generated comment.
	 */
	private $pointsLivraison;
	/**
	 * TODO Auto-generated comment.
	 */
	private $typeUtilisateur;
	/**
	 * TODO Auto-generated comment.
	 */
	private $dateCreation;

	private $active;

	private $codeActivation;
	
	/**
	 * TODO Auto-generated comment.
	 */
	public function setDateCreation(DateTime $dateCreation) {
		$this->dateCreation= $dateCreation;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDateCreation() {
		return $this->dateCreation;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setTypeUtilisateur($typeUtilisateur) {
		$this->typeUtilisateur= $typeUtilisateur;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getTypeUtilisateur() {
		return $this->typeUtilisateur;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPointsLivraison($pointsLivraison) {
		$this->pointsLivraison= $pointsLivraison;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getPointsLivraison() {
		return $this->pointsLivraison;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setMotDePasse($motDePasse) {
		$this->motDePasse= $motDePasse;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getMotDePasse() {
		return $this->motDePasse;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setAdresseMail($adresseMail) {
		$this->adresseMail= $adresseMail;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getAdresseMail() {
		return $this->adresseMail;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setNumeroTelephone($numeroTelephone) {
		$this->numeroTelephone= $numeroTelephone;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNumeroTelephone() {
		return $this->numeroTelephone;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPrenom($prenom) {
		$this->prenom= $prenom;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getPrenom() {
		return $this->prenom;
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

	public function setActive($active) {
		$this->active= $active;
	}

	public function isActive(){
		return $this->active;
	}

	public function setCodeActivation($codeActivation) {
		$this->codeActivation= $codeActivation;
	}

	public function getCodeActivation(){
		return $this->codeActivation;
	}

}
