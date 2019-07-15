<table class="table table-houver">
    <thead>
    <tr>
        <th>#</th>
        <th>Páginas</th>
        <th class="text-right">Ações</th>
    </tr>
    </thead>
    <tbody
    <?php foreach ($pages as $page) : ?>
    <tr>
        <td><?php echo $page->id; ?> </td>
        <td><?php echo $page->title; ?> </td>
        <td class="text-right">
            <a href="/pages/<?php echo $page->id ?>" class="btn btn-xs btn-default">Ver</a>
            <a href="/pages/<?php echo $page->id ?>/edit" class="btn btn-xs btn-info">Editar</a>
            <form action="/pages/<?php echo $page->id ?>/delete" style="display: inline-block" method="post">
                <input type="submit" value="Remover" class="btn btn-xs btn-danger">
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>