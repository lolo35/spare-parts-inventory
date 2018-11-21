<?php
include 'header.php';
?>
<script type="text/javascript" src="scripts/js/scripts.js"></script>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm">
      <div id="jumbo-container">

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <?php
            $menuItems = "select * from `menu_items`";
            $resMenuItems = $conn -> query($menuItems);
            ?>
            <ul class="list-group">
            <?php
            while($rowMenuItems = $resMenuItems -> fetch_assoc()){
              ?>
              <li class="list-group-item" style="cursor: pointer;" id="menu-<?php echo $rowMenuItems['menu_name'];?>" onclick="activateMenu(this.id)">
                <?php echo $rowMenuItems['icon'];?>
                <?php echo $rowMenuItems['menu_name'];?>
              </li>
              <?php
            }
            ?>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div id="left-side-div">

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">

          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-8">
      <div class="container-fluid">
				<div class="row">
					<div class="col-sm">

					</div>
				</div>
        <div class="row">
          <div class="col-sm">
            <div id="main-content-div">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-sm-2">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm">
            <div class="card text-center" style="width: 18rem;">
              <img src="images/<?php echo $_SESSION['user_login'];?>.jpg" alt="User" class="card-img-top">
              <div class="card-body">
                <?php
                $name = explode(" ", $_SESSION['user_login']);
                ?>
                <h5 class="card-title"><?php echo $_SESSION['user_login'];?></h5>
                <p class="card-text">Bine ai venit <?php echo $name[1];?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Some user related stuff here</li>
              </ul>
              <div class="card-body">
                <form method="post">
                  <button type="submit" class="btn btn-danger btn-block card-link" name="logout">Logout</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <div id="right-side-div">

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){

  });
</script>
<?php
if(isset($_POST['logout'])){
  session_destroy();
  $URL = "login.php";
  redirect($URL);
}
include 'footer.php';
/**
 * Created by PhpStorm.
 * User: raul.filimon
 * Date: 7/30/2018
 * Time: 7:42 AM
 */
?>
