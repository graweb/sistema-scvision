<table id="dgClientesFornecedores"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>clientes_fornecedores/listar"
        toolbar="#toolbarClientesFornecedores" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_cliente_fornecedor" width="10">ID</th>
            <th field="razao_social" width="50">RAZÃO SOCIAL</th>
            <th field="tipo" width="20" align="center" formatter="formataTipoClienteFornecedor">TIPO</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoClienteFornecedor">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarClientesFornecedores">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoClienteFornecedor()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarClienteFornecedor()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="ativarDesativarClienteFornecedor()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaClienteFornecedor" searcher='buscaClienteFornecedor' style="width:30%">
    <div id='menuBuscaClienteFornecedor' style='width:auto'>
        <div name='id_cliente_fornecedor'>ID</div>
        <div name='razao_social'>RAZÃO SOCIAL</div>
    </div>
</div>

<div id="dlgClientesFornecedores" class="easyui-dialog" style="width:680px;height:550px" 
        closed="true" buttons="#dlgClientesFornecedoresButtons" modal="true">
    <form id="formClientesFornecedores" class="easyui-form" method="post" data-options="novalidate:true">
        <div id="tabClientesFornecedores" class="easyui-tabs" style="width:auto;height:auto;">
            <div title="Informações" style="padding:10px;display:none;">
                <tr>
                    <td>
                        <input class="easyui-textbox" label="Razão Social:" labelPosition="top" id="razao_social" name="razao_social" style="width:100%;" required="true">
                    </td>
                    <td>
                        <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                            <option value='1'>Ativo</option>
                            <option value='0'>Inativo</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="easyui-combobox" label="Tipo:" labelPosition="top" id="tipo" name="tipo" panelHeight="auto" editable="false" required="true" style="width:100%;">
                            <option value="1">CLIENTE</option>
                            <option value="2">FORNECEDOR</option>
                        </select>
                    </td>
                    <td>
                        <input class="easyui-textbox" label="CNPJ:" labelPosition="top" id="cnpj" name="cnpj" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="CPF:" labelPosition="top" id="cpf" name="cpf" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="easyui-textbox" label="Banco:" labelPosition="top" id="banco" name="banco" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Agência:" labelPosition="top" id="agencia" name="agencia" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Conta:" labelPosition="top" id="conta" name="conta" style="width:100%;">
                    </td>
                </tr>
            </div>
            <div title="Endereço" data-options="closable:true" style="padding:10px;display:none;">
                <tr>
                    <td>
                        <input class="easyui-textbox" label="CEP:" labelPosition="top" id="cep" name="cep" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="UF:" labelPosition="top" id="uf" name="uf" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Estado:" labelPosition="top" id="estado" name="estado" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="easyui-textbox" label="Cidade:" labelPosition="top" id="cidade" name="cidade" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Bairro:" labelPosition="top" id="bairro" name="bairro" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <select class="easyui-combobox" label="Tipo Logradouro:" labelPosition="top" id="tipo_logradouro" name="tipo_logradouro" panelHeight="auto" editable="false" style="width:100%;">
                            <option value="Alameda">Alameda</option>
                            <option value="Avenida">Avenida</option>
                            <option value="Estrada">Estrada</option>
                            <option value="Largo">Largo</option>
                            <option value="Praça">Praça</option>
                            <option value="Quadra">Quadra</option>
                            <option value="Rodovia">Rodovia</option>
                            <option value="Rua">Rua</option>
                            <option value="Travessa">Travessa</option>
                        </select>
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Logradouro:" labelPosition="top" id="logradouro" name="logradouro" style="width:100%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input class="easyui-textbox" label="Número:" labelPosition="top" id="numero" name="numero" style="width:100%;">
                    </td>
                    <td>
                        <input class="easyui-textbox" label="Complemento:" labelPosition="top" id="complemento" name="complemento" style="width:100%;">
                    </td>
                </tr>
            </div>
        </div>
    </form>
</div>
<div id="dlgClientesFornecedoresButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgClientesFornecedores').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarFornecedor()" style="width:90px">Salvar</a>
</div>

<!-- MODAL DESATIVAR -->
<div id="dlgClientesFornecedoresDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgFornecedorButtonsDesativar" modal="true">
    <form id="formClientesFornecedoresAtivarDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_cliente_fornecedor_ativar_desativar" name="situacao_cliente_fornecedor_ativar_desativar">
        <h3 style="text-align: center;">Deseja ativar/desativar esse cliente/fornecedor?</h3>
    </form>
</div>
<div id="dlgFornecedorButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgClientesFornecedoresDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarFornecedorAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaClienteFornecedor(value,name){
    if(name == 'id_cliente_fornecedor'){
        $('#dgClientesFornecedores').datagrid('load',{
            id_cliente_fornecedor: value
        });
    }else if(name == 'otica'){
        $('#dgClientesFornecedores').datagrid('load',{
            otica: value
        });
    }
}

// FORMATA CLIENTE/FORNECEDOR
function formataTipoClienteFornecedor(value,row){
    if (value == '1'){
        return '<span style="display:inline-block">CLIENTE<span>';
    } else {
        return '<span style="display:inline-block">FORNECEDOR<span>';
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoClienteFornecedor(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgClientesFornecedores').datagrid({
    onDblClickCell: function(index,field,value){
        editarClienteFornecedor();
    }
});

// NOVO
function novoClienteFornecedor(){
    $('#dlgClientesFornecedores').dialog('open').dialog('center').dialog('setTitle','Novo Cliente/Fornecedor');
    $('#tabClientesFornecedores').tabs('select',0);
    $('#formClientesFornecedores').form('clear');
    url = '<?php base_url();?>clientes_fornecedores/cadastrar';
}

// EDITAR
function editarClienteFornecedor(){
    var row = $('#dgClientesFornecedores').datagrid('getSelected');
    if (row != null){
        $('#dlgClientesFornecedores').dialog('open').dialog('center').dialog('setTitle','Editar Cliente/Fornecedor');
        $('#tabClientesFornecedores').tabs('select',0);
        $('#formClientesFornecedores').form('load',row);
        url = '<?php base_url();?>clientes_fornecedores/atualizar/'+row.id_cliente_fornecedor;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// DESATIVAR
function ativarDesativarClienteFornecedor(){
    var row = $('#dgClientesFornecedores').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#situacao_cliente_fornecedor_ativar_desativar').val(0);
        } else {
            $('#situacao_cliente_fornecedor_ativar_desativar').val(1);
        }

        $('#dlgClientesFornecedoresDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Cliente/Fornecedor');
        $('#formClientesFornecedoresAtivarDesativar').form('load',row);
        url = '<?php base_url();?>clientes_fornecedores/ativarDesativar/'+row.id_cliente_fornecedor;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarFornecedor(){
    $('#formClientesFornecedores').form('submit',{
        url: url,
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
                $('#dlgClientesFornecedores').dialog('close');
                $('#dgClientesFornecedores').datagrid('reload');
            }
        }
    });
}

// DESATIVAR
function salvarFornecedorAtivarDesativar(){
    $('#formClientesFornecedoresAtivarDesativar').form('submit',{
        url: url,
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
                $('#dlgClientesFornecedoresDesativar').dialog('close');
                $('#dgClientesFornecedores').datagrid('reload');
            }
        }
    });
}
</script>