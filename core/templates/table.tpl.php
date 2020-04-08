<table class="table">
    <thead>
        <?php foreach ($table['thead'] ?? [] as $thead => $thead_value): ?>
            <th><?php print $thead_value; ?></th>
        <?php endforeach; ?>
    </thead>
    <tbody>
    <?php foreach ($table['tbody'] ?? [] as $trow): ?>
        <tr>
            <?php foreach ($trow ?? [] as $tcol_value): ?>
                <td><?php print $tcol_value; ?></td>
            <?php endforeach; ?>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
