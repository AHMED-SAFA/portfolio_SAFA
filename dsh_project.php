<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dsh_proj.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Projects</title>
</head>

<body>

    <div class="home">
        <a class="hme" href="index.php">Home</a>
    </div>

    <h2>Add New Project</h2>
    <form action="" method="post">
        <label for="name">Project Name:</label><br>
        <input type="text" name="name" required><br>

        <label for="details">Project Details:</label><br>
        <textarea name="details" required></textarea><br>

        <label for="image">Image URL:</label><br>
        <input type="text" name="image" required><br>

        <label for="link">Project Link:</label><br>
        <input type="text" name="link" required><br>

        <input type="submit" name="add_project" value="Add Project">
    </form>

    <h2>Delete Project</h2>
    <form action="" method="post">
        <label for="delete_name">Enter Project name to delete:</label><br>
        <input type="text" id="delete_name" name="delete_name" required><br>
        <input type="submit" name="delete_project" value="Delete Project">
    </form>

    <h2>Update Project</h2>
    <form action="" method="post">
        <label for="prev_name">Previous Project Name:</label><br>
        <input type="text" id="prev_name" name="prev_name" required><br>

        <label for="update_name">New Project Name:</label><br>
        <input type="text" id="update_name" name="update_name" required><br>

        <label for="update_details">New Project Details:</label><br>
        <textarea id="update_details" name="update_details" required></textarea><br>

        <label for="update_image">New Image URL:</label><br>
        <input type="text" id="update_image" name="update_image" required><br>

        <label for="update_link">New Project Link:</label><br>
        <input type="text" id="update_link" name="update_link" required><br>

        <input type="submit" name="update_project" value="Update Project">
    </form>

    <?php

    // Database connection
    include 'connect.php';

    // Add Project
    if (isset($_POST['add_project'])) {
        $name = $_POST['name'];
        $details = $_POST['details'];
        $image = $_POST['image'];
        $link = $_POST['link'];

        $sql = "INSERT INTO portfolio (name, details, image, link) VALUES ('$name', '$details', '$image', '$link')";
        if (mysqli_query($connection, $sql)) {
            echo "Project added successfully.";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($connection);
        }
    }


    // if (isset($_POST['delete_project'])) {
    //     $name_del = $_POST['delete_name'];
    //     $sql = "DELETE FROM portfolio WHERE name = $name_del";

    //     if (mysqli_query($connection, $sql)) {
    //         echo "Project deleted successfully.";
    //     } else {
    //         echo "Error deleting project: " . mysqli_error($connection);
    //     }
    // }
    
    // Delete Project
    if (isset($_POST['delete_project'])) {
        $name_del = $_POST['delete_name'];

        // Use prepared statement to prevent SQL injection
        $sql = "DELETE FROM portfolio WHERE name = ?";
        $stmt = mysqli_prepare($connection, $sql);

        // Bind parameters
        mysqli_stmt_bind_param($stmt, "s", $name_del);

        if (mysqli_stmt_execute($stmt)) {
            echo "Project deleted successfully.";
        } else {
            echo "Error deleting project: " . mysqli_error($connection);
        }
        mysqli_stmt_close($stmt);
    }


    // Update Project
    if (isset($_POST['update_project'])) {
        $prev_name = $_POST['prev_name'];
        $name = $_POST['update_name'];
        $details = $_POST['update_details'];
        $image = $_POST['update_image'];
        $link = $_POST['update_link'];

        $sql = "UPDATE portfolio SET name='$name', details='$details', image='$image', link='$link' WHERE name='$prev_name'";
        if (mysqli_query($connection, $sql)) {
            echo "Project updated successfully.";
        } else {
            echo "Error updating project: " . mysqli_error($connection);
        }
    }


    mysqli_close($connection);
    ?>
</body>

</html>