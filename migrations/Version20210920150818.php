<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210920150818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prestation (id INT AUTO_INCREMENT NOT NULL, les_prestations_id INT DEFAULT NULL, le_type_prestation_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_51C88FAD6D8FF11B (les_prestations_id), INDEX IDX_51C88FAD85CE7CAD (le_type_prestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_prestation (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visite (id INT AUTO_INCREMENT NOT NULL, lieu VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD6D8FF11B FOREIGN KEY (les_prestations_id) REFERENCES visite (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD85CE7CAD FOREIGN KEY (le_type_prestation_id) REFERENCES type_prestation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD85CE7CAD');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD6D8FF11B');
        $this->addSql('DROP TABLE prestation');
        $this->addSql('DROP TABLE type_prestation');
        $this->addSql('DROP TABLE visite');
    }
}
