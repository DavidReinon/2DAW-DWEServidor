<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218001530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cirujano (id INT AUTO_INCREMENT NOT NULL, enfermo_id INT DEFAULT NULL, nombre VARCHAR(255) DEFAULT NULL, apellidos VARCHAR(255) DEFAULT NULL, especialidad VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_694D3EE252E2D34B (enfermo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cirujano_quirofano (cirujano_id INT NOT NULL, quirofano_id INT NOT NULL, INDEX IDX_E322939F858FE7C7 (cirujano_id), INDEX IDX_E322939F46AA14C0 (quirofano_id), PRIMARY KEY(cirujano_id, quirofano_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coche (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, marca VARCHAR(255) NOT NULL, fecha_creacion DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfermo (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) DEFAULT NULL, apellidos VARCHAR(255) DEFAULT NULL, enfermedad VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE quirofano (id INT AUTO_INCREMENT NOT NULL, codigo_quirofano VARCHAR(10) DEFAULT NULL, estado TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cirujano ADD CONSTRAINT FK_694D3EE252E2D34B FOREIGN KEY (enfermo_id) REFERENCES enfermo (id)');
        $this->addSql('ALTER TABLE cirujano_quirofano ADD CONSTRAINT FK_E322939F858FE7C7 FOREIGN KEY (cirujano_id) REFERENCES cirujano (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE cirujano_quirofano ADD CONSTRAINT FK_E322939F46AA14C0 FOREIGN KEY (quirofano_id) REFERENCES quirofano (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cirujano DROP FOREIGN KEY FK_694D3EE252E2D34B');
        $this->addSql('ALTER TABLE cirujano_quirofano DROP FOREIGN KEY FK_E322939F858FE7C7');
        $this->addSql('ALTER TABLE cirujano_quirofano DROP FOREIGN KEY FK_E322939F46AA14C0');
        $this->addSql('DROP TABLE cirujano');
        $this->addSql('DROP TABLE cirujano_quirofano');
        $this->addSql('DROP TABLE coche');
        $this->addSql('DROP TABLE enfermo');
        $this->addSql('DROP TABLE quirofano');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
