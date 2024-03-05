<?php

class User
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
           $table->string('id');
     });
   }

    public function down()
    {
        // Define schema changes for the down method
    }
}
