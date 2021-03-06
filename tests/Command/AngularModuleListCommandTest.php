<?php
namespace Civi\Cv\Command;

use Civi\Cv\Exception\ProcessErrorException;
use Civi\Cv\Util\Process;

class AngularModuleListCommandTest extends \Civi\Cv\CivilTestCase {

  /**
   * List extensions using a regular expression.
   */
  public function testGetRegex() {
    $p = Process::runOk($this->cv('ang:module:list'));
    $this->assertRegexp(';crmUi.*civicrm/a.*crmResource;', $p->getOutput());

    $p = Process::runOk($this->cv('ang:module:list ";crm;"'));
    $this->assertRegexp(';crmUi.*civicrm/a.*crmResource;', $p->getOutput());

    $p = Process::runOk($this->cv('ang:module:list ";foo;"'));
    $this->assertNotRegexp(';crmUi.*civicrm/a.*crmResource;', $p->getOutput());
  }

}
