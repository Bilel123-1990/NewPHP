<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Liste of Clients</h2>
    <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Addresse</th>
                <th>Created At</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $servername="localhost";
            $username="root";
            $password="";
            $database="myshop";

            //Create connection
            $connection= new mysqli($servername,$username,$password,$database);

            //check connexion
            if($connection->connect_error){
                die("Connection failed:" .$connection->connect_error);
            }

            //read all row from database table
            $sql="SELECT * FROM clients";
            $result=$connection->query($sql);

            if(!$result){
                die("Invalid query ". $connection->error);
            }

            //read data of each row
            while($row=$result->fetch_assoc()){
                echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[adresse]</td>
                <td>$row[created_at]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                </td>

            </tr>
                ";
            }

            ?>
            <tr>
                <td>10</td>
                <td>Bill Gates</td>
                <td>bill.gates@microsoft.com</td>
                <td>+111222333</td>
                <td>New York USA</td>
                <td>18/05/2022</td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/myshop/edit.php">Edit</a>
                    <a class="btn btn-danger btn-sm" href="/myshop/delete.php">Delete</a>
                </td>

            </tr>
        </tbody>

    </table>

    </div>
    
</body>
</html>