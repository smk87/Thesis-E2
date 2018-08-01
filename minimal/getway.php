<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_4Alq5p8SboKfJLfzfRobghF7');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>

<head>
<link rel="stylesheet" href="https://unpkg.com/purecss@1.0.0/build/pure-min.css" integrity="sha384-nn4HPE8lTHyVtfCBi5yW9d20FjT8BJwUXyWZT9InLYax14RDjBj46LmSztkmNP9w" crossorigin="anonymous">
<style>
    form { 
        margin:0 auto;width:35%;text-align:left;
}
}
</style>
</head>

<?php

$billtype= $_POST['billtype'];
$billamt=$_POST['billamt'];
$bill_id=$_POST['bill_id'];
$billinfo=$_POST['billinfo'];


?>

<body background="visa.jpg">
<h1>Making Transaction...</h1>
<h1>Enter your payment details below.</h1>

<!-- display errors returned by createToken -->
<span class="payment-errors"></span>

<!-- stripe payment form -->
<form class="pure-form-aligned" action="submit.php" method="POST" id="paymentFrm">
    <div class="pure-control-group">
        <label>Name</label>
        <input type="text" name="name" size="20" />
</div>
    <div class="pure-control-group">
        <label>ID</label>
        <input type="text" name="std_id" size="20" required />
</div>
    <div class="pure-control-group">
        <label>Email</label>
        <input type="text" name="email" size="20" />
</div>
    <div class="pure-control-group">
        <label>Card Number</label>
        <input type="text" name="card_num" size="20" autocomplete="off" class="card-number" />
</div>
    <div class="pure-control-group">
        <label>CVC</label>
        <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc" />
</div>
    <div class="pure-control-group">
        <label>Expiration (MM/YYYY)</label>
        <input type="text" name="exp_month" size="2" class="card-expiry-month"/>
        <span> / </span>
        <input type="text" name="exp_year" size="4" class="card-expiry-year"/>
</div>
        
        <input type="hidden" name="billtype" value="<?php echo $billtype ?>">
        <input type="hidden" name="billamt" value="<?php echo $billamt ?>">
        <input type="hidden" name="bill_id" value="<?php echo $bill_id ?>">
        <input type="hidden" name="billinfo" value="<?php echo $billinfo ?>">
        

    <div class="pure-controls">       

            <button type="submit" class="pure-button pure-button-primary">Submit</button>
        </div>
</form>
</body>