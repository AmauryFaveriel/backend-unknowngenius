<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190524123241 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Price CHANGE idCategory idCategory INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE name name VARCHAR(100) DEFAULT NULL, CHANGE firstname firstname VARCHAR(100) DEFAULT NULL, CHANGE birthday birthday DATE DEFAULT NULL, CHANGE deathdate deathdate DATE DEFAULT NULL, CHANGE birthcity birthcity VARCHAR(45) DEFAULT NULL, CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Affiliation CHANGE address address VARCHAR(45) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Affiliation CHANGE address address VARCHAR(45) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE name name VARCHAR(45) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE firstname firstname VARCHAR(45) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE birthday birthday DATE DEFAULT \'NULL\', CHANGE deathdate deathdate DATE DEFAULT \'NULL\', CHANGE birthcity birthcity VARCHAR(45) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Price CHANGE idCategory idCategory INT DEFAULT NULL');
    }
}
