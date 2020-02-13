

<!DOCTYPE html>
<html lang="th">
    <head>
		<meta http-equiv=Content-Type content="text/html; charset=utf-8">
		<script language="JavaScript" src="scripts/myfunction.js" />
		<script language="javascript" type="text/javascript" ></script>
        <title></title>
		
		<style type="text/CSS">
			 //div.RBtnTab { display:none; height:100px; width:200px; background-color:yellow}
			//div.RBtnTab {  background-color:yellow}
		</style>
<script type="text/javascript">
// getElementByClass function from http://www.webmasterworld.com/forum91/1729.htm
//Create an array
  var allPageTags = new Array();

  function doSomethingWithClasses(theClass) {
//Populate the array with all the page tags
    var allPageTags=document.getElementsByTagName("*");
//Cycle through the tags using a for loop
    for (var i=0; i<allPageTags.length; i++) {
//Pick out the tags with our class name
      if (allPageTags[i].className==theClass) {
//Manipulate this in whatever way you want
        allPageTags[i].style.display='none';
      }
    }
  }

function Show(ids) {
  doSomethingWithClasses('RBtnTab');

  var obj = document.getElementById(ids);


  if (obj.style.display != 'block') { obj.style.display = 'block'; }
                               else { obj.style.display = 'none'; }
}
function disShow(ids) {

  doSomethingWithClasses('RBtnTab');

  var obj = document.getElementById(ids);
  if (obj.style.display != 'none') { obj.style.display = 'none'; }
                               else { obj.style.display = 'block'; }
}



</script>
    </head>
      <body bgcolor='#CCFFCC' marginheight="0" marginwidth="0">
 <center>	<!--img src="imgs/header.jpg" width="1000px" height="200px"  /-->
		<?php include 'header.php'; ?>
 </center>
		<center>
		
		<? 
			// INCLUDE DATABASE CONNECTION
			include("dbCon.inc.php");	
			

	/*		echo "<br/> txtName  :  ".$_POST["txtName"];
			echo "<br/> txtEmployeeID  :  ".$_POST["txtEmployeeID"];
			echo "<br/> txtDepartmentID : ".$_POST["txtDepartmentID"];
			echo "<br/> txtSectionId : ".$_POST["txtSectionId"];
			echo "<br/> txtUsername : ".$_POST["txtUsername"];
			echo "<br/> txtEmail : ".$_POST["txtEmail"];
			echo "<br/> txtTelephone : ".$_POST["txtTelephone"];
			echo "<br/> txtAssetTypeId : ".$_POST["txtAssetTypeID"];
			echo "<br/> txtProductItCode : ".$_POST["txtProductItCode"];
			echo "<br/> txtProductAssetCode : ".$_POST["txtProductAssetCode"];
			echo "<br/> txtLocationID : ".$_POST["txtLocationID"];
			echo "<br/> txtSubLocation : ".$_POST["txtSubLocationId"];
			echo "<br/> txtProductTypeID : ".$_POST["txtProductTypeID"];
			echo "<br/> txtServiceTypeID : ".$_POST["txtServiceTypeID"];
			echo "<br/> txtProblemDetail : ".$_POST["txtProblemDetail"];
			*/
			
		?>


  <!-- form name="ReqFrm" method="post" action="request.php" -->
  
