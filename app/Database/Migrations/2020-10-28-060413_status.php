<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Status extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
			],
			'status'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '255',
			],
			'type_status_id' => [
					'type'           => 'INT',
					'constraint'      => '11',
			],
		]);
		$this->forge->createTable('status');
	}
	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('status');
	}
}
