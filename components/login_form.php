<form action="controller.php" method="post">
<div class="form-group">
  <label for="usuario">Usuario</label>
  <input type="text"
    class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="">
  <small id="helpId" class="form-text text-muted">Help text</small>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="">
  </div>
  <button type="submit" class="btn btn-primary" value="entrar">Entrar</button>
</div>
</form>