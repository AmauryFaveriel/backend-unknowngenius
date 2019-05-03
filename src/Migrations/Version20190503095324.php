<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190503095324 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Price CHANGE idCategory idCategory INT DEFAULT NULL, CHANGE idYear idYear INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE deathdate deathdate DATE DEFAULT NULL, CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Year CHANGE year year INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE deathdate deathdate DATE DEFAULT \'NULL\', CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Price CHANGE idCategory idCategory INT DEFAULT NULL, CHANGE idYear idYear INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Year CHANGE year year DATE NOT NULL');
    }
}
