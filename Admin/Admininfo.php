<!--Do not be misled by the name of the php file. It is for Admin and Member!-->
<?php

class Admin {

    public $firstname;
    public $lastname;
    public $address1;
    public $address2;
    public $address3;
    public $contact;
    public $nationality;
    public $company_email;
    public $personal_email;
    public $gender;

    function __construct($row) {
        $this->firstname = $row['first_name'];
        $this->lastname = $row['last_name'];
        $this->address1 = $row['address_line1'];
        $this->address2 = $row['address_line2'];
        $this->address3 = $row['address_line3'];
        $this->contact = $row['contact_no1'];
        $this->nationality = $row['nationality'];
        $this->company_email = $row['company_email_address'];
        $this->personal_email = $row['personal_email_address'];
        $this->gender = $row['gender'];
    }

    function printDetails() {
        echo "<b>Name:</b> " . $this->firstname . " " . $this->lastname . "<br />";
        echo "<b>Nationality:</b> " . $this->nationality . "<br />";
        echo "<b>Gender:</b> " . $this->gender . "<br />";
        echo "<b>Address Line 1:</b> " . $this->address1 . "<br />";
        echo "<b>Address Line 2:</b> " . $this->address2 . "<br />";
        echo "<b>Address Line 3:</b> " . $this->address3 . "<br />";
        echo"<b>Company email: </b>" . $this->company_email . "<br />";
        echo"<b>Personal email: </b>" . $this->personal_email . "<br />";
        echo"<b>Contact: </b>" . $this->contact;
        echo "<br>";

        /*  echo "Gender: "               .  $basicinfo['gender'] . "<br />";
          echo "Nationality: "          .  $basicinfo['nationality'] . "<br />";
          echo "Ocuppation: "           .  $basicinfo['occupation'] . "<br />"; */
    }

    function printEditDetails() {
        echo"<form id='form' class='blocks' action='dbQuery.php' method='POST' >";
        echo"<p><label>First Name:</label><input class='text' type='text' name='first_name' value='" . $this->firstname . "'/></p>";
        echo"<p><Label>Last Name:</label><input class='text' type='text' name='last_name' value='" . $this->lastname . "'/></p>";
        echo"<p><Label>Gender:</label><input class='text' type='text' name='gender' value='" . $this->gender . "'/></p>";
        echo"<p><Label>Nationality:</label><input class='text' type='text' name='nationality' value='" . $this->nationality . "'/></p>";
        echo"<p><Label>Adress Line 1:</label><input class='text' type='text' name='address_line1' value='" . $this->address1 . "'/></p>";
        echo"<p><Label>Adress Line 2:</label><input class='text' type='text' name='address_line2' value='" . $this->address2 . "'/></p>";
        echo"<p><Label>Adress Line 3:</label><input class='text' type='text' name='address_line3' value='" . $this->address3 . "'/></p>";
        echo"<p><p><p><Label>Company email:</label><input class='text' type='text' name='company_email_address' value='" . $this->company_email . "'/></p>";
        echo"<p><Label>Personal email:</label><input class='text' type='text' name='personal_email_address' value='" . $this->personal_email . "'/></p>";
        echo"<p><Label>Contact:</label><input class='text' type='text' name='contact_no1' value='" . $this->contact . "'/><br/>";
         echo"<p><Label>&nbsp</Label><input type='submit' class='btn' value='update record'/></p>";
        echo"</form>";
        //echo EditAdmininfo($connect);
    }

}

class Member {

    public $firstname;
    public $lastname;
    public $gender;
    public $nationality;
    public $address1;
    public $occupation;
    public $recordid;

    function __construct($row) {
        $this->recordid = $row['record_id']; //From dbMember.php
        $this->firstname = $row['first_name'];
        $this->lastname = $row['last_name'];
        $this->address1 = $row['address_line1'];
        $this->gender = $row['gender'];
        $this->nationality = $row['nationality'];
        $this->occupation = $row['occupation'];
        $this->address_line1 = $row['address_line1'];
        $this->address_line2 = $row['address_line2'];
        $this->address_line3 = $row['address_line3'];
        $this->email_address_1 = $row['email_address_1'];
        $this->email_address_2 = $row['email_address_2'];
        $this->contact_no1 = $row['contact_no1'];
        $this->contact_no2 = $row['contact_no2'];
        $this->date_of_birth = $row['date_of_birth'];
    }

    function editMemberDetails() {

        echo" <form id='form' class='blocks' action='handleMemberEdit.php' method='POST'>";
        echo"<input class='EditField' type='hidden' name='record_id' value='" . $this->recordid . "'/><br/>";
        echo"<p><Label>First Name:</Label><input class='text' type='text' name='first_name' value='" . $this->firstname . "'/></p><br/>";
        echo"<p><Label>Last Name:</Label><input class='text' type='text' name='last_name' value='" . $this->lastname . "'/></p><br/>";
        echo"<p><Label>Gender:</Label><input class='text' type='text' name='gender' value='" . $this->gender . "'/></p><br/>";
        echo"<p><Label>Nationality:</Label><input class='text' type='text' name='nationality' value='" . $this->nationality . "'/></p><br/>";
        echo"<p><Label>Occupation:</Label><input class='text' type='text' name='occupation' value='" . $this->occupation . "'/></p><br/>";
        echo"<p><Label>Address 1:</Label><input class='text' type='text' name='address_line1' value='" . $this->address_line1 . "'/></p><br/>";
        echo"<p><Label>Address 2:</Label><input class='text' type='text' name='address_line2' value='" . $this->address_line2 . "'/></p><br/>";
        echo"<p><Label>Address 3:</Label><input class='text' type='text' name='address_line3' value='" . $this->address_line3 . "'/></p><br/>";
        echo"<p><Label>Email 1:</Label><input class='text' type='text' name='email_address_1' value='" . $this->email_address_1 . "'/></p><br/>";
        echo"<p><Label>Email 2:</Label><input class='text' type='text' name='email_address_2' value='" . $this->email_address_2 . "'/></p><br/>";
        echo"<p><Label>Contact No 1:</Label><input class='text' type='text' name='contact_no1' value='" . $this->contact_no1 . "'/></p><br/>";
        echo"<p><Label>Contact No 2:</Label><input class='text' type='text' name='contact_no2' value='" . $this->contact_no2 . "'/></p><br/>";
        echo"<p><Label>Date Of Birth:</Label><input class='text' type='date' name='date_of_birth' value='" .  $this->date_of_birth . "'/></p><br/>";
        echo"<p><Label>&nbsp</Label><input type='submit' class='btn' value='update record'/></p>";
        echo"</form>";
    }

    function printMemberDetails() {

        //  $Memberbasic = $_SESSION['basicinfo'];
        echo "Name: " . $this->firstname . " " . $this->lastname . "<br />";
        echo "Gender: " . $this->gender . "<br />";
        echo "Nationality: " . $this->nationality . "<br />";
        echo "Ocuppation: " . $this->occupation . "<br />";
        echo "Address 1: " . $this->address1 . "<br />";
        echo "<br>";
    }

}
?>
