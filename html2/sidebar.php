<ul class="sidebar">
    <?php
    if ($cargo == 'Admin') {
        ?>
        <li class="item" onclick="openModal('micuenta');">
            <a href="#">Mi cuenta</a>
        </li>
        <li class="item"  onclick="openModal('users');">
            <a href="#">Ver Usuarios</a> 
        </li>
        <li class="item" onclick="openModal('module');">
            <a href="#">Gadgets</a> 
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
            <a href="#">Paciente</a> 
         </li>
         <li class="item" onclick="openModal('ListaPacientes2');">
            <a href="#">Monitoreo SV</a> 
         </li>
         <li class="item" onclick="openModal('module');">
            <a href="#">Medicamento</a> 
        </li>
        <li class="item">
            <a href="#">Reportes</a> 
         </li>
         <li class="item" onclick="openModal('module');">
            <a href="#">Fallas Dispoditivo</a> 
         </li>
        <?php
    }
    ?>
</ul>

