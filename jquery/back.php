<?php 

if(isset($_POST['p'])){
    echo json_encode($_POST['p']); die;
}
else{
 $response = [ 'error' => 'No input specified'];
echo json_encode($response); die;
}

?>
