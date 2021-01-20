<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-oop-dipendenti 2</title>
</head>
<body>

    <?php

        class Person {
            private $name;
            private $lastname;
            private $city;
            private $yearOfBirth;
            protected $securyLvl;

            public function __construct($name, $lastname, $city, $yearOfBirth, $securyLvl) {
       
                $this -> setName($name);
                $this -> setLastname($lastname);
                $this -> setCity($city);
                $this -> setYearOfBirth($yearOfBirth);
                $this -> setSecurity($securyLvl);
           }

           public function __toString() {

				return '<b>Name:</b> ' . $this -> getName() . '<br>'
                . '<b>Lastname:</b> ' . $this -> getLastname() . '<br>'
                . '<b>City</b>: ' . $this -> getCity() . '<br>'
                . '<b>Year Of Birth</b>: ' . $this -> getYearOfBirth() . '<br>'
                . '<b>Security Level</b>: ' . $this -> getSecurity() . '<br>';
			}

            public function setName($name) {

                if (strlen($name) < 3) {
                     $e1 = new Exception('at least 3 characters for the name');
                     throw $e1;
                    }
				
				$this -> name = $name;	
			}

			public function getName() {
				return $this -> name;
			}

            public function setLastname($lastname) {
                if (strlen($lastname) < 3) {
                    $e2 = new Exception('at least 3 characters for the lastname');
                     throw $e2;
                    }
				
                $this -> lastname = $lastname;
			}

			public function getLastname() {
				return $this -> lastname;
			}

            public function setCity($city) {
				$this -> city = $city;
			}

            public function getCity() {
				return $this -> city;
			}

            public function setYearOfBirth($yearOfBirth) {
				$this -> yearOfBirth = $yearOfBirth;
			}

            public function getYearOfBirth() {
				return $this -> yearOfBirth;
		    }

            public function getSecurity() {
                return $this -> securyLvl;
            }
            public function setSecurity($securyLvl) {
                        
                $this -> securyLvl = $securyLvl;
            }
            
        }

        class Employee extends Person {
            private $company;
            private $role;
            private $ral;

            public function __construct($name, $lastname, $city, $yearOfBirth, $securyLvl, $company, $role, $ral) {
       
                parent::__construct($name, $lastname, $city, $yearOfBirth, $securyLvl);
                $this -> setCompany($company);
                $this -> setCompanyRole($role);
                $this -> setRal($ral);
                $this -> setSecurity($securyLvl);
            }

            public function __toString() {
				return parent:: __toString()
                . '<b>Company</b>: ' . $this -> getCompany() . '<br>'
                . '<b>Role</b>: ' . $this -> getCompanyRole() . '<br>'
                . '<b>Ral</b>: ' . $this -> getRal() . '<br>';
			}

            
            public function setCompany($company) {
				$this -> company = $company;
			}

			public function getCompany() {
				return $this -> company;
			}

            public function setCompanyRole($role) {
				$this -> role = $role;
			}

			public function getCompanyRole() {
				return $this -> role;
			}

            public function setRal($ral) {
                if($ral < 10.000 || $ral > 100.000) {
                   $e5 = new Exception('Ral between 10.000 and 100.000 for employees');
                    throw $e5; 
                }
				$this -> ral = $ral;
			}

			public function getRal() {
				return $this -> ral;
			}

            public function setSecurity($securyLvl) {
                if($securyLvl < 1 || $securyLvl > 5) {
                    $e3 = new Exception('security level for employee between 1 and 5');
                    throw $e3;
                }
                
                $this -> securyLvl = $securyLvl;
            }
            
            
        }

        class Boss extends Employee {
            private $department;
            private $team;
            private $seniority; 
            private $employees; 

            public function __construct($name, $lastname, $city, $yearOfBirth, $securyLvl, $company, $role, $ral, $department, $team, $seniority, $employees = []) {
       
                parent::__construct($name, $lastname, $city, $yearOfBirth, $securyLvl, $company, $role, $ral);
                $this -> setCompanyDep($department);
                $this -> setCompanyTeam($team);
                $this -> setSeniority($seniority);
                $this -> setSecurity($securyLvl);
                $this -> setEmployees($employees);
           }

           public function __toString() {
				return parent:: __toString()
                . '<b>Department</b>: ' . $this -> getCompanyDep() . '<br>'
                . '<b>Team</b>: ' . $this -> getCompanyTeam() . '<br>'
                . '<b>Seniority</b>: ' . $this -> getSeniority() . '<br>'
                . '<b>Employees</b>:<br>' . $this -> getEmpsStr() . '<br>';
			}

            public function setCompanyDep($department) {
				$this -> department = $department;
			}

			public function getCompanyDep() {
				return $this -> department;
			}

            public function setCompanyTeam($team) {
				$this -> team = $team;
			}

			public function getCompanyTeam() {
				return $this -> team;
			}

            public function setSeniority($seniority) {
				$this -> seniority = $seniority;
			}

			public function getSeniority() {
				return $this -> seniority;
			}

            public function setSecurity($securyLvl) {
                if($securyLvl < 6) {
                    $e4 = new Exception('security level for boss between 6 and 10');
                    throw $e4;
                }       
                $this -> securyLvl = $securyLvl;
            }

            public function getEmployees() {
                    
                    return $this -> employees;
                    }
            
            public function setEmployees($employees) {
                    if(count($employees) < 1) {
                    $e6 = new Exception('No employees in the array');
                    throw $e6;
                } 
                        $this -> employees = $employees;
                    }

            private function getEmpsStr() {
                        $str = '';
                        for ($x=0;$x<count($this -> getEmployees());$x++) {
                            $emp = $this -> getEmployees()[$x];
                            $fullname = $emp -> getName() . ' ' . $emp -> getLastname();
                            $str .= ($x + 1) . ': ' . $fullname . '<br>';
                        }
                        return $str;
                    }                    
        }


        try {

            $person = new Person ('Sara', 'Rossi', 'Sesto San Giovanni', 1991, 1);
                echo '<h1>Persona:</h1> <br><br>' . $person . '<br>';   
            
             $employee = new Employee ('Laura', 'Bianchi', 'Trieste', 1981, 4, 'Unipol', 'Office Assistant', 17.000); 
            echo '<h1>Employee:</h1> <br><br>' . $employee . '<br>';

            $boss = new Boss ('Michele', 'Zonca', 'Milano', 1965, 7, 'Prisma', 'Marketing Manager', 100.000, 'Marketing', 'B2C', '25 years', [
                        $employee,
                        $employee,
                        $employee,
                        $employee,
                    ]);
            echo '<h1>Boss:</h1> <br><br>' . $boss . '<br>';    
            } 

        catch(Exception $e3) {
            echo "Error: security level for employee is between 1 and 5 <br>";
            } 

        catch(Exception $e4) {
            echo "Error: security level for boss is between 6 and 10 <br>";
        }
        
        catch (Exception  $e1) {
            echo "Error: at least 3 characters for name!<br>";
            } 
        catch (Exception  $e2) {
            echo "Error: at least 3 characters for lastname!<br>";
            } 
            
        catch(Exception $e5) {
            echo "Error: RAL for employees is between 10.000 and 100.000 <br>";
            }

        catch(Exception $e6) {
            echo "Error: every boss must have at least a employee <br>";
            }

            
    ?>
    
</body>
</html>