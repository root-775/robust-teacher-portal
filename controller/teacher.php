<?php
session_start();

class TeacherController{
    public $obj;
    public function __construct()
    {
        include_once 'model\TeacherModel.php';
        $this->obj = new TeacherModel();
    }

    public function login(){
        $title = "Login";
        include ('views\include\header.php');
        include 'views\login.php';
        include 'views\include\footer.php';
    }

    function teacherLoginChecker()
    {
        if (!isset($_SESSION["teacher"])) {
            header('location: index.php?c=teacher&f=login');
        }
    }

    public function dashbord()
    {
        $this->teacherLoginChecker();
        $title = "Dashbord - ".$_SESSION['teacher']['name'];
        include ('views\include\header.php');
        include 'views\dashbord.php';
        include 'views\include\footer.php';

    }
    public function saveData()
    {
        $this->teacherLoginChecker();
        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            echo json_encode([
                'status' => false,
                'message' => "Invalid email format"
            ]);
        } else {
            if (strlen($_POST['pnumber']) >= 10) {
                $a = $this->obj->saveStudentData($_POST['name'], $_POST['fname'], $_POST['dob'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['pin'], $_POST['pnumber'], $_POST['email'], $_POST['class'], $_POST['marks'], date('m-d-Y'));
                echo json_encode([
                        'status' => true,
                        'message' => $a
                    ]);
            } else {
                echo json_encode([
                    'status' => false,
                    'message' => "Please Enter valid number, phone number should be 10 digit"
                ]);
            }
        }
    }
    public function edit()
    {
        $this->teacherLoginChecker();
        $title = "Dashbord - ".$_SESSION['teacher']['name'];
        include ('views\include\header.php');
        include 'views\edit-student.php';
        include 'views\include\footer.php';
    }

    public function updateData()
    {
        echo json_encode([
            'status' => true,
            'message' => $this->obj->updateStudentData($_POST['name'], $_POST['fname'], $_POST['dob'], $_POST['address'], $_POST['city'], $_POST['state'], $_POST['pin'], $_POST['pnumber'], $_POST['email'], $_POST['class'], $_POST['marks'], $_POST['id'])
        ]);
    }

    public function delete(){
        $this->teacherLoginChecker();
        echo $this->obj->deleteStudentData($_POST['id']);
        header('location: index.php?c=teacher&f=dashbord');

    }

    public function logout(){
        session_destroy();
        header('location: index.php?c=teacher&f=login');
    }

}
