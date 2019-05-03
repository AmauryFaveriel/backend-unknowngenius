<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190503083050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Price (idPrice INT AUTO_INCREMENT NOT NULL, idCategory INT DEFAULT NULL, idYear INT DEFAULT NULL, INDEX fk_Price_Category1_idx (idCategory), INDEX fk_Price_Year_idx (idYear), PRIMARY KEY(idPrice)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE price_has_people (idPrice INT NOT NULL, idPeople INT NOT NULL, INDEX IDX_B0BC72B9DD0C61C4 (idPrice), INDEX IDX_B0BC72B94B07C2BC (idPeople), PRIMARY KEY(idPrice, idPeople)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Category (idCategory INT AUTO_INCREMENT NOT NULL, category VARCHAR(45) NOT NULL, UNIQUE INDEX category_UNIQUE (category), PRIMARY KEY(idCategory)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ContentVideo (idcontentVideo INT AUTO_INCREMENT NOT NULL, link VARCHAR(100) NOT NULL, description VARCHAR(300) NOT NULL, idPeople INT DEFAULT NULL, INDEX fk_contentVideo_People1_idx (idPeople), PRIMARY KEY(idcontentVideo)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Country (idCountry INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(idCountry)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE People (idPeople INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, firstname VARCHAR(45) NOT NULL, birthday DATE NOT NULL, deathdate DATE DEFAULT NULL, birthcity VARCHAR(45) NOT NULL, biography VARCHAR(1000) NOT NULL, work VARCHAR(1000) NOT NULL, gender VARCHAR(1) NOT NULL, idAffiliation INT DEFAULT NULL, idCountry INT DEFAULT NULL, idFamily INT DEFAULT NULL, INDEX fk_People_Family1_idx (idFamily), INDEX fk_People_Country1_idx (idCountry), INDEX fk_People_Affiliation1_idx (idAffiliation), PRIMARY KEY(idPeople)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Year (idYear INT AUTO_INCREMENT NOT NULL, year DATE NOT NULL, UNIQUE INDEX year_UNIQUE (year), PRIMARY KEY(idYear)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Family (idFamily INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, PRIMARY KEY(idFamily)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE Affiliation (idAffiliation INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, address VARCHAR(45) NOT NULL, PRIMARY KEY(idAffiliation)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Price ADD CONSTRAINT FK_B090DDD55EF339A FOREIGN KEY (idCategory) REFERENCES Category (idCategory)');
        $this->addSql('ALTER TABLE Price ADD CONSTRAINT FK_B090DDDC87F2DA9 FOREIGN KEY (idYear) REFERENCES Year (idYear)');
        $this->addSql('ALTER TABLE price_has_people ADD CONSTRAINT FK_B0BC72B9DD0C61C4 FOREIGN KEY (idPrice) REFERENCES Price (idPrice)');
        $this->addSql('ALTER TABLE price_has_people ADD CONSTRAINT FK_B0BC72B94B07C2BC FOREIGN KEY (idPeople) REFERENCES People (idPeople)');
        $this->addSql('ALTER TABLE ContentVideo ADD CONSTRAINT FK_3570B30E4B07C2BC FOREIGN KEY (idPeople) REFERENCES People (idPeople)');
        $this->addSql('ALTER TABLE People ADD CONSTRAINT FK_2FBA6F10AA2FEA48 FOREIGN KEY (idAffiliation) REFERENCES Affiliation (idAffiliation)');
        $this->addSql('ALTER TABLE People ADD CONSTRAINT FK_2FBA6F1043CAA294 FOREIGN KEY (idCountry) REFERENCES Country (idCountry)');
        $this->addSql('ALTER TABLE People ADD CONSTRAINT FK_2FBA6F10C6F789C1 FOREIGN KEY (idFamily) REFERENCES Family (idFamily)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE price_has_people DROP FOREIGN KEY FK_B0BC72B9DD0C61C4');
        $this->addSql('ALTER TABLE Price DROP FOREIGN KEY FK_B090DDD55EF339A');
        $this->addSql('ALTER TABLE People DROP FOREIGN KEY FK_2FBA6F1043CAA294');
        $this->addSql('ALTER TABLE price_has_people DROP FOREIGN KEY FK_B0BC72B94B07C2BC');
        $this->addSql('ALTER TABLE ContentVideo DROP FOREIGN KEY FK_3570B30E4B07C2BC');
        $this->addSql('ALTER TABLE Price DROP FOREIGN KEY FK_B090DDDC87F2DA9');
        $this->addSql('ALTER TABLE People DROP FOREIGN KEY FK_2FBA6F10C6F789C1');
        $this->addSql('ALTER TABLE People DROP FOREIGN KEY FK_2FBA6F10AA2FEA48');
        $this->addSql('DROP TABLE Price');
        $this->addSql('DROP TABLE price_has_people');
        $this->addSql('DROP TABLE Category');
        $this->addSql('DROP TABLE ContentVideo');
        $this->addSql('DROP TABLE Country');
        $this->addSql('DROP TABLE People');
        $this->addSql('DROP TABLE Year');
        $this->addSql('DROP TABLE Family');
        $this->addSql('DROP TABLE Affiliation');
    }
}
