<?php
class testeGerarPedidos extends PHPUnit_Extensions_SeleniumTestCase
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
    $this->click("css=#LojaMosaico > div.tituloAzulejoMosaico");
    $this->waitForPageToLoad("30000");
    $this->click("id=btnPedidos");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Novo Pedido")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("css=#linknovoPedido > div.conteudoLajotaPedidos > h1");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Inserção rápida")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=add_cliente", "tales@gerencianet.com.br");
    $this->click("id=InserirClientesRap");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("tales@gerencianet.com.br")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("xpath=(//button[@value='btnG'])[2]");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Código")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->type("id=prodPesquisar", "Não Deletar");
    $this->click("css=span.botaoBuscaGnt");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("2594")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("name=marcar[]");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Os produtos selecionados abaixo foram adicionados à cobrança")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("Os produtos selecionados abaixo foram adicionados à cobrança");
    $this->click("css=button.btnGnt3");
    $this->verifyTextPresent("150,00");
    $this->click("css=div.linkAddProdServ.linkAdicionar");
    $this->verifyTextPresent("Informe a descrição do produto");
    $this->click("id=toggleOpcoesFrete");
    $this->click("id=frete_fixo");
    $this->type("id=frete_fixo", "10,00");
    $this->verifyTextPresent("Total do Pedido");
    $this->click("id=fOnline");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Informe o vencimento")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->click("css=button.btnGnt3");
    $this->click("id=vencimento");
    $this->type("id=vencimento", "12/12/2015");
    $this->click("id=fOnline");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Pedido gerado com sucesso")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("tales@gerencianet.com.br")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

    $this->verifyTextPresent("tales@gerencianet.com.br");
    $this->verifyTextPresent("160,00");
    $this->click("css=button.btnGnt3");
    for ($second = 0; ; $second++) {
        if ($second >= 60) $this->fail("timeout");
        try {
            if ($this->isTextPresent("Inserção rápida")) break;
        } catch (Exception $e) {}
        sleep(1);
    }

  }
}
?>