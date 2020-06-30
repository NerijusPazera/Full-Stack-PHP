<a <?php print html_attr(['href' => $data['url']] + $data['attr'] ?? []); ?>>
    <?php print $data['title']; ?>
</a>