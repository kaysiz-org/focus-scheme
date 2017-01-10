<? include("header.php"); ?>

    <input type="button" id="bt" class=" btn btn-primary " value="upgrade">
     <input type="button" id="bth" class=" btn btn-primary " value="Hide" >
<div class="content " >


   <div id="fie" <fieldset class="field_container" >
        <legend> <img src="../images/plus.gif"> Pay For </legend>
        <form>
            <h3>First Member Details:</h3>
            <input type="text"  required="true"id="full_name1" name="name" class="frm_input" placeholder="Full name">
            <input type="number"  required="true" id="number1" name="phone"  class="frm_input" placeholder="Ecocash">

            <h3>Second Member Details:</h3>
            <input type="text"  required="true"id="full_name2" name="name" class="frm_input" placeholder="Full name">
            <input type="number"  required="true" id="number2" name="phone"  class="frm_input" placeholder="Ecocash">
            <fieldset class="field_container">
                <legend> <img src="../images/plus.gif"> Pay TO </legend>

                <h3>Recieving Member Details:</h3>
            <input type="text"  required="true"id="full_nameexi" name="name" class="frm_input" placeholder="Full name" onkeyup="autocomplet()">
            <input type="number"  required="true" id="numberexi" name="phone"  class="frm_input" placeholder="Ecocash">
               <div class="autt" id="autdiv" ><ul id="name_list_id" ></ul></div>



            <input type="button" class="frm_button" value="Add And Pay " onclick="upgrade_member()">
            </fieldset>
        </form>
    </fieldset>
    </div>

    <fieldset class="field_container">
        <legend> <img src="../images/arrow.gif"> Results </legend>
        <div id="list_container">
            <?php
            // including the config file
            ;
            //$pdo = connect();
            // list_members : this file displays the list of members in a table view
            ;

            ?>
        </div><!-- list_container -->
    </fieldset>


    <fieldset class="field_container">
        <legend> <img src="../images/arrow.gif"> Members list </legend>
        <div id="list_container">
            <?php
            // including the config file
            include('config.php');
            //$pdo = connect();
            // list_members : this file displays the list of members in a table view
            include('list_members.php');

            ?>
        </div><!-- list_container -->
    </fieldset>
<? include("footer.php");



