--Professors
CREATE TABLE Professors(
    SSN INT PRIMARY KEY,
    Name VARCHAR(50),
	Sex VARCHAR(10),
	Area_code INT,
	Digit_num INT,
	Street VARCHAR(30),
	Zip_code INT,
	S_State VARCHAR(10),
	City VARCHAR(10),
	Title VARCHAR(10),
	Salary INT,
    P_Degrees VARCHAR(50));

--LOAD DATA INFILE 'professors.txt' INTO TABLE Professors;

--Departments
Create Table Departments( 
	Dept_num INT PRIMARY KEY, 
	Name varchar(50), 
	telephone_num int, 
	office_loc varchar(50),
	title varchar(50),
	chair_person INT,
	
	Foreign Key (chair_person)
		REFERENCES Professors(SSN));


--LOAD DATA INFILE 'departments.txt' INTO TABLE Students;

--Courses
Create Table Courses( 
	Course_num INT PRIMARY KEY, 
	Title VARCHAR(20), 
	Textbook VARCHAR(50), 
	Units VARCHAR(20), 
	Prerequisite VARCHAR(20), 
	Department_no INT,
	
	Foreign Key (Department_no)
		REFERENCES Departments(Dept_num));

--LOAD DATA INFILE 'courses.txt' INTO TABLE Students;

--Sections
CREATE TABLE Sections(
    Snum INT PRIMARY KEY,
    Classroom VARCHAR(50),
    Seats VARCHAR(50),
    Meet_Day VARCHAR(50),
    Begin_Time VARCHAR(20),
    End_Time VARCHAR(10),
    C_no INT,
    Prof_SSN INT,
	
	Foreign Key (Prof_SSN)
		REFERENCES Professors(SSN),
	Foreign Key (C_no)
		REFERENCES Courses(Course_num));

--LOAD DATA INFILE 'sections.txt' INTO TABLE Students;

--Students - needs work
CREATE TABLE Students(
    CWID INT PRIMARY KEY,
    Fname VARCHAR(50),
    Lname VARCHAR(50),
    Address VARCHAR(50),
    Telephone_num INT,
    Sex VARCHAR(10),
	Major_dep INT,
	Minor_dep VARCHAR(20)
	Foreign Key(Major_dep)
		REFERENCES Departments(Dept_num));

--LOAD DATA INFILE 'students.txt' INTO TABLE Students;

--Enrollments
CREATE TABLE Enrollments(
    ECWID VARCHAR(9) NOT NULL,
    Sno INT NOT NULL,
    Grade VARCHAR(3),
	
    Foreign Key(ECWID)
		REFERENCES Students(CWID),
	Foreign Key(Sno)
		REFERENCES Sections(Snum));

--LOAD DATA INFILE 'enrollments.txt' INTO TABLE Students;