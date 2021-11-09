<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211020155519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE debut_partie (id INT AUTO_INCREMENT NOT NULL, go_start TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE flag (id INT AUTO_INCREMENT NOT NULL, titre_question VARCHAR(255) NOT NULL, text_quote VARCHAR(255) NOT NULL, points INT NOT NULL, text_reponse VARCHAR(255) NOT NULL, n_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, lequipe_id INT DEFAULT NULL, leflag_id INT DEFAULT NULL, nb_tentative INT NOT NULL, heure_debut DATETIME NOT NULL, heure_fin DATETIME NOT NULL, reussie TINYINT(1) NOT NULL, nb_indices INT NOT NULL, INDEX IDX_5FB6DEC7A3DE83AF (lequipe_id), INDEX IDX_5FB6DEC7C8A6F35A (leflag_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, lequipe_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, nom VARCHAR(180) NOT NULL, prenom VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), UNIQUE INDEX UNIQ_8D93D6496C6E55B5 (nom), UNIQUE INDEX UNIQ_8D93D649A625945B (prenom), INDEX IDX_8D93D649A3DE83AF (lequipe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A3DE83AF FOREIGN KEY (lequipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7C8A6F35A FOREIGN KEY (leflag_id) REFERENCES flag (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649A3DE83AF FOREIGN KEY (lequipe_id) REFERENCES equipe (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A3DE83AF');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649A3DE83AF');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7C8A6F35A');
        $this->addSql('DROP TABLE debut_partie');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE flag');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE user');
    }
}
