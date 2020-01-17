<?php include("../Config/DatabaseConnection.php") ?>
<?php include("header.php");
 ?>
<?php include("slider.php") ?>

<div class="main-content">
  <!-- start: PANEL CONFIGURATION MODAL FORM -->

  <!-- /.modal -->
  <!-- end: SPANEL CONFIGURATION MODAL FORM -->
  <div class="container">
    <!-- start: PAGE HEADER -->
  </div>
</div>

<?php include("footer.php") ?>
<script type="text/javascript">
    var elems = document.getElementsByClassName('confirmation');
    var confirmIt = function (e) {
        if (!confirm('Are you sure Want to Delete?')) e.preventDefault();
    };
    for (var i = 0, l = elems.length; i < l; i++) {
        elems[i].addEventListener('click', confirmIt, false);
    }
</script>
