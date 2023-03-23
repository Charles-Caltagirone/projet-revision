<?php
session_start();
require('config.php');

class Article
{
    public $article;
    public $id_utilisateur;
    public $categorie;
    public $id_article;
    public $id_categorie;

    function getArticle()
    {
        return $this->article;
    }
    function setArticle($article)
    {
        $this->article = $article;
    }
    function getid_utilisateur()
    {
        return $this->id_utilisateur;
    }
    function setid_utilisateur($id_utilisateur)
    {
        $this->id_utilisateur = $id_utilisateur;
    }
    function __construct($article, $id_utilisateur, $id_categorie)
    {
        $this->article = $article;
        $this->id_utilisateur = $id_utilisateur;
        // $this->id_article = $article;
        $this->id_categorie = $id_categorie;
    }

    function register($bdd)
    {

        $newArticle = $bdd->prepare("INSERT INTO articles (article, id_utilisateur) VALUES (?, ?)");
        $newArticle->execute([$this->article, $this->id_utilisateur]);

        $recupInfos = $bdd->prepare("SELECT articles.id, articles.article FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id WHERE utilisateurs.id = $this->id_utilisateur ORDER BY articles.id DESC");
        $recupInfos->execute();
        $result = $recupInfos->fetch(PDO::FETCH_ASSOC);
        // var_dump($result);
        $newLiaison = $bdd->prepare("INSERT INTO liaison (id_article, id_categorie) VALUES (?, ?)");
        for ($i = 0; $i < count($_POST['cat']); $i++) {
            $newLiaison->execute([$result['id'], $_POST['cat'][$i]]);
        }
    }
    function allInfosSession($bdd)
    {
        $recupInfos = $bdd->prepare("SELECT * FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id WHERE utilisateurs.id = $this->id_utilisateur");
        $recupInfos->execute();
        $result = $recupInfos->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($result);
    }
    function allArticlesInfos($bdd)
    {
        $recupInfos = $bdd->prepare("SELECT * FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id");
        $recupInfos->execute();
        $result = $recupInfos->fetchAll(PDO::FETCH_ASSOC);
        var_dump($result);
    }
    function allArticlesLogin($bdd)
    {
        if (isset($_GET['order'])) {
            if ($_GET['order'] == 'DESC') {
                $order = 'ASC';
            } elseif ($_GET['order'] == 'ASC') {
                $order = 'DESC';
            }
        } else {
            $order = 'DESC';
        }

        $recupInfos = $bdd->prepare("SELECT utilisateurs.login, articles.article, categories.categorie FROM articles INNER JOIN utilisateurs ON articles.id_utilisateur = utilisateurs.id INNER JOIN liaison ON articles.id = liaison.id_article INNER JOIN categories ON categories.id = liaison.id_categorie ORDER BY articles.id $order");
        $recupInfos->execute();
        $result = $recupInfos->fetchAll(PDO::FETCH_ASSOC);

        // $testTab= [$result, $order];

        return [$result, $order];
        // return $testTab;
        // echo $result;
        var_dump($result);
        // var_dump($testTab);
    }
}
// var_dump($_SESSION);
// var_dump($result);
