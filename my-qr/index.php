<!doctype html>
<html lang="en">
    <!-- Head -->
    <?php require_once('../dist/requireHead.php'); ?>

    <body class="bgAzul">
        <!-- Navbar -->
        <nav class="mt-3">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="/dist/img/menuWhite.png" width="70%" alt="icoMenu" id="icoMenu">
                    </div>
                </div>
            </div>
        </nav>

        <aside id="menu"></aside>
        
        <!-- My QR -->
        <?php require_once('../layouts/my-qr.php'); ?>
        
        <!-- Bootstrap Bundle with Popper -->
        <?php require_once('../dist/requireFooter.php'); ?>
    </body>
</html>