<header id="header_login_register">
    <div id="div_logo">
        <?php  
        if ($page == 'register'):  
            echo'<img id="logoAquaData" src="../img/logoAquaData_hd.png" alt="Aqua Data logo">';
        elseif ($page == 'login_register'):
            echo'<img id="logoAquaData" src="./img/logoAquaData_hd.png" alt="Aqua Data logo">';
        endif
          ?>
        <p id="title_logo">AquaData</p>
    </div>
</header>
