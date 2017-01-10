

$("#fie").hide(10);
$("#bth").hide(10);

$("#bt").click(function() {
    $("#fie").show(1000);
    $("#bt").hide(1000);
    $("#bth").show(1000);

});

$("#bth").click(function() {
    $("#bt").show(1000);
    $("#fie").hide(1000);
    $("#bth").hide(1000);

});
$("#divlist2").hide(10);
$("#divlist3").hide(10);

$("#lis1").click(function(){

    $("#divlist2").hide(10);
    $("#divlist").show(10);
    $("#divlist3").hide(10);
});

$("#lis2").click(function(){
    $("#divlist2").show(10);
    $("#divlist").hide(10);
    $("#divlist3").hide(10);
});

$("#lis3").click(function(){
    $("#divlist2").hide(10);
    $("#divlist").hide(10);
    $("#divlist3").show(10);
});

$("#results").hide();


$("#bt").click(function() {
    $("#fie").show(200);
    $("#bt").hide(200);
    $("#bth").show(200);

});

$("#bth").click(function() {
    $("#bt").show(200);
    $("#fie").hide(200);
    $("#bth").hide(200);

});


$("#search").click(function() {

    $("#results").show();
});

$("#find").keydown(function(){
    //$("#add").hide(2000);
    //$("#memberlist").hide(2000);
});

$("#loglist").hide();

$("#logid").keydown(function(){
    $("#loglist").hide();
    $("#showlog").show(1000);
});



$("#showlog").click(function(){
    $("#loglist").show(1500);
    $("#showlog").hide();

});












