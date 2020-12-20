<?php if(isset($edit) && isset($ticketResult) && is_object($ticketResult)):?>
<div class="container">
    <h1>Editar Ticket <?=$ticketResult->code?></h1>
    <?php $urlAction = base_url."ticket/update&id=".$ticketResult->id; ?>
<?php else: ?>
<div class="container">
    <h1>Crear nuevo Ticket</h1>
    <?php $urlAction = base_url."ticket/save"?>
<?php endif;?>
    <form action="<?=$urlAction?>" id="form-create" method="POST" enctype="multipart/form-data">
        <div class="form-content">
            <label for="name">Codigo del Ticket</label>
            <input type="number" name="code" placeholder="Ingrese el numero de ticket" min="0" pattern="[0-9]+" value="<?=isset($ticketResult) && is_object($ticketResult) ? $ticketResult->code : ''?>">
        </div>
        <div class="form-content">
            <label for="date">Fecha</label>
            <input type="date" name="date" value="<?= isset($ticketResult) && is_object($ticketResult) ? $ticketResult->date: ''?>">    
        </div>
        <div class="form-content grid-container">
            <div>
                <label for="recurrent">Recurrente</label>
                <input type="text" name="recurrent" placeholder="Nombre y apellido" class="w-7 input" value="<?= isset($ticketResult) && is_object($ticketResult) ? $ticketResult->recurrent:''?>">
            </div>
            <div class="form-content">
                <label for="i-card">Cedula de Identidad</label>
                <input type="text" name="i-card" placeholder="Cedula de identidad" class="w-7 input" value="<?= isset($ticketResult) && is_object($ticketResult) ? $ticketResult->identification_card:''?>">    
            </div>
        </div>
        <div class="clearfix"></div>
        
        <div class="form-content">
            <label for="claim_type">Tipo de Reclamo</label>
            <?php if(isset($edit)):?>
            <select id="select" name="claim_type" class="input">
                <?php while($claimType = $claimTypeResults->fetch_object()):?>
                <option <?=$claimType->id == $ticketResult->claim_type_id ? 'selected=selected':''?> value="<?=$claimType->id?>"><?=$claimType->claim_type_description?></option>
                <?php endwhile;?>
            </select>
            <?php else:?>
                <select id="select" name="claim_type" class="input">
                <?php while($claimType = $claimTypeResults->fetch_object()):?>
                <option value="<?=$claimType->id?>"><?=$claimType->claim_type_description?></option>
                <?php endwhile;?>
            </select>
            <?php endif?>
        </div>
        <div class="form-content">
            <label for="claim">
                Reclamo
            </label>
            <textarea class="input textarea" name="claim_description"><?=isset($ticketResult) && is_object($ticketResult) ? $ticketResult->claim_description:''?></textarea>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Aceptar">
        <?php?>
        
        
        <?php if(isset($ticketResult)&& is_object($ticketResult)):?>
            <a href="<?=base_url?>ticket/show&id=<?=$ticketResult->id?>" class="btn btn-primary">Atras</a>
        <?php else:?>
            <a href="<?=base_url?>" class="btn btn-primary">Cancelar</a>
        <?php endif;?>
    </form>
</div>


