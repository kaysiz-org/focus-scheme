<?php
include("./header.php") ?>



    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li  type="button" role="presentation" class="active"  id="lis1" ><a href="#Level1" aria-controls="home" role="tab"
                                                                             data-toggle="tab">Level1</a></li>
        <li type="button" role="presentation" id="lis2"><a href="#Level2" aria-controls="messages" role="tab" data-toggle="tab">Level 2</a></li>
        <li  type="button" role="presentation" id="lis3"><a href="#Level3" aria-controls="settings" role="tab" data-toggle="tab">Level 3</a></li>
    </ul>


    <!-- Tab panes -->
    <div class="tab-content" >
        <fieldset class="field_container">
            <legend> <img src="../images/arrow.gif"> Members list </legend>
            <div id="list_container">
                <div id="divlist"  >


                    <?php
                    // including the config file
                    include('./config.php');
                    //$pdo = connect();
                    // list_members : this file displays the list of members in a table view
                    include('list_members.php');

                    ?>
                </div>
                <div  id="divlist2" >


                    <?php
                    // including the config file
                    include('./config.php');
                    //$pdo = connect();
                    // list_members : this file displays the list of members in a table view
                    include('list_members2.php');

                    ?>
                </div>
                <div  id="divlist3" >


                    <?php
                    // including the config file
                    include('./config.php');
                    //$pdo = connect();
                    // list_members : this file displays the list of members in a table view
                    include('./list_members3.php');

                    ?>
                </div>
        </fieldset
    </div>

<? include("./footer.php");