<?php $permissoes = unserialize($dados->permissoes); ?>

<form id="formAcessosConcedidos" method="post">

<div style="padding: 10px">
	<a href="javascript:void(0)" class="easyui-linkbutton c1" size="large" iconCls="icon-ok" onclick="salvarAcessos()"> Salvar Alterações </a>
	<input type="checkbox" id="marcar_todos" name="marcar_todos" class="marcar" onclick="marcarTodos()">Marcar todos?
</div>

<div class="easyui-tabs" width="100%" height="100%">
	<input type="hidden" id="id_permissao" name="id_permissao" value="<?php echo $dados->id_permissao;?>">
    <div title="Cadastros">
        <table id="dgCadastros">
            <thead>
                <tr>
                    <th field="menu" width="10%" align="left"></th>
                    <th field="visualizar" width="12%" align="left">Visualizar</th>
                    <th field="cadastrar" width="12%" align="left">Cadastrar</th>
                    <th field="editar" width="12%" align="left">Editar</th>
                    <th field="desativar_excluir" width="12%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Ficha Clínica</td>
                    <td><input type="checkbox" class="marcar" id="vFichaClinica" name="vFichaClinica" <?php if(isset($permissoes['vFichaClinica'])){ if($permissoes['vFichaClinica'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aFichaClinica" name="aFichaClinica" <?php if(isset($permissoes['aFichaClinica'])){ if($permissoes['aFichaClinica'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eFichaClinica" name="eFichaClinica" <?php if(isset($permissoes['eFichaClinica'])){ if($permissoes['eFichaClinica'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dFichaClinica" name="dFichaClinica" <?php if(isset($permissoes['dFichaClinica'])){ if($permissoes['dFichaClinica'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Formas de Pagamento</td>
                    <td><input type="checkbox" class="marcar" id="vFormasPagamento" name="vFormasPagamento" <?php if(isset($permissoes['vFormasPagamento'])){ if($permissoes['vFormasPagamento'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aFormasPagamento" name="aFormasPagamento" <?php if(isset($permissoes['aFormasPagamento'])){ if($permissoes['aFormasPagamento'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eFormasPagamento" name="eFormasPagamento" <?php if(isset($permissoes['eFormasPagamento'])){ if($permissoes['eFormasPagamento'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dFormasPagamento" name="dFormasPagamento" <?php if(isset($permissoes['dFormasPagamento'])){ if($permissoes['dFormasPagamento'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Hirschberg</td>
                    <td><input type="checkbox" class="marcar" id="vHirschberg" name="vHirschberg" <?php if(isset($permissoes['vHirschberg'])){ if($permissoes['vHirschberg'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aHirschberg" name="aHirschberg" <?php if(isset($permissoes['aHirschberg'])){ if($permissoes['aHirschberg'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eHirschberg" name="eHirschberg" <?php if(isset($permissoes['eHirschberg'])){ if($permissoes['eHirschberg'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dHirschberg" name="dHirschberg" <?php if(isset($permissoes['dHirschberg'])){ if($permissoes['dHirschberg'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Olho Dominante</td>
                    <td><input type="checkbox" class="marcar" id="vOlhoDominante" name="vOlhoDominante" <?php if(isset($permissoes['vOlhoDominante'])){ if($permissoes['vOlhoDominante'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aOlhoDominante" name="aOlhoDominante" <?php if(isset($permissoes['aOlhoDominante'])){ if($permissoes['aOlhoDominante'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eOlhoDominante" name="eOlhoDominante" <?php if(isset($permissoes['eOlhoDominante'])){ if($permissoes['eOlhoDominante'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dOlhoDominante" name="dOlhoDominante" <?php if(isset($permissoes['dOlhoDominante'])){ if($permissoes['dOlhoDominante'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Óticas</td>
                    <td><input type="checkbox" class="marcar" id="vOticas" name="vOticas" <?php if(isset($permissoes['vOticas'])){ if($permissoes['vOticas'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aOticas" name="aOticas" <?php if(isset($permissoes['aOticas'])){ if($permissoes['aOticas'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eOticas" name="eOticas" <?php if(isset($permissoes['eOticas'])){ if($permissoes['eOticas'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dOticas" name="dOticas" <?php if(isset($permissoes['dOticas'])){ if($permissoes['dOticas'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Clientes/Fornecedores</td>
                    <td><input type="checkbox" class="marcar" id="vClientesFornecedores" name="vClientesFornecedores" <?php if(isset($permissoes['vClientesFornecedores'])){ if($permissoes['vClientesFornecedores'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aClientesFornecedores" name="aClientesFornecedores" <?php if(isset($permissoes['aClientesFornecedores'])){ if($permissoes['aClientesFornecedores'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eClientesFornecedores" name="eClientesFornecedores" <?php if(isset($permissoes['eClientesFornecedores'])){ if($permissoes['eClientesFornecedores'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dClientesFornecedores" name="dClientesFornecedores" <?php if(isset($permissoes['dClientesFornecedores'])){ if($permissoes['dClientesFornecedores'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
                <tr>
                    <td>Produtos</td>
                    <td><input type="checkbox" class="marcar" id="vProdutos" name="vProdutos" <?php if(isset($permissoes['vProdutos'])){ if($permissoes['vProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="aProdutos" name="aProdutos" <?php if(isset($permissoes['aProdutos'])){ if($permissoes['aProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="eProdutos" name="eProdutos" <?php if(isset($permissoes['eProdutos'])){ if($permissoes['eProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                    <td><input type="checkbox" class="marcar" id="dProdutos" name="dProdutos" <?php if(isset($permissoes['dProdutos'])){ if($permissoes['dProdutos'] == '1'){echo 'checked';}}?> value="1"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Movimentos">
        <table id="dgMovimentos">
            <thead>
                <tr>
                    <th field="menu" width="21%" align="left"></th>
                    <th field="visualizar" width="21%" align="left">Visualizar</th>
                    <th field="cadastrar" width="21%" align="left">Cadastrar</th>
                    <th field="editar" width="21%" align="left">Editar</th>
                    <th field="desativar_excluir" width="21%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Entradas</td>
                    <td><input type="checkbox" class="marcar" id="vMovEntrada" name="vMovEntrada" value="1" <?php if(isset($permissoes['vMovEntrada'])){ if($permissoes['vMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aMovEntrada" name="aMovEntrada" value="1" <?php if(isset($permissoes['aMovEntrada'])){ if($permissoes['aMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eMovEntrada" name="eMovEntrada" value="1" <?php if(isset($permissoes['eMovEntrada'])){ if($permissoes['eMovEntrada'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dMovEntrada" name="dMovEntrada" value="1" <?php if(isset($permissoes['dMovEntrada'])){ if($permissoes['dMovEntrada'] == '1'){echo 'checked';}}?>></td>
                </tr>
                <tr>
                    <td>Saídas</td>
                    <td><input type="checkbox" class="marcar" id="vMovSaida" name="vMovSaida" value="1" <?php if(isset($permissoes['vMovSaida'])){ if($permissoes['vMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aMovSaida" name="aMovSaida" value="1" <?php if(isset($permissoes['aMovSaida'])){ if($permissoes['aMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eMovSaida" name="eMovSaida" value="1" <?php if(isset($permissoes['eMovSaida'])){ if($permissoes['eMovSaida'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dMovSaida" name="dMovSaida" value="1" <?php if(isset($permissoes['dMovSaida'])){ if($permissoes['dMovSaida'] == '1'){echo 'checked';}}?>></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Relatórios">
        <table id="dgRelatorios">
            <thead>
                <tr>
                    <th field="visualizar" width="25%" align="left">Visualizar</th>
                    <th field="visualizarb" width="25%" align="left"></th>
                    <th field="visualizarc" width="25%" align="left"></th>
                    <th field="visualizard" width="25%" align="left"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="checkbox" class="marcar" id="vRelatorios" name="vRelatorios" value="1" <?php if(isset($permissoes['vRelatorios'])){ if($permissoes['vRelatorios'] == '1'){echo 'checked';}}?>>Relatórios</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div title="Configurações">
        <table id="dgConfiguracoes">
            <thead>
                <tr>
                    <th field="menu" width="21%" align="left"></th>
                    <th field="visualizar" width="21%" align="left">Visualizar</th>
                    <th field="cadastrar" width="21%" align="left">Cadastrar</th>
                    <th field="editar" width="21%" align="left">Editar</th>
                    <th field="desativar_excluir" width="21%" align="left">Desativar/Excluir</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Permissões</td>
                    <td><input type="checkbox" class="marcar" id="vConfigPermissoes" name="vConfigPermissoes" value="1" <?php if(isset($permissoes['vConfigPermissoes'])){ if($permissoes['vConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigPermissoes" name="aConfigPermissoes" value="1" <?php if(isset($permissoes['aConfigPermissoes'])){ if($permissoes['aConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigPermissoes" name="eConfigPermissoes" value="1" <?php if(isset($permissoes['eConfigPermissoes'])){ if($permissoes['eConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigPermissoes" name="dConfigPermissoes" value="1" <?php if(isset($permissoes['dConfigPermissoes'])){ if($permissoes['dConfigPermissoes'] == '1'){echo 'checked';}}?>></td>
                </tr>
                <tr>
                    <td>Usuários</td>
                    <td><input type="checkbox" class="marcar" id="vConfigUsuarios" name="vConfigUsuarios" value="1" <?php if(isset($permissoes['vConfigUsuarios'])){ if($permissoes['vConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="aConfigUsuarios" name="aConfigUsuarios" value="1" <?php if(isset($permissoes['aConfigUsuarios'])){ if($permissoes['aConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="eConfigUsuarios" name="eConfigUsuarios" value="1" <?php if(isset($permissoes['eConfigUsuarios'])){ if($permissoes['eConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                    <td><input type="checkbox" class="marcar" id="dConfigUsuarios" name="dConfigUsuarios" value="1" <?php if(isset($permissoes['dConfigUsuarios'])){ if($permissoes['dConfigUsuarios'] == '1'){echo 'checked';}}?>></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</form>

<script type="text/javascript">

// MARCAR TODOS OS CHECKBOXES
function marcarTodos(){
	$('.marcar').each(
		function(){
			if ($(this).prop("checked")) {
				$(this).prop("checked", false);
				$('#marcar_todos').prop("checked", false);
			} else { 
				$(this).prop("checked", true);
				$('#marcar_todos').prop("checked", true);
			}
		}
	);
}

// SALVAR NOVO/EDITAR
function salvarAcessos(){
    $('#formAcessosConcedidos').form('submit',{
        url: '<?php base_url();?>permissoes/salvarAcessos',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');
            if (result.errorMsg){
                $.messager.show({
                    title:'Erro',
                    msg: '<strong style="color:red"><i class="fa fa-ban fa-2x"></i>'+result.errorMsg+'</strong>',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            } else {
                $.messager.show({
                    title:'Feito',
                    msg:'<strong style="color:green"><i class="fa fa-check fa-2x"></i>Registro armazenado com sucesso!</strong>',
                    icon: 'info',
                    showType:'show',
                    style:{
                        left:'',
                        right:0,
                        top:document.body.scrollTop+document.documentElement.scrollTop,
                        bottom:''
                    }
                });
            }
        }
    });
}
</script>