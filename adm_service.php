<?php
    include_once 'includes/connect.inc.php';
    include_once 'adminheader.php';

?>

    <div class="container p-5">

        <div class="text-end pb-4">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createFacilityModal">Add Service</button>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped mb-0">
            <thead>
                <tr>
                    
                    <th scope="col">Service ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Service Name</th>
                    <th scope="col">Service Description</th>
                    <th scope="col">Image Filename</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    
                    $sql = "SELECT * FROM services WHERE active='1'";
                    $result = $conn->query($sql);
                    $conn->close();

                    while($rows=$result->fetch_assoc())
                    {
                ?>
                <tr>
                    
                    <td><?php echo $rows['service_id']; ?></td>
                    <td><img src="<?php echo 'img/service/'.$rows["service_image"]; ?>" alt="..." style="width: 100px;"></td>
                    <td><?php echo $rows['service_name']; ?></td>
                    <td><?php echo $rows['service_description']; ?></td>
                    <td><?php echo $rows['service_image']; ?></td>
                    
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateRoomModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                            </svg>
                        </button>
                        <a href="includes/deletefacility.inc.php?id=<?php echo $rows["service_id"]; ?>">
                            <button type="button" class="btn btn-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                </svg>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
        

        <!-- Modal Create -->
        <div class="modal fade" id="createFacilityModal" tabindex="-1" aria-labelledby="createFacilityModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createFacilityModalLabel">Add Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/addservice.inc.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="service_name" class="form-label">Service Name:</label>
                                <input type="text" class="form-control" id="service_name" name="service_name" aria-describedby="service_name">
                            </div>
                            <div class="mb-3">
                                <label for="service_description" class="form-label">Service Description:</label>
                                <input type="text" class="form-control" id="service_description" name="service_description">
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

        <!-- Modal Update -->
        <div class="modal fade" id="updateRoomModal" tabindex="-1" aria-labelledby="updateRoomModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateRoomModalLabel">Update Room Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/updateroom.inc.php" method="post">
                            <input type="hidden" class="form-control" id="room_id" name="room_id" aria-describedby="room_id" value="<?php echo $row['room_id']; ?>">
                            <div class="mb-3">
                                <label for="room_number" class="form-label">Facility Name:</label>
                                <input type="text" class="form-control" id="room_number" name="room_number" aria-describedby="room_number" value="<?php echo $row['room_number']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="room_name" class="form-label">Facility Description:</label>
                                <input type="text" class="form-control" id="room_name" name="room_name" value="<?php echo $row['room_name']; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="image_name" class="form-label">Gallery Image Name:</label>
                                <input type="text" class="form-control" id="image_name" name="image_name" aria-describedby="image_name">
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