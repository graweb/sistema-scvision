<table id="dgFormasPagamento"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>formas_pagamento/listar"
        toolbar="#toolbarFormasPagamento" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_forma_pagamento" width="10" hidden="true">ID</th>
            <th field="codigo_forma_pagamento" width="20">CÓDIGO</th>
            <th field="descricao" width="60">DESCRIÇÃO</th>
            <th field="valor" width="20">VALOR</th>
        </tr>
    </thead>
</table>
<div id="toolbarFormasPagamento">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novaFormaPagamento()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarFormaPagamento()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaFormasPagamento" searcher='buscaFormaPagamento' style="width:30%">
    <div id='menuBuscaFormasPagamento' style='width:auto'>
        <div name='codigo_forma_pagamento'>CÓDIGO</div>
    </div>
</div>

<div id="dlgFormasPagamento" class="easyui-dialog" style="width:480px;height:230px" 
        closed="true" buttons="#dlgFormasPagamentoButtons" modal="true">
    <form id="formFormasPagamento" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Código:" labelPosition="top" id="codigo_forma_pagamento" name="codigo_forma_pagamento" style="width:100%;" required="true">
                </td>
                <td>
                    <input class="easyui-textbox" label="Valor:" labelPosition="top" id="valor" name="valor" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <label>Descrição:</label>
                    <input class="easyui-textbox" id="descricao" name="descricao" style="width:100%;height:50px" multiline="true" required="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgFormasPagamentoButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgFormasPagamento').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarFormaPagamento()" style="width:90px">Salvar</a>
</div>


<script type="text/javascript">
var url;

//BUSCA
function buscaFormaPagamento(value,name){
    if(name == 'codigo_forma_pagamento'){
        $('#dgFormasPagamento').datagrid('load',{
            codigo_forma_pagamento: value
        });
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgFormasPagamento').datagrid({
    onDblClickCell: function(index,field,value){
        editarFormaPagamento();
    }
});

// NOVO
function novaFormaPagamento(){
    $('#dlgFormasPagamento').dialog('open').dialog('center').dialog('setTitle','Nova Forma de Pagamento');
    $('#formFormasPagamento').form('clear');
    url = '<?php base_url();?>formas_pagamento/cadastrar';
}

// EDITAR
function editarFormaPagamento(){
    var row = $('#dgFormasPagamento').datagrid('getSelected');
    if (row != null){
        $('#dlgFormasPagamento').dialog('open').dialog('center').dialog('setTitle','Editar Forma de Pagamento');
        $('#formFormasPagamento').form('load',row);
        url = '<?php base_url();?>formas_pagamento/atualizar/'+row.id_forma_pagamento;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarFormaPagamento(){
    $('#formFormasPagamento').form('submit',{
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
                $('#dlgFormasPagamento').dialog('close');
                $('#dgFormasPagamento').datagrid('reload');
            }
        }
    });
}
</script>