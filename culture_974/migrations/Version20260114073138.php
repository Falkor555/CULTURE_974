<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260114073138 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, couleur VARCHAR(50) NOT NULL, icone VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        //$this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(50) NOT NULL, description VARCHAR(500) NOT NULL, date DATETIME NOT NULL, lieu VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, category_id INT NOT NULL, INDEX IDX_3BAE0AA712469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        //$this->addSql('CREATE TABLE inscription (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, email VARCHAR(50) NOT NULL, telephone VARCHAR(50) NOT NULL, nombre_places INT NOT NULL, created_at DATETIME NOT NULL, event_id INT NOT NULL, INDEX IDX_5E90F6D671F7E88B (event_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        //$this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        //$this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        //$this->addSql('ALTER TABLE inscription ADD CONSTRAINT FK_5E90F6D671F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA712469DE2');
        $this->addSql('ALTER TABLE inscription DROP FOREIGN KEY FK_5E90F6D671F7E88B');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE inscription');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
