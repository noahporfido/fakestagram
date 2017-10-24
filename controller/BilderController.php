<?php
    require_once '../repository/BilderRepository.php';

class BilderController
{ 
    public function edit()
    {
        $bilderRepository = new BilderRepository();
        
        
        $view = new View('edit');
        $view->title = 'Bild Bearbeiten';
        $view->heading = 'Bild Bearbeiten';
        $view->bild = $bilderRepository->readById($_GET["id"]);
        $view->display();
    }
    
    public function update(){
        
        $bilderRepository = new BilderRepository();
        
        $id = htmlspecialchars($_GET['id']);
        $name = htmlspecialchars($_POST['name']);
        $beschreibung = htmlspecialchars($_POST['beschreibung']);
        
        $bilderRepository->update($id,$name,$beschreibung);
        
        header("Location: /home"); 
        
    }
    
    public function create(){
    	$bilderRepository = new BilderRepository();
    	
    	
    	$name = htmlspecialchars($_POST['name']);
    	$beschreibung = htmlspecialchars($_POST['beschreibung']);
    	$image = htmlspecialchars($_POST['image']);
    	
    	$bilderRepository->create($name,$beschreibung,$image);
    	
    	
    }
}

?>
