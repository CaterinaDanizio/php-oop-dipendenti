<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-oop-dipendenti</title>
</head>
<body>

    <?php

        class Person {
            private $name;
            private $lastname;
            private $city;
            private $yearOfBirth;

            public function __construct($name, $lastname, $city, $yearOfBirth) {
       
                $this -> setName($name);
                $this -> setLastname($lastname);
                $this -> setCity($city);
                $this -> setYearOfBirth($yearOfBirth);
           }

           public function __toString() {

				return '<b>Name:</b> ' . $this -> getName() . '<br>'
					. '<b>Lastname:</b> ' . $this -> getLastname() . '<br>'
					. '<b>City</b>: ' . $this -> getCity() . '<br>'
                    . '<b>Year Of Birth</b>: ' . $this -> getYearOfBirth() . '<br>';
			}

            public function setName($name) {
				
					$this -> name = $name;
				
			}

			public function getName() {
				return $this -> name;
			}

            public function setLastname($lastname) {
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
            
        }

        class Employee extends Person {
            private $company;
            private $role;
            private $salary;

            public function __construct($name, $lastname, $city, $yearOfBirth, $company, $role, $salary) {
       
                parent::__construct($name, $lastname, $city, $yearOfBirth);
                $this -> setCompany($company);
                $this -> setCompanyRole($role);
                $this -> setSalary($salary);
           }

           public function __toString() {
				return parent:: __toString()
					. '<b>Company</b>: ' . $this -> getCompany() . '<br>'
					. '<b>Role</b>: ' . $this -> getCompanyRole() . '<br>'
					. '<b>Salary</b>: ' . $this -> getSalary() . '<br>';
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

            public function setSalary($salary) {
					$this -> salary = $salary;
			}

			public function getSalary() {
				return $this -> salary;
			}
            
            
        }

        class Boss extends Employee {
            private $department;
            private $team;
            private $seniority;  

            public function __construct($name, $lastname, $city, $yearOfBirth, $company, $role, $salary, $department, $team, $seniority) {
       
                parent::__construct($name, $lastname, $city, $yearOfBirth, $company, $role, $salary);
                $this -> setCompanyDep($department);
                $this -> setCompanyTeam($team);
                $this -> setSeniority($seniority);
           }

           public function __toString() {
				return parent:: __toString()
					. '<b>Department</b>: ' . $this -> getCompanyDep() . '<br>'
					. '<b>Team</b>: ' . $this -> getCompanyTeam() . '<br>'
					. '<b>Seniority</b>: ' . $this -> getSeniority() . '<br>';
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

        }

        $person = new Person ('Sara', 'Rossi', 'Sesto San Giovanni', 1991);
        echo '<h1>Persona:</h1> <br><br>' . $person . '<br>';

        $employee = new Employee ('Laura', 'Bianchi', 'Trieste', 1981, 'Unipol', 'Office Assistant', '20K/year');
        echo '<h1>Employee:</h1> <br><br>' . $employee . '<br>';

        $boss = new Boss ('Michele', 'Zonca', 'Milano', 1965, 'Prisma', 'Marketing Manager', '40K/year', 'Marketing', 'B2C', '25 years');
        echo '<h1>Boss:</h1> <br><br>' . $boss . '<br>';

    ?>
    
</body>
</html>