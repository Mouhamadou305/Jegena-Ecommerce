<?php
/**
 * TODO Auto-generated comment.
 */
class Entreprise {
	/**
	 * TODO Auto-generated comment.
	 */
	private $nom;
	/**
	 * TODO Auto-generated comment.
	 */
	private $numeroTelephone1;
	/**
	 * TODO Auto-generated comment.
	 */
	private $numeroTelephone2;
	/**
	 * TODO Auto-generated comment.
	 */
	private $adresseMail;
	/**
	 * TODO Auto-generated comment.
	 */
	private $adresse;

	/**
	 * TODO Auto-generated comment.
	 */
	private $twitter;

	private $instagram;

	private $facebook;

	private $mailNotification;

	private $fraisLivraison;

	public function setAdresse($adresse) {
		$this->adresse= $adresse;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getAdresse() {
		return $this->adresse;
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
	public function setNumeroTelephone2($numeroTelephone2) {
		$this->numeroTelephone2= $numeroTelephone2;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNumeroTelephone2() {
		return $this->numeroTelephone2;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setNumeroTelephone1($numeroTelephone1) {
		$this->numeroTelephone1= $numeroTelephone1;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNumeroTelephone1() {
		return $this->numeroTelephone1;
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
	 public function setTwitter($twitter) {
		$this->twitter= $twitter;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getTwitter() {
		return $this->twitter;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setInstagram($instagram) {
		$this->instagram= $instagram;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getInstagram() {
		return $this->instagram;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setFacebook($facebook) {
		$this->facebook= $facebook;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getFacebook() {
		return $this->facebook;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setMailNotification($mailNotification) {
		$this->mailNotification= $mailNotification;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getMailNotification() {
		return $this->mailNotification;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setFraisLivraison($fraisLivraison) {
		$this->fraisLivraison= $fraisLivraison;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getFraisLivraison() {
		return $this->fraisLivraison;
	}
}
