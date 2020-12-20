<div class="container">
    <h1>Ver Ticket</h1>
    <form action="" method="POST">
        <div class="form-content">
            <label for="name">Codigo del Ticket</label>
            <input disabled="" type="number" name="code" placeholder="Ingrese el numero de ticket"  min="1" max="5" pattern="[0-9]+" value="<?=$ticketResult->code?>">
        </div>
        <div class="form-content">
            <label for="date">Fecha</label>
            <input disabled="" type="date" name="date" value="<?=$ticketResult->date?>">    
        </div>
        <div class="form-content grid-container">
            <div>
                <label for="recurrent">Recurrente</label>
                <input disabled=""type="text" name="recurrent" placeholder="Nombre y apellido" class="w-7 input" value="<?=$ticketResult->recurrent?>">
            </div>
            <div class="form-content">
                <label for="i-card">Cedula de Identidad</label>
                <input disabled="" type="text" name="i-card" placeholder="Cedula de identidad" class="w-7 input" value="<?=$ticketResult->identification_card?>">    
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="form-content">
            <label for="claim_type">Tipo de Reclamo</label>
            <select id="select" name="claim_type" class="input" disabled="">
                <option value="<?=$ticketResult->claim_type_id?>"><?=$ticketResult->claim_type_description?></option>
            </select>
        </div>
        <div class="form-content">
            <label for="claim">
                Reclamo
            </label>
            <textarea class="input textarea" disabled=""><?=$ticketResult->claim_description?></textarea>
        </div>
        <a href="<?=base_url?>ticket/edit&id=<?=$ticketResult->id?>" class="btn btn-primary">Editar</a>
        <a href="<?=base_url?>" class="btn btn-primary">Atras</a>
    </form>
</div>