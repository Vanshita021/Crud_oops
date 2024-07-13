<?php
    include 'model.php';

    $obj = new Model();
    //print_r($obj);

    // insert records
    if(isset($_POST['submit'])){
        $obj->insert($_POST);
    }

    //update records
    if(isset($_POST['update'])){
        $obj->update($_POST);
    }

    //delete records
    if(isset($_GET['deleteid'])){
        $delid = $_GET['deleteid'];
        $obj->delete($delid);
    }
    
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>CRUD</title>
</head>


<body>
    <h2 class="text-center  m-4">CRUD operations in PHP using OOPs</h2>
    <div class="container">

        <?php
        if(isset($_GET['msg']) AND $_GET['msg'] == 'ins'){
            echo '<div class="alert alert-success d-flex align-items-center" role="alert">
                    <div>
                        Record Inserted Sucessfully !!!
                    </div>
                  </div>';
        }

        if(isset($_GET['msg']) AND $_GET['msg'] == 'ups'){
            echo '<div class="alert alert-warning d-flex align-items-center" role="alert">
                    <div>
                        Record Updated Sucessfully !!!
                    </div>
                  </div>';
        }

        if(isset($_GET['msg']) AND $_GET['msg'] == 'del'){
            echo '<div class="alert alert-danger d-flex align-items-center" role="alert">
                    <div>
                        Record Deleted Sucessfully !!!
                    </div>
                  </div>';
        }
    ?>

        <?php
        // fetch records for updation
        if(isset($_GET['editid'])){
            $editid = $_GET['editid'];
            $record = $obj -> displayRecordById($editid);
            //print_r($record);
    ?>
        <!-- update form -->
        <form action="index.php" method="post" class="border border-secondary-subtle rounded-4 p-5"
            style="width: 70%; margin:auto;">

            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Name:</label>
                        <input type="text" name="name" value="<?php echo $record['name']; ?>" id=""
                            placeholder="Enter Your name" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Email:</label>
                        <input type="email" name="email" value="<?php echo $record['email']; ?>" id=""
                            placeholder="Enter Your name" class="form-control">
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Gender:</label><br>
                        <input type="radio" name="gender" value="Male"
                            <?php if($record['gender'] == 'Male') echo 'checked'; ?>>Male
                        <input type="radio" name="gender" value="Female"
                            <?php if($record['gender'] == 'Female') echo 'checked'; ?>> Female
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Phone:</label>
                        <input type="text" name="phone" value="<?php echo $record['phone']; ?>"
                            placeholder="Enter Your phone" class="form-control">
                    </div>
                </div>
            </div>
            

            <div class="row">
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Address:</label>
                        <input type="text" name="address" value="<?php echo $record['address']; ?>"
                            placeholder="Enter Your address" class="form-control">
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <div class="form-group m-2">
                        <label>Country:</label>
                        <select name="country" class="form-control">
                            <option value="India" <?php if($record['country'] == 'NA') echo 'selected'; ?>>Select
                                Country
                            </option>
                            <option value="India" <?php if($record['country'] == 'India') echo 'selected'; ?>>India
                            </option>
                            <option value="USA" <?php if($record['country'] == 'USA') echo 'selected'; ?>>USA</option>
                            <option value="Canada" <?php if($record['country'] == 'Canada') echo 'selected'; ?>>Canada
                            </option>
                            <option value="Australia" <?php if($record['country'] == 'Australia') echo 'selected'; ?>>
                                Australia
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            

            <div class="form-group m-2">
                <input type="hidden" name="hid" value="<?php echo $record['id']; ?>">
                <input type="submit" name="update" id="" value="Update" class="btn btn-outline-info">
            </div>
        </form><br>

        <?php 
        } else {
    ?>
        <!-- form -->
        <form action="index.php" method="post" class="border border-secondary-subtle rounded-4 p-5"
            style="width: 70%; margin:auto;">
            <div class="row">

                <div class="col">
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="name" id="" placeholder="Enter your name" class="form-control">
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" id="" placeholder="Enter your email" class="form-control">
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Phone:</label>
                        <input type="text" name="phone" placeholder="Enter Your phone" class="form-control">
                    </div>

                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Gender:</label><br>
                        <input type="radio" name="gender" value="Male" class="m-2"> Male
                        <input type="radio" name="gender" value="Female" class="m-2"> Female
                    </div><br>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label>Address:</label>
                        <input type="text" name="address" placeholder="Enter Your address" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label>Country:</label>
                        <select name="country" class="form-select">
                            <option value="NA">Select Country</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="UK">UK</option>
                            <option value="Canada">Canada</option>
                        </select>
                    </div>
                </div>
            </div>
            <br>

            <div class="form-group">
                <input type="submit" name="submit" id="" value="Submit" class="btn btn-outline-success">
            </div>


        </form><br>

        <?php
        }
    ?>
        <h3 class="text-center text-danger p-2">Display Records</h3>
        <table class="table table-bordered">
            <tr class=" table-primary text-center">
                <th>S.no</th>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Country</th>
                <th>Action</th>
            </tr>
            <?php
                $data = $obj->display();
                $sno = 1;

                foreach($data as $value){
            ?>

            <tr class="text-center">
                <td><?php echo $sno++; ?></td>
                <td><?php echo $value['name'] ?></td>
                <td><?php echo $value['email']?></td>
                <td><?php echo $value['gender']; ?></td>
                <td><?php echo $value['phone']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td><?php echo $value['country']; ?></td>
                <td>
                    <a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-outline-primary m-1">Edit</a>
                    <a href="index.php?deleteid=<?php echo $value['id'];?>"
                        class="btn btn-outline-danger m-1">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>

        </table>
    </div>

</body>

</html>