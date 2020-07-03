<?php

$vSTitulo = 'Procurar Notícias';
$vSName = 'blog-procurar';
require_once 'header.php';
require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionBlog.php';
require_once 'tw/transaction/transactionCategorias.php';

$termo = filter_input(INPUT_POST, 'inp_pesquisa', FILTER_SANITIZE_STRING);
$blogPesquisa = getNoticiaByTermoPesquisa($termo);

$miniBlog = comboBlog(0, 5);

?>

<div class="page-area">
    <div class="breadcumb-overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="breadcrumb text-center">
                    <div class="section-headline white-headline text-center">
                        <h3>Blog</h3>
                    </div>
                    <ul>
                        <li class="home-bread">Home</li>
                        <li>Blog Procurar</li>
                        <h3>Palavra Pesquisada: <b id="palavraPesquisada"><?= $termo; ?></b></h3>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="blog-area fix area-padding">
    <div class="container">
        <div class="row">
            <div class="blog-sidebar-right">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <?php if ($blogPesquisa['quantidadeRegistros'] > 0) :
                            foreach ($blogPesquisa['dados'] as $blog) :
                        ?>
                                <div class="blog-left-content">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="single-blog ">
                                            <div class="blog-image">
                                                <a class="image-scale" href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
                                                    <img src="tw/uploads/blog/thumbnail/<?= $blog['BLOIMAGEM']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <a href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
                                                    <h4><?= $blog['BLOTITULO']; ?></h4>
                                                </a>
                                                <p><?= (strlen($blog['BLOTEXTO']) > 450) ? substr($blog['BLOTEXTO'], 0, 400) . '...' : $blog['BLOTEXTO']; ?></p>
                                                <a class="blog-btn" href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>"> Leia Mais</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach;
                        endif;
                        ?>
                    </div>
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
                                                    <img src="tw/uploads/blog/thumbnail/<?= $blog['BLOIMAGEM']; ?>" alt="<?= $blog['BLOTITULO']; ?>">
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