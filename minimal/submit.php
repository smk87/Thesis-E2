
<?php

//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    $std_id = $_POST['std_id'];
    $billtype = $_POST['billtype'];
    $billamt = $_POST['billamt'];
    $bill_id = $_POST['bill_id'];
    $billinfo=$_POST['billinfo'];
    
    
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_ioKtzMVcf0aOz0jUbI9uLdZp",
      "publishable_key" => "pk_test_4Alq5p8SboKfJLfzfRobghF7"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    
    //item information
    $itemName = $billtype;
    $itemNumber = $billinfo;
    $itemPrice = $billamt;
    $currency = "usd";
    $orderID = "SKA92712382139";
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
            'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date = date("Y-m-d H:i:s");
        
        //include database config file
        include_once 'dbConfig.php';
        
        //insert tansaction data into the database
        $sql = "INSERT INTO orders(name,std_id,bill_id,email,card_num,card_cvc,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$std_id."','$bill_id','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$amount."','".$currency."','".$balance_transaction."','".$status."','".$date."','".$date."')";
        $insert = $db->query($sql);
        $last_insert_id = $db->insert_id;
        
        //if order inserted successfully
        if($last_insert_id && $status == 'succeeded'){

            $sql2 = "UPDATE bill SET bill_sts='Paid' WHERE bill_id='$bill_id'";
                
            if ($db->query($sql2) === true) {
            $statusMsg = "<h2>The transaction was successful.</h2><h4>Order ID: {$last_insert_id}</h4>";
            }
        }else{
            $statusMsg = "Transaction has been failed";
        }
    }else{
        $statusMsg = "Transaction has been failed";
    }
}else{
    $statusMsg = "Form submission error.......";
}

//show success or error message
echo $statusMsg;


$q="SELECT orders.created,bill_type FROM orders Natural JOIN bill WHERE orders.bill_id='$bill_id' AND orders.created>bill.bill_duedate";
$r=mysqli_query($db,$q);

while($row=mysqli_fetch_array($r)){
    
    if ($row['created']) {
        
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "th";
        
        // Create connection again
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        if($row['bill_type']=='Fine'){
            $sql = "UPDATE student SET latefine=latefine+1 WHERE std_id='$std_id'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        if($row['bill_type']=='Tuition'){
            $sql = "UPDATE student SET latetuition=latetuition+1 WHERE std_id='$std_id'";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        $conn->close();

    }
}


//Set Refresh header using PHP.

if($billtype=="Tuition"){
    header( "refresh:5;url=tf.php" );
}
if($billtype=="Fine"){
    header( "refresh:5;url=fine.php" );
}
if($billtype=="Hall Bill"){
    header( "refresh:5;url=hb.php" );
}
if($billtype=="Mess Bill"){
    header( "refresh:5;url=mb.php" );
}

?>
<h1>This page will redirect in 5 seconds...</h1>