DROP TABLE IF EXISTS articles;
CREATE TABLE articles
(
  id              smallint unsigned NOT NULL auto_increment,
  publicationDate date NOT NULL,                              // Article pulblish date 
  title           varchar(255) NOT NULL,                      // Article title
  summary         text NOT NULL,                              // Article summary 
  content         mediumtext NOT NULL,                        // Article content 

  PRIMARY KEY     (id)
);
