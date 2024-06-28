<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628025708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '0003. Add default test';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO questions (id, text, created_at, updated_at) VALUES 
            ('7d1099c6-444b-437a-bc57-cdf81ce36982', '1 + 1 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36981', '2 + 2 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36980', '3 + 3 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36983', '4 + 4 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36984', '5 + 5 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36985', '6 + 6 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36986', '7 + 7 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36987', '8 + 8 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36988', '9 + 9 =', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce32988', 'Нравится ли вам тест?', NOW(), NOW()),
            ('7d1099c6-444b-437a-bc57-cdf81ce36989', '10 + 10 =', NOW(), NOW())");

        $this->addSql("INSERT INTO answers (id, text, question_id, is_correct, created_at, updated_at) VALUES 
            ('1bf4e6e2-5c2a-4a93-a5f3-b4ef5e6e5aef', '3', '7d1099c6-444b-437a-bc57-cdf81ce36982', false, NOW(), NOW()),
            ('634b8ce4-2fc7-492f-aa6e-8b75d6b4a4d7', '2', '7d1099c6-444b-437a-bc57-cdf81ce36982', true, NOW(), NOW()),
            ('28e6b5d6-82d4-4414-b432-3043a25ce23a', '0', '7d1099c6-444b-437a-bc57-cdf81ce36982', false, NOW(), NOW()),
            ('c2d1c5f3-9ec4-4b2a-8312-4a99b9a7fa42', '4', '7d1099c6-444b-437a-bc57-cdf81ce36981', true, NOW(), NOW()),
            ('f9016f7a-1c1f-4ef5-9b2c-b795e1d28299', '3 + 1', '7d1099c6-444b-437a-bc57-cdf81ce36981', true, NOW(), NOW()),
            ('cfbdc36b-6642-4f63-a728-6a0db70f6f09', '10', '7d1099c6-444b-437a-bc57-cdf81ce36981', false, NOW(), NOW()),
            ('3e315156-bc01-41f2-89f0-9782d9b5ff5f', '1 + 5', '7d1099c6-444b-437a-bc57-cdf81ce36980', true, NOW(), NOW()),
            ('a372e2e3-3f03-41fb-8f42-16e2c139b33f', '1', '7d1099c6-444b-437a-bc57-cdf81ce36980', false, NOW(), NOW()),
            ('a80c6f5f-1a7b-4a06-9855-c6e315b8964a', '6', '7d1099c6-444b-437a-bc57-cdf81ce36980', true, NOW(), NOW()),
            ('2e91e9d0-5e25-4b6f-9094-8ec3bb07a5b5', '2 + 4', '7d1099c6-444b-437a-bc57-cdf81ce36980', true, NOW(), NOW()),
            ('f1957aa5-91b6-4bb0-a268-1a8ed991f36d', '8', '7d1099c6-444b-437a-bc57-cdf81ce36983', true, NOW(), NOW()),
            ('f8c378b3-2b6f-44d7-8cda-ba1b06c5f03f', '4', '7d1099c6-444b-437a-bc57-cdf81ce36983', false, NOW(), NOW()),
            ('ea48bb6d-9e8c-4782-88f5-8e5a0a6e8574', '0', '7d1099c6-444b-437a-bc57-cdf81ce36983', false, NOW(), NOW()),
            ('23b75988-101e-4e08-91b1-734d1a6d7601', '20', '7d1099c6-444b-437a-bc57-cdf81ce36983', true, NOW(), NOW()),
            ('6b1f1390-1e2a-4346-8040-5d62a35ff0c0', '10', '7d1099c6-444b-437a-bc57-cdf81ce36984', false, NOW(), NOW()),
            ('db040731-688f-4348-afae-5c7020eef1b7', '18', '7d1099c6-444b-437a-bc57-cdf81ce36984', false, NOW(), NOW()),
            ('4b6f60a2-0e4b-4e3a-b34f-9f61178d0c2e', '9', '7d1099c6-444b-437a-bc57-cdf81ce36984', false, NOW(), NOW()),
            ('1253ab7f-28cf-4e59-a7aa-d9e9a4b06cfa', '12', '7d1099c6-444b-437a-bc57-cdf81ce36985', true, NOW(), NOW()),
            ('ad20f4a1-2b09-4b26-8966-697f4b8d12f0', '5 + 7', '7d1099c6-444b-437a-bc57-cdf81ce36985', true, NOW(), NOW()),
            ('aaad78a2-8e11-4f6f-88b6-173e02a0be50', '3', '7d1099c6-444b-437a-bc57-cdf81ce36985', false, NOW(), NOW()),
            ('dc8a42bb-6f7c-4ce5-80f5-5061a53fca0c', '9', '7d1099c6-444b-437a-bc57-cdf81ce36986', false, NOW(), NOW()),
            ('2f229eab-292c-4210-b21c-b2a1e2bf10f8', '14', '7d1099c6-444b-437a-bc57-cdf81ce36986', true, NOW(), NOW()),
            ('6d3e9bea-911b-4e30-974f-6e8a2ed02d3b', '16', '7d1099c6-444b-437a-bc57-cdf81ce36987', true, NOW(), NOW()),
            ('3165f77c-3465-45b5-85d7-10d3315e4c60', '12', '7d1099c6-444b-437a-bc57-cdf81ce36987', false, NOW(), NOW()),
            ('6c4f25b3-43b2-48f2-b2ff-aa70e1f53c34', '9', '7d1099c6-444b-437a-bc57-cdf81ce36987', false, NOW(), NOW()),
            ('f96e34de-56c6-4c54-916b-1e65a9b8ee8f', '18', '7d1099c6-444b-437a-bc57-cdf81ce36988', true, NOW(), NOW()),
            ('e214943f-9371-41c0-973e-df5d17a7e32e', '9', '7d1099c6-444b-437a-bc57-cdf81ce36988', false, NOW(), NOW()),
            ('5e8e2a61-8b88-40d1-8a92-531d2a20c7ac', '17 + 1', '7d1099c6-444b-437a-bc57-cdf81ce36988', true, NOW(), NOW()),
            ('c21b9cf2-72f4-4f4e-9e3d-ea1453e89976', '2 + 16', '7d1099c6-444b-437a-bc57-cdf81ce36988', true, NOW(), NOW()),
            ('c4e1a285-0b7d-456f-a39a-8a2c4428226e', '0', '7d1099c6-444b-437a-bc57-cdf81ce36989', false, NOW(), NOW()),
            ('9c15a79a-22c6-46f1-b413-839761a8fdd5', '2', '7d1099c6-444b-437a-bc57-cdf81ce36989', true, NOW(), NOW()),
            ('9c15a79a-22c6-46f1-b123-839761a8fdd5', 'Да', '7d1099c6-444b-437a-bc57-cdf81ce32988', true, NOW(), NOW()),
            ('9c15a79a-22c6-46f1-b124-839761a8fdd5', 'Конечно', '7d1099c6-444b-437a-bc57-cdf81ce32988', true, NOW(), NOW()),
            ('9c15a79a-22c6-46f1-b125-839761a8fdd5', 'Ещё бы!', '7d1099c6-444b-437a-bc57-cdf81ce32988', true, NOW(), NOW()),
            ('a0a8e1ae-9f8d-4e9a-a6d7-d8b3c9b362f0', '8', '7d1099c6-444b-437a-bc57-cdf81ce36989', false, NOW(), NOW()),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '20', '7d1099c6-444b-437a-bc57-cdf81ce36989', true, NOW(), NOW())");

        $this->addSql("INSERT INTO tests (id, title, created_at, updated_at) VALUES 
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', 'DEFAULT TEST', NOW(), NOW())");

        $this->addSql("INSERT INTO test_questions (test_id, question_id) VALUES 
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36982'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36981'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36980'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36983'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36984'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36985'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36986'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36987'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36988'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce32988'),
            ('ae024d0f-3124-41d0-b906-4e0c5c9785e4', '7d1099c6-444b-437a-bc57-cdf81ce36989')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
