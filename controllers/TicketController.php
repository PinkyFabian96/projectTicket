<?php
require_once 'models/ticket.php';
require_once 'models/claimType.php';
class TicketController{
    
    public function index(){
        //obtener los registros para cargar en el index
        //Renderizar vista
        $ticket = new Ticket();
        $tickets = $ticket->getAll();
        require_once 'views/ticket/index.php';
    }
    
    public function create(){
        $claimType = new ClaimType();
        $claimTypeResults = $claimType->getAll();
        //array_push($dataObject,$claimType->getAll());
        //Renderizar vista
        require_once 'views/ticket/create.php';
    }
    
    public function show(){
        if(isset($_GET['id'])){            
            $ticketId = $_GET['id'];
            
            $ticket = new ticket();
            $ticket->setId($ticketId);
            
            $ticketResult = $ticket->getTicket();
            
        }
        require_once 'views/ticket/show.php';            
    }
    
    public function save(){
       if(isset($_POST)){
            $code = isset($_POST['code']) && $_POST['code'] > 0 ? $_POST['code'] : false;
            $date = isset($_POST['date']) ? $_POST['date'] : false;
            $recurrent = isset($_POST['recurrent']) ? $_POST['recurrent'] : false;
            $identificationCard = isset($_POST['i-card']) ? $_POST['i-card']: false;
            $claimTypeId = isset($_POST['claim_type']) ? $_POST['claim_type'] : false;            
            $claimDescription = isset($_POST['claim_description']) ? $_POST['claim_description'] : false;            
            //$imagen = isset($_POST['image']) ? $_POST['image'] : false;
            if($code && $date && $recurrent && $identificationCard && $claimTypeId && $claimDescription){
                $ticket = new Ticket();
                $ticket->setCode($code);
                $ticket->setDate($date);
                $ticket->setRecurrent($recurrent);
                $ticket->setClaim_description($claimDescription);
                $ticket->setIdentification_card($identificationCard);
                $ticket->setClaim_type_id($claimTypeId);
                
                $save = $ticket->save();
                
                if($save){
                   $_SESSION['ticket'] = "OK"; 
                }else{
                    $_SESSION['ticket'] = "ERROR";
                }
                header("Location:".base_url.'ticket/index');

            }else{
                $_SESSION['ticket'] = "ERROR";
                header("Location:".base_url.'ticket/index');
            }
        }
    
    }
    
    public function edit(){
        if(isset($_GET['id'])){   
            $edit = true;
            $ticketId = $_GET['id'];
            //$arrayObject = new ArrayObject();
            $ticket = new Ticket();
            $ticket->setId($ticketId);
            $ticketResult = $ticket->getTicket();
            $claimType = new ClaimType();
            $claimTypeResults = $claimType->getAll();
            
            require_once 'views/ticket/create.php';  
         }else{
             header('Location:'.base_url.'views/ticket/index');
         }
    }
    
    public function search(){
         if(isset($_POST)){
            $code = isset($_POST['search']) && $_POST['search'] !="" ? $_POST['search'] : false;
            //$arrayObject = new ArrayObject();
            $ticket = new Ticket();
            if($code){
                $ticket->setCode($code);
                $tickets = $ticket->getTicketByCode();
            }else{
                $tickets = $ticket->getAll();
            }
            require_once 'views/ticket/index.php';
         }
    }
    
    public function update(){
        if(isset($_GET['id']) && isset($_POST)){
            $ticketId = isset($_GET['id']) ? $_GET['id'] : false;
            $code = isset($_POST['code']) && $_POST['code'] > 0 ? $_POST['code'] : false;
            $date = isset($_POST['date']) ? $_POST['date'] : false;
            $recurrent = isset($_POST['recurrent']) ? $_POST['recurrent'] : false;
            $identificationCard = isset($_POST['i-card']) ? $_POST['i-card']: false;
            $claimTypeId = isset($_POST['claim_type']) ? $_POST['claim_type'] : false;            
            $claimDescription = isset($_POST['claim_description']) ? $_POST['claim_description'] : false;            
            //$imagen = isset($_POST['image']) ? $_POST['image'] : false;
            if($code && $date && $recurrent && $identificationCard && $claimTypeId && $claimDescription && $ticketId){
                $ticket = new Ticket();
                $ticket->setId($ticketId);
                $ticket->setCode($code);
                $ticket->setDate($date);
                $ticket->setRecurrent($recurrent);
                $ticket->setClaim_description($claimDescription);
                $ticket->setIdentification_card($identificationCard);
                $ticket->setClaim_type_id($claimTypeId);
                
                $update = $ticket->update();
                
                if($update){
                   $_SESSION['ticket'] = "OK"; 
                }else{
                    $_SESSION['ticket'] = "ERROR";
                }
                header("Location:".base_url.'ticket/index');
            }
        }
    }
    
}
