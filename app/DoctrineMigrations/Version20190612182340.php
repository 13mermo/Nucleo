<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190612182340 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE arquivo (id INT AUTO_INCREMENT NOT NULL, arquivo_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projetos (id INT AUTO_INCREMENT NOT NULL, imagem_id INT DEFAULT NULL, arquivo_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, autor VARCHAR(50) NOT NULL, descricao LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_ECCCCDCB64892549 (imagem_id), UNIQUE INDEX UNIQ_ECCCCDCB7E7C3263 (arquivo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projetos ADD CONSTRAINT FK_ECCCCDCB64892549 FOREIGN KEY (imagem_id) REFERENCES imagem (id)');
        $this->addSql('ALTER TABLE projetos ADD CONSTRAINT FK_ECCCCDCB7E7C3263 FOREIGN KEY (arquivo_id) REFERENCES arquivo (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE projetos DROP FOREIGN KEY FK_ECCCCDCB7E7C3263');
        $this->addSql('DROP TABLE arquivo');
        $this->addSql('DROP TABLE projetos');
    }
}
