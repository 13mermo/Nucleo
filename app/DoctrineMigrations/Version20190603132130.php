<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190603132130 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE grupos_de_trabalho (id INT AUTO_INCREMENT NOT NULL, imagem_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, descricao LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_5A6C345164892549 (imagem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE imagem (id INT AUTO_INCREMENT NOT NULL, image_name VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE linhas_de_pesquisa (id INT AUTO_INCREMENT NOT NULL, tile VARCHAR(100) NOT NULL, descricao LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE noticia (id INT AUTO_INCREMENT NOT NULL, imagem_id INT DEFAULT NULL, title VARCHAR(100) NOT NULL, autor VARCHAR(50) NOT NULL, descricao LONGTEXT NOT NULL, UNIQUE INDEX UNIQ_31205F9664892549 (imagem_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sobre (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, descricao LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE grupos_de_trabalho ADD CONSTRAINT FK_5A6C345164892549 FOREIGN KEY (imagem_id) REFERENCES imagem (id)');
        $this->addSql('ALTER TABLE noticia ADD CONSTRAINT FK_31205F9664892549 FOREIGN KEY (imagem_id) REFERENCES imagem (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE grupos_de_trabalho DROP FOREIGN KEY FK_5A6C345164892549');
        $this->addSql('ALTER TABLE noticia DROP FOREIGN KEY FK_31205F9664892549');
        $this->addSql('DROP TABLE grupos_de_trabalho');
        $this->addSql('DROP TABLE imagem');
        $this->addSql('DROP TABLE linhas_de_pesquisa');
        $this->addSql('DROP TABLE noticia');
        $this->addSql('DROP TABLE sobre');
    }
}
