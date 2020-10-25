<?php

?>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<h3 style="text-align: center;">Admin Dashboard</h3>
<div class="container" style="width:600px;margin: 50px auto;text-align: center">
    <div class="users-status" style="border: 1px solid gray;margin-bottom: 20px;height: 400px">
        <h3>Users Status</h3>
        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Status</th>
                <th scope="col">Toggle Status</th>


            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Active</td>
                <td><a href="ClientView.php">Run</a></td>

            </tr>

            </tbody>
        </table>
    </div>
    <div class="users-queries" style="border: 1px solid gray;height: 400px">
        <h3>Users Queries</h3>

        <table class="table table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Full Name</th>
                <th scope="col">Query Content</th>
                <th scope="col">Query Criterias</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>

            </tr>

            </tbody>
        </table>

    </div>
</div>
</body>
</html>