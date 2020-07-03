<?php

require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionBlog.php';
require_once 'tw/transaction/transactionCategorias.php';

if ($parametros[1] > 0)
    $blogs = getBlogByCategoria($parametros[1]);
else
    $blogs = comboBlog(0, $itensPorPagina);

$blog = getNoticiaByUrlAmigavel($parametros[1]);
$miniBlog = comboBlog(0, 4);

$vSTitulo = $blog['BLOTITULO'];
$vSName = "blog-detalhe";
require_once 'header.php';

?>

<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Blog Detalhe</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li><?= $blog['BLOTITULO']; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area fix area-padding">
    <div class="container">
        <div class="row">
            <div class="blog-details">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <article class="blog-post-wrapper">
                        <div class="blog-banner">
                            <a class="blog-images">
                                <img src="tw/uploads/blog/<?= $blog['BLOIMAGEM']; ?>" alt="<?= $blog['BLOTITULO']; ?>">
                            </a>
                            <div class="blog-content">
                                <h4><?= $blog['BLOTITULO']; ?></h4>
                                <p><?= $blog['BLOTEXTO']; ?></p>
                            </div>
                        </div>
                    </article>
                    <div class="clear"></div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="left-head-blog right-side">
                        <div class="left-blog-page">
                            <form action="blog-procurar.php" method="POST">
                                <div class="blog-search-option">
                                    <input type="text" id="inp_pesquisa" name="inp_pesquisa" placeholder="Pesquisar...">
                                    <button class="button" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="left-blog-page">
                            <div class="left-blog blog-category">
                                <h4>Categorias</h4>
                                <ul>
                                    <?php require_once("blog-categoria.php") ?>
                                </ul>
                            </div>
                        </div>
                        <div class="left-blog-page">
                            <div class="left-blog">
                                <h4>Tópicos Recentes</h4>
                                <?php foreach ($miniBlog['dados'] as $blog) : ?>
                                    <div class="recent-post">
                                        <div class="recent-single-post">
                                            <div class="post-img">
                                                <a href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
                                                    <img src="tw/uploads/blog/<?= $blog['BLOIMAGEM']; ?>" alt="<?= ($blog['BLOTITULO']); ?>">
                                                </a>
                                            </div>
                                            <div class="pst-content">
                                                <p><a href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>"><?= ($blog['BLOTITULO']); ?></a></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'footer.php' ?>