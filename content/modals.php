<?php
    $img = "img/title_blackjack.png";
?>

<style>
    .modal-content {
        background: #000;}

    .modal-body{
        background:#FFF;
    }

    .close{
        color:#FFF;
        opacity:1;
    }

</style>

<div id="Modalok" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#5cb85c;"> <span class='glyphicon glyphicon-ok'></span> Sucesso</h4>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">

                <p style='text-align:center; margin:0;'><img src="<?php echo $img; ?>" style="width:120px;"></p>
                <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>
                -->
            </div>
        </div>
    </div>
</div>

<div id="Modalko" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color:#d9534f;"><span class='glyphicon glyphicon-warning-sign'></span> Aviso</h4>
            </div>
            <div class="modal-body">
                <p class="debug-url"></p>
            </div>
            <div class="modal-footer">

                <p style='text-align:center; margin:0;'><img src="<?php echo $img; ?>" style="width:120px;"></p>

                <!--
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class='glyphicon glyphicon-remove-sign'></span> Fechar</button>

                -->
            </div>
        </div>
    </div>
</div>
