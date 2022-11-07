<?php
/**
 * TODO Auto-generated comment.
 */
class Panier {
	/**
	 * TODO Auto-generated comment.
	 */
	private $prixTotalSansFrais;
	/**
	 * TODO Auto-generated comment.
	 */
	private $nombreArticles;
	/**
	 * TODO Auto-generated comment.
	 */
	private $compte;
	
	/**
	 * TODO Auto-generated comment.
	 */
	public function setNombreArticles($nombreArticles) {
		$this->nombreArticles= $nombreArticles;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getNombreArticles() {
		return $this->nombreArticles;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function setPrixTotalSansFrais($prixTotalSansFrais) {
		$this->prixTotalSansFrais= $prixTotalSansFrais;
	}

	/**
	 * TODO Auto-generated comment.
	 */
	public function getPrixTotalSansFrais() {
		return $this->prixTotalSansFrais;
	}

	public function setCompte($compte){
		$this->compte= $compte;
	}

	public function getCompte(){
		return $this->compte;
	}

}
