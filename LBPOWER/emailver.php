<?php

include('DBConnect.php');

$message = '';

if(isset($_GET['activation_code']))
{
 
    $getdata = mysqli_query($connect , "SELECT * FROM pass Where activation_code='" . $_GET['activation_code'] . "' ORDER BY SID DESC LIMIT 1") or die(mysqli_error($connect));
 
 if(mysqli_num_rows($getdata)>0)
 {
    $cum = mysqli_fetch_object($getdata);
    $emailStatus  = (int)$cum->status;

    echo" the st is ".$emailStatus;
  {
   if($emailStatus == '0'||$emailStatus == 0||$emailStatus == "0")
   {
    $update= mysqli_query($connect,"UPDATE  pass Set `status`= 1 Where activation_code='".$_GET['activation_code']."'");
    if($update)
    {
     $message = '<label class="text-success">Your Email Address Successfully Verified <br />You can login here - <a href="login.php">Login</a></label>';
    }
   }
   else
   {
    $message = '<label class="text-info">Your Email Address Already Verified</label>';
   }
  }
 }
 else
 {
  $message = '<label class="text-danger">Invalid Link</label>';
 }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Document</title>
            <style>
            
            
            .container {
          width: 100%;
          height: 100%;
          height: 100vh;
          overflow: hidden !important;
        }
        
        h1 {
          font-family: "Source Sans Pro", sans-serif;
          font-weight: bold;
          font-size: 90px;
          letter-spacing: 20px;
          text-transform: uppercase;
          text-align: center;
          color: #B5B5B5;
          margin: 0px;
          padding: 0px;
        }
        
        h2 {
          font-family: "Source Sans Pro", sans-serif;
          font-size: 30px;
          font-weight: 600;
          letter-spacing: 20px;
          text-transform: uppercase;
          text-align: center;
          color: #B5B5B5;
          line-height: 50px;
          padding: 0px;
          margin: 0px;
        }
        h2 a {
          color: #B5B5B5;
          text-decoration: none;
          border-bottom: 5px solid #B5B5B5;
          margin: 0;
          padding: 0;
        }
        h2 a span {
          letter-spacing: 0px !important;
          padding-right: 3px;
        }
        h2 a:hover {
          color: #808080;
          border-bottom: 5px solid #808080;
        }
        
        #scene ul {
          width: 100% !important;
          height: 100% !important;
          height: 100vh !important;
          overflow: hidden;
          position: relative;
        }
        
        .text {
          position: relative;
          top: 50%;
          -webkit-transform: translateY(-50%) !important;
          -ms-transform: translateY(-50%) !important;
          transform: translateY(-50%) !important;
          z-index: 3;
          display: block;
        }
        
        
        /* ---- reset ---- */
        
        body {
          margin: 0;
          font:normal 75% Arial, Helvetica, sans-serif;
        }
        
        canvas {
          display: block;
          vertical-align: bottom;
        }
        
        /* ---- particles.js container ---- */
        
        #particles-js {
          position: absolute;
          width: 100%;
          height: 100%;
          background-color: #30771d;
          background-image: url("");
          background-repeat: no-repeat;
          background-size: cover;
          background-position: 50% 50%;
        }
        
            
            </style>
        </head>
        <body>
                <div id="particles-js">
                        <canvas class="particles-js-canvas-el"  style="width: 100%; height: 100%;">
                        </canvas>
                      </div>
                      
                      <div class="container">
                        <div class="text">
                          <h1 style="text-shadow: -3px 0 0 rgba(26, 155, 43, 0.685),
                              3px 0 0 rgba(0,255,255,.7);"> LBPOWER Email Verification</h1>
                              <p><?php echo $message;?></p>
                          <h2 style="text-shadow: -3px 0 0 rgba(62, 168, 70, 0.7),
                              3px 0 0 rgba(0,255,255,.7);">Go <a href="login.php" target="_blank">login<span> page</span></a> </h2>
                        </div>
                      </div>
        
                      <script>
                   
        particlesJS('particles-js', {
            'particles': {
                'number': {
                    'value': 80,
                    'density': {
                        'enable': true,
                        'value_area': 800
                    }
                },
                'color': { 'value': '#ffffff' },
                'shape': {
                    'type': 'circle',
                    'stroke': {
                        'width': 0,
                        'color': '#000000'
                    },
                    'polygon': { 'nb_sides': 5 },
                    'image': {
                        'src': 'img/github.svg',
                        'width': 100,
                        'height': 100
                    }
                },
                'opacity': {
                    'value': 0.5,
                    'random': false,
                    'anim': {
                        'enable': false,
                        'speed': 1,
                        'opacity_min': 0.1,
                        'sync': false
                    }
                },
                'size': {
                    'value': 3,
                    'random': true,
                    'anim': {
                        'enable': false,
                        'speed': 40,
                        'size_min': 0.1,
                        'sync': false
                    }
                },
                'line_linked': {
                    'enable': true,
                    'distance': 150,
                    'color': '#ffffff',
                    'opacity': 0.4,
                    'width': 1
                },
                'move': {
                    'enable': true,
                    'speed': 6,
                    'direction': 'none',
                    'random': false,
                    'straight': false,
                    'out_mode': 'out',
                    'bounce': false,
                    'attract': {
                        'enable': false,
                        'rotateX': 600,
                        'rotateY': 1200
                    }
                }
            },
            'interactivity': {
                'detect_on': 'canvas',
                'events': {
                    'onhover': {
                        'enable': true,
                        'mode': 'grab'
                    },
                    'onclick': {
                        'enable': true,
                        'mode': 'push'
                    },
                    'resize': true
                },
                'modes': {
                    'grab': {
                        'distance': 140,
                        'line_linked': { 'opacity': 1 }
                    },
                    'bubble': {
                        'distance': 400,
                        'size': 40,
                        'duration': 2,
                        'opacity': 8,
                        'speed': 3
                    },
                    'repulse': {
                        'distance': 200,
                        'duration': 0.4
                    },
                    'push': { 'particles_nb': 4 },
                    'remove': { 'particles_nb': 2 }
                }
            },
            'retina_detect': true
        });
                      
                      </script>
                    <script src="js/particles.js"></script>   
        </body>
        </html>
</body>
</html>