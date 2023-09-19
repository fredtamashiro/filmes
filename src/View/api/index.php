<div class="row">
    <div class="col">
        <h1 class="text-center mb-5">API Functions </h1>
    </div>
</div>

<div class="row mb-5">
    <div class="col text-center fs-3 text-body-secondary">
        Retorna o produtor com maior intervalo entre dois prêmios consecutivos, e o que obteve dois prêmios mais rápido.
    </div>
</div>

<div class="row">
    <div class="col text-center">
        <p class="h4"><strong>GET</strong> http://localhost:7000/api/intervalo-premios</p>
    </div>
    <div class="code">
        <h4>Exemplo de retorno:</h4>
        <pre tabindex="0" class="mt-4">
        {
    "min": [
        {
            "producer": "Joel Silver",
            "interval": 1,
            "previousWin": 1990,
            "followingWin": 1991
        },
        {
            "producer": "Bo Derek",
            "interval": 6,
            "previousWin": 1984,
            "followingWin": 1990
        },
        {
            "producer": "Buzz Feitshans",
            "interval": 9,
            "previousWin": 1985,
            "followingWin": 1994
        },
        {
            "producer": "Matthew Vaughn",
            "interval": 13,
            "previousWin": 2002,
            "followingWin": 2015
        }
    ],
    "max": [
        {
            "producer": "Matthew Vaughn",
            "interval": 13,
            "previousWin": 2002,
            "followingWin": 2015
        },
        {
            "producer": "Buzz Feitshans",
            "interval": 9,
            "previousWin": 1985,
            "followingWin": 1994
        },
        {
            "producer": "Bo Derek",
            "interval": 6,
            "previousWin": 1984,
            "followingWin": 1990
        },
        {
            "producer": "Joel Silver",
            "interval": 1,
            "previousWin": 1990,
            "followingWin": 1991
        }
    ]
}
        </pre>
    </div>
</div>