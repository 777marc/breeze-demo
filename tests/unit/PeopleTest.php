<?php

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
  private $addGroupsUrl = '/app/server/AddGroups.php';

  public function testTrueAssertsToTure()
  {
    $this->assertTrue(true);
  }

  public function testGettingGroupAssertsToNotNull()
  {
    $curl = new Curl\Curl();
    try {
      $result = $curl->get($this->addGroupsUrl);
    }
    catch (Exception $err) {
      $result = null;
    }

    $this->assertNotNull($result);
  }
}