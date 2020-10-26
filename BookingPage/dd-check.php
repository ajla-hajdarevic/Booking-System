<?php

session_start();
include ('konekcija.php');
$login_session2 = $_SESSION['user_id'];



$dbo = Connect();

$BR = "<br>";
$nullnull = ":00";
$totalDuration = 0;
$totalPrice = 0;
$selectedServices = array();

// function totalDuration_to_time($TD){
//   $hours = floor($TD/60);
//   $minutes = $TD % 60;
//   return str_pad( "PT" . $hours, 2, "0", STR_PAD_LEFT) . "H" . str_pad($minutes, 2, "0", STR_PAD_LEFT) . "M";
// }
?>

<!DOCTYPE html>

<html>

<body>
      <?php
      $cat_R1=$_POST['cat'];
      $subcat_R1=$_POST['subcat'];
      $employee_R1=$_POST['employee'];
      $selectedDate_R1=$_POST['selectDate'];
      $selectedTime_R1=$_POST['selectTime'];

      $durationQueryR1 = "SELECT duration FROM services WHERE id = '$subcat_R1' ";
      $resultDurationR1 = $dbo->query($durationQueryR1);
      if ($row = $resultDurationR1->fetch_assoc()) {
        $durationR1 = $row['duration']; //if selection of multiple services works then this can be changed into an array with while (as opposed to if)
      }
      // echo "1st service duration: ";
      // echo $durationR1.$BR;
      $totalDuration += $durationR1;
      // echo "Total Duration 1: ";
      // echo $totalDuration.$BR;

      $priceQueryR1 = "SELECT price FROM services WHERE id = '$subcat_R1'";
      $resultPriceR1 = $dbo->query($priceQueryR1);
      if ($row = $resultPriceR1->fetch_assoc()) {
        $priceR1 = $row['price'];  //if selection of multiple services works then this can be changed into an array with while (as opposed to if)
      }
      $totalPrice += $priceR1;
      // echo "1st service price: ";
      // echo $priceR1;
      // $totalPrice = $priceR1;
      // echo "Total Price 2: ";
      // echo $totalPrice.$BR;
      array_push($selectedServices, $subcat_R1);


      //2nd service
      if (isset($_POST['cat2']) && !empty($_POST['subcat2'])) {
        $cat_R2=$_POST['cat2'];
        $subcat_R2=$_POST['subcat2'];
        $queryCatR2Duration = "SELECT duration FROM services WHERE id = '$subcat_R2' ";
        $resultDurationR2 = $dbo->query($queryCatR2Duration);
        $queryCatR2Price = "SELECT price FROM services where id = '$subcat_R2' ";
        $resultPriceR2 = $dbo->query($queryCatR2Price);

        if ($row = $resultDurationR2->fetch_assoc()) {
          $durationSubCat2 = $row['duration'];
        }
        if ($row = $resultPriceR2->fetch_assoc()){
          $priceSubCat2 = $row['price'];
        }
        // echo $durationSubCat2.$BR;
        // echo $priceSubCat2.$BR;

        $totalPrice = $totalPrice + $priceSubCat2;
        $totalDuration += $durationSubCat2;
        // echo "Total price 2: ";
        // echo $totalPrice.$BR;
        // echo "Total duration 2; ";
        // echo $totalDuration.$BR;
        array_push($selectedServices, $subcat_R2);

      }
      //3rd service
      if ($_POST['cat3'] && !empty($_POST['subcat3'])) {
        $cat_R3=$_POST['cat3'];
        $subcat_R3=$_POST['subcat3'];
        $queryCatR3Duration = "SELECT duration FROM services WHERE id = '$subcat_R3' ";
        $resultDurationR3 = $dbo->query($queryCatR3Duration);
        $queryCatR3Price = "SELECT price FROM services where id = '$subcat_R3' ";
        $resultPriceR3 = $dbo->query($queryCatR3Price);

        if ($row = $resultDurationR3->fetch_assoc()) {
          $durationSubCat3 = $row['duration'];
        }
        if ($row = $resultPriceR3->fetch_assoc()){
          $priceSubCat3 = $row['price'];
        }
        // echo $durationSubCat3.$BR;
        // echo $priceSubCat3.$BR;

        $totalPrice += $priceSubCat3;
        $totalDuration += $durationSubCat3;
        // echo "Total price 3: ";
        // echo $totalPrice.$BR;
        // echo "Total duration 3: ";
        // echo $totalDuration.$BR;
        array_push($selectedServices, $subcat_R3);
      }

      echo $totalPrice.$BR;
      echo $totalDuration.$BR;

      // $bookingTime = $selectedTime_R1.$nullnull;
      // $totalDurationSeconds = $totalDuration*60;

      echo "hey im at the endtime".$BR;
      // $timeToAddFinal = totalDuration_to_time($totalDuration);
      // $totalDurationInsert =
      // $endTimeInsert = new DateTime ($selectedTime_R1);
      // $endTimeInsert -> add(new DateInterval($timeToAddFinal));
    //  echo date('H:i:s',$endTime);

      // $totalDurationConverted = gmdate("H:i:s", $totalDuration*60);
      // echo $totalDurationConverted.$BR;
      // $endTime = strtotime("+$totalDurationSeconds seconds", strtotime($bookingTime));
      // $endTimeInsert = date('H:i:s',$endTime);
       $totalDurationInsert = $totalDuration*60;
      // echo $endTimeInsert.$BR;


      // echo $totalDurationInsert.$BR;
      // echo $endTime." ".$endTimeInsert;



      $query = "INSERT INTO appointments(employee, client, date, start_time, end_time, total_duration, total_price)
                VALUES('$employee_R1','$login_session2','$selectedDate_R1','$selectedTime_R1',ADDTIME('$selectedTime_R1',SEC_TO_TIME('$totalDurationInsert')),SEC_TO_TIME('$totalDurationInsert'),'$totalPrice')";

      if(mysqli_query($dbo, $query)){
      echo "Records added successfully for 1st query";
      } else {
      echo "ERROR: Could not execute $query. " . mysqli_error($dbo);
      }
      echo $BR.$BR;

      $queryAppointment  = "SELECT id FROM appointments WHERE employee='$employee_R1' AND client='$login_session2' AND date='$selectedDate_R1' AND start_time='$selectedTime_R1' ";
      $result = $dbo->query($queryAppointment);
      if ($row1 = $result->fetch_assoc()) {
        $id = $row1['id'];
      }
       echo $id;

      for ($i=0 ; $i < count($selectedServices) ; $i++ ) {
          $arraySelectValue = $selectedServices[$i];

          $insertQueryChoosenServices = "INSERT INTO choosen_services(appointment, service) VALUES('$id','$arraySelectValue')";
          if (mysqli_query($dbo, $insertQueryChoosenServices)) {
            echo "Records added succesfully for ($i+1) query";
          } else {
            echo "ERROR: Could not execute $insertQuery." . mysqli_error($dbo);
          }
      }

      // $insertIntoAppointment1 = "INSERT INTO choosen_services(Appointment, Service)
      //                 VALUES('$id','$id')";
      //
      // //need conditional insert values for if the second and third row have been added...
      //
      // if (mysqli_query($dbo, $insertQuery2)) {
      //   echo "Records added succesffuly for 2nd query";
      // } else {
      //   echo "ERROR: Coult not exceute $insertQuery2. " . mysqli_error($dbo);
      // }


      ?>

</body>

</html>
