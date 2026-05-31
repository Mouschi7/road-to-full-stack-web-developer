<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Basic Fundamentals of PHP</title>
</head>
<body>
      <!-- Echo -->
      <?php if (true) { ?>
      <p>Hello World!</p>
      <?php } ?>
      
      <p>This is an <?php echo "awesome" ?> paragraph!</p>
      <?php echo "This is also a paragraph!<br><br>"; ?>     
      
      <!-- Variables -->
      <?php
      $name = "Kristel Chloe";
      echo $name;
      ?>

      
      <?php

      // Scalar Data Types (contains one value)
      $string = "John";
      $int = 1234567890;
      $float = 1.1526;
      // 1 TRUE 0 FALSE
      $bool = true;

      // Array Types
      $array = ["Kristel", "Chloe", "John", "Clinton"];

      // Object Type
      // $object = new Car();

      // Defaults values if you don't know what values should be inside it

      $names = "";
      $string = "";
      $int = 0;
      $float = 0;
      $bool = false;

      $array = [];
      $object = null;
      ?>
      
      <!-- Examples -->
      <?php
      $name = "Kristel Chloe";
      $age = 19;

      $test = $name;
      ?>

      <p>Hi! My name is <?php echo $test; ?>, and I'm <?php echo $age ?> years old.</p>
</body>
</html>