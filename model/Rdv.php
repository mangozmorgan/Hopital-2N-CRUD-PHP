<?php

class Rdv{
    public function addRdv($bdd,$dateHeure,$idPatient){
        $sqlAddRdv = "INSERT INTO appointments( dateHour, idPatients) VALUES (?,?) ";

        $prep = $bdd->prepare($sqlAddRdv);
        $prep->execute([$dateHeure,$idPatient]);
        echo " Rendez vous ajoute ";
        
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    public function getRdv($bdd){
        $sqlAddRdv = "SELECT * FROM appointments";

        $prep = $bdd->prepare($sqlAddRdv);
        $prep->execute();
        $response = $prep->fetchAll(PDO::FETCH_ASSOC);

        foreach ($response as $row){
            echo "<div class='userCard'><b>ID rendez vous</b> : ".$row['id']."<br><b>Rendez vous le</b> : ".$row['dateHour']." <br><b> ID patient </b>: "."
            <a class='goById' href='./?view=profilPatient&id=".$row['idPatients']."'>".$row['idPatients']." </a>
            <br><div class='controlBtn'><a href='./?view=rendezVous&id=".$row['id']."'>Voir le rendez vous 
            
            </a><a href='./?view=deleteRendezVous&id=".$row['id']."'>Supprimer le rendez vous</a><br><br></div></div>";
        }
    }

    public function selectOne($bdd,$id){
        $sqlOneRdv = "SELECT * FROM appointments WHERE id = ?";
        $prep = $bdd->prepare($sqlOneRdv);
        $prep->execute([$id]);
        $response = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($response as $row) {
            echo "<div class='userCard'<b>ID rendez vous</b> : ".$row['id']."<br><b>Rendez vous le</b> : ".$row['dateHour']." <br><b> ID patient </b>: <a class='goById' href='./?view=profilPatient&id=".$row['idPatients']."'>".$row['idPatients']." </a><br></div>";

            $_SESSION["id"]=  $row['id']  ;
            $splitArray = explode(" ", $row['dateHour']);           
            $_SESSION["date"] =  $splitArray[0] ;
            $_SESSION["heure"]  =  $splitArray[1] ;
            $_SESSION["idPatient"]  = $row['idPatients'] ;
                
        }
    }

    public function selectOwnRdv($bdd,$id){
         $sqlOwnRdv = "SELECT * FROM appointments WHERE idPatients = ?";
        $prep = $bdd->prepare($sqlOwnRdv);
        $prep->execute([$id]);
        $response = $prep->fetchAll(PDO::FETCH_ASSOC);
        foreach ($response as $row) {
            echo "<b>Rendez vous le</b> : ".$row['dateHour']." <br>";
        }
    }    

    public function modifyRdv($bdd,$dateModif,$idPatientModif,$id){
         $sqlModifyRdv = "UPDATE appointments SET dateHour=?,idPatients=? WHERE id = ?";

        $prep = $bdd->prepare($sqlModifyRdv);
        $prep->execute([$dateModif,$idPatientModif,$id]);
        echo " Rendez vous modifie ";
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    public function removeRdv($bdd,$id){
          $sqlRemoveRdv = "DELETE FROM appointments WHERE id = ?";

        $prep = $bdd->prepare($sqlRemoveRdv);
        $prep->execute([$id]);
        echo " Rendez vous supprime ";
        header("location:" . $_SERVER['HTTP_REFERER']);
    }
}