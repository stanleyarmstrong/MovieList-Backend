<?php
$app->get('/api/lists', function(){
    require_once('dbconnect.php');
    $query = 'select * from movielist order by id';
    $result = $mysqli -> query($query);
    while($row = $result -> fetch_assoc()) {
        $data[] = $row;
    }
    if(isset($data)){
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    

});

$app-> get('api/books/{list_name}', function($request){
    require_once('dbconnect.php');
    $id = $request -> getAttribute('list_name');
    $query = 'select * from movielist where list_name=$id';
    $result = $mysqli -> query($query);
    $data[] = $result -> fetch_assoc();
    header('Content-Type: application/json');
    echo json_encode($data);
    
});
?>