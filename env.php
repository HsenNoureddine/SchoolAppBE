<?php

// DB

$USERNAME = "root";
$PASSWORD = "";
$HOST = "Localhost";

$CON = new mysqli($HOST,$USERNAME,$PASSWORD);

$DBNAME = "SchoolDB";

function createDB($CON,$DBNAME)
{
    //query to create db
    $DBsql = "CREATE DATABASE IF NOT EXISTS ".$DBNAME;


    //check if db already exists
    if ((mysqli_query($CON, $DBsql))) {
        if (mysqli_warning_count($CON) == 0) { 
             echo "Database created successfully";
             echo "<br/>";

             $CON->query("USE ".$DBNAME);

             $CON->query("CREATE TABLE USERS(
                userid int not null auto_increment,
                fullname varchar(20) not null,
                email varchar(25),
                password varchar(20) not null,
                usertype int not null,
                PRIMARY KEY(userid)
            );");

            $CON->query("CREATE TABLE CLASSES(
                classid int not null auto_increment,
                name varchar(20) not null,
                code varchar(20) not null,  
                fee float,
                PRIMARY KEY(classid)
            );");

            $CON->query("CREATE TABLE SUBJECTS(
                subjectid int not null auto_increment,
                classid int not null,
                name varchar(20) not null,
                PRIMARY KEY(subjectid)
            );");

            $CON->query("CREATE TABLE USERCLASSES(
                classid int not null,
                userid int not null,
                FOREIGN KEY(userid) REFERENCES USERS(userid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid),
                PRIMARY KEY(classid,userid)
            );");

            $CON->query("CREATE TABLE TEACHERS(
                classid int not null,
                userid int not null,
                subjectid int not null,
                FOREIGN KEY(userid) REFERENCES USERS(userid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid),
                FOREIGN KEY(subjectid) REFERENCES SUBJECTS(subjectid),
                PRIMARY KEY(classid,userid,subjectid)
            );");

            $CON->query("CREATE TABLE ASSIGNMENTS(
                assignmentid int not null auto_increment,
                classid int not null,
                date DATE not null,
                assignment varchar(1000) not null,
                PRIMARY KEY(assignmentid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid)
            );");

            $CON->query("CREATE TABLE CALENDAR(
                eventid int not null auto_increment,
                classid int not null,
                date DATE not null,
                event varchar(1000) not null,
                PRIMARY KEY(eventid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid)
            );");

            $CON->query("CREATE TABLE DOCUMENTS(
                documentid int not null auto_increment,
                classid int not null,
                filePath varchar(1000) not null,
                subjectid int not null,
                PRIMARY KEY(documentid),
                FOREIGN KEY(subjectid) REFERENCES SUBJECTS(subjectid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid)
            );");

            $CON->query("CREATE TABLE EXAMS(
                examid int not null auto_increment, 
                classid int not null,
                date DATE not null,
                exam varchar(1000) not null,
                subjectid int not null,
                PRIMARY KEY(examid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid),
                FOREIGN KEY(subjectid) REFERENCES SUBJECTS(subjectid)
            );");

            $CON->query("CREATE TABLE NEWS(
                newsid int not null auto_increment, 
                classid int not null,
                date DATE not null,
                news varchar(1000) not null,
                subjectid int not null,
                PRIMARY KEY(newsid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid),
                FOREIGN KEY(subjectid) REFERENCES SUBJECTS(subjectid)
            );");

            $CON->query("CREATE TABLE GRADES(
                classid int not null,
                userid int not null,
                grade float not null,
                subjectid int not null,
                title varchar(100) not null,
                PRIMARY KEY(classid,title,userid,subjectid),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid),
                FOREIGN KEY(userid) REFERENCES USERS(userid),
                FOREIGN KEY(subjectid) REFERENCES SUBJECTS(subjectid)
            );");

            $CON->query("CREATE TABLE NOTIFICATIONS(
                classid int not null,
                dateTime DATETIME not null,
                event varchar(1000) not null,
                PRIMARY KEY(classid,dateTime),
                FOREIGN KEY(classid) REFERENCES CLASSES(classid)
            );");

            echo "tables created successfully";

        }
    } else {
        echo "Error creating database: " . mysqli_error($CON);
    }
}




// 

?>