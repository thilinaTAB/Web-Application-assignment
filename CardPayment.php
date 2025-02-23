<?php
    session_start();
    if (! isset($_SESSION['userid'])) {
        header("location:Login.php?error=notloggedin");
        exit();
    }

    if (! isset($_GET['labpayment_id'])) {
        echo "Payment record not found.";
        exit();
    }
    $labpayment_id = intval($_GET['labpayment_id']);

    include_once 'Header.php';
?>

<div class="container">
    <div class="block text-left">
        <h1>Card Payment</h1>
        <p>Please enter your card details to proceed with the payment.</p>
        <form action="Include/CardPayment.inc.php" method="post">
            <input type="hidden" name="labpayment_id" value="<?php echo $labpayment_id; ?>">
            <div class="row">
                <div class="form-group col-lg-8">
                    <label for="card_name">Card Holder Name:</label>
                    <input type="text" id="card_name" name="card_name" class="form-control"
                        placeholder="Card Holder Name" required>
                </div>
                <div class="form-group col-lg-9">
                    <label for="card_number">Card Number:</label>
                    <input type="text" id="card_number" name="card_number" class="form-control"
                        placeholder="xxxx-xxxx-xxxx-xxxx" required>
                </div>
                <div class="form-group col-lg-2">
                    <label for="cvv">CVV:</label>
                    <input type="text" id="cvv" name="cvv" class="form-control" required>
                </div>
                <div class="form-group col-lg-2">
                    <label for="expiry">Expiry Date (MM/YY):</label>
                    <input type="" id="expiry" name="expiry" class="form-control" placeholder="(MM/YY)" required>
                </div>
            </div>
            <div class="form-group mt-3">
                <button type="submit" name="confirm_payment" class="btn btn-main btn-round-full">Confirm
                    Payment</button>
                <button type="submit" name="cancel_payment" class="btn btn-secondary btn-round-full">Cancel
                    Payment</button>
            </div>

        </form>
    </div>
</div>
</body>

</html>