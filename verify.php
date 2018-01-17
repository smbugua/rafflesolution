<?php
include('header.php');
$code=mysql_fetch_array(mysql_query("SELECT id,code from verify where status='0' order by id desc limit 1"));
$c=$code['code'];
$id=$code['id'];


?>

<div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Verify Code</a> <a href="#" class="current">Verify Form</a> </div>
    <h1>Verify Code</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-pencil"></i> </span>
            <h5>Verify Code</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" action="verifyclass.php?id=<?php echo $id?>" class="form-horizontal" method="post">
              <div id="form-wizard-1" class="step">
                <div class="control-group">
                  <label class="control-label">Code</label>
                  <div class="controls">
                    <input id="username" type="text" name="code" />
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