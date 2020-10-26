<?php

use Implementations\UserImplementation;

$searchResults = UserImplementation::GetPostsByCriteria($_POST['query'], $criteriaArray);

?>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<h2 style="text-align: center;">Search Results</h2>
<div class="container" style="width:1100px;margin: 50px auto;text-align: center">

    <h4>Posts</h4>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Posts</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($searchResults as $result) { ?>
            <tr>
                <td><?php echo $result->getContent() ?></td>
                <td><?php echo $result->getCreatedAt() ?></td>
                <td><?php echo $result->getUpdatedAt() ?></td>
            </tr>
        <?php }
        ?>


        </tbody>
    </table>

</div>
</body>
</html>