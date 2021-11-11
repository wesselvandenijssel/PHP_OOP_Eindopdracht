<?php
$connection = mysqli_connect( 'localhost', 'root', '' );
if ( !$connection ) {
    die( 'Database Connection Failed' . mysqli_error( $connection ) );
}
$select_db = mysqli_select_db( $connection, 'profanity' );
if ( !$select_db ) {
    die( 'Database Selection Failed' . mysqli_error( $connection ) );
}
$query = 'SELECT word FROM profanity';

$result = mysqli_query( $connection, $query );
$stack = array();
while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) {
    array_push( $stack, $row );
}
//Stop the code here if you just want it as a PHP array 
//(Don't forget the PHP closing tag) if you do that though
//If you want to carry on and convert the PHP array to a JavaScript array
//Include the rest of this code

// $theArray = json_encode( $stack );
// print_r($stack);

// echo serialize($theArray);
// ?>
<!-- <script> -->
<!-- // var theArray = <//?php echo $theArray ?> ;
// console.log(theArray); -->
<!-- </script> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>

<body>
    <form action="check.php" method="POST">
        <textarea name="text" id="text" cols="30" rows="10">Hello world. It's a beautiful day</textarea><br>
        <!-- <button onclick="check()" id="button">Submit</button><br> -->
        <input type="submit" name="button" value="Check"><br>
                
    </form>

    
    
        <!-- // if(array_key_exists('button', $_POST)) {
        //     button1();
        // }
        // function button1() {
        //     if (isset($_POST['text'])) {
        //         // Escape any html characters
        //         echo htmlentities($_POST['text']);
        //         echo "test";
        //     }
        // } -->


<?php
// $str = "Hello world. It's a beautiful day.";
// print_r (explode(" ",$str));
// $exploded_array = explode('~', $str);
// foreach ($exploded_array as $element)
// {
//    echo $element;
//    print_r ($exploded_array);
   
// }
// $str = 'Visit Microsoft!';
// $pattern = '/microsoft/i';
// echo preg_replace($pattern, '***', $str);
?>
    <p id="demo"></p>
</body>

</html>