<?php

use Illuminate\Database\Migrations\Migration;

class IdeKecilInit extends Migration
{
	public function __construct()
	{
		$this->prefix = Config::get('odenktools.prefix', '');
	}

	public function up()
	{
		$prefix = $this->prefix;

		Schema::create($prefix . 'role', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id_role');
			$table->string('role_name', 100)->index();
			$table->text('role_description')->nullable();
			$table->tinyInteger('is_active')->default(0);
			$table->tinyInteger('is_purchaseable')->default(0);
			$table->decimal('amount', 10,2);
			$table->decimal('price', 10,2);
			$table->integer('time_left', 100);
			$table->integer('quantity', 100);
			$table->string('period', 1);
			$table->integer('is_builtin', 100);
			$table->string('backcolor', 24);
			$table->string('forecolor', 24);
			$table->timestamps();
			$table->softDeletes();

		});

		Schema::create($prefix . 'users', function($table)
		{
			$table->engine = 'InnoDB';

			$table->increments('id_user');
			$table->string('username', 128)->index();
			$table->string('user_mail', 128)->index();
			$table->string('email', 128)->index();
			$table->string('password', 128)->index();
			$table->string('activation_code', 40)->nullable();
			$table->integer('is_builtin')->default(0);
			$table->integer('is_active')->default(0);
			$table->integer('verified')->default(0);
			$table->dateTime('expire_date')->nullable();
			$table->string('time_zone', 64)->nullable();
			$table->timestamp('last_login')->nullable();
			$table->string('remember_token', 100)->nullable()->index();
			$table->string('forgotten_password_code', 40)->nullable();
			$table->integer('forgotten_password_time')->nullable();
			$table->timestamps();
		});

		Schema::create($prefix . 'user_roles', function($table) use ($prefix)
		{
			$table->engine = 'InnoDB';

			$table->increments('id_user_roles');
			$table->integer('user_id')->index();
			$table->integer('roles_id')->index();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id_user')
				->on($prefix . 'users');

			$table->foreign('roles_id')
				->references('id_role')
				->on($prefix . 'roles');
		});

	}

	public function down()
	{
		Schema::drop($this->prefix . 'user_roles');
		Schema::drop($this->prefix . 'users');
		Schema::drop($this->prefix . 'role');
	}
}
