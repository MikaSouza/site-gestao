<?php
$namePage = 'faq';
$titlePage = 'Cadastrar Faq';
require_once '../app/header.php';
require_once '../transaction/transactionCategoriasFaq.php';
?>
<div class="container">
    <div class="row">
        <div class="section-title text-center">
            <h2>Inserir Faq</h2>
            <span class="icon"></span>
        </div>
        <form class="form-default" name="formFaq" method="POST">
            <div class="form-group">
                <label for="vSFAQPERGUNTA">Pergunta</label>
                <input type="text" class="form-control" id="vSFAQPERGUNTA" name="vSFAQPERGUNTA" placeholder="Insira a Pergunta" title="Pergunta" value="<?= $fill['FAQPERGUNTA']; ?>" required>
            </div>
            <div class="form-group">
                <label for="vSFAQRESPOSTA">Resposta</label>
                <input type="text" class="form-control" id="vSFAQRESPOSTA" name="vSFAQRESPOSTA" placeholder="Insira a Resposta" title="Resposta" value="<?= $fill['FAQRESPOSTA']; ?>" required>
            </div>
            <div class="form-group">
                <label for="vICFQCODIGO">Categoria</label>
                <select class="form-control select" id="vICFQCODIGO" name="vICFQCODIGO" title="Escolha uma categoria" required>
                    <?php
                    foreach (comboCategoriasFaq() as $categoriaFaq) {
                        if ($fill['CFQCODIGO'] == $categoriaFaq['CFQCODIGO'])
                            echo "<option value=\"{$categoriaFaq['CFQCODIGO']}\" selected>{$categoriaFaq['CFQCATEGORIA']}</option>\n";
                        else
                            echo "<option value=\"{$categoriaFaq['CFQCODIGO']}\">{$categoriaFaq['CFQCATEGORIA']}</option>\n";
                    }
                    ?>
                </select>
            </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            <input type="hidden" name="vIFAQCODIGO" value="<?= $fill['FAQCODIGO']; ?>">
            <a href="list<?= ucfirst($namePage) ?>.php" class="btn btn-default">Voltar</a>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </div>
    </form>
</div>
<?php require_once '../app/footer.php'; ?>