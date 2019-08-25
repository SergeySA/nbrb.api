<table>
    <thead>
    <tr>
        <td>id</td>
        <td>Abbreviation</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($rates)) :
        foreach($rates as $rate): ?>
            <tr>
                <td><?= $rate->Cur_ID ?></td>
                <td><?= $rate->Cur_Abbreviation ?></td>
                <td><?= $rate->Cur_OfficialRate ?></td>
            </tr>
        <?php endforeach; endif ?>
    </tbody>
</table>


