<?php
//echo "<script>location.replace('animate/sys/index.php')</script>";
include('header.php');
$drawquery=mysql_query("SELECT id,name FROM draw order by id asc");

?>

<div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Draw Reports</a> <a href="#" class="current">Draw Reports</a> </div>
    <h1>Draw Reports</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Draw Reports</h5>
          </div>
          <div class="widget-content nopadding">
           <?php
           while($row=mysql_fetch_array($drawquery)){
           	$id=$row['id'];
           	$name=$row['name'];
           ?>
			<div class="span3">	          
              <div class="form-actions">
                <a class="btn btn-success btn-xs" href="winnerspdf.php?drawid=<?php echo $id?>" type="submit">Generate <?php echo $name?> Report</a>
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
           </div>
           <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>