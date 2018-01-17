<?php
include('header.php');
?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="itemtypes.php">Product Types</a> <a href="#" class="current">Add Product Type</a> </div>
    <h1>Add Product Type</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Add Product Type</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" action="patientclass.php?action=additemtype" class="form-horizontal" method="post">
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Product Type Name</label>
                  <div class="controls">
                    <input id="username" type="text" name="name" />
                  </div>
                </div>
                  
              
              </div>
          
              <div class="form-actions">
                <button class="btn btn-primary btn-xs" type="submit">Submit</button>
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

































<?php include('footer.php');?>