<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211018132116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe CHANGE equipecomplete equipe_complete TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE flag ADD n_id INT NOT NULL');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7609ED939');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC76398E246');
        $this->addSql('DROP INDEX IDX_5FB6DEC76398E246 ON reponse');
        $this->addSql('DROP INDEX IDX_5FB6DEC7609ED939 ON reponse');
        $this->addSql('ALTER TABLE reponse ADD lequipe_id INT DEFAULT NULL, ADD le_flag_id INT DEFAULT NULL, ADD heure_fin DATETIME NOT NULL, ADD nb_indices INT NOT NULL, DROP lasreponse_id, DROP lesreponse_id, DROP heure_reponse, CHANGE nb_tentative nb_tentative INT NOT NULL, CHANGE heure_debut heure_debut DATETIME NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7A3DE83AF FOREIGN KEY (lequipe_id) REFERENCES equipe (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7BE509292 FOREIGN KEY (le_flag_id) REFERENCES flag (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7A3DE83AF ON reponse (lequipe_id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7BE509292 ON reponse (le_flag_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe CHANGE equipe_complete equipecomplete TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE flag DROP n_id');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7A3DE83AF');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7BE509292');
        $this->addSql('DROP INDEX IDX_5FB6DEC7A3DE83AF ON reponse');
        $this->addSql('DROP INDEX IDX_5FB6DEC7BE509292 ON reponse');
        $this->addSql('ALTER TABLE reponse ADD lasreponse_id INT DEFAULT NULL, ADD lesreponse_id INT DEFAULT NULL, ADD heure_reponse TIME NOT NULL, DROP lequipe_id, DROP le_flag_id, DROP heure_fin, DROP nb_indices, CHANGE nb_tentative nb_tentative INT DEFAULT NULL, CHANGE heure_debut heure_debut TIME NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7609ED939 FOREIGN KEY (lesreponse_id) REFERENCES flag (id)');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC76398E246 FOREIGN KEY (lasreponse_id) REFERENCES equipe (id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC76398E246 ON reponse (lasreponse_id)');
        $this->addSql('CREATE INDEX IDX_5FB6DEC7609ED939 ON reponse (lesreponse_id)');
        $this->addSql('ALTER TABLE user CHANGE roles roles JSON NOT NULL');
    }
}
