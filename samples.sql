use h2;

insert into users(id, type, name, email, description, tags) values
	(1, 0, 'Ivan Stosic', 'ivan100sic@gmail.com', 'Computer scientist and algorithmic programmer!', 'Algorithms, Data structures, C++, Python'),
	(2, 0, 'Natalija Puzic', 'natalija.puzic@pmf.edu.rs', 'Graphics designer', 'Adobe Photoshop, Design, Graphics, Web, HTML'),
	(3, 0, 'Lazar Stamenkovic', 'lazar.stamenkovic@pmf.edu.rs', 'Back-end programmer, studying at the Faculty of Science, Nis', 'Nis, C++, Java, .NET, SQL');

insert into users(id, type, name, email, description, tags) values
	(4, 1, 'PMF Nis', 'pmf@pmf.ni.ac.rs', 'Department of computer science, Faculty of Science, University of Nis, is hiring a Teaching Assistant', 'Mathematics, Algorithms, Teaching, C++, Java, Web'),
	(5, 1, 'MDCS', 'mdcs@microsoft.com', 'Microsoft Development Center Serbia, Belgrade, is hiring a Software development intern. Three months of paid internship.', 'C++, Algorithms, OOP, Windows'),
	(6, 1, 'Jane Street', 'office@janestreet.com', 'Trading Interns - Work with experienced traders to find and analyze arbitrage strategies, hedge risk, and search for new opportunities. Trading interns usually split their summer between two different trading desks, and spend a week in one of our overseas offices.', 'Statistics, Mathematics, C++, Probability, Finance, Python, Machine learning');