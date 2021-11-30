<div class="container">
    <h2>Actualizar publication</h2>
    <form action="publicacion/edit" method="post">
    <div class="form-group">
        <input type="hidden" name="id" value="<?=$post['id']?>">
        <textarea class="form-control" name="content" id="" rows="2" placeholder="Escribe algo"><?=post['content']?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
</div>