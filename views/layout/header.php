<!DOCTYPE html>
<html>
    <head lang="es">
        <meta charset="UTF-8">
        <title>Ticket SyStem</title>
        <link type="text/css" rel="stylesheet" href="<?=base_url?>./assets/css/style.css">
        <script type="text/javascript" src="<?=base_url?>./assets/js/main.js"></script>
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
                        <form action="<?=base_url?>ticket/search" method="POST" style="display: inline">
                            <input href="#" type="submit" class="btn btn-primary" value="Buscar ticket">
                            <input type="number" name="search" min="0" class="input w-2" style="display: inline-block" placeholder="Ingrese codigo">
                        </form>
                    </div>
                </div>
            </header>
        </div>