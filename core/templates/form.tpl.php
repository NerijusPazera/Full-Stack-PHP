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
            <?php if (in_array($field['type'], ['select'])) : ?>
                <select <?php print html_attr(($field['extra']['attr'] ?? []) +
                    [
                        'name' => $field_id
                    ]); ?>>
                    <?php foreach ($field['options'] as $option_id => $option) : ?>
                        <option value="<?php print $option_id; ?>"
                            <?php print ($field['value'] == $option_id) ? 'selected' : ''; ?>>
                            <?php print $option; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            <?php endif; ?>
            <?php if (isset($field['error'])) : ?>
                <span class="error"><?php print $field['error']; ?></span>
            <?php endif; ?>
            <?php if (in_array($field['type'], ['radio'])) : ?>
                <h3><?php print $field['headline']; ?></h3>
                <?php foreach ($field['options'] as $option_id => $option) : ?>
                    <label><span><?php print $option; ?></span>
                        <input <?php print radio_attr($field, $field_id, $option_id); ?>>
                    </label>
                <?php endforeach; ?>
            <?php endif; ?>
        </label>
    <?php endforeach; ?>
    <?php if (isset($form['error'])): ?>
        <span class="error"><?php print $form['error']; ?></span>
    <?php endif; ?>
    <!--    Field Generation End-->

    <!--    Button Generation Start-->
    <?php foreach ($form['buttons'] ?? [] as $button_id => $button) : ?>
        <button <?php print html_attr(($button['extra']['attr'] ?? [])); ?>><?php print $button['text']; ?></button>
    <?php endforeach; ?>
    <!--    Button Generation End-->

</form>
