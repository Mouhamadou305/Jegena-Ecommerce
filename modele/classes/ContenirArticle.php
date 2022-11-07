<?php
/**
 * TODO Auto-generated comment.
 */
class ContenirArticle {
	/**
	 * TODO Auto-generated comment.
	 */
	private $nombreArticles;
	/**
	 * TODO Auto-generated comment.
	 */
	private $article;
	/**
	 * TODO Auto-generated comment.
	 */
	private $panier;

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

	public function setArticle($article){
		$this->article= $article;
	}

	public function getArticle(){
		return $this->article;
	}

	public function setPanier($panier){
		$this->panier= $panier;
	}

	public function getPanier(){
		return $this->panier;
	}

}
