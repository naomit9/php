<!doctype html>
<html>
<head>
   <title>PHP and For Loops</title> 
</head>
<body>
    
    <h1>PHP and For Loops</h1> 
    
    <p>Use PHP echo, if statements, and loops to output all three links.</p>
        
        
    <?php

    // **************************************************
    // Do not edit this code

    // Define a multi dimensional array to store all of the links
    $links = array (
        0 => array (
          'name' => 'Codecademy',
          'url' =>'https://www.codecademy.com/',
          'image' => '',
          'description' => 'Learn to code interactively, for free.' ),
        1 => array ( 
          'name' => '',
          'url' => 'https://www.w3schools.com/',
          'image' => 'w3schools.png',
          'description' => 'W3Schools is optimized for learning, testing, and training.' ),
        2 => array (
          'name' => 'Mozilla Developer Network',
          'url' => 'https://www.codecademy.com/',
          'image' => 'mozilla.png',
          'description' => 'The Mozilla Developer Network (MDN) provides information about Open Web technologies.' )
        );
        
    // **************************************************

    // Loop through the array and display the link information
    for ($i = 0; $i < count ($links); $i ++)
    { 
        if ($links[$i]['name' !== ""]) {
          echo '<h1>'.$links[$i]['name'].'</h1>';
      } else {
        echo '<h1>Name not found</h1>';
      }

        if ($links[$i]['url' !== ""]) {
          echo '<p>'.$links[$i]['url'] .'</p>';
        } else {
          echo '<p>URL not found</p>';
        }
        
        if ($link[$i]['image'] !== "") {
          echo '<img src="'.$links[$i]['image'].' "width="200">';
        } else {
          echo '<p>Image not found</p>';
        }

        if ($link[$i]['description'] !== "") {
          echo '<p>'.$links[$i]['description'].'</p>';
        } else {
          echo '<p>Description not found</p>';
        }
    }

    // Use the print_r function to view the contents of the array
    echo '<pre>';
    print_r ($links);
    echo '</pre>';
    
    ?>
    
</body>
</html>
