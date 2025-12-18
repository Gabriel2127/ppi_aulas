<?php
require_once __DIR__ . '/../protect.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<h2>Bem-vindo, <?php echo $_SESSION['nome'] ?? 'usuário'; ?></h2>

<form action="index.php?action=criar" method="POST">
    <input type="text" name="descricao" placeholder="Nova tarefa" required>
    <button>Adicionar</button>
</form>

<ul>
<?php if (!empty($tarefas)): ?>
    <?php foreach ($tarefas as $tarefa): ?>
        <li>
            <?php echo $tarefa['descricao']; ?>
            <a href="index.php?action=editar&id=<?php echo $tarefa['id']; ?>">Editar</a>
            <a href="index.php?action=excluir&id=<?php echo $tarefa['id']; ?>">Excluir</a>
            <form action="index.php?action=criar" method="POST">

        </li>
    <?php endforeach; ?>
<?php else: ?>
    <li>Nenhuma tarefa cadastrada</li>
<?php endif; ?>
</ul>

<a href="index.php?action=logout">Sair</a>