INSERT INTO admin VALUES ('senior','senior');
INSERT INTO admin VALUES ('junior','junior');
INSERT INTO admin VALUES ('boss','boss');

INSERT INTO entrepreneur VALUES ('growup@growup.com', 'growup','growup');
INSERT INTO entrepreneur VALUES ('green@green.com', 'green','green');
INSERT INTO entrepreneur VALUES ('singout@singout.com', 'singout','singout');
INSERT INTO entrepreneur VALUES ('startup@startup.com', 'startup','startup');

INSERT INTO funder VALUES ('buwei@gmail.com', 'buwei','buwei');
INSERT INTO funder VALUES ('lyuan@gmail.com', 'lyuan','lyuan');
INSERT INTO funder VALUES ('zanzan@gmail.com', 'zanzan','zanzan');
INSERT INTO funder VALUES ('yuxin@gmail.com', 'yuxin','yuxin');
INSERT INTO funder VALUES ('dajieda@gmail.com', 'dajieda','dajieda');

INSERT INTO project VALUES ('primaryschool','estabilish a primary school','growup@growup.com','2015-11-23','2016-11-23','education','345000','0',true);
INSERT INTO project VALUES ('secondaryschool','estabilish a secondary school','growup@growup.com','2015-09-12','2016-09-23','education','900000','0',true);
INSERT INTO project VALUES ('kindergarten','estabilish a kindergarten','growup@growup.com','2014-01-12','2015-09-23','education','6800000','0',false);
INSERT INTO project VALUES ('plant','establish a public park','green@green.com','2016-02-23','2016-07-23','environment','567000','0',true);
INSERT INTO project VALUES ('sing','hold a singing competition','singout@singout.com','2016-03-03','2016-05-20','arts','560000','0',true);
INSERT INTO project VALUES ('computers','need sufficient hardwares to start up','startup@startup.com','2016-01-04','2017-04-20','technology','5789000','0',true);

INSERT INTO fund VALUES ('buwei@gmail.com','primaryschool','4500');
INSERT INTO fund VALUES ('buwei@gmail.com','computers','5700');
INSERT INTO fund VALUES ('lyuan@gmail.com','primaryschool','5000');
INSERT INTO fund VALUES ('lyuan@gmail.com','plant','6310');
INSERT INTO fund VALUES ('lyuan@gmail.com','computers','10000');
INSERT INTO fund VALUES ('zanzan@gmail.com','sing','5600');
INSERT INTO fund VALUES ('zanzan@gmail.com','computers','7000');
INSERT INTO fund VALUES ('yuxin@gmail.com','computers','3557');
INSERT INTO fund VALUES ('yuxin@gmail.com','computers','9000');
INSERT INTO fund VALUES ('yuxin@gmail.com','kindergarten','5000');
INSERT INTO fund VALUES ('yuxin@gmail.com','sing','3000');
INSERT INTO fund VALUES ('dajieda@gmail.com','computers','6700');
INSERT INTO fund VALUES ('dajieda@gmail.com','secondaryschool','5000');
INSERT INTO fund VALUES ('dajieda@gmail.com','primaryschool','10000');