<?php

function chart($beg, $end, $step, $result) {
    $width = 300;
    $height = 300;
    
    $image = imagecreatetruecolor($width, $height);
    imagefilledrectangle($image, 0, 0, $width, $height, imagecolorallocate($image, 255, 255, 255));
    
    $white = imagecolorallocate($image, 255, 255, 255);
    $gray = imagecolorallocate($image, 200, 200, 200);
    $black = imagecolorallocate($image, 50, 50, 50);
    $blue = imagecolorallocate($image, 47, 100, 214);
    
    $offset = 20;
    
    $len = $width-2*$offset;
    $count = ($end-$beg)/$step+1;
    
    for ($i=0; $i<$count; $i++) {
        imageline($image, $offset+($i+0.5)*($len/$count), $offset, $offset+($i+0.5)*($len/$count), $height-$offset+2, $gray);
        imagestring($image, 2, $offset+($i+0.5)*($len/$count)-5, $height-$offset+3, $beg+$i*$step, $black);
    }
    
    for ($i=1; $i<=6; $i++) {
        imageline($image, $offset-2, $width-$offset-($i-0.5)*$len/6, $width-$offset, $width-$offset-($i-0.5)*$len/6, $gray);
        imagestring($image, 2, $offset-15, $width-$offset-($i-0.5)*$len/6-7, 30+$i*10, $black);
    }
    
    imagesetthickness($image, 2);
    imageline($image, $offset, $offset, $offset, $height-$offset, $black);
    imageline($image, $offset, $height-$offset, $height-$offset, $height-$offset, $black);
    imagesetthickness($image, 2);
    
    $hSpace = $len-$len/$count;
    $rSpace = $len-$len/6;
    
    $store = [];
    
    while($row = ($result->fetch_assoc())) {
        $h = $row["xValue"];
        $r = $row["overall_rating"];
        
        if ($h==0 || $r==0)
            continue;
        
        if ($store[$h][$r]==0)
            $store[$h][$r]=5;
        
        $store[$h][$r]++;
        
        imagefilledellipse($image, $offset+$len/$count/2 + ($h-$beg)*$hSpace/($end-$beg), $height-$offset-$len/12 - ($r-40)*$rSpace/50, max(4, $store[$h][$r]/3), max(4, $store[$h][$r]/3), $blue);
    }
    
    imagefilter($image, IMG_FILTER_SMOOTH, 20);
    
    header('Content-Type: image/jpeg');
    
    imagejpeg($image);
    imagedestroy($image);
}

function enumChart($xVal, $xDesc, $result) {
    $width = 300;
    $height = 300;
    
    $image = imagecreatetruecolor($width, $height);
    imagefilledrectangle($image, 0, 0, $width, $height, imagecolorallocate($image, 255, 255, 255));
    
    $white = imagecolorallocate($image, 255, 255, 255);
    $gray = imagecolorallocate($image, 200, 200, 200);
    $black = imagecolorallocate($image, 50, 50, 50);
    $blue = imagecolorallocate($image, 47, 100, 214);
    
    $offset = 20;
    
    $len = $width-2*$offset;
    $count = count($xVal);
    
    for ($i=0; $i<$count; $i++) {
        imageline($image, $offset+($i+0.5)*($len/$count), $offset, $offset+($i+0.5)*($len/$count), $height-$offset+2, $gray);
        imagestring($image, 2, $offset+($i+0.5)*($len/$count)-10, $height-$offset+3, $xDesc[$i+1], $black);
    }
    
    for ($i=1; $i<=6; $i++) {
        imageline($image, $offset-2, $width-$offset-($i-0.5)*$len/6, $width-$offset, $width-$offset-($i-0.5)*$len/6, $gray);
        imagestring($image, 2, $offset-15, $width-$offset-($i-0.5)*$len/6-7, 30+$i*10, $black);
    }
    
    imagesetthickness($image, 2);
    imageline($image, $offset, $offset, $offset, $height-$offset, $black);
    imageline($image, $offset, $height-$offset, $height-$offset, $height-$offset, $black);
    imagesetthickness($image, 2);
    
    $hSpace = $len-$len/$count;
    $rSpace = $len-$len/6;
    
    $store = [];
    
    $beg = 1;
    $end = $count;
    $step = 1;
    
    while($row = ($result->fetch_assoc())) {
        $val = $row["xValue"];
        $h = $xVal[$val];
        
        $r = $row["overall_rating"];
        
        if ($h==0 || $r==0)
            continue;
        
        if ($store[$h][$r]==0)
            $store[$h][$r]=5;
        
        $store[$h][$r]++;
        
        imagefilledellipse($image, $offset+$len/$count/2 + ($h-$beg)*$hSpace/($end-$beg), $height-$offset-$len/12 - ($r-40)*$rSpace/50, max(4, $store[$h][$r]/6), max(4, $store[$h][$r]/6), $blue);
    }
    
    //imagefilter($image, IMG_FILTER_SMOOTH, 20);
    
    header('Content-Type: image/jpeg');
    
    imagejpeg($image);
    imagedestroy($image);
}

?>