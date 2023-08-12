<?php
  include_once('header.php');
  require_once "includes/connect.inc.php";

  $sql = "SELECT * FROM room WHERE active='1'";
  $available_rooms = $conn->query($sql);

?>

    <div class="container col-3 border rounded-3 p-5 my-5">
      <form action="includes/roomavailability.inc.php" method="post">
            <div class="mb-4">
                <label for="datefrom" class="form-label fw-bold">From:</label>
                <input type="date" class="form-control" id="datefrom" name="datefrom" aria-describedby="datefrom">
            </div>
            <div class="mb-4">
                <label for="dateto" class="form-label fw-bold">To:</label>
                <input type="date" class="form-control" id="dateto" name="dateto">
            </div>
            <div class="mb-1 text-center">
                <button type="submit" name="submit" class="btn btn-primary">Check Availability</button>
            </div>
        </form>
    </div>

    <div class="container pt-5 mb-5">
        <div class="text-center pb-1">
          <h1 class="display-5 fw-bold lh-1 mb-3">ROOMS AND RATES</h1>
        </div>
        <div class="row row-cols-1 row-cols-md-2 g-4 pt-2">
            <?php 
              while($row = mysqli_fetch_assoc($available_rooms)) {
              $imageRoomURL = 'img/room/'.$row["room_image"];
            ?>
            <div class="col">
              <div class="card h-100 p-3">
                <img src="<?php echo $imageRoomURL; ?>" class="card-img-top" style="height: 40vh" alt="...">
                <div class="card-body text-center pt-3 pb-0">
                    <h5 class="card-title"><?php echo $row['room_name']; ?></h5>
                </div>
                <div class="text-center">
                  <a href="accommodation.php">
                    <button type="button" class="btn btn-primary btn-lg fw-bold rounded-0">LEARN MORE</button>
                  </a>
                </div>
              </div>
            </div>
            <?php 
              }
            ?>      
        </div>
    </div>
   
<?php
  include_once('footer.php');
?>