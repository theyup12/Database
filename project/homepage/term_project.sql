-- Professor Interface SQL
-- (a)  Given the social security number of a professor, list the titles, classrooms,
-- meeting days and time of his/her classes.
select Classroom, Meet_Day, Begin_Time, End_Time, C_no, Title 
from Sections INNER JOIN Courses ON Sections.C_no = Courses.Course_num
-- test values -> make sure to take input
where Prof_SSN = <Provided_SSN>;

-- b. Given a course number and a section number, count how many students
-- get each distinct grade, i.e. ‘A’, ‘A-’, ‘B+’, ‘B’, ‘B-’, etc.
select Grade, COUNT(Grade)
from (Enrollments INNER JOIN (Courses INNER JOIN Sections ON Sections.C_no = Course_num) ON Enrollments.Sno = Sections.Snum)
-- test values -> make sure to take input
where C_no = 18400 and Sno = 15
GROUP BY (Grade);

-- For the students SQL
-- a. Given a course number list the sections of the course, including the classrooms, the meeting days and time, and the number of students enrolled in
-- each section.
select Title, Snum, Classroom, Meet_Day, Begin_Time, End_Time, COUNT(CWID) as Students_Enrolled
from Enrollments INNER JOIN (Sections INNER JOIN Courses ON C_no = Course_num) ON (Snum = Sno)
-- test value
where C_no = 17754
GROUP BY Snum;


-- b. Given the campus wide ID of a student, list all courses the student took
-- and the grades.
select Fname, Lname, Title, Grade
from Students INNER JOIN (Enrollments INNER JOIN (Sections INNER JOIN Courses ON C_no = Course_num) ON (Snum = Sno)) ON Enrollments.ECWID = Students.CWID
-- test value
where Students.CWID = 888867451;

