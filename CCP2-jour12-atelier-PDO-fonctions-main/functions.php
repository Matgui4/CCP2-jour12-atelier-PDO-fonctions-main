<?php
function getPDO($mysql, $root, $mdp)
{
    $pdo = new PDO($mysql, $root, $mdp);
    return $pdo;
}
function getPostsWithCategories(PDO $pdo, ): array
{
    // Le ORDER BY permet de trier les entrée par rapport à un champ dans l'ordre croissant (ASC) par défaut ou bien décroissant (DESC)
    $query = $pdo->query('SELECT p.id, p.title,p.body, p.excerpt, p.created_at, c.name AS category_name
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        ORDER BY p.created_at DESC
    ');
    
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
// Seulement des définitions de fonctions ici ! Aucun appel
function getPostWithCategory(int $id, PDO $pdo): array|false
{
    $query = $pdo->prepare('SELECT p.title, p.body, p.excerpt, p.created_at, c.name AS category_name
        FROM posts p
        LEFT JOIN categories c ON p.category_id = c.id
        WHERE p.id = :id
    ');

    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();

    return $query->fetch(PDO::FETCH_ASSOC);
}
function getPostsByCategory(int $id, PDO $pdo): array
{
    $query = $pdo->prepare('SELECT p.name,p.created_at,p.updated_at, c.title AS category_name
    FROM categories p
    LEFT JOIN posts c ON p.id = c.category_id
    WHERE p.id = :id
    ORDER BY p.created_at DESC
   -- LIMIT :page OFFSET :perPage;
');

    $query->bindValue('id', $id, PDO::PARAM_INT);
    //  $query->bindValue('page', $page, PDO::PARAM_INT);
    // $query->bindValue('perPage', $perPage, PDO::PARAM_INT);
    $query->execute();

    return $query->fetchAll(PDO::FETCH_ASSOC);
}
function createPost(string $nom, string $mail, string $text)
{
    $nom = "nom";
    $mail = "@";
    $text = "aaafrefezrz";
    $verif = true;
    return $verif;
    return $mail;
    return $text;
    return $nom; 
}

