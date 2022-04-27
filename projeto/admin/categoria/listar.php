<h3 class="text-primary" 
>Listar categoria
<a href="?p=categoria/salvar" class="btn btn-success float-right">
	Adicionar

</a>

</h3>
<div class="card shadow mt-4">
	


<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Cod.</th>
      <th scope="col">Descrição</th>
      <th scope="col">Opções</th>

    </tr>
  </thead>
  <tbody>
    <?php
    include_once '../class/Categoria.php';
    $cat = new Categoria();
    $dados = $cat->Listar();

    foreach ($dados as $mostrar ) {
    
    ?>
    <tr>
      <th scope="row"><?=$mostrar[0]?></th>
      <td>
        <?=$mostrar[1]?>
          
        </td>
      <td>
        <a class="btn btn-primary" href="?p=categoria/salvar&id=<?=$mostrar[0]?>">

              <i class="bi bi-pencil-fill"></i>
            </a>
      	
      	<a class="btn btn-danger" style="color: #fff;" data-confirm=" Excluir registro?" href="?p=categoria/excluir&id=<?=$mostrar[0]?>"><i class="bi bi-trash3"></i></a>
      
      </td>
      
    </tr>
    <?php
   }
   ?>
  </tbody>
</table>
</div>

