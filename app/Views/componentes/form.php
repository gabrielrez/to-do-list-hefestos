<form method="POST" action="/tarefas" class="add-form">
  <div class="input">
    <label for="titulo">Título</label>
    <input type="text" name="titulo" placeholder="Título da tarefa" id="titulo" required>
  </div>
  <div class="input">
    <label for="descricao">Descrição</label>
    <input type="text" name="descricao" placeholder="Descrição da tarefa" id="descricao" required>
  </div>
  <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
  <button class="add-button" type="submit">Criar</button>
</form>