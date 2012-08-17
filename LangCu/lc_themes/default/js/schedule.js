/*
    JS TO SCHEDULE.DWT AND SCHEDULE.PHP
*/

//waterfall option
$(function(){
  $('#schedule_unfinish').masonry({
    // options
    itemSelector : '.schedule_unfinish_block',
    columnWidth : 25
  });
});
$(function(){
  $('#schedule_finish').masonry({
    // options
    itemSelector : '.schedule_finish_block',
    columnWidth : 25
  });
});