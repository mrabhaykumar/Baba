<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;


class Version20150707073457 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
         $this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql",
            "Migration can only be executed safely on 'mysql'.");
        $this->addSql(
            "CREATE TABLE bhakt (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(20) NOT NULL ,
            email VARCHAR(100) DEFAULT NULL,
            mobile VARCHAR(20) DEFAULT NULL,      
            PRIMARY KEY(id) )
            DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

        $this->addSql(
            "CREATE TABLE ashram (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(20) NOT NULL ,
            address VARCHAR(100) DEFAULT NULL,
            PRIMARY KEY(id) )
            DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

         $this->addSql(
            "CREATE TABLE baba (
            id INT AUTO_INCREMENT NOT NULL,
            name VARCHAR(20) NOT NULL ,
            email VARCHAR(100) DEFAULT NULL,
            mobile VARCHAR(20) DEFAULT NULL,
            gender varchar(6) DEFAULT NULL, 
            ashram_id INT DEFAULT NULL,
            PRIMARY KEY(id) ),
            ADD CONSTRAINT baba_ashram
                FOREIGN KEY (ashram_id) REFERENCES ashram (id)
            DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

         $this->addSql(
            "CREATE TABLE darshan (
            id INT AUTO_INCREMENT NOT NULL,
            bhakt_id VARCHAR(20) NOT NULL ,
            baba_id VARCHAR(100) DEFAULT NULL,
            start_time DATETIME(20) DEFAULT NULL,  
            end_time DATETIME(20) DEFAUTL NULL    
            PRIMARY KEY(id) ),
            ADD CONSTRAINT darshan_bhakt
                FOREIGN KEY (bhakt_id) REFERENCES bhakt (id),
            ADD CONSTRAINT darshan_baba
                FOREIGN KEY (baba_id) REFERENCES baba (id)
            DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB");

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        
        $this->addSql("DROP TABLE bhakt");
        $this->addSql("DROP TABLE ashram");
        $this->addSql("DROP TABLE BABA");
        $this->addSql("DROP TABLE darshan");
    }
}
