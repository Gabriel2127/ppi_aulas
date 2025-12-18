<h2>Editar tarefa</h2>

<form action="index.php?action=atualizar" method="POST">
    <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>">
    <input type="text" name="descricao" value="<?php echo $tarefa['descricao']; ?>">
    <button>Salvar</button>
</form>