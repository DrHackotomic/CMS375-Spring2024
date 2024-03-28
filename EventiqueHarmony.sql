-- Eventique Harmony
-- Nicole Edoziem worked on creating this database
drop database if exists EventiqueHarmony;
create database EventiqueHarmony;
use EventiqueHarmony;

create table users (
	user_id char(5),
    first_name varchar(25),
    last_name varchar(25),
    email varchar(50),
    phone_number char(10),
    user_role varchar(15),
    PRIMARY KEY (user_id)
);

INSERT INTO users VALUES ('U0001', 'John', 'Doe', 'johndoe@gmail.com', '4071234567', 'Organizer');
INSERT INTO users VALUES ('U0002', 'Jane', 'Smith', 'janesmith@gmail.com', '9712345678', 'Participant');
INSERT INTO users VALUES ('U0003', 'Emily', 'Johnson', 'emilyj@gmail.com', '3213456789', 'Participant');
INSERT INTO users VALUES ('U0004', 'Michael', 'Williams', 'michaelw@gmail.com', '4074567890', 'Organizer');
INSERT INTO users VALUES ('U0005', 'Mary', 'Brown', 'maryb@gmail.com', '9715678901', 'Participant');
INSERT INTO users VALUES ('U0006', 'David', 'Jones', 'davidj@gmail.com', '3216789012', 'Organizer');
INSERT INTO users VALUES ('U0007', 'Patricia', 'Garcia', 'patriciag@gmail.com', '4077890123', 'Participant');
INSERT INTO users VALUES ('U0008', 'James', 'Miller', 'jamesm@gmail.com', '9718901234', 'Participant');
INSERT INTO users VALUES ('U0009', 'Linda', 'Martinez', 'lindam@gmail.com', '3219012345', 'Organizer');
INSERT INTO users VALUES ('U0010', 'Robert', 'Hernandez', 'roberth@gmail.com', '4070123456', 'Participant');
INSERT INTO users VALUES ('U0011', 'Patricia', 'Moore', 'patriciam@gmail.com', '9711234567', 'Participant');
INSERT INTO users VALUES ('U0012', 'Charles', 'Taylor', 'charlest@gmail.com', '3212345678', 'Organizer');
INSERT INTO users VALUES ('U0013', 'Barbara', 'Anderson', 'barbaraa@gmail.com', '4073456789', 'Participant');
INSERT INTO users VALUES ('U0014', 'Thomas', 'Jackson', 'thomasj@gmail.com', '9714567890', 'Organizer');
INSERT INTO users VALUES ('U0015', 'Sarah', 'White', 'sarahw@gmail.com', '3215678901', 'Participant');

-- select * from users;

create table location (
	location_id char(5),
    location_name varchar(100),
    address varchar(200),
    capacity char(100),
    PRIMARY KEY (location_id)
);

INSERT INTO location VALUES ('L1001', 'Tech Central Convention Center', '123 Tech Ave, Tech City', '5000');
INSERT INTO location VALUES ('L1002', 'Highland Trails Running Park', '456 Mountain Rd, Highland', '2000');
INSERT INTO location VALUES ('L1003', 'Downtown Jazz Hall', '789 Jazz St, Music City', '300');
INSERT INTO location VALUES ('L1004', 'City Library Auditorium', '101 Book Ln, Literary Town', '800');
INSERT INTO location VALUES ('L1005', 'Wellness Community Center', '202 Health Dr, Wellness City', '1000');
INSERT INTO location VALUES ('L1006', 'Eco Innovation Forum', '303 Eco Rd, Green City', '600');
INSERT INTO location VALUES ('L1007', 'Cinema Arts Venue', '404 Film St, Cinema City', '250');
INSERT INTO location VALUES ('L1008', 'Local Farmers Market', '505 Food Ave, Gourmet Town', '1500');
INSERT INTO location VALUES ('L1009', 'Arcade Expo Hall', '606 Gamer Ln, Arcade City', '1200');
INSERT INTO location VALUES ('L1010', 'Digital Media Lab', '707 Online Blvd, Digital City', '400');
INSERT INTO location VALUES ('L1011', 'Eco Park Event Grounds', '808 Green Ln, Eco Town', '1800');
INSERT INTO location VALUES ('L1012', 'Craft Brewery Field', '909 Beer Rd, Brew City', '3500');
INSERT INTO location VALUES ('L1013', 'Innovation Hub Auditorium', '1010 Innovation St, Startup City', '500');
INSERT INTO location VALUES ('L1014', 'Historic Fashion Market', '1111 Style Rd, Fashion City', '700');
INSERT INTO location VALUES ('L1015', 'Kids Science Museum', '1212 Discovery Dr, Science City', '900');

