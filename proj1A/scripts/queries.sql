/*Give the names of all the actors in the movie 'Death to Smoochy'.*/
SELECT CONCAT(A.first, " ", A.last) AS NAME
FROM Movie AS M, Actor AS A, MovieActor AS MA 
WHERE M.id = MA.mid AND A.id = MA.aid AND M.title = 'Death to Smoochy';

/*Give the count of all the directors who directed at least 4 movies.*/
SELECT COUNT(*) as COUNT
FROM
	(SELECT *
	 FROM Director AS D, MovieDirector AS MD
	 WHERE D.id = MD.did 
	 GROUP BY D.id
	 HAVING COUNT(DISTINCT mid) >= 4) AS A;
	 
/*Give the name of directors whose film has a maximum IMDB rating.*/
SELECT DISTINCT(CONCAT(D.first, " ", D.last))AS NAME
FROM Director as D, MovieRating as R, MovieDirector as MD
WHERE D.id = MD.did AND MD.did = R.mid AND R.imdb IN (SELECT MAX(imdb) FROM MovieRating);

/*Give the minimum totalIncome of movies in different genres */
SELECT MIN(totalIncome), genre
FROM Sales AS S, MovieGenre as GE
WHERE S.mid = GE.mid
GROUP BY GE.genre;




