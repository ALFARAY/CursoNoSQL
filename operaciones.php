
<?php    
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);      
    
    $rows = $mng->executeQuery("mongoUserdb.usuarios", $query);
    
    //foreach ($rows as $row) {    
     //   echo "$row->email : $row->nombre <br>";
    //}
    echo "    Sentencia satisfactoria <br>  *************************************** <br>";
    
    
?>


<?php          
    
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");    
    $bulk = new MongoDB\Driver\BulkWrite;
    if( isset ($_POST['agregar'])){
        
        $correoC= $_POST['email'];
        $nameC= $_POST['nombre'];
       

        $doc = ['_id' => new MongoDB\BSON\ObjectID, 'email' => $correoC, 'nombre' => $nameC];
        $bulk->insert($doc);
        $mng->executeBulkWrite('mongoUserdb.usuarios', $bulk);
    }
    
    if( isset ($_POST['actualizar']))
    {
        

        $correoC= $_POST['email'];
        $nameC= $_POST['nombre'];
        $bulk->update(['email' => $correoC], ['$set' => ['nombre' =>  $nameC]]);
        $mng->executeBulkWrite('mongoUserdb.usuarios', $bulk);
    }
    
    if(isset ($_POST['eliminar']))
    { 
        
        $correoC= $_POST['email'];
        $nameC= $_POST['nombre'];
        $bulk->delete(['email' => $correoC]);   
        $mng->executeBulkWrite('mongoUserdb.usuarios', $bulk);
    } 
   

    if( isset ($_POST['mostrar'])){
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $query = new MongoDB\Driver\Query([]);      
    
    $rows = $mng->executeQuery("mongoUserdb.usuarios", $query);
    
    foreach ($rows as $row) {    
        echo "$row->email : $row->nombre <br>";
    }}
  
?>
<html>
    <a href="javascript:window.history.go(-1);">volver</a>
</html>
