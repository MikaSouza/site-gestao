<?php
require_once 'tw/includes/constantes.php';
require_once 'tw/transaction/transactionBlog.php';

$paginaAtual = $_GET['paginaAtual'];
$itensPorPagina = 25;

$limiteInicial = ($paginaAtual - 1) * $itensPorPagina;

$blogs = comboBlog($limiteInicial, $itensPorPagina);

if ($blogs['quantidadeRegistros'] > 0) :
    foreach ($blogs['dados'] as $blog) :
?>
        <article class="postbox post format-image mb-40">
            <div class="postbox__thumb mb-30">
                <a href="/blog/<?= $blog['BLOURLAMIG']; ?>">
                    <img src="tw/uploads/blog/thumbnail/<?= $blog['BLOIMAGEM']; ?>" alt="<?= $blog['BLOTITULO']; ?>">
                </a>
            </div>
            <div class="postbox__text p-50">
                <div class="post-meta mb-15">
                    <span>
                        <a href="/blog/<?= $blog['BLOURLAMIG']; ?>"><i class="fas fa-tag"></i>
                            <?= $blog['CATCATEGORIA']; ?></a>
                    </span>
                </div>
                <h3 class="blog-title">
                    <a href="/blog/<?= $blog['BLOURLAMIG']; ?>"><?= $blog['BLOTITULO']; ?></a>
                </h3>
                <div class="post-text mb-20">
                    <p>
                        <?= (strlen($blog['BLOTEXTO']) > 450) ? substr($blog['BLOTEXTO'], 0, 400) . '...' : $blog['BLOTEXTO']; ?>
                    </p>
                </div>
                <div class="read-more mt-30">
                    <a class="btn" href="/blog/<?= $blog['BLOURLAMIG']; ?>"><span class="btn-text">LEIA MAIS
                            <i class="far fa-long-arrow-right"></i></span> </a>
                </div>
            </div>
        </article>
    <?php
    endforeach;
else :
    ?>
    <h5> Nenhum registro encontrado!</h5>
<?php
endif;
?>