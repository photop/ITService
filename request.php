

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
		body {
	//background-color: #09C;
}
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




function test1(form)
{
  alert(form);
}
</script>
    </head>
      <body marginheight="0" marginwidth="0">
<center>	<!--img src="imgs/header.jpg" width="1000px" height="200px"  /-->
		<?php include 'header.php'; ?>
 </center>
		<center>
		
		<? 
			// INCLUDE DATABASE CONNECTION
			include("dbCon.inc.php");	
			include("userfunctions.php");

			
/*
			echo "<br/> txtName  :  ".$_POST["txtName"];
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
			//echo "xxxxx <br/
			//echo "document.getElementById('departmentdiv').innerHTML=req.responseText;";
			
		?>

<!--########### Check Value ############## -->
<? 
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
			/* 
				##########################
				######  UPDATE DATA  #####
				##########################
			*/
				$name=$_POST[txtName];
				$empId=$_POST[txtEmployeeID];
				$depId=$_POST[txtDepartmentID];
				$sectionId=$_POST[txtSectionId];
				$username=$_POST[txtUsername];
				$mail=$_POST[txtEmail];
				$telephone=$_POST[txtTelephone];
				$assetId=$_POST[txtAssetTypeID];
				$proItCode=$_POST[txtProductItCode];
				$proAssId=$_POST[txtProductAssetCode];
				$locationId=$_POST[txtLocationID];
				$sublocationId=$_POST[txtSubLocationId];
				$proTypeId=$_POST[txtProductTypeID];
				$serviceId=$_POST[txtServiceTypeID];
				$problems=$_POST[txtProblemDetail];
		
		$requestId = addNewRequest($name,$empId,$username,$mail,$telephone,$depId,$sectionId,$assetId,$proItCode,$proAssId,$problems,$locationId,$sublocationId,$proTypeId,$serviceId);
		if(null != $requestId)
			{
				//echo "<br> Insert OK ".$requestId."<br/>";
				//getRequestInfo($requestId);
				$department  = 	getDepartmentInfo($depId);
				$location 	=	getLocation($locationId);
				/* ######  Sent mail To IT ###### */
				mailtoService($username,$department,$location);
				//echo "Message sent!";
				echo "<script type=\"text/javascript\">alert('บันทึกข้อมูลขอใช้บริการ IT Service เรียบร้อยแล้ว') </script>";
				echo "<META HTTP-EQUIV=refresh CONTENT=\"2; URL=index\">";
			
			}else 
			{
				//echo "Insert Fail";
			}
		/*  ###### END  UPDATE DATA   ##### */
	}else
	{
		//echo " New Data ";
	}
?>




  <!-- form name="ReqFrm" method="post" action="request.php" -->
  <!-- form name="ReqFrm" method="post" action="userfunction.php"  onsubmit="return validateReqeust(this);" -->
   <form name="ReqFrm" method="post" action="request.php"  onsubmit="return validateReqeust(this);">
