<?php



?>


    
<main class="form-signin w-100 m-auto text-center">
  <form action="index.php?controller=usuario&action=save" method="post">

    <h1 class="h3 mb-3 fw-normal">Creá tu usuario</h1>

    <div class="form-floating">
      <input type="text" class="form-control" placeholder="Nombre" required name="nombre">
      <label>Nombre</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control"  placeholder="Apellido" required name="apellido">
      <label>Apellido</label>
    </div>
    <div class="form-floating">
      <input type="file" class="form-control" name="avatar">
      <label>Imagen de perfil</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" required placeholder="name@example.com" name="email">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" required placeholder="Password" name="password">
      <label>Password</label>
    </div>
    <hr>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Cargar</button>
  </form>
