<?php
  
  function imageToSquare($src_file,$dest_file,$size,$quality=60) {
    
    $im = imagecreatefromjpeg($src_file);
    $oldx = imagesx($im);
    $oldy = imagesy($im);
  
    if ($oldx > $oldy) {
      $newx = $size;
      $newy = intval($oldy * $size / $oldx);
    } else {
      $newx = intval($oldx * $size / $oldy);
      $newy = $size;
    }
    
    $im2 = imagecreatetruecolor($newx, $newy);
    imagecopyresampled($im2, $im, 0, 0, 0, 0, $newx, $newy, $oldx, $oldy);
    
    // img into square
    $sq_image = imagecreatetruecolor($size, $size);
    $bg = imagecolorallocate($sq_image, 255, 255, 255);
    imagefilledrectangle($sq_image, 0, 0, $size, $size, $bg);
    
    // center image
    if ($newx > $newy) {
      $distx = 0;
      $disty = intval(($size - $newy) / 2);
    } elseif ($newy > $newx) {
      $distx = intval(($size - $newx) / 2);
      $disty = 0;
    } else {
      $distx = 0;
      $disty = 0;
    }
    
    // transparency
    $transp = 100;
  
    imagecopymerge($sq_image, $im2, $distx, $disty,0, 0, $newx, $newy, $transp);
    imagejpeg($sq_image,$dest_file,$quality);
  
    // free memory
    imagedestroy($im);
    imagedestroy($im2);
    imagedestroy($sq_image);
  }

  function imageToRectangle($src_file, $destination_file, $size) {
    $im = imagecreatefromjpeg($src_file);
    $oldx = imagesx($im);
    $oldy = imagesy($im);
    
    if ($oldx > $oldy) {
      $im2 = imagescale($im, $size, intval($oldy * $size / $oldx));
    } else {
      $im2 = imagescale($im, intval($oldx * $size / $oldy),$size);
    }
    
    if ($im2 !== FALSE) {
      imagejpeg($im2, $destination_file);
      imagedestroy($im2);
    }
    imagedestroy($im);
  }