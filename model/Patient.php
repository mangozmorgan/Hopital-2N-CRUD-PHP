<?php
session_start();
class Patient {
   
    public function getAllClients ($bdd,$page){
        $limit = 2;
        $offset = $limit * $page;
        $sqlAll = " SELECT * FROM patients ";
        $prepAll = $bdd->prepare($sqlAll);
        $prepAll -> execute();
        $responseCount = $prepAll->fetchAll(PDO::FETCH_OBJ);       
        $totalPatients= count($responseCount);


        $sqlGetterLimited = " SELECT * FROM patients LIMIT :limit OFFSET :offset";
        $prep = $bdd->prepare($sqlGetterLimited);
        $prep->bindValue('limit',$limit, PDO::PARAM_INT);
        $prep->bindValue('offset',$offset, PDO::PARAM_INT);
        $prep -> execute();
        $responseLimited = $prep->fetchAll(PDO::FETCH_ASSOC);



        $totalPages = $totalPatients / $limit;
        

        foreach ($responseLimited as $value) {
            echo "<div class='userCard'><div class='pic'></div><b>ID</b> : ".$value['id']."<br><b>Last Name</b> : ".$value['lastname']."<br>      <b>First Name</b> : ".$value['firstname']."<br>
                <b>Birth Date</b> : ".$value['birthdate']."<br>
                <b>Phone</b> : ".$value['phone'] ."<br>
                <b>Mail</b> : ".$value['mail']."<br>"."<div class='controlBtn'><a href='./?view=profilPatient&id=".$value['id']."'>Go profile</a><br><a href='./?view=deletePatient&id=".$value['id']."'>effacer profil</a><br><br></div></div>";
        }
        $numberPage= 0;
        $a=0;
        $pageArray= [];
        while ($a <$totalPages) {
             $numberPage++;
             array_push($pageArray,"<a href='./?view=listPatients&page=$a'>$numberPage</a><br>");
            
            $a++;
        }
        $_SESSION['pagesArray']= $pageArray;
        
        
    }

    public function insertClient($bdd,$lastName,$firstName,$birthDate,$phone,$mail){
        $sqlInsert = "INSERT INTO patients( lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)";

        $prep = $bdd->prepare($sqlInsert);
        $prep->execute([$lastName,$firstName,$birthDate,$phone,$mail]);
        echo " Client ajoute ";
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    public function getOnePatient($bdd,$id){
        $sqlOnePatient = "SELECT * FROM patients WHERE id = ?";
        $prep = $bdd->prepare($sqlOnePatient);
        $prep->execute([$id]);
        $response = $prep->fetchAll(PDO::FETCH_ASSOC);
        if(isset($response[0])){
            foreach ($response as $value) {
                echo "<div class='userCard'><b>ID</b> : ".$value['id']."<br><b>Last Name</b> : ".$value['lastname']."<br>      <b>First Name</b> : ".$value['firstname']."<br>
                    <b>Birth Date</b> : ".$value['birthdate']."<br>
                    <b>Phone</b> : ".$value['phone'] ."<br>
                    <b>Mail</b> : ".$value['mail']."<br><br></div>";
    
                $_SESSION["id"]=  $value['id']  ;
                $_SESSION["lastName"]  =  $value['lastname'];
                $_SESSION["firstName"] =   $value['firstname'];
                $_SESSION["birthDate"] =  $value['birthdate'] ;
                $_SESSION["phone"]  = $value['phone'] ;
                $_SESSION["mail"]  = $value['mail'] ;

                //header("location: ./?view=profilPatient&id=".$value['id']);
                    
            }

        }else{
            echo "Cet ID ne correspond a aucuns patients <br>";
        }
    }
    public function updatePatient($bdd,$id,$lastName,$firstName,$birthDate,$phone,$mail){
         $sqlInsert = "UPDATE patients SET lastname=?,firstname=?,birthdate=?,phone=?,mail=? WHERE id = ?";

        $prep = $bdd->prepare($sqlInsert);
        $prep->execute([$lastName,$firstName,$birthDate,$phone,$mail,$id]);
        
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    public function removePatient($bdd,$id){
          $sqlRemoveRdv = "DELETE FROM patients WHERE id = ?";

        $prep = $bdd->prepare($sqlRemoveRdv);
        $prep->execute([$id]);
        header("location:" . $_SERVER['HTTP_REFERER']);
    }

    public function getAllId($bdd){
         $sql = " SELECT id,firstname,lastname FROM patients";
        $prep = $bdd->prepare($sql);
        $prep -> execute();
        $arrayId=[];
        $response = $prep->fetchAll(PDO::FETCH_ASSOC); 
        
        foreach ($response as $key => $value) {
             $arrayId[]=$value;            
        }
        
       
        
        $_SESSION['arrayId']= $arrayId;
       // var_dump( $_SESSION['arrayId']);
        
    }
}