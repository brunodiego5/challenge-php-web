<?php if(!class_exists('Rain\Tpl')){exit;}?>
    </div>
    <script type="text/javascript" src="/res/js/toasty.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="/res/js/jquery.mask.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('.date').mask('00/00/0000');
        $('.time').mask('00:00:00');
        $('.date_time').mask('00/00/0000 00:00:00');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.smartphone_ddd_br').mask('(00) 00000-0000');
        $('.cpf').mask('000.000.000-00', {reverse: true});
        console.log($('.cpf'));
      });        
    </script>
    <?php if( isset($_SESSION['registerSaved']) && $_SESSION['registerSaved'] !== '' ){ ?>
    <?php $_SESSION['registerSaved']=''; ?>
    <script>
      var toast = new Toasty({transition: "pinItUp", progressBar: true, duration: 1000});
      toast.success("Registro salvo com sucesso.");
    </script>
    <?php } ?>    
    <?php if( isset($_SESSION['registerDeleted']) && $_SESSION['registerDeleted'] !== '' ){ ?>
    <?php $_SESSION['registerDeleted']=''; ?>
    <script>
      var toast = new Toasty({transition: "pinItUp", progressBar: true, duration: 1000});
      toast.success("Registro excluído com sucesso.");
    </script>
    <?php } ?>   
  </body>
</html>