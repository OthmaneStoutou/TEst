<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230615174427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cabinet ADD datacenter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet ADD zone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet ADD maxkw INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet DROP data_center_id');
        $this->addSql('ALTER TABLE cabinet DROP max_kw');
        $this->addSql('ALTER TABLE cabinet DROP map_y2');
        $this->addSql('ALTER TABLE cabinet ALTER location TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE cabinet ALTER location_sortable TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE cabinet ALTER model DROP NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER keylock DROP NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER max_weight SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER map_y1 SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER u1_position SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet ADD CONSTRAINT FK_4CED05B0BD2C7FCB FOREIGN KEY (datacenter_id) REFERENCES data_center (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cabinet ADD CONSTRAINT FK_4CED05B09F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4CED05B0BD2C7FCB ON cabinet (datacenter_id)');
        $this->addSql('CREATE INDEX IDX_4CED05B09F2C3FAB ON cabinet (zone_id)');
        $this->addSql('ALTER TABLE cabinet_row ADD datacenter_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet_row ADD zone_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet_row ALTER name DROP NOT NULL');
        $this->addSql('ALTER TABLE cabinet_row ALTER name TYPE VARCHAR(100)');
        $this->addSql('ALTER TABLE cabinet_row ADD CONSTRAINT FK_4658E34ABD2C7FCB FOREIGN KEY (datacenter_id) REFERENCES data_center (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE cabinet_row ADD CONSTRAINT FK_4658E34A9F2C3FAB FOREIGN KEY (zone_id) REFERENCES zone (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4658E34ABD2C7FCB ON cabinet_row (datacenter_id)');
        $this->addSql('CREATE INDEX IDX_4658E34A9F2C3FAB ON cabinet_row (zone_id)');
        $this->addSql('ALTER TABLE container ALTER map_y DROP NOT NULL');
        $this->addSql('ALTER TABLE data_center ADD container_id INT NOT NULL');
        $this->addSql('ALTER TABLE data_center ALTER name TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE data_center ALTER delivery_address DROP NOT NULL');
        $this->addSql('ALTER TABLE data_center ADD CONSTRAINT FK_200EDA3DBC21F742 FOREIGN KEY (container_id) REFERENCES container (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_200EDA3DBC21F742 ON data_center (container_id)');
        $this->addSql('ALTER TABLE zone ADD datacenter_id INT NOT NULL');
        $this->addSql('ALTER TABLE zone ALTER description TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE zone ADD CONSTRAINT FK_A0EBC007BD2C7FCB FOREIGN KEY (datacenter_id) REFERENCES data_center (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A0EBC007BD2C7FCB ON zone (datacenter_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE data_center DROP CONSTRAINT FK_200EDA3DBC21F742');
        $this->addSql('DROP INDEX IDX_200EDA3DBC21F742');
        $this->addSql('ALTER TABLE data_center DROP container_id');
        $this->addSql('ALTER TABLE data_center ALTER name TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE data_center ALTER delivery_address SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet DROP CONSTRAINT FK_4CED05B0BD2C7FCB');
        $this->addSql('ALTER TABLE cabinet DROP CONSTRAINT FK_4CED05B09F2C3FAB');
        $this->addSql('DROP INDEX IDX_4CED05B0BD2C7FCB');
        $this->addSql('DROP INDEX IDX_4CED05B09F2C3FAB');
        $this->addSql('ALTER TABLE cabinet ADD data_center_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet ADD max_kw DOUBLE PRECISION DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet ADD map_y2 INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cabinet DROP datacenter_id');
        $this->addSql('ALTER TABLE cabinet DROP zone_id');
        $this->addSql('ALTER TABLE cabinet DROP maxkw');
        $this->addSql('ALTER TABLE cabinet ALTER location TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE cabinet ALTER location_sortable TYPE VARCHAR(20)');
        $this->addSql('ALTER TABLE cabinet ALTER model SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER keylock SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER max_weight DROP NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER map_y1 DROP NOT NULL');
        $this->addSql('ALTER TABLE cabinet ALTER u1_position DROP NOT NULL');
        $this->addSql('ALTER TABLE zone DROP CONSTRAINT FK_A0EBC007BD2C7FCB');
        $this->addSql('DROP INDEX IDX_A0EBC007BD2C7FCB');
        $this->addSql('ALTER TABLE zone DROP datacenter_id');
        $this->addSql('ALTER TABLE zone ALTER description TYPE VARCHAR(120)');
        $this->addSql('ALTER TABLE cabinet_row DROP CONSTRAINT FK_4658E34ABD2C7FCB');
        $this->addSql('ALTER TABLE cabinet_row DROP CONSTRAINT FK_4658E34A9F2C3FAB');
        $this->addSql('DROP INDEX IDX_4658E34ABD2C7FCB');
        $this->addSql('DROP INDEX IDX_4658E34A9F2C3FAB');
        $this->addSql('ALTER TABLE cabinet_row DROP datacenter_id');
        $this->addSql('ALTER TABLE cabinet_row DROP zone_id');
        $this->addSql('ALTER TABLE cabinet_row ALTER name SET NOT NULL');
        $this->addSql('ALTER TABLE cabinet_row ALTER name TYPE VARCHAR(120)');
        $this->addSql('ALTER TABLE container ALTER map_y SET NOT NULL');
    }
}
