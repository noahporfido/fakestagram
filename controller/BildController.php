<?php
    require_once '../repository/BilderRepository.php';

class BildController
{ 
    public function edit()
    {
        $bilderRepository = new BilderRepository();
        
        $view = new View('edit');
        $view->title = 'Bild Bearbeiten';
        $view->bild = $bilderRepository->readById($_GET["id"]);
        $view->display();
    }
    
    public function update(){
        
        $bilderRepository = new BilderRepository();
        
        $id = htmlspecialchars($_GET['id']);
        $name = htmlspecialchars($_POST['name']);
        $beschreibung = htmlspecialchars($_POST['beschreibung']);
        
        $bilderRepository->update($id,$name,$beschreibung);
        
        header("Location: /"); 
        
    }
    
    public function create(){
    	$bilderRepository = new BilderRepository();
    	
        $name = htmlspecialchars($_POST['name']);
    	$beschreibung = htmlspecialchars($_POST['beschreibung']);
    	$image = basename($_FILES["image"]["name"]);
        $view = new View('uploadet');
        $view->title = "upload";
        
        $target_dir = "uploadimages/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $view->message = 'Die Datei ist kein Bild';
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            $view->message = 'Das Bild existiert bereits';
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            $view->icon = 'error';
            $view->button = 'Nochmals probieren';
            $view->display();
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $bilderRepository->create($name,$beschreibung,$image);
                
                $view->message = 'Bild erfolgreich hochgeladen';
                $view->icon = 'success';
                $view->button = 'Nächstes Bild hochladen';
                $view->display();
                
            } else {
                $view->message = 'Es gab ein Fehler beim hochladen des bildes';
                $view->icon = 'error';
                $view->button = 'Nochmals probieren';
                $view->display();
            }
        }
    }
    
    public function hinzufuegen()
    {
        // In diesem Fall möchten wir dem Benutzer die View mit dem Namen
        //   "default_index" rendern. Wie das genau funktioniert, ist in der
        //   View Klasse beschrieben.
        $view = new View('hinzufuegen');
        $view->title = 'Bild hinzufügen';
        $view->display();
    }
    
    public function delete(){
        $bilderRepository = new BilderRepository();
        
        $id = $_POST['elementid'];
        $name = $bilderRepository->readById($id);
        unlink("uploadimages/$name->bild");
        $bilderRepository->deleteById($id);
    }
    
    public function search(){
        $bilderRepository = new BilderRepository();
        //var_dump($_POST);
        $row = $bilderRepository->search($_POST['text']);
        
        //echo $row;
        $arr = (array) $row;
        //var_dump($arr);
        echo json_encode($arr);
        //$text = $_POST['text'];
    }
    
    public function next(){
        $bilderRepository = new BilderRepository();
        $row = $bilderRepository->readAll();
        $arr = (array) $row;
        echo json_encode($arr);
        
    }
}

?>
