<?php 
require_once('./config/database.php');

$request = $pdo->prepare('SELECT * FROM advert WHERE id_advert=:id_advert');

$request->bindParam(':id_advert', $_GET['id_advert']);

$request->execute();

$result = $request->fetchAll(PDO::FETCH_ASSOC);

if(!empty($_POST['reservation_message'])){
    $request = $pdo->prepare('UPDATE advert SET reservation_message=:reservation_message WHERE id_advert=:id_advert');

    $request->bindParam(':reservation_message', $_POST['reservation_message'], PDO::PARAM_STR);
    $request->bindParam(':id_advert', $_POST['id_advert'], PDO::PARAM_STR);

    $request->execute();

    header('Location: one_advert.php?id_advert=' . $_POST['id_advert']);
}



require_once('./templates/header.php'); ?>

<main>
    <article class="max-w-2xl mx-auto">
        <h3 class="font-bold text-2xl text-center py-3" ><?= strtoupper($result[0]['title']); ?></h3>
        <p class="text-xl my-5"><?= $result[0]['price']; ?>€</p>
        <p><?= $result[0]['description']; ?></p>
        <p><?= $result[0]['type']; ?></p>
        <?php if(isset($result[0]['reservation_message'])): ?>
        <h3 class="text-red-500 text-xl font-bold" >Bien déjà réservé !</h3>
        <h3 class="text-red-500 text-xl font-bold" >Message de reservation : <?= $result[0]['reservation_message']; ?></h3>
        <?php else: ?>
        <form action="one_advert.php" method="POST"  class="flex flex-col max-w-lg mx-auto my-5">
            <input type="hidden" name="id_advert" value="<?= $_GET['id_advert']; ?>">

            <label for="reservation_message">Message de reservation</label>
            <textarea class="border-2" name="reservation_message" id="reservation_message" cols="30" rows="10"></textarea>

            <button class="bg-teal-300 border-2 border-black text-center py-3 my-3">Je réserve</button>
        </form>
        <?php endif; ?>
    </article>
</main>

<?php require_once('./templates/footer.php'); ?>