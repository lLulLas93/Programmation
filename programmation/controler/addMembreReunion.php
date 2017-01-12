<?php
include('./view/head.html');

if(isset($_POST['participant']) && empty($_POST['reunion']) ){
    include('./view/nav_bar_co.html');
    include('./view/addMembreReunion.html');
    include('./view/addMembreReunionOk.html');
    include('./view/footer.html');
} else{
    include('./view/addMembreReunion.html');
}
?>