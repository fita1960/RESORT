<?php
    include_once 'includes/connect.inc.php';
    include_once 'adminheader.php';
?>

    <div class="container p-5">

        <div class="text-end pb-4">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createRoomModal">Add Image</button>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    <th scope="col">Gallery ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Gallery Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $sql = "SELECT * FROM gallery";
                    $result = $conn->query($sql);
                    $conn->close();

                    while($rows=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    
                    <td><?php echo $rows['image_id']; ?></td>
                    <td><img src="<?php echo 'img/gallery/'.$rows["gallery_image"]; ?>" alt="..." style="width: 100px;"></td>
                    <td><?php echo $rows['image_name']; ?></td>
                    
                    <td>
                        <div class="btn-group">
                        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Activate</a></li>
                            <li><a class="dropdown-item" href="#">Deactivate</a></li>
                        </ul>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
        

        <!-- Modal Create -->
        <div class="modal fade" id="createRoomModal" tabindex="-1" aria-labelledby="createRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createRoomModalLabel">Add Gallery Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/addgalleryimg.inc.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="image_name" class="form-label">Gallery Image Name:</label>
                                <input type="text" class="form-control" id="image_name" name="image_name" aria-describedby="image_name">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="file" value="" />
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php
        include_once 'footer.php';
    ?>