<section class="py-3 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Apagar os Filmes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            
            <?php
            if ($apagar == true) {
                echo '<p>Todos os registro apagados!</p>';
            } else {
                echo '<p>Nenhum registro apagado.</p>';
            }
            ?>
        </div>
    </div>
</section>