<!--  regist.php  goto Check Scrip again  -->
<!--form name="ReqFrm" method="post" action="regist.php"  onsubmit="return validateReqeust(this);"-->
    <table width="1000" align="center" border="0" cellspacing="0" cellpadding="0" bgcolor="#CCCCC9">
      <tr>
        <td  colspan="2" align="center" style="font-size:18px; font-weight:bold;">&nbsp;</td>
        <td>      
      </tr>
      <tr>
          <td  colspan="2" align="center" style="font-size:18px; font-weight:bold;">IT Service Request Form</td>
          <input type="hidden" name ="txtID" value="" name="id">
	  </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:16px; font-weight:bold; color:red;">กรุณากรอกข้อมูลอย่างละเอียด เพื่อความรวดเร็วในการให้บริการ</td>
      </tr>
	  <tr>
        <td colspan="2" align="left" style="font-size:16px; font-weight:bold; color:#922338;"><blockquote>
          <p>ข้อมูลผู้ติดต่อและช่องทางในการติดต่อกลับ</p>
        </blockquote></td>
        
      </tr>
	  <tr>
        <td align="right" width="30%">Name:ชื่อ - นามสกุลผู้แจ้ง  :</td>
        <td align="left" width="70%"><input name="txtName" type="text" size="50" maxlength="50"  value="" >
        * </td>
      </tr>
      <tr>
       <td align="right">Employee ID : รหัสประจำตัวพนักงาน 
	   <br/></td>
       <td align="left"><input name="txtEmployeeID" type="text" size="20" maxlength="50"  value="">
       * </td>
      </tr>

	 
		<?php
				/*  FIND DEPARTMENT  */
			$query="SELECT Department_ID,Department_NAME FROM department ";
			mysql_query("SET NAMES UTF8");
			$result=mysql_query($query);
			
			 
			?>
	  <tr>
		<td align="right">Department : หน่วยงาน : </td>
		<td  width="left">
				<select name="txtDepartmentID" onChange="getDepartment(this.value)">
						<option value="">Select Your Departmen : หน่วยงาน</option>
								<? while($row=mysql_fetch_array($result)) { ?>
						<option value=<?=$row['Department_ID']?>><?=$row['Department_NAME']?></option>
							<? } ?>
		</select>
		*</td>
	  </tr>
      	  <tr style="">
		<td></td>
		<td ><div id="departmentdiv">
				<select name="txtSectionId">
						<option>Select Department First</option>  
				</select>
				*
		</div></td>
	  </tr>
	  

	<!-- End Check Department -->
	  <tr>
       <td align="right">Username Logon : </td>
       <td align="left"><input name="txtUsername" type="text" size="50" maxlength="50"   value="" ></td>
      </tr>
      <tr>
        <td align="right">Email Address : </td>
        <td align="left"><input name="txtEmail" type="text" size="50" maxlength="50" value=""> </td>
      </tr>
	  <tr>
       <td align="right">Telephone :</td>
       <td align="left"><input name="txtTelephone" type="text" size="50" maxlength="50" value="">
        * </td>
      </tr>
	  <tr>
		<td height="27" colspan="2"  align="left"  style="font-size:16px; font-weight:bold; color:#922338;"><blockquote>
		  <p>ข้อมูลอุปกรณ์ที่ต้องการแจ้ง</p>
	    </blockquote></td>
	  </tr>
	  <tr>
		<td colspan="2"  align="center"  style="font-size:16px; font-weight:bold;">
				
					<input id="txtAssetType" type="radio" name='txtAssetTypeID' value='1'checked onClick="Show('DIV1')">ทรัพย์สินบริษัท ช.การช่าง(ลาว)จำกัด 
					<input id="txtAssetType" type="radio" name='txtAssetTypeID' value='2' onClick="disShow('DIV2')">Other : อื่น ๆ	

		</td>
	  </tr>
	  <tr><td ></td>
	  <td>
		<div id='Content' style="display:block">
		  <div id='DIV1' class="RBtnTab"> IT CODE :<input name="txtProductItCode" type="text" size="50" maxlength="50" value=""> <br/>
										 ASSET CODE : <input name="txtProductAssetCode" type="text" size="50" maxlength="50" value="">
		</div></div>
	</td>
	</tr>

		<?php
		    /**
				FIND LOCATION
				**/
		$query3="SELECT LOCATION_ID,LOCATION_NAME FROM location ";
		mysql_query("SET NAMES UTF8");
		$result3=mysql_query($query3);
		 
		?>
	  <tr>
		<td align="right">ระบุสถานที่ตั้งของอุปกรณ์ </td>
		<td  width="left">
			<select name="txtLocationID" onChange="getState(this.value)">
					<option value="0">Select Location</option>
						<? while($row=mysql_fetch_array($result3)) { ?>
					<option value=<?=$row['LOCATION_ID']?>><?=$row['LOCATION_NAME']?></option>
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
		<td align="right">ประเภท/กลุ่มของอุปกรณ์ที่เกิดปัญหา </td>
		<td  width="left">
			<select name="txtProductTypeID" id="txtProductTypeID">
					<option value="0">Select Product : ประเภทของอุปกรณ์ที่เกิดปัญหา</option>
						<? while($row=mysql_fetch_array($result)) { ?>
					<option value=<?=$row['PRODUCT_TYPE_ID']?>><?=$row['PRODUCT_TYPE_NAME']?></option>
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
		<td align="right">ประเภท/กลุ่มของปัญหา </td>
		<td  width="left">
			<select name="txtServiceTypeID" id="txtServiceTypeID" >
					<option value="0">Select Service : ประเภท/กลุ่มของปัญหา</option>
						<? while($row=mysql_fetch_array($result)) { ?>
					<option value=<?=$row['SERVICE_TYPE_ID']?>><?=$row['SERVICE_TYPE_NAME']?></option>
				<? } ?>
			</select></td>
	</tr>

	  <tr>
       <td align="right">Problem Detail <br/>
			รายละเอียดปัญหา</td>
       <td><textarea name="txtProblemDetail" cols="80" rows="8"> </textarea></td>
      </tr>
      <tr>
        <td> </td>
        <td> </td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="SEND REQUEST"> <input name="reset" type="reset" value="Clear Form"></td>
      </tr>

    </table>
	<?
		// Wait Close Connection
	?>

    </form>

		</center>
</body>
</html>






