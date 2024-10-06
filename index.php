<?php
if (isset($_POST['convert'])) {
    $amount = $_POST['amount'];
    $from_currency = $_POST['from_currency'];
    $to_currency = $_POST['to_currency'];

    $api_url = "https://v6.exchangerate-api.com/v6/dc35fdb097f1d7018f21220e/latest/$from_currency";
// Replace with your API key

    $response = file_get_contents($api_url);
    $data = json_decode($response, true);

    if (isset($data['conversion_rates'][$to_currency])) {
        $rate = $data['conversion_rates'][$to_currency];
        $converted = $amount * $rate;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #171a35;
            margin: 0;
            padding: 20px;
            color: white;
        }
        .container {
            margin: auto;
            max-width: 600px;
            background: black;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(183, 180, 180, 0.924);
        }
        h1 {
            text-align: center;
            font-size: 30px;
            color: white;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="number"], select {
            margin: 10px 0;
            padding: 20px;
            border: none;
            background-color: #171a35;
            color: white;
            font-size: 18px;
            font-weight: 700;
        }
        input::placeholder{
            color: rgb(107, 109, 111);
        }
        button {
            padding: 20px;
            background-color: #171a35;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: 700;
            font-size: 18px;
        }
        button:hover {
            border: white 1px solid;
        }
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Currency Converter</h1>
        <form method="post">
            <b>Enter Amount</b>
            <input type="number" placeholder="Enter Amount" name="amount" required>
            <b>From</b>
            <select name="from_currency">
                <option value="USD">USD - United States Dollar</option>
                <option value="EUR">EUR - Euro</option>
                <option value="GBP">GBP - British Pound Sterling</option>
                <option value="JPY">JPY - Japanese Yen</option>
                <option value="AUD">AUD - Australian Dollar</option>
                <option value="CAD">CAD - Canadian Dollar</option>
                <option value="CHF">CHF - Swiss Franc</option>
                <option value="CNY">CNY - Chinese Yuan</option>
                <option value="INR">INR - Indian Rupee</option>
                <option value="PKR">PKR - Pakistani Rupee</option>
                <option value="BRL">BRL - Brazilian Real</option>
                <option value="ZAR">ZAR - South African Rand</option>
                <option value="MXN">MXN - Mexican Peso</option>
                <!-- Add more currencies as needed -->
            </select>
            <b>to</b>
            <select name="to_currency">
                <option value="PKR">PKR - Pakistani Rupee</option>
                <option value="USD">USD - United States Dollar</option>
                <option value="EUR">EUR - Euro</option>
                <option value="GBP">GBP - British Pound Sterling</option>
                <option value="JPY">JPY - Japanese Yen</option>
                <option value="AUD">AUD - Australian Dollar</option>
                <option value="CAD">CAD - Canadian Dollar</option>
                <option value="CHF">CHF - Swiss Franc</option>
                <option value="CNY">CNY - Chinese Yuan</option>
                <option value="INR">INR - Indian Rupee</option>
                <option value="BRL">BRL - Brazilian Real</option>
                <option value="ZAR">ZAR - South African Rand</option>
                <option value="MXN">MXN - Mexican Peso</option>
                <!-- Add more currencies as needed -->
            </select>
            <?php if (isset($converted)): ?>
    <h1>Currency Converted:</h1>
    <p style="font-weight: 700;"><?php echo number_format($amount, 2); ?> <?php echo $from_currency; ?> = <?php echo number_format($converted, 2); ?> <?php echo $to_currency; ?></p>
<?php endif; ?>
            <button type="submit" name="convert">Get Exchange Rate</button>
        </form>
    </div>
</body>
</html>
