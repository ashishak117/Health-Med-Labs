<aside id="menubar" class="menubar light">
  <div class="app-user">
    <div class="media">
      <div class="media-left">
        <div class="avatar avatar-md avatar-circle">
          <img class="img-responsive" src="assets/images/images.png" alt="avatar"/>
        </div><!-- .avatar -->
      </div>
      <div class="media-body">
        <div class="foldable">
          <?php
$uid=$_SESSION['odlmsuid'];
$sql="SELECT FullName,Email from  tbluser where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
          <h5><a href="javascript:void(0)" class="username"><?php  echo $row->FullName;?></a></h5><?php $cnt=$cnt+1;}} ?>
          <ul>
            <li class="dropdown">
              <a href="javascript:void(0)" class="dropdown-toggle usertitle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small><?php  echo $row->Email;?></small>
                <span class="caret"></span>
              </a>
              
              <ul class="dropdown-menu animated flipInY">
                <li>
                  <a class="text-color" href="dashboard.php">
                    <span class="m-r-xs"><i class="fa fa-home"></i></span>
                    <span>Home</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="profile.php">
                    <span class="m-r-xs"><i class="fa fa-user"></i></span>
                    <span>Profile</span>
                  </a>
                </li>
                <li>
                  <a class="text-color" href="change-password.php">
                    <span class="m-r-xs"><i class="fa fa-gear"></i></span>
                    <span>Settings</span>
                  </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                  <a class="text-color" href="logout.php">
                    <span class="m-r-xs"><i class="fa fa-power-off"></i></span>
                    <span>logout</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- .media-body -->
    </div><!-- .media -->
  </div><!-- .app-user -->

  <div class="menubar-scroll">
    <div class="menubar-scroll-inner">
      <ul class="app-menu">
        <li class="has-submenu">
          <a href="dashboard.php">
            <i class="menu-icon zmdi zmdi-view-dashboard zmdi-hc-lg"></i>
            <span class="menu-text">Dashboard</span>
            
          </a>
       
        </li>
        
        <li class="has-submenu">
          <a href="view-testdetail.php">
            <i class="menu-icon zmdi zmdi-layers zmdi-hc-lg"></i>
            <span class="menu-text">View Test Detail</span>
           </a>
          
        </li>

        <li class="has-submenu">
          <a href="appointment.php">
            <i class="menu-icon zmdi zmdi-puzzle-piece zmdi-hc-lg"></i>
            <span class="menu-text">Book Appointment</span>
           
          </a>
         
        </li>

        <li class="has-submenu">
          <a href="appointment-history.php">
            <i class="menu-icon zmdi zmdi-inbox zmdi-hc-lg"></i>
            <span class="menu-text">Appointment History</span>
             </a>
         
        </li>
        
         <li class="has-submenu">
          <a href="view-medical-report.php">
            <i class="menu-icon zmdi zmdi-inbox zmdi-hc-lg"></i>
            <span class="menu-text">View Medical Report</span>
             </a>
         
        </li>
        
        <li>
          <a href="search.php">
            <i class="menu-icon zmdi zmdi-search zmdi-hc-lg"></i>
            <span class="menu-text">Search</span>
          </a>
        </li>

      
      </ul><!-- .app-menu -->
    </div><!-- .menubar-scroll-inner -->
  </div><!-- .menubar-scroll -->
</aside>