-- select * from location;

create table event (
	event_id char(5),
    organizer_id char(5),
    event_name varchar(200),
    event_type varchar(15),
    event_date varchar(10),
    event_time varchar(10),
    summary varchar(200),
    location_id char(5),
    PRIMARY KEY (event_id),
    FOREIGN KEY (location_id) REFERENCES location (location_id)
    
);

INSERT INTO event VALUES ('E1001', 'O1001', 'Global Tech Summit', 'Conference', '2024-05-20', '09:00', 'A gathering of the brightest minds in the technology industry to discuss future innovations.', 'L1001');
INSERT INTO event VALUES ('E1002', 'O1002', 'Mountain Marathon', 'Sports', '2024-08-15', '06:00', 'Annual marathon through mountainous terrain, attracting runners worldwide.', 'L1002');
INSERT INTO event VALUES ('E1003', 'O1003', 'Jazz Nights', 'Music', '2024-09-10', '20:00', 'An evening of live jazz music featuring renowned artists from around the globe.', 'L1003');
INSERT INTO event VALUES ('E1004', 'O1004', 'Literature Fest', 'Festival', '2024-10-05', '10:00', 'A festival celebrating contemporary literature, with author talks and book signings.', 'L1004');
INSERT INTO event VALUES ('E1005', 'O1005', 'Health & Wellness Expo', 'Exhibition', '2024-11-20', '09:00', 'Expo focusing on health, wellness, and nutrition, featuring workshops and product demos.', 'L1005');
INSERT INTO event VALUES ('E1006', 'O1006', 'Green Tech Symposium', 'Symposium', '2024-04-22', '09:00', 'Symposium on sustainable technologies and their impact on the environment.', 'L1006');
INSERT INTO event VALUES ('E1007', 'O1007', 'Indie Film Night', 'Cinema', '2024-07-30', '18:00', 'Showcasing the latest in independent cinema, followed by director Q&A sessions.', 'L1007');
INSERT INTO event VALUES ('E1008', 'O1008', 'Artisan Food Market', 'Market', '2024-06-25', '11:00', 'Market featuring locally produced artisan foods and beverages.', 'L1008');
INSERT INTO event VALUES ('E1009', 'O1009', 'Retro Gaming Convention', 'Convention', '2024-08-12', '10:00', 'Convention for fans of retro video games, with panels, exhibits, and trading.', 'L1009');
INSERT INTO event VALUES ('E1010', 'O1010', 'Digital Marketing Workshop', 'Workshop', '2024-03-15', '09:30', 'Interactive workshop on the latest trends and strategies in digital marketing.', 'L1010');
INSERT INTO event VALUES ('E1011', 'O1011', 'Eco Living Fair', 'Fair', '2024-09-05', '10:00', 'Fair promoting sustainable living practices, with eco-friendly products and workshops.', 'L1011');
INSERT INTO event VALUES ('E1012', 'O1012', 'Craft Beer Festival', 'Festival', '2024-10-10', '12:00', 'Festival celebrating craft beer, with tastings from top microbreweries.', 'L1012');
INSERT INTO event VALUES ('E1013', 'O1013', 'Start-Up Pitch Night', 'Networking', '2024-11-15', '19:00', 'An evening where start-ups pitch their ideas to potential investors.', 'L1013');
INSERT INTO event VALUES ('E1014', 'O1014', 'Vintage Fashion Bazaar', 'Bazaar', '2024-07-18', '10:00', 'Bazaar featuring vintage fashion items, accessories, and clothing swaps.', 'L1014');
INSERT INTO event VALUES ('E1015', 'O1015', 'Science for Kids', 'Educational', '2024-05-30', '09:00', 'Educational event aimed at sparking children’s interest in science through fun experiments.', 'L1015');

