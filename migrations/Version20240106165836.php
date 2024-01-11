<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240106165836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge ADD round_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE challenge ADD CONSTRAINT FK_D7098951A6005CA0 FOREIGN KEY (round_id) REFERENCES round (id)');
        $this->addSql('CREATE INDEX IDX_D7098951A6005CA0 ON challenge (round_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE challenge DROP FOREIGN KEY FK_D7098951A6005CA0');
        $this->addSql('DROP INDEX IDX_D7098951A6005CA0 ON challenge');
        $this->addSql('ALTER TABLE challenge DROP round_id');
    }
}
