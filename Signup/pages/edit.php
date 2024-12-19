<?php
 error_reporting(0);
 $conn = mysqli_connect("localhost", "root", "", "dataentry");

$id = "";
$name = "";
$Email = "";
$Process = "";
$Designation = "";
$BusinessHead = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    //GET method: SHOW the data of the client

    if(!isset($_GET['id'])){
        header('location: form.php');
        exit;
    }

    $id = $_GET['id']; 
    
    //read the row of the selected client from database table
    $sql = "Select * from form where id = $id";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

    if(!$row){
        header("location:form.php");
        exit;
    }

    $name = $row["name"];
    $Email = $row["Email"];
    $Process = $row["Process"];
    $Designation = $row["Designation"];
    $BusinessHead = $row["BusinessHead"];
}else{
    //POST method: Update the data of the client

    $id = $_POST["id"];
    $name = $_POST["name"];
    $Email = $_POST["Email"];
    $Process = $_POST["Process"];
    $Designation = $_POST["Designation"];
    $BusinessHead = $_POST["BusinessHead"];

    do{
        if(empty($id) || empty($name) || empty($Email) || empty($Process) || empty($Designation) || empty($BusinessHead)){
            $errorMessage = "All the fields are required";
            break;  
        }

        $sql = "Update form".
        "SET name = '$name',email = '$Email',Process = '$Process',Designation = '$Designation',BusinessHead = '$BusinessHead'" . "Where id = $id";
    
        $result = $conn -> query($sql);

        if(!$result){
            $errorMessage = "Invalid query: " . $conn -> error;
            break;
        }

        $successMessage = "Client updated correctly";

        header("location:form.php");
        exit;

    }while(true);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Conneqt Business Solution</title>
  <link rel="stylesheet" href="for.css" />
</head>
<body>
  <?php require '../pages/navbar.php' ?>
  
  <?php require '../pages/submit.php' ?>

    <?php
    if (!isset($hide)) {
    ?>
       <div class="border">
      <div class="containerfirst">
      <div class="title">Information Intake Sheet</div>
      <form action="" method="POST" id="form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Login Employee Id</span>
            <input type="id" placeholder="Your Id" name="id" value="<?php echo $id ?>"  />
          </div>

          <div class="input-box">
            <span class="details">Login Employee Name</span>
            <input type="text" placeholder="Your Name" name="name" value="<?php echo $name ?>" />
          </div>

          <div class="input-box">
            <span class="details">Login Employee Email</span>
            <input type="email" placeholder="Enter Email" name="email" value="<?php echo $Email ?>" />
          </div>

          <div class="input-box">
            <span class="details">Process</span>
            <select name="Process" class="input" value="<?php echo $Process ?>" >
              <option value="" disabled selected>Select</option>
              <option value="ABC Process">ABC Process</option>
              <option value="B Process">B Process</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Mode</span>
            <select name="Mode" class="input"  >
              <option value="" disabled selected>Select</option>
              <option value="WFH">WFH</option>
              <option value="WFO">WFO</option>
            </select>

          </div>

          <div class="input-box">
            <span class="details">Designation</span>
            <select name="Designation" class="input" value="<?php echo $Designation ?>">
              <option value="" disabled selected>Select</option>
              <option value="Manager">Manager</option>
              <option value="Developer">Developer</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Corp Quality SPOC</span>
            <input type="text" placeholder="Corp Quality SPOC" name="quality_spoc"  />
          </div>

          <div class="input-box">
            <span class="details">Process Status</span>
            <select name="Process_Status" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="Live">Live</option>
              <option value="Disable">Disable</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Industry Segment</span>
            <select name="Industry_Segment" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="E-COMMERCE">E-COMMERCE</option>
              <option value="HEALTHCARE">HEALTHCARE</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Business Type</span>
            <select name="Business_Type" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="DOMESTIC">DOMESTIC</option>
              <option value="COOPERATIVE">COOPERATIVE</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Services Offered</span>
            <select name="Services_Offered" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="VOICE SERVICES">VOICE SERVICES</option>
              <option value="RETAIL">RETAIL</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">BusinessHead</span>
            <input type="text" placeholder="Business Head" name="Business_Head" value="<?php echo $BusinessHead ?>" />
          </div>

          <div class="input-box">
            <span class="details">Account Head</span>
            <input type="text" placeholder="Account Head" name="Account_Head"  />
          </div>

          <div class="input-box">
            <span class="details">Project Manager</span>
            <input type="text" placeholder="Project Manager" name="Project_Manager"  />
          </div>

          <div class="input-box">
            <span class="details">Location Spoc</span>
            <input type="text" placeholder="Location Spoc" name="Location_Spoc"  />
          </div>

          <div class="input-box">
            <span class="details">Client Name</span>
            <input type="text" placeholder="Client Name" name="Client_Name"  />
          </div>

          <div class="input-box">
            <span class="details">Process Name</span>
            <input type="text" placeholder="Process Name" name="Process_Name"  />
          </div>

          <div class="input-box">
            <span class="details">Operating Location's</span>
            <select name="Operating_Location" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="Pune">Pune</option>
              <option value="Bangalore">Bangalore</option>
            </select>
          </div>

          <div class="gender-details">
            <span class="gender-title">Financial Implications</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input
                    type="radio"
                    name="financialimplications"
                    value="Y" />
                  Yes
                </label>
                <label class="radio">
                  <input type="radio" name="financialimplications" value="N"  />
                  No
                </label>
              </div>
            </div>
          </div>

          <div class="input-box">
            <span class="details">What are the financial implication parameters followed or
              not</span>
            <input
              type="text"
              placeholder="What are the financial implication parameters followed or not" name="implication_parameters"  />
          </div>

          <div class="input-box">
            <span class="details">Billable Head Count</span>
            <input type="text" placeholder="Billable Head Count" name="Head_Count"  />
          </div>

          <div class="input-box">
            <span class="details">Cost Code</span>
            <input type="text" placeholder="Cost Code" name="CostCode" />
          </div>

          <div class="input-box">
            <span class="details">Billing Model</span>
            <select name="BillingModel" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="PCE">PCE</option>
              <option value="BCF">BCF</option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">Business Started Date</span>
            <input type="date" placeholder="Business Started Date" name="BusinessStartedDate"  />
          </div>

          <div class="input-box">
            <span class="details">Business BAU Date</span>
            <input type="date" placeholder="Business BAU Date" name="BusinessBAUDate"  />
          </div>

          <div class="input-box">
            <span class="details">Business End Date</span>
            <input type="date" placeholder="Business End Date" name="BusinessEndDate"  />
          </div>

          <div class="input-box">
            <span class="details">CBSL - SLA Monitoring</span>
            <select name="CBSLSLAMonitoring" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="Service Level and Quality">
                Service Level and Quality
              </option>
              <option value="Product Level and Quality">
                Product Level and Quality
              </option>
            </select>
          </div>

          <div class="input-box">
            <span class="details">CLIENT - SLA Monitoring</span>
            <select name="CLIENTSLAMonitoring" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="Service Level and Quality">
                Service Level and Quality
              </option>
              <option value="Product Level and Quality">
                Product Level and Quality
              </option>
            </select>
          </div>

          <div class="gender-details">
            <span class="gender-title">CBSL - System / Application</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="CBSLApplication"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="CBSLApplication"
                    value="N" />No
                </label>
              </div>
            </div>
          </div>

          <div class="input-box">
            <span class="details">Client - System / Application</span>
            <select name="ClientApplication" class="input" >
              <option value="" disabled selected>Select</option>
              <option value="NA">NA</option>
              <option value="Yes">Yes</option>
            </select>
          </div>

          <div class="gender-details">
            <span class="gender-title">Transition Audit</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="TransitionAudit"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="TransitionAudit" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Internal Audit (ISO & ISMS)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="InternalAudit"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="InternalAudit" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">External Audit (ISO & ISMS)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="External_Audit"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="External_Audit" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Client Audit</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="ClientAudit"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="ClientAudit" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">SOP/Process Manuals</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="SOPManuals"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="SOPManuals" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Resource Plan</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="ResourcePlan"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="ResourcePlan" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Training Plan</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="TrainingPlan"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="TrainingPlan" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Quality Plan</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="QualityPlan"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="QualityPlan" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Target Plan</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="TargetPlan"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="TargetPlan" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">MIS Reporting</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="MISReporting"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="MISReporting" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Risk Management (FMEA)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="RiskManagement"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="RiskManagement" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Customer First</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="CustomerFirst"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="CustomerFirst" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Eureka</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="Eureka"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="Eureka" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Escalation Matrix</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="EscalationMatrix"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="EscalationMatrix" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Master List</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="MasterList"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="MasterList" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Employee PM (Productivity)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="EmployeePM"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="EmployeePM" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">MBR (Internal)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="MBRInternal"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="MBRInternal" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">QBR (Internal)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="QBRInternal"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="QBRInternal" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">MBR (External)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="MBRExternal"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="MBRExternal" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">QBR (External)</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="QBRExternal"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="QBRExternal" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">MOM Documentation</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="MOMDocumentation"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="MOMDocumentation" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Annual VOC</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="AnnualVOC"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="AnnualVOC" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">VOC Action Plan</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="ActionPlan"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="ActionPlan" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Mandatory L&D Training Programs</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="Mandatory"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="Mandatory" value="N" />
                  No</label>
              </div>
            </div>
          </div>

          <div class="gender-details">
            <span class="gender-title">Improvement Project</span>
            <div class="category">
              <div class="control">
                <label class="radio">
                  <input type="radio" name="ImprovementProject"
                    value="Y" />Yes
                </label>
                <label class="radio">
                  <input type="radio" name="ImprovementProject" value="N" />
                  No</label>
              </div>
            </div>
          </div>


        </div>
        <div class="button">
          <input type="submit" value="Submit" name="submit" />
        </div>
      </form>

    <?php
    } ?>
  </div>
  </div>
  <script>
    let btnClick = document.querySelector(".previous");

    btnClick.addEventListener("click", () => {
      window.location.href = "form.php";
    });
  </script>
</body>
</html>