<?php
  if (isset($_POST['submit'])) {
    // code...
    $customer_name = $_POST["customerName"];
    $nationality = $_POST["nationality"];
    $customer_number = $_POST["customerNumber"];
    $server_class = $_POST["serverClass"];
    $server_type = $_POST["serverType"];
    //$total = $_POST["total"];
    $payment_type = $_POST["paymentType"];
    $rent_duration = $_POST["rentDuration"];
    
    // Calculate Total
    if ($server_class == "Regular")
    {
      if ($server_type == "R_A1") 
      {
        $total = 15000;
      }
      if ($server_type == "R_A2") 
      {
        $total = 25000;
      }
    }
    else if ($server_class == "Premium")
    {
      if ($server_type == "P_B1") 
      {
        $total = 35000;
      }
      if ($server_type == "P_B2") 
      {
        $total = 45000;
      }
    }
    else if ($server_class == "dedicated_Regular")
    {
      $total = 55000;
    }
    else if ($server_class == "dedicated_Premium")
    {
      $total = 65000;
    }

    if ($rent_duration == "rentDuration_monthly")
    {
      $rent_duration = "1 Month";
    }
    // Calculate Rent Duration
    else if ($rent_duration == "rentDuration_quarterly")
    {
      $rent_duration = "3 Months";
      $total = ($total * 3);
      $discount = $total * 0.1;
    }
    else if ($rent_duration == "rentDuration_semiannual")
    {
      $rent_duration = "6 Months";
      $total = ($total * 6);
      $discount = $total * 0.2;
    }
    else if ($rent_duration == "rentDuration_annually")
    {
      $rent_duration = "12 Months";
      $total = ($total * 12);
      $discount = $total * 0.3;
    }

    $total = $total - $discount;
    // var_dump($_POST);

    $result = [
      'customerName' => $customer_name,
      'customerNumber' => $customer_number,
      'nationality' => $nationality,
      'serverClass' => $server_class,
      'serverType' => $server_type,
      'rentDuration' => $rent_duration,
      'paymentType' => $payment_type,
      'total' => $total
    ];
    $result = json_encode($result);
    print_r($result);
  }