<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210828024436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inventory (id INT AUTO_INCREMENT NOT NULL, product_id_id INT NOT NULL, quantity INT DEFAULT NULL, color LONGTEXT DEFAULT NULL, size LONGTEXT DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, price_cents INT DEFAULT NULL, sale_price_cents INT DEFAULT NULL, cost_cents INT DEFAULT NULL, sku VARCHAR(255) DEFAULT NULL, length DOUBLE PRECISION DEFAULT NULL, width DOUBLE PRECISION DEFAULT NULL, height DOUBLE PRECISION DEFAULT NULL, note LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_B12D4A36DE18E50B (product_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, street_address LONGTEXT DEFAULT NULL, apartment LONGTEXT DEFAULT NULL, city LONGTEXT DEFAULT NULL, state LONGTEXT DEFAULT NULL, country_code VARCHAR(255) DEFAULT NULL, zip LONGTEXT DEFAULT NULL, phone_number VARCHAR(255) DEFAULT NULL, email LONGTEXT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, order_status VARCHAR(255) DEFAULT NULL, payment_ref LONGTEXT DEFAULT NULL, transaction_id VARCHAR(255) DEFAULT NULL, payment_amt_cents INT DEFAULT NULL, ship_charged_cents INT DEFAULT NULL, ship_cost_cents INT DEFAULT NULL, subtotal_cents INT DEFAULT NULL, total_cents INT DEFAULT NULL, shipper_name LONGTEXT DEFAULT NULL, payment_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', shipped_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', tracking_number LONGTEXT DEFAULT NULL, tax_total_cents INT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_product (order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_2530ADE68D9F6D38 (order_id), INDEX IDX_2530ADE64584665A (product_id), PRIMARY KEY(order_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, admin_id_id INT NOT NULL, product_name VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, style LONGTEXT DEFAULT NULL, brand LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', url VARCHAR(255) DEFAULT NULL, product_type VARCHAR(255) DEFAULT NULL, shipping_price INT DEFAULT NULL, note LONGTEXT DEFAULT NULL, INDEX IDX_D34A04ADDF6E65AD (admin_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, shop_name VARCHAR(255) DEFAULT NULL, remember_token VARCHAR(100) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', card_brand VARCHAR(255) DEFAULT NULL, card_last_four VARCHAR(4) DEFAULT NULL, trial_ends_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', shop_domain VARCHAR(255) DEFAULT NULL, is_enabled TINYINT(1) DEFAULT NULL, billing_plan VARCHAR(255) DEFAULT NULL, trial_starts_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE68D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDF6E65AD FOREIGN KEY (admin_id_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE68D9F6D38');
        $this->addSql('ALTER TABLE inventory DROP FOREIGN KEY FK_B12D4A36DE18E50B');
        $this->addSql('ALTER TABLE order_product DROP FOREIGN KEY FK_2530ADE64584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04ADDF6E65AD');
        $this->addSql('DROP TABLE inventory');
        $this->addSql('DROP TABLE `order`');
        $this->addSql('DROP TABLE order_product');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE user');
    }
}
