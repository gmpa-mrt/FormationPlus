<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220903100818 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE attestation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE convention_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE etudiant_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE attestation (id INT NOT NULL, etudiant_id INT NOT NULL, convention_id INT NOT NULL, message TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_326EC63FDDEAB1A3 ON attestation (etudiant_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_326EC63FA2ACEBCC ON attestation (convention_id)');
        $this->addSql('CREATE TABLE convention (id INT NOT NULL, nom VARCHAR(100) NOT NULL, nb_heur INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE etudiant (id INT NOT NULL, convention_id INT DEFAULT NULL, nom VARCHAR(45) NOT NULL, prenom VARCHAR(45) NOT NULL, mail VARCHAR(125) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_717E22E3A2ACEBCC ON etudiant (convention_id)');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT FK_326EC63FDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE attestation ADD CONSTRAINT FK_326EC63FA2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE etudiant ADD CONSTRAINT FK_717E22E3A2ACEBCC FOREIGN KEY (convention_id) REFERENCES convention (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE attestation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE convention_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE etudiant_id_seq CASCADE');
        $this->addSql('ALTER TABLE attestation DROP CONSTRAINT FK_326EC63FDDEAB1A3');
        $this->addSql('ALTER TABLE attestation DROP CONSTRAINT FK_326EC63FA2ACEBCC');
        $this->addSql('ALTER TABLE etudiant DROP CONSTRAINT FK_717E22E3A2ACEBCC');
        $this->addSql('DROP TABLE attestation');
        $this->addSql('DROP TABLE convention');
        $this->addSql('DROP TABLE etudiant');
    }
}
