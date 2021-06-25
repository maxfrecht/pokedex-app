<?php
/**
 * @var Pokemon $pokemon;
 */
?>
<li class="list-item">
    <span class="left-info">
        <span class="order"><img src="../assets/images/pokeball.svg" alt="pokeball"> #<?= $pokemon->getOrder() ?></span>

    </span>
    <div class="main-info">
        <img src="<?= $pokemon->getSprite() ?>" alt="">
        <div class="main-info-right">
            <?= $pokemon->getName() ?>
            <div class="types">
                <div class="type <?= $pokemon->getTypes()[0] ?>">
                    <?= $pokemon->getTypes()[0] ?>
                </div>
                <?php if (count($pokemon->getTypes()) > 1) { ?>
                <div class="type <?= $pokemon->getTypes()[1] ?>">
                    <?= $pokemon->getTypes()[1] ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <a href="pokemonDetail.php?order=<?= $pokemon->getOrder() ?>">Voir la fiche</a>
</li>