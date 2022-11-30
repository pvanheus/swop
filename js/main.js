$(document).ready(function($){
  console.log("custom javascript ready");

  $(".rp-section").hide();
  $("#project-section-overview").show();
  $('#project-section-1').show();

  $(".project-nav").click(function(){
    $(".rp-section").hide();
    $("#project-section-"+$(this).attr("data-info")).show();
  });

});
