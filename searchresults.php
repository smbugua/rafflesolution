<?php
include('header.php');
$idno=$_POST['idno'];
$phone=$_POST['tel'];
$exams=mysql_query("SELECT * FROM patients where idno='$idno' or tel='$phone'");
?>

 <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Patient Overview </a> <a href="#" class="current">Search Results</a> </div>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

<div class="widget-box">
           <h4>	Search Results</h4>
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Patients List</h5>

              </div>

          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Tels</th>
                  <th>Email</th>
                  <th>Labs</th>
                  <th>Bill</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $no=0;
              while($row=mysql_fetch_array($exams)){?>
                <tr class="gradeX">
                <?php
                $no++;
                ?>
                  <td><?php echo $no?></td>
                  <td><?php echo $row['name']?></td>
                  <td><?php echo $row['tel']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><a href="patientoverview.php?id=<?php echo $row['id']?>" class="btn btn-primary btn-mini"><i class="icon icon-edit"></i> Labs</a> </td>
                  <td><a href="billclient.php?id=<?php echo $row['id']?>" class="btn btn-danger btn-mini"><i class="icon icon-money"></i> Bill</a> </td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>


    <!-- Modals -->



  </div>

<?php include('footer.php');?>
</div>
<!--Footer-part-->
<!--end-Footer-part-->

</body>
</html>
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script>