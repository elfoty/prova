$(function(){
    $("#nomeAbelha").keyup(function(){
        var pesquisa1 = $(this).val();
        if(pesquisa1 != ''){
            var dados1 = {
                palavra1 : pesquisa1
            }
            $.post('index.php', dados1);
        }
    });
    $("#meses").keyup(function(){
        var pesquisa2 = $(this).val();
        if(pesquisa2 != ''){
            var dados2 = {
                palavra2 : pesquisa2
            }
            $.post('index.php', dados2);
        }
    });
});