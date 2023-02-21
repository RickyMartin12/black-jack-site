<?php

session_start();
$msg = '';
//echo $_SESSION['captcha'];

// If user has given a captcha!
if (isset($_POST['button_contactos']))
{
    // If the captcha is valid
    if ($_POST['value'] == $_SESSION['captcha'])
        $msg = '<span style="color:green">SUCCESSFUL!!!</span>';
    else
        $msg = '<span style="color:red">CAPTCHA FAILED!!!</span>';
}

/*$captcha = $_SESSION['captcha'];
echo $captcha;
?>

<?php
if( isset($_POST['button']))
{
    $value = $_POST['value'];
    if ($value == $captcha)
    {
      echo "<script>$('.error').html('');</script>";
    }
  else
  {
    echo "<script>$('.error').html('O Captcha é invalido<br>');</script>";
  }
}*/

?>


<!DOCTYPE html>
<html lang="en">
     <head>
     <title>Contacts</title>



     <?php
        include 'content/header.php';
     ?>


         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     
     </head>
     <body>
<!--==============================header=================================-->
<!--==============================header=================================-->

<?php
        include 'content/menu_contactos.php';
        include 'content/modals.php';
?>
   
<!--=======content================================-->
<div class="content">
  <div class="container_12">
    <div class="grid_6">
      <div class="pad3">
        <center><h3>Informação do Contacto</h3></center>
              <div class="map">
              <figure class="">
                      <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0"width="642" height="443" src="https://maps.google.com/maps?hl=en&q=Avenida Dom João VI, Olhão&ie=UTF8&t=roadmap&z=16&iwloc=B&output=embed"><div><small><a href="http://embedgooglemaps.com">
                  embedgooglemaps.com
              </a></small></div><div><small><a href="https://ww.premiumlinkgenerator.com/">premium link generator</a></small></div></iframe>
                 </figure>
                <div class="text1">Ricardo Peleira - Aluno IST (MISE - Mestrado Informação e Sistemas Empresariais) </div>
                <address>
                              <dl>
                                  <dt>
                                      Avenida Dom João VI<br>
                                      111ª Segundo Frente (2ºF)
                                  </dt>
                                  <dd><span>Telemóvel:</span>963354089</dd>
                                  <dd><span>Telefone:</span>289707181</dd>
                                  <dd>E-mail: <a href="#" class="link-1">r.peleira@hotmail.com</a></dd>
                              </dl>
                           </address>
                          
            </div>
      </div>
    </div>
    <div class="grid_6">
      <center><h3>Formulário de Contactar</h3></center>
      <form id=form>
      <div class="success_wrapper">
      <div class="success">Contact form submitted!<br>
      <strong>We will be in touch soon.</strong> </div></div>
      <fieldset>
      <label class="name">
      <input type="text" name="nome" placeholder="Name:" oninput="requiredForm();">
      <br class="clear">
      <span class="error error-empty"></span>
      <!--<span class="error error-empty">*This is not a valid name.</span><span class="empty error-empty">*This field is required.</span>-->
      </label>
      <label class="email">
      <input type="email" name="email" placeholder="E-mail:" oninput="requiredForm();">
      <br class="clear">
          <span class="error error-empty"></span>
      <!--<span class="error error-empty">*This is not a valid email address.</span><span class="empty error-empty">*This field is required.</span>-->
      </label>
      <label class="phone">
      <input type="tel" name="telefone" placeholder="Phone:" oninput="requiredForm();">
      <br class="clear">
          <span class="error error-empty"></span>
      </label>
      <!--<span class="error error-empty">*This is not a valid phone number.</span><span class="empty error-empty">*This field is required.</span> </label>-->
      <label class="message" style="margin-bottom: 20px">
      <textarea name="message_text" placeholder="Text Message" oninput="requiredForm();"></textarea>
      <br class="clear">
          <span class="error error-empty"></span>
      </label>
      <label class="captcha">
        <input type='text' name='value' placeholder="Captcha" oninput="requiredForm();">
          <br class="clear">
          <span class="error error-empty"></span>
        <img src='captcha.php?teste=image_captcha' id="captcha_id_contact"></img><br>
          <?php echo $msg; ?>
        </label>
      <div class="clear"></div>

      <div class="btns"><button type="reset" data-type="reset" class="btn" onclick="clearForm()">clear</>
          <button type="submit" data-type="submit" name="button_contactos" class="btn disabledLink">submit</button>
      <div class="clear"></div>
      </div></fieldset></form>
    </div>
  </div>
</div>


<!--==============================footer=================================-->

<?php
  include 'content/footer.php';
?>

