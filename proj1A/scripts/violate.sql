-- (1) --
INSERT INTO Movie VALUES(272, "xxx", 1934, "R", "Warner Bros.");
--Violate the PRIMARY KEY (id) constraint
--There has already existed a row of which id = 272 before inserting this tuple.
--Output:	ERROR 1062 (23000): Duplicate entry '272' for key 'PRIMARY'

-- (2) --
INSERT INTO Actor VALUES(1, "x","xx","Female", 19340525, NULL);
--Violate the PRIMARY KEY (id) constraint
--There has already existed a row of which id = 1 before inserting this tuple.
--Output: 	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the PRIMARY KEY (id) constraint
--			There has already existed a row of w' at line 1 

-- (3) --
UPDATE Actor SET sex = "mmm" WHERE id = 1;
--Violate the CHECK (sex = 'Male' OR sex = 'Female') constraint
--Value in sex field must be "Male" or "Female", instead of "mmm"
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the CHECK (sex = 'Male' OR sex = 'Female') constraint
--			Value in sex f' at line 1 

-- (4) --
INSERT INTO Sales VALUES(98, 88888, 888888);
--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--No tuple in Movie has an id value of 98.
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--			No tuple in Mov' at line 1

-- (5) --
INSERT INTO Sales VALUES(272, -1, 888888);
--Violate the CHECK(ticketsSold >= 0) constraint
--Value in ticketsSold field must be greater than or equal to zero.
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the CHECK(ticketsSold >= 0) constraint
--			Value in ticketsSold field mu' at line 1

-- (6) --
INSERT INTO Director VALUES(37146, "x", "xx", 19521112, NULL);
--Violate the PRIMARY KEY (id) constraint
--There has already existed a row of which id = 37146 before inserting this tuple
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the PRIMARY KEY (id) constraint
--			There has already existed a row of w' at line 1

-- (7) --
INSERT INTO MovieGenre VALUES(98, "Drama");
--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--No tuple in Movie has an id value of 98.
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--			No tuple in Mov' at line 1

-- (8) --
INSERT INTO MovieDirector VALUES(98, 111);
--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--No tuple in Movie has an id value of 98.
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--			No tuple in Mov' at line 1

-- (9) --
INSERT INTO MovieActor VALUES(98, 10208, "Doorman");
--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--No tuple in Movie has an id value of 98.
--Output: 	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--			No tuple in Mov' at line 1

-- (10) --
INSERT INTO MovieDirector VALUES(98, 2, "Doorman");sho
--Violate the FOREIGN KEY(aid) REFERENCES Actor(id) constraint
--No tuple in Actor has an id value of 2.
--Output:	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(aid) REFERENCES Actor(id) constraint
--			No tuple in Act' at line 1

-- (11) --
INSERT INTO MovieDirector MovieRating(98, 50, 22);
--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--No tuple in Movie has an id value of 98.
--Output: 	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the FOREIGN KEY(mid) REFERENCES Movie(id) constraint
--			No tuple in Mov' at line 1

-- (12) --
INSERT INTO Review("xx", 19951222, 272, 8, "ss");
--Violate the CHECK(rating >= 0 AND rating <= 5) constraint
--Value in rating field must range from zero to five
--Output: 	ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near '--Violate the CHECK(rating >= 0 AND rating <= 5) constraint
--Value in rating fi' at line 1