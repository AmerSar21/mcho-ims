<?php
//include connection file 
include_once("db_connect.php");
include_once('fpdf.php');

$sql = "SELECT brgy_name from barangay";
$result = mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result))
{   
	$brgy = $row['brgy_name'];
	$sqlcntitr = "SELECT count(*) as cnt from indiv_treat_rec inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and contact_info.barangay='$brgy'";
	$resultcntitr = mysqli_query($con,$sqlcntitr);
	$rowitr = mysqli_fetch_array($resultcntitr);                                          
	$countitr = $rowitr['cnt'];
	$sqlcntprenatal = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Prenatal' and contact_info.barangay='$brgy'";
	$resultcntprenatal = mysqli_query($con,$sqlcntprenatal);
	$rowprenatal = mysqli_fetch_array($resultcntprenatal);                                          
	$countprenatal = $rowprenatal['cnt'];
	$sqlcntdental = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Dental Care' and contact_info.barangay='$brgy'";
	$resultcntdental = mysqli_query($con,$sqlcntdental);
	$rowdental = mysqli_fetch_array($resultcntdental);                                          
	$countdental = $rowdental['cnt'];
	$sqlcntchild = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Child Care' and contact_info.barangay='$brgy'";
	$resultcntchild = mysqli_query($con,$sqlcntchild);
	$rowchild = mysqli_fetch_array($resultcntchild);                                          
	$countchild = $rowchild['cnt'];
	$sqlcntnutri = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Child Nutrition' and contact_info.barangay='$brgy'";
	$resultcntnutri = mysqli_query($con,$sqlcntnutri);
	$rownutri = mysqli_fetch_array($resultcntnutri);                                          
	$countnutri = $rownutri['cnt'];
	$sqlcntinjury = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Injury' and contact_info.barangay='$brgy'";
	$resultcntinjury = mysqli_query($con,$sqlcntinjury);
	$rowinjury = mysqli_fetch_array($resultcntinjury);                                          
	$countinjury = $rowinjury['cnt'];
	$sqlcntadult = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Adult Immunization' and contact_info.barangay='$brgy'";
	$resultcntadult = mysqli_query($con,$sqlcntadult);
	$rowadult = mysqli_fetch_array($resultcntadult);                                          
	$countadult = $rowadult['cnt'];
	$sqlcntplan = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Family Planning' and contact_info.barangay='$brgy'";
	$resultcntplan = mysqli_query($con,$sqlcntplan);
	$rowplan = mysqli_fetch_array($resultcntplan);                                          
	$countplan = $rowplan['cnt'];
	$sqlcntpost = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Postpartum' and contact_info.barangay='$brgy'";
	$resultcntpost = mysqli_query($con,$sqlcntpost);
	$rowpost = mysqli_fetch_array($resultcntpost);                                          
	$countpost = $rowpost['cnt'];
	$sqlcnttb = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Tuberculosis' and contact_info.barangay='$brgy'";
	$resultcnttb = mysqli_query($con,$sqlcnttb);
	$rowtb = mysqli_fetch_array($resultcnttb);                                          
	$counttb = $rowtb['cnt'];
	$sqlcntchildimmu = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Child Immunization' and contact_info.barangay='$brgy'";
	$resultcntchildimmu = mysqli_query($con,$sqlcntchildimmu);
	$rowchildimmu = mysqli_fetch_array($resultcntchildimmu);                                          
	$countchildimmu = $rowchildimmu['cnt'];
	$sqlcntsick = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Sick Children' and contact_info.barangay='$brgy'";
	$resultcntsick = mysqli_query($con,$sqlcntsick);
	$rowsick = mysqli_fetch_array($resultcntsick);                                          
	$countsick = $rowsick['cnt'];
	$sqlcntfire = "SELECT count(*) as cnt from indiv_treat_rec inner join treatment inner join patient_enrollment inner join contact_info on contact_info.ci_id=patient_enrollment.ci_id and treatment.treatment_id=indiv_treat_rec.treatment_id and patient_enrollment.pe_id=indiv_treat_rec.pe_id and indiv_treat_rec.status='active' and treatment.nature_of_visit='Firecracker Injury' and contact_info.barangay='$brgy'";
	$resultcntfire = mysqli_query($con,$sqlcntfire);
	$rowfire = mysqli_fetch_array($resultcntfire);                                          
	$countfire = $rowfire['cnt'];
	$sqlupdate = "UPDATE report set no_itr='$countitr', prenatal='$countprenatal', dental_care='$countdental', child_care='$countchild', child_nutri='$countnutri', injury='$countinjury', adult_immu='$countadult', family_plan='$countplan', postpartum='$countpost', tuberculosis='$counttb', child_immu='$countchildimmu', sick_child='$countsick', firecracker_injury='$countfire' where barangay='$brgy'";
	$resultcnt = mysqli_query($con,$sqlupdate);
}


 
class PDF extends FPDF
{
// Page header
function Header()
{
	// Logo
	$this->SetFont('Arial','I',10);
	// Move to the right
	$this->Cell(60);
	// Title
	$this->Cell(70,8,'Marawi City Health Office Report',1,0,'C');
	// Line break
	$this->Ln(20);
}
 
// Page footer
function Footer()
{

	// Position at 1.5 cm from bottom
	$this->SetY(-15);	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number',0,0,'
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}C');
}
}
 
$display_heading = array('report_id'=>'No.','barangay'=>'Barangay', 'no_itr'=> 'No. of Patients', 'prenatal'=> 'Prenatal', 'dental_care'=> 'Dental care', 'child_care'=> 'Child Care', 'child_nutri'=> 'Child Nutrition', 'injury'=> 'Injury', 'adult_immu'=> 'Adult Immunization', 'family_plan'=> 'Family Planning', 'postpartum'=> 'Postpartum', 'tuberculosis'=> 'tuberculosis', 'child_immu'=> 'Child Immunization', 'sick_child'=> 'Sick children', 'firecracker_injury'=> 'Firecracker Injury');
 
$result = mysqli_query($con, "SELECT * FROM report") or die("database error:". mysqli_error($connString));
$header = mysqli_query($con, "SHOW columns FROM report");
 
$pdf = new PDF();
$pdf = new FPDF('L','mm',array(300,375));
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','I',10);


$pdf->Cell($pdf->GetStringWidth($display_heading['report_id'])+2,10,$display_heading['report_id'],1,0,"C");
$pdf->Cell(49,10,$display_heading['barangay'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['no_itr'])+2,10,$display_heading['no_itr'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['prenatal'])+2,10,$display_heading['prenatal'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['dental_care'])+2,10,$display_heading['dental_care'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_care'])+2,10,$display_heading['child_care'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_nutri'])+2,10,$display_heading['child_nutri'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['injury'])+2,10,$display_heading['injury'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['adult_immu'])+2,10,$display_heading['adult_immu'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['family_plan'])+2,10,$display_heading['family_plan'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['postpartum'])+2,10,$display_heading['postpartum'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['tuberculosis'])+2,10,$display_heading['tuberculosis'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_immu'])+2,10,$display_heading['child_immu'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['sick_child'])+2,10,$display_heading['sick_child'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['firecracker_injury'])+2,10,$display_heading['firecracker_injury'],1,0,"C");


foreach($result as $row) {
$pdf->Ln();
$pdf->Cell($pdf->GetStringWidth($display_heading['report_id'])+2,10,$row['report_id'],1,0,"C");
$pdf->Cell(49,10,$row['barangay'],1);
$pdf->Cell($pdf->GetStringWidth($display_heading['no_itr'])+2,10,$row['no_itr'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['prenatal'])+2,10,$row['prenatal'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['dental_care'])+2,10,$row['dental_care'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_care'])+2,10,$row['child_care'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_nutri'])+2,10,$row['child_nutri'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['injury'])+2,10,$row['injury'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['adult_immu'])+2,10,$row['adult_immu'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['family_plan'])+2,10,$row['family_plan'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['postpartum'])+2,10,$row['postpartum'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['tuberculosis'])+2,10,$row['tuberculosis'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_immu'])+2,10,$row['child_immu'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['sick_child'])+2,10,$row['sick_child'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['firecracker_injury'])+2,10,$row['firecracker_injury'],1,0,"C");



}

$sqltotal = "SELECT sum(no_itr) as itr,sum(prenatal) as prenatal,sum(dental_care) as dental,sum(child_care) as care,sum(child_nutri) as nutri,sum(injury) as injury,sum(adult_immu) as adult,sum(family_plan) as family,sum(postpartum) as postpartum,sum(tuberculosis) as tuberculosis,sum(child_immu) as childimmu,sum(sick_child) as sick,sum(firecracker_injury) as fire from report";
$result = mysqli_query($con, $sqltotal);
$total = mysqli_fetch_assoc($result);
$pdf->Ln();
$pdf->Cell($pdf->GetStringWidth($display_heading['report_id'])+2,10,' ',1,0,"C");
$pdf->Cell(49,10,'TOTAL',1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['no_itr'])+2,10,$total['itr'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['prenatal'])+2,10,$total['prenatal'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['dental_care'])+2,10,$total['dental'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_care'])+2,10,$total['care'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_nutri'])+2,10,$total['nutri'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['injury'])+2,10,$total['injury'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['adult_immu'])+2,10,$total['adult'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['family_plan'])+2,10,$total['family'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['postpartum'])+2,10,$total['postpartum'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['tuberculosis'])+2,10,$total['tuberculosis'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['child_immu'])+2,10,$total['childimmu'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['sick_child'])+2,10,$total['sick'],1,0,"C");
$pdf->Cell($pdf->GetStringWidth($display_heading['firecracker_injury'])+2,10,$total['fire'],1,0,"C");


$pdf->Output();
?>
