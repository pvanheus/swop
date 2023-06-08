$(document).ready(function($){
  console.log("custom javascript ready");

  $(".rp-section").hide();
  $("#project-section-overview").show();
  $('#project-section-1').show();

  $(".project-nav").click(function(){
    $(".rp-section").hide();
    $(".project-nav").removeClass("project-nav-highlight");
    $(this).addClass("project-nav-highlight");
    console.log("selected" + $(this).attr("data-info").toString());
    $("#project-section-"+$(this).attr("data-info")).show();
  });

});
