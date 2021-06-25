<?php
/**
 * @var Pokemon $pokemon
 */
?>
<div class="pokemon">
    <div class="pokemon-top" style="--artwork:url('<?= $pokemon->getArtwork() ?>')">
        <h2><?= $pokemon->getName() ?></h2>
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
    <img src="<?= $pokemon->getArtwork() ?>" alt="">
    <div class="pokemon-main">

        <div class="abilities-bloc">
            <h3>Abilities</h3>
            <div class="abilities">
                <?php
                foreach ($pokemon->getAbilities() as $ability) {
                    ?>
                    <div class="ability">
                        <p class="name"><?= $ability->getName() ?><?= $ability->isHidden() ? ' - <span>hidden</span>' : '' ?></p>
                        <p class="description"><?= $ability->getEffect() ?></p>

                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <ul class="stats">
            <?php
            foreach ($pokemon->getBaseStats() as $stat => $value) {
                ?>
                <li class="stat">
                    <div class="stat"><?= $stat ?></div>
                    <div class="progress" style="--stat-pourcent:<?= $value / 255 * 100 . '%' ?>"></div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</div>
