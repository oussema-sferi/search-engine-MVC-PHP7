<?php
use Implementations\UserImplementation;

$categories = UserImplementation::GetCategories();
?>
<html>
<head>
    <title>Client Dashboard</title>
</head>
<body>
<h3 style="text-align: center;">Client Dashboard</h3>
<fieldset style="width:600px;margin: 10px auto">
    <form action="router.php?controller=search" method="post" style="margin: 10px auto; width: 600px">
        <label> Enter your search query : </label>
        <input name="query" type="text" placeholder="enter your query"/>
        <br>
        <br>
        <label for="category"> By Category : </label>
        <select name="category" id="category">
            <?php
            foreach ($categories as $cat) {
                ?>
            <option value="a"><?php echo $cat->getLabel() ?></option>
            <?php
            }
            ?>



        </select>
        <br>
        <br>
        <label> By Creation Date : </label>
        <select name="" id="">
            <option value="">Choose a date</option>
        </select>
        <br>
        <br>
        <label> By Update Date : </label>
        <select name="" id="">
            <option value="">Choose a date</option>
        </select>
        <br>
        <br>
        <input type="submit" value="Search" >
    </form>
</fieldset>

</form>
</body>
</html>

