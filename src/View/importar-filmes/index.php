<section class="py-3 text-center container">
    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Importar Filmes</h1>
            <p class="lead text-body-secondary">Esta página contempla a importação de arquivos do CSV para o banco de dados SQLite, exibe os registros importados e apaga todos os registros no banco de dados.</p>
            <p>
                <a 
                    href="/importar-filmes/importar" 
                    class="btn btn-primary my-2 <?php echo count($lista) > 0 ? 'disabled' : '' ?>"
                    aria-disabled="<?php echo count($lista) > 0 ? 'true' : 'false' ?>"
                >Importar Filmes</a>
                <a 
                    href="/importar-filmes/apagar" 
                    class="btn btn-danger my-2 <?php echo count($lista) > 0 ? '' : 'disabled' ?>" 
                    aria-disabled="<?php echo count($lista) > 0 ? 'false' : 'true' ?>"
                >Apagar Filmes</a>
            </p>
        </div>
    </div>
</section>

<div class="row">
    <div class="col">
        <h3 class="text-center mb-5">Filmes Importados </h3>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Ano</th>
                    <th>Produtor</th>
                    <th>Estudio</th>
                    <th>Vencedor</th>
                </tr>
            </thead>
        <?php
        if (count($lista) > 0) {
            $n = 1;
            foreach ($lista as $item) {
                $vencedor = $item['vencedor'] == 1 ? 'Sim' : '-';
                echo '
                    <tr>
                        <td>' . $n . '</td>
                        <td>' . $item['id'] . '</td>
                        <td>' . $item['titulo'] . '</td>
                        <td>' . $item['ano'] . '</td>
                        <td>' . $item['estudio'] . '</td>
                        <td>' . $item['produtor'] . '</td>
                        <td class="text-center"> ' . $vencedor . '</td>
                    </tr>';
                $n++;
            }
        } else {
            echo '<tr><td colspan="7" class="text-center text-danger">Nenhum filme no banco de dados.</td></tr>';
        }
        ?>
        </table>
    </div>
</div>
