<?php

use mergimuka\AHVValidator\AHVValidator;
use mergimuka\AHVValidator\Tests\TestCase;

class AHVTest extends TestCase {

    /**
     * test ahv with null value
     *
     * @return boolean
     */
    public function testFailOnNull() {
        $ahv = new AHVValidator();
        $response = $ahv->check('null')->original;
        $this->assertFalse($response['valid']);
    }

    /**
     * test length of ahv
     *
     * @return boolean
     */
    public function testCorrectLength() {
        $ahv = new AHVValidator();
        $response = $ahv->check('7567378074000')->original;
        $this->assertIsInt($response['length']);
        $this->assertEquals(13, $response['length']);
    }

    /**
     * test if its valid ahv
     *
     * @return boolean
     */
    public function testIsAHVValid() {
        $ahv = new AHVValidator();
        $response = $ahv->check('7567378074000')->original;
        $this->assertTrue($response['valid']);
    }

    /**
     * test if ahv with dots is valid
     *
     * @return boolean
     */
    public function testIsAHVValidWithDots() {
        $ahv = new AHVValidator();
        $response = $ahv->check('756.9217.0769.85')->original;
        $this->assertTrue($response['valid']);
    }


     /**
     * test if it is not valid with incorrect length
     *
     * @return boolean
     */
    public function testIsAHVNotValidWithNotCorrectLength() {
        $ahv = new AHVValidator();
        $response = $ahv->check('756737807400')->original;
        $this->assertIsInt($response['length']);
        $this->assertEquals(12, $response['length']);
        $this->assertFalse($response['valid']);
    }

    /**
     * test if it is not valid but with correct length
     *
     * @return boolean
     */
    public function testIsAHVNotValidWithCorrectLength() {
        $ahv = new AHVValidator();
        $response = $ahv->check('7567378074009')->original;
        $this->assertIsInt($response['length']);
        $this->assertEquals(13, $response['length']);
        $this->assertFalse($response['valid']);
    }

}