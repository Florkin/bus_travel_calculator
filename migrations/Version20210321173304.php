<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210321173304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city_group (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE city_group_city (city_group_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_6978E9B37B8CA121 (city_group_id), INDEX IDX_6978E9B38BAC62AF (city_id), PRIMARY KEY(city_group_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_order (id INT AUTO_INCREMENT NOT NULL, city_group_id INT NOT NULL, city_id INT NOT NULL, order_value INT DEFAULT NULL, INDEX IDX_A505B8FF7B8CA121 (city_group_id), INDEX IDX_A505B8FF8BAC62AF (city_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path (id INT AUTO_INCREMENT NOT NULL, departure_id INT NOT NULL, arrival_id INT NOT NULL, INDEX IDX_B548B0F7704ED06 (departure_id), INDEX IDX_B548B0F62789708 (arrival_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE path_city (path_id INT NOT NULL, city_id INT NOT NULL, INDEX IDX_40378B63D96C566B (path_id), INDEX IDX_40378B638BAC62AF (city_id), PRIMARY KEY(path_id, city_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE city_group_city ADD CONSTRAINT FK_6978E9B37B8CA121 FOREIGN KEY (city_group_id) REFERENCES city_group (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE city_group_city ADD CONSTRAINT FK_6978E9B38BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE group_order ADD CONSTRAINT FK_A505B8FF7B8CA121 FOREIGN KEY (city_group_id) REFERENCES city_group (id)');
        $this->addSql('ALTER TABLE group_order ADD CONSTRAINT FK_A505B8FF8BAC62AF FOREIGN KEY (city_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0F7704ED06 FOREIGN KEY (departure_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE path ADD CONSTRAINT FK_B548B0F62789708 FOREIGN KEY (arrival_id) REFERENCES city (id)');
        $this->addSql('ALTER TABLE path_city ADD CONSTRAINT FK_40378B63D96C566B FOREIGN KEY (path_id) REFERENCES path (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE path_city ADD CONSTRAINT FK_40378B638BAC62AF FOREIGN KEY (city_id) REFERENCES city (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE city_group_city DROP FOREIGN KEY FK_6978E9B38BAC62AF');
        $this->addSql('ALTER TABLE group_order DROP FOREIGN KEY FK_A505B8FF8BAC62AF');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0F7704ED06');
        $this->addSql('ALTER TABLE path DROP FOREIGN KEY FK_B548B0F62789708');
        $this->addSql('ALTER TABLE path_city DROP FOREIGN KEY FK_40378B638BAC62AF');
        $this->addSql('ALTER TABLE city_group_city DROP FOREIGN KEY FK_6978E9B37B8CA121');
        $this->addSql('ALTER TABLE group_order DROP FOREIGN KEY FK_A505B8FF7B8CA121');
        $this->addSql('ALTER TABLE path_city DROP FOREIGN KEY FK_40378B63D96C566B');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE city');
        $this->addSql('DROP TABLE city_group');
        $this->addSql('DROP TABLE city_group_city');
        $this->addSql('DROP TABLE group_order');
        $this->addSql('DROP TABLE path');
        $this->addSql('DROP TABLE path_city');
    }
}
