<?php require("include/top.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>>Mercury Training certificates</title>
    <style>
    

    * {
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -o-box-sizing: border-box;
        box-sizing: border-box;
    }

    body{
        padding: 0;
        margin:0;
        background-color: #eee;
    }

      
        .cer{
            
            background-size: 50% 100%;
            background-repeat: no-repeat;
            background-position: left;
            width: 100%;
            height:100vh;
           
        }

       .cer aside{
        float: right;
        height: 100%;
        width: 25%;
        background-color: #004B52;
        border-left: 15px solid #d4a90c;
        text-align: center;
       }

    .cer aside img{
        width: 100%;
        padding: 20%;
    }
       .cer .text{
           float :left;
           width: 75%;
           background:url("certificate.M2.png") bottom left no-repeat;
           background-size: 100% auto;
           height: 100vh; 
       }

       .cer .text h1{
        color: #d7b846;
        text-transform: uppercase;
        font-size: 5em;
        text-align: center;
        margin-bottom: -30px;
        }



        .cer .text h2{
        color: #7d7d7d;
        text-transform: uppercase;
        font-size: 30px;
        text-align: center;
        }
        

        .info{
            font-size: 2.5em;
            color:  #525252;
            font-weight: bold;
            margin-top: 60px;
            text-align: center;
        }
        .info1{
            
            font-weight: normal !important;
         
        }

        .info .s{
            color: #004b52;
        }

        .cer .text .e{
            width : 235px;
            height: 200px;
            margin-left: 80px;
            margin-top: 60px;
        }

        

        .cer .text .e img{
           max-width :100%;
           height: 100%;
           overflow: hidden;
       }

       @media (min-width:992px) and (max-width:1199px){
            .info{
                font-size: 1.8em;
                margin-top: 100px;
            }
            .cer .text h1{
                font-size: 4em;
            }
        }

        @media (min-width:768px) and (max-width:991px){
            .info{
                font-size: 1.5em;
                margin-top: 130px;
            }
            .cer .text h1{
                font-size: 3em;
            }
        }

        @media  (max-width:768px){
          
            .info{
                font-size: 1.5em;
                margin-top: 100px;
                text-align: center;
            }
            .cer .text{
                width:100%;
            }
            .cer .text h1{
                font-size: 3.5em;
            }
            .cer .text h2{
                font-size: 24px;    
            }
            .cer .text .e{
            width : 200px;
            height: 170px;
            text-align: center;
            margin-top: 60px;
            }
            .cer aside{width:100%;height:200px;border-left:0;border-bottom:15px solid #d4a90c;padding: 30px;}
            .cer aside img{padding:0;width:200px}
            
        }
       
        

      
    </style>

</head>

<body>

<?php require("include/body.php"); ?>


</body>

</html><?php mysqli_close($conn); ?>