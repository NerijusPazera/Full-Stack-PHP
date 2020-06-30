<table>
    <thead>
    <?php foreach ($data['thead'] ?? [] as $thead_name => $thead): ?>
        <th <?php print html_attr($thead['attr'] ?? []); ?>>
            <?php print $thead_name; ?>
        </th>
    <?php endforeach; ?>
    </thead>
    <tbody>
    <?php foreach ($data['tbody'] ?? [] as $trow): ?>
        <tr>
            <?php foreach ($trow ?? [] as $tcol_value): ?>
                <td><?php print $tcol_value; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
