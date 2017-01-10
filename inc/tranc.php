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
       
        <th>Full name</th>
        <th>Ecocash Number</th>
        <th>Transaction Amount</th>
        <th>Info</th>
        <th>Time</th>
        <th>Delete member</th>
    </tr>
    <?php
		// display the list of all members in table view
        $sql = "SELECT * FROM member_transact ORDER BY id DESC  ";
        $query = $pdo->prepare($sql);
        $query->execute();
        $list = $query->fetchAll();
        $bg = 'bg_1';
        foreach ($list as $rs) {
            ?>
            <tr class="<?php echo $bg; ?>">
                <td><?php echo $rs['name']; ?></td>
                <td><?php echo $rs['ecocash_number']; ?></td>
                <td><?php echo $rs['transact_amount']; ?></td>
                <td><?php echo $rs['log']; ?></td>
                <td><?php echo $rs['time']; ?></td>
                <td><a href="#" class="delete_m" onclick="delete_member_info(<?php echo $rs['id']; ?>)"><img src="../images/delete.png"> Delete</a></td>
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