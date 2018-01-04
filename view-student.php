<?php
require_once 'vendor/autoload.php';

use App\classes\Student;


$message = '';

if(isset($_GET['delete'])){
    $id = $_GET['id'];
    $message = Student::deleteStudentInfo($id);
}




$queryResult = Student::getAllStudentInfo();

//while($student = mysqli_fetch_assoc($queryResult) ){
//    echo '<pre>';
//    print_r($student);
//}




?>



<hr/>

<a href="add-student.php">Add Student</a>
<a href="view-student.php">View Student</a>

<hr/>

<h1 style="color: green;"><?php echo $message ?></h1>

<table border="1" width="700" cellpadding="0" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Student Name</th>
        <th>Student Email</th>
        <th>Student Mobile</th>
        <th>Action</th>
    </tr>
    <?php while($student = mysqli_fetch_assoc($queryResult) ) { ?>
    <tr>
        <td><?php echo $student['id'] ?></td>
        <td><?php echo $student['name'] ?></td>
        <td><?php echo $student['email'] ?></td>
        <td><?php echo $student['mobile'] ?></td>
        <td>
            <a href="edit-student.php?id=<?php echo $student['id'] ?>">Edit</a>
            <a href="?delete=true &id=<?php echo $student['id'] ?>" onclick="return confirm('Are You Sure to Delete this!!');">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
