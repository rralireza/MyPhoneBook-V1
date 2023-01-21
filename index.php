<?php
    session_start();
    include "class/management.php";
    require_once "class/phonebook.php";
    $LogObjects = new Log();
    $PhoneBookObjects = new Contacts();

    $session = $LogObjects->session();
    

    $user_id = $_GET['id'];

    if (isset($_POST['logout'])) {
        $LogObjects->logout();
    }

    if (isset($_POST['btn'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $PhoneBookObjects->addContact($user_id , $name , $phone , $email);
    }

    
?>

<html>
    <head>
    
     <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/all.min.css"/>
    <link rel="stylesheet" href="css/index_style.css"/>
   
 
    </head>
    
    <body>
        
     
       
        <form method="post">
        <div class="jumbotron jum">
            
            <div class=" navbar">
            <h3>Phone Book <i class="far fa-address-book"></i></h3>

            <h5><?php echo "Hello " . $_SESSION['name'] ?></h5>
            </div>
            

            <div class="row">
                
                
                <div class="col-lg-4 inp">
                
                <input onkeyup="searchFunction()" id="myInput" class="form-control mt-2" placeholder="Search">
                <span class="icon text-primary"><i class="fas fa-search"></i></span>
                
                <h5 class="mt-2">Add New Contact</h5>

                    <input name="name" class="form-control mb-3 mt-3" placeholder="Add Name" id="userName" type="text">
                    <div id="nameAlert" class="alert alert-danger text-justify p-2 ">Please add name</div>
                    <input name="phone" class="form-control mb-3" placeholder="Add Phone Number" id="userPhone" type="text">
                    <div id="phoneAlert" class="alert alert-danger text-justify p-2 ">Please add a valid number</div>
                    <input name="email" class="form-control mb-3" placeholder="Add E-Mail" id="userEmail" type="email">
                    <div id="mailAlert" class="alert alert-danger text-justify p-2 ">Please add a valid e-mail</div>

                    <button class="btn btn-info w-100 btn1" name="btn">Add</button>

                    <button class="btn btn-info w-100 btn1" name="logout">Logout</button>
    
                    
                </div>
                
                
        <div class="col-lg-8">
                
                <table id="myTable" class="table text-justify table-striped">
                
                <thead class="tableh1">
                <th class="">Name</th>
                <th class="">Phone</th>
                <th class="">E-mail</th>
                <th class="col-1">Edit</th>
                <th class="col-1">Delete</th>    
                </thead>
                
                <tbody>
                <?php
                        $contacts = $PhoneBookObjects->showContacts($user_id);
                        foreach ($contacts as $row):
                        
                    ?>
                <tr>
                
                    <td><?php echo $row->name; ?></td>
                    <td><?php echo $row->phonenumber; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><a href="edit.php?id=<?php echo $row->contact_id; ?>"><img src="node_modules/bootstrap-icons/icons/pen.svg" alt="Bootstrap" width="25px"></a></td>
                    <td><a href="delete.php?id=<?php echo $row->contact_id; ?>"><img src="node_modules/bootstrap-icons/icons/trash.svg" alt="Bootstrap" width="25px"></a></td>
                    
                </tr>
                <?php endforeach; ?>  
                </tbody>
                
                </table>

                
        </div>
                
            
            
            </div>    
        </div>
        
        
        
        <footer class="text-center">Ahmad Al-Shahawi 2019.All rights reserved</footer>
        
           <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
        </form>
    </body>
    
</html>













