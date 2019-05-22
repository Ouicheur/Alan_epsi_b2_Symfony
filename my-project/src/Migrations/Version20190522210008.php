<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190522210008 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE soin (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, effect INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dresseur (id INT AUTO_INCREMENT NOT NULL, pokemon_team_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_77EA2FC6E7927C74 (email), INDEX IDX_77EA2FC64506A43F (pokemon_team_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pokemon_team (id INT AUTO_INCREMENT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, is_active TINYINT(1) NOT NULL, surnom_pokemon VARCHAR(255) NOT NULL, pokemon_hp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dresseur ADD CONSTRAINT FK_77EA2FC64506A43F FOREIGN KEY (pokemon_team_id) REFERENCES pokemon_team (id)');
        $this->addSql('ALTER TABLE pokemon ADD pokemon_team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pokemon ADD CONSTRAINT FK_62DC90F34506A43F FOREIGN KEY (pokemon_team_id) REFERENCES pokemon_team (id)');
        $this->addSql('CREATE INDEX IDX_62DC90F34506A43F ON pokemon (pokemon_team_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE pokemon DROP FOREIGN KEY FK_62DC90F34506A43F');
        $this->addSql('ALTER TABLE dresseur DROP FOREIGN KEY FK_77EA2FC64506A43F');
        $this->addSql('DROP TABLE soin');
        $this->addSql('DROP TABLE dresseur');
        $this->addSql('DROP TABLE pokemon_team');
        $this->addSql('DROP INDEX IDX_62DC90F34506A43F ON pokemon');
        $this->addSql('ALTER TABLE pokemon DROP pokemon_team_id');
    }
}
