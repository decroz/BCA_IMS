
$(document).ready(function(){
  var readMoreHtml=$(".read-more").html();
  var lessText = readMoreHtml.substr(0,100);

  if (readMoreHtml.length > 100){
    $(".read-more").html(lessText).append("<a href='#' class='p-n2 read-more-link'>Read More >></a>");
  }else{
    $(".read-more").html(readMoreHtml);
  }
   
  $("#more_less").on("click", ".read-more-link", function(event){
    event.preventDefault();
    $(this).parent(".read-more").html(readMoreHtml).append("<a href='#' class='p-n2 read-less-link'>Read Less <<</a>")
  });

  $("#more_less").on("click", ".read-less-link", function(event){
    event.preventDefault();
    $(this).parent(".read-more").html(readMoreHtml.substr(0, 100)).append("<a href='#' class='p-n2 read-more-link'>Read More >></a>")
  });
})

// readmore option available in teacher info page
$(document).ready(function(){
  var readMoreHtml=$(".more_read").html();
  var lessText = readMoreHtml.substr(0,415);

  if (readMoreHtml.length > 415){
    $(".more_read").html(lessText).append("... <a href='index.php' class=' d-block btn m-5 p-2 read-more-link' style='background-color:#021558;'> Read More >> </a>");
  }else{
    $(".more_read").html(readMoreHtml);
  }
 
})