<?php
class Contact{
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact_us";
    public $mysqli;
    public function __construct() 
    {
        return $this->mysqli=new mysqli($this->host, $this->user, $this->pass, $this->db);
    }
    public function contact($data)
    {
        $fname=$data['name'];
        $lname=$data['surname'];
        $email=$data['email'];
        $phone=$data['phone'];
        $message=$data['message'];
        $q="insert into contact set first_name='$fname', last_name='$lname', email='$email', phone='$phone', message='$message'";
       $data= $this->mysqli->query($q);
       if($data==true)
       {
           $body="One message received from User contact_us us. details are below..<br> first_name='$fname', last_name='$lname', email='$email', phone='$phone', message='$message'";
           return true;
       }
    }
}
?>
