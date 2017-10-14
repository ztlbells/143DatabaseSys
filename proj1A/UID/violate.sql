-- (1) --
INSERT INTO Movie VALUES(272, "xxx", 1934, "R", "Warner Bros.");
/* Violate the PRIMARY KEY (id) constraint. There has already existed a row of which id = 272 before inserting this tuple.
Output:	ERROR 1062 (23000): Duplicate entry '272' for key 'PRIMARY' */

-- (2) --
INSERT INTO Actor VALUES(1, "x","xx","Female", 19340525, NULL);
/* Violate the PRIMARY KEY (id) constraint/ There has already existed a row of which id = 1 before inserting this tuple.
Output:  Duplicate entry '1' for key 'PRIMARY'*/

-- (3) --
UPDATE Actor SET sex = "mmm" WHERE id = 1;
/* Violate the CHECK (sex = 'Male' OR sex = 'Female') constraint. Value in sex field must be "Male" or "Female", instead of "mmm"
Output:  [No error msg here since CHECK is not supported] Query OK, 1 rows affected (0.03 sec) Rows matched: 1  Changed: 1  Warnings: 0 */

-- (4) --
INSERT INTO Sales VALUES(98, 88888, 888888);
/* Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint. No tuple in Movie has an id value of 98.
Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`Sales`, CONSTRAINT `Sales_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))*/

-- (5) --
INSERT INTO Sales VALUES(272, -1, 888888);
/* Violate the CHECK(ticketsSold >= 0) constraint. Value in ticketsSold field must be greater than or equal to zero.
Output:  [No error msg here since CHECK is not supported] Query OK, 1 row affected (0.01 sec)*/

-- (6) --
INSERT INTO Director VALUES(37146, "x", "xx", 19521112, NULL);
/* Violate the PRIMARY KEY (id) constraint. There has already existed a row of which id = 37146 before inserting this tuple 
Output: ERROR 1062 (23000): Duplicate entry '37146' for key 'PRIMARY'*/

-- (7) --
INSERT INTO MovieGenre VALUES(98, "Drama");
/* Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint. No tuple in Movie has an id value of 98.
Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))*/

-- (8) --
INSERT INTO MovieDirector VALUES(98, 111);
/* Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint. No tuple in Movie has an id value of 98.
Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))*/

-- (9) --
INSERT INTO MovieActor VALUES(98, 10208, "Doorman");
/* Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint. No tuple in Movie has an id value of 98.
Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))*/

-- (10) --
INSERT INTO MovieDirector VALUES(98, 2, "Doorman");
/* Violate the FOREIGN KEY(aid) REFERENCES Actor(id) constraint. No tuple in Actor has an id value of 2.
Output: ERROR 1136 (21S01): Column count doesn't match value count at row 1*/

-- (11) --
INSERT INTO MovieRating VALUES(98, 50, 22);
/* Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint. No tuple in Movie has an id value of 98.
Output: ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`CS143`.`MovieRating`, CONSTRAINT `MovieRating_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))*/

-- (12) --
INSERT INTO Review VALUES("xx", 19951222, 272, 8, "ss");
/* Violate the CHECK(rating >= 0 AND rating <= 5) constraint. Value in rating field must range from zero to five
Output: [No error msg here since CHECK is not supported] Query OK, 1 row affected (0.00 sec)*/

