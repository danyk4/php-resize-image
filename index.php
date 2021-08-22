<?php

  require_once ('./images.php');

  $src_file = 'IMG_2017.jpg';


  // image in square

  $fname = explode('.', $src_file);
  $dest_file = './img/' . $fname[0] . '-www.' . $fname[1];
  $square_size = 1000;

  imageToSquare($src_file,$dest_file,$square_size);

  //crop ebay

  $dest_file = './img/' . $fname[0] . '-ebay.' . $fname[1];
  $size = 2500;
  imageToRectangle($src_file, $dest_file, $size);

  //crop fb

  $dest_file = './img/' . $fname[0] . '-fb.' . $fname[1];
  $size = 1200;
  imageToRectangle($src_file, $dest_file, $size);
    
  
  
    