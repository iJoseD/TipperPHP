<?php
    include "../library/mcript.php";
    $decryptedPhone = $desencriptar( $_GET['id'] );

    // MySQLi
    $servername = "localhost";
    $username   = "app_tipper_user";
    $password   = "Ma3h!h57";
    $dbname     = "app_tipper";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

    $sql = "SELECT * FROM userProfile WHERE phone = '$decryptedPhone'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if ( empty( $row['avatar'] ) ) { $avatar = '../dist/img/user.png'; } else { $avatar = $row['avatar']; }
            $firstName = $row['firstname'];
            $superPower = $row['superPower'];
        }
    }

    $conn->close();
?>

<section class="container">
    <div class="row mt-3">
        <div class="col-12 text-center">
            <a href="/"><img src="https://thankyoutipper.com/wp-content/uploads/2021/08/newLogo.svg" width="60%" alt="Logo ThankYou Tipper"></a>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-12 text-center">
            <img src="<?php echo $avatar; ?>" alt="Profile Avatar" width="50%">
        </div>
        <div class="col-12 mt-3 text-center">
            <p class="text--blue">I'm <?php echo $firstName; ?> and my super power is:</p>
        </div>
        <div class="col-12 text-center">
            <span class="superPower">To <?php echo $superPower; ?></span>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1 class="text--blue">Transaction</h1>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <h6 class="text--blue">Select an amount</h6>
        </div>
        <div class="col-3 mt-2">
            <div class="card-custom" id="amount-5">
                <div class="overlay" data-amount="5"></div>
                <span class="amount">5</span>
                <span class="symbol">$</span>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card-custom" id="amount-10">
                <div class="overlay" data-amount="10"></div>
                <span class="amount">10</span>
                <span class="symbol">$</span>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card-custom" id="amount-20">
                <div class="overlay" data-amount="20"></div>
                <span class="amount">20</span>
                <span class="symbol">$</span>
            </div>
        </div>
        <div class="col-3 mt-2">
            <div class="card-custom" id="amount-30">
                <div class="overlay" data-amount="30"></div>
                <span class="amount">30</span>
                <span class="symbol">$</span>
            </div>
        </div>
        <div class="form-floating col-12 hide">
            <input type="text" class="form-control" id="amount">
            <label for="amount">Amount</label>
        </div>
    </div>
</section>