<?php

	class page1{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no ORDER BY salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td> <b>First Name</b> </td><td> Last Name </td><td> Salary </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page2{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM salaries
				LEFT JOIN employees ON salaries.emp_no=employees.emp_no WHERE salaries.from_date>=\'1981-01-01\' AND 
				salaries.to_date<=\'1985-12-31\' ORDER BY salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td> First Name </td><td> Last Name </td><td> Salary </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page3{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, salaries.salary FROM dept_manager
				LEFT JOIN salaries ON dept_manager.emp_no=salaries.emp_no, departments WHERE 
				departments.dept_no=dept_manager.dept_no AND salaries.to_date=\'9999-01-01\' ORDER BY
				salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td> Department </td><td> Salary </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page4{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT DISTINCT dept_name FROM departments;');

			echo "<table>";
			echo "<tr><td> Departments </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page5{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, dept_manager.emp_no, employees.first_name, employees.last_name
				FROM departments, dept_manager LEFT JOIN employees ON dept_manager.emp_no=employees.emp_no WHERE 
				departments.dept_no=dept_manager.dept_no AND dept_manager.to_date=\'9999-01-01\';');

			echo "<table>";
			echo "<tr><td> Departments </td><td> ID </td><td> First Name </td><td> Last Name </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td><td> $value[3] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page6{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT employees.first_name, employees.last_name, salaries.salary FROM dept_emp
				LEFT JOIN dept_manager ON dept_emp.emp_no=dept_manager.emp_no, employees, salaries WHERE
				dept_emp.emp_no=employees.emp_no AND dept_emp.emp_no=salaries.emp_no AND dept_manager.emp_no IS NULL AND
				dept_emp.to_date=\'9999-01-01\' ORDER BY salaries.salary DESC LIMIT 1;');

			echo "<table>";
			echo "<tr><td> First Name </td><td> Last Name </td><td> Salary </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page7{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT salaries.emp_no, salaries.salary, employees.first_name, employees.last_name 
				FROM salaries LEFT JOIN employees ON salaries.emp_no=employees.emp_no WHERE 
				salaries.to_date=\'9999-01-01\' order by salaries.salary limit 1;');

			echo "<table>";
			echo "<tr><td> ID </td><td> Salary </td><td> First Name </td><td> Last Name </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td><td> $value[2] </td><td> $value[3] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page8{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, count(dept_emp.emp_no) FROM dept_emp 
				LEFT JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE to_date=\'9999-01-01\' GROUP BY dept_emp.dept_no;');

			echo "<table>";
			echo "<tr><td> Departments </td><td> Number of Employees </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class page9{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT departments.dept_name, sum(salaries.salary) FROM salaries 
				LEFT JOIN dept_emp ON salaries.emp_no=dept_emp.emp_no, departments WHERE departments.dept_no=dept_emp.dept_no 
				AND salaries.to_date=\'9999-01-01\' GROUP BY dept_emp.dept_no;');

			echo "<table>";
			echo "<tr><td> Departments </td><td> Salary Expenditures </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td><td> $value[1] </td></tr>";
			}
			echo "</table>";
		}

	}

	class page10{
		function __construct(){
			global $db;

			$qry = $db->query('SELECT sum(salary) FROM salaries WHERE to_date=\'9999-01-01\';');

			echo "<table>";
			echo "<tr><td> Total Current Expenditures </td></tr>";
			while($value = $qry->fetch(PDO::FETCH_BOTH)){
				echo "<tr><td> $value[0] </td></tr>";
			}
			echo "</table>";
		}
		
	}

	class pageinsert{
		function __construct(){
			global $db;

			echo "insert page";
		}
	}

	class pageupdate{
		function __construct(){
			global $db;

			echo "update page";
		}
	}
?>
