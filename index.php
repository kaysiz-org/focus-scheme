

<?include("header.php"); ?>
<a href="index.php" type= button class="btn btn-primary" id="refresh"> Refresh</a>

<div class="content">
            <fieldset class="field_container" id="add">
                <legend> <img src="images/plus.gif"> Add new member </legend>
                <form>
                    <input type="text"  required="true"id="full_name" name="name" class="frm_input" placeholder="Full name">
                    <input type="number"  required="true" id="email" name="phone"  class="frm_input" placeholder="Ecocash">

                    <input type="button" class="frm_button" value="Add" onclick="add_member()">
                </form>
            </fieldset>




            <fieldset class="field_container" id="memberlist">
                <legend> <img src="images/arrow.gif"> Members list </legend>
                <div id="list_container">
                    <?php 
                        // including the config file
                        include('config.php');
                        //$pdo = connect();
                        // list_members : this file displays the list of members in a table view
                        include('list_membersall.php');

                    ?>
                </div><!-- list_container -->
            </fieldset>





        </div><!-- content -->

        <div  class="modal-dialog">
            <form action="index.php" method="post">
                <input type="text"  id="find" name="s" class="form-control" placeholder="Search">

                <input type="submit" class="btn btn-primary" value="Search "  >
            </form></div>
<?
require("search.php");




include("footer.php");