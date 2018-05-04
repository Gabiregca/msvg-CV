<nav>

    <ul class="nav">

        <li id="cargo">
        <?php
        if ($cargo == 'Admin') {
        ?>
           <a href="#"><?= strtoupper($_SESSION['cargo']); ?></a> 
              
        <?php
        }else{
        ?>
            <a href="#"><?= strtoupper($_SESSION['rol']); ?></a>
            <?php
        }
        ?>
        </li>
        <li id="desplegar">

            <a href="#" class="icon-desplegar"><?= $_SESSION['minNom']; ?> <?= $_SESSION['minApe']; ?></a>

            <ul class="subnav">

                <li onclick="logout();"><a href="#">Salir</a></li>

            </ul>

        </li>

    </ul>

</nav>