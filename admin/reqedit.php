
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
<center>
<?
   include("header.php");
   include("menu.php");
   include("dbconfig.inc.php");
 //  include("functions.php");
   include("functions.php");

   //mm($reqId,$_POST["NAME"],$_POST["txtEmployeeID"],$_POST["txtUsername"],$_POST["txtEmail"],$_POST["txtTelephone"],$_POST["txtDepartmentID"],$_POST["txtSectionId"],$_POST["txtAssetTypeID"],$_POST["txtProductItCode"],$_POST["txtProductAssetCode"],$_POST["txtProblemDetail"],$_POST["txtSolveProblemDetail"],$_POST["txtLocationID"],$_POST["txtSubLocationId"],$_POST["txtProductTypeID"],$_POST["txtServiceTypeID"],$_POST["txtJobStatus"]);

  if (!$_GET["reqID"] =="") $reqId =$_GET["reqID"];
  
  //echo "--Get-->  ".$_GET["reqID"];
  else if (!$_POST["txtID"] =="")
  {
	  $reqId =$_POST["txtID"];
	  echo $reqId;
	// echo "<br/>  -->  ".$_POST["txtJobStatus"];

	 updateUserRequest($reqId,$_POST["txtName"],$_POST["txtEmployeeID"],$_POST["txtUsername"],$_POST["txtEmail"],$_POST["txtTelephone"],$_POST["txtDepartmentID"],$_POST["txtSectionId"],$_POST["txtAssetTypeID"],$_POST["txtProductItCode"],$_POST["txtProductAssetCode"],$_POST["txtProblemDetail"],$_POST["txtSolveProblemDetail"],$_POST["txtLocationID"],$_POST["txtSubLocationId"],$_POST["txtProductTypeID"],$_POST["txtServiceTypeID"],$_POST["txtJobStatus"]);
  }



 		
		$strSQL = "SELECT * FROM userrequest WHERE ID = '".$reqId."' ";
			mysql_query("SET NAMES UTF8");
		//echo $strSQL;
		$objQuery  = mysql_query($strSQL);
		$objResult = mysql_fetch_array($objQuery);

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
			


	if(!$objResult)
{
	echo "Not found CustomerID=".$reqId;
}
else
{
	?>


  <!--form name="ReqFrm" method="post" action="request.php"-->
  <form name="ReqFrm" method="post" action="reqedit.php" >
    <table width="1000" align="center" border="0" cellspacing="0" cellpadding="0">
      <tr>
          <td  colspan="2" align="center" style="font-size:18px; font-weight:bold;">IT Service Request Form</td>
          <input type="hidden" name ="txtID" value="<?=$objResult["ID"];?>"  name="id">
		  <!--input type="hidden" name ="reqID" value="<?=$objResult["ID"];?>"  name="reqid" -->
	  </tr>
      <tr>
        <td colspan="2" align="center" style="font-size:16px; font-weight:bold; color:red;">กรุณากรอกข้อมูลอย่างละเอียด เพื่อความรวดเร็วในการให้บริการ</td>
      </tr>
	  <tr>
        <td colspan="2" align="left" style="font-size:16px; font-weight:bold; color:#922338;">ข้อมูลผู้ติดต่อและช่องทางในการติดต่อกลับ</td>
        
      </tr>
	  <tr>
        <td align="left" width="30%">Name:ชื่อ - นามสกุลผู้แจ้ง * </td>
        <td align="left" width="70%"><input name="txtName" type="text" size="50" maxlength="50"   value="<?=$objResult["NAME"];?>" > </td>
      </tr>
      <tr>
       <td align="left">Employee ID : รหัสประจำตัวพนักงาน 
	   <br/> Passport ID : รหัสPassport </td>
       <td align="left"><input name="txtEmployeeID" type="text" size="50" maxlength="50"  value="<?=$objResult["EMPLOYEEID"];?>" > </td>
      </tr>

	 
		<?php
				/*  FIND DEPARTMENT  */
			$query="SELECT Department_ID,Department_NAME FROM department ";
			$resultDept=mysql_query($query);
			 
			?>
	  <tr>
		<td align="left">Department : หน่วยงาน </td>
		<td  width="left">
				<select name="txtDepartmentID" onChange="getDepartment(this.value)">
						<option value="">Select Your Departmen : หน่วยงาน</option>
								<? while($rowDept=mysql_fetch_array($resultDept)) { ?>
						<option value=<?=$rowDept['Department_ID'];  if ($rowDept['Department_ID'] == $objResult['Department_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowDept['Department_NAME']?></option>
							<? } ?>
		</select></td>
	  </tr>
		<?php
				/*  FIND SECTION  */
			$querySec="SELECT Section_ID , Section_NAME FROM section";
			$resultSec=mysql_query($querySec);
			 
			?>
	  <tr style="">
		<td></td>
		<td >
		<select name="txtSectionId" >
						<option value="">Select Department First</option>
								<? while($rowSec=mysql_fetch_array($resultSec)) { ?>
						<option value=<?=$rowSec['Section_ID'];  if ($rowSec['Section_ID'] == $objResult['Section_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowSec['Section_NAME']?></option>
							<? } ?>
		</select>
		</td>
	  </tr>
	  

	<!-- End Check Department -->
	  <tr>
       <td align="left">Username Logon </td>
       <td align="left"><input name="txtUsername" type="text" size="50" maxlength="50"  value="<?=$objResult["USERNAME"];?>" > </td>
      </tr>
      <tr>
        <td align="left">Email Address: </td>
        <td align="left"><input name="txtEmail" type="text" size="50" maxlength="50"  value="<?=$objResult["EMAIL"];?>" > </td>
      </tr>
	  <tr>
       <td align="left">Telephone </td>
       <td align="left"><input name="txtTelephone" type="text" size="50" maxlength="50"  value="<?=$objResult["TELEPHONE"];?>"> </td>
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
			<div id='DIV1' class="RBtnTab"> IT CODE :<input name="txtProductItCode" type="text" size="50" value="<?=$objResult["PRODUCT_ITCODE"];?>" > <br/>
										 ASSET CODE : <input name="txtProductAssetCode" type="text" size="50" maxlength="50" value="<?=$objResult["PRODUCT_ASSETCODE"];?>" >
		</div></div>
	</td>
	</tr>

		<?php
		    /**
				FIND LOCATION
				**/
		$queryLocation="SELECT LOCATION_ID,LOCATION_NAME FROM location ";
		$resultLo=mysql_query($queryLocation);
		 
		?>
	  <tr>
		<td align="left">ระบุสถานที่ตั้งของอุปกรณ์ </td>
		<td  width="left">
			<select name="txtLocationID" onChange="getState(this.value)">
					<option value="0">Select Location</option>
						<? while($rowLo=mysql_fetch_array($resultLo)) { ?>
					<option value=<?=$rowLo['LOCATION_ID'];  if ($rowLo['LOCATION_ID'] == $objResult['LOCATION_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowLo['LOCATION_NAME']?></option>
				<? } ?>
			</select></td>
	  </tr>
	  <?php
				/*  FIND SUB-Location  */
			$querySUBLO="SELECT SUB_LOCATION_ID , SUB_LOCATION_NAME FROM sublocation";
			$resultSUBLO=mysql_query($querySUBLO);

		 
			?>
	  <tr style="">
		<td></td>
		<td >
		
		<select name="txtSubLocationId" >
						<option value="">Select Location First</option>
								<? while($rowSUBLO=mysql_fetch_array($resultSUBLO)) { ?>
						<option value=<?=$rowSUBLO['SUB_LOCATION_ID'];  if ($rowSUBLO['SUB_LOCATION_ID'] == $objResult['SUBLOCATION_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowSUBLO['SUB_LOCATION_NAME']?></option>
							<? } ?>
		</select>
		
		</td>
	  </tr>

		<?php
		    /**
				FIND PRODUCT TYPE
				**/
		$queryPro="SELECT PRODUCT_TYPE_ID,PRODUCT_TYPE_NAME FROM PRODUCT_TYPE ";
		$resultPro=mysql_query($queryPro);
		 
		?>
	  <tr>
		<td align="left">ประเภท/กลุ่มของอุปกรณ์ที่เกิดปัญหา </td>
		<td  width="left">
			<select name="txtProductTypeID" >
					<option value="0">Select Product : ประเภทของอุปกรณ์ที่เกิดปัญหา</option>
						<? while($rowPro=mysql_fetch_array($resultPro)) { ?>
					<option value=<?=$rowPro['PRODUCT_TYPE_ID']; if ($rowPro['PRODUCT_TYPE_ID'] == $objResult['Product_Type_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowPro['PRODUCT_TYPE_NAME']?></option>
				<? } ?>
			</select></td>
	</tr>
	  <?php
		    /**
				FIND SERVICE TYPE
				**/
		$queryService="SELECT SERVICE_TYPE_ID,SERVICE_TYPE_NAME FROM SERVICES_TYPE ";
		$resultService=mysql_query($queryService);
		//echo "</br>".$query;
		 
		?>
	  <tr>
		<td align="left">ประเภท/กลุ่มของปัญหา </td>
		<td  width="left">
			<select name="txtServiceTypeID" id="txtServiceTypeID" >
					<option value="0">Select Service : ประเภท/กลุ่มของปัญหา</option>
						<? while($rowService=mysql_fetch_array($resultService)) { ?>
					<option value=<?=$rowService['SERVICE_TYPE_ID']; if ($rowService['SERVICE_TYPE_ID'] == $objResult['Service_Type_ID'] ) echo " selected= 'selected'  "; ?> > <?=$rowService['SERVICE_TYPE_NAME']?></option>
				<? } ?>
			</select></td>
	</tr>

	  <tr>
       <td align="left">Problem Detail <br/>
			รายละเอียดปัญหา</td>
       <td><TEXTAREA NAME="txtProblemDetail" COLS="80" ROWS="6" > <?=trim($objResult["Problem_Detail"]);?> </textarea> </td>
      </tr>
      <tr>
        <tr>
       <td align="left">Solve Detail <br/>
			รายละเอียดการแก้ไขปัญหา</td>
       <td> <TEXTAREA NAME="txtSolveProblemDetail" COLS="80" ROWS="6"> <?=trim($objResult["Solve_Detail"]);?> </textarea> </td> 
      </tr>
      </tr>
			 <?php
		    /**
				FIND JOB STATUS
				**/
		$queryJOB="SELECT JOB_STATUS_ID, JOB_STATUS_NAME FROM JOB_STATUS ";
		$resultJOB=mysql_query($queryJOB);
		//echo "</br>".$query;
		 
		?>
	  <tr>
		<td align="left">JOB STATUS </td>
		<td  width="left">
			<select name="txtJobStatus" id="txtJobStatus" >
					<option value="0">JOB STATUS</option>
						<? while($rowJOB=mysql_fetch_array($resultJOB)) { ?>
					<option value=<?=$rowJOB['JOB_STATUS_ID']; if ($rowJOB['JOB_STATUS_ID'] == $objResult['JOB_STATUS'] ) echo " selected= 'selected'  "; ?> > <?=$rowJOB['JOB_STATUS_NAME']?></option>
				<? } ?>
			</select></td>
	</tr>


	  <tr>
		 <td colspan ="2">&nbsp;</td>


      <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="SUBMIT"> <input name="reset" type="reset" value="Clear Form"></td>
      </tr>

    </table>
	  </form>
	<?
		
	
	// end condition
	}
	?>

  

		</center>


    </body>
</html>






