<?php 
require_once('./config/database.php');

if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['postal_code']) && !empty($_POST['city']) && !empty($_POST['type']) && !empty($_POST['price'])){

    $request = $pdo->prepare('INSERT INTO advert(title, description, postal_code, city, type, price) VALUES (:title, :description, :postal_code, :city, :type, :price)');

    $request->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
    $request->bindParam(':description', $_POST['description'], PDO::PARAM_STR);
    $request->bindParam(':postal_code', $_POST['postal_code'], PDO::PARAM_STR);
    $request->bindParam(':city', $_POST['city'], PDO::PARAM_STR);
    $request->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
    $request->bindParam(':price', $_POST['price']);

    $request->execute();
}


require_once('./templates/header.php'); ?>


<form action="add_advert.php" method="POST" class="flex flex-col max-w-lg mx-auto">

    <label for="title">Titre</label>
    <input class="border-2 p-2" type="text" id="title" name="title">

    <label for="description">Description</label>
    <textarea class="border-2" name="description" id="description" cols="30" rows="10"></textarea>

    <label for="postal_code">Code Postal</label>
    <input class="border-2 p-2" type="text" id="postal_code" name="postal_code">

    <label for="city">Ville</label>
    <input class="border-2 p-2" type="text" id="city" name="city">

    <label for="type">Type d'annonce</label>
    <input class="border-2 p-2" type="text" name="type" id="type">

    <label for="price">Prix</label>
    <input class="border-2 p-2" type="text" name="price" id="price">
    
    <button class="bg-teal-300 border-2 border-black text-center py-3 my-3">Ajouter une annonce</button>
</form>

<?php require_once('./templates/footer.php'); ?>