<form name="ReqFrm" method="post" action="regist.php"  onsubmit="return validateReqeust(this);">
    <table width="1000" align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td  colspan="2" align="center" style="font-size:18px; font-weight:bold;">IT Service Request Form</td>
          <input type="hidden" name ="txtID" value="" name="id">
	  </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:16px; font-weight:bold; color:red;">กรุณากรอกข้อมูลอย่างละเอียด เพื่อความรวดเร็วในการให้บริการ</td>
      </tr>
	  <tr>
        <td colspan="2" align="left" style="font-size:16px; font-weight:bold; color:#922338;">ข้อมูลผู้ติดต่อและช่องทางในการติดต่อกลับ</td>
        
      </tr>
	  <tr>
        <td align="left" width="30%">Name:ชื่อ - นามสกุลผู้แจ้ง * </td>
        <td align="left" width="70%"><input name="txtName" type="text" size="50" maxlength="50"  value="<?   echo $_POST["txtName"]; ?>" > </td>
      </tr>
      <tr>
       <td align="left">Employee ID : รหัสประจำตัวพนักงาน 
	   <br/> Passport ID : รหัสPassport </td>
       <td align="left"><input name="txtEmployeeID" type="text" size="50" maxlength="50"  value="<? echo $_POST["txtEmployeeID"]; ?>"> </td>
      </tr>

	 
		<?php
				/*  FIND DEPARTMENT  */
			$query="SELECT Department_ID,Department_NAME FROM department ";
			mysql_query("SET NAMES UTF8");
			$result=mysql_query($query);

						 
			?>
	  <tr>
		<td align="left">Department : หน่วยงาน </td>
		<td  width="left">
				<select name="txtDepartmentID" onChange="getDepartment(this.value)">
						<option value="">Select Your Departmen : หน่วยงาน</option>
								<? while($row=mysql_fetch_array($result)) { ?>
						<option value=<?=$row['Department_ID'];  if ($row['Department_ID'] == $_POST["txtDepartmentID"] ) echo " selected   "; ?>><?=$row['Department_NAME']?></option>
							<? } ?>
		</select></td>
	  </tr>
	  <tr style="">
		<td></td>
		<td ><div id="departmentdiv">
				<select name="txtSectionId">
						<option>Select Department First</option>
				</select></div></td>
	  </tr>
	  

	<!-- End Check Department -->
	  <tr>
       <td align="left">Username Logon </td>
       <td align="left"><input name="txtUsername" type="text" size="50" maxlength="50"   value="<? echo $_POST["txtUsername"];?>" > </td>
      </tr>
      <tr>
        <td align="left">Email Address: </td>
        <td align="left"><input name="txtEmail" type="text" size="50" maxlength="50" value="<? echo $_POST["txtEmail"];?>"> </td>
      </tr>
	  <tr>
       <td align="left">Telephone </td>
       <td align="left"><input name="txtTelephone" type="text" size="50" maxlength="50" value="<? echo $_POST["txtTelephone"];?>"> </td>
      </tr>
	  <tr>
		<td colspan="2"  align="left"  style="font-size:16px; font-weight:bold; color:#922338;">ข้อมูลอุปกรณ์ที่ต้องการแจ้ง</td>
	  </tr>
	  <tr>
		<td colspan="2"  align="center"  style="font-size:16px; font-weight:bold;">
				
					<input id="txtAssetType" type="radio" name='txtAssetTypeID' value='1'checked onClick="Show('DIV1')">ทรัพย์สินบริษัท ช.การช่าง(ลาว)จำกัด 
					<input id="txtAssetType" type="radio" name='txtAssetTypeID' value='2' onClick="disShow('DIV2')">Other : อื่น ๆ	

		</td>
	  </tr> 
	  <tr><td ></td>
	  <td>
		<div id='Content' style="display:block"><br />
			<div id='DIV1' class="RBtnTab"> IT CODE :<input name="txtProductItCode" type="text" size="50" maxlength="50" value="<? echo $_POST["txtProductItCode"];?>"> <br/>
										 ASSET CODE : <input name="txtProductAssetCode" type="text" size="50" maxlength="50" value="<? echo $_POST["txtProductAssetCode"];?>">
		</div></div>
	</td>
	</tr>

		<?php
		    /**
				FIND LOCATION
				**/
		$query="SELECT LOCATION_ID,LOCATION_NAME FROM location ";
		mysql_query("SET NAMES UTF8");
		$result=mysql_query($query);
		 
		?>
	  <tr>
		<td align="left">ระบุสถานที่ตั้งของอุปกรณ์ </td>
		<td  width="left">
			<select name="txtLocationID" onChange="getState(this.value)">
					<option value="0">Select Location</option>
						<? while($row=mysql_fetch_array($result)) { ?>
					<option value=<?=$row['LOCATION_ID'];  if ($row['LOCATION_ID'] == $_POST["txtLocationID"] ) echo " selected   "; ?>><?=$row['LOCATION_NAME']?></option>
							<? } ?>
			</select></td>
	  </tr>
	  <tr style="">
		<td></td>
		<td ><div id="statediv"><select name="txtSubLocationId">
		<option>Select Location First</option>
			</select></div></td>
	  </tr>

		<?
		    /**
				FIND PRODUCT TYPE
				**/
		$query="SELECT PRODUCT_TYPE_ID,PRODUCT_TYPE_NAME FROM PRODUCT_TYPE ";
		mysql_query("SET NAMES UTF8");
		$result=mysql_query($query);
		 
		?>
	  <tr>
		<td align="left">ประเภท/กลุ่มของอุปกรณ์ที่เกิดปัญหา </td>
		<td  width="left">
			<select name="txtProductTypeID" id="txtProductTypeID">
					<option value="0">Select Product : ประเภทของอุปกรณ์ที่เกิดปัญหา</option>
						<? while($row=mysql_fetch_array($result)) { ?>
						<option value=<?=$row['PRODUCT_TYPE_ID'];  if ($row['PRODUCT_TYPE_ID'] == $_POST["txtProductTypeID"] ) echo " selected   "; ?>><?=$row['PRODUCT_TYPE_NAME']?></option>
							<? } ?>
					
			</select></td>
	</tr>
	  <?
		    /**
				FIND SERVICE TYPE
				**/
		$query="SELECT SERVICE_TYPE_ID,SERVICE_TYPE_NAME FROM SERVICES_TYPE ";
		mysql_query("SET NAMES UTF8");
		$result=mysql_query($query);
		//echo "</br>".$query;
		 
		?>
	  <tr>
		<td align="left">ประเภท/กลุ่มของปัญหา </td>
		<td  width="left">
			<select name="txtServiceTypeID" id="txtServiceTypeID" >
					<option value="0">Select Service : ประเภท/กลุ่มของปัญหา</option>
						<? while($row=mysql_fetch_array($result)) { ?>
					<option value=<?=$row['SERVICE_TYPE_ID'];  if ($row['SERVICE_TYPE_ID'] == $_POST["txtServiceTypeID"] ) echo " selected   "; ?>><?=$row['SERVICE_TYPE_NAME']?></option>
							<? } ?>
			</select></td>
	</tr>

	  <tr>
       <td align="left">Problem Detail <br/>
			รายละเอียดปัญหา</td>
       <td><TEXTAREA NAME="txtProblemDetail" COLS="80" ROWS="6"><? echo $_POST["txtProblemDetail"];?></textarea> </td>
      </tr>
      <tr>
        <td> </td>
        <td> </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="CONFIRM"> <input name="reset" type="reset" value="Cancel" onclick="javascript:></td>
      </tr>

    </table>
	<?
		// Wait Close Connection
	?>

    </form>

		</center>


    </body>
</html>