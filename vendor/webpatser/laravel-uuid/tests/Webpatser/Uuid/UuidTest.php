<?php

use Webpatser\Uuid\Uuid;

class UuidTest extends PHPUnit_Framework_TestCase {

    const uuidRegex = '/([a-f0-9]{8}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{4}-[a-f0-9]{12})/';

    public function testStaticGeneration()
    {
        $uuid = Uuid::generate(1);
        $this->assertInstanceOf('Webpatser\Uuid\Uuid', $uuid);

        $uuid = Uuid::generate(3, 'example.com', Uuid::nsDNS);
        $this->assertInstanceOf('Webpatser\Uuid\Uuid', $uuid);

        $uuid = Uuid::generate(4);
        $this->assertInstanceOf('Webpatser\Uuid\Uuid', $uuid);

        $uuid = Uuid::generate(5, 'example.com', Uuid::nsDNS);
        $this->assertInstanceOf('Webpatser\Uuid\Uuid', $uuid);
    }

    public function testGenerationOfValidUuid()
    {
        $uuid = Uuid::generate(1);
        $this->assertRegExp(self::uuidRegex, (string) $uuid);

        $uuid = Uuid::generate(3, 'example.com', Uuid::nsDNS);
        $this->assertRegExp(self::uuidRegex, (string) $uuid);

        $uuid = Uuid::generate(4);
        $this->assertRegExp(self::uuidRegex, (string) $uuid);

        $uuid = Uuid::generate(5, 'example.com', Uuid::nsDNS);
        $this->assertRegExp(self::uuidRegex, (string) $uuid);
    }

    public function testCorrectVersionUuid()
    {
        $uuidOne = Uuid::generate(1);
        $this->assertEquals(1, $uuidOne->version);

        $uuidThree = Uuid::generate(3,'example.com', Uuid::nsDNS);;
        $this->assertEquals(3, $uuidThree->version);

        $uuidFour = Uuid::generate(4);
        $this->assertEquals(4, $uuidFour->version);

        $uuidFive = Uuid::generate(5,'example.com', Uuid::nsDNS);;
        $this->assertEquals(5, $uuidFive->version);
    }

    public function testCorrectVariantUuid()
    {
        $uuidOne = Uuid::generate(1);
        $this->assertEquals(1, $uuidOne->variant);

        $uuidThree = Uuid::generate(3,'example.com', Uuid::nsDNS);;
        $this->assertEquals(1, $uuidThree->variant);

        $uuidFour = Uuid::generate(4);
        $this->assertEquals(1, $uuidFour->variant);

        $uuidFive = Uuid::generate(5,'example.com', Uuid::nsDNS);;
        $this->assertEquals(1, $uuidFive->variant);
    }

    public function testCorrectVersionOfImportedUuid()
    {
        $uuidOne = Uuid::generate(1);
        $importedOne = Uuid::import((string) $uuidOne);
        $this->assertEquals($uuidOne->version, $importedOne->version);

        $uuidThree = Uuid::generate(3,'example.com', Uuid::nsDNS);;
        $importedThree = Uuid::import((string) $uuidThree);
        $this->assertEquals($uuidThree->version, $importedThree->version);

        $uuidFour = Uuid::generate(4);
        $importedFour = Uuid::import((string) $uuidFour);
        $this->assertEquals($uuidFour->version, $importedFour->version);

        $uuidFive = Uuid::generate(5,'example.com', Uuid::nsDNS);;
        $importedFive = Uuid::import((string) $uuidFive);
        $this->assertEquals($uuidFive->version, $importedFive->version);
    }

    public function testCorrectNodeOfGeneratedUuid()
    {
        $macAdress = Faker\Provider\Internet::macAddress();
        $uuidThree = Uuid::generate(1, $macAdress);
        $this->assertEquals(strtolower(str_replace(':', '', $macAdress)), $uuidThree->node);

        $uuidThree = Uuid::generate(3, $macAdress, Uuid::nsDNS);
        $this->assertNull($uuidThree->node);

        $uuidThree = Uuid::generate(4, $macAdress);
        $this->assertNull($uuidThree->node);

        $uuidThree = Uuid::generate(5, $macAdress, Uuid::nsDNS);
        $this->assertNull($uuidThree->node);
    }

    public function testCorrectTimeOfImportedUuid()
    {
        $uuidOne = Uuid::generate(1);
        $importedOne = Uuid::import((string) $uuidOne);
        $this->assertEquals($uuidOne->time, $importedOne->time);

        $uuidThree = Uuid::generate(3,'example.com', Uuid::nsDNS);;
        $importedThree = Uuid::import((string) $uuidThree);
        $this->assertEmpty($importedThree->time);

        $uuidFour = Uuid::generate(4);
        $importedFour = Uuid::import((string) $uuidFour);
        $this->assertEmpty($importedFour->time);

        $uuidFive = Uuid::generate(5,'example.com', Uuid::nsDNS);;
        $importedFive = Uuid::import((string) $uuidFive);
        $this->assertEmpty($importedFive->time);
    }

    public function testUuidCompare()
    {
        $uuid1 = (string) Uuid::generate(1);
        $uuid2 = (string) Uuid::generate(1);

        $this->assertTrue(Uuid::compare($uuid1, $uuid1));
        $this->assertFalse(Uuid::compare($uuid1, $uuid2));
    }
}
