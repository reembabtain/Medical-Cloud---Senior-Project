<?php 
namespace Tests\Unit; 
use PHPUnit\Framework\TestCase;
 
class patient_side_testing extends TestCase
{ 

    /** @test */
    // UNIT TESTING
public function test_connection()
{
    $servername = "localhost";
    $useername = "root";
    $password = "Fcit@2022";
    $dbname = "MedicalCloud";
    $conn = mysqli_connect($servername, $useername, $password, $dbname);
    $this-> assertNotNull($conn);

    return $conn;
}


  /** @test */
  // UNIT TESTING
  public function test_signin_Patient()
  {
      $conn= $this-> test_connection();
      $id = "1010011397";
      $pass="zzxxcc2014843";
      $query1 = "SELECT * FROM First_Hospital where ID = '$id' and Password = '$pass' ";
      $result1 = mysqli_query($conn, $query1);
      if (mysqli_num_rows($result1) === 1) {
          while ($row = mysqli_fetch_assoc($result1)) {
              $resultId = $row['ID'];
              $resultPass= $row['Password'];
          }
      }  
  
      $this->assertEquals($id, $resultId);
      return $resultId;
  }



  /** @test */
  // INTEGRATION TESTING
  public function test_check_Patient_data()
  {
      $conn= $this-> test_connection();
      $id = $this-> test_signin_Patient();
      $pass="zzxxcc2014843";
      $first_name= "Kathleen";
      $last_name="Judy";
      $query1 = "SELECT * FROM First_Hospital where ID = '$id' and Password = '$pass' ";
      $result1 = mysqli_query($conn, $query1);
      if (mysqli_num_rows($result1) === 1) {
          while ($row = mysqli_fetch_assoc($result1)) {
              $resultFname = $row['First_name'];
              $resultLname= $row['Last_name'];
          }
      }  
  
      $this->assertEquals($first_name, $resultFname);
  }

}

