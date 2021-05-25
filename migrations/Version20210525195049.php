<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210525195049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shopping_task ADD COLUMN store VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE shopping_task ADD COLUMN ingredients CLOB DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__shopping_task AS SELECT id, user_id, title FROM shopping_task');
        $this->addSql('DROP TABLE shopping_task');
        $this->addSql('CREATE TABLE shopping_task (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER NOT NULL, title VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO shopping_task (id, user_id, title) SELECT id, user_id, title FROM __temp__shopping_task');
        $this->addSql('DROP TABLE __temp__shopping_task');
    }
}
