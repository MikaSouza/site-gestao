<li><a href="blog">Todos</a></li>
<?php
foreach (comboCategorias('') as $blogCategoria) :
?>

<li><a href="blog/<?php echo $blogCategoria['CATCODIGO']; ?>"><?php echo $blogCategoria['CATCATEGORIA']; ?></a></li>

<?php endforeach; ?>