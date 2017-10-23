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
        $view->bild = $bilderRepository->readById(1);
        $view->display();
    }
}

?>
