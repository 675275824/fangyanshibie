<?php
exec("ffmpeg -i input.amr input.wav");
exec("python enhance_speach.py");
?>