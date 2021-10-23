<?php session_start();
    if ( empty( $_SESSION['avatar'] ) ) { $avatar = '../dist/img/user.png'; } else { $avatar = $_SESSION['avatar']; }
    $dni        = $_SESSION['dni'];
    $firstName  = $_SESSION['firstName'];
    $lastName   = $_SESSION['lastName'];
    $email      = $_SESSION['email'];
    $phone      = $_SESSION['phone'];
    $address    = $_SESSION['address'];
    $superPower = $_SESSION['superPower'];
?>

<section class="container">
    <div class="row mt-5">
        <div class="col-1"></div>
        <div class="card col-10">
            <div class="row">
                <div class="col-4">
                    <img src="<?php echo $avatar; ?>" class="img-fluid rounded-start" alt="Profile Avatar">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h5 class="card-title">Good day, <?php echo $firstName; ?>!</h5>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Balance of the last 7 days</h2>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            <canvas id="balanceDashboard" width="100%"></canvas>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <h2>Balance of the last 7 days</h2>
        </div>
    </div>
    <div class="row mt-4">
        <div class="card col-4">
            <img src="/dist/img/icoUser.png" alt="icoUser">
            <div class="card-body">
                <h5 class="card-title">Account</h5>
            </div>
        </div>
        <div class="card col-4">
            <img src="/dist/img/icoHistory.png" alt="icoHistory">
            <div class="card-body">
                <h5 class="card-title">Historial</h5>
            </div>
        </div>
        <div class="card col-4">
            <img src="/dist/img/icoQr.png" alt="icoQr">
            <div class="card-body">
                <h5 class="card-title">My QR</h5>
            </div>
        </div>
    </div>
</section>