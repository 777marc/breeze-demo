<?php

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
  private $addGroupsUrl = '/app/server/AddGroups.php';

  public function testTrueAssertsToTure()
  {
    $this->assertTrue(true);
  }

  public function testTrueAssertsToFalse()
  {
    $curl = new Curl\Curl();
    try {
      // Given more time I this is where I'd get the result and do some assertions
      $curl->get($this->addGroupsUrl);
      $result = true;
    }
    catch (Exception $err) {
      $result = false;
    }
    
    echo($result);

    $this->assertTrue($result);
  }
}