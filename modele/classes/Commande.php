<?php
/**
 * TODO Auto-generated comment.
 */
class Commande {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $statut;
	/**
	 * TODO Auto-generated comment.
	 */
	private $dateCommande;
	/**
	 * TODO Auto-generated comment.
	 */
	private $dateLivraison;
	/**
	 * TODO Auto-generated comment.
	 */
	private $paye;

	private $methodePaiement;
	/**
	 * TODO Auto-generated comment.
	 */
	private $compte;

	private $adresse;

	private $cout;

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setStatut($statut) {
		$this->statut=$statut;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getStatut() {
		return $this->statut;
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

	/**
	 * TODO Auto-generated comment.
	 */
	public function setDateCommande(DateTime $dateCommande) {
		$this->dateCommande= $dateCommande;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDateCommande() {
		return $this->dateCommande;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setDateLivraison(DateTime $dateLivraison) {
		$this->dateLivraison= $dateLivraison;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDateLivraison() {
		return $this->dateLivraison;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPaye($paye) {
		$this->paye= $paye;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function isPaye() {
		return $this->paye;
	}

	public function setCompte($compte){
		$this->compte= $compte;
	}

	public function getCompte(){
		return $this->compte;
	}

	public function setMethodePaiement($methodePaiement){
		$this->methodePaiement= $methodePaiement;
	}

	public function getMethodePaiement(){
		return $this->methodePaiement;
	}

	public function setAdresse($adresse){
		$this->adresse= $adresse;
	}

	public function getAdresse(){
		return $this->adresse;
	}

	public function setCout($cout){
		$this->cout= $cout;
	}

	public function getCout(){
		return $this->cout;
	}

}
