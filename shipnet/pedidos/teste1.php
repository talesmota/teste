<?php
class Example extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("https://shipnet.gerencianet.com.br/");
  }

  public function testMyTestCase()
  {
    $this->open("/login/");
    $this->click("name=entrar");
    $this->waitForPageToLoad("30000");
    $this->click("id=cobreLajotaCC");
    $this->waitForPageToLoad("30000");
    $this->click("id=gradeTopo2");
    $this->click("css=#MiniLojaMosaico > div.ValorSaldoMiniMosaico");
    $this->waitForPageToLoad("30000");
  }
}
?>