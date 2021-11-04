<div class="easyui-panel" fit="true" style="padding:5px;">
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuPadrao',iconCls:'fa fa-home fa-lg'">Menu</a>
    <a href="#" class="easyui-menubutton" data-options="menu:'#menuUsuario',iconCls:'fa fa-user fa-lg'"><?php echo $this->session->userdata('nome');?></a>
    <a href="<?php base_url()?>logout" class="easyui-linkbutton" data-options="iconCls:'fa fa-sign-out fa-lg', plain:'false'">Sair</a>

    <div id="menuPadrao" style="width:160px;">
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vFichaClinica') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vOticas') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorios') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vClientesFornecedores') ||
        $this->permission->checkPermission($this->session->userdata('permissao'),'vProdutos') ||
        $this->permission->checkPermission($this->session->userdata('permissao'),'vFormasPagamento')||
        $this->permission->checkPermission($this->session->userdata('permissao'),'vHirschberg')||
        $this->permission->checkPermission($this->session->userdata('permissao'),'vOlhoDominante')) { 
        ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vFichaClinica') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vOticas')) { ?>
        <div>
            <span>Cadastros</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vFichaClinica')) { ?>
                <div onclick="addPanel('Ficha Clínica','<?php base_url();?>ficha_clinica')">Ficha Clínica</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vFormasPagamento')) { ?>
                <div onclick="addPanel('Formas de Pagamento','<?php base_url();?>formas_pagamento')">Formas de Pagamento</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vHirschberg')) { ?>
                <div onclick="addPanel('Hirschberg','<?php base_url();?>hirschberg')">Hirschberg</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vOlhoDominante')) { ?>
                <div onclick="addPanel('Olho Dominante','<?php base_url();?>olho_dominante')">Olho Dominante</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vOticas')) { ?>
                <div onclick="addPanel('Óticas','<?php base_url();?>oticas')">Óticas</div>
                <?php } ?>
                <div class="menu-sep"></div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vClientesFornecedores')) { ?>
                <div onclick="addPanel('Clientes/Fornecedores','<?php base_url();?>clientes_fornecedores')">Clientes/Fornecedores</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vProdutos')) { ?>
                <div onclick="addPanel('Produtos','<?php base_url();?>produtos')">Produtos</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida')) { ?>
        <div>
            <span>Movimentos</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovEntrada')){ ?>
                <div onclick="addPanel('Entradas','<?php base_url();?>entradas')">Entradas</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vMovSaida')){ ?>
                <div onclick="addPanel('Saídas','<?php base_url();?>saidas')">Saídas</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vRelatorios')){ ?>
        <div onclick="addPanel('Relatórios','<?php base_url();?>relatorios')">Relatórios</div>
        <?php } ?>
        <?php 
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes') ||
            $this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')) { ?>
        <div class="menu-sep"></div>
        <div>
            <span>Configurações</span>
            <div>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigPermissoes')){ ?>
                <div onclick="addPanel('Permissões','<?php base_url();?>permissoes')">Permissões</div>
                <?php } ?>
                <?php if($this->permission->checkPermission($this->session->userdata('permissao'),'vConfigUsuarios')){ ?>
                <div onclick="addPanel('Usuários','<?php base_url();?>usuarios')">Usuários</div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php } ?>
    </div>

    <div id="menuUsuario" style="width:150px;">
        <div onclick="abrirDialogDefinirSenha()">Definir senha</div>
    </div>
</div>