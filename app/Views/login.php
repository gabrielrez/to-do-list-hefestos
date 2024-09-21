<?= comp('header') ?>

<form action="/login" method="POST" class="container">
  <h2>Fazer Login</h2>
  <div class="input-box">
    <label for="email">Email</label>
    <input type="email" name="email" required id="email_input" placeholder="email@email.com">
  </div>
  <div class="input-box">
    <label for="password">Senha</label>
    <input type="password" name="password" required id="password_input" placeholder="********">
  </div>
  <button class="login-btn">Fazer Login</button>
  <a href="/register" class="link-register">Criar Conta</a>
</form>

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

  .container {
    width: 450px;
    max-height: 800px;
    padding: 20px;
    background-color: #FEFDFC;
    border: 1px solid #D7D5D4;
    border-radius: 16px;
  }

  form input {
    padding: 12px;
    border-radius: 8px;
    background-color: #F2EFED;
    color: #25221E;
    border: none;
    width: 100%;
  }

  .input-box {
    margin-top: 8px;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  .login-btn {
    background-color: #487F7E;
    color: #FEFDFC;
    font-family: 'Poppins';
    font-size: 1rem;
    font-weight: bold;
    border-radius: 8px;
    border: none;
    padding: 12px;
    margin-top: 32px;
    width: 100%;
    transition: 0.2s ease-in-out;
    cursor: pointer;
  }

  .login-btn:hover {
    scale: 0.97;
  }

  .link-register {
    display: block;
    margin-top: 16px;
    font-size: 1rem;
    text-align: center;
    color: #25221E;
  }
</style>