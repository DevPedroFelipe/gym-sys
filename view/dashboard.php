<?php

use src\RepositorioCliente;

require_once 'src/RepositorioCliente.php';

$RC = new RepositorioCliente();

$arrayRetorno = $RC->quantidadeCategoria();

$json = json_encode($arrayRetorno);

?>
<!-- Container do gráfico -->
<div class="container">
    <div class="container-fluid padding w-100 h-75 p-3">
        <div class="container d-flex justify-container-center">
            <div class="w-100 h-100" id="piechart3d"></div>
        </div>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <!-- JavaScript -->
        <script src="js/script.js"></script>
    </div>
</div>
   
<script>
  
let array = <?= $json ?>;

carregarGrafico(array);
       
</script>