<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628001419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '0002. Base entity';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE answers (id UUID NOT NULL, question_id UUID NOT NULL, text VARCHAR(255) NOT NULL, is_correct BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_50D0C6061E27F6BF ON answers (question_id)');
        $this->addSql('CREATE TABLE questions (id UUID NOT NULL, text VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sessions (id UUID NOT NULL, test_id UUID NOT NULL, result JSON DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9A609D131E5D0459 ON sessions (test_id)');
        $this->addSql('CREATE TABLE tests (id UUID NOT NULL, title VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE test_questions (test_id UUID NOT NULL, question_id UUID NOT NULL, PRIMARY KEY(test_id, question_id))');
        $this->addSql('CREATE INDEX IDX_841C31F1E5D0459 ON test_questions (test_id)');
        $this->addSql('CREATE INDEX IDX_841C31F1E27F6BF ON test_questions (question_id)');
        $this->addSql('ALTER TABLE answers ADD CONSTRAINT FK_50D0C6061E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sessions ADD CONSTRAINT FK_9A609D131E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test_questions ADD CONSTRAINT FK_841C31F1E5D0459 FOREIGN KEY (test_id) REFERENCES tests (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE test_questions ADD CONSTRAINT FK_841C31F1E27F6BF FOREIGN KEY (question_id) REFERENCES questions (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE answers DROP CONSTRAINT FK_50D0C6061E27F6BF');
        $this->addSql('ALTER TABLE sessions DROP CONSTRAINT FK_9A609D131E5D0459');
        $this->addSql('ALTER TABLE test_questions DROP CONSTRAINT FK_841C31F1E5D0459');
        $this->addSql('ALTER TABLE test_questions DROP CONSTRAINT FK_841C31F1E27F6BF');
        $this->addSql('DROP TABLE answers');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE sessions');
        $this->addSql('DROP TABLE tests');
        $this->addSql('DROP TABLE test_questions');
    }
}
