<?php
$app->post('/adminlogin', function ($request, $response, $args) {
$result =  new stdClass();
$param =  $request->getParsedBody();
$userName = $param['userName'];
$password = $param['password'];
$db = new DbHandler();
$query = "select count(id) as count,token,id from login where type= 1 and userName ='".$userName."' and password ='".$password."'" ;
$dbresult  = $db->getOneRecord($query);

$token = $dbresult['token'];
$id = $dbresult['id'];

if( $dbresult['count']  == 1 ){
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);

    $query = "update login set token='".$token."' where id=". $dbresult['id'];
    $dbresult = $db->insert($query);

    $result->status = true ;
    $result->token =  $token;
}else {
        $result->status = false ;
}

echo json_encode($result);
});

$app->post('/addTeachar', function ($request, $response, $args) {
        
        
    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
    }
    
    $result =  new stdClass();
    $param =  $request->getParsedBody();
    $name = $param['name'];
    $presentrank = $param['presentrank'];
    $details = $param['details'];
    $dojo = $param['dojo'];
    $db = new DbHandler();
             
        $query = "insert into karateteachars (name,presentrank,details,dojo) values ('".$name."','".$presentrank."','".$details."','".$dojo."')";
 
        $dbresult = $db->insert($query);
        $result->status = true ;

    echo json_encode($result); 
});

$app->get('/teacherList', function ($request, $response, $args) {

    $result =  new stdClass();
    $db = new DbHandler();
    $query = "select * from karateteachars order by id desc";
    $dbresult = $db->getRecords($query);
    $result->status = true ;
    $result->data = $dbresult ;
    echo json_encode($result);
}); 
$app->post('/deleteteacher', function ($request, $response, $args) {
        
    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$id = $param['id'];

$db = new DbHandler();
$query = "delete from karateteachars where id =". $id ; 
$dbresult = $db->insert($query);   
$result->status = true ;
echo json_encode($result);

});
$app->post('/addStudent', function ($request, $response, $args) {
        
        
    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
    }
    
    $result =  new stdClass();
    $param =  $request->getParsedBody();
    $usn = $param['usn'];
    $name = $param['name'];
    $teacher = $param['teacher'];
    $rank1 = $param['rank1']?'1':'0';
    $rank2 = $param['rank2']?'1':'0';
    $rank3 = $param['rank3']?'1':'0';
    $rank4 = $param['rank4']?'1':'0';
    $rank5 = $param['rank5']?'1':'0';
    $rank6 = $param['rank6']?'1':'0';
    $rank7 = $param['rank7']?'1':'0';
    $rank8 = $param['rank8']?'1':'0';
    $rank9 = $param['rank9']?'1':'0';
    
             
    $query = "insert into karatestudents (usn,name,teacher,rank1,rank2,rank3,rank4,rank5,rank6,rank7,rank8,rank9) values ('".$usn."','".$name."','".$teacher."','".$rank1."','".$rank2."','".$rank3."','".$rank4."','".$rank5."','".$rank6."','".$rank7."','".$rank8."','".$rank9."')";
        $db = new DbHandler();
        $dbresult = $db->insert($query);
        if($dbresult !== 0){
        $result->status = true ;
        }else{
            $result->status = false ;   
        }
    echo json_encode($result); 
});

$app->get('/StudentList', function ($request, $response, $args) {

    $result =  new stdClass();
    $db = new DbHandler();
    $query = "select * from karatestudents order by id desc";
    $dbresult = $db->getRecords($query);
    $result->status = true ;
    $result->data = $dbresult ;
    echo json_encode($result);
}); 
$app->post('/deleteStudent', function ($request, $response, $args) {
        
    if(json_encode(getAdminUserId()) == "false" ){
    echo "no authentication";
    exit();
}

$result =  new stdClass();
$param =  $request->getParsedBody();
$id = $param['id'];

$db = new DbHandler();
$query = "delete from karatestudents where id =". $id ; 
$dbresult = $db->insert($query);   
$result->status = true ;
echo json_encode($result);

});
