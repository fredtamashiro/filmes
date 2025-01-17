<section class="py-3 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Importação Realizada</h1>
        </div>
    </div>
    <div class="row">
        <div class="col text-start">
            <ul>
            <?php
            foreach ($lista as $item) {
                echo '<li>[ID: ' . $item[5] . '] ' . $item[0] . ' - ' . $item[1] . '</li>';
            }
            ?>
            </ul>
        </div>
    </div>
</section>
