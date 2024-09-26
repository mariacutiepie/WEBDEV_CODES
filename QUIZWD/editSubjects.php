<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'function.php';
require_once 'class/subjects.class.php';

$subject_code = $subject_name = '';  
$subjectsObj = new Subjects();
?> 
   <form action="?id=<?php echo $id?>" method="POST">
    <label for="subject_code">Subject Code</label>
    <input type="text" name="subject_code" id="subject_code" value="<?php echo subject_code?> ">
    <br>
    <label for="subject_name">Subject Name</label>
    <input type="text" name="subject_name" id="subject_name" value="<?php echo subject_name?>">
    <input type="submit" value="submit">
</form> 
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' ) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $record = $subjectsObj->fetchRecord($id);
        if (!empty($record)) {
            $subject_code = $record["subject_code"];
            $subject_name = $record['subject_name'];
        } else {
            echo 'No Subject found';
            exit;
        }
    } else {
        echo 'No Subject Found';
        exit;
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = clean_input($_GET['id']);
    $subject_code = clean_input($_POST['subject_code']);
    $subject_name = clean_input($_POST['subject_name']);
    if (empty($subject_code)) {
        $subject_codeErr = 'Subject Code is Required';
    }

    if (empty($subject_name)) {
        $subject_nameErr = 'Subject Name is Required';
    }

    if (!empty($codeErr) && !empty($subject_codeErr) && !empty($subject_nameErr)) {
        $subjectObj->id = $id;
        $subjectObj->subject_code = $subject_code;
        $subjectObj->subject_name = $subject_name;
    
        if ($subjectObj->edit()) {
            header('Location: product.php');
        } else {
            echo 'Something went wrong';
        }
    }
}
?>

<form action="?id=<?php echo $id?>" method="POST">
    <input type="text" name="subject_code" id="subject_code" value="<?php echo subject_code?> ">
    <input type="text" name="subject_name" id="subject_name" value="<?php echo subject_name?>">
    <input type="submit" value="submit">
    
</form>
</body>
</html>