<script src="https://kit.fontawesome.com/5c2fb5233c.js" crossorigin="anonymous"></script>
<?php
function showAll($path, &$newstring){
    $data = scandir($path);
    // print_r($data);
    $newstring .= '<ul>';
    foreach($data as $key=>$value){
        if($value != '.' && $value != '..'){
            $dir = $path . '/' . $value;
            if(is_dir($dir)){
                $newstring .= '<li > <i class="far fa-folder-open"></i> ' . $value;
                showAll($dir, $newstring);
                $newstring .= '</li>';
            }else{
                $ext=  pathinfo($value,PATHINFO_EXTENSION);
                if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png'){
                    $newstring .= '<li> <i class="fas fa-image"></i> ' . $value . '</li>';
                }else if($ext == 'mp3' || $ext == 'wav'){
                    $newstring .= '<li> <i class="fas fa-music"></i> ' . $value . '</li>';
                }else if($ext == 'ini' || $ext == 'txt' || $ext == 'xml'){
                    $newstring .= '<li> <i class="far fa-file-alt"></i> ' . $value . '</li>';
                }else if ($ext == 'mp4' || $ext == 'mov' || $ext == 'avi'){
                    $newstring .= '<li> <i class="fas fa-video"></i> ' . $value . '</li>';
                }
            }
        }
    }
    $newstring .= '</ul>';
    // return $newstring;
}
showAll('.',$newString);
echo $newString;
?>