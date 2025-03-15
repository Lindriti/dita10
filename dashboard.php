<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th {
            border: solid 1px black;
            border-collapse: collapse;
        }

        td, th {
            padding: 10px 20px;
        }
    </style>
</head>

<body>
    <?php
    include_once 'config.php';
    $sql = "SELECT * FROM users";
    $getUsers = $conn->prepare($sql);
    $getUsers->execute();

    $users = $getUsers->fetchAll();
    ?>

    <a href="add.php">Add new user</a>

    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>surname</th>
            <th>email</th>
            <th>Action</th>
        </thead>

        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?php echo $user['id']?></td>
                    <td><?php echo $user['name']?></td>
                    <td><?php echo $user['surname']?></td>
                    <td><?php echo $user['email']?></td>
                    <td><a href="delete.php?id=<?php echo $user['id'] ?>">Delete</a> | <a href="edit.php?id=<?php echo $user['id'] ?>">edit</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>