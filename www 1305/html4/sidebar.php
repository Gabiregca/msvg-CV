<ul class="sidebar">
    <?php
    if ($cargo == 'Admin') {
        ?>
        <li class="item" onclick="openModal('micuenta');">
            <a href="#">Mi cuenta</a>
        </li>
        <li class="item"  onclick="openModal('users');">
            <a href="#">Ver usuarios</a> 
        </li>
        <li class="item" onclick="openModal('module');">
            <a href="#">Dispositivos</a> 
        </li>
        <!--span class="icon-"></span-->
        <li class="item">
            <a href="#">Reportes</a> 
        </li>
        
        <?php
    }
    if ($cargo == 'PS') {
        ?>
        <li class="item" onclick="openModal('micuenta');">
            <a href="#">Mi cuenta</a> 
        </li>
        <li class="item" onclick="openModal('ListaPacientes');">
            <a href="#">Pacientes</a> 
         </li>
         <li class="item" onclick="openModal('ListaPacientes2');">
            <a href="#">Monitoreo signos vitales</a> 
         </li>
         <li class="item" onclick="openModal('module');">
            <a href="#">Medicamentos</a> 
        </li>
        <li class="item">
            <a href="#">Reportes</a> 
         </li>
         <li class="item" onclick="openModal('module');">
            <a href="#">Fallas en dispositivos</a> 
         </li>
        <?php
    }
    ?>
</ul>

