<?php

/****************************************
*######## RESTful WEB SERVICE ##########*
*                                                    *
* Client process the request VIA URL    *
* http://address.com/webservice.php?id=1*
* and gets the JSON result.             *
****************************************/



// Set Content-Type header to application/json
header("Content-Type:application/json");


// Check if the id has a value
if(!empty($_GET['id'])){

        // Get the id value in the variable
        $id=$_GET['id'];

        // Require db_check.php file (check the id in the database and get the name and the price)
        require_once("db_check.php");

        // If the name and the price are empty - id doesn't exist - car not found
        if(empty($title) && empty($availability)){
                        response(200, "media not found", NULL, NULL);
        }
        // If the name and the price aren't empty - id exists - car found
        else{
                        response(200, "media found" , $title, $availability);
        }
}

// If the id is not set - request is not valid
else {
                        response(400, "Invalid request", NULL, NULL);
        }


// Function for delivering a JSON response
function response($status,$status_message,$title,$data){
        
        /*HTTP 1.1 provides a persistent connection 
        that allows multiple requests to be batched 
        or pipelined to an output buffer */
        header("HTTP/1.1 $status $status_message");

        // $response array
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['title']=$title;
        $response['availability']=$data;

        //Generating JSON from the $response array
        $json_response=json_encode($response);

        // Outputting JSON to the client
        echo $json_response;
}

?>