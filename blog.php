<?php

// require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionBlog.php';
require_once 'tw/transaction/transactionCategorias.php';

$vSTitulo = 'Notícias';
$vSName = 'blog';
require_once 'header.php';

$paginaAtual = $_GET['paginaAtual'];
$itensPorPagina = 5;

$limiteInicial = ($paginaAtual - 1) * $itensPorPagina;

if ($parametros[1] > 0)
    $blogs = getBlogByCategoria($parametros[1]);
else
    $blogs = comboBlog(0, $itensPorPagina);

$miniBlog = comboBlog(0, 5);

?>

<!-- header end -->
<!-- Start Bottom Header -->
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
                        <li>Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END Header -->
<!--Blog Area Start-->
<div class="blog-area fix area-padding">
    <div class="container">
        <div class="row">
            <div class="blog-sidebar-right">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <div class="row">
                        <?php if ($blogs['quantidadeRegistros'] > 0) :
                            foreach ($blogs['dados'] as $blog) :
                        ?>
                                <div class="blog-left-content">
                                    <!-- Start single blog -->
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="single-blog ">
                                            <div class="blog-image">
                                                <a class="image-scale" href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
                                                    <img src="tw/uploads/blog/thumbnail/<?= $blog['BLOIMAGEM']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="blog-content">
                                                <div class="blog-meta">
                                                    <span class="date-type">
                                                        <i class="fa fa-calendar"></i>
                                                        <?= formatar_data($blog['BLODATA_INC']); ?>
                                                    </span>
                                                </div>
                                                <a href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>">
                                                    <h4><?= $blog['BLOTITULO']; ?></h4>
                                                </a>
                                                <p><?= (strlen($blog['BLOTEXTO']) > 350) ? substr($blog['BLOTEXTO'], 0, 300) . '...' : $blog['BLOTEXTO']; ?></p>
                                                <a class="blog-btn" href="/blog-detalhe/<?= $blog['BLOURLAMIG']; ?>"> Leia Mais</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End single blog -->
                                </div>
                        <?php endforeach;
                        endif;
                        ?>
                    </div>
                </div>
                <!-- Start Right Sidebar blog -->
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="left-head-blog right-side">
                        <div class="left-blog-page">
                            <!-- search option start -->
                            <form action="blog-procurar" method="POST">
                                <div class="blog-search-option">
                                    <input type="text" id="inp_pesquisa" name="inp_pesquisa" placeholder="Pesquisar...">
                                    <button class="button" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <!-- search option end -->
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
                            <!-- recent start -->
                            <div class="left-blog">
                                <h4>Tópicos Recentes</h4>
                                <?php foreach ($miniBlog['dados'] as $blog) : ?>
                                    <div class="recent-post">
                                        <!-- start single post -->
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
                                        <!-- End single post -->
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- recent end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Right Sidebar -->
        </div>
        <!-- End row -->
    </div>
</div>
<!--End of Blog Area-->

<?php require_once 'footer.php' ?>