<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class MedicalStaff_side_testing extends TestCase 
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
  public function test_signin_MedicalStaff()
  {
      $conn= $this-> test_connection();
      $id = "10097839";
      $pass="Sara";
      $query1 = "SELECT * FROM  MS_First_Hospital where Job_ID = '$id' and Password = '$pass' ";
      $result1 = mysqli_query($conn, $query1);
      if (mysqli_num_rows($result1) === 1) {
          while ($row = mysqli_fetch_assoc($result1)) {
              $resultId = $row['Job_ID'];
              $resultPass= $row['Password'];
          }
      } 
      $this->assertEquals($id, $resultId);
      return $resultId;
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
      $phone="+966503070439";
      $query1 = "SELECT * FROM First_Hospital where ID = '$id' and Password = '$pass' ";
      $result1 = mysqli_query($conn, $query1);
      if (mysqli_num_rows($result1) === 1) {
          while ($row = mysqli_fetch_assoc($result1)) {
              $resultphone= $row['Phone'];
          }
      } 
      $this->assertEquals($phone, $resultphone);    
  }


  /** @test */
  // INTEGRATION TESTING
 public function test_update_Patient_data()
  {
      $conn= $this-> test_connection();
      $id = $this-> test_signin_Patient(); 
      $pass="zzxxcc2014843";
      $phone="+966503070439";
      $query1 = "UPDATE First_Hospital SET ";
      $query1 .= "Phone = '$phone' ";
      $query1 .= "where ID = '$id' ";
      $result1 = mysqli_query($conn, $query1);
      $query2 = "SELECT * FROM First_Hospital where ID = '$id' and Password = '$pass' ";
      $result2 = mysqli_query($conn, $query2); 
      if (mysqli_num_rows($result2) === 1) {
          while ($row = mysqli_fetch_assoc($result2)) {
              $resultphone= $row['Phone'];    
          }
      } 
      $this->assertEquals($phone, $resultphone);
  }
}

