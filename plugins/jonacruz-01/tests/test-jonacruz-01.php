<?php

use PHPUnit\Framework\TestCase;

class MiPluginTest extends TestCase
{

    protected function setUp(): void
    {
        CFP_Database::create_table();
    }

    public function testGuardarDatos()
    {
        $name = 'Jonathan';
        $email = 'jonathan@example.com';
        $message = 'Hola, este es un mensaje de prueba';

        CFP_Database::insert_submission($name, $email, $message);

        global $wpdb;
        $tabla = $wpdb->prefix . 'cfp_submissions';
        $result = $wpdb->get_row("SELECT * FROM $tabla WHERE email = '$email'");

        $this->assertNotNull($result);
        $this->assertEquals($name, $result->name);
        $this->assertEquals($email, $result->email);
        $this->assertEquals($message, $result->message);
    }
}
