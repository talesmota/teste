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
    $this->type("id=login", "201330-14");
    $this->type("id=senha", "123123");
    $this->click("name=entrar");
    $this->waitForPageToLoad("30000");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Mosaico GerênciaNet - O que deseja fazer?")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=movimentacoesHoje");
    $this->waitForPageToLoad("30000");
    $this->click("id=gradeTopo2");
    $this->click("css=#MiniLojaMosaico > div.ValorSaldoMiniMosaico");
    $this->waitForPageToLoad("30000");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Loja Virtual - \"Review\"")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=tooltip_fechar");
    $this->click("id=btnPedidos");
    $this->click("css=#linknovoPedido > div.conteudoLajotaPedidos > p");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Destinatários")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=add_cliente", "codebalboa@gerencianet.com.br");
    $this->click("id=InserirClientesRap");
    $this->click("xpath=(//button[@value='btnG'])[2]");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=th.header.headerSortDown")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("xpath=(//html/body/div[2]/div/div[3]/table/tbody/tr[2]/td/input)");
    $this->click("css=button.btnGnt3");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("10,00")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=toggleOpcoesFrete");
    $this->click("id=frete_fixo");
    $this->type("id=frete_fixo", "2,00");
    $this->click("id=frete_fixo");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Total do Pedido: R$ 12,00")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("//div[@id='caixasOpcoesFrete']/div[2]/div/h2");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Total do Pedido: R$ 10,00")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("id=toggleOpcoesFrete");
    $this->click("id=vencimento");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=Próximo>");
    $this->click("link=31");
    $this->click("id=maisOpcoes");
    $this->click("id=sms");
    $this->click("id=fOnline");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Pedidos emitidos através deste lote")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    try {
        $this->assertTrue($this->isElementPresent("css=button.btnGnt3"));
    } catch (PHPUnit_Framework_AssertionFailedError $e) {
        array_push($this->verificationErrors, $e->toString());
    }
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isElementPresent("css=th.header")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $ncob = $this->getText("xpath=(//html/body/div[7]/div[3]/div[5]/div/div[4]/div[5]/div/table/tbody/tr/td)");
    $this->click("css=button.btnGnt3");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Destinatários")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("css=p");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Gerenciar Pedidos")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("xpath=(//html/body/div[7]/div/div/div[6]/table/tbody/tr/td[4]/button)");
  }
}
?>