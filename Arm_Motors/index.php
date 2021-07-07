<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <title>Robot Arm</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="app/Style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        // put your code here
       
        $Motor1 = filter_input(INPUT_POST, 'v1');
        $Motor2 = filter_input(INPUT_POST, 'v2');
        $Motor3 = filter_input(INPUT_POST, 'v3');
        $Motor4 = filter_input(INPUT_POST, 'v4');
        $Motor5 = filter_input(INPUT_POST, 'v5');
        $Motor6 = filter_input(INPUT_POST, 'v6');
        //Database connection
        $conn = new mysqli('localhost', 'root', '217044905', 'arm');
        if (isset(filter_input_array(INPUT_POST)['Save'])) {
            if ($conn->connect_error) {
                die('Connection Failed :' . $conn->connect_error);
            } else {

                $stmt = $conn->prepare("insert into motors(Motor1,Motor2,Motor3,Motor4,Motor5,Motor6)values(?,?,?,?,?,?)");
                $stmt->bind_param("iiiiii", $Motor1, $Motor2, $Motor3, $Motor4, $Motor5, $Motor6);
                $stmt->execute();
                echo"Data Entered Successfully...";
                $stmt->close();
                $conn->close();
            }
        }
        ?>
        
          <div class="title">Arm Control</div>
        <p id="m1">Motor 1</p>
        <p id="m2">Motor 2</p>
        <p id="m3">Motor 3</p>
        <p id="m4">Motor 4</p>
        <p id="m5">Motor 5</p>
        <p id="m6">Motor 6</p>
        
           
        <form action="index.php" method="Post">
           
            <p> <span id="value1"></span></p> 
            <p> <span id="value2"></span></p>
            <p> <span id="value3"></span></p>
            <p> <span id="value4"></span></p>
            <p> <span id="value5"></span></p>                    
            <p> <span id="value6"></span></p>
            
           
            <div class="slidecontainer" >
             
            <input type="range" min="1" max="180" value="50" class="slider" id="Range1" name="v1">
            <br><br><br><br>
            
            <input type="range" min="1" max="180" value="50" class="slider" id="Range2"  name="v2">
            <br><br><br><br>
            
            <input type="range" min="1" max="180" value="50" class="slider" id="Range3"  name="v3">
            <br><br><br><br>
            
            <input type="range" min="1" max="180" value="50" class="slider" id="Range4"  name="v4">
            <br><br><br><br>
            
            <input type="range" min="1" max="180" value="50" class="slider" id="Range5" name="v5">
            <br><br><br><br>
            
            <input type="range" min="1" max="180" value="50" class="slider" id="Range6" name="v6">
            <br><br><br><br>
         </div>
        
         <button class="button" id="btn1" type="submit" name="Save">Save</button>
         <button class="button" id="btn2">Run</button>
         
        </form>
        <script>
            
          var slider1 = document.getElementById("Range1");
          var output1 = document.getElementById("value1");
          output1.innerHTML = slider1.value;

          slider1.oninput = function() {
          output1.innerHTML = this.value;
         }
          
         
          var slider2 = document.getElementById("Range2");
          var output2 = document.getElementById("value2");
          output2.innerHTML = slider2.value;

          slider2.oninput = function() {
          output2.innerHTML = this.value;
      }
      
          var slider3 = document.getElementById("Range3");
          var output3 = document.getElementById("value3");
          output3.innerHTML = slider3.value;

          slider3.oninput = function() {
          output3.innerHTML = this.value;
      }
      
          var slider4 = document.getElementById("Range4");
          var output4 = document.getElementById("value4");
          output4.innerHTML = slider4.value;

          slider4.oninput = function() {
          output4.innerHTML = this.value;
      }
          var slider5 = document.getElementById("Range5");
          var output5 = document.getElementById("value5");
          output5.innerHTML = slider5.value;

          slider5.oninput = function() {
          output5.innerHTML = this.value;
          }
          
          var slider6 = document.getElementById("Range6");
          var output6 = document.getElementById("value6");
          output6.innerHTML = slider6.value;

          slider6.oninput = function() {
          output6.innerHTML = this.value;
          }
        </script>
          
    </body>
</html>
