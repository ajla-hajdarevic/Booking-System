<link rel="stylesheet" type="text/css" href="booking.css">
<?php
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    $_SESSION['msg'] = 'You need to login first';
    header('Location: ../login/login.php');
    exit();
  }
include ('session.php');
$dbo = Connect();
$BR = "<br>";
?>

 <html>
     <SCRIPT language=JavaScript>
     var numberOfServices = 1;
       function reload(selectElement, servicesId) {
         // debugger;
         // name it category or something similar
        var val=selectElement.options[selectElement.options.selectedIndex].value;
        //var subcat=form.subcat.options[form.cat.options.selectedIndex].value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
              document.getElementById('services' + servicesId).innerHTML = xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET", 'services_bh.php?cat=' + val, true);
        xmlhttp.send();
       //self.location='dd.php?cat=' + val + (subcat ? ('&subcat=' + subcat):'') ;
       }

       function addService() {
        if (numberOfServices == 1) {
          document.getElementById('secondService').style.display = 'block';
          numberOfServices++;
        } else if (numberOfServices == 2) {
          document.getElementById('thirdService').style.display = 'block';
          numberOfServices++;
          document.getElementById('addBtn').style.display = 'none';
        }
       }
     </SCRIPT>


     <body>
      <?php
      @$cat_R1=$_GET['cat'];
      if(strlen($cat_R1) > 0 and !is_numeric($cat_R1)){
      echo "Data Error";
      exit;
      }

      $quer2_R1="SELECT DISTINCT category,id FROM service_category order by category";

      if(isset($cat_R1) and strlen($cat_R1) > 0){
        $quer_R1="SELECT DISTINCT service_name, id FROM services WHERE category=$cat_R1 ORDER BY service_name";
        }else{
          $quer_R1="SELECT DISTINCT service_name FROM services ORDER BY service_name";
        }

      echo "<form method=post name=f1 action='dd-check.php'>";

      echo "<select name='cat' onchange=\"reload(this, 1)\"><option value=''>Select one</option>";
      foreach ($dbo->query($quer2_R1) as $noticia2_R1) {
        if($noticia2_R1['id']==@$cat_R1){
          echo "<option selected value='$noticia2_R1[id]'>$noticia2_R1[category]</option>"."<BR>";
        } else {
          echo  "<option value='$noticia2_R1[id]'>$noticia2_R1[category]</option>";}
      }
      echo "</select>";

      echo "<select name='subcat' id='services1'><option value=''>Select one</option>";
      foreach ($dbo->query($quer_R1) as $noticia_R1) {
        echo  "<option value='$noticia_R1[id]'>$noticia_R1[service_name]</option>";
      }
      echo "</select>";

      $quer3_R1="SELECT fname, lname, id FROM employees ORDER BY fname ASC";

      echo "<select name='employee'><option value=''>Select employee</option>";
      foreach ($dbo->query($quer3_R1) as $noticia3_R1) {
        echo "<option value=$noticia3_R1[id]>$noticia3_R1[fname] $noticia3_R1[lname]</option>";
      }
      echo "</select>";

      echo $BR.$BR;
      ?>
      <div id="secondService" style="display: none">
        <select name='cat2' onchange="reload(this, 2)"> <!--//variable name to be posted?-->
          <option value="">Select one</option>
            <?php foreach ($dbo->query($quer2_R1) as $noticia2_R1) { ?>
              <option value="<?php echo $noticia2_R1['id'] ?>"><?php echo $noticia2_R1['category'] ?></option>
        <?php
        }
        ?>
        </select>

        <select name="subcat2" id="services2"> <!--//variable name to be posted?-->
          <option value="">Select one</option>
        </select>
        <br><br>
      </div>

      <div id="thirdService" style="display: none"> <!--//variable name to be posted?-->
        <select name='cat3' onchange="reload(this, 3)">
          <option value="">Select one</option>
            <?php foreach ($dbo->query($quer2_R1) as $noticia2_R1) { ?>
              <option value="<?php echo $noticia2_R1['id'] ?>"><?php echo $noticia2_R1['category'] ?></option>
        <?php
        }
        ?>
        </select>

        <select name="subcat3" id="services3">
          <option value="">Select one</option>
        </select>
        <br><br>
      </div>

      <span onclick="addService()" id="addBtn">Add new service</span>
        <br><br>

      <?php
      echo "Please select a date for your appointment: ";
      echo $BR.$BR;

      echo "<input name='selectDate' type=date>";
      echo $BR.$BR;

      // $time = array("9:00","9:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30");
      // echo "<select name='selectTime'><option value=''>Select a time</option>";
      //   foreach ($time as $value) {
      //     echo "<option value=$value>$value</option>";
      //   }
      // echo "</select>";
      echo "<input name=selectTime type=time>";

      // echo "<input type=time name='selectTime'>'";


      echo $BR.$BR;
      echo "<input type=submit value=Submit>";
      echo "</form>";



      ?>

      <br><br>
      <a href=dd_bh.php>Reset and start again</a>
      <br><br>
      </body>

      </html>
