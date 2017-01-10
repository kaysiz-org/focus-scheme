<?php
include("./header.php") ?>
<input type="button" class=" btn btn-primary " value="Show Recent Info" id="showlog">
    <div  class="modal-dialog">
        <form action="transact.php" method="post">
            <input type="text"  id="logid" name="logs" class="form-control" placeholder="Search">

            <input type="submit" class="btn btn-primary" value="Search "  >
        </form></div>


<div id="loglist" >
    <fieldset class="field_container" >
    <legend> <img src="../images/arrow.gif"> Members list </legend>
    <div id="list_container">
        <?php
        // including the config file
        include('config.php');
        //$pdo = connect();
        // list_members : this file displays the list of members in a table view
        include('tranc.php');

        ?>
    </div><!-- list_container -->
</fieldset>


<? include("footer.php");
//require("search.php");
?>
</div>
