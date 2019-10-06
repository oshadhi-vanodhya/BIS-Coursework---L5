CREATE TABLE Student (
student_id int(5)  PRIMARY KEY NOT NULL AUTO_INCREMENT;
  username varchar(30) ,
  student_fname` char(100)  ,
  `student_lname` char(100)  ,
  `lecturer_id` int(5) NOT NULL
)




CREATE TABLE Student
(
student_id INT(5)  not null PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(30) UNIQUE,
student_fname CHAR(100),
slastname VARCHAR(100)
);


INSERT INTO Student (sid,username, sfirstname, slastname)
VALUES ('0056','stava', 'Stavanger', 'Nowa');

INSERT INTO Student (username, sfirstname, slastname)
VALUES ('Oshi', 'Oshadhi', 'Vanodhya');

INSERT INTO Student (username, sfirstname, slastname)
VALUES ('Sanu', 'Sanushka', 'Amani');

INSERT INTO Student (username, sfirstname, slastname)
VALUES ('Thara', 'Tharukie', 'Ayodhya');

CREATE TABLE Lecturer
(
lid INT(5)  not null PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(30) UNIQUE,
lfirstname VARCHAR(100),
llastname VARCHAR(100),
loffice INT(3)
);

INSERT INTO Lecturer (username, lfirstname, llastname, loffice)
VALUES ('Abarnah', 'Abarnah', 'Kirupananda', '002');

INSERT INTO Lecturer (username, lfirstname, llastname, loffice)
VALUES ('Janice', 'Janice', 'Abeykoon', '002');

CREATE TABLE Student_Lecturer
(
sid INT(5)  not null,
lid INT(5)  not null,
CONSTRAINT PK_Student_Lecturer PRIMARY KEY (sid ,lid),
foreign key (sid) references Student(sid),
foreign key(lid) references Lecturer(lid)
);

INSERT INTO Student_Lecturer (sid, lid)
VALUES ('056', '2');

INSERT INTO Student_Lecturer (sid, lid)
VALUES ('057', '1');

INSERT INTO Student_Lecturer (sid, lid)
VALUES ('058', '1');

INSERT INTO Student_Lecturer (sid, lid)
VALUES ('059', '2');

CREATE TABLE SLogin
(
username VARCHAR(30) not null,
upass VARCHAR(50) not null,
CONSTRAINT PK_SLogin PRIMARY KEY (username ,upass),
CONSTRAINT FK_SLogin FOREIGN KEY (username) REFERENCES Student(username)
);


INSERT INTO SLogin (username, upass)
VALUES ('stava','123');

INSERT INTO SLogin (username, upass)
VALUES ('Oshi','123');

INSERT INTO SLogin (username, upass)
VALUES ('Sanu','123');

INSERT INTO SLogin (username, upass)
VALUES ('Thara','123');


CREATE TABLE LLogin
(
username VARCHAR(30) not null,
upass VARCHAR(50) not null,
CONSTRAINT PK_LLogin PRIMARY KEY (username ,upass),
CONSTRAINT FK_LLogin FOREIGN KEY (username) REFERENCES Lecturer(username)
);

INSERT INTO LLogin (username, upass)
VALUES ('Abarnah','123');

INSERT into LLogin (username, upass)
VALUES ('Janice','123');

CREATE TABLE PSession
(
session_no INT(1) not null PRIMARY KEY,
sdate Date,
stime time,
etime time,
comments varchar(500)
);

CREATE TABLE PSession_Student
(
session_no INT(1)  not null ,
sid INT(5)  not null,
CONSTRAINT PK_PSession_Student PRIMARY KEY (session_no ,sid),
foreign key (session_no) references PSession(session_no),
foreign key(sid) references Student(sid)
);




