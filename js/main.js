$(document).ready(function($){
  console.log("custom javascript ready");

  $(".rp-section").hide();
  $("#project-section-overview").show();

  $(".project-nav").click(function(){
    $(".rp-section").hide();
    $("#project-section-"+$(this).attr("data-info")).show();
  });

});
