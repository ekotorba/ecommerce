<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220125134218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product ADD color_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_product ADD CONSTRAINT FK_677B9B747ADA1FB5 FOREIGN KEY (color_id) REFERENCES product_color (id)');
        $this->addSql('CREATE INDEX IDX_677B9B747ADA1FB5 ON sylius_product (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product DROP FOREIGN KEY FK_677B9B747ADA1FB5');
        $this->addSql('DROP INDEX IDX_677B9B747ADA1FB5 ON sylius_product');
        $this->addSql('ALTER TABLE sylius_product DROP color_id');
    }
}
