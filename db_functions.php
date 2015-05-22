<?php
 
class DB_Functions {
 
    private $db;
 
    //put your code here
    // constructor
    function __construct() {
        include_once './db_connect.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
 
    // destructor
    function __destruct() {
 
    }
 
    /**
     * Storing new user
     * returns user details
     */
    public function storeBusiness($businessid,$businessname,$businessaddress,$businesscity,$businessstate,$businesscountry,$businessphone,$businesscontact,$businesscatalog,$surveyorphone) {
        // Insert user into database
        $result = mysql_query("INSERT INTO business VALUES($businessid,'$businessname','$businessaddress','$businesscity','$businessstate','$businesscountry','$businessphone','$businesscontact','$businesscatalog','$surveyorphone')");
 
        if ($result) {
            return true;
        } else {
            if( mysql_errno() == 1062) {
                // Duplicate key - Primary Key Violation
                return true;
            } else {
                // For other errors
                return false;
            }            
        }
    }
     /**
     * Getting all users
     */
    public function getAllBusinesses() {
        $result = mysql_query("select * FROM business");
        return $result;
    }
}
 
?>

