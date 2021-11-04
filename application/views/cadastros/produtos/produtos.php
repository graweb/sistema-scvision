<table id="dgProdutos"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>produtos/listar"
        toolbar="#toolbarProdutos" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_produto" width="10">ID</th>
            <th field="produto" width="70">PRODUTO</th>
            <th field="situacao" width="20" align="center" formatter="formataSituacaoProduto">SITUAÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarProdutos">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoProduto()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarProduto()">Editar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-ban fa-lg" plain="true" onclick="ativarDesativarProduto()">Ativar/Desativar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaProduto" searcher='buscaProdutos' style="width:30%">
    <div id='menuBuscaProduto' style='width:auto'>
        <div name='id_produto'>ID</div>
        <div name='produto'>PRODUTO</div>
    </div>
</div>

<div id="dlgProdutos" class="easyui-dialog" style="width:700px;height:620px" 
        closed="true" buttons="#dlgProdutosButtons" modal="true">
    <form id="formOticas" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Produto:" labelPosition="top" id="produto" name="produto" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Marca:" labelPosition="top" id="marca" name="marca" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Custo Unitário:" labelPosition="top" id="custo_unitario" name="custo_unitario" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Preço Venda:" labelPosition="top" id="preco_venda" name="preco_venda" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Unidade:" labelPosition="top" id="unidade" name="unidade" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <input class="easyui-textbox" label="Quantidade:" labelPosition="top" id="quantidade" name="quantidade" required="true" style="width:100%;">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="easyui-combobox" label="Situação:" labelPosition="top" id="situacao" name="situacao" panelHeight="auto" editable="false" required="true" style="width:100%;">
                        <option value='1'>Ativo</option>
                        <option value='0'>Inativo</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descrição:</label>
                    <input class="easyui-textbox" id="descricao" name="descricao" style="width:100%;height:60px" multiline="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgProdutosButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgProdutos').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarOtica()" style="width:90px">Salvar</a>
</div>

<!-- MODAL DESATIVAR -->
<div id="dlgProdutosDesativar" class="easyui-dialog" style="width:400px;padding:10px 20px;"
        closed="true" buttons="#dlgOticaButtonsDesativar" modal="true">
    <form id="formProdutoAtivarDesativar" class="easyui-form" method="post" data-options="novalidate:true">
        <input type="hidden" id="situacao_produto_ativar_desativar" name="situacao_produto_ativar_desativar">
        <h3 style="text-align: center;">Deseja ativar/desativar esse produto?</h3>
    </form>
</div>
<div id="dlgOticaButtonsDesativar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgProdutosDesativar').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarOticaAtivarDesativar()" style="width:90px">Salvar</a>
</div>

<script type="text/javascript">
var url;

//BUSCA
function buscaProdutos(value,name){
    if(name == 'id_produto'){
        $('#dgProdutos').datagrid('load',{
            id_produto: value
        });
    }else if(name == 'otica'){
        $('#dgProdutos').datagrid('load',{
            otica: value
        });
    }
}

// FORMATA SITUAÇÃO
function formataSituacaoProduto(value,row){
    if (value == '1'){
        return '<i class="fa fa-check fa-lg" style="color:green"></i>';
    } else {
        return '<i class="fa fa-ban fa-lg" style="color:red"></i>';
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgProdutos').datagrid({
    onDblClickCell: function(index,field,value){
        editarProduto();
    }
});

// NOVO
function novoProduto(){
    $('#dlgProdutos').dialog('open').dialog('center').dialog('setTitle','Novo Produto');
    $('#formOticas').form('clear');
    url = '<?php base_url();?>produtos/cadastrar';
}

// EDITAR
function editarProduto(){
    var row = $('#dgProdutos').datagrid('getSelected');
    if (row != null){
        $('#dlgProdutos').dialog('open').dialog('center').dialog('setTitle','Editar Produto');
        $('#formOticas').form('load',row);
        url = '<?php base_url();?>produtos/atualizar/'+row.id_produto;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// DESATIVAR
function ativarDesativarProduto(){
    var row = $('#dgProdutos').datagrid('getSelected');
    if (row != null){
        if(row.situacao == 1) {
            $('#situacao_produto_ativar_desativar').val(0);
        } else {
            $('#situacao_produto_ativar_desativar').val(1);
        }

        $('#dlgProdutosDesativar').dialog('open').dialog('center').dialog('setTitle','Ativar/Desativar Produto');
        $('#formProdutoAtivarDesativar').form('load',row);
        url = '<?php base_url();?>produtos/ativarDesativar/'+row.id_produto;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarOtica(){
    $('#formOticas').form('submit',{
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
                $('#dlgProdutos').dialog('close');
                $('#dgProdutos').datagrid('reload');
            }
        }
    });
}

// DESATIVAR
function salvarOticaAtivarDesativar(){
    $('#formProdutoAtivarDesativar').form('submit',{
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
                $('#dlgProdutosDesativar').dialog('close');
                $('#dgProdutos').datagrid('reload');
            }
        }
    });
}
</script>