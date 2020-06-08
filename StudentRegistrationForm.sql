create database StudentRegistrationForm
use master
use StudentRegistrationForm

create table Course(
	id int primary key identity,
	CourseName varchar(50),
	CoursCode varchar(10),
	CreditHours int,
	_Year int,
	Term int,
	InstructerId int
)
create table Student(
	id int primary key identity,
	FirstName varchar(50),
	LastName varchar(50),
	EmailAddress varchar(50),
	PhoneNumber varchar(15)
)
create table Instructer(
	id int primary key identity,
	FirstName varchar(50),
	LastName varchar(50),
	EmailAddress varchar(50),
	PhoneNumber varchar(15),
	LevelOfEducation varchar(50)
)
create table StudentDetail(
	StudentId int,
	CourseId int,
	Term varchar(20),
	_Year varchar (4)
	primary key (StudentId,CourseId)
)

--foreign key constraints
alter table Course
add constraint FK_Course_Teacher
foreign key (InstructerId) references Instructerid)
alter table StudentDetail
add constraint FK_StudentDetail_Student
foreign key (StudentId) references Student(id)
alter table StudentDetail
add constraint FK_StudentDetail_Course
foreign key (CourseId) references Course(id)