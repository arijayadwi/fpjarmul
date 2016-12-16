<?php
session_start();

$Nama = $_GET["nama"];
$Nama_low = $_GET["nama"]."_low";
$Nama_med = $_GET["nama"]."_med";
$Nama_high = $_GET["nama"]."_high";
$dir = $_SESSION["targetdir"];
$target = $_SESSION["targetfile"];
$bitrate = "800k";
$format = "mp4";
$sampling_rate = "16000";
$frame_rate = "30";
$low_res = "480*360";
$med_res = "640*480";
$high_res = "1024*720";
//$audio_ch = $_SESSION["audio_ch"];
//$resolusi = $_SESSION["resolusi_value"];
$output = "../video/";
// echo $Nama;
// echo $dir;
// echo $target;
// echo $bitrate;
$_SESSION["name"] = $Nama;
$_SESSION["output"] = $output;
$file =  $output.$Nama.".".$format;
$replace = str_replace(" ","_",$target);
$target2 =rename("$target", "$replace");
//echo $target2;

$output2 = exec("ffmpeg -i $replace -b:v 800k -r $frame_rate -s $low_res -ar $sampling_rate $output".$Nama_low.".$format");
$output3 = exec("ffmpeg -i $replace -b:v 1000k -r $frame_rate -s $med_res -ar $sampling_rate $output".$Nama_med.".$format");
$output4 = exec("ffmpeg -i $replace -b:v 1200k -r $frame_rate -s $high_res -ar $sampling_rate $output".$Nama_high.".$format");

//delete upload files
unlink($replace);

header('Location: index.php');

//echo $output2;
//$output = shell_exec('cartoon001.wav converted-upload.mp3');
//$output = exec("ffmpeg -i cartoon001.wav outputfile.mp3");
//echo "Done";
?>

<!DOCTYPE html>
<html>
<head><title>Converter</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            text-align: center;
            font-family: "Source Sans Pro", sans-serif;
            font-weight: 300;
            background: -webkit-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -moz-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -ms-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: -o-linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            background: linear-gradient(90deg, #FF512F 10%, #DD2476 90%);
            margin-top: 30vh;
        }

        .well {
            background-color: #fff !important;
            border-radius: 0 !important;
            border: none !important;
        }

        .well.login-box {
            width: 300px;
            margin: 50px auto;
        }
    </style>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12" >
            <img style="margin: 0 auto" class="img-responsive" src="Video.png" width="300px" height="300px">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well login-box">
                
                    <legend><h1>Video Converting Success!!</h1></legend>
                    <!-- <h3>Please identify yourself!</h3> -->
                    <label class="control-label">Name : <?php echo $Nama?>.<?php echo $format?></label><br>
                    <label>Size : <?php echo filesize($file)?> bytes</label><br>
                    <label>Compression Rate : <?php echo filesize($file)/filesize($replace)*100?>%</label>
                    <form action="downloadVideo.php" method="post" enctype="multipart/form-data">
                        
                        <input type="submit" class="btn btn-block" value="Download" name="submit"  />

                    </form>

            </div>
        </div>
    </div>
</div>
<span id="load" style="display: none"></span>

</body>

</html>