<?php
    error_reporting(0);

    session_start();
    
    if (!isset($_SESSION) || $_SESSION['type'] != 'user') {
        header('location:signin.php');
    }

    include('external_links.php');
    include('db_file/db_conn.php');

   
    $api_url = "http://data.fixer.io/api/latest?access_key=344127013af887479191ae25afbbc349";
    $ch = curl_init($api_url);

    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    if($e = curl_error($ch)){
        
    }
    else{
        $decoded = json_decode($response, true);
        //print_r($response);
        $d_len = count($decoded['rates']);
        //print_r($d_len);
//        foreach( $decoded['rates'] as $key => $value) {  
//            echo "Index: " . $key . " Value: " . $value . "\n";  
//        } 
  
        
//        $a = array($response);
//        print_r($a);
//        $str_arr = explode (",", $response); 
//        //echo gettype($str_arr);
//        
//        
//        $s = implode(" ",$str_arr);
//       // echo gettype($s);
//        
//        $a =  str_replace('{', '', $s);
//        //echo $a;
//        
//        $b =  str_replace('}', '', $a);
//        //echo $b;
//        
//        $arr = explode(",",$response);
//        print_r($arr);
//        print(count($arr));
//        print_r($arr['rates']);
//        for($i = 0; $i<count($arr); $i++){
//            //print_r("zz");
//            
//        }
        
        
        
    }
    curl_close($ch);

    
    

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock info || phd capital</title>
    <link rel="stylesheet" href="assets/stock_data.css">
    <link rel="shortcut icon" type="image/x-icon" href="assets/icon/phd_icon.ico">
    <style>
        .text-center{
            font-family: 'Josefin Sans', sans-serif;
        }
        
        body{
            background: url(assets/img/stock.jpg) no-repeat;
            background-size: cover;
            background-attachment: fixed;
            background-position: center center;
        }
        
     
        
    </style>
    
    

    
</head>
    
