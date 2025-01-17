<div class="row">
    <div class="col">
        <h1 class="text-center mb-5">Dashboard </h1>
    </div>
</div>

<div class="row mb-5">
    <ul>
        <li>Atualicação 16-01-25 13h56</li>
        <li>Teste 17-01-25 10h12</li>
    </ul>
    <div class="col text-center fs-3 text-body-secondary">
        Produtor com o maior e menor intervalo entre as premiações
    </div>
</div>

<div id="loading" style="display: none;" class="text-center">
    <i class="fa fa-spinner fa-spin fa-3x fa-fw text-success"></i>
    <span class="sr-only">Loading...</span>
</div>

<div id="produtores" class="row" style="display: none;">
    <div class="col">
        <h4 class="text-center"><i class="fa fa-trophy trofeu"></i> Maior Intervalo</h4>
        <table class="table border">
            <thead>
                <tr>
                    <th>Produtor</th>
                    <th>Intervalo</th>
                    <th>Ano Anterior</th>
                    <th>Ano Seguinte</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="maxProducer"></td>
                    <td id="maxInterval"></td>
                    <td id="maxPrevious"></td>
                    <td id="maxFollowing"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col">
        <h4 class="text-center"><i class="fa fa-trophy trofeu"></i> Menor Intervalo</h4>
        <table class="table border">
            <thead>
                <tr>
                    <th>Produtor</th>
                    <th>Intervalo</th>
                    <th>Ano Anterior</th>
                    <th>Ano Seguinte</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="minProducer"></td>
                    <td id="minInterval"></td>
                    <td id="minPrevious"></td>
                    <td id="minFollowing"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<link href="/assets/css/dashboard.css" rel="stylesheet">
<script src="/assets/js/dashboard.js"></script>