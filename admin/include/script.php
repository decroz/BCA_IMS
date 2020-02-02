  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>


  <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/ckeditor5/ckeditor.js"></script>
    <script>
      ClassicEditor.create(document.getElementById('summernote'));
    </script>


<script>
$(document).ready(function(){
  var readMoreHtml=$(".read-more").html();
  var lessText = readMoreHtml.substr(0,700);

  if (readMoreHtml.length > 700){
    $(".read-more").html(lessText).append("<a href='#' class='read-more-link'>Read More >></a>");
  }else{
    $(".read-more").html(readMoreHtml);
  }

  $("#more_less").on("click", ".read-more-link", function(event){
    event.preventDefault();
    $(this).parent(".read-more").html(readMoreHtml).append("<a href='#' class='read-less-link'>Read Less <<</a>")
  });

  $("#more_less").on("click", ".read-less-link", function(event){
    event.preventDefault();
    $(this).parent(".read-more").html(readMoreHtml.substr(0, 700)).append("<a href='#' class='read-more-link'>Read More >></a>")
  });
})
</script>