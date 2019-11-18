<?php
session_start();

require_once('php/vendaDao.php');    
require_once('php/venda.php');
$mdao = New vendaDAO();
$lista = $mdao->listar($_SESSION['cod_usuario']);

?>

<?php require_once('inc/inicio.php'); ?>

<br>

<h3 class="fonteg textocentro cor"><b>Minhas Vendas</b></h3>
<br>
<h5 class="cor text-center">Clique no nome do item para ver detalhes</h5>

<br>
<br>
<br>

<?php  
  foreach($lista as $p){
?>

<div style="width:100%;" class="accordion" id="accordionExample">
    <div class="card">
      <div class="card-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="<?php echo '#'.$p->get_cod(); ?>" aria-expanded="true" aria-controls="<?php echo $p->get_cod(); ?>">
          <?php echo $p->get_nome(); ?>
          </button>
          <button type="button" class="btn btn-success">Editar</button>
          <button type="button" class="btn btn-success">Excluir</button>
        </h5>
      </div>
  
      <div id="<?php echo $p->get_cod(); ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
            <table class="table text-center fontesizeV">
                <thead class="bg-warning">
                  <tr>
                    <th scope="col">Produto</th>
                    <th scope="col">Informação</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">Item</th>
                    <td> <?php echo $p->get_nome(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Quantidade</th>
                    <td> <?php echo $p->get_quantidade(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Descricao</th>
                    <td> <?php echo $p->get_descricao(); ?> </td>
                  </tr>
                  <tr>
                    <th scope="row">Preço R$</th>
                    <td> <?php echo $p->get_preco(); ?> </td>
                  </tr>
                  
                  <thead class="alert alert-warning">
                    <tr>
                      <th scope="col">Localização</th>
                      <th scope="col">Informação</th>
                    </tr>
                  </thead>
                  <tr>
                    <th class="alert alert-warning" scope="row">Cidade</th>
                    <td> <?php echo $p->get_cidade(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Bairro</th>
                    <td> <?php echo $p->get_bairro(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Local</th>
                    <td> <?php echo $p->get_rua(); ?> </td>
                  </tr>
                  <tr>
                    <th class="alert alert-warning" scope="row">Complemento</th>
                    <td> <?php echo $p->get_complemento(); ?> </td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>

<?php } ?>


<?php require_once('inc/fim.php'); ?>