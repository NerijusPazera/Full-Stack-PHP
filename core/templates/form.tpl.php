<form <?php print html_attr(($data['attr'] ?? []) + ['method' => 'POST']); ?>>

  <!--    Field Generation Start-->
    <?php foreach ($data['fields'] ?? [] as $field_id => $field) : ?>
      <label><span><?php print $field['label'] ?? ''; ?></span>
          <?php if (in_array($field['type'], ['text', 'email', 'password', 'number', 'color'])) : ?>
            <input <?php print input_attr($field_id, $field); ?>>
          <?php endif; ?>
          <?php if (in_array($field['type'], ['select'])) : ?>
            <select <?php print select_attr($field_id, $field); ?>>
                <?php foreach ($field['options'] as $option_id => $option) : ?>
                  <option <?php print option_attr($option_id, $field); ?>>
                      <?php print $option; ?>
                  </option>
                <?php endforeach; ?>
            </select>
          <?php endif; ?>
          <?php if (in_array($field['type'], ['textarea'])) : ?>
            <textarea <?php print textarea_attr($field_id, $field); ?>></textarea>
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
    <?php if (isset($data['error'])): ?>
      <span class="error"><?php print $data['error']; ?></span>
    <?php endif; ?>
  <!--    Field Generation End-->

  <!--    Button Generation Start-->
    <?php foreach ($data['buttons'] ?? [] as $button_id => $button) : ?>
      <button <?php print html_attr($button['extra']['attr'] ?? []); ?>><?php print $button['text']; ?></button>
    <?php endforeach; ?>
  <!--    Button Generation End-->

</form>
