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
        $("tr.staff-detail").hide();
        $(this).next().slideDown('slow');
    });

    $("button#edit").click(function () {
       $("button#edit").hide();
       $(".show-detail").hide();
       $(".staff-detail .editing").show();
    });

    $("button#cancel").click(function () {
       $("button#edit").show();
       $(".show-detail").show();
       $(".staff-detail .editing").hide();
    });

    $("button#update").click(function(event){
        var user_id = $(this).attr("name");
        var level = $("input."+user_id+"level").val();
        var power = $("input."+user_id+"power").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post("/staff/update",
            {
                user_id: user_id,
                level: level,
                power: power
            },
            function(data){
                // $("div.data").text(data["result"]);
                if (data["result"]==="success"){
                    var user_id = data["user_id"];
                    $("button#edit").show();
                    $(".show-detail").show();
                    $("td."+user_id+"level").text(data["level"]);
                    $("td."+user_id+"power").text(data["power"]);
                    $(".staff-detail .editing").hide();
                    alert("Update success");
                }else{
                    alert("Update failed!");
                }
            });
        event.preventDefault();
    });




});