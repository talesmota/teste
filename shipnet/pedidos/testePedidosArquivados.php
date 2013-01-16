<?php
class testePedidosArquivados extends PHPUnit_Extensions_SeleniumTestCase
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
            if ($this->isElementPresent("//table[@id='gerencCobrancas']/thead/tr/th[2]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=gerencCobrancasPesquisar", "13111615");
    $this->click("css=span.botaoBuscaGnt");
    $this->click("css=span.botaoBuscaGnt");
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
    $this->click("css=td > input[name=\"gerencCobrancasmarcar-todos\"]");
    $this->click("id=acoesGnt");
    $this->click("//li[@onclick=\"cancelarCobr('')\"]");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("//div[@id='janelaSusp0']/div/span/div[3]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("//div[@id='janelaSusp0']/div/span/div[3]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("css=button.btnGnt3");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Cancelada e Arquivada")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("Cancelada e Arquivada");
    $this->click("css=span.lojaIconePedidosArquivados");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("//table[@id='tabelaPedidosArquivados']/thead/tr/th[2]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("//table[@id='tabelaPedidosArquivados']/thead/tr/th[2]"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->type("id=tabelaPedidosArquivadosPesquisar", "13111615");
    $this->click("css=span.botaoBuscaGnt");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("//table[@id='tabelaPedidosArquivados']/thead/tr/th[2]")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("css=th.header"));
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
    $this->click("css=td > input[name=\"pedidosArquivadosmarcar-todos\"]");
    $this->click("id=acoesGnt");
    $this->click("css=b");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=div.janelaSuspGntInt2")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("css=div.tituloDestaque"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    $this->click("css=button.btnGnt3");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=div.janelaSuspGntInt2")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("Pedido restaurada com sucesso");
    $this->click("css=button.btnGnt3");
  }
}
?>