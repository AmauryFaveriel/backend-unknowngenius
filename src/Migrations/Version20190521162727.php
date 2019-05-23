<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521162727 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Price DROP FOREIGN KEY FK_B090DDDC87F2DA9');
        $this->addSql('DROP TABLE Year');
        $this->addSql('DROP INDEX fk_Price_Year_idx ON Price');
        $this->addSql('ALTER TABLE Price ADD year INT NOT NULL, DROP idYear, CHANGE idCategory idCategory INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE deathdate deathdate DATE DEFAULT NULL, CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Year (idYear INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, UNIQUE INDEX year_UNIQUE (year), PRIMARY KEY(idYear)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE ContentVideo CHANGE idPeople idPeople INT DEFAULT NULL');
        $this->addSql('ALTER TABLE People CHANGE deathdate deathdate DATE DEFAULT \'NULL\', CHANGE idAffiliation idAffiliation INT DEFAULT NULL, CHANGE idCountry idCountry INT DEFAULT NULL, CHANGE idFamily idFamily INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Price ADD idYear INT DEFAULT NULL, DROP year, CHANGE idCategory idCategory INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Price ADD CONSTRAINT FK_B090DDDC87F2DA9 FOREIGN KEY (idYear) REFERENCES Year (idYear)');
        $this->addSql('CREATE INDEX fk_Price_Year_idx ON Price (idYear)');
    }
}
