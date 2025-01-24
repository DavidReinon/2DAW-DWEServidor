<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250117123825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE alumno (id INT AUTO_INCREMENT NOT NULL, modulo_id INT DEFAULT NULL, alumno VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, edad INT DEFAULT NULL, INDEX IDX_1435D52DC07F55F5 (modulo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modulo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, creditos VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE producto (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, precio DOUBLE PRECISION NOT NULL, stock INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE alumno ADD CONSTRAINT FK_1435D52DC07F55F5 FOREIGN KEY (modulo_id) REFERENCES modulo (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE alumno DROP FOREIGN KEY FK_1435D52DC07F55F5');
        $this->addSql('DROP TABLE alumno');
        $this->addSql('DROP TABLE modulo');
        $this->addSql('DROP TABLE producto');
    }
}
