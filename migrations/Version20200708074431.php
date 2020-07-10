<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200708074431 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE learner ADD promotion_id INT NOT NULL');
        $this->addSql('ALTER TABLE learner ADD CONSTRAINT FK_8EF3834139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('CREATE INDEX IDX_8EF3834139DF194 ON learner (promotion_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE learner DROP FOREIGN KEY FK_8EF3834139DF194');
        $this->addSql('DROP INDEX IDX_8EF3834139DF194 ON learner');
        $this->addSql('ALTER TABLE learner DROP promotion_id');
    }
}
