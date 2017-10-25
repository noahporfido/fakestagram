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
    	$image = basename($_FILES["image"]["name"]);
        
        
        $target_dir = "uploadimages/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $bilderRepository->create($name,$beschreibung,$image);
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
    	
    	
    	
    	
    }
}

?>
