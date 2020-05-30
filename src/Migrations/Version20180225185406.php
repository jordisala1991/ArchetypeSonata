<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180225185406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Content migration';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql("INSERT INTO `fos_user_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `created_at`, `updated_at`, `date_of_birth`, `firstname`, `lastname`, `website`, `biography`, `gender`, `locale`, `timezone`, `phone`, `facebook_uid`, `facebook_name`, `facebook_data`, `twitter_uid`, `twitter_name`, `twitter_data`, `gplus_uid`, `gplus_name`, `gplus_data`, `token`, `two_step_code`) VALUES (1,'admin','admin','admin@localhost','admin@localhost',1,'2Vcp9MrG8Bkzlpnlg.RWm4tsmqTOlR5QAq76La9r0QY','\$argon2id\$v=19\$m=65536,t=4,p=1\$Twwp6lF3XgssbFNQUn8Vbg\$diXNnfXPsOpxjI12TNb5zTrAjeQ+nflbWihtXbZx74Q',NULL,NULL,NULL,'a:1:{i:0;s:16:\"ROLE_SUPER_ADMIN\";}','2020-03-29 18:51:52','2020-03-29 18:51:52',NULL,NULL,NULL,NULL,NULL,'u',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
    }
}
