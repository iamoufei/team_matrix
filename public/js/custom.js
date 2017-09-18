$(function(){
    // active navbar with current route
    var current_route = $("#current_route").text();
    if (["department", "staff", "group"].indexOf(current_route)!==-1){
        $("#management").addClass("active");
    }else{
        $("#"+current_route).addClass("active");
    }

    // show staff detail in stall page
    $("tr.staff-list").click(function(){
        $(".staff-detail").hide();
        $(this).next().slideToggle('slow');
    });

    $("button#edit").click(function () {
       $("button#edit").hide();
       $(".show-detail").hide();
       $(".staff-detail .editing").show();
    });

    $("button#cancel").click(function () {
       $("button#edit .show-detail").show();
       $(".staff-detail .editing").hide();
    });

    $("button#update").click(function(){

    })




});