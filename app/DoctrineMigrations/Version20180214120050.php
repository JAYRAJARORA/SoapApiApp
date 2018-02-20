<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180214120050 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE atom (id INT AUTO_INCREMENT NOT NULL, atomicNumber INT NOT NULL, elementName VARCHAR(40) NOT NULL, symbol VARCHAR(10) NOT NULL, atomicWeight NUMERIC(8, 2) NOT NULL, atomicRadius NUMERIC(8, 2) DEFAULT NULL, meltingPoint NUMERIC(5, 2) DEFAULT NULL, boilingPoint NUMERIC(5, 2) DEFAULT NULL, density INT DEFAULT NULL, UNIQUE INDEX UNIQ_2040E57B5E1DA85E (atomicNumber), UNIQUE INDEX UNIQ_2040E57BE4B25BAA (elementName), UNIQUE INDEX UNIQ_2040E57BECC836F9 (symbol), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE atom');
    }
}
