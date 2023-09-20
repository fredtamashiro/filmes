$(document).ready(function() {

    $("#loading").show();

    function atualizarDados(dados, tipo) {
        var item = dados[0];

        $("#" + tipo + "Producer").html(item.producer);
        $("#" + tipo + "Interval").html(item.interval);
        $("#" + tipo + "Previous").html(item.previousWin);
        $("#" + tipo + "Following").html(item.followingWin);
    }


     setTimeout(function() {
        // var dataAtual = new Date().getTime();
        var url = "/api/intervalo-premios";

        console.log('Acessando API: '+url);

        $.ajax({
            url: url,
            cache: false,
            method: "GET",
            dataType: "json",
            success: function(data) {
                if(data.min==''){
                    console.log('redirecionando para realizar a importacao de dados....');
                    var novaURL = "http://localhost:7000/importar-filmes/importar";
                    window.location = novaURL;
                }else{
                    atualizarDados(data.min, "min");
                    atualizarDados(data.max, "max");
                    $("#loading").hide();
                    $("#produtores").show();    
                }
            },
            error: function() {
                // $("#dados-api").html("<p>Ocorreu um erro ao carregar os dados da API.</p>");
            }
        });
    },500);
});
