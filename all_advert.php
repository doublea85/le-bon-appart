<?php 
require_once('./config/database.php');

$request = $pdo->prepare('SELECT * FROM advert');

$request->execute();

$result = $request->fetchAll(PDO::FETCH_ASSOC);



require_once('./templates/header.php'); ?>

<main class="grid grid-cols-3 gap-5 max-w-7xl mx-auto py-5">
    <?php foreach($result as $advert): ?>
        <article class="border-2 p-5 flex flex-col justify-between <?php echo isset($advert['reservation_message']) ? 'bg-slate-400' : '' ?>">
            <h3 class="font-bold"><?= strtoupper($advert['title']); ?></h3>
            <p class="py-2"><?= $advert['price']; ?>€</p>
            <p class="py-2"><?= $advert['description']; ?></p>
            <p class="py-2"><?= $advert['type']; ?></p>
            <?php if(isset($advert['reservation_message'])): ?>
            <h3 class="text-red-500 text-3xl font-bold" >Bien déjà réservé !</h3>
            <?php endif; ?>
            <a class="bg-teal-300 border-2 border-black text-center py-3" href="one_advert.php?id_advert=<?= $advert['id_advert']; ?>">Consulter l'annonce</a>
        </article>
    <?php endforeach;?>
</main>

<?php require_once('./templates/footer.php'); ?>