-- select * from event;

create table schedule (
	schedule_id varchar(5),
    event_id varchar(5),
    start_time varchar(7),
    end_time varchar(7),
    activity_description varchar(100),
	PRIMARY KEY (schedule_id),
    FOREIGN KEY (event_id) REFERENCES event (event_id)
);

INSERT INTO schedule VALUES ('S001', 'E1001', '09:00', '11:00', 'Opening Keynote: The Future of Tech');
INSERT INTO schedule VALUES ('S002', 'E1001', '11:15', '12:00', 'Panel Discussion: AI Innovations');
INSERT INTO schedule VALUES ('S003', 'E1002', '06:00', '12:00', 'Mountain Marathon: Race Start');
INSERT INTO schedule VALUES ('S004', 'E1003', '20:00', '23:00', 'Live Jazz Performance by The Night Owls');
INSERT INTO schedule VALUES ('S005', 'E1004', '10:00', '12:00', 'Author Meet & Greet: Modern Literature');
INSERT INTO schedule VALUES ('S006', 'E1005', '09:00', '10:00', 'Workshop: Healthy Living on a Budget');
INSERT INTO schedule VALUES ('S007', 'E1006', '09:00', '10:30', 'Green Innovations: Solar Energy Panel');
INSERT INTO schedule VALUES ('S008', 'E1007', '18:00', '20:00', 'Indie Film Showcase: "Dreams of Tomorrow"');
INSERT INTO schedule VALUES ('S009', 'E1008', '11:00', '14:00', 'Artisan Cheese Tasting');
INSERT INTO schedule VALUES ('S010', 'E1009', '10:00', '11:00', 'Retro Gaming Tournament: Classic Consoles');
INSERT INTO schedule VALUES ('S011', 'E1010', '09:30', '11:00', 'Digital Marketing 101: Strategies for Success');
INSERT INTO schedule VALUES ('S012', 'E1011', '10:00', '11:00', 'Eco-Friendly Home Products Demo');
INSERT INTO schedule VALUES ('S013', 'E1012', '12:00', '14:00', 'Craft Beer Sampling: Local Breweries');
INSERT INTO schedule VALUES ('S014', 'E1013', '19:00', '21:00', 'Start-Up Stories: From Idea to IPO');
INSERT INTO schedule VALUES ('S015', 'E1014', '10:00', '12:00', 'Vintage Fashion Parade');
    
-- select * from schedule;

create table EventRegistration (
	registration_id varchar(5),
    event_id varchar(5),
    participant_id varchar(5),
    registration_date varchar(10),
    status varchar(15),
    PRIMARY KEY (registration_id),
    FOREIGN KEY (event_id) REFERENCES event (event_id)
);

INSERT INTO EventRegistration VALUES ('R0001', 'E1001', 'P1001', '2024-05-01', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0002', 'E1001', 'P1002', '2024-05-02', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0003', 'E1002', 'P1003', '2024-07-10', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0004', 'E1002', 'P1004', '2024-07-11', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0005', 'E1003', 'P1005', '2024-08-20', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0006', 'E1003', 'P1006', '2024-08-21', 'Pending');
INSERT INTO EventRegistration VALUES ('R0007', 'E1004', 'P1007', '2024-09-15', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0008', 'E1004', 'P1008', '2024-09-16', 'Cancelled');
INSERT INTO EventRegistration VALUES ('R0009', 'E1005', 'P1009', '2024-10-25', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0010', 'E1005', 'P1010', '2024-10-26', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0011', 'E1006', 'P1011', '2024-03-30', 'Pending');
INSERT INTO EventRegistration VALUES ('R0012', 'E1007', 'P1012', '2024-07-01', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0013', 'E1008', 'P1013', '2024-06-05', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0014', 'E1009', 'P1014', '2024-07-29', 'Confirmed');
INSERT INTO EventRegistration VALUES ('R0015', 'E1010', 'P1015', '2024-02-20', 'Confirmed');

select * from EventRegistration;

