-- suppose your foxname is Gold and your foxword is 33456. Log into your foxbook
-- Now you wanted to add your contacts in the foxbook table. How can you do that?
	-- add a new column to foxbook named contacts and print the table.
    -- Example 
    -- alter table foxbook add contacts varchar(20);
	-- update foxbook set contacts = '123456' where foxname='Wu';
-- Now add all the contacts for others
-- Similarly add another column status and set status 'active' for all entries
	-- alter table foxbook add status varchar(10) default 'active';
    
-- Now set the status inactive for Kim. Use update.

-- Delete the inactive ones.

-- Find out numbers of users from Physics. Use count() 

-- Group the users and print the table as per the group. Use group by

-- Print the coulumn name foxname as username. Use as

-- Print the foxname who is from computer science but coding is not a hobby

-- Join the foxbook and instructor table properly to find out all the related information.

-- print the fox names which constist of exactly 5 letters. use like and _

-- Add a howl(like a tweet) for Crick. The word limit for the howl is 20 letters. Count the length of the status. 
	-- 1st add a new coulum named howl in the foxbook
    -- then add the howl text status for Crick
    -- Use the length() to count the length of the howl.


drop database if exists socialMedia;
create database socialMedia;
use socialMedia;

create table foxBook(
	foxname varchar(20),
    foxword char(5),
    dept_name varchar(20),
    hobby varchar(30),
    primary key (foxname,foxword)
);

insert INTO foxBook VALUES ('Srinivasan','10101','Comp. Sci.','Coding');
insert INTO foxBook VALUES ('Wu','12121','Finance','Market Research');
insert INTO foxBook VALUES ('Mozart','15151','Music','Card Tricks');
insert INTO foxBook VALUES ('Einstein','22222','Physics','Playing Violin');
insert INTO foxBook VALUES ('El Said','32343','History','Reading Books');
insert INTO foxBook VALUES ('Gold','33456','Physics','Building Radar');
insert INTO foxBook VALUES ('Katz','45565','Comp. Sci.','Cryptography');
insert INTO foxBook VALUES ('Califieri','58583','History','Reading Novels');
insert INTO foxBook VALUES ('Singh','76543','Finance','Market Analysis');
insert INTO foxBook VALUES ('Crick','76766','Biology','Life science Research');
insert INTO foxBook VALUES ('Brandt','83821','Comp. Sci.','Coding');
insert INTO foxBook VALUES ('Kim','98345','Elec. Eng.','Research');


create table instructor(
	ID char(5),
	name varchar(20),
    dept_name varchar(20),
    salary numeric(8,2),
    primary key (ID)
);

insert INTO instructor VALUES ('10101','Srinivasan','Comp. Sci.',65000);
insert INTO instructor VALUES ('12121','Wu','Finance',90000);
insert INTO instructor VALUES ('15151','Mozart','Music',40000);
insert INTO instructor VALUES ('22222','Einstein','Physics',40000);
insert INTO instructor VALUES ('32343','El Said','History',60000);
insert INTO instructor VALUES ('33456','Gold','Physics',87000);
insert INTO instructor VALUES ('45565','Katz','Comp. Sci.',75000);
insert INTO instructor VALUES ('58583','Califieri','History',62000);
insert INTO instructor VALUES ('76543','Singh','Finance',80000);
insert INTO instructor VALUES ('76766','Crick','Biology',72000);
insert INTO instructor VALUES ('83821','Brandt','Comp. Sci.',92000);
insert INTO instructor VALUES ('98345','Kim','Elec. Eng.',80000);

select * from foxbook where foxname = 'Gold' and foxword = 33456;

alter table foxbook add contacts varchar(20);
update foxbook set contacts = '123456' where foxname='Wu';
update foxbook set contacts = '345929' where foxname='Singh';
update foxbook set contacts = '445678' where foxname='Mozart';
update foxbook set contacts = '345901' where foxname='Brandt';
update foxbook set contacts = '789234' where foxname='Califieri';
update foxbook set contacts = '453129' where foxname='Crick';
update foxbook set contacts = '678345' where foxname='Einstein';
update foxbook set contacts = '234900' where foxname='El Said';
update foxbook set contacts = '001245' where foxname='Gold';
update foxbook set contacts = '000345' where foxname='Katz';
update foxbook set contacts = '678912' where foxname='Kim';
update foxbook set contacts = '000345' where foxname='Srinivasan';

alter table foxbook add status varchar(10) default 'active';
update foxbook set status = 'inactive' where foxname = 'Kim';

SET SQL_SAFE_UPDATES = 0;
delete from foxbook where status = 'inactive';
select * from foxbook;
-- select count(distinct foxname) from foxbook where dept_name = 'Physics';
-- select dept_name from foxbook group by dept_name;
-- select foxname as username from foxbook;
-- select foxname from foxbook where hobby != 'coding' and dept_name = 'Comp. Sci.';
-- select * from foxbook, instructor where foxname = name;
select foxname from foxbook where foxname like '_____';

alter table foxbook add howl varchar(20);
update foxbook set howl = 'Hello!' where foxname = 'Crick';
select length(howl) as howl_length from foxbook where foxname = 'Crick';



 