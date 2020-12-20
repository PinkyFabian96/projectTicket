<!DOCTYPE html>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>Ticket SyStem</title>
        <link type="text/css" rel="stylesheet" href="<?=base_url?>./assets/css/style.css">
    </head>
    <body>
        <div class="container">
            <!--CABECERA-->
            <header id="header">
                <div id="logo">
                    <img src="<?=base_url?>assets/img/ticket_img_4.png">
                    <h1>Ticket System</h1>
                </div>
                <div class="btn-container">
                    <div class="center">
                        <a href="<?=base_url?>ticket/create" class="btn btn-primary">
                            Nuevo ticket de reclamo  
                        </a>
                        <a href="#" class="btn btn-primary">
                          Buscar ticket  
                        </a>
                        <input type="number" name="search" class="input w-2" style="display: inline-block">
                    </div>
                </div>
            </header>
        </div>