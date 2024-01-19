<?php
require __DIR__.'/functions.php';
// Seulement des appels de fonctions ici ! Aucune définition

$pdo = getPDO('mysql:host=localhost;dbname=blog', 'root', '');
$posts = getPostsWithCategories($pdo, 1,2);
$post = getPostWithCategory(1, $pdo);
$postsByCat = getPostsByCategory(1, $pdo, 1, 1);
$aaa = createPost("nom","mail","grfgr");
var_dump($aaa);