<div class="catalog">
    <?php foreach ($data ?? [] as $drink) : ?>
        <div class="article-container">
            <article class="<?php print strtolower($drink['drink']->getDrinkName()); ?>">
                <span><?php print $drink['drink']->getPrice(); ?> &euro;</span>
                <img src="<?php print $drink['drink']->getPhoto(); ?>" alt="Prekes nuotrauka">
                <div class="drink-info">
                    <p><?php print $drink['drink']->getDrinkName(); ?></p>
                    <p><?php print $drink['drink']->getAlkVol(); ?>%</p>
                    <p><?php print $drink['drink']->getCapacity(); ?>ml</p>
                </div>
            </article>
            <span class="in-stock">Sandelyje: <?php print $drink['drink']->getInStock(); ?></span>
            <?php if (isset($drink['form'])) : ?>
                <?php print $drink['form']->render(); ?>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>