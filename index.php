<?php
include('header.php');
$paymentsquery=mysql_query("SELECT customername as name ,tel ,shop ,dateadded from entries order by id  DESC LIMIT 5");

$recipts=mysql_query("SELECT name from shop order by id ASC LIMIT 5");
?>
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div  class="quick-actions_homepage">
    <ul class="quick-actions">
      <li class="bg_lb"> <a href="drawrequest.php"> <i class="icon-dashboard"></i>Run Draw </a> </li>
      <li class="bg_lg"> <a href="shops.php"> <i class="icon-shopping-cart"></i> Shops</a> </li>
      <li class="bg_ly"> <a href="winners.php"> <i class=" icon-globe"></i>Winners </a> </li> 
      <li class="bg_lo"> <a href="reports.php"> <i class="icon-th"></i> Reports</a> </li>
      <li class="bg_lo"> <a href="#"> <i class="icon-group"></i>Notify Winners </a> </li>
      <li class="bg_ls"> <a href="entries.php"> <i class="icon-signal"></i>Entries Made</a> </li>
    </ul>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Latest entires</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
            	<?php while($items=mysql_fetch_array($paymentsquery)){?>
              <li>
                <div class="user-thumb"> <img width="40" height="40" alt="User" src="img/demo/av1.jpg"> </div>
                <div class="article-post"> <span class="user-info"> Customer Name : <?php echo $items['name']?> . Shop: <?php echo $items['shop']?></span>
                  <p><a href="#"><?php echo $items['dateadded']?></a> </p>
                </div>
              </li>
         		<?php }?>
              <li>
                <a href="entries.php" class="btn btn-warning btn-mini">View All</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
            <h5>Shops</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              	<?php while($it=mysql_fetch_array($recipts)){?>
                <li class="clearfix">
                  <div class="txt"> Shop Name : <?php echo $it['name']?>  </div>
                </li>
             <?php }?>
             <li>
                <a href="shops.php" class="btn btn-success btn-mini">View All</a>
              </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="span6">
     
   <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-calendar">
          <div class="widget-title"> <span class="icon"><i class="icon-calendar"></i></span>
            <h5>Calendar</h5>
            <div class="buttons"> <a id="add-event" data-toggle="modal" href="#modal-add-event" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> Add new event</a>
              <div class="modal hide" id="modal-add-event">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">×</button>
                  <h3>Add a new event</h3>
                </div>
                <div class="modal-body">
                  <p>Enter event name:</p>
                  <p>
                    <input id="event-name" type="text" />
                  </p>
                </div>
                <div class="modal-footer"> <a href="#" class="btn" data-dismiss="modal">Cancel</a> <a href="#" id="add-event-submit" class="btn btn-primary">Add event</a> </div>
              </div>
            </div>
          </div>
          <div class="widget-content">
            <div class="panel-left">
              <div id="fullcalendar"></div>
            </div>
            <div id="external-events" class="panel-right">
              <div class="panel-title">
                <h5>Drag Events to the calander</h5>
              </div>
              <div class="panel-content">
                <div class="external-event ui-draggable label label-inverse">DRAW ONE</div>
                <div class="external-event ui-draggable label label-inverse">DRAW TWO</div>
                <div class="external-event ui-draggable label label-inverse">DRAW THREE</div>
                <div class="external-event ui-draggable label label-inverse">DRAW FOUR</div>
                <div class="external-event ui-draggable label label-inverse">DRAW FIVE</div>
                <div class="external-event ui-draggable label label-inverse">DRAW SIX</div>
                <div class="external-event ui-draggable label label-inverse">DRAW SEVEN</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<?php include('footer.php') ?>
</div>


<script src="js/excanvas.min.js"></script> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.flot.min.js"></script> 
<script src="js/jquery.flot.resize.min.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/fullcalendar.min.js"></script> 
<script src="js/matrix.calendar.js"></script> 
<script src="js/matrix.chat.js"></script> 
<script src="js/jquery.validate.js"></script> 
<script src="js/matrix.form_validation.js"></script> 
<script src="js/jquery.wizard.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.popover.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.tables.js"></script> 
<script src="js/matrix.interface.js"></script> 
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
