<?
	class MyValidator extends CustomValidator
{
	function DoValidate(&$formars,&$error_hash)
	{
        if(stristr($formars['Comments'],'http://'))
        {
            $error_hash['Comments']="No URLs allowed in comments";
            return false;
        }
		return true;
	}
}

if(isset($_POST['submit']))
{
    $validator = new FormValidator();
    $validator->addValidation("txtName","req","Please fill in Name");
    $validator->addValidation("Email","email","The input for Email should be a valid email value");
    $validator->addValidation("Email","req","Please fill in Email");
    $custom_validator = new MyValidator();
    $validator->AddCustomValidator($custom_validator);

    if($validator->ValidateForm())
    {
        echo "<h2>Validation Success!</h2>";
        $show_form=false;
    }
    else
    {
        echo "<B>Validation Errors:</B>";

        $error_hash = $validator->GetErrors();
        foreach($error_hash as $inpname => $inp_err)
        {
            echo "<font color='red'><p>$inpname : $inp_err</p></font>\n";
        }        
    }
}
?>