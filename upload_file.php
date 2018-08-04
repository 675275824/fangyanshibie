<?php
    $allowedEXts = array('amr');
    $temp = explode('.',$_FILES["file"]['name']);
    $extension = end($temp);
    $result;
    if($_FILES['file']['type'] == 'audio/amr' && in_array($extension, $allowedEXts)) {
         if (file_exists("upload/" . $_FILES["file"]["name"]))
         {
            exec('rm -f deal/spjsb.amr');
         }
         move_uploaded_file($_FILES["file"]["tmp_name"], "deal/" . $_FILES["file"]["name"]);
         exec('chmod 777 deal/spjsb.amr');
         exec('cd  deal && ffmpeg -i spjsb.amr spjsb.wav && chmod 777 spjsb.wav  && python3 enhance_speach.py && rm -f spjsb.wav && chmod 777 output.wav && python3 change.py && rm -f output.wav && chmod 777 output.pcm && mv output.pcm ../inference/1.getFB40/dataset && cd ../inference && cd 1.getFB40 && perl get_fb.pl dev_list_noVAD.txt fb40 20  && cd ../2.inferenceLSTM/ && python inference.py');
         $file = fopen('inference/2.inferenceLSTM/result/result.txt','r');
         $str = fgets($file);
         $str = str_replace("\n","",$str);
         $result = array('ok'=>$str);
         fclose($file);
    }else{
        $result = array('ok'=>'false');
    }
    echo json_encode($result);
?>