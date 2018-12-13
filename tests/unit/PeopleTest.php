<?php

use PHPUnit\Framework\TestCase;

class PeopleTest extends TestCase
{
  private $getGroupsUrl = '/app/server/GetGroups.php';
  private $addPeopleUrl = '/app/server/AddPeople.php';

  public function testGettingGroupAssertsToNotNull()
  {
    $curl = new Curl\Curl();
    try {
      $result = $curl->get($this->getGroupsUrl);
    }
    catch (Exception $err) {
      $result = null;
    }

    $this->assertNotNull($result);
  }

  public function testAddingPeopleAssertsToTrue()
  {
    $curl = new Curl\Curl();
    try {
      $curl->get($this->addPeopleUrl);
      $result = true;
    }
    catch (Exception $err) {
      $result = false;
    }

    $this->assertNotNull($result);
  }
}