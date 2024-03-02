<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Option</title>
</head>

<body>
    <!-- <div class="head">
        <h1>Dashboard for dynamic mysql</h1>
    </div> -->
    <div class="cards">
        <div class="option-card">
            <h2>Edit Projects</h2>
            <p>You can Edit(ADD/DELETE/UPDATE) your project from here.</p>
            <button id="edit_project_Button">edit project</button>
        </div>

        <div class="option-card">
            <h2>Edit Contact</h2>
            <p>You can edit your contact info from here.</p>
            <button id="edit_contact_Button">edit contact</button>
        </div>
    </div>

</body>
<script>
    document.getElementById("edit_project_Button").addEventListener("click", function() {
        window.location.href = "dsh_project.php";
    });
    document.getElementById("edit_contact_Button").addEventListener("click", function() {
        window.location.href = "dsh_contact.php";
    });
</script>

</html>