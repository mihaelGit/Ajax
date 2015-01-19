<?php
$conn = new mysqli("localhost","root","","test");

function padajuca($conn){
$querry = "SELECT id, username FROM users";
$data = $conn->query($querry);
echo '<select id="padajucaId" onchange="loadXMLDoc(this.value)"><option value="" disabled selected style="display:none;"></option>';
    while($r = $data->fetch_assoc()){
        echo '<option value="'.$r['id'].'">'.$r['username'].'</option>';
    }
echo "<select>";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ajax</title>
        <script>
            /*function loadXMLDoc(data)
            {
             
            var xmlhttp;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","comm.php?x="+data,true);
            xmlhttp.send();
            }*/
            function loadXMLDoc(data)
            {document.getElementById("myDiv").innerHTML="Loading Data...";
            var xmlhttp;
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","comm.php?x="+data,true);
            xmlhttp.send();
            }
            
            function clearData(){
                document.getElementById("myDiv").innerHTML="";
            }
    </script>
    </head>
    <body>
        <?php padajuca($conn); ?>
        <!-- <button type="button" onclick="loadXMLDoc(1)">1</button>
        <button type="button" onclick="loadXMLDoc(2)">2</button>
        <button type="button" onclick="loadXMLDoc(3)">3</button> -->
        <button type="button" onclick="clearData()">Clear</button>
        <div id="myDiv"></div>
    </body>
</html>
