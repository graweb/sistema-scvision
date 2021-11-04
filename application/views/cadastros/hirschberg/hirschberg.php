<table id="dgHirschberg"
        class="easyui-datagrid"
        fit="true"
        url="<?php base_url();?>hirschberg/listar"
        toolbar="#toolbarHirschberg" 
        pagination="true"
        rownumbers="true"
        fitColumns="true"
        singleSelect="true"
        striped="true">
    <thead>
        <tr>
            <th data-options="field:'ck',checkbox:true"></th>
            <th field="id_hirschberg" width="10" hidden="true">ID</th>
            <th field="codigo_hirschberg" width="20">CÓDIGO</th>
            <th field="descricao" width="80">DESCRIÇÃO</th>
        </tr>
    </thead>
</table>
<div id="toolbarHirschberg">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-plus fa-lg" plain="true" onclick="novoHirschberg()">Novo</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="fa fa-edit fa-lg" plain="true" onclick="editarHirschberg()">Editar</a>
    <span class="button-sep"></span>
    <input class="easyui-searchbox" prompt='Digite a informação' menu="#menuBuscaHirschberg" searcher='buscaHirschberg' style="width:30%">
    <div id='menuBuscaHirschberg' style='width:auto'>
        <div name='codigo_hirschberg'>CÓDIGO</div>
    </div>
</div>

<div id="dlgHirschberg" class="easyui-dialog" style="width:480px;height:230px" 
        closed="true" buttons="#dlgHirschbergButtons" modal="true">
    <form id="formHirschberg" class="easyui-form" method="post" data-options="novalidate:true">
        <table style="width:97%;">
            <tr>
                <td>
                    <input class="easyui-textbox" label="Código:" labelPosition="top" id="codigo_hirschberg" name="codigo_hirschberg" style="width:100%;" required="true">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Descrição:</label>
                    <input class="easyui-textbox" id="descricao" name="descricao" style="width:100%;height:50px" multiline="true" required="true">
                </td>
            </tr>
        </table>
    </form>
</div>
<div id="dlgHirschbergButtons">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgHirschberg').dialog('close')" style="width:90px">Fechar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="salvarHirschberg()" style="width:90px">Salvar</a>
</div>


<script type="text/javascript">
var url;

//BUSCA
function buscaHirschberg(value,name){
    if(name == 'codigo_hirschberg'){
        $('#dgHirschberg').datagrid('load',{
            codigo_hirschberg: value
        });
    }
}

//ABRE JANELA COM 2 CLIQUES NO DATAGRID
$('#dgHirschberg').datagrid({
    onDblClickCell: function(index,field,value){
        editarHirschberg();
    }
});

// NOVO
function novoHirschberg(){
    $('#dlgHirschberg').dialog('open').dialog('center').dialog('setTitle','Novo Hirschberg');
    $('#formHirschberg').form('clear');
    url = '<?php base_url();?>hirschberg/cadastrar';
}

// EDITAR
function editarHirschberg(){
    var row = $('#dgHirschberg').datagrid('getSelected');
    if (row != null){
        $('#dlgHirschberg').dialog('open').dialog('center').dialog('setTitle','Editar Hirschberg');
        $('#formHirschberg').form('load',row);
        url = '<?php base_url();?>hirschberg/atualizar/'+row.id_hirschberg;
    } else {
        $.messager.alert('Atenção','Selecione um registro!','warning');
    }
}

// SALVAR NOVO/EDITAR
function salvarHirschberg(){
    $('#formHirschberg').form('submit',{
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
                $('#dlgHirschberg').dialog('close');
                $('#dgHirschberg').datagrid('reload');
            }
        }
    });
}
</script>