<body>   
    
    <h1 id="demo" class="text-center " style="margin-top: 25px; color: rgb(237, 209, 73)"></h1>
       
    <div class="row" style="padding: 10px;">
        <div class="col-lg-6 col-12">
            <table class="table table-dark table-striped" style=" opacity: .8">
              <thead class="text-center" style="opacity: 1">
                  <tr>
                    <th colspan="2">
                        FOREX REPORT TODAY
                    </th>
                  </tr>
                <tr>
                  <th scope="col"><i class="fa fa-minus" aria-hidden="true" style="font-size: 25px"></i></th>
                  <th scope="col"><i class="fa fa-stack-exchange" aria-hidden="true" style="font-size: 25px"></i></th>               
                </tr>
              </thead>
              <tbody class="text-center" style="color: rgb(237, 209, 73)">
                  
                  <tr>
                      <td><?php echo AED ?></td>
                      <td><?php echo $decoded['rates']['AED'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo AFN ?></td>
                      <td><?php echo $decoded['rates']['AFN'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo ALL ?></td>
                      <td><?php echo $decoded['rates']['ALL'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo AMD ?></td>
                      <td><?php echo $decoded['rates']['AMD'] ?></td>
                  </tr>  <tr>
                      <td><?php echo ANG ?></td>
                      <td><?php echo $decoded['rates']['ANG'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo AOA ?></td>
                      <td><?php echo $decoded['rates']['AOA'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo ARS ?></td>
                      <td><?php echo $decoded['rates']['ARS'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo AUD ?></td>
                      <td><?php echo $decoded['rates']['AUD'] ?></td>
                  </tr>  
                  <tr>
                      <td><?php echo AWG ?></td>
                      <td><?php echo $decoded['rates']['AWG'] ?></td>
                  </tr> 
                  
                  
                  
                  <tr>
                      <td><?php echo AZN ?></td>
                      <td><?php echo $decoded['rates']['AZN'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BAM ?></td>
                      <td><?php echo $decoded['rates']['BAM'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BBD ?></td>
                      <td><?php echo $decoded['rates']['BBD'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BDT ?></td>
                      <td><?php echo $decoded['rates']['BDT'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BGN ?></td>
                      <td><?php echo $decoded['rates']['BGN'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BHD ?></td>
                      <td><?php echo $decoded['rates']['BHD'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BIF ?></td>
                      <td><?php echo $decoded['rates']['BIF'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BMD ?></td>
                      <td><?php echo $decoded['rates']['BMD'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BND ?></td>
                      <td><?php echo $decoded['rates']['BND'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BOB ?></td>
                      <td><?php echo $decoded['rates']['BOB'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BRL ?></td>
                      <td><?php echo $decoded['rates']['BRL'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BSD ?></td>
                      <td><?php echo $decoded['rates']['BSD'] ?></td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      <td><?php echo BTC ?></td>
                      <td><?php echo $decoded['rates']['BTC'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BTN ?></td>
                      <td><?php echo $decoded['rates']['BTN'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BWP ?></td>
                      <td><?php echo $decoded['rates']['BWP'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BYN ?></td>
                      <td><?php echo $decoded['rates']['BYN'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BYR ?></td>
                      <td><?php echo $decoded['rates']['BYR'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo BZD ?></td>
                      <td><?php echo $decoded['rates']['BZD'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CAD ?></td>
                      <td><?php echo $decoded['rates']['CAD'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CDF ?></td>
                      <td><?php echo $decoded['rates']['CDF'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CLF ?></td>
                      <td><?php echo $decoded['rates']['CLF'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CLP ?></td>
                      <td><?php echo $decoded['rates']['CLP'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CNY ?></td>
                      <td><?php echo $decoded['rates']['CNY'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo COP ?></td>
                      <td><?php echo $decoded['rates']['COP'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CVE ?></td>
                      <td><?php echo $decoded['rates']['CVE'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo CZK ?></td>
                      <td><?php echo $decoded['rates']['CZK'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo DJF ?></td>
                      <td><?php echo $decoded['rates']['DJF'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo DOP ?></td>
                      <td><?php echo $decoded['rates']['DOP'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo EUR ?></td>
                      <td><?php echo $decoded['rates']['EUR'] ?></td>
                  </tr> 
                  <tr>
                      <td><?php echo ERN ?></td>
                      <td><?php echo $decoded['rates']['ERN'] ?></td>
                  </tr>                   
                  <tr>
                      <td><?php echo FJD ?></td>
                      <td><?php echo $decoded['rates']['FJD'] ?></td>
                  </tr>
                 
                  
                  
                  
                  <tr>
                      <td><?php echo GBP ?></td>
                      <td><?php echo $decoded['rates']['GBP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo GGP ?></td>
                      <td><?php echo $decoded['rates']['GGP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo GHS ?></td>
                      <td><?php echo $decoded['rates']['GHS'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo GNF ?></td>
                      <td><?php echo $decoded['rates']['GNF'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo GTQ ?></td>
                      <td><?php echo $decoded['rates']['GTQ'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo HKD ?></td>
                      <td><?php echo $decoded['rates']['HKD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo HNL ?></td>
                      <td><?php echo $decoded['rates']['HNL'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo HRK ?></td>
                      <td><?php echo $decoded['rates']['HRK'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo HUF ?></td>
                      <td><?php echo $decoded['rates']['HUF'] ?></td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      <td><?php echo IDR ?></td>
                      <td><?php echo $decoded['rates']['IDR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo ILS ?></td>
                      <td><?php echo $decoded['rates']['ILS'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo INR ?></td>
                      <td><?php echo $decoded['rates']['INR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo IRR ?></td>
                      <td><?php echo $decoded['rates']['IRR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo JMD ?></td>
                      <td><?php echo $decoded['rates']['JMD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo JOD ?></td>
                      <td><?php echo $decoded['rates']['JOD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo KHR ?></td>
                      <td><?php echo $decoded['rates']['KHR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo KHR ?></td>
                      <td><?php echo $decoded['rates']['KHR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo KYD ?></td>
                      <td><?php echo $decoded['rates']['KYD'] ?></td>
                  </tr>
                  
                  
                  
                  
                  <tr>
                      <td><?php echo LAK ?></td>
                      <td><?php echo $decoded['rates']['LAK'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo LBP ?></td>
                      <td><?php echo $decoded['rates']['LBP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo LKR ?></td>
                      <td><?php echo $decoded['rates']['LKR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo LTL ?></td>
                      <td><?php echo $decoded['rates']['LTL'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo LYD ?></td>
                      <td><?php echo $decoded['rates']['LYD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo MAD ?></td>
                      <td><?php echo $decoded['rates']['MAD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo MKD ?></td>
                      <td><?php echo $decoded['rates']['MKD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo MOP ?></td>
                      <td><?php echo $decoded['rates']['MOP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo MWK ?></td>
                      <td><?php echo $decoded['rates']['MWK'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo NAD ?></td>
                      <td><?php echo $decoded['rates']['NAD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo NIO ?></td>
                      <td><?php echo $decoded['rates']['NIO'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo NOK ?></td>
                      <td><?php echo $decoded['rates']['NOK'] ?></td>
                  </tr>
                  
                  
                  
                  
                  
                  <tr>
                      <td><?php echo NZD ?></td>
                      <td><?php echo $decoded['rates']['NZD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo OMR ?></td>
                      <td><?php echo $decoded['rates']['OMR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo PGK ?></td>
                      <td><?php echo $decoded['rates']['PGK'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo RON ?></td>
                      <td><?php echo $decoded['rates']['RON'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo RSD ?></td>
                      <td><?php echo $decoded['rates']['RSD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo RUB ?></td>
                      <td><?php echo $decoded['rates']['RUB'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo SAR ?></td>
                      <td><?php echo $decoded['rates']['SAR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo SBD ?></td>
                      <td><?php echo $decoded['rates']['SBD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo SCR ?></td>
                      <td><?php echo $decoded['rates']['SCR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo SHP ?></td>
                      <td><?php echo $decoded['rates']['SHP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo SOS ?></td>
                      <td><?php echo $decoded['rates']['SOS'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo STD ?></td>
                      <td><?php echo $decoded['rates']['STD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo THB ?></td>
                      <td><?php echo $decoded['rates']['THB'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo TOP ?></td>
                      <td><?php echo $decoded['rates']['TOP'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo UGX ?></td>
                      <td><?php echo $decoded['rates']['UGX'] ?></td>
                  </tr>
                  
                  <tr>
                      <td><?php echo USD ?></td>
                      <td><?php echo $decoded['rates']['USD'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo VEF ?></td>
                      <td><?php echo $decoded['rates']['VEF'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo VUV ?></td>
                      <td><?php echo $decoded['rates']['VUV'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo WST ?></td>
                      <td><?php echo $decoded['rates']['WST'] ?></td>
                  </tr>

                  
                  
                  
                  
                  <tr>
                      <td><?php echo XAG ?></td>
                      <td><?php echo $decoded['rates']['XAG'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo XDR ?></td>
                      <td><?php echo $decoded['rates']['XDR'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo YER ?></td>
                      <td><?php echo $decoded['rates']['YER'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo ZMK ?></td>
                      <td><?php echo $decoded['rates']['ZMK'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo ZMW ?></td>
                      <td><?php echo $decoded['rates']['ZMW'] ?></td>
                  </tr>
                  <tr>
                      <td><?php echo ZWL ?></td>
                      <td><?php echo $decoded['rates']['ZWL'] ?></td>
                  </tr>
                  
                  
                  
                  
              </tbody>
            </table>
        </div>
        
        <div class="col-lg-6 col-12" style="">
            <h5 class="text-light text-center" style=" ">In Development Mode</h5>
        </div>
    </div>
    
    <script>
        var i = 0;
        var txt = 'PHD Capital Terminal';
        var speed = 200;
        
        $(document).ready(function(){
            typeWriter();
        });
        function typeWriter() {
          if (i < txt.length) {
            document.getElementById("demo").innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
          }
        }
        
    
    </script>
</body>