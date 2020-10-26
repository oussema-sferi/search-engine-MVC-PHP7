<html>
<head>
    <title>Client Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<h3 style="text-align: center;">Client Dashboard</h3>
<div class="container" style="width:900px;margin: 50px auto;text-align: center">
    <div class="users-status" style="border: 1px solid gray;margin-bottom: 20px;height: 400px">
        <h3>Search Engine</h3>
<fieldset style="width:600px;margin: 10px auto">
    <form action="router.php?controller=search" method="post" style="margin: 10px auto; width: 600px">
        <label> Enter your search query : </label>
        <input name="query" type="text" placeholder="enter your query"/>
        <br>
        <br>
        <label for="category"> By Category : </label>
        <select name="category" id="category">
            <?php
            foreach ($categories as $category) {
                ?>
            <option value=<?php echo $category->getId() ?>><?php echo $category->getLabel() ?></option>
            <?php
            }
            ?>
        </select>
        <br>
        <br>
        <label for="creation-date"> By Creation Date : </label>
        <select name="creation-date" id="creation-date">
            <?php
            foreach ($posts as $post) {
                ?>
                <option value=<?php echo $post->getCreatedAt() ?>><?php echo $post->getCreatedAt() ?></option>
                <?php
            }
            ?>
        </select>
        <br>
        <br>
        <label for="update-date"> By Update Date : </label>
        <select name="update-date" id="update-date">
            <?php
            foreach ($posts as $post) {
                ?>
                <option value=<?php echo $post->getUpdatedAt() ?>><?php echo $post->getUpdatedAt() ?></option>
                <?php
            }
            ?>
        </select>
        <br>
        <br>
        <input type="submit" value="Search" >
    </form>
</fieldset>
    </div>


    <div class="users-queries" style="border: 1px solid gray;height: 400px">
        <h3>Add a Post</h3>
<form action="router.php?controller=add-post" method="post">
    <div class="form-group">
        <label for="exampleFormControlSelect1">Choose a Category</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
            <?php
            foreach ($categories as $category) {
                ?>
                <option value=<?php echo $category->getId() ?>><?php echo $category->getLabel() ?></option>
                <?php
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Post Content</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content"></textarea>
    </div>
    <input type="submit" value="Add post">


</form>
        <br>
        <br>
        <h4>All Posts</h4>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Posts</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post) { ?>
                <tr>
                    <td><?php echo $post->getContent() ?></td>
                    <td><?php echo $post->getCreatedAt() ?></td>
                    <td><?php echo $post->getUpdatedAt() ?></td>
                </tr>
            <?php }
            ?>


            </tbody>
        </table>

</div>
</body>
</html>

