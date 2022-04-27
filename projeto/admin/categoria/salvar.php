
<?php
$id = filter_input(INPUT_GET, 'id');
$titulo = "Cadastrar";

if(isset($id)){
	$titulo = "Editar";
}

?>


<h3 class="text-<?= $titulo == "Cadastrar" ? "primary" : "success" ?>"><?=$titulo?> Categoria
</h3>


<div class="card shadow mt -3">
	<form method = "post" name="frmSalvar" id="frmSalvar" enctype="multpart/form-data" class="m-3">
		<div class="form-group row">
			<div class="col-sm-10">
				<label for="txtDescricao">Descrição</label>
    <input type="text" class="form-control" id="txtDescricao"  placeholder="Informe a descrição" name="txtDescricao">
  
  </div>

			</div>

			<div class="form-group row">
				<div class="col-sm-2">
					<input type="submit"name="btnSalvar"class= "btn btn-primary"value="Salvar"> </div>
					<div class="col-sm-2"> 
						<a href ="?p=categoria/listar" class="btn btn-danger">Voltar</a>
				</div>
		</div> 
	</form>
</div>
<?php
if(filter_input(INPUT_POST, 'btnSalvar')){
	include_once '../class/Categoria.php';
	$cat = new Categoria();

	$desc = filter_input(INPUT_POST, 'txtDescricao', FILTER_SANITIZE_STRING);
	$cat -> setDescricao($desc);
	?>
	<div class="alert alert-sucess mt-03" role="alert">
		<?=$cat -> salvar()?>
	</div>
	<meta http-equiv="refresh" content= "2;URL=?p=categoria/listar">
	<?php
}