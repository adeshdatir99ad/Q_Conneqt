<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="submit.css">
</head>
<body>
     <!-- Php Code -->
     <?php
    error_reporting(0);
    if (isset($_POST["submit"])) {
      $id = $_POST['id'];
      $name = strip_tags($_POST['name']);  // html tags remove karta hai 

      $hide = 1;
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nm = $_POST['name'];
        $email = $_POST['email'];
        $Process = $_POST['Process'];
        $Mode = $_POST['Mode'];
        $Designation = $_POST['Designation'];
        $CorpQuality = $_POST['quality_spoc'];
        $ProcessStatus = $_POST['Process_Status'];
        $IndustrySegment = $_POST['Industry_Segment'];
        $BusinessType = $_POST['Business_Type'];
        $Services_Offered = $_POST['Services_Offered'];
        $BusinessHead = $_POST['Business_Head'];
        $AccountHead = $_POST['Account_Head'];
        $ProjectManager  = $_POST['Project_Manager'];
        $LocationSpoc = $_POST['Location_Spoc'];
        $ClientName = $_POST['Client_Name'];
        $ProcessName = $_POST['Process_Name'];
        $OperatingLocation = $_POST['Operating_Location'];
        $FinancialImplications = $_POST['financialimplications'];
        $financialimplicationparameters = $_POST['implication_parameters'];
        $BillableCount = $_POST['Head_Count'];
        $CostCode = $_POST['CostCode'];
        $BillingModel = $_POST['BillingModel'];
        $BusinessStartedDate = $_POST['BusinessStartedDate'];
        $BusinessBAUDate = $_POST['BusinessBAUDate'];
        $BusinessEndDate = $_POST['BusinessEndDate'];
        $CBSLSLAMonitoring = $_POST['CBSLSLAMonitoring'];
        $CLIENTSLAMonitoring = $_POST['CLIENTSLAMonitoring'];
        $CBSLApplication = $_POST['CBSLApplication'];
        $ClientApplication = $_POST['ClientApplication'];
        $TransitionAudit = $_POST['TransitionAudit'];
        $InternalAudit = $_POST['InternalAudit'];
        $ExternalAudit = $_POST['External_Audit'];
        $ClientAudit = $_POST['ClientAudit'];
        $SOPManuals = $_POST['SOPManuals'];
        $ResourcePlan = $_POST['ResourcePlan'];
        $TrainingPlan = $_POST['TrainingPlan'];
        $QualityPlan = $_POST['QualityPlan'];
        $TargetPlan = $_POST['TargetPlan'];
        $MISReporting = $_POST['MISReporting'];
        $RiskManagement = $_POST['RiskManagement'];
        $CustomerFirst = $_POST['CustomerFirst'];
        $Eureka = $_POST['Eureka'];
        $EscalationMatrix = $_POST['EscalationMatrix'];
        $MasterList = $_POST['MasterList'];
        $EmployeePM = $_POST['EmployeePM'];
        $MBRInternal = $_POST['MBRInternal'];
        $QBRInternal = $_POST['QBRInternal'];
        $MBRExternal = $_POST['MBRExternal'];
        $QBRExternal = $_POST['QBRExternal'];
        $MOMDocumentation = $_POST['MOMDocumentation'];
        $AnnualVOC = $_POST['AnnualVOC'];
        $ActionPlan = $_POST['ActionPlan'];
        $Mandatory = $_POST['Mandatory'];
        $ImprovementProject = $_POST['ImprovementProject'];
        $Created = $_POST['Created'];

        $conn = mysqli_connect("localhost", "root", "", "dataentry");

        if ($conn) {
          $sql = "INSERT INTO form VALUES('$id','$nm','$email','$Process','$Mode','$Designation','$CorpQuality','$ProcessStatus','$IndustrySegment','$BusinessType','$Services_Offered','$BusinessHead','$AccountHead','$ProjectManager','$LocationSpoc','$ClientName','$ProcessName','$OperatingLocation','$FinancialImplications','$financialimplicationparameters','$BillableCount','$CostCode','$BillingModel','$BusinessStartedDate','$BusinessBAUDate','$BusinessEndDate','$CBSLSLAMonitoring','$CLIENTSLAMonitoring','$CBSLApplication','$ClientApplication','$TransitionAudit','$InternalAudit','$ExternalAudit','$ClientAudit','$SOPManuals','$ResourcePlan','$TrainingPlan','$QualityPlan','$TargetPlan','$MISReporting','$RiskManagement','$CustomerFirst','$Eureka','$EscalationMatrix','$MasterList','$EmployeePM','$MBRInternal','$QBRInternal','$MBRExternal','$QBRExternal','$MOMDocumentation','$AnnualVOC','$ActionPlan','$Mandatory','$ImprovementProject',NOW())";
          $result = mysqli_query($conn, $sql);
        }
      }
      echo '<div class="body_outer">';
      echo '<div class="success"> Thank You &nbsp <strong> ' . $name . ', &nbsp </strong> Your details has been send... </div>' . mysqli_connect_error();
      echo '<button class="previous" type="button" name="ok">OK</button>';
      echo '</body_outer>';
    }
    ?>
</body>
</html>