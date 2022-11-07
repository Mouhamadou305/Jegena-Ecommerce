<?php
/**
 * TODO Auto-generated comment.
 */
class CommanderArticle {
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
	private $commande;

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

	public function setCommande($commande){
		$this->commande= $commande;
	}

	public function getCommande(){
		return $this->commande;
	}

}
