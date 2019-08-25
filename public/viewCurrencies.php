<table>
    <thead>
    <tr>
        <td>id</td>
        <td>Abbreviation</td>
        <td>Name</td>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($currencies)) :
        foreach($currencies as $curr): ?>
            <tr>
                <td><?= $curr->Cur_ID ?></td>
                <td><?= $curr->Cur_Abbreviation ?></td>
                <td><?= $curr->Cur_Name ?></td>
            </tr>
        <?php endforeach; endif ?>
    </tbody>
</table>


