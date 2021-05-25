<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525201530 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plain_task ADD COLUMN type VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE shopping_task ADD COLUMN type VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__plain_task AS SELECT id, message, user_id, title FROM plain_task');
        $this->addSql('DROP TABLE plain_task');
        $this->addSql('CREATE TABLE plain_task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, message VARCHAR(1000) NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO plain_task (id, message, user_id, title) SELECT id, message, user_id, title FROM __temp__plain_task');
        $this->addSql('DROP TABLE __temp__plain_task');
        $this->addSql('CREATE TEMPORARY TABLE __temp__shopping_task AS SELECT id, products, user_id, title FROM shopping_task');
        $this->addSql('DROP TABLE shopping_task');
        $this->addSql('CREATE TABLE shopping_task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, products CLOB DEFAULT NULL --(DC2Type:array)
        , user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO shopping_task (id, products, user_id, title) SELECT id, products, user_id, title FROM __temp__shopping_task');
        $this->addSql('DROP TABLE __temp__shopping_task');
    }
}
