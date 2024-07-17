<?php
class TeacherModel
{
    private $dsn = "mysql:host=localhost;dbname=teacher";
    private $username = "root";
    private $password = "";
    public $pdo;
    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            echo " " . $e->getMessage();
        }
    }

    public function teacherLogin($email, $password)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM teachers where email = ? AND password = ? AND deleted_at IS NULL");
        $stmt->execute([$email, $password]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)) {
            $_SESSION["teacher"] = $result;
        }
        
        return $result;
    }

    public function saveStudentData($name, $fname, $dob, $address, $city, $state, $pin, $pnumber, $email, $class, $marks, $denroll)
    {
        $sql = "SELECT count(*) FROM `students` WHERE pnumber = ? OR email=? AND deleted_at IS NULL ";
        $result = $this->pdo->prepare($sql);
        $result->execute([$pnumber, $email]);
        $number_of_rows = $result->fetchColumn();
        
        if($number_of_rows == 0){
            $sql = "INSERT INTO students(name, fname, dob, address, city, state,  pin, pnumber, email, class, marks, denroll) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $this->pdo->prepare($sql)->execute([$name, $fname, $dob, $address, $city, $state, $pin, $pnumber, $email, $class, $marks, $denroll]);
            return 'Saved';
        }else{
            return 'This record already exists.';
        }
    }

    public function showallData()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM students WHERE deleted_at IS NULL");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function viewUser($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM students where id = ? AND deleted_at IS NULL LIMIT 1");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateStudentData($name, $fname, $dob, $address, $city, $state, $pin, $pnumber, $email, $class, $marks, $id)
    {
        $sql = "UPDATE students SET name=?, fname=?, dob=?, address=?, city=?, state=?,  pin=?, pnumber=?, email=?, class=?, marks=? WHERE id=? AND deleted_at IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$name, $fname, $dob, $address, $city, $state, $pin, $pnumber, $email, $class, $marks, $id]);
        return "Student data Update Successfully";
    }

    public function deleteStudentData($id){
        $sql = "UPDATE students SET deleted_at=? WHERE id=? AND deleted_at IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([date('Y-m-d H:i:s'), $id]);
        return "Student data deleted Successfully";
    }

}
