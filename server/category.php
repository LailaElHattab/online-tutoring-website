<?php
session_start();
?>
<html>

<?php
include_once 'database.php';

$sql1 = "SELECT * FROM course WHERE category=". $_GET['id'];
$query = $conn->query($sql1);

while($row = $query->fetch_assoc()){
?>
        <div class="card mb-4" id="card">
           
            <div class="card-body">
                <!-- Single item -->
                <div class="row">
                    <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                        <!-- Image -->
                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                             <img src=<?php echo $row['image']?> class="w-100"/>
                            </div>
                        <!-- Image -->
                    </div>

                    <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                        <!-- Data -->
                        <p><strong><?php echo $row['name']?></strong></p>
                        <!-- Data -->
                    </div>

                   
                </div>
                                
            </div>
        </div>

    
<?php
}
?>