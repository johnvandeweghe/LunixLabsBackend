create table version (version int(11) unsigned);
insert into version (version) VALUES (1);
CREATE TABLE projects (id int(11) unsigned AUTO_INCREMENT, name varchar(64), url varchar(128), short_description varchar(256), description text, PRIMARY KEY (id));
INSERT INTO projects (name, url, short_description, description) VALUES
    ("LunixREST", "https://github.com/johnvandeweghe/LunixREST", "A simple, extensible PHP REST framework", ""),
    ("Lunix Bot", "https://github.com/johnvandeweghe/LunixBot", "A RoboCode mega bot", ""),
    ("DuplexDots App", "https://github.com/johnvandeweghe/DuplexDotsApp", "An Ionic sample app", ""),
    ("DuplexDots Server", "https://github.com/johnvandeweghe/DuplexDotsServer", "A super simple server for the DuplexDotsApp", ""),
    ("ThreeJS Tests", "https://github.com/johnvandeweghe/ThreeJSTests", "Some tests with the ThreeJS library", ""),
    ("AES Seizure Prediction", "https://github.com/johnvandeweghe/AESSeizurePrediction", "An unofficial entry to a Kaggle Competition", ""),
    ("JohnNet", "https://github.com/johnvandeweghe/JohnNet", "A Publish/Subscribe (pubsub) service written using php's pthreads", ""),
    ("LunixLabs Front End", "https://github.com/johnvandeweghe/LunixLabsFront", "The front end code for this website", ""),
    ("LunixLabs Back End", "https://github.com/johnvandeweghe/LunixLabsBackend", "The back end code for this website", "");
