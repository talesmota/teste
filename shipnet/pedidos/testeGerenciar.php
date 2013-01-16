<?php
class testeGerenciarPedidos extends PHPUnit_Extensions_SeleniumTestCase
{
  protected function setUp()
  {
    $this->setBrowser("*chrome");
    $this->setBrowserUrl("https://shipnet.gerencianet.com.br/");
  }

  public function testMyTestCase()
  {
    $this->open("/login/");
    $this->type("id=login", "241880-18");
    $this->type("id=senha", "123123");
    $this->click("name=entrar");
    $this->waitForPageToLoad("30000");
    $this->click("id=LojaMosaico");
    $this->waitForPageToLoad("30000");
    $this->click("id=btnPedidos");
    $this->click("css=p");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Gerenciar Pedidos")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("Pesquisa");
    $this->type("id=gerencCobrancasPesquisar", "tales@gerencianet.com.br");
    $this->click("css=span.botaoBuscaGnt");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ("" == $this->getTable("id=gerencCobrancas.0.1")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("//table[@id='gerencCobrancas']/thead/tr/th[2]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("//tr[@id='linha24188-13111615-LEFO1']/td[3]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("//tr[@id='linha24188-13111615-LEFO1']/td[3]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->type("id=gerencCobrancasPesquisar", "13111615");
    $this->click("css=span.botaoBuscaGnt");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ("Destinatário" == $this->getTable("id=gerencCobrancas.0.2")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("//tr[@id='linha24188-13111615-LEFO1']/td[3]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("//tr[@id='linha24188-13111615-LEFO1']/td[3]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->verifyTextPresent("tales@gerencianet.com.br");
    $this->verifyTextPresent("R$ 160,00");
    $this->click("link=Retirar filtro");
    $this->click("id=filtrarStatusGnt");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ("Destinatário" == $this->getTable("id=gerencCobrancas.0.2")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("xpath=(//li[@onclick=\"marcaFiltroLi(this, 'gerencCobrancas')\"])[4]");
    $this->click("id=filtrarTipoGnt");
    $this->click("css=div.starOn");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ("" == $this->getTable("id=gerencCobrancas.0.1")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("link=Retirar filtro");
  }
}
?>