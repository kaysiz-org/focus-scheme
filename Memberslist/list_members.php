<?php
/*
* Author : Ali Aboussebaba
* Email : bewebdeveloper@gmail.com
* Website : http://www.bewebdeveloper.com
* Subject : Using Ajax with PHP/MySQL
*/
?>

<table class="table_list" cellspacing="2" cellpadding="0">
    <tr class="bg_h">
        <th>#</th>
        <th>Full name</th>
        <th>Ecocash Number</th>
        <th>Payers</th>
        <th>Balance</th>
        <th>Delete member</th>
    </tr>
    <?php
		// display the list of all members in table view
        $sql = "SELECT * FROM level_one  LIMIT 50";
        $query = $pdo->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        $bg = 'bg_1';
        foreach ($list as $rs) {
            ?>
            <tr class="<?php echo $bg; ?>">
                <td><?php echo $rs['id']; ?></td>
                <td><?php echo $rs['name']; ?></td>
                <td><?php echo $rs['ecocash_number']; ?></td>
                <td><?php echo $rs['payers']; ?></td>
                <td><?php echo $rs['balance']; ?></td>
                <td><a href="#" class="delete_m" onclick="delete_member(<?php echo $rs['id']; ?>)"><img src="../../images/delete.png"> Delete</a></td>
            </tr>
            <?php
            if ($bg == 'bg_1') {
                $bg = 'bg_2';
            } else {
                $bg = 'bg_1';
            }
        }
    ?>
</table>