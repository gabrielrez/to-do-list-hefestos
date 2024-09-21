<?= comp('header') ?>

<div class="container">
  <div class="header">
    <h1 class="title">Lista de Tarefas <span class="usuario_nome">de <?= $usuario['nome'] ?></span></h1>
    <form action="/logout" method="POST">
      <button>Sair da Conta</button>
    </form>
  </div>
  <?= comp('form', [
    'usuario_id' => $usuario['id']
  ]) ?>
  <ul class="task-list">
    <?php foreach ($tarefas as $tarefa): ?>
      <li class="task-item">
        <form class="task-form" action="/tarefas/<?= $tarefa['id'] ?>" method="POST">
          <?= form_metodo_http('delete') ?>
          <div class="task-content">
            <h3 class="task-title"><?= $tarefa['titulo'] ?></h3>
            <p class="task-description"><?= $tarefa['descricao'] ?></p>
          </div>
          <input type="hidden" name="tarefa_id" value="<?= $tarefa['id'] ?>">
          <button class="delete-button" type="button">Deletar</button>
        </form>
      </li>
    <?php endforeach; ?>
  </ul>
</div>

<?= comp('footer') ?>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const taskItems = document.querySelectorAll('.task-item');
    const container = document.querySelector('.container');

    container.style.animation = 'show-up 0.5s forwards';

    taskItems.forEach((item, index) => {
      item.style.animation = `slide-in 0.5s forwards`;
      item.style.animationDelay = `${index * 0.1}s`;
    });

    document.querySelectorAll('.delete-button').forEach(button => {
      button.addEventListener('click', function() {
        const form = this.closest('form');
        if (confirm('Tem certeza que deseja deletar esta tarefa?')) {
          form.submit();
        }
      });
    });
  });
</script>


<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    width: 100vw;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    background-color: #FEFDFC;
    color: #25221E;
    font-family: 'Poppins';
  }

  button {
    border: none;
    color: #FEFDFC;
    padding: 10px 15px;
    border-radius: 16px;
    cursor: pointer;
    transition: 0.3s ease;
  }

  .header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .header button {
    background-color: transparent;
    color: #25221E;
    font-size: 1rem;
    text-decoration: underline;
  }

  .container {
    width: 800px;
    max-height: 800px;
    padding: 20px;
    background-color: #FEFDFC;
    border: 1px solid #D7D5D4;
    border-radius: 16px;
    opacity: 0;
  }

  .title {
    font-size: 2rem;
    margin-bottom: 32px;
    color: #25221E;
  }

  .usuario_nome {
    font-size: 1rem;
    color: #6F6C6A;
  }

  .add-form {
    display: flex;
    align-items: end;
    gap: 16px;
    z-index: 2;
  }

  .task-form {
    width: 100%;
    display: flex;
    justify-content: space-between;
  }

  form input {
    padding: 12px;
    border-radius: 16px;
    background-color: #F2EFED;
    color: #25221E;
    border: none;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  .add-button {
    background-color: #487F7E;
    font-family: 'Poppins';
    font-weight: bold;
    width: 120px;
    transition: 0.2s ease-in-out;
  }

  .add-button:hover {
    scale: 0.95;
  }

  .task-list {
    list-style: none;
    padding: 0;
    padding-right: 16px;
    margin: 0;
    margin-top: 32px;
    max-height: 400px;
    overflow-y: scroll;
  }

  .task-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 16px;
    margin-bottom: 10px;
    padding: 16px;
    border: 1px solid #D7D5D4;
    transition: 0.3s ease-in-out;
    opacity: 0;
    transform: translateX(-100%);
  }

  .task-item:hover {
    border-color: #25221E;
  }

  .task-title {
    margin: 0;
    font-size: 1.25rem;
    color: #25221E;
  }

  .task-description {
    margin: 5px 0 0;
    color: #6F6C6A;
  }

  .delete-button {
    background-color: #DE4C4A;
    width: 120px;
    font-family: 'Poppins';
    font-weight: bold;
    border-radius: 20px;
    transition: 0.2s ease-in-out;
  }

  .delete-button:hover {
    scale: 0.95;
  }

  @keyframes show-up {
    from {
      opacity: 0;
      transform: translateY(80px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes slide-in {
    from {
      opacity: 0;
      transform: translateX(-100%);
    }

    to {
      opacity: 1;
      transform: translateX(0);
    }
  }
</style>