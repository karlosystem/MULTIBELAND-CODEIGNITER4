<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSocialMediaTable extends Migration
{
    public function up()
    {
         $this->forge->addField([
            'id'=>[
                'type'=> 'INT',
                'unsigned'=>true,
                'auto_increment'=>true       
            ],
            'facebook_url'=>[
                'type'=> 'VARCHAR',
                'constraint'=>'255'
            ],
            'instagram_url'=>[
                'type'=> 'VARCHAR',
                'constraint'=>'255'
            ],
            'youtube_url'=>[
                'type'=> 'VARCHAR',
                'constraint'=>'255',
                'null'=>TRUE
            ],
            'tiktok_url'=>[
                'type'=> 'VARCHAR',
                'constraint'=>'255',
                'null'=>TRUE
            ],
            'whastapp_url'=>[
                'type'=> 'TEXT',
                'null'=>TRUE
            ],        
            'telegram_url'=>[
                'type'=> 'VARCHAR',
                'constraint'=>'255',
                'null'=>TRUE
            ],           
            'created_at timestamp default current_timestamp',
            'updated_at timestamp default current_timestamp on update current_timestamp',
        ]);   
        $this->forge->addKey('id', true); 
        $this->forge->createTable('social_media');
    }

    public function down()
    {
        $this->forge->dropTable('social_media'); 
    }
}
