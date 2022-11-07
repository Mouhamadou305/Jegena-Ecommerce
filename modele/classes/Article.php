<?php
/**
 * TODO Auto-generated comment.
 */
class Article {
	/**
	 * TODO Auto-generated comment.
	 */
	private $id;
	/**
	 * TODO Auto-generated comment.
	 */
	private $genre;
	/**
	 * TODO Auto-generated comment.
	 */
	private $categorie;
	/**
	 * TODO Auto-generated comment.
	 */
	private $coupDeCoeur;
	/**
	 * TODO Auto-generated comment.
	 */
	private $solde;
	/**
	 * TODO Auto-generated comment.
	 */
	private $prix;
	/**
	 * TODO Auto-generated comment.
	 */
	private $pourcentageSolde;
	/**
	 * TODO Auto-generated comment.
	 */
	private $description;
	/**
	 * TODO Auto-generated comment.
	 */
	private $nom;
	/**
	 * TODO Auto-generated comment.
	 */
	private $quantite;
	/**
	 * TODO Auto-generated comment.
	 */
	private $dateModification;

	private $taille;

	private $motsCles;

	/**
	 * TODO Auto-generated comment.
	 */
	 public function setGenre($genre) {
		$this->genre=$genre;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getGenre() {
		return $this->genre;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setCategorie($categorie) {
		$this->categorie=$categorie;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getCategorie() {
		return $this->categorie;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setCoupDeCoeur($coupDeCoeur) {
		$this->coupDeCoeur=$coupDeCoeur;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function isCoupDeCoeur() {
		return $this->coupDeCoeur;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setSolde($solde) {
		$this->solde= $solde;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function isSolde() {
		return $this->solde;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPrix($prix) {
		$this->prix= $prix;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getPrix() {
		return $this->prix;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPourcentageSolde($pourcentageSolde) {
		$this->pourcentageSolde= $pourcentageSolde;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getPourcentageSolde() {
		return $this->pourcentageSolde;
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
	public function setQuantite($quantite) {
		$this->quantite= $quantite;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getQuantite() {
		return $this->quantite;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setId($id) {
		$this->id=$id;
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
	public function setDateModification(DateTime $dateModification) {
		$this->dateModification= $dateModification;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getDateModification() {
		return $this->dateModification;
	}

	public function setTaille($taille) {
		$this->taille=$taille;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getTaille() {
		return $this->taille;
	}

	public function setMotsCles($motsCles) {
		$this->motsCles=$motsCles;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getMotsCles() {
		return $this->motsCles;
	}

}
