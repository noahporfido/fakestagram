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
        
        $id = $_GET['id'];
        $name = $_POST['name'];
        $beschreibung = $_POST['beschreibung'];
        
        $bilderRepository->update($id,$name,$beschreibung);
        
        $view = new View('home');
        $view->title = 'Startseite';
        $view->heading = 'Startseite';
        $view->bilder = $bilderRepository->readAll();
        $view->display();
        
    }
}

?>
