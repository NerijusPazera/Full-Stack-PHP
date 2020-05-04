<nav>
    <ul>
        <?php foreach ($data['buttons'] ?? [] as $button) : ?>
            <li><a href="<?php print $button['href']; ?>"><?php print $button['text']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>

