<? $bg = 'bg_1';?>
<link href="../css/stylz.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
        <li class="bg_1">
            <table class="table_list" cellspacing="2" cellpadding="0">
                <tr class="bg_h">
                    <th>#</th>
                    <th>Full name</th>
                    <th>Ecocash Number</th>
                    <th>Payers</th>
                    <th>Balance</th>

                </tr>
                <tr class="<?php echo $bg; ?>">
                    <td><?php echo $rs['id']; ?></td>
                    <td><?php echo $rs['name']; ?></td>
                    <td><?php echo $rs['ecocash_number']; ?></td>
                    <td><?php echo $rs['payers']; ?></td>
                    <td><?php echo $rs['balance']; ?></td>
                     </tr>
                <?php
                if ($bg == 'bg_1') {
                    $bg = 'bg_2';
                } else {
                    $bg = 'bg_1';

                }
                ?>

        </li>

