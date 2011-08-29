CREATE TABLE ip (
  id_ip int(32) NOT NULL auto_increment,
  ip text,
  putdate datetime default NULL,
  id_page int(10) default NULL,
  PRIMARY KEY  (id_ip)
) TYPE=MyISAM;
CREATE TABLE pages (
  id_page int(10) NOT NULL auto_increment,
  name text,
  id_site int(4) default NULL,
  PRIMARY KEY  (id_page)
) TYPE=MyISAM;