<script>

    

    clearForm();
    function clearForm()
    {
        // CAPTCHA
        $("input[name='value']").val("");
        $( ".captcha" ).children( ".error" ).fadeIn(3000);
        $( ".captcha" ).children( ".error" ).html("*This field is required.");

        // MESSAGE
        $("textarea[name='message_text']").val("");
        $( ".message" ).children( ".error" ).fadeIn(3000);
        $( ".message" ).children( ".error" ).html("*This field is required.");

        // TELEFONE
        $("input[name='telefone']").val("");
        $( ".phone" ).children( ".error" ).fadeIn(3000);
        $( ".phone" ).children( ".error" ).html("*This field is required.");

        //EMAIL
        $("input[name='email']").val("");
        $( ".email" ).children( ".error" ).fadeIn(3000);
        $( ".email" ).children( ".error" ).html("*This field is required.");


        //NOME
        $("input[name='nome']").val("");
        $( ".name" ).children( ".error" ).fadeIn(3000);
        $( ".name" ).children( ".error" ).html("*This field is required.");
    }







    function isNumber(n) {
        return !isNaN(parseFloat(n)) && isFinite(n);
    }


    function requiredForm()
    {


        var formcata = 0;
        var captcha = $("input[name='value']").val();
        var text_message = $("textarea[name='message_text']").val();
        var nome = $("input[name='nome']").val();
        var telef = $("input[name='telefone']").val();
        var email = $("input[name='email']").val();
        var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        $.ajax({ method: "GET", url: "captcha.php", data: { 'teste': 'return_captcha'}})
            .done(function( data )
            {
                console.log(data);
                //console.log(data);

                // Texto Message
                if(text_message != "")
                {
                    formcata += 1;
                    $( ".message" ).children( ".error" ).fadeOut(3000);
                    $( ".message" ).children( ".error" ).html("");
                }
                else
                {
                    $( ".message" ).children( ".error" ).fadeIn(3000);
                    $( ".message" ).children( ".error" ).html("*This field is required.");
                }




                // captcha
                if(captcha != "")
                {
                    if(captcha == data)
                    {
                        formcata += 1;
                        $( ".captcha" ).children( ".error" ).fadeOut(3000);
                        $( ".captcha" ).children( ".error" ).html("");
                    }
                    else
                    {
                        $( ".captcha" ).children( ".error" ).fadeIn(3000);
                        $( ".captcha" ).children( ".error" ).html("*CAPTCHA FAILED!!!");
                    }
                }
                else
                {
                    $( ".captcha" ).children( ".error" ).fadeIn(3000);
                    $( ".captcha" ).children( ".error" ).html("*This field is required.");
                }


                // Nome
                if(nome != "")
                {
                    formcata += 1;
                    $( ".name" ).children( ".error" ).fadeOut(3000);
                    $( ".name" ).children( ".error" ).html("");
                }
                else
                {
                    $( ".name" ).children( ".error" ).fadeIn(3000);
                    $( ".name" ).children( ".error" ).html("*This field is required.");
                }

                // TELEFONE
                if(telef == "")
                {
                    //act_button_cust -= 1;
                    $( ".phone" ).children( ".error" ).fadeIn(3000);
                    $( ".phone" ).children( ".error" ).html("*This field is required.");
                }
                else
                {
                    if (isNumber(telef))
                    {
                        if(telef.length == 9)
                        {
                            formcata += 1;
                            $( ".phone" ).children( ".error" ).fadeOut(3000);
                            $( ".phone" ).children( ".error" ).html("");
                        }
                        else
                        {
                            $( ".phone" ).children( ".error" ).fadeIn(3000);
                            $( ".phone" ).children( ".error" ).html("*This field phone must be exactly 9 characters");
                        }
                    }
                    else
                    {
                        $( ".phone" ).children( ".error" ).fadeIn(3000);
                        $( ".phone" ).children( ".error" ).html("*This field must be a number.");
                    }
                }

                // EMAIL

                if(email != "")
                {
                    if (email.match(validRegex))
                    {
                        formcata += 1;
                        $( ".email" ).children( ".error" ).fadeOut(3000);
                        $( ".email" ).children( ".error" ).html("");
                    }
                    else
                    {
                        $( ".email" ).children( ".error" ).fadeIn(3000);
                        $( ".email" ).children( ".error" ).html("*This field must be a valid email.");
                    }
                }
                else
                {
                    $( ".email" ).children( ".error" ).fadeIn(3000);
                    $( ".email" ).children( ".error" ).html("*This field is required.");
                }







                if(formcata == 5)
                {
                    $("button[name=button_contactos]").removeClass('disabledLink');
                }
                else
                {
                    $("button[name=button_contactos]").addClass('disabledLink');
                }

            });

    }


    $("#form").submit(function( event ) {
        event.preventDefault();
        var data = $(this).serialize();
        //console.log(data);

        $.ajax({
            type: "POST",
            url: 'content/info.php',
            data: data, // serializes the form's elements.
            success: function(data)
            {
                var result = $.parseJSON(data);
                if(result['msg'] != null)
                {
                    $('.debug-url').html(result['msg']);
                    $('#form')[0].reset();
                    $("#Modalok").modal('show');
                    setTimeout(function(){
                        $('#Modalok').modal('hide');},2500);
                }
                else
                {
                    $('.debug-url').html(result['error']);
                    //$('#form')[0].reset();
                    $("#Modalko").modal('show');
                    setTimeout(function(){
                        $('#Modalko').modal('hide');},2500);
                }
            }
        });

    });



</script>
</body>
</html>

