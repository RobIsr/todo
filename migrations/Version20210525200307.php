<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525200307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__shopping_task AS SELECT id, user_id, title, ingredients FROM shopping_task');
        $this->addSql('DROP TABLE shopping_task');
        $this->addSql('CREATE TABLE shopping_task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL COLLATE BINARY, ingredients CLOB DEFAULT NULL --(DC2Type:array)
        )');
        $this->addSql('INSERT INTO shopping_task (id, user_id, title, ingredients) SELECT id, user_id, title, ingredients FROM __temp__shopping_task');
        $this->addSql('DROP TABLE __temp__shopping_task');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__shopping_task AS SELECT id, ingredients, user_id, title FROM shopping_task');
        $this->addSql('DROP TABLE shopping_task');
        $this->addSql('CREATE TABLE shopping_task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL, ingredients CLOB DEFAULT NULL COLLATE BINARY, store VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO shopping_task (id, ingredients, user_id, title) SELECT id, ingredients, user_id, title FROM __temp__shopping_task');
        $this->addSql('DROP TABLE __temp__shopping_task');
    }
}
