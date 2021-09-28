<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210921092723 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, laville_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, kms INT NOT NULL, INDEX IDX_C7440455A154C630 (laville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE departement (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, ledepartement_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, INDEX IDX_43C3D9C31E2377AB (ledepartement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455A154C630 FOREIGN KEY (laville_id) REFERENCES ville (id)');
        $this->addSql('ALTER TABLE ville ADD CONSTRAINT FK_43C3D9C31E2377AB FOREIGN KEY (ledepartement_id) REFERENCES departement (id)');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD6D8FF11B');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FAD85CE7CAD');
        $this->addSql('DROP INDEX IDX_51C88FAD85CE7CAD ON prestation');
        $this->addSql('DROP INDEX IDX_51C88FAD6D8FF11B ON prestation');
        $this->addSql('ALTER TABLE prestation ADD la_visite_id INT DEFAULT NULL, DROP les_prestations_id, DROP le_type_prestation_id');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FADA804BB2C FOREIGN KEY (la_visite_id) REFERENCES visite (id)');
        $this->addSql('CREATE INDEX IDX_51C88FADA804BB2C ON prestation (la_visite_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ville DROP FOREIGN KEY FK_43C3D9C31E2377AB');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455A154C630');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE departement');
        $this->addSql('DROP TABLE ville');
        $this->addSql('ALTER TABLE prestation DROP FOREIGN KEY FK_51C88FADA804BB2C');
        $this->addSql('DROP INDEX IDX_51C88FADA804BB2C ON prestation');
        $this->addSql('ALTER TABLE prestation ADD le_type_prestation_id INT DEFAULT NULL, CHANGE la_visite_id les_prestations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD6D8FF11B FOREIGN KEY (les_prestations_id) REFERENCES visite (id)');
        $this->addSql('ALTER TABLE prestation ADD CONSTRAINT FK_51C88FAD85CE7CAD FOREIGN KEY (le_type_prestation_id) REFERENCES type_prestation (id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD85CE7CAD ON prestation (le_type_prestation_id)');
        $this->addSql('CREATE INDEX IDX_51C88FAD6D8FF11B ON prestation (les_prestations_id)');
    }
}
