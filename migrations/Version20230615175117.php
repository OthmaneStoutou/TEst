<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615175117 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabinet ADD cabinet_row_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet ADD CONSTRAINT FK_4CED05B0BAFB489 FOREIGN KEY (cabinet_row_id) REFERENCES cabinet_row (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4CED05B0BAFB489 ON cabinet (cabinet_row_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE cabinet DROP CONSTRAINT FK_4CED05B0BAFB489');
        $this->addSql('DROP INDEX IDX_4CED05B0BAFB489');
        $this->addSql('ALTER TABLE cabinet DROP cabinet_row_id');
    }
}
