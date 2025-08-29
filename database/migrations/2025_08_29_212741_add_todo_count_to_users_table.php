<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('todo_count')->unsigned()->default(0);
        });

        // DB::unprepared("
        //         CREATE TRIGGER after_create_todo
        //         AFTER INSERT ON todos
        //         FOR EACH ROW
        //         BEGIN
        //             UPDATE users
        //             SET todo_count = todo_count + 1
        //             WHERE id = NEW.user_id;
        //         END;
        //     ");

        //     DB::unprepared("
        //         CREATE TRIGGER after_delete_todo
        //         AFTER DELETE ON todos
        //         FOR EACH ROW
        //         BEGIN
        //             UPDATE users
        //             SET todo_count = GREATEST(todo_count - 1, 0)
        //             WHERE id = OLD.user_id;
        //         END;
        //     ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared("
        //     DROP TRIGGER IF EXISTS after_create_todo;
        //     DROP TRIGGER IF EXISTS after_delete_todo;
        // ");

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('todo_count');
        });
    }
};
