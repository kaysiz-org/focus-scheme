function add_member() {
	// initialisation
	$("#results").show();
	var name = document.getElementById('full_name').value;
	var phone = document.getElementById('email').value;

	if (name != "" && phone != "") {
		if (confirm("Are you sure to add " + name)) {
			var url = 'add_member.php';
			var method = 'POST';
			var params = 'full_name=' + document.getElementById('full_name').value;
			params += '&email=' + document.getElementById('email').value;
			var container_id = 'list_container';
			var loading_text = '<img src="images/ld.gif">';
			// call ajax function
			ajax(url, method, params, container_id, loading_text);
		}
	}


	else {
		alert("Name and Number Cannot Be Null");
	}
}
function upgrade_member() {
	// initialisation

	var nameup = document.getElementById('full_name1').value;
	var phoneup = document.getElementById('number1').value;
	var nameup2 = document.getElementById('full_name2').value;
	var phoneup2 = document.getElementById('number2').value;
	var fname = document.getElementById('full_nameexi').value;
	var phone = document.getElementById('numberexi').value;

	if (fname != "" && phone != "" && phoneup != "" && phoneup2 != "" &&
		nameup != "" && nameup2 != "") {
		if (confirm("Are you sure to add  " + nameup +" & " + nameup2 + " and pay to " + fname )) {
			var url = 'upgrad.php';
			var method = 'POST';
			var params = '&full_name1=' + document.getElementById('full_name1').value;
			params += '&number1=' + document.getElementById('number1').value;
			params += '&full_name2=' + document.getElementById('full_name2').value;
			params += '&number2=' + document.getElementById('number2').value;
			params += '&full_nameexi=' + document.getElementById('full_nameexi').value;
			params += '&numberexi=' + document.getElementById('numberexi').value;

			var container_id = 'list_container';
			var loading_text = '<img src="images/ld.gif">';
			// call ajax function
			ajax(url, method, params, container_id, loading_text);
		}
	}


	else {
		alert("Name and Number Cannot Be Null");
	}
}



function hide1(){
	var div1 = document.getElementById('list_m1');
	loading_text = div1.hide(2000);
	ajax(loading_text);
 }

function  level2 (){

	var url = 'list_members2.php';
	var loading_text =   '<div id="list_m1 " style="display: none">'




	// call ajax function
	ajax(url,loading_text);
}
// delete_member function
function delete_member(id) {
	if (confirm('Are you sure to delete this member ?')) {
		// initialisation
		var url = 'delete_member.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ldred.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

function delete_member2(id) {
	if (confirm('Are you sure to delete this member ?')) {
		// initialisation
		var url = 'delete_member2.php';
		var method = 'POST';
		var params = 'id='+id;
		var container_id = 'list_container' ;
		var loading_text = '<img src="images/ldred.gif">' ;
		// call ajax function
		ajax (url, method, params, container_id, loading_text) ;
	}
}

function delete_member3(id) {
    if (confirm('Are you sure to delete this member ?')) {
        // initialisation
        var url = 'delete_member3.php';
        var method = 'POST';
        var params = 'id='+id;
        var container_id = 'list_container' ;
        var loading_text = '<img src="images/ldred.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
    }
}
function delete_memberall(id) {
    if (confirm('Are you sure to delete this member ?')) {
        // initialisation
        var url = 'delete_memberall.php';
        var method = 'POST';
        var params = 'id='+id;
        var container_id = 'list_container' ;
        var loading_text = '<img src="images/ldred.gif">' ;
        // call ajax function
        ajax (url, method, params, container_id, loading_text) ;
    }
}
$('#autdiv').hide();

function autocomplet() {
	var min_length = 0; // min caracters to display the autocomplete
	var keyword = $('#full_nameexi').val();

	if (keyword.length >= min_length) {
		$.ajax({
			url: 'autocomplt.php',
			type: 'POST',
			data: {keyword:keyword},
			success:function(data){
				$('#name_list_id').show();
				$('#autdiv').show();
				$('#name_list_id').html(data);
			}
		});
	} else {
		$('#autdiv').hide();
	}
}

// set_item : this function will be executed when we select an item
function set_item(item) {
	// change input value
	$('#full_nameexi').val(item);

	// hide proposition list
	$('#autdiv').hide();
}

function searche() {
    // initialisation
        var url = 'search.php';
            var method = 'POST';
            var params = '&find=' + document.getElementById('find').value;

            var container_id = 'list_container';
            var loading_text = '<img src="images/ld.gif">';
            // call ajax function
            ajax(url, method, params, container_id, loading_text);
        }


// ajax : basic function for using ajax easily
function ajax (url, method, params, container_id, loading_text) {
    try { // For: chrome, firefox, safari, opera, yandex, ...
    	xhr = new XMLHttpRequest();
    } catch(e) {
	    try{ // for: IE6+
	    	xhr = new ActiveXObject("Microsoft.XMLHTTP");
	    } catch(e1) { // if not supported or disabled
		    alert("Not supported!");
		}
	}
	xhr.onreadystatechange = function() {
						       if(xhr.readyState == 4) { // when result is ready
							       document.getElementById(container_id).innerHTML = xhr.responseText;
							   } else { // waiting for result 
							       document.getElementById(container_id).innerHTML = loading_text;
							   }
						   	}
	xhr.open(method, url, true);
	xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhr.send(params);
}