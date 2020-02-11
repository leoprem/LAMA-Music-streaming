<?php include("../Config/DatabaseConnection.php") ?>
<?php include("header.php");
$csclass="class='active open'";
$vcsubclass="class='active'";

 if(isset($_GET["did"]))
 {
   $catid=$_GET["did"];
   $sql="delete from SubCategory  where SubCat_id='$catid' ";
   if($conn->query($sql)===true)
   {
     echo "<script type='text/javascript'> swal({
       title: 'Delete Data Successfully!',
       text: 'Redirecting...',
       icon: 'success',
       timer: 1000,
       buttons: false,
   })
   .then(() => {
       location.href='ViewSubCategory.php';
   })</script>";
   //  echo '<script> setTimeout(window.location.href="http:Brand.php",1500)</script>';
       //echo "<script> setTimeout(location.href='Brand.php',2000);; </script>";
   }
   else {
     echo "<script>  swal('An error !');</script>";
     }

 }
 ?>
<?php include("slider.php") ?>

<div class="main-content">
  <!-- start: PANEL CONFIGURATION MODAL FORM -->

  <!-- /.modal -->
  <!-- end: SPANEL CONFIGURATION MODAL FORM -->
  <div class="container">
    <!-- start: PAGE HEADER -->
    <div class="row">
      <div class="col-sm-12">
        <!-- start: STYLE SELECTOR BOX -->

        <!-- end: STYLE SELECTOR BOX -->
        <!-- start: PAGE TITLE & BREADCRUMB -->
        <ol class="breadcrumb">
          <li>
            <i class="clip-file"></i>
            <a href="#">
              SubCategory
            </a>
          </li>
          <li class="active">
            View SubCategory
          </li>
          <li class="search-box">
            <form class="sidebar-search">
              <div class="form-group">
                <input type="text" placeholder="Start Searching...">
                <button class="submit">
                  <i class="clip-search-3"></i>
                </button>
              </div>
            </form>
          </li>
        </ol>
        <div class="page-header">
          <h1>SubCategory <small></small></h1>
        </div>
        <!-- end: PAGE TITLE & BREADCRUMB -->
      </div>
    </div>
    <!-- end: PAGE HEADER -->
    <!-- start: PAGE CONTENT -->

    <div class="row">
    						<div class="col-sm-12">
    							<!-- start: TEXT FIELDS PANEL -->
    							<div class="panel panel-default">
    								<div class="panel-heading">
    									<i class="fa fa-external-link-square"></i>
    									View SubCategory
    									<div class="panel-tools">
    										<a class="btn btn-xs btn-link panel-collapse collapses" href="#">
    										</a>
    										<a class="btn btn-xs btn-link panel-config" href="#panel-config" data-toggle="modal">
    											<i class="fa fa-wrench"></i>
    										</a>
    										<a class="btn btn-xs btn-link panel-refresh" href="SubCategory.php">
    											<i class="fa fa-refresh"></i>
    										</a>
    										<a class="btn btn-xs btn-link panel-expand" href="#">
    											<i class="fa fa-resize-full"></i>
    										</a>

    									</div>
    								</div>
    								<div class="panel-body">
                        <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                          <table class="table table-striped table-bordered table-hover table-full-width dataTable">
                            <thead>
											<tr>
                        <th>Category</th>
												<th>SubCategory</th>
												
												<th>image1</th>
												<th>Edit</th>
                        <th>Delete</th>
											</tr>
										</thead>
										<tbody>
                          	<?php
                          	$sql="SELECT * from subCategory,category where subcategory.cat_id=category.cat_id";
                          	$result=$conn->query($sql);

                          	if($result->num_rows>0)
                          	{
                          		while($row=$result->fetch_assoc())
                          		{
                          			$SubCat_id=	$row["SubCat_id"] ;
                          	?>
                          	<tr>
                            <td> 	<?php echo	$row["Cat_Name"]; ?>	</td>
                          		<td> 	<?php echo	$row["SubCat_Name"]; ?>	</td>
                          		
                          		<td><img src='<?php	echo $row["SubCat_pic1"] ;?>' width="200px" height="100px"/> 		</td>
                          		
                          		<td> <a class="btn  btn-blue" href='<?php echo "EditSubCategory.php?eid=",$SubCat_id; ?>' >Edit</a></td>
                              <td><a  class="btn  btn-danger confirmation" href='<?php echo "ViewSubCategory.php?did=",$SubCat_id; ?>'>Delete</a> </td>

                          	</tr>
                          	<?php
                          }}
                          	?>

                          </tbody>
                          </table>


    									</form>
    								</div>
    							</div>
    							<!-- end: TEXT FIELDS PANEL -->
    						</div>
    					</div>









    <!-- end: PAGE CONTENT-->
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
