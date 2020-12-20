<?php
require_once 'views/layout/header.php';
?>
<?php if(isset($tickets)): ?>
<div class="container">
<?php if(isset($_SESSION['ticket']) && $_SESSION['ticket'] == 'OK'): ?>
    <strong class="success">El Ticket se ha creado correctamente</strong>
<?php elseif(isset($_SESSION['ticket']) && $_SESSION['ticket'] == 'ERROR'): ?>
     <strong class="error">El Ticket no ha podido crear, verifique los datos ingresados</strong>
<?php endif; ?>
<?php Utils::deleteSession('ticket'); ?>
    <h1>Indice de Tickets</h1>
    <table>
        <tr>
            <th>Codigo</th>
            <th>Fecha</th>
            <th>Recurrente</th>
            <th>Reclamo</th>
            <th>Tipo de Reclamo</th>
            <th>Cedula</th>
            <th></th>
        </tr>
        <?php while($ticket = $tickets->fetch_object()): ?>
            <tr>
                <td>
                    <?=$ticket->code?>
                </td>
                <td>
                    <?=$ticket->date?>
                </td>
                <td>
                    <?=$ticket->recurrent?>
                </td>
                <td>
                    <?=$ticket->claim_description?>
                </td>
                <td>
                    <?=$ticket->claim_type_description?>
                </td>
                <td>
                    <?=$ticket->identification_card?>
                </td>
                <td>
                    <a class="btn btn-primary" href="<?=base_url?>ticket/show&id=<?=$ticket->id?>">    
                        Ver
                    </a>
                </td>
            </tr>    
        <?php endwhile;?>
    </table>
</div>
<br>
<?php else:?>
<div class="container">
    <h1>No hay Tickets disponibles</h1>
</div>
<?php endif;?>

<?php
require_once 'views/layout/footer.php';
?>