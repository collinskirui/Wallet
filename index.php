<?php
//load the vendor file
require_once 'vendor/autoload.php';

use IntaSend\IntaSendPHP\Wallet;

$credentials = [
    'token'=>'<ISSecretKey_test_a06bbb14-e55b-47be-b1d4-d72094bd488a>',
    //'token'=>'<YOUR-TOKEN-HERE>',
    'publishable_key'=>'<ISPubKey_test_1c0fba3d-b962-4465-b045-ab2963abdcfb>',
    //'publishable_key'=>'<YOUR-PUBLISHABLE_KEY-HERE>',
    'test'=>true,
];

$wallet = new Wallet();
$wallet->init($credentials)
  
$response = $wallet->retrieve();

//print_r($response);

$kes_wallet = null;

foreach($response->results as $result){
    if($result->currency === "KES"){
        $kes_wallet = $result;
        break;
    }
}

if($kes_wallet !==null){
    $wallet_id = $kes_wallet->wallet_id;
    $label = $kes_wallet->label;
    $can_disburse = $kes_wallet->can_disburse;
    $currency = $kes_wallet->currency;
    $wallet_type = $kes_wallet->wallet_type;
    $current_balance =$kes_wallet->current_balance;
    $available_balance=$kes_wallet->available_balance;
    $updated_at = $kes_wallet->updated_at;


echo "Wallet ID:" . $wallet_id . "\n";
echo "Label:" . $label . "\n";
echo "Can Disburse:" . $can_disburse . "\n";
echo "Currency:" . $currency . "\n";
echo "Wallet Type:" . $wallet_type . "\n";
echo "Current Balance:" . $current_balance . "\n";
echo "Available Balance:" . $available_balance . "\n";
echo "Updated At:" . $updated_at . "\n";    

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles.css">
    <title>Document</title>
</head>
<body>

<div class="container"> 
    <div class="payment-card">
        <h1>Welcome Joe Doe</h1>
        <p>Here is your wallet details</p>
    <div class="card">
        <h3>Wallet ID: <?php echo $wallet_id; ?> </h3>
    </div>
    <div class="card-body">
        <p>Label: <?php echo $label; ?></p>
        <h1><p>KSH: <?php echo $current_balance; ?></p></h1>
        <p>Available Balance: <?php echo $available_balance; ?></p>
        <p>Updated At: <?php echo $updated_at; ?></p>
    </div>
    </div>

</div>

</body>
</html>