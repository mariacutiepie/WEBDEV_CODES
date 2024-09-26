<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management System</title>
    <style>
        table,th,tr,td{
            border: 1px solid;
            padding: 20px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
<?php 
    require_once 'class/subjects.class.php';
    require_once 'function.php';
    $subjectstObj = new Subjects();
    $array = $subjectstObj->getData();

    $keyword = '';
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $keyword = clean_input($_POST['keyword']);
        $array = $subjectstObj->showAll($keyword);
    }
    ?>

    <form action="" method="post">
        <input type="text" name="keyword" id="keyword" value="<?php echo $keyword ?>">
        <input type="submit" name="submit" value="Search">
    </form>
    <br>

    <table>
        <tr>
            <th>No.</th>
            <th>Subject Code</th>
            <th>Subject Name</th>
            <th>Action</th>
        </tr>

        <?php 
        $i = 1;

        if (empty($array)) {
        ?>
            <tr>
                <td colspan="7">
                    <p class="search">No product found.</p>
                </td> 
            </tr>
        <?php
        }

        foreach ($array as $arr) {
        ?>
            <tr>
                <td><?=  $i ?></td>
                <td><?php echo $arr['subject_code'] ?></td>
                <td><?php echo $arr['subject_name'] ?></td>
                <td>
                    <a href="editSubjects.php?id=<?=  $arr['id'] ?>">Edit</a>
                </td>
            </tr>
        <?php 
            $i++;
        }
        ?>
        

    </table>
</body>
</html>