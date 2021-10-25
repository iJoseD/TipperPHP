<?php session_start();
    if ( empty( $_SESSION['avatar'] ) ) { $avatar = '../dist/img/user.png'; } else { $avatar = $_SESSION['avatar']; }
    $phone      = $_SESSION['phone'];
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
                        <h5 class="card-title text--blue">Good day, <?php echo $_SESSION['firstName']; ?>!</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row mt-3">
        <div class="col-12 text-center">
            <h2 class="text--blue">Transactions</h2>
        </div>
    </div>
</section>