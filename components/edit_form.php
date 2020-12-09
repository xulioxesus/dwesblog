<form action="guardar.php" method="post">
    <div class="form-group">
        <label for="titulo">Título</label>
        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Escribe el título aquí"
            value="<?=$titulo?>">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" rows="20"><?=$descripcion?></textarea>
    </div>
    <button type="submit" class="btn btn-primary" name="<?=$origen?>">Guardar</button>
</form>