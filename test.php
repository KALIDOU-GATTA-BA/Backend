
<?php 
//definition de classe student
class Employee 
{
  public $name ;
  public $salary;

  public function  __construct($name) //création de l'instance name
  {
    $this->name=$name;//réferencie l'objet courant
  }
 
};
$gatta=new Employee('gatta');// definie une nouvelle variable gatta 
echo $gatta->name;
   /* $employee = new Employee;
    $employee->setEmployeeName();

  public $salary;

  public function setEmployeeSalary()
  {
    echo 'SGD500';
  }
 $sal = new Employee;
 $sal->setEmployeeSalary();
function __construct ($name, $salary){
    $name='john';
    $salary="sgd500";
    $count=1;
}
function __construct  ($postalCode, $cityName, $countryName){
	$postalCode=33000;
    $cityName;="PARIS";
    $countryName='FRANCE';
}
$count=1;


class FullTimeStaff extends Employee{
	$this->name='Gatta';
	$this->salary="sgd500";
	
}
$count =__construct();
class PartTimeStaff extends Employee{
	$this->name='jack';
	$this->salary='SGD250';
}
?>