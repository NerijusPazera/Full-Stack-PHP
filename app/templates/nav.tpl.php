<nav>
    <ul class="left-side">
        <?php foreach ($data['left_buttons'] ?? [] as $button) : ?>
            <li><a href="<?php print $button['href']; ?>"><?php print $button['text']; ?></a></li>
        <?php endforeach; ?>
    </ul>
    <ul class="right-side">
        <?php foreach ($data['right_buttons'] ?? [] as $button) : ?>
            <li><a href="<?php print $button['href']; ?>"><?php print $button['text']; ?></a></li>
        <?php endforeach; ?>
    </ul>
</nav>
