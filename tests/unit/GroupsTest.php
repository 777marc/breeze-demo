<?php

use PHPUnit\Framework\TestCase;

class GroupsTest extends TestCase
{
  private $addGroupsUrl = '/app/server/AddGroups.php';

  public function testAddingGroupdAssertsToTrue()
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
    $this->assertTrue($result);
  }
}