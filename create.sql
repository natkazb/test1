create table if not exists holiday(
         id int not null auto_increment primary key,
		 holiday varchar(10),
		 is_weekend int
       );
	   
create table if not exists tariff(
         id int not null auto_increment primary key,
		 svcId int,
		 title varchar(300),
		 price int,
		 fromDate varchar(10),
		 toDate varchar(10)
       );
