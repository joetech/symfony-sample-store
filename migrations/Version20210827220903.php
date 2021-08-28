<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827220903 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE inventory (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, quantity INT NOT NULL, color LONGTEXT DEFAULT NULL, size LONGTEXT DEFAULT NULL, weight DOUBLE PRECISION DEFAULT NULL, price_cents INT NOT NULL, sale_price_cents INT NOT NULL, cost_cents INT NOT NULL, sku VARCHAR(255) NOT NULL, length DOUBLE PRECISION NOT NULL, width DOUBLE PRECISION NOT NULL, height DOUBLE PRECISION NOT NULL, note LONGTEXT DEFAULT NULL, INDEX UNIQ_B12D4A36DE18E50B (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `order` (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, inventory_id INT NOT NULL, street_address LONGTEXT, apartment LONGTEXT DEFAULT NULL, city LONGTEXT, state LONGTEXT, country_code VARCHAR(255), zip LONGTEXT, phone_number VARCHAR(255), email LONGTEXT, name VARCHAR(255), order_status VARCHAR(255), payment_ref LONGTEXT DEFAULT NULL, transaction_id VARCHAR(255), payment_amt_cents INT, ship_charged_cents INT, ship_cost_cents INT, subtotal_cents INT, total_cents INT, shipper_name LONGTEXT, payment_date DATETIME COMMENT \'(DC2Type:datetime_immutable)\', shipped_date DATETIME COMMENT \'(DC2Type:datetime_immutable)\', tracking_number LONGTEXT, tax_total_cents INT, created_at DATETIME COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE order_product (order_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_2530ADE68D9F6D38 (order_id), INDEX IDX_2530ADE64584665A (product_id), PRIMARY KEY(order_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, product_name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, style LONGTEXT NOT NULL, brand LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', url VARCHAR(255) NOT NULL, product_type VARCHAR(255) NOT NULL, shipping_price INT NOT NULL, note LONGTEXT DEFAULT NULL, admin_id INT NOT NULL, INDEX IDX_D34A04ADDF6E65AD (admin_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) NOT NULL, password_hash VARCHAR(255) NOT NULL, password_plain VARCHAR(255) NOT NULL, superadmin TINYINT(1) NOT NULL, shop_name VARCHAR(255) NOT NULL, remember_token VARCHAR(100) DEFAULT NULL, created_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', card_brand VARCHAR(255) NOT NULL, card_last_four VARCHAR(4) DEFAULT NULL, trial_ends_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', shop_domain VARCHAR(255) DEFAULT NULL, is_enabled TINYINT(1) NOT NULL, billing_plan VARCHAR(255) NOT NULL, trial_starts_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE inventory ADD CONSTRAINT FK_B12D4A36DE18E50B FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE68D9F6D38 FOREIGN KEY (order_id) REFERENCES `order` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE order_product ADD CONSTRAINT FK_2530ADE64584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04ADDF6E65AD FOREIGN KEY (admin_id) REFERENCES user (id)');
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
