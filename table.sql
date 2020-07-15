
ALTER TABLE accounts ADD gender varchar(50) DEFAULT '';
ALTER TABLE accounts ADD phone varchar(50) DEFAULT '';
ALTER TABLE accounts ADD country varchar(50) DEFAULT '';
ALTER TABLE accounts ADD sponsorId varchar(50) DEFAULT '';
ALTER TABLE accounts ADD sponsorNumber varchar(50) DEFAULT '';
ALTER TABLE accounts ADD address varchar(50) DEFAULT '';
ALTER TABLE accounts ADD shipping varchar(50) DEFAULT '';
ALTER TABLE accounts ADD firstname varchar(50) DEFAULT '';
ALTER TABLE accounts ADD lastname varchar(50) DEFAULT '';

entry_date datetime
ALTER TABLE accounts ADD entry_date datetime DEFAULT '';
ALTER TABLE accounts ADD modified_date datetime DEFAULT '';
ALTER TABLE accounts ADD entered_by int(11) DEFAULT '';
ALTER TABLE accounts ADD modified_by int(11) DEFAULT '';