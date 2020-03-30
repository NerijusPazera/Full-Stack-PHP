<form <?php print html_attr(($form['attr'] ?? []) + ['method' => 'POST']); ?>>

    <!--    Field Generation Start-->
    <?php foreach ($form['fields'] ?? [] as $field_id => $field) : ?>
        <label><span><?php print $field['label'] ?? ''; ?></span>
            <?php if (in_array($field['type'], ['text', 'email', 'password', 'number'])) : ?>
                <input <?php print html_attr(($field['extra']['attr'] ?? []) +
                    [
                        'type' => $field['type'],
                        'name' => $field_id,
                        'value' => $field['value'],
                    ]); ?>>
            <?php endif; ?>
            <?php if (isset($field['error'])) : ?>
                <span class="error"><?php print $field['error']; ?></span>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <!--    Field Generation End-->

    <!--    Button Generation Start-->
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button) : ?>
        <button <?php print html_attr(($button['extra']['attr'] ?? []) + [
                'name' => $button['name']
            ]); ?>><?php print $button['text']; ?></button>
    <?php endforeach; ?>
    <!--    Button Generation End-->

</form>
