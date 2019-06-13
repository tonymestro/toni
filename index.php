<!DOCTYPE html>
<html lang="en">

<head>
  <title>Lanches IFFar 2019</title>
  <link rel="stylesheet" type="text/css" href="estilo.css">
  <script type="text/javascript" src="Hora.js"></script>

</head>

<body>
  <div class="container">
    <form id="contact">
      <h3>LANCHES IFFAR - UG</h3>

      <h3> <span id="tempo">00/00/0000 - 00:00:00</span> </h3>

      <h4>Matrícula do aluno(a)</h4>
      <fieldset>
        <input name="matricula" placeholder="Informe a matrícula" type="text" maxlength=10 tabindex="1" required autofocus>
      </fieldset>
      <fieldset>
        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Reservar</button>
      </fieldset>
      <p class="copyright">Designed by <a href="http://sig.iffarroupilha.edu.br" target="_blank" title="SIG">SIG</a></p>
      <p class="link"><a href="login.php" title="Adm">Admin</a></p>
    </form>

  </div>

  <div id="modal" class="modal">
    <p id="identificacao"></p>
    <br>
    <hr>
    <br>
    <p id="mensagem"></p>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script>
    //ao documento ficar pronto fica na espera dda execuçãod dos eventos
    $(document).ready(function() {

      //ao submeter o formulário executa a função
      $('form').submit(function() {

        //atribui o valor do input da matricula na variável
        var matricula = $("input[name=matricula]").val();

        //chama o ajax com o endereço do php, o método (POST), os dados (matricula)
        //e o tipo de retorno (JSON)
        $.ajax({
          url: "reserva.php",
          type: "POST",
          data: {
            matricula: matricula
          },
          dataType: "JSON",
          //se for sucesso chama o modal (muda o display para flex)
          //exibe o nome do aluno/matricula e a mensagem
          //nos paragrafos e após 3 segundo fecha o modal 
          //(muda o display para none)
          success: function(response) {
            $("#modal").css('display', 'flex');
            $("#identificacao").text(response.identificacao);
            $("#mensagem").text(response.mensagem);
            setTimeout(function() {
              $("#modal").css('display', 'none');
            }, 3000)
          },
          //se ocorrer um erro exibe-o como tabela no
          //console do navegador
          error: function(error) {
            console.table(error);
          }
        });
        //após executar retorna como falso para
        //não enviar o formulário pelo html,
        //apenas pelo ajax
        return false;
      });
    });
  </script>
</body>

</html>