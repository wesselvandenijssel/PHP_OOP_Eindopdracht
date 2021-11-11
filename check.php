<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profanity";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
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
    <?php 
    // echo $_POST['text'];?>
    <!-- <textarea>
            <?php 
            // if (empty ($message)){ 
            //             echo "No value!";;}
            //             else {
            //                 echo htmlspecialchars($str);} 
                            ?></textarea> -->

    </form>
    <a href="index.php">index</a>
    <?php
    if (isset($_POST['text'])){
      if (isset($_POST['gradation'])){
        if ($_POST['gradation'] == "one"){
$str = $_POST['text'];
str_replace("'", '', $str);
$words = explode(" ",$str);

// print_r (explode(" ",$str));
$exploded_array = explode('~', $str);

// $tags = explode('|' , $str);

// $count =count($tags);
//   echo 'Count is: '.$count .'</br>';
// $i = 1 ;
// foreach($tags as $key) {

//     echo $i.' '.$key .'</br>';
// $i++;
// }

foreach ($exploded_array as $element)
{
  //  echo $element;
   $elements = str_word_count($element);
  //  print_r ($exploded_array);
    for ($x = 0; $x <= ($elements -1); $x++) {
        // echo $x;
        $elementArray = $x;
    // echo "<br><br>The word is: " . "$words[$elementArray]"." <br>";
    $word = preg_replace('/\s+/', '', $words[$elementArray]);
    $sql = "SELECT word FROM profanity 
    WHERE word LIKE " . "'". "$word%" . "'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      $p = 0;
      while($row = mysqli_fetch_assoc($result)) {
        // echo "word: " . $row["word"]. "<br>";
        $p++;
            // echo $p;
            // echo "test";
            // preg_replace($row["word"], "", "*");
            $word_found = $row['word'];
            $new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '*', $word);
            $key = array_search($word_found, $exploded_array);
            $length = strlen($word_found) - 1;
            $replace = array($key => $new_word);
            // echo $word_found;
            // print_r($replace);
            $exploded_array = array_replace($exploded_array, $replace);
            // print_r($exploded_array);
            $words[$elementArray] = $new_word;
            // echo $new_word;
      }
    } else {
      // echo "0 results";
    }
    // echo $sql;
  }
  $new_string = implode(" ", $words);  
  mysqli_close($conn);   
}
// $str = 'Visit Microsoft!';
// $pattern = '/microsoft/i';
// echo preg_replace($pattern, '***', $str);
?>
    <p id="demo"><?php echo $new_string; ?></p>
    <?php
    }
    if ($_POST['gradation'] == "two"){
      $str = $_POST['text'];
      str_replace("'", '', $str);
      $words = explode(" ",$str);
      
      // print_r (explode(" ",$str));
      $exploded_array = explode('~', $str);
      
      // $tags = explode('|' , $str);
      
      // $count =count($tags);
      //   echo 'Count is: '.$count .'</br>';
      // $i = 1 ;
      // foreach($tags as $key) {
      
      //     echo $i.' '.$key .'</br>';
      // $i++;
      // }
      
      foreach ($exploded_array as $element)
      {
        //  echo $element;
         $elements = str_word_count($element);
        //  print_r ($exploded_array);
          for ($x = 0; $x <= ($elements -1); $x++) {
              // echo $x;
              $elementArray = $x;
          // echo "<br><br>The word is: " . "$words[$elementArray]"." <br>";
          $word = preg_replace('/\s+/', '', $words[$elementArray]);
          $sql = "SELECT word FROM profanity 
          WHERE word LIKE " . "'". "$word" . "'";
          $result = mysqli_query($conn, $sql);
      
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            $p = 0;
            while($row = mysqli_fetch_assoc($result)) {
              // echo "word: " . $row["word"]. "<br>";
              $p++;
                  // echo $p;
                  // echo "test";
                  // preg_replace($row["word"], "", "*");
                  $word_found = $row['word'];
                  $new_word = preg_replace('/(?!^.?).(?!.{0}$)/', '*', $word);
                  $key = array_search($word_found, $exploded_array);
                  $length = strlen($word_found) - 1;
                  $replace = array($key => $new_word);
                  // echo $word_found;
                  // print_r($replace);
                  $exploded_array = array_replace($exploded_array, $replace);
                  // print_r($exploded_array);
                  $words[$elementArray] = $new_word;
                  // echo $new_word;
            }
          } else {
            // echo "0 results";
          }
          // echo $sql;
        }
        $new_string = implode(" ", $words);  
        mysqli_close($conn);   
      }
      // $str = 'Visit Microsoft!';
      // $pattern = '/microsoft/i';
      // echo preg_replace($pattern, '***', $str);
      ?>
    <p id="demo"><?php echo $new_string; ?></p>
    <?php
          }
          if ($_POST['gradation'] == "three"){
            $str = $_POST['text'];
            str_replace("'", '', $str);
            $words = explode(" ",$str);
            
            // print_r (explode(" ",$str));
            $exploded_array = explode('~', $str);
            
            // $tags = explode('|' , $str);
            
            // $count =count($tags);
            //   echo 'Count is: '.$count .'</br>';
            // $i = 1 ;
            // foreach($tags as $key) {
            
            //     echo $i.' '.$key .'</br>';
            // $i++;
            // }
            
            foreach ($exploded_array as $element)
            {
              //  echo $element;
               $elements = str_word_count($element);
              //  print_r ($exploded_array);
                for ($x = 0; $x <= ($elements -1); $x++) {
                    // echo $x;
                    $elementArray = $x;
                // echo "<br><br>The word is: " . "$words[$elementArray]"." <br>";
                $word = preg_replace('/\s+/', '', $words[$elementArray]);
              }
              $new_string = implode(" ", $words);  
              mysqli_close($conn);   
            }
            // $str = 'Visit Microsoft!';
            // $pattern = '/microsoft/i';
            // echo preg_replace($pattern, '***', $str);
            ?>
    <p id="demo"><?php echo $new_string; ?></p>
    <?php
                }
        }}
    ?>
</body>

</html>