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
    <div class="row">
        <div class="card col-12">
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
    </div>
</section>