<?php

require_once '../lib/Repository.php';

/**
 * Das UserRepository ist zuständig für alle Zugriffe auf die Tabelle "user".
 *
 * Die Ausführliche Dokumentation zu Repositories findest du in der Repository Klasse.
 */
class BilderRepository extends Repository
{
    /**
     * Diese Variable wird von der Klasse Repository verwendet, um generische
     * Funktionen zur Verfügung zu stellen.
     */
    protected $tableName = 'bilder';

    /**
     * Erstellt einen neuen benutzer mit den gegebenen Werten.
     *
     * Das Passwort wird vor dem ausführen des Queries noch mit dem SHA1
     *  Algorythmus gehashed.
     *
     * @param $firstName Wert für die Spalte firstName
     * @param $lastName Wert für die Spalte lastName
     * @param $email Wert für die Spalte email
     * @param $password Wert für die Spalte password
     *
     * @throws Exception falls das Ausführen des Statements fehlschlägt
     */
    public function create($name, $beschreibung, $datum, $bild)
    {
        


        $query = "INSERT INTO $this->tableName (name, name, beschreibung, bild) VALUES (?, ?, ?, ?)";


        $statement = ConnectionHandler::getConnection()->prepare($query);
        $statement->bind_param('ssss', $name, $beschreibung, $bild);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    
    public function update($id, $name, $beschreibung)
    {

        $query = "update $this->tableName set name=?, beschreibung=? where id = $id;";

        $statement = ConnectionHandler::getConnection()->prepare($query);
        if($statement === false)
            echo ConnectionHandler::getConnection()->error;
        $statement->bind_param('ss',$name, $beschreibung);

        if (!$statement->execute()) {
            throw new Exception($statement->error);
        }

        return $statement->insert_id;
    }
    
}
