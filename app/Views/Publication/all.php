<?php setlocale(LC_TIME, "esp"); //esto coloca las fechas en español?>
<div class="container">
    <?php
    if(isset(session()->user)) {
        ?>
        <form action="Post/add" method="post">
            <div class="form-group">
                <textarea  classs="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Publicar</button>
        </form>
        <br>
        <?php
    } ?>

    <form action="publication/add" method="post">
        <div class="form-group">
            <textarea  class="form-control" name="content" rows="3" placeholder="Escribe algo"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
</form>
<br>
<?php foreach ($posts as $item): //estos son los datos enviados desde el controlador?>
        <div class="card bg-light mb-3">
            <div class="card-body">
            <strong><?= $item['name']; ?>/strong>
            <small><?= strftime("%A, %d de %B de %Y %I:%M", strtotime($item['posted_time'])); ?>
            </small>
            <p class="card-text"><?= $item['content']; ?></p>
            <!-- se anade los botones para editar y borrar -->
            <a class="btn btn-primary" href="publication/edit/<?=$item['id']?>" role="button">Editar</a>
            <a class="btn btn-danger" href="publication/delete/<?=$item['id']?>" role="button">Borrar